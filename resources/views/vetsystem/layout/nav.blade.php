<header class="header dark-bg">
    <div class="toggle-nav">
        <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="icon_menu"></i></div>
    </div>

    <!--logo start-->
    <a href="index.html" class="logo">vet <span class="lite">Portugal</span></a>
    <!--logo end-->

    <div class="nav search-row" id="top_menu">
        <!--  search form start -->
        <ul class="nav top-menu">
            <li>
                <form class="navbar-form">
                    <input class="form-control" placeholder="Buscar" type="text">
                </form>
            </li>
        </ul>
        <!--  search form end -->
    </div>

    <div class="top-nav notification-row">
        <!-- notificatoin dropdown start-->
        <ul class="nav pull-right top-menu">

            <!-- task notificatoin start -->
            <li id="task_notificatoin_bar" class="dropdown">
                <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                    <i class=" fa fa-syringe" ></i>
                    <span class="badge bg-important">6</span>
                </a>
                <ul class="dropdown-menu extended tasks-bar">
                    <div class="notify-arrow notify-arrow-blue"></div>
                    <li>
                        <p class="blue">You have 6 pending letter</p>
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

            </li>
            <!-- inbox notificatoin end -->
            <!-- alert notification start-->
            <li id="alert_notificatoin_bar" class="dropdown">
                <a data-toggle="dropdown" class="dropdown-toggle" href="#">

                    <i class="fa fa-bell"></i>
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
                                <!--IMAGEN DE PERFIL-->
                            </span>
                    <span class="username">{{auth()->user()->name}}</span>
                    <b class="caret"></b>
                </a>
                <ul class="dropdown-menu  logout">
                    <li>
                        <a href="{{ url('/option') }}"><i class="fas fa-exchange-alt"></i> Aplicaciones</a>

                    </li>
                    <li>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" ><i class="fas fa-power-off"></i> Salir</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
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

            @include('partials.navigations.' .\App\User::navigation())

        </ul>
        <!-- sidebar menu end-->
    </div>
</aside>
<!--sidebar end-->


