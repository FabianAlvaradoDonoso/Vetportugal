



@extends('layouts.app')

{{-- --------------------------------------------------------------------- --}}

@section('css')

@endsection

{{-- --------------------------------------------------------------------- --}}

@section('body')
    <div class="breadcrumbs bg-dark mt-2 d-flex justify-content-center align-items-xl-center">
        <div class="col d-flex justify-content-center justify-content-lg-start">
            <div class="page-header float-left bg-dark">
                <div class="page-title">
                    <h1 class="text-light">Acerca de Redpanda</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="content mt-3 d-flex flex-column justify-content-around">

        <div class="col-sm-12">
            <div class="card">
                <div class="card-header ">
                    <strong class="card-title">Equipo RedPanda!</strong>
                </div>
                <div class="card-body">
                    <div class="typo-articules">
                        <p>
                            <h3>Nuestro Objetivo</h3><br>
                            Es eliminar brecha entre micro empresas, PYMES y grandes empresas en gestión administrativa y en la presencia en Internet. <br>
                            Damos soluciones a la medida de nuestros cliente, asegurandonos que cada solución entregada sea la mas apropiada para cada cliente. <br><br>

                            <blockquote class="blockquote mt-3 text-right">
                                “Desarrollar herramientas que puedan ayudar al desarrollo de una empresa, además de enseñar su funcionamiento para un trabajo eficiente y eficaz”.
                                <footer class="blockquote-footer">Equipo RedPanda</footer>
                            </blockquote>

                            <blockquote class="blockquote mt-3 text-right">
                                <h6>RedPanda - 2018~2019</h6>
                            </blockquote>


                        </p>
                    </div>
                </div>
            </div>
        </div>

    </div> <!-- .content -->
@endsection

{{-- --------------------------------------------------------------------- --}}

@section('scripts')

@endsection
