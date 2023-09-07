<!doctype html>
<html class=loading lang=en data-textdirection=ltr>

<head>
    <meta http-equiv=Content-Type content="text/html; charset=UTF-8">
    <meta http-equiv=X-UA-Compatible content="IE=edge">
    <meta name=viewport content="width=device-width,initial-scale=1,user-scalable=0">
    <meta name=description content="Frest admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name=keywords content="admin template, Frest admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name=author content=PIXINVENT>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') | Dashboard</title>
    <link rel=apple-touch-icon href={{ asset('public/backend') }}/app-assets/images/ico/apple-icon-120.html>
    <link rel="shortcut icon" type=image/x-icon href=https://www.pixinvent.com/demo/frest-clean-bootstrap-admin-dashboard-template/app-assets/images/ico/favicon.ico>
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,600%7CIBM+Plex+Sans:300,400,500,600,700" rel=stylesheet>
    <link rel=stylesheet href={{ asset('public/backend') }}/app-assets/vendors/css/vendors.min.css>
    <link rel=stylesheet href={{ asset('public/backend') }}/app-assets/vendors/css/charts/apexcharts.css>
    <link rel=stylesheet href={{ asset('public/backend') }}/app-assets/vendors/css/extensions/dragula.min.css>
    <link rel=stylesheet href={{ asset('public/backend') }}/app-assets/css/bootstrap.min.css>
    <link rel=stylesheet href={{ asset('public/backend') }}/app-assets/css/bootstrap-extended.min.css>
    <link rel=stylesheet href={{ asset('public/backend') }}/app-assets/css/colors.min.css>
    <link rel=stylesheet href={{ asset('public/backend') }}/app-assets/css/components.min.css>
    <link rel=stylesheet href={{ asset('public/backend') }}/app-assets/css/themes/dark-layout.min.css>
    <link rel=stylesheet href={{ asset('public/backend') }}/app-assets/css/themes/semi-dark-layout.min.css>
    <link rel=stylesheet href={{ asset('public/backend') }}/app-assets/css/core/menu/menu-types/vertical-menu.min.css>
    <link rel=stylesheet href={{ asset('public/backend') }}/app-assets/css/pages/widgets.min.css>
    <link rel=stylesheet href={{ asset('public/backend') }}/app-assets/css/pages/dashboard-analytics.min.css>

    <!-- BEGIN: Datatable-->
    <link rel="stylesheet" type="text/css" href="{{ asset('public/backend') }}/app-assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/backend') }}/app-assets/vendors/css/tables/datatable/responsive.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/backend') }}/app-assets/vendors/css/tables/datatable/buttons.bootstrap4.min.css">
    <!-- BEGIN: Sweetalert-->
    <link rel="stylesheet" type="text/css" href="{{ asset('public/backend') }}/app-assets/vendors/css/extensions/sweetalert2.min.css">
    <!-- BEGIN: Validation-->
    <link rel="stylesheet" type="text/css" href="{{ asset('public/backend') }}/app-assets/css/plugins/forms/validation/form-validation.css">
    <!-- BEGIN: Select2-->
    <link rel="stylesheet" type="text/css" href="{{ asset('public/backend') }}/app-assets/vendors/css/forms/select/select2.min.css">
    <!-- BEGIN: iziToast-->
    <link href="{{ asset('public/css/iziToast.css') }}" rel="stylesheet">

    <link rel=stylesheet href={{ asset('public/backend') }}/assets/css/style.css>

    @stack('css')
</head>

<body class="vertical-layout vertical-menu-modern boxicon-layout no-card-shadow 2-columns navbar-sticky footer-static" data-open=click data-menu=vertical-menu-modern data-col=2-columns>
<div class=header-navbar-shadow></div>

@include('layouts.backend.partial.header')

@include('layouts.backend.partial.sidebar')

@yield('content')

