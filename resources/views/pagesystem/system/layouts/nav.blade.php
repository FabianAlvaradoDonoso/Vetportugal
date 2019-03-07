
<div id="page">
    <nav class="colorlib-nav" role="navigation">
        <div class="top-menu">
            <div id="toptop" class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="top">
                            <div class="row">
                                <div class="col-md-6">
                                    <div id="colorlib-logo"><a href="index.html"><img src="{{asset('vetportugal/images/logo1.png')}}" alt=""></a></div>
                                </div>
                                <div class="col-md-3">
                                    <div class="num">
                                        <span class="icon"><i class="icon-phone" href="tel:+56941825002"></i></span>
                                        <p><a href="tel:+56228848961">(2) 2222 6819</a><br><a href="tel:+56941825002">+569 4182 5002 </a></p>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="loc">
                                        <span class="icon"><i class="icon-location"></i></span>
                                        <p><a href="https://goo.gl/maps/BR3WbKBFeSF2">Avenida Portugal 1015, Santiago Chile</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="menu-wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="menu-1">
                                <ul>
                                    <li><img src="/vetportugal/images/user.png" id="minilogo" class="minilogo"></li>
                                    <li class="nav-item {{ request()->is('/') ? 'active' : '' }}"><a href="{{url('/')}}">Home</a></li>
                                    <li><a href="#colorlib-services">Servicios</a></li>
                                    <li><a href="#colorlib-doctor">Doctores</a></li>
                                    <!--li><a href="#colorlib-testimonial">Testimonios</a></li-->
                                    <li class="has-dropdown nav-item {{ request()->is('departments') ? 'active' : '' }}">
                                        <a href="{{url('/departments')}}">Departamentos</a>
                                        <ul class="dropdown">
                                            <li><a href="{{url('/departments')}}">Cirugia</a></li>
                                            <li><a href="{{url('/departments')}}">Odontología</a></li>
                                            <li><a href="{{url('/departments')}}">Traumatología</a></li>
                                        </ul>
                                    </li>
                                    <li class="nav-item {{ request()->is('contact') ? 'active' : '' }}"><a href="{{url('/contact')}}">Contacto</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

