@extends('pagesystem.system.layouts.master')
@section('content')
<aside id="colorlib-hero">
    <div class="flexslider">
        <ul class="slides">
        <li style="background-image: url(vetportugal/images/img_bg_6.jpg);">
            <div class="overlay"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2 col-md-pull-2 slider-text">
                        <div class="slider-text-inner">
                            <h1>La salud de tu mascota es <strong>lo más importante</strong></h1>
                                <h2>Por eso, blablablablablabla</h2>
                                <p><a class="btn btn-primary btn-lg btn-learn" href="#">Reserva una atención médica</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </li>
        <li style="background-image: url(vetportugal/images/img_bg_5.jpg);">
            <div class="overlay"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2 col-md-pull-2 slider-text">
                        <div class="slider-text-inner">
                            <h1>Nosotros podemos ayudarte a<strong> encontrar el profesional que estas buscando</strong></h1>
                                <h2>Contamos con múltiples especialistas blablabla.</h2>
                                <p><a class="btn btn-primary btn-lg btn-learn" href="#">Reserva una atención médica</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </li>
        <li style="background-image: url(vetportugal/images/img_bg_1.jpg);">
            <div class="overlay"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2 col-md-pull-2 slider-text">
                        <div class="slider-text-inner">
                            <h1>Garantizamos <strong>seguridad, buenos precios </strong>  &amp; Calidad</h1>
                                <h2>4 años de experiencia en blablabla.</h2>
                                <p><a class="btn btn-primary btn-lg btn-learn" href="#">Reserva una atención médica</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </li>
        <li style="background-image: url(vetportugal/images/img_bg_2.jpg);">
            <div class="overlay"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2 col-md-pull-2 slider-text">
                        <div class="slider-text-inner">
                            <h1>Te ayudamos a <strong>velar por la Salud de tu mascota</strong> y su felicidad</h1>
                                <h2>En nuestra clínica puedes encontrar diversos productos blabla.</h2>
                                <p><a class="btn btn-primary btn-lg btn-learn" href="#">Ir a la Tienda	</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </li>
        </ul>
    </div>
</aside>


<aside id="colorlib-hero" class="breadcrumbs">
    <div class="flexslider">
        <ul class="slides">
        <li style="background-image: url(vetportugal/images/img_bg_6.jpg);">
            <div class="overlay"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2 col-md-pull-2 slider-text">
                        <div class="slider-text-inner">
                            <h1>Nuestros <strong>servicios &amp; especialidades</strong></h1>
                                <h2>Blablablablabla</h2>
                        </div>
                    </div>
                </div>
            </div>
        </li>
        </ul>
    </div>
</aside>

{{-- <div id="colorlib-services"> --}}
    {{-- @extends('system.onepage.service') --}}
{{-- </div> --}}

<div id="colorlib-appt" class="colorlob-bg-section">
    <div class="container">
        <div class="row animate-box">
            <div class="col-md-6 col-md-offset-3 text-center colorlib-heading">
                <div class="slider-text-inner">
                    <h1>Agende su hora <strong>con nosotros</strong></h1>
                </div>
            </div>
        </div><!--animate box-->
        <div class="row">
            <div class="col-md-12">
                <div class="container text-center">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Especialidad</label>
                            <br>
                            <select class="custom-select" id="selectEsp">
                                <option value='0' disabled selected>-Seleccione una especialidad-</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Veterinario</label>
                            <br>
                            <select class="custom-select" id="selectVet">
                                <option value='0' disabled selected>-Seleccione un Veterinario-</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        {{-- <div id="datepicker"></div> --}}
                        <button id="elegirFecha" click="fechaElegida()" type="button" class="btn btn-info btn-block disabled mx-auto" style="width:200px;">Siguiente</button>
                        {{-- <input type="text" class="form-control" id="Dateinput" hidden> --}}
                    </div>
                    {{-- <div class="col-md-4 my-auto" id="horas"></div> --}}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 my-auto">
                <select class="custom-select" id="selectFechas">
                </select>
            </div>
            <div class="col-md-4 my-auto">
                <select class="custom-select" id="selectHoras">
                </select>
            </div>
        </div>
    </div>
</div>

