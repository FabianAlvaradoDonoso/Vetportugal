@extends('pagesystem.system.layouts.master')

@section('content')

<div class="colorlib-doctor">
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-md-push-4 image-content">
					<div class="doctor animate-box">
						<img class="img-responsive doc-img" src="/vetportugal/images/{{$Services->imagen}}" alt="">
						<h2><a href="doctors-single.html">{{$Services->name}}</a></h2>
						<span>Dental Hygienist</span>
						<div class="desc2">
							<p>{{$Services->resumen}}</p>
							<blockquote>
									{{$Services->description}}
							</blockquote>

							<h3>Connect us here!</h3>
								<ul class="colorlib-social">
								<li><a href="#"><i class="icon-facebook2"></i></a></li>
								<li><a href="#"><i class="icon-twitter2"></i></a></li>
								<li><a href="#"><i class="icon-linkedin2"></i></a></li>
								<li><a href="#"><i class="icon-instagram"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection

