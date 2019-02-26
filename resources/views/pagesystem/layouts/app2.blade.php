<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  @yield('name')
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href={{asset('bower_components/bootstrap/dist/css/bootstrap.min.css')}}>
  <!-- Font Awesome -->
  <link rel="stylesheet" href={{asset('bower_components/font-awesome/css/font-awesome.min.css')}}>
  <!-- Ionicons -->
  <link rel="stylesheet" href={{asset('bower_components/Ionicons/css/ionicons.min.css')}}>
  <!-- Theme style -->
  <link rel="stylesheet" href={{asset('dist/css/AdminLTE.css')}}>
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href={{asset('dist/css/skins/_all-skins.min.css')}}>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  @yield('css')
</head>
<body class="hold-transition skin-purple sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href={{url('/dash')}} class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><img src={{asset('images/logo2.png')}} alt="Logo"></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>RED</b>PANDA</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o"></i>
              <span class="label label-success">4</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 4 messages</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li><!-- start message -->
                    <a href="#">
                      <div class="pull-left">
                        <img src="../../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Support Team
                        <small><i class="fa fa-clock-o"></i> 5 mins</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <!-- end message -->
                </ul>
              </li>
              <li class="footer"><a href="#">See All Messages</a></li>
            </ul>
          </li>
          <!-- Notifications: style can be found in dropdown.less -->
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning">10</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 10 notifications</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-aqua"></i> 5 new members joined today
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="#">View all</a></li>
            </ul>
          </li>
          <!-- Tasks: style can be found in dropdown.less -->
          <li class="dropdown tasks-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-flag-o"></i>
              <span class="label label-danger">9</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 9 tasks</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li><!-- Task item -->
                    <a href="#">
                      <h3>
                        Design some buttons
                        <small class="pull-right">20%</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar"
                             aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">20% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item -->
                </ul>
              </li>
              <li class="footer">
                <a href="#">View all tasks</a>
              </li>
            </ul>
          </li>
          <!-- User Account: style can be found in dropdown.less EN CONSTRUCCION -->
          <li class="dropdown user user-menu">
                @guest
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="../../dist/img/loboPlateado.jpg" class="user-image" alt="User Image">
                        <span class="hidden-xs">Invitado</span>
                      </a>
                      <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header" style="background: url('/dist/img/cielo.png') center center ;">
                          <img src="../../dist/img/loboPlateado.jpg" class="img-circle" alt="User Image">

                          <p class="" style="color: #ffffff">
                              Invitado
                            <small>Sesion de Prueba</small>
                          </p>
                        </li>
                      </ul>
                @else
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="../../dist/img/loboPlateado.jpg" class="user-image" alt="User Image">
                  <span class="hidden-xs">{{ Auth::user()->name }}</span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header" style="background: url('/dist/img/cielo.png') center center ;">
                    <img src="../../dist/img/loboPlateado.jpg" class="img-circle" alt="User Image">

                    <p class="" style="color: #ffffff">
                        {{ Auth::user()->name }}
                      <small>Miembro desde 2019</small>
                    </p>
                  </li>
                  <!-- Menu Body -->
                  <li class="user-body">
                    <div class="row">
                      <div class="col-xs-4 text-center">
                        <a href="#">Seguidores</a>
                      </div>
                      <div class="col-xs-4 text-center">
                        <a href="#">Ventas</a>
                      </div>
                      <div class="col-xs-4 text-center">
                        <a href="#">Amigos</a>
                      </div>
                    </div>
                    <!-- /.row -->
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="#" class="btn btn-info btn-sm">Perfil</a>
                    </div>
                    <div class="pull-right">
                        <a href="{{ route('logout') }}" class="btn btn-danger btn-sm" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Cerrar Sesión</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                  </li>
                </ul>
              </li>
              @endguest
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MENU DE NAVEGACION</li>
        <li>
            <a href={{url('/dash')}}>
                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            </a>
        </li>
        <li class="header">MODIFICACIONES</li>
        <li>
            <a href={{route('category.index')}}>
                <i class="fa fa-tags"></i> <span>Categorías</span>
            </a>
        </li>
        <li>
            <a href={{route('product.index')}}>
                <i class="fa fa-archive"></i> <span>Productos</span>
            </a>
        </li>
        <li class="header">OTROS</li>
        <li><a href="https://adminlte.io/docs"><i class="fa fa-book"></i> <span>Documentation</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
        @yield('body')
  </div>
  <!-- /.content-wrapper -->

    <footer class="main-footer">
        <div class="pull-right hidden-xs">
        <b>Version</b> 1.0.0
        </div>
        <strong>Copyright &copy; 2019-2020 <a href="https://redpandachile.com">RedPanda</a>.</strong> Todos los derechos reservados.
    </footer>

  <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Create the tabs -->
        <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
            <div class="tab-pane" id="control-sidebar-home-tab"></div>
            <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
        </div>
    </aside>
    <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<script src={{asset('bower_components/jquery/dist/jquery.min.js')}}></script>
<script src={{asset("js/jquery.nicescroll.js")}} type="text/javascript"></script>
<script src={{asset("js/scripts.js")}}></script>

<script src={{asset('bower_components/bootstrap/dist/js/bootstrap.min.js')}}></script>
<script src={{asset('bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}></script>
<script src={{asset('bower_components/fastclick/lib/fastclick.js')}}></script>
<script src={{asset('dist/js/adminlte.min.js')}}></script>
<script src={{asset('dist/js/demo.js')}}></script>
<script src={{asset('bower_components/select2/dist/js/select2.full.min.js')}}></script>
<script src={{asset('plugins/input-mask/jquery.inputmask.js')}}></script>
<script src={{asset('plugins/input-mask/jquery.inputmask.date.extensions.js')}}></script>
<script src={{asset('plugins/input-mask/jquery.inputmask.extensions.js')}}></script>
<script src={{asset('bower_components/moment/min/moment.min.js')}}></script>
<script src={{asset('bower_components/bootstrap-daterangepicker/daterangepicker.js')}}></script>
<script src={{asset('bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}></script>
<script src={{asset('bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js')}}></script>
<script src={{asset('plugins/timepicker/bootstrap-timepicker.min.js')}}></script>
<script src={{asset('plugins/iCheck/icheck.min.js')}}></script>
<script src={{asset('bower_components/datatables.net/js/jquery.dataTables.min.js')}}></script>
<script src={{asset('bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}></script>

@yield('scripts')

<script>
  $(document).ready(function () {
    $('.sidebar-menu').tree()
  })
</script>
</body>
</html>
