<x-base-layout :scrollspy="false">
   <x-slot:pageTitle>
   Áreas 
   </x-slot>
   <!-- BEGIN GLOBAL MANDATORY STYLES -->
   <x-slot:headerFiles>
   <!--  BEGIN CUSTOM STYLE FILE  -->
   <link rel="stylesheet" href="{{asset('plugins/table/datatable/datatables.css')}}">
   @vite(['resources/scss/light/plugins/table/datatable/dt-global_style.scss'])
   @vite(['resources/scss/dark/plugins/table/datatable/dt-global_style.scss'])
   @vite(['resources/scss/light/assets/components/carousel.scss'])
   @vite(['resources/scss/light/assets/components/modal.scss'])
   @vite(['resources/scss/light/assets/components/tabs.scss'])
   @vite(['resources/scss/dark/assets/components/carousel.scss'])
   @vite(['resources/scss/dark/assets/components/modal.scss'])
   @vite(['resources/scss/dark/assets/components/tabs.scss'])
   <link rel="stylesheet" href="{{asset('plugins/animate/animate.css')}}">
   <link rel="stylesheet" href="{{asset('plugins/filepond/filepond.min.css')}}">
   <link rel="stylesheet" href="{{asset('plugins/filepond/FilePondPluginImagePreview.min.css')}}">
   @vite(['resources/scss/light/plugins/filepond/custom-filepond.scss'])
   @vite(['resources/scss/dark/plugins/filepond/custom-filepond.scss'])
   <!--  BEGIN CUSTOM STYLE FILE  -->
   <link rel="stylesheet" href="{{asset('plugins/notification/snackbar/snackbar.min.css')}}">
   @vite(['resources/scss/light/plugins/notification/snackbar/custom-snackbar.scss'])
   <!-- Estilos del sweet alert-->
   @vite(['resources/css/sweet.css'])
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
   <!--  END CUSTOM STYLE FILE  -->        
   </x-slot>
   <!-- END GLOBAL MANDATORY STYLES -->
   <!-- BREADCRUMB -->
   <div class="page-meta">
      <nav class="breadcrumb-style-one" aria-label="breadcrumb">
         <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Áreas</li>
         </ol>
      </nav>
   </div>
   <!-- /BREADCRUMB -->
   <div class="row layout-top-spacing">
      <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
         <button type="button" class="btn btn-primary mb-2 mr-2" data-bs-toggle="modal" data-bs-target="#exampleModalCenter">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-plus">
               <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
               <polyline points="14 2 14 8 20 8"></polyline>
               <line x1="12" y1="18" x2="12" y2="12"></line>
               <line x1="9" y1="15" x2="15" y2="15"></line>
            </svg>
            Nueva área
         </button>
         <div class="widget-content widget-content-area br-8">
            <table id="zero-config" class="table table-striped dt-table-hover" style="width:50%">
               <thead>
                  <tr>
                     <th>ID</th>
                     <th>Área</th>
                     <th>Descripción</th>
                     <th>Usuarios permitidos</th>
                     <th>Acciones</th>
                  </tr>
               </thead>
               <tbody>
                  @foreach ($areas as $a)
                  <tr>
                     <td>{{ $a->area_id }} </td>
                     <td>{{ $a->nombre }}</td>
                     <td id="td">{{ $a->descripcion }}</td>
                     <td>{{ $a->usuarios_permitidos }}</td>
                     <td>
                        <div class="btn-group" role="group" aria-label="Basic example">
                           <a data-bs-toggle="modal" data-bs-target="#exampleModalCenter3{{ $a->area_id }}" type="button" class="btn btn-primary">
                              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text">
                                 <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                                 <polyline points="14 2 14 8 20 8"></polyline>
                                 <line x1="16" y1="13" x2="8" y2="13"></line>
                                 <line x1="16" y1="17" x2="8" y2="17"></line>
                                 <polyline points="10 9 9 9 8 9"></polyline>
                              </svg>
                           </a>
                           <a data-bs-toggle="modal" data-bs-target="#exampleModalCenter2{{ $a->area_id }}" type="button" class="btn btn-warning">
                              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit">
                                 <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                 <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                              </svg>
                           </a>
                           <a href="/administrar-area/{{ $a->area_id }}" type="button" class="btn btn-success">
                              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-clipboard">
                                 <path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"></path>
                                 <rect x="8" y="2" width="8" height="4" rx="1" ry="1"></rect>
                              </svg>
                           </a>
                        </div>
                        @include('pages-control.areas.editar-area')
                        @include('pages-control.areas.reporte')
                     </td>
                  </tr>
                  @endforeach
               </tbody>
               <tfoot>
                  <tr>
                     <th>ID</th>
                     <th>Área</th>
                     <th>Descripción</th>
                     <th>Usuarios permitidos</th>
                     <th>Acciones</th>
                  </tr>
               </tfoot>
            </table>
         </div>
      </div>
   </div>
   <!-- Modal store -->
   <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="exampleModalCenterTitle">Nueva área</h5>
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                  <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                     <line x1="18" y1="6" x2="6" y2="18"></line>
                     <line x1="6" y1="6" x2="18" y2="18"></line>
                  </svg>
               </button>
            </div>
            <div class="modal-body">
               <h4 class="modal-heading mb-4 mt-2">Porfavor complete el formulario</h4>
               <div class="row mb-4">
                  <div class="form-group mb-4">
                     <form method="POST" action="{{ route('areas.store') }}">
                        @csrf
                        <label for="disabledTextInput">Nombre del área</label>
                        <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre">
                  </div>
                  <div class="form-group mb-4">
                  <label for="disabledTextInput">Usuarios permitidos</label>
                  <input type="text" name="users" id="users"  class="form-control" placeholder="Usuarios permitidos">
                  </div>
                  <div class="form-group mb-4">
                  <label for="disabledTextInput">Descripción</label>
                  <input type="text" name="descripcion" class="form-control" placeholder="Descripción">
                  </div>
               </div>
            </div>
            <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Guardar</button>
            </form>
            <button class="btn btn-light-dark" data-bs-dismiss="modal">Descartar</button>
            </div>
         </div>
      </div>
   </div>
   <!--  BEGIN CUSTOM SCRIPTS FILE  -->
   <x-slot:footerFiles>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
   <script>
      $(function () {
      $('[data-toggle="tooltip"]').tooltip()
      })
   </script>
   <script src="{{asset('plugins/global/vendors.min.js')}}"></script>
   @vite(['resources/assets/js/custom.js'])
   <script src="{{asset('plugins/table/datatable/datatables.js')}}"></script>
   <script>
      $('#zero-config').DataTable({
          "dom": "<'dt--top-section'<'row'<'col-12 col-sm-6 d-flex justify-content-sm-start justify-content-center'l><'col-12 col-sm-6 d-flex justify-content-sm-end justify-content-center mt-sm-0 mt-3'f>>>" +
      "<'table-responsive'tr>" +
      "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
          "oLanguage": {
              "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
              "sInfo": "Mostrando páginas _PAGE_ of _PAGES_",
              "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
              "sSearchPlaceholder": "Buscar..",
             "sLengthMenu": "Resultados :  _MENU_",
          },
          "stripeClasses": [],
          "lengthMenu": [7, 10, 20, 50],
          "pageLength": 10 
      });
   </script>
   <script src="{{asset('plugins/notification/snackbar/snackbar.min.js')}}"></script>
   {{-- <script src="{{asset('plugins/notification/snackbar/snackbar.min.js')}}"></script> --}}
   @vite(['resources/assets/js/components/notification/custom-snackbar.js'])
   <script class="module">
      // Get the Toast button
      var toastButton = document.getElementById("toast-btn");
      // Get the Toast element
      var toastElement = document.getElementsByClassName("toast")[0];
      
      var toast = new bootstrap.Toast(toastElement)
      toastButton.onclick = function() {
          toast.show();
      }
      
      
   </script>
   @if (session('success'))
   <script>
      document.addEventListener('DOMContentLoaded', function() {
          Swal.fire({
              title: '¡Éxito!',
              text: '{{ session('success') }}',
              icon: 'success',
              confirmButtonText: 'Aceptar',
               // Opcional: añadir configuración de customClass para aislar estilos
               customClass: {
                  container: 'swal-container',
                  popup: 'swal-popup',
                  header: 'swal-header',
                  title: 'swal-title',
                  text: 'swal-text',
                  closeButton: 'swal-close-button',
                  icon: 'swal-icon',
                  image: 'swal-image',
                  content: 'swal-content',
                  input: 'swal-input',
                  actions: 'swal-actions',
                  confirmButton: 'swal-confirm-button',
                  cancelButton: 'swal-cancel-button',
                  footer: 'swal-footer'
              }
          });
      });
   </script>
   @endif
   @foreach($areas as $a)
   <script>
      function addLineBreaks(id) {
          const td = document.getElementById(id);
          const words = td.innerText.split(' ');
          let newContent = '';
          for (let i = 0; i < words.length; i++) {
              if (i > 0 && i % 2 === 0) {
                  newContent += '<br>';
              }
              newContent += words[i] + ' ';
          }
          td.innerHTML = newContent.trim();
      }
      
      addLineBreaks('td');
   </script>
   @endforeach
   </x-slot>
   <!--  END CUSTOM SCRIPTS FILE  -->
</x-base-layout>