<div class="customizer d-none d-md-block"><a class=customizer-toggle href=javascript:void(0);><i class="bx bx-cog bx bx-spin white"></i></a>
    <div class="customizer-content p-2">
        <h4 class="text-uppercase mb-0">Theme Customizer</h4>
        <small>Customize & Preview in Real Time</small>
        <a href=javascript:void(0) class=customizer-close>
            <i class="bx bx-x"></i>
        </a>
        <hr>
        <h5 class=mt-1>Theme Layout</h5>
        <div class=theme-layouts>
            <div class="d-flex justify-content-start">
                <div class=mx-50>
                    <fieldset>
                        <div class=radio>
                            <input type=radio name=layoutOptions value=false id=radio-light class=layout-name data-layout="" checked>
                            <label for=radio-light>Light</label>
                        </div>
                    </fieldset>
                </div>
                <div class=mx-50>
                    <fieldset>
                        <div class=radio>
                            <input type=radio name=layoutOptions value=false id=radio-dark class=layout-name data-layout=dark-layout>
                            <label for=radio-dark>Dark</label>
                        </div>
                    </fieldset>
                </div>
                <div class=mx-50>
                    <fieldset>
                        <div class=radio>
                            <input type=radio name=layoutOptions value=false id=radio-semi-dark class=layout-name data-layout=semi-dark-layout>
                            <label for=radio-semi-dark>Semi Dark</label>
                        </div>
                    </fieldset>
                </div>
            </div>
        </div>
        <hr>
        <div id=customizer-theme-colors>
            <h5>Menu Colors</h5>
            <ul class="list-inline unstyled-list">
                <li class="color-box bg-primary selected" data-color=theme-primary></li>
                <li class="color-box bg-success" data-color=theme-success></li>
                <li class="color-box bg-danger" data-color=theme-danger></li>
                <li class="color-box bg-info" data-color=theme-info></li>
                <li class="color-box bg-warning" data-color=theme-warning></li>
                <li class="color-box bg-dark" data-color=theme-dark></li>
            </ul>
            <hr>
        </div>
        <div id=menu-icon-animation>
            <div class="d-flex justify-content-between align-items-center">
                <div class=icon-animation-title>
                    <h5 class=pt-25>Icon Animation</h5>
                </div>
                <div class=icon-animation-switch>
                    <div class="custom-control custom-switch">
                        <input type=checkbox class=custom-control-input checked id=icon-animation-switch>
                        <label class=custom-control-label for=icon-animation-switch></label>
                    </div>
                </div>
            </div>
            <hr>
        </div>
        <div class="collapse-sidebar d-flex justify-content-between align-items-center">
            <div class=collapse-option-title>
                <h5 class=pt-25>Collapse Menu</h5>
            </div>
            <div class=collapse-option-switch>
                <div class="custom-control custom-switch">
                    <input type=checkbox class=custom-control-input id=collapse-sidebar-switch>
                    <label class=custom-control-label for=collapse-sidebar-switch></label>
                </div>
            </div>
        </div>
        <hr>
        <div id=customizer-navbar-colors>
            <h5>Navbar Colors</h5>
            <ul class="list-inline unstyled-list">
                <li class="color-box bg-white border selected" data-navbar-default=""></li>
                <li class="color-box bg-primary" data-navbar-color=bg-primary></li>
                <li class="color-box bg-success" data-navbar-color=bg-success></li>
                <li class="color-box bg-danger" data-navbar-color=bg-danger></li>
                <li class="color-box bg-info" data-navbar-color=bg-info></li>
                <li class="color-box bg-warning" data-navbar-color=bg-warning></li>
                <li class="color-box bg-dark" data-navbar-color=bg-dark></li>
            </ul>
            <small><strong>Note :</strong> This option with work only on sticky navbar when you scroll page.</small>
            <hr>
        </div>
        <h5>Navbar Type</h5>
        <div class="navbar-type d-flex justify-content-start">
            <div class="hidden-ele mx-50">
                <fieldset>
                    <div class=radio>
                        <input type=radio name=navbarType value=false id=navbar-hidden>
                        <label for=navbar-hidden>Hidden</label>
                    </div>
                </fieldset>
            </div>
            <div class=mx-50>
                <fieldset>
                    <div class=radio>
                        <input type=radio name=navbarType value=false id=navbar-static>
                        <label for=navbar-static>Static</label>
                    </div>
                </fieldset>
            </div>
            <div class=mx-50>
                <fieldset>
                    <div class=radio>
                        <input type=radio name=navbarType value=false id=navbar-sticky checked>
                        <label for=navbar-sticky>Fixed</label>
                    </div>
                </fieldset>
            </div>
        </div>
        <hr>
        <h5>Footer Type</h5>
        <div class="footer-type d-flex justify-content-start">
            <div class=mx-50>
                <fieldset>
                    <div class=radio>
                        <input type=radio name=footerType value=false id=footer-hidden>
                        <label for=footer-hidden>Hidden</label>
                    </div>
                </fieldset>
            </div>
            <div class=mx-50>
                <fieldset>
                    <div class=radio>
                        <input type=radio name=footerType value=false id=footer-static checked>
                        <label for=footer-static>Static</label>
                    </div>
                </fieldset>
            </div>
            <div class=mx-50>
                <fieldset>
                    <div class=radio>
                        <input type=radio name=footerType value=false id=footer-sticky>
                        <label for=footer-sticky>Sticky</label>
                    </div>
                </fieldset>
            </div>
        </div>
        <hr>
        <div class="card-shadow d-flex justify-content-between align-items-center py-25">
            <div class=hide-scroll-title>
                <h5 class=pt-25>Card Shadow</h5>
            </div>
            <div class=card-shadow-switch>
                <div class="custom-control custom-switch">
                    <input type=checkbox class=custom-control-input checked id=card-shadow-switch>
                    <label class=custom-control-label for=card-shadow-switch></label>
                </div>
            </div>
        </div>
        <hr>
        <div class="hide-scroll-to-top d-flex justify-content-between align-items-center py-25">
            <div class=hide-scroll-title>
                <h5 class=pt-25>Hide Scroll To Top</h5>
            </div>
            <div class=hide-scroll-top-switch>
                <div class="custom-control custom-switch">
                    <input type=checkbox class=custom-control-input id=hide-scroll-top-switch>
                    <label class=custom-control-label for=hide-scroll-top-switch></label>
                </div>
            </div>
        </div>
    </div>