<div id="colorlib-doctor" class="colorlib-bg-section">
    <div class="container">
        <div class="row animate-box">
            <div class="col-md-6 col-md-offset-3 text-center colorlib-heading">
                <h2>Contamos con Doctores Especialistas</h2>
            </div>
        </div><!--animate box-->
        <div class="row">
            <div class="col-md-12 animate-box">
                <div class="owl-carousel">
                    <div class="item">
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="doctor">
                                <div class="staff-img" style="background-image: url(images/staff-1.jpg);"></div>
                                <div class="desc">
                                    <span>Patient Services Manager</span>
                                    <h3><a href="#">Dr. Liza Thomas</a></h3>
                                    <ul>
                                        <p> Lorem ipsum dolor sit cuchuflí barquillo bacán jote gamba listeilor po cahuín, luca melón con vino pichanga coscacho ni ahí peinar la muñeca chuchada al chancho achoclonar.</p>
                                    </ul>
                                    <ul>
                                        <p><a class="btn btn-primary btn-md btn-block" href="#">Reservar	</a></p>
                                    </ul>
                                </div>
                            </div>
                        </div><!--col doctor-->
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="doctor">
                                <div class="staff-img" style="background-image: url(vetportugal/images/staff-1.jpg);"></div>
                                <div class="desc">
                                    <span>Patient Services Manager</span>
                                    <h3><a href="#">Dr. Liza Thomas</a></h3>
                                    <ul>
                                        <p> Lorem ipsum dolor sit cuchuflí barquillo bacán jote gamba listeilor po cahuín, luca melón con vino pichanga coscacho ni ahí peinar la muñeca chuchada al chancho achoclonar.</p>
                                    </ul>
                                    <ul>
                                        <p><a class="btn btn-primary btn-md btn-block" href="#">Reservar	</a></p>
                                    </ul>
                                </div>
                            </div>
                        </div><!--col doctor-->
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="doctor">
                                <div class="staff-img" style="background-image: url(vetportugal/images/staff-1.jpg);"></div>
                                <div class="desc">
                                    <span>Patient Services Manager</span>
                                    <h3><a href="#">Dr. Liza Thomas</a></h3>
                                    <ul>
                                        <p> Lorem ipsum dolor sit cuchuflí barquillo bacán jote gamba listeilor po cahuín, luca melón con vino pichanga coscacho ni ahí peinar la muñeca chuchada al chancho achoclonar.</p>
                                    </ul>
                                    <ul>
                                        <p><a class="btn btn-primary btn-md btn-block" href="#">Reservar	</a></p>
                                    </ul>
                                </div>
                            </div>
                        </div><!--col doctor-->
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="doctor">
                                <div class="staff-img" style="background-image: url(vetportugal/images/staff-1.jpg);"></div>
                                <div class="desc">
                                    <span>Patient Services Manager</span>
                                    <h3><a href="#">Dr. Liza Thomas</a></h3>
                                    <ul>
                                        <p> Lorem ipsum dolor sit cuchuflí barquillo bacán jote gamba listeilor po cahuín, luca melón con vino pichanga coscacho ni ahí peinar la muñeca chuchada al chancho achoclonar.</p>
                                    </ul>
                                    <ul>
                                        <p><a class="btn btn-primary btn-md btn-block" href="#">Reservar	</a></p>
                                    </ul>
                                </div>
                            </div>
                        </div><!--col doctor-->
                    </div><!--item-->
                    <div class="item">
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="doctor">
                                <div class="staff-img" style="background-image: url(vetportugal/images/staff-1.jpg);"></div>
                                <div class="desc">
                                    <span>Patient Services Manager</span>
                                    <h3><a href="#">Dr. Liza Thomas</a></h3>
                                    <ul>
                                        <p> Lorem ipsum dolor sit cuchuflí barquillo bacán jote gamba listeilor po cahuín, luca melón con vino pichanga coscacho ni ahí peinar la muñeca chuchada al chancho achoclonar.</p>
                                    </ul>
                                    <ul>
                                        <p><a class="btn btn-primary btn-md btn-block" href="#">Reservar	</a></p>
                                    </ul>
                                </div>
                            </div>
                        </div><!--col doctor-->
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="doctor">
                                <div class="staff-img" style="background-image: url(vetportugal/images/staff-1.jpg);"></div>
                                <div class="desc">
                                    <span>Patient Services Manager</span>
                                    <h3><a href="#">Dr. Liza Thomas</a></h3>
                                    <ul>
                                        <p> Lorem ipsum dolor sit cuchuflí barquillo bacán jote gamba listeilor po cahuín, luca melón con vino pichanga coscacho ni ahí peinar la muñeca chuchada al chancho achoclonar.</p>
                                    </ul>
                                    <ul>
                                        <p><a class="btn btn-primary btn-md btn-block" href="#">Reservar	</a></p>
                                    </ul>
                                </div>
                            </div>
                        </div><!--col doctor-->
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="doctor">
                                <div class="staff-img" style="background-image: url(vetportugal/images/staff-1.jpg);"></div>
                                <div class="desc">
                                    <span>Patient Services Manager</span>
                                    <h3><a href="#">Dr. Liza Thomas</a></h3>
                                    <ul>
                                        <p> Lorem ipsum dolor sit cuchuflí barquillo bacán jote gamba listeilor po cahuín, luca melón con vino pichanga coscacho ni ahí peinar la muñeca chuchada al chancho achoclonar.</p>
                                    </ul>
                                    <ul>
                                        <p><a class="btn btn-primary btn-md btn-block" href="#">Reservar	</a></p>
                                    </ul>
                                </div>
                            </div>
                        </div><!--col doctor-->
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="doctor">
                                <div class="staff-img" style="background-image: url(vetportugal/images/staff-1.jpg);"></div>
                                <div class="desc">
                                    <span>Patient Services Manager</span>
                                    <h3><a href="#">Dr. Liza Thomas</a></h3>
                                    <ul>
                                        <p> Lorem ipsum dolor sit cuchuflí barquillo bacán jote gamba listeilor po cahuín, luca melón con vino pichanga coscacho ni ahí peinar la muñeca chuchada al chancho achoclonar.</p>
                                    </ul>
                                    <ul>
                                        <p><a class="btn btn-primary btn-md btn-block" href="#">Reservar	</a></p>
                                    </ul>
                                </div>
                            </div>
                        </div><!--col doctor-->
                    </div><!--item-->
                </div> <!--carousel-->
            </div> <!--animate box-->
        </div> <!--row-->
    </div> <!--container-->
