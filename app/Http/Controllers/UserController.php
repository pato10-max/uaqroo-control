<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Autorizaciones;
use App\Models\EventosAcceso;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Crypt; // Cambiado para mejorar seguridad con Crypt de Laravel

class ApiUaqrooController extends Controller
{
    public function validarUsuario()
    {
        // Añadido manejo de errores
        try {
            $validaciones = Autorizaciones::with(['user:id,nombre_usuario'])->get();
            return response()->json($validaciones);
        } catch (\Exception $e) {
            Log::error('Error en validarUsuario: ' . $e->getMessage());
            return response()->json(['error' => 'Error al obtener validaciones'], 500);
        }
    }

    public function eventosAcceso(Request $request)
    {
        // Simplificar validación y agregar manejo de errores
        $request->validate([
            'semestre' => 'required|string|max:50',
            'grupo' => 'required|string|max:50',
            'matricula' => 'required|string|max:50',
            'area_id' => 'nullable|integer',
            'usuario_id' => 'nullable|integer',
            'permiso' => 'nullable|boolean',
        ]);

        try {
            $evento = EventosAcceso::create($request->only([
                'semestre', 'grupo', 'matricula', 'area_id', 'usuario_id', 'permiso'
            ]));
            return response()->json($evento, 201);
        } catch (\Exception $e) {
            Log::error('Error en eventosAcceso: ' . $e->getMessage());
            return response()->json(['error' => 'Error al crear el evento'], 500);
        }
    }

    public function buscarUsuario($email, $areaId)
    {
        try {
            // Descodificar y desencriptar el email
            $emailDecoded = base64_decode($email);
            $decryptedEmail = Crypt::decryptString($emailDecoded);

            $user = User::where('email', $decryptedEmail)->firstOrFail();
            $evento = EventosAcceso::create([
                'area_id' => $areaId,
                'usuario_id' => $user->usuario_id,
                'fecha_hora' => now(),
                'evento_id' => $this->generateEventoId(),
            ]);

            $validacion = Autorizaciones::where('usuario_id', $user->usuario_id)
                                        ->where('area_id', $areaId)
                                        ->latest('created_at')
                                        ->first();

            if (!$validacion || (isset($validacion->expires_at) && Carbon::parse($validacion->expires_at)->isPast())) {
                $evento->update(['permiso' => "NO PERMITIDO"]);
                return response()->json([
                    'acceso' => false,
                    'mensaje' => 'No tiene permiso para acceder a esta área'
                ]);
            } else {
                $evento->update(['permiso' => "PERMITIDO"]);
                return response()->json([
                    'acceso' => true,
                    'mensaje' => 'Acceso permitido'
                ]);
            }
        } catch (\Exception $e) {
            Log::error('Error en buscarUsuario: ' . $e->getMessage());
            return response()->json(['acceso' => false, 'error' => 'Error al buscar usuario'], 500);
        }
    }

    public function generateEventoId()
    {
        $maxValue = 999999999;

        do {
            $randomNumber = random_int(1, $maxValue);
        } while (EventosAcceso::where('evento_id', $randomNumber)->exists());

        return $randomNumber;
    }
}
