<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html;charset=utf8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Pro - Gestionnaire du centre ATS">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>ATS Repair Center</title>

        <link href="/css/bootstrap.min.css" rel="stylesheet">
        <link href="/font-awesome/css/font-awesome.css" rel="stylesheet">

        <!-- Toastr style -->
        <link href="/css/plugins/toastr/toastr.min.css" rel="stylesheet">

        <!-- FooTable -->
        <link href="/css/plugins/footable/footable.core.css" rel="stylesheet">
        <!-- Chosen -->
        <link href="/css/plugins/chosen/chosen.css" rel="stylesheet">
        <!-- Gritter -->
        <link href="/js/plugins/gritter/jquery.gritter.css" rel="stylesheet">
        <link href="/css/plugins/datapicker/datepicker3.css" rel="stylesheet">
        <link href="/css/animate.css" rel="stylesheet">
        <link href="/css/style.css" rel="stylesheet">

        <!-- Data Tables -->
        <link href="/css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
        <link href="/css/plugins/dataTables/dataTables.responsive.css" rel="stylesheet">
        <link href="/css/plugins/dataTables/dataTables.tableTools.min.css" rel="stylesheet">

        <!-- ATS Custom -->
        <link href="/css/ats.css" rel="stylesheet">
        @yield('top')

    </head>
    <body class=" pace-done"><div class="pace  pace-inactive"><div class="pace-progress" data-progress-text="100%" data-progress="99" style="transform: translate3d(100%, 0px, 0px);">
            <div class="pace-progress-inner"></div>
        </div>
        <div class="pace-activity"></div></div>
    <div id="wrapper">
        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav metismenu" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element">
                            <span class="adapt">
                                <img alt="image" class="img-circle" src="/img/img_generic_person.jpg">

                            </span>
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">{!! Auth::user()->name !!}</strong>
                             </span> <span class="text-muted text-xs block">Technicien <b class="caret"></b></span> </span> </a>
                            <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                <li><a href="/profile">Profile</a></li>
                                <li><a href="/technicien/notes">Notes</a></li>
                                <li class="divider"></li>
                                <li><a href="/auth/logout">Logout</a></li>
                            </ul>
                        </div>
                        <div class="logo-element">
                            ATS
                        </div>
                    </li>
                    <li class=" {{ isset($leftmenu['dashboard']) ? $leftmenu['dashboard'] : '' }}">
                        <a href="/dashboard"><i class="fa fa-tachometer"></i> <span class="nav-label">Dashboard</span></a>
                    </li>
                    <li class=" {{ isset($leftmenu['files']) ? $leftmenu['files'] : '' }}" >
                        <a href="/files"><i class="fa fa-th-large"></i> <span class="nav-label">Fiches</span></a>
                    </li>
                    <li class=" {{ isset($leftmenu['client']) ? $leftmenu['client'] : '' }}">
                        <a href="/clients"><i class="fa fa-user"></i> <span class="nav-label">Clients</span></a>
                    </li>
                    <li class=" {{ isset($leftmenu['supplier']) ? $leftmenu['supplier'] : '' }}">
                        <a href="/suppliers"><i class="fa fa-user"></i> <span class="nav-label">Fournisseurs</span></a>
                    </li>
                    <li class=" {{ isset($leftmenu['devices']) ? $leftmenu['devices'] : '' }}">
                        <a href="/devices"><i class="fa fa-television"></i> <span class="nav-label">Appareils</span></a>
                    </li>
                    <li class=" {{ isset($leftmenu['model']) ? $leftmenu['model'] : '' }}">
                        <a href="/modele"><i class="fa fa-tag"></i> <span class="nav-label">Modèles</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse {{ isset($leftmenu['model']) ? $leftmenu['model'] : '' }}">
                            <li class="{{ isset($leftmenu['model_gerer']) ? $leftmenu['model_gerer'] : '' }}"><a href="/modele">Gérer</a></li>
                            <li class="{{ isset($leftmenu['model_cat']) ? $leftmenu['model_cat'] : '' }}"><a href="/category-model">Catégorie / Marque</a></li>
                            <li class="{{ isset($leftmenu['model_article']) ? $leftmenu['model_article'] : '' }}"><a href="/articles">Articles</a></li>
                        </ul>
                    </li>

                    @if(Auth::user()['is_admin'])
                        <li class=" {{ isset($leftmenu['status']) ? $leftmenu['status'] : '' }}">
                            <a href="/status"><i class="fa fa-commenting"></i> <span class="nav-label">Statuts</span><span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level collapse {{ isset($leftmenu['status']) ? $leftmenu['status'] : '' }}">
                                <li class=" {{ isset($leftmenu['status-groups']) ? $leftmenu['status-groups'] : '' }}"><a href="/status/groups">Groupes</a></li>
                                <li class=" {{ isset($leftmenu['status-codes']) ? $leftmenu['status-codes'] : '' }}"><a href="/status/codes">Codes</a></li>
                            </ul>
                        </li>


                        <li class=" {{ isset($leftmenu['tech']) ? $leftmenu['tech'] : '' }}">
                            <a href="/new-user"><i class="fa fa-plus"></i> <span class="nav-label">Technicien</span></a>
                        </li>
                    @endif





                </ul>

            </div>
        </nav>

        <div id="page-wrapper" class="gray-bg dashbard-1" style="min-height: 775px;">
            <div class="row border-bottom">
                <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                    <div class="navbar-header">
                        <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
                        <form id="massivesearchform" role="search" class="navbar-form-custom" action="/file" method="post">
                            <div class="form-group">
                                <input type="text" placeholder="Rechercher fiche..." class="form-control" name="top_search" id="top_search" required>
                                <input type="hidden" value="massiveSearch" name="_action">
                                {{csrf_field()}}
                            </div>
                        </form>
                    </div>
                    <ul class="nav navbar-top-links navbar-right">
                        <li>
                            <div id="miscellanous">
                                <i class="fa fa-clock-o"></i>&nbsp;<span class="m-r-sm text-muted welcome-message" id="ats-time"></span>
                                <br><i class="fa fa-calendar-minus-o"></i><span class="m-r-sm text-muted welcome-message"> {{ $today = date("d/m/Y") }}</span>
                            </div>

                        </li>
                        <li class="dropdown">
                            <a class="dropdown-toggle count-info"  href="/technicien/notes">
                                <i class="fa fa-envelope"></i>  <span class="label label-warning">@if( session()->has('countnote') ){{session('countnote')}} @else 0 @endif</span>
                            </a>
                        </li>



                        <li>
                            <a href="/auth/logout">
                                <i class="fa fa-sign-out"></i> Log out
                            </a>
                        </li>

                    </ul>

                </nav>
            </div>
            <div class="row  border-bottom white-bg dashboard-header">
                @yield('special-action')
            </div>
            <div class="wrapper wrapper-content  animated fadeInRight">
                <div class="row">
                    @yield('content')
                </div>
            </div>


        </div>

        <div id="right-sidebar">
            <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 100%;">
                <div class="sidebar-container" style="overflow: hidden; width: auto; height: 100%;">

                    <ul class="nav nav-tabs navs-3">

                        <li class="active"><a data-toggle="tab" href="#tab-1">
                                Notes
                            </a></li>
                        <li><a data-toggle="tab" href="#tab-2">
                                Projects
                            </a></li>
                        <li class=""><a data-toggle="tab" href="#tab-3">
                                <i class="fa fa-gear"></i>
                            </a></li>
                    </ul>

                    <div class="tab-content">


                        <div id="tab-1" class="tab-pane active">

                            <div class="sidebar-title">
                                <h3> <i class="fa fa-comments-o"></i> Latest Notes</h3>
                                <small><i class="fa fa-tim"></i> You have 10 new message.</small>
                            </div>

                            <div>

                                <div class="sidebar-message">
                                    <a href="#">
                                        <div class="pull-left text-center">
                                            <img alt="image" class="img-circle message-avatar" src="/img/a1.jpg">

                                            <div class="m-t-xs">
                                                <i class="fa fa-star text-warning"></i>
                                                <i class="fa fa-star text-warning"></i>
                                            </div>
                                        </div>
                                        <div class="media-body">

                                            There are many variations of passages of Lorem Ipsum available.
                                            <br>
                                            <small class="text-muted">Today 4:21 pm</small>
                                        </div>
                                    </a>
                                </div>
                                <div class="sidebar-message">
                                    <a href="#">
                                        <div class="pull-left text-center">
                                            <img alt="image" class="img-circle message-avatar" src="/img/a2.jpg">
                                        </div>
                                        <div class="media-body">
                                            The point of using Lorem Ipsum is that it has a more-or-less normal.
                                            <br>
                                            <small class="text-muted">Yesterday 2:45 pm</small>
                                        </div>
                                    </a>
                                </div>
                                <div class="sidebar-message">
                                    <a href="#">
                                        <div class="pull-left text-center">
                                            <img alt="image" class="img-circle message-avatar" src="/img/a3.jpg">

                                            <div class="m-t-xs">
                                                <i class="fa fa-star text-warning"></i>
                                                <i class="fa fa-star text-warning"></i>
                                                <i class="fa fa-star text-warning"></i>
                                            </div>
                                        </div>
                                        <div class="media-body">
                                            Mevolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
                                            <br>
                                            <small class="text-muted">Yesterday 1:10 pm</small>
                                        </div>
                                    </a>
                                </div>
                                <div class="sidebar-message">
                                    <a href="#">
                                        <div class="pull-left text-center">
                                            <img alt="image" class="img-circle message-avatar" src="/img/a4.jpg">
                                        </div>

                                        <div class="media-body">
                                            Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the
                                            <br>
                                            <small class="text-muted">Monday 8:37 pm</small>
                                        </div>
                                    </a>
                                </div>
                                <div class="sidebar-message">
                                    <a href="#">
                                        <div class="pull-left text-center">
                                            <img alt="image" class="img-circle message-avatar" src="/img/a8.jpg">
                                        </div>
                                        <div class="media-body">

                                            All the Lorem Ipsum generators on the Internet tend to repeat.
                                            <br>
                                            <small class="text-muted">Today 4:21 pm</small>
                                        </div>
                                    </a>
                                </div>
                                <div class="sidebar-message">
                                    <a href="#">
                                        <div class="pull-left text-center">
                                            <img alt="image" class="img-circle message-avatar" src="/img/a7.jpg">
                                        </div>
                                        <div class="media-body">
                                            Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.
                                            <br>
                                            <small class="text-muted">Yesterday 2:45 pm</small>
                                        </div>
                                    </a>
                                </div>
                                <div class="sidebar-message">
                                    <a href="#">
                                        <div class="pull-left text-center">
                                            <img alt="image" class="img-circle message-avatar" src="/img/a3.jpg">

                                            <div class="m-t-xs">
                                                <i class="fa fa-star text-warning"></i>
                                                <i class="fa fa-star text-warning"></i>
                                                <i class="fa fa-star text-warning"></i>
                                            </div>
                                        </div>
                                        <div class="media-body">
                                            The standard chunk of Lorem Ipsum used since the 1500s is reproduced below.
                                            <br>
                                            <small class="text-muted">Yesterday 1:10 pm</small>
                                        </div>
                                    </a>
                                </div>
                                <div class="sidebar-message">
                                    <a href="#">
                                        <div class="pull-left text-center">
                                            <img alt="image" class="img-circle message-avatar" src="/img/a4.jpg">
                                        </div>
                                        <div class="media-body">
                                            Uncover many web sites still in their infancy. Various versions have.
                                            <br>
                                            <small class="text-muted">Monday 8:37 pm</small>
                                        </div>
                                    </a>
                                </div>
                            </div>

                        </div>

                        <div id="tab-2" class="tab-pane">

                            <div class="sidebar-title">
                                <h3> <i class="fa fa-cube"></i> Latest projects</h3>
                                <small><i class="fa fa-tim"></i> You have 14 projects. 10 not completed.</small>
                            </div>

                            <ul class="sidebar-list">
                                <li>
                                    <a href="#">
                                        <div class="small pull-right m-t-xs">9 hours ago</div>
                                        <h4>Business valuation</h4>
                                        It is a long established fact that a reader will be distracted.

                                        <div class="small">Completion with: 22%</div>
                                        <div class="progress progress-mini">
                                            <div style="width: 22%;" class="progress-bar progress-bar-warning"></div>
                                        </div>
                                        <div class="small text-muted m-t-xs">Project end: 4:00 pm - 12.06.2014</div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <div class="small pull-right m-t-xs">9 hours ago</div>
                                        <h4>Contract with Company </h4>
                                        Many desktop publishing packages and web page editors.

                                        <div class="small">Completion with: 48%</div>
                                        <div class="progress progress-mini">
                                            <div style="width: 48%;" class="progress-bar"></div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <div class="small pull-right m-t-xs">9 hours ago</div>
                                        <h4>Meeting</h4>
                                        By the readable content of a page when looking at its layout.

                                        <div class="small">Completion with: 14%</div>
                                        <div class="progress progress-mini">
                                            <div style="width: 14%;" class="progress-bar progress-bar-info"></div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="label label-primary pull-right">NEW</span>
                                        <h4>The generated</h4>
                                        <!--<div class="small pull-right m-t-xs">9 hours ago</div>-->
                                        There are many variations of passages of Lorem Ipsum available.
                                        <div class="small">Completion with: 22%</div>
                                        <div class="small text-muted m-t-xs">Project end: 4:00 pm - 12.06.2014</div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <div class="small pull-right m-t-xs">9 hours ago</div>
                                        <h4>Business valuation</h4>
                                        It is a long established fact that a reader will be distracted.

                                        <div class="small">Completion with: 22%</div>
                                        <div class="progress progress-mini">
                                            <div style="width: 22%;" class="progress-bar progress-bar-warning"></div>
                                        </div>
                                        <div class="small text-muted m-t-xs">Project end: 4:00 pm - 12.06.2014</div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <div class="small pull-right m-t-xs">9 hours ago</div>
                                        <h4>Contract with Company </h4>
                                        Many desktop publishing packages and web page editors.

                                        <div class="small">Completion with: 48%</div>
                                        <div class="progress progress-mini">
                                            <div style="width: 48%;" class="progress-bar"></div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <div class="small pull-right m-t-xs">9 hours ago</div>
                                        <h4>Meeting</h4>
                                        By the readable content of a page when looking at its layout.

                                        <div class="small">Completion with: 14%</div>
                                        <div class="progress progress-mini">
                                            <div style="width: 14%;" class="progress-bar progress-bar-info"></div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="label label-primary pull-right">NEW</span>
                                        <h4>The generated</h4>
                                        <!--<div class="small pull-right m-t-xs">9 hours ago</div>-->
                                        There are many variations of passages of Lorem Ipsum available.
                                        <div class="small">Completion with: 22%</div>
                                        <div class="small text-muted m-t-xs">Project end: 4:00 pm - 12.06.2014</div>
                                    </a>
                                </li>

                            </ul>

                        </div>

                        <div id="tab-3" class="tab-pane">

                            <div class="sidebar-title">
                                <h3><i class="fa fa-gears"></i> Settings</h3>
                                <small><i class="fa fa-tim"></i> You have 14 projects. 10 not completed.</small>
                            </div>

                            <div class="setings-item">
                    <span>
                        Show notifications
                    </span>
                                <div class="switch">
                                    <div class="onoffswitch">
                                        <input type="checkbox" name="collapsemenu" class="onoffswitch-checkbox" id="example">
                                        <label class="onoffswitch-label" for="example">
                                            <span class="onoffswitch-inner"></span>
                                            <span class="onoffswitch-switch"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="setings-item">
                    <span>
                        Disable Chat
                    </span>
                                <div class="switch">
                                    <div class="onoffswitch">
                                        <input type="checkbox" name="collapsemenu" checked="" class="onoffswitch-checkbox" id="example2">
                                        <label class="onoffswitch-label" for="example2">
                                            <span class="onoffswitch-inner"></span>
                                            <span class="onoffswitch-switch"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="setings-item">
                    <span>
                        Enable history
                    </span>
                                <div class="switch">
                                    <div class="onoffswitch">
                                        <input type="checkbox" name="collapsemenu" class="onoffswitch-checkbox" id="example3">
                                        <label class="onoffswitch-label" for="example3">
                                            <span class="onoffswitch-inner"></span>
                                            <span class="onoffswitch-switch"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="setings-item">
                    <span>
                        Show charts
                    </span>
                                <div class="switch">
                                    <div class="onoffswitch">
                                        <input type="checkbox" name="collapsemenu" class="onoffswitch-checkbox" id="example4">
                                        <label class="onoffswitch-label" for="example4">
                                            <span class="onoffswitch-inner"></span>
                                            <span class="onoffswitch-switch"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="setings-item">
                    <span>
                        Offline users
                    </span>
                                <div class="switch">
                                    <div class="onoffswitch">
                                        <input type="checkbox" checked="" name="collapsemenu" class="onoffswitch-checkbox" id="example5">
                                        <label class="onoffswitch-label" for="example5">
                                            <span class="onoffswitch-inner"></span>
                                            <span class="onoffswitch-switch"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="setings-item">
                    <span>
                        Global search
                    </span>
                                <div class="switch">
                                    <div class="onoffswitch">
                                        <input type="checkbox" checked="" name="collapsemenu" class="onoffswitch-checkbox" id="example6">
                                        <label class="onoffswitch-label" for="example6">
                                            <span class="onoffswitch-inner"></span>
                                            <span class="onoffswitch-switch"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="setings-item">
                    <span>
                        Update everyday
                    </span>
                                <div class="switch">
                                    <div class="onoffswitch">
                                        <input type="checkbox" name="collapsemenu" class="onoffswitch-checkbox" id="example7">
                                        <label class="onoffswitch-label" for="example7">
                                            <span class="onoffswitch-inner"></span>
                                            <span class="onoffswitch-switch"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="sidebar-content">
                                <h4>Settings</h4>
                                <div class="small">
                                    I belive that. Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                    And typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.
                                    Over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
                                </div>
                            </div>

                        </div>
                    </div>

                </div><div class="slimScrollBar" style="width: 7px; position: absolute; top: 0px; opacity: 0.4; display: block; border-radius: 7px; z-index: 99; right: 1px; height: 531.038px; background: rgb(0, 0, 0);"></div><div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; opacity: 0.4; z-index: 90; right: 1px; background: rgb(51, 51, 51);"></div></div>



        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="/js/jquery-2.1.1.js"></script>
    <script src="/js/bootstrap.min.js"></script>



    <!-- Flot -->
    <script src="/js/plugins/flot/jquery.flot.js"></script>
    <script src="/js/plugins/flot/jquery.flot.tooltip.min.js"></script>
    <script src="/js/plugins/flot/jquery.flot.spline.js"></script>
    <script src="/js/plugins/flot/jquery.flot.resize.js"></script>
    <script src="/js/plugins/flot/jquery.flot.pie.js"></script>

    <!-- Peity -->
    <script src="/js/plugins/peity/jquery.peity.min.js"></script>
    <script src="/js/demo/peity-demo.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="/js/inspinia.js"></script>
    <script src="/js/plugins/pace/pace.min.js"></script>
    <script src="/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <!-- Chosen -->
    <script src="/js/plugins/chosen/chosen.jquery.js"></script>
    <script src="/js/plugins/metisMenu/jquery.metisMenu.js"></script>

    <!-- jQuery UI -->
    <script src="/js/plugins/jquery-ui/jquery-ui.min.js"></script>

    <!-- GITTER -->
    <script src="/js/plugins/gritter/jquery.gritter.min.js"></script>

    <!-- Sparkline -->
    <script src="/js/plugins/sparkline/jquery.sparkline.min.js"></script>

    <!-- Sparkline demo data  -->
    <script src="/js/demo/sparkline-demo.js"></script>

    <!-- ChartJS-->
    <script src="/js/plugins/chartJs/Chart.min.js"></script>

    <!-- Toastr -->
    <script src="/js/plugins/toastr/toastr.min.js"></script>

    <!-- Data picker -->
    <script src="/js/plugins/datapicker/bootstrap-datepicker.js"></script>

    <!-- FooTable -->
    <script src="/js/plugins/footable/footable.all.min.js"></script>

    <!-- Printthis -->
    <script src="/js/printThis.js"></script>

    <script>
        $(document).ready(function(){

                toastr.options = {
                    closeButton: true,
                    progressBar: true,
                    showMethod: 'slideDown',
                    timeOut: 4000
                };


            (function startTime() {


                var today = new Date();
                var h = today.getHours();
                var m = today.getMinutes();
                var s = today.getSeconds();
                h = checkTime(h);
                m = checkTime(m);
                s = checkTime(s);
                document.getElementById('ats-time').innerHTML = h + ":" + m + ":" + s;

                var t = setTimeout(startTime, 500);
            })();


            function checkTime(i) {
                if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
                return i;
            }

        });



        $.ajaxSetup({ headers: { 'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content') } });

    </script>
    @include('flash')


    @yield('script.client')
    @yield('script.modele')
    @yield('script.category')
    @yield('script.groups')
    @yield('script.codes')
    @yield('script.articles')
    @yield('script.notes')
    @yield('script.files')
    @yield('javascript')

    </body>
</html>
