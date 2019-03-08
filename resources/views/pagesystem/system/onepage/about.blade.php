@extends('pagesystem.system.layouts.master')
@section('content')
<div id="colorlib-about">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-push-6 animate-box">
                <img class="img-responsive about-img" src="{{asset('vetportugal/images/foto1.jpeg')}}" alt="">
            </div>
            <div class="col-md-6 col-md-pull-6 animate-box">
                <h2>Acerca de nosotros</h2>
                <p>
                    {{$about->description}}
                </p>
                    <div class="fancy-collapse-panel">
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                 <div class="panel panel-default">
                     <div class="panel-heading" role="tab" id="headingOne">
                         <h4 class="panel-title">
                             <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Nuestra Misión
                             </a>
                         </h4>
                     </div>
                     <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                         <div class="panel-body">
                             <div class="row">
                                          <div class="col-md-6">
                                              <p>{{$about2[0]}}</p>
                                          </div>
                                          <div class="col-md-6">
                                              <p>{{$about2[1]}}</p>
                                          </div>
                                      </div>
                         </div>
                     </div>
                 </div>
                 <div class="panel panel-default">
                     <div class="panel-heading" role="tab" id="headingTwo">
                         <h4 class="panel-title">
                             <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">Nuestra Visión
                             </a>
                         </h4>
                     </div>
                     <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                         <div class="panel-body">
                            <p>{{$about->vision}}</p>
                         </div>
                     </div>
                 </div>
                 <div class="panel panel-default">
                     <div class="panel-heading" role="tab" id="headingThree">
                         <h4 class="panel-title">
                             <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">Por qué elegirnos
                             </a>
                         </h4>
                     </div>
                     <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                         <div class="panel-body">
                            <p>{{$about->choose}}</p>
                         </div>
                     </div>
                 </div>
              </div>
           </div>
            </div>
        </div>
    </div>
</div>
@endsection
