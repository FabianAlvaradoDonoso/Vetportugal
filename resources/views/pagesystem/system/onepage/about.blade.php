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
                    Vetportugal es medicina de alto estándar para las mascotas de hoy. Sabemos que son parte importante de nuestra familia y nuestras actividades diarias, es por eso que queremos estar junto a ustedes. Contamos con profesionales de excelencia y en constante actualización, exámenes complementarios de alto valor diagnóstico. Ven a conocernos!.
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
                                              <p>Lorem ipsum dolor sit cuchuflí barquillo bacán jote gamba listeilor po cahuín, luca melón con vino pichanga coscacho ni ahí peinar la muñeca chuchada al chancho achoclonar. Chorrocientos pituto ubicatex huevo duro bolsero cachureo el hoyo del queque en cana huevón el año del loly hacerla corta impeque de miedo quilterry la raja longi ñecla. Hilo curado rayuela carrete quina guagua lorea piola ni ahí. </p>
                                          </div>
                                          <div class="col-md-6">
                                              <p>Lorem ipsum dolor sit cuchuflí barquillo bacán jote gamba listeilor po cahuín, luca melón con vino pichanga coscacho ni ahí peinar la muñeca chuchada al chancho achoclonar. Chorrocientos pituto ubicatex huevo duro bolsero cachureo el hoyo del queque en cana huevón el año del loly hacerla corta impeque de miedo quilterry la raja longi ñecla. Hilo curado rayuela carrete quina guagua lorea piola ni ahí.</p>
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
                             <p>Lorem ipsum dolor sit cuchuflí barquillo bacán jote gamba listeilor po cahuín, luca melón con vino pichanga coscacho ni ahí peinar la muñeca chuchada al chancho achoclonar. Chorrocientos pituto ubicatex huevo duro bolsero cachureo el hoyo del queque en cana huevón el año del loly hacerla corta impeque de miedo quilterry <strong>la raja</strong>  longi ñecla. Hilo curado rayuela carrete quina guagua lorea piola ni ahí.</p>
                                        <ul>
                                            <li>Separated they live in Bookmarksgrove right</li>
                                            <li>Separated they live in Bookmarksgrove right</li>
                                        </ul>
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
                             <p>Far far away, behind the word <strong>mountains</strong>, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
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