</div>
<div class=widget-chat-demo>
    <div class="widget-chat widget-chat-demo d-none">
        <div class="card mb-0">
            <div class="card-header border-bottom p-0">
                <div class="media m-75">
                    <a href=JavaScript:void(0);>
                        <div class="avatar mr-75">
                            <img src={{ asset('public/backend') }}/app-assets/images/portrait/small/avatar-s-2.jpg alt="avtar images" width=32 height=32>
                            <span class=avatar-status-online></span>
                        </div>
                    </a>
                    <div class=media-body>
                        <h6 class="media-heading mb-0 pt-25"><a href=javaScript:void(0);>Kiara Cruiser</a></h6>
                        <span class="text-muted font-small-3">Active</span>
                    </div>
                </div>
                <div class=heading-elements>
                    <i class="bx bx-x widget-chat-close float-right my-auto cursor-pointer"></i>
                </div>
            </div>
            <div class="card-body widget-chat-container widget-chat-demo-scroll">
                <div class=chat-content>
                    <div class="badge badge-pill badge-light-secondary my-1">today</div>
                    <div class=chat>
                        <div class=chat-body>
                            <div class=chat-message>
                                <p>How can we help? 😄</p>
                                <span class=chat-time>7:45 AM</span>
                            </div>
                        </div>
                    </div>
                    <div class="chat chat-left">
                        <div class=chat-body>
                            <div class=chat-message>
                                <p>Hey John, I am looking for the best admin template.</p>
                                <p>Could you please help me to find it out? 🤔</p>
                                <span class=chat-time>7:50 AM</span>
                            </div>
                        </div>
                    </div>
                    <div class=chat>
                        <div class=chat-body>
                            <div class=chat-message>
                                <p>Stack admin is the responsive bootstrap 4 admin template.</p>
                                <span class=chat-time>8:01 AM</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer border-top p-1">
                <form class=d-flex onsubmit=widgetChatMessageDemo() action=javascript:void(0);>
                    <input class="form-control chat-message-demo mr-75" placeholder="Type here...">
                    <button type=submit class="btn btn-primary glow px-1"><i class="bx bx-paper-plane"></i></button>
                </form>
            </div>
        </div>
    </div>
</div>
<div class=sidenav-overlay></div>
<div class=drag-target></div>
<footer class="footer footer-static footer-light">
    <p class="clearfix mb-0"><span class="float-left d-inline-block">2021 &copy; PIXINVENT</span><span class="float-right d-sm-inline-block d-none">Crafted with<i class="bx bxs-heart pink mx-50 font-small-3"></i>by<a class=text-uppercase href=https://1.envato.market/pixinvent_portfolio target=_blank>Pixinvent</a></span>
        <button class="btn btn-primary btn-icon scroll-top" type=button><i class="bx bx-up-arrow-alt"></i></button>
    </p>
