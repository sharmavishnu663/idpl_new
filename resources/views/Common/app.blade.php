<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel-Admin</title>

    <!--Font awesome icons-->
    <link href="{{ asset('assets/fonts/font-awesome5-free/css/all.min.css') }}" rel="stylesheet">

    <!--Google web fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">


    <!--Simplebar css-->
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/simplebar.min.css') }}">

    <!--Choices css-->
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/choices.min.css') }}">

    <!--Date range picker-->
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/daterangepicker.css') }}">
    <link href="{{ asset('assets/vendor/css/quill.snow.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.0/css/dataTables.bootstrap5.min.css">
    <!--Main style-->
    @if (Session::get('theme') == 'light')
        <link rel="stylesheet" href="{{ asset('assets/css/style.min.css') }}" id="switchThemeStyle">
    @else
        <link rel="stylesheet" href="{{ asset('assets/css/style.dark.min.css') }}" id="switchThemeStyle">
    @endif
</head>

<body>
    {{-- <input type="hidden" name="_token" value="@csrf"> --}}
    <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">


    <!--////////////////// PreLoader Start//////////////////////-->
    <div class="loader">
        <!--Placeholder animated layout for preloader-->
        <div class="d-flex flex-column flex-root">
            <div class="page d-flex flex-row flex-column-fluid">

                <!--Sidebar start-->
                <aside class="page-sidebar aside-dark placeholder-wave">
                    <div class="placeholder col-12 h-100 bg-gray"></div>
                </aside>
                <div class="page-content d-flex flex-column flex-row-fluid">
                    <div
                        class="content flex-column p-4 pb-0 d-flex justify-content-center align-items-center flex-column-fluid position-relative">
                        <div class="w-100 h-100 position-relative d-flex align-items-center justify-content-center">
                            <i class="anim-spinner fas fa-spinner me-3"></i>
                            <div>
                                <span>Loading...</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--////////////////// /.PreLoader END//////////////////////-->

    <div class="d-flex flex-column flex-root">
        <!--Page-->
        <div class="page d-flex flex-row flex-column-fluid">

            @include('Common.SideBar')
            <main class="page-content d-flex flex-column flex-row-fluid">
                <!--//page-header//-->
                @include('Common.Header')
                <!--Main Header End-->
                <!--///////////Page content wrapper///////////////-->


                @yield('content')

            </main>
        </div>
    </div>

    <!--////////////Theme Core scripts Start/////////////////-->

    <script src="{{ asset('assets/js/theme.bundle.js') }}"></script>
    <script src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

    <!--////////////Theme Core scripts End/////////////////-->


    <!--Charts-->
    <script src="{{ asset('assets/vendor/apexcharts.min.js') }}"></script>
    <!--Dashboard duration calendar-->
    <script src="{{ asset('assets/vendor/moment.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/daterangepicker.js') }}"></script>

    <script src="https://cdn.datatables.net/1.11.0/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.0/js/dataTables.bootstrap5.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Datatables Responsive
            $("#datatable").DataTable({
                "filter": false,
                "length": false
            });
        });
    </script>

    <script src="{{ asset('assets/vendor/quill.min.js') }}  "></script>
    <script>
        var initQuill = document.querySelectorAll("[data-quill]");
        initQuill.forEach((qe) => {
            const qt = {
                ...(qe.dataset.quill ? JSON.parse(qe.dataset.quill) : {}),
                modules: {
                    toolbar: [
                        [{
                            header: [1, 2, false]
                        }],
                        ["bold", "underline"],
                        ["link", "blockquote", "code", "image"],
                        [{
                            list: "ordered"
                        }, {
                            list: "bullet"
                        }]
                    ]
                },
                theme: "snow"
            };
            new Quill(qe, qt);
        });
    </script>

    <script>
        function addCss(theme) {
            var theme = theme;
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url: '{!! route('admin.theme.change') !!}', //the page containing php script
                type: "post", //request type,
                data: {
                    theme: theme,
                    _token: _token
                },
                success: function(result) {
                    return true
                }
            });
        }
    </script>

</body>

</html>
