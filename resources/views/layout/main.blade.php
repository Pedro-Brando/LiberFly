<!-- index.php -->
<!DOCTYPE html>
<html lang="en">
@include('components.header')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">

    <link rel="stylesheet" href="{{ asset('plugins/fullcalendar/main.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/sweetalert2/sweetalert2.min.css') }}">
    <link rel="stylesheet" href="{{asset('plugins/summernote/summernote-bs4.min.css')}}">

    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/logo-short-white.png')}}">
    <title>Uiara - ERP</title>
    @yield('css')
    @stack('css')

    <style>
        .pagination{
            flex-wrap: wrap;
            margin-top: 20px;
        }
    </style>

    <style>
        .select2-container--default .select2-selection--multiple .select2-selection__choice{
            color: #000 !important;
        }
    </style>
</head>

<body class="sidebar-mini layout-fixed">
    @include ('components.navbar')

    @include ('components.sidebar')

    <div class="wrapper">
        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">@yield('page-title')</h1>
                        </div>
                    </div>
                </div>
            </div>
            <section class="content">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </section>
        </div>
    </div>

    @include('components.alerts')


    <!-- jQuery && jQuery UI 1.11.4 -->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- Main -->
    <script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
    <script src="{{ asset('plugins/fullcalendar/main.min.js') }}"></script>

    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
    $.widget.bridge('uibutton', $.ui.button)
    </script>

    <!-- DEPS -->
    <!-- daterangepicker -->
    <script src="{{ asset('plugins/moment/moment.min.js') }}" defer></script>
    <script src="{{ asset('plugins/daterangepicker/daterangepicker.min.js') }}" defer></script>
    <!-- overlayScrollbars -->
    <script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}" defer></script>
    <script src="{{ asset('plugins/summernote/summernote-bs4.min.js')}}" defer></script>
    <script src="{{ asset('plugins/select2/js/select2.full.min.js') }}" defer></script>
    {{-- <script src="{{ asset('plugins/fullcalendar/locales/pt-br.js') }}" defer></script> --}}
    <script src="{{ asset('plugins/sweetalert2/sweetalert2.min.js') }}" defer></script>
    <script src="{{ asset('plugins/axios/axios.min.js') }}" defer></script>
    <script src="{{ asset('plugins/jquery-mask/jquery.mask.min.js') }}" defer></script>
    <script src="{{ asset('plugins/jquery-inputmask/jquery.inputmask.min.js') }}" defer></script>
    <script src="{{asset('js/formatter.min.js')}}" module defer></script>
    <script src="https://d3js.org/d3.v7.min.js"></script>

    <script>
        function confirmDelete(form) {
            Swal.fire({
                title: 'Tem certeza?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Sim, inativar!',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
            return false;
        }
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var btnSend = document.getElementById('btnSend');

            if (btnSend) {
                btnSend.addEventListener('click', function(event) {
                    if (btnSend.disabled) {
                        return;
                    }

                    var form = btnSend.closest('form');
                    if (form && form.reportValidity()) {
                        if (!btnSend.disabled) {
                            btnSend.disabled = true;
                            btnSend.innerHTML = 'Enviando...';

                            form.submit();
                        }
                    }else{
                        Swal.fire("Aviso", "Campos obrigatórios não preenchidos", "warning");
                    }
                });
            }
        });
    </script>

    @yield('scripts')
    @stack('scripts')
</body>

</html>
