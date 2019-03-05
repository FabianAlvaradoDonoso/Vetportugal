<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Aplicación web para la gestion de Perfiles Clinicos de la Veterinaria Portugal">
    <meta name="keyword" content="Vetportugal, veterinario, mascotas, cuidadoresponsable">
    <link href="{{asset('veticon.ico')}}" rel="icon">


    <title>Plataforma de Gestión de Perfiles Clínicos</title>

    <!-- Bootstrap CSS -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="{{asset('css/bootstrap-theme.css')}}" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="{{asset('css/elegant-icons-style.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href={{asset('fontawesome/css/all.css')}} rel="stylesheet">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    <link href="{{asset('css/style-responsive.css')}}" rel="stylesheet" />
    <link href="{{asset('css/jquery-ui-1.10.4.min.css')}}" rel="stylesheet">
    @yield('css')
</head>

<body>
  <!-- container section start -->
    <section id="container" class="">
        <!--header start-->

        <header class="header dark-bg">
        <div class="toggle-nav">
            <div class="icon-reorder tooltips" data-original-title="Esconder Barra Lateral" data-placement="bottom"><i class="icon_menu"></i></div>
        </div>

        <!--logo start-->
        <a href="index.html" class="logo">Vet <span class="lite">Portugal</span></a>
        <!--logo end-->

        <div class="top-nav notification-row">
            <!-- notificatoin dropdown start-->
            <ul class="nav pull-right top-menu">

            <!-- task notificatoin start -->
            <li id="task_notificatoin_bar" class="dropdown">
                <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <i class="icon-task-l"></i>
                                <span class="badge bg-important">5</span>
                            </a>
                <ul class="dropdown-menu extended tasks-bar">
                <div class="notify-arrow notify-arrow-blue"></div>
                <li>
                    <p class="blue">You have 5 pending tasks</p>
                </li>
                <li>
                    <a href="#">
                    <div class="task-info">
                        <div class="desc">Design PSD </div>
                        <div class="percent">90%</div>
                    </div>
                    <div class="progress progress-striped">
                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width: 90%">
                        <span class="sr-only">90% Complete (success)</span>
                        </div>
                    </div>
                    </a>
                </li>
                <li>
                    <a href="#">
                    <div class="task-info">
                        <div class="desc">
                        Project 1
                        </div>
                        <div class="percent">30%</div>
                    </div>
                    <div class="progress progress-striped">
                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" style="width: 30%">
                        <span class="sr-only">30% Complete (warning)</span>
                        </div>
                    </div>
                    </a>
                </li>
                <li>
                    <a href="#">
                    <div class="task-info">
                        <div class="desc">Digital Marketing</div>
                        <div class="percent">80%</div>
                    </div>
                    <div class="progress progress-striped">
                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                        <span class="sr-only">80% Complete</span>
                        </div>
                    </div>
                    </a>
                </li>
                <li>
                    <a href="#">
                    <div class="task-info">
                        <div class="desc">Logo Designing</div>
                        <div class="percent">78%</div>
                    </div>
                    <div class="progress progress-striped">
                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="78" aria-valuemin="0" aria-valuemax="100" style="width: 78%">
                        <span class="sr-only">78% Complete (danger)</span>
                        </div>
                    </div>
                    </a>
                </li>
                <li>
                    <a href="#">
                    <div class="task-info">
                        <div class="desc">Mobile App</div>
                        <div class="percent">50%</div>
                    </div>
                    <div class="progress progress-striped active">
                        <div class="progress-bar" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%">
                        <span class="sr-only">50% Complete</span>
                        </div>
                    </div>

                    </a>
                </li>
                <li class="external">
                    <a href="#">See All Tasks</a>
                </li>
                </ul>
            </li>
            <!-- task notificatoin end -->
            <!-- inbox notificatoin start-->
            <li id="mail_notificatoin_bar" class="dropdown">
                <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <i class="icon-envelope-l"></i>
                                <span class="badge bg-important">5</span>
                            </a>
                <ul class="dropdown-menu extended inbox">
                <div class="notify-arrow notify-arrow-blue"></div>
                <li>
                    <p class="blue">You have 5 new messages</p>
                </li>
                <li>
                    <a href="#">
                                        <span class="photo"><img alt="avatar" src="./img/avatar-mini.jpg"></span>
                                        <span class="subject">
                                        <span class="from">Greg  Martin</span>
                                        <span class="time">1 min</span>
                                        </span>
                                        <span class="message">
                                            I really like this admin panel.
                                        </span>
                                    </a>
                </li>
                <li>
                    <a href="#">
                                        <span class="photo"><img alt="avatar" src="./img/avatar-mini2.jpg"></span>
                                        <span class="subject">
                                        <span class="from">Bob   Mckenzie</span>
                                        <span class="time">5 mins</span>
                                        </span>
                                        <span class="message">
                                        Hi, What is next project plan?
                                        </span>
                                    </a>
                </li>
                <li>
                    <a href="#">
                                        <span class="photo"><img alt="avatar" src="./img/avatar-mini3.jpg"></span>
                                        <span class="subject">
                                        <span class="from">Phillip   Park</span>
                                        <span class="time">2 hrs</span>
                                        </span>
                                        <span class="message">
                                            I am like to buy this Admin Template.
                                        </span>
                                    </a>
                </li>
                <li>
                    <a href="#">
                                        <span class="photo"><img alt="avatar" src="./img/avatar-mini4.jpg"></span>
                                        <span class="subject">
                                        <span class="from">Ray   Munoz</span>
                                        <span class="time">1 day</span>
                                        </span>
                                        <span class="message">
                                            Icon fonts are great.
                                        </span>
                                    </a>
                </li>
                <li>
                    <a href="#">See all messages</a>
                </li>
                </ul>
            </li>
            <!-- inbox notificatoin end -->
            <!-- alert notification start-->
            <li id="alert_notificatoin_bar" class="dropdown">
                <a data-toggle="dropdown" class="dropdown-toggle" href="#">

                                <i class="icon-bell-l"></i>
                                <span class="badge bg-important">7</span>
                            </a>
                <ul class="dropdown-menu extended notification">
                <div class="notify-arrow notify-arrow-blue"></div>
                <li>
                    <p class="blue">You have 4 new notifications</p>
                </li>
                <li>
                    <a href="#">
                                        <span class="label label-primary"><i class="icon_profile"></i></span>
                                        Friend Request
                                        <span class="small italic pull-right">5 mins</span>
                                    </a>
                </li>
                <li>
                    <a href="#">
                                        <span class="label label-warning"><i class="icon_pin"></i></span>
                                        John location.
                                        <span class="small italic pull-right">50 mins</span>
                                    </a>
                </li>
                <li>
                    <a href="#">
                                        <span class="label label-danger"><i class="icon_book_alt"></i></span>
                                        Project 3 Completed.
                                        <span class="small italic pull-right">1 hr</span>
                                    </a>
                </li>
                <li>
                    <a href="#">
                                        <span class="label label-success"><i class="icon_like"></i></span>
                                        Mick appreciated your work.
                                        <span class="small italic pull-right"> Today</span>
                                    </a>
                </li>
                <li>
                    <a href="#">See all notifications</a>
                </li>
                </ul>
            </li>
            <!-- alert notification end-->
            <!-- user login dropdown start-->
            <li class="dropdown">
                <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <span class="profile-ava">
                                    <img alt="" src="img/avatar1_small.jpg">
                                </span>
                                <span class="username">Jenifer Smith</span>
                                <b class="caret"></b>
                            </a>
                <ul class="dropdown-menu extended logout">
                <div class="log-arrow-up"></div>
                <li class="eborder-top">
                    <a href="#"><i class="icon_profile"></i> My Profile</a>
                </li>
                <li>
                    <a href="#"><i class="icon_mail_alt"></i> My Inbox</a>
                </li>
                <li>
                    <a href="#"><i class="icon_clock_alt"></i> Timeline</a>
                </li>
                <li>
                    <a href="#"><i class="icon_chat_alt"></i> Chats</a>
                </li>
                <li>
                    <a href="login.html"><i class="icon_key_alt"></i> Log Out</a>
                </li>
                <li>
                    <a href="documentation.html"><i class="icon_key_alt"></i> Documentation</a>
                </li>
                <li>
                    <a href="documentation.html"><i class="icon_key_alt"></i> Documentation</a>
                </li>
                </ul>
            </li>
            <!-- user login dropdown end -->
            </ul>
            <!-- notificatoin dropdown end-->
        </div>
        </header>
        <!--header end-->

        <!--sidebar start-->
        <aside>
            <div id="sidebar" class="nav-collapse ">
                <!-- sidebar menu start-->
                <ul class="sidebar-menu">
                    <li class="">
                        <a class="" href="{{url('/')}}">
                            <i class="icon_house_alt"></i>
                            <span>Inicio</span>
                        </a>
                    </li>

                    <!-- CLIENTES -->

                    <li class="sub-menu">
                        <a class="" href="">
                            <i class="far fa-user"></i>
                            <span>Cliente</span>
                        </a>

                    </li>

                    <!-- pacientes -->

                    <li class="sub-menu">
                        <a class="" href={{route('pet.index')}}>
                            <i class="fa fa-first-aid"></i>
                            <span>Paciente</span>
                        </a>

                    </li>

                    <!-- Personal -->

                    <li class="sub-menu">
                        <a class="" href={{route('schedule.index')}}>
                            <i class="fa fa-calendar"></i>
                            <span>Citas Vacunación</span>
                        </a>
                    </li>

                    <li class="sub-menu">
                        <a class="" href={{route('vaccine.index')}}>
                            <i class="fa fa-syringe"></i>
                            <span>Vacunas Disponibles</span>
                        </a>

                    </li>

                    <li class="sub-menu">
                        <a class="" href={{route('type.index')}}>
                            <i class="fas fa-paw"></i>
                            <span>Especies</span>
                        </a>

                    </li>

                    <li class="sub-menu">
                        <a class="" href={{route('breed.index')}}>
                            <i class="fas fa-dog"></i>
                            <span>Razas</span>
                        </a>

                    </li>

                </ul>
                <!-- sidebar menu end-->
            </div>

        </aside>
        <!--sidebar end-->

        <!--main content start-->
        <section id="main-content">
            <section class="wrapper">
                @yield('content')
            </section>

        </section>
        <!--main content end-->
        <div class="text-right">
            <div class="credits">
                Diseñado por CFF
            </div>
        </div>
    </section>
    <!-- container section end -->
    <!-- javascripts -->
    <script src="{{asset('js/jquery.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <!-- nice scroll -->
    <script src="{{asset('js/jquery.scrollTo.min.js')}}"></script>
    <script src="{{asset('js/jquery.nicescroll.js')}}" type="text/javascript"></script>
    <!--custome script for all page-->
    <script src="{{asset('js/scripts.js')}}"></script>
    <script src={{asset('fontawesome/js/all.js')}}></script>
    <script src={{asset('bower_components/datatables.net/js/jquery.dataTables.min.js')}}></script>
    <script src={{asset('bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}></script>

    @yield('scripts')


</body>

</html>
