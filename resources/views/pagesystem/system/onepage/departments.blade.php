@extends('pagesystem.system.layouts.master')

@section('content')


<div class="colorlib-doctor">
		<div class="container">
			<div class="row animate-box">
				<div class="col-md-6 col-md-offset-3 text-center colorlib-heading">
					<h2>Servicios</h2>
					<p>Medicina integral para mascotas</p>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 animate-box">
					<div class="row row-pb-lg">
						<div class="owl-carousel2">
							@foreach ($Services as $Service)
							<div class="item">
									<div class="col-md-6">
										<div class="doctor-desc">
											<h3><a href="#">{{$Service->name}}</a></h3>
											<span class="specialty"></span>
											<p>{{$Service->resumen}}.</p>
											<p>{{$Service->description}}</p>
											<p><a href="mailto:contacto@vetportugal.cl" class="btn btn-primary">Mail</a> <a href="scheduled" class="btn btn-primary btn-outline">Reservar</a></p>
										</div>
									</div>
									<div class="col-md-6">
										<div class="doctor-img" style="background-image: url(vetportugal/images/{{$Service->imagen}});">
										</div>
									</div>
								</div>
							@endforeach
						</div>
					</div>
				</div>
			</div>
		</div>
</div>

@endsection

