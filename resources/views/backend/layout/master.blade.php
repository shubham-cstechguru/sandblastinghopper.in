@php

$setting = App\Model\Setting::findOrFail(1);

@endphp


<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{url('imgs/'.$setting->fav_icon)}}">
    <title>{{ $setting->sitename }}-@yield('title')</title>
    <!-- Custom CSS -->
    <!-- <link href="../../assets/libs/flot/css/float-chart.css" rel="stylesheet"> -->
    {{Html::style('admin/css/float-chart.css')}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    {{Html::style('admin/css/style.min.css')}}
    {{Html::style('admin/icomoon/style.css')}}


    <!-- Custom CSS -->
    <!-- <link href="../../dist/css/style.min.css" rel="stylesheet"> -->
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>


<body>


    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div id="main-wrapper">

        @section('header')

        <header class="topbar" data-navbarbg="skin5">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header" data-logobg="skin5">
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <a class="navbar-brand" href="{{url('admin-control/dashboard')}}" style="border-bottom: 1px solid #fff;">


                        <span class="logo-text" style="font-family: sans;">
                            <!-- dark Logo text -->
                            <img src="{{url('imgs/'.$setting->logo) }}" alt="logo" class="light-logo ml-5" width="60" style="padding: 3px;" />
                            <!-- <img src="{{url('admin/imgs/logo-text.png')}}" alt="homepage" class="light-logo" /> -->
                        </span>
                        <!-- Logo icon -->

                    </a>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Toggle which is visible on mobile only -->
                    <!-- ============================================================== -->
                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i class="ti-more"></i></a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-left mr-auto">
                        <li class="nav-item d-none d-md-block"><a class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)" data-sidebartype="mini-sidebar"><i class="mdi mdi-menu font-24"></i></a></li>
                        <!-- ============================================================== -->
                        <!-- create new -->
                        <!-- ============================================================== -->

                    </ul>
                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-right">
                        <!-- ============================================================== -->
                        <!-- Comment -->
                        <!-- ============================================================== -->

                        <!-- ============================================================== -->
                        <!-- End Messages -->
                        <!-- ============================================================== -->

                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="{{url('admin/imgs/users/1.jpg')}}" alt="user" class="rounded-circle" width="31"></a>
                            <div class="dropdown-menu dropdown-menu-right user-dd animated">
                                <!-- <a class="dropdown-item" href="javascript:void(0)"><i class="ti-user m-r-5 m-l-5"></i> My Profile</a>
                                <a class="dropdown-item" href="javascript:void(0)"><i class="ti-wallet m-r-5 m-l-5"></i> My Balance</a> -->
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{url('admin-control/change-password')}}"><i class="ti-email m-r-5 m-l-5"></i> Change Password</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{url('admin-control/setting/edit/1')}}"><i class="ti-settings m-r-5 m-l-5"></i> Setting</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{url('admin-control/logout')}}"><i class="fa fa-power-off m-r-5 m-l-5"></i> Logout</a>

                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                    </ul>
                </div>
            </nav>
        </header>
        @show



        <aside class="left-sidebar" data-sidebarbg="skin5">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav" class="p-t-30">
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{url('admin-control/')}}" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Dashboard</span></a></li>

                        <!-- <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-receipt"></i><span class="hide-menu">Service</span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="{{url('admin-control/service/add')}}" class="sidebar-link"><i class="mdi mdi-note-outline"></i><span class="hide-menu"> Add </span></a></li>
                                <li class="sidebar-item"><a href="{{url('admin-control/service/')}}" class="sidebar-link"><i class="mdi mdi-note-plus"></i><span class="hide-menu"> View </span></a></li>
                            </ul>
                        </li> -->
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-file-tree"></i><span class="hide-menu">Inquiry</span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="{{url('admin-control/inquiry/pending')}}" class="sidebar-link"><i class="mdi mdi-note-outline"></i><span class="hide-menu">Pending</span></a></li>
                                <li class="sidebar-item"><a href="{{url('admin-control/inquiry/in-progress')}}" class="sidebar-link"><i class="mdi mdi-note-plus"></i><span class="hide-menu"> In-progress </span></a></li>
                                <li class="sidebar-item"><a href="{{url('admin-control/inquiry/confirmed')}}" class="sidebar-link"><i class="mdi mdi-note-plus"></i><span class="hide-menu"> Confirmed </span></a></li>
                            </ul>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-file-tree"></i><span class="hide-menu">Category</span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="{{url('admin-control/category/add')}}" class="sidebar-link"><i class="mdi mdi-note-outline"></i><span class="hide-menu"> Add </span></a></li>
                                <li class="sidebar-item"><a href="{{url('admin-control/category/')}}" class="sidebar-link"><i class="mdi mdi-note-plus"></i><span class="hide-menu"> View </span></a></li>
                            </ul>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-receipt"></i><span class="hide-menu">Product</span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="{{url('admin-control/product/add')}}" class="sidebar-link"><i class="mdi mdi-note-outline"></i><span class="hide-menu"> Add </span></a></li>
                                <li class="sidebar-item"><a href="{{url('admin-control/product/')}}" class="sidebar-link"><i class="mdi mdi-note-plus"></i><span class="hide-menu"> View </span></a></li>
                            </ul>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-receipt"></i><span class="hide-menu">Blog</span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="{{url('admin-control/blog/add')}}" class="sidebar-link"><i class="mdi mdi-note-outline"></i><span class="hide-menu"> Add </span></a></li>
                                <li class="sidebar-item"><a href="{{url('admin-control/blog/')}}" class="sidebar-link"><i class="mdi mdi-note-plus"></i><span class="hide-menu"> View </span></a></li>
                            </ul>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="icon-question"></i><span class="hide-menu">Faqs</span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="{{url('admin-control/faqs/add')}}" class="sidebar-link"><i class="mdi mdi-note-outline"></i><span class="hide-menu"> Add </span></a></li>
                                <li class="sidebar-item"><a href="{{url('admin-control/faqs/')}}" class="sidebar-link"><i class="mdi mdi-note-plus"></i><span class="hide-menu"> View </span></a></li>
                            </ul>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{url('admin-control/about/edit/1')}}" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">About us</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-account-settings-variant"></i><span class="hide-menu">Setting</span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="{{url('admin-control/setting/edit/1')}}" class="sidebar-link"><i class="mdi mdi-note-outline"></i><span class="hide-menu"> Ganeral Setting </span></a></li>
                                <!--<li class="sidebar-item"><a href="#" class="sidebar-link"><i class="mdi mdi-note-plus"></i><span class="hide-menu"> View </span></a></li>-->
                                <li class="sidebar-item"><a href="{{url('admin-control/change-password')}}" class="sidebar-link"><i class="ti-email m-r-5 m-l-5"></i><span class="hide-menu">Change Password </span></a></li>
                            </ul>
                        </li>

                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('country.index')}}" aria-expanded="false"><i class="icon-flag"></i><span class="hide-menu">Country</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('city.index')}}" aria-expanded="false"><i class="icon-flag"></i><span class="hide-menu">City</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{url('admin-control/logout')}}" aria-expanded="false"><i class="fa fa-power-off"></i><span class="hide-menu">Logout</span></a></li>




                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>


        @yield('contant')





        <div class="container">

        </div>

        @section('footer')

        @show

        {{ Html::script('admin/js/validation.js') }}
        {{ Html::script('admin/js/jquery.min.js') }}
        {{ Html::script('admin/js/popper.min.js') }}
        {{ Html::script('admin/js/bootstrap.min.js') }}
        {{ Html::script('admin/js/perfect-scrollbar.jquery.min.js') }}
        <!-- {{ Html::script('admin/js/perfect-scrollbar.jquery.min.js') }} -->
        {{ Html::script('admin/js/sparkline.js') }}
        {{ Html::script('admin/js/waves.js') }}
        {{ Html::script('admin/js/sidebarmenu.js') }}
        {{ Html::script('admin/js/custom.min.js') }}
        <!-- {{ Html::script('admin/js/waves.js') }} -->
        {{ Html::script('admin/js/excanvas.js') }}
        {{ Html::script('admin/js/jquery.flot.js') }}
        {{ Html::script('admin/js/jquery.flot.pie.js') }}
        {{ Html::script('admin/js/jquery.flot.time.js') }}
        {{ Html::script('admin/js/jquery.flot.stack.js') }}
        {{ Html::script('admin/js/jquery.flot.crosshair.js') }}
        {{ Html::script('admin/js/jquery.flot.tooltip.min.js') }}
        {{ Html::script('admin/js/chart-page-init.js') }}
        {{ Html::script('admin/js/voucher-codes.js') }}
        {{ Html::script('admin/js/tinymce.min.js') }}
        <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript">
            // Editor TinyMCE
            tinymce.init({
                selector: '.editor',
                plugins: "code, link, image, textcolor, emoticons, hr, lists, charmap, table, tiny_mce_wiris, fullscreen",
                fontsizeselect: true,
                browser_spellcheck: true,
                menubar: false,
                toolbar: 'bold italic underline strikethrough |formatselect h1 h2 h3 h4 link | table hr superscript subscript | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | uploadImageButton | code | fullscreen',

                // forced_root_block : 'div',
                branding: false,
                protect: [
                    /\<\/?(if|endif)\>/g, // Protect <if> & </endif>
                    /\<xsl\:[^>]+\>/g, // Protect <xsl:...>
                    /\<script\:[^>]+\>/g, // Protect <xsl:...>
                    /<\?php.*?\?>/g // Protect php code
                ],
                images_upload_credentials: true,
                file_browser_callback_types: 'image',
                image_dimensions: true,
                automatic_uploads: true,

                relative_urls: false,
                remove_script_host: false,
                // font_format: "devlys 010normal=devlys 010normal",
                setup: function(editor) {
                    // editor.ui.registry.addButton('uploadImageButton', {
                    // icon: 'image',
                    // onAction: function(_) {
                    // $('#mediaModal').modal('show');
                    // }
                    // });
                }
            });
        </script>

        <script>
            $(document).ready(function() {
                $('#table_id').DataTable();
            });

            function handleDelete(id) {
                var deletename = $('#deletename').val();
                var form = document.getElementById('deleteFormModal')
                form.action = '/admin-control/' + deletename + '/' + id
                $('#deleteModal').modal('show')
            }

            function addcity(id) {
                var form1 = document.getElementById('cityFormModal')
                form1.action = '/admin-control/product/product-city/' + id
                $('#cityModal').modal('show')
            }

            function addcountry(id) {
                var form2 = document.getElementById('countryFormModal')
                form2.action = '/admin-control/product/product-country/' + id
                $('#countryModal').modal('show')
            }
        </script>

</body>

</html>