</div> <!--colorlib-doctor-->

<div class="colorlib-blog">
    <div class="col-md-12 animate box" style="margin-top:50px; margin-bottom:50px;">
        <h2 class="text-center">Siguenos en nuestras Redes Sociales</h2>
    </div>
    <div class="row contact-info-wrap text-center" style="margin-left:30px;">
        <div class="col-md-3">
            <p><span><i class="icon-facebook2"></i></span> <a href="https://www.facebook.com/vetportugal/">fb.com/vetportugal</a></p>
        </div>
        <div class="col-md-3">
            <p><span><i class="icon-twitter2"></i></span> <a href="https://twitter.com/vet_portugal">twitter.com/vet_portugal</a></p>
        </div>
        <div class="col-md-3">
            <p><span><i class="icon-instagram"></i></span> <a href="https://www.instagram.com/vetportugal">instagram.com/vetportugal</a></p>
        </div>
        <div class="col-md-3">
            <p><span><i class="icon-youtube"></i></span> <a href="https://www.youtube.com/channel/UCySq-L8Df_NpeQicKb4NcTQ">Canal Vetportugal</a></p>
        </div>
    </div>
    <aside id="colorlib-hero" class="breadcrumbs">
        <div class="container text-center">
            <!--video src="images/Castración Bruno.mov" width="960" height="540" muted autoplay></video-->
            <iframe
                width="560"
                height="315"
                src="https://www.youtube.com/embed/oP3ntSEXH78"
                frameborder="0"
                allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen>
            </iframe>
        </div>
    </aside>
</div>

<div id="colorlib-blog">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="blog-entry">
                    <div class="desc">
                    <iframe
                            class="instagram-media"
                            id="instagram-embed-0"
                            src="https://www.instagram.com/p/BtQ0-9thpDG/embed?utm_source=ig_embedembed/captioned/?cr=1&amp;v=9&amp;wp=1316&amp;rd=juiced.blog#%7B%22ci%22%3A0%2C%22os%22%3A1235.7000000192784%7D"
                            allowtransparency="true"
                            frameborder="0"
                            height="500px"
                            data-instgrm-payload-id="instagram-media-payload-0"
                            scrolling="no"
                            style="background: white; max-width: 658px; width: calc(100% - 2px); border-radius: 3px; border: 1px solid rgb(219, 219, 219); box-shadow: none; display: block; margin: 0px 0px 12px; min-width: 326px; padding: 0px;">
                        </iframe>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="blog-entry">
                    <div class="desc">
                        <iframe
                            src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fvetportugal&tabs=timeline&width=340&height=500&small_header=true&adapt_container_width=true&hide_cover=false&show_facepile=true&appId"
                            width="340"
                            height="500"
                            style="border:none;overflow:hidden"
                            scrolling="no"
                            frameborder="0"
                            allowTransparency="true"
                            allow="encrypted-media">
                        </iframe>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="blog-entry">
                    <div class="desc">
                        <a class="twitter-timeline"
                            data-height="500"
                            data-theme="light"
                            href="https://twitter.com/Vet_Portugal?ref_src=twsrc%5Etfw">Tweets by Vet_Portugal
                        </a>
                        <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