</footer>
<script src={{ asset('public/backend') }}/app-assets/vendors/js/vendors.min.js></script>
<script src={{ asset('public/backend') }}/app-assets/fonts/LivIconsEvo/js/LivIconsEvo.tools.min.js></script>
<script src={{ asset('public/backend') }}/app-assets/fonts/LivIconsEvo/js/LivIconsEvo.defaults.min.js></script>
<script src={{ asset('public/backend') }}/app-assets/fonts/LivIconsEvo/js/LivIconsEvo.min.js></script>
<script src={{ asset('public/backend') }}/app-assets/vendors/js/charts/apexcharts.min.js></script>
<script src={{ asset('public/backend') }}/app-assets/vendors/js/extensions/dragula.min.js></script>
<script src={{ asset('public/backend') }}/app-assets/js/core/app-menu.min.js></script>

<!-- BEGIN: DataTable-->
<script src="{{ asset('public/backend') }}/app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js"></script>
<script src="{{ asset('public/backend') }}/app-assets/vendors/js/tables/datatable/dataTables.bootstrap4.min.js"></script>
<script src="{{ asset('public/backend') }}/app-assets/vendors/js/tables/datatable/dataTables.buttons.min.js"></script>
<script src="{{ asset('public/backend') }}/app-assets/vendors/js/tables/datatable/buttons.html5.min.js"></script>
<script src="{{ asset('public/backend') }}/app-assets/vendors/js/tables/datatable/buttons.print.min.js"></script>
<script src="{{ asset('public/backend') }}/app-assets/vendors/js/tables/datatable/buttons.bootstrap4.min.js"></script>
<script src="{{ asset('public/backend') }}/app-assets/vendors/js/tables/datatable/pdfmake.min.js"></script>
<script src="{{ asset('public/backend') }}/app-assets/vendors/js/tables/datatable/vfs_fonts.js"></script>
<script src="{{ asset('public/backend') }}/app-assets/js/scripts/datatables/datatable.min.js"></script>
<!-- END: DataTable-->

<!-- BEGIN: Validation-->
<script src="{{ asset('public/backend') }}/app-assets/vendors/js/forms/validation/jquery.validate.min.js"></script>
<script src="{{ asset('public/backend') }}/app-assets/js/scripts/forms/validation/form-validation.js"></script>
<!-- END: Validation-->

<!-- BEGIN: Select2-->
<script src="{{ asset('public/backend') }}/app-assets/vendors/js/forms/select/select2.full.min.js"></script>
<script src="{{ asset('public/backend') }}/app-assets/js/scripts/forms/select/form-select2.min.js"></script>
<!-- END: Select2-->

<!-- BEGIN: Sweetalert-->
<script src="{{ asset('public/backend') }}/app-assets/vendors/js/extensions/sweetalert2.all.min.js"></script>

<script>
    function deleteData(id) {
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
        })

        swalWithBootstrapButtons.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            type: "warning",
            showCancelButton: !0,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!",
            confirmButtonClass: "btn btn-primary",
            cancelButtonClass: "btn btn-danger ml-1",
            buttonsStyling: !1,
            icon : 'warning'
        }).then((result) => {
            if (result.isConfirmed) {
                event.preventDefault();
                document.getElementById('delete-form-'+id).submit();
            } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire(
                    'Cancelled',
                    'Your imaginary file is safe :)',
                    'error'
                )
            }
        })
    }
</script>
<!-- END: Sweetalert-->

<script src="{{ asset('public/js/iziToast.js') }}"></script>
@include('vendor.lara-izitoast.toast')

<script src={{ asset('public/backend') }}/app-assets/js/core/app.min.js></script>
<script src={{ asset('public/backend') }}/app-assets/js/scripts/components.min.js></script>
<script src={{ asset('public/backend') }}/app-assets/js/scripts/footer.min.js></script>
<script src={{ asset('public/backend') }}/app-assets/js/scripts/customizer.min.js></script>
<script src={{ asset('public/backend') }}/app-assets/js/scripts/pages/dashboard-analytics.min.js></script>
@stack('js')
</body>

</html>
