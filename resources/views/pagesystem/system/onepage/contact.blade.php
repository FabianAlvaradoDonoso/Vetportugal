@extends('pagesystem.system.layouts.master')
@section('content')
<div id="colorlib-contact">
    <div class="container">
        <div class="row">

            <div class="col-md-12 animate-box">
                <div class="row">
                    <div class="col-md-6">
                        <h2>Información de Contacto</h2>
                        <form action="#">
                            <div class="row form-group">
                                <div class="col-md-6">
                                    <label for="fname">Nombres</label>
                                    <input type="text" id="fname" class="form-control mb" placeholder="Sus nombres">
                                </div>
                                <div class="col-md-6">
                                    <label for="lname">Apellidos</label>
                                    <input type="text" id="lname" class="form-control" placeholder="Sus apellidos">
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col-md-12">
                                    <label for="email">Email</label>
                                    <input type="text" id="email" class="form-control" placeholder="ejemplo@email.com">
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col-md-12">
                                    <label for="subject">Asunto</label>
                                    <input type="text" id="subject" class="form-control" placeholder="Asunto del mensaje">
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col-md-12">
                                    <label for="message">Mensaje</label>
                                    <textarea name="message" id="message" cols="30" rows="10" class="form-control" placeholder="Cuéntanos"></textarea>
                                </div>
                            </div>
                            <div class="form-group text-center">
                                <input type="submit" value="Enviar" class="btn btn-primary">
                            </div>
                        </form>
                    </div>
                    <div class="col-md-6">
                        <div class="colorlib-map">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3328.7681654762323!2d-70.63567708480045!3d-33.455346080772664!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9662c565603f41ad%3A0xf1a06253bd5d99f5!2sVetPortugal-Centro+Veterinario+Integral!5e0!3m2!1ses!2scl!4v1550677404749"
                                width="600"
                                height="450"
                                frameborder="0"
                                style="border:0"
                                allowfullscreen>
                            </iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
