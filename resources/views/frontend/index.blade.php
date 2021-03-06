
@extends('frontend.app')

@section('content')


	<!-- MAIN IMAGE SECTION -->
	<div id="headerwrap">
		<span class="headerwrap-btn-wrap">
			<a href="#content-wrapper" class="headerwrap-btn"><i class="fade-up fa fa-angle-down"></i></a>
		</span>	
	</div><!-- /headerwrap -->

	<div id="content-wrapper">
	    <section id="about" class="section-wrapper">
	   		<div class="container">
	        	<div class="centered gap fade-down section-heading">
	                <h2 class="main-title">{{$paginas[1]['titulo']}}</h2>
	                <hr>
	              			 <div class="textbody"> {!! $paginas[1]['descricao'] !!}</div>
	            </div>

	            <div class="row gap">
		            <div class="col-md-8 col-md-offset-2">
		            	<img src="{{$paginas[1]['pathimg']}}" class="fade-up img-responsive" alt="Alt" />
		            </div>
	            </div>
                <a class="btn btn-outlined btn-primary" type="button"  target="_blank" href="{{route('pagina.getPage',2)}}" style="margin-left: 46%">Ver Mais</a> 
			</div>	
	    </section>

		<section id="services" class="divider-wrapper">
			<div class="container">
	        	<div class="centered gap fade-down section-heading">
	                <h2 class="main-title">{{$paginas[3]['titulo']}}</h2>
	                <hr>
	              			<div class="textbody">{!! $paginas[3]['descricao'] !!}</div>
	            </div>
				<div class="row">

					 @foreach($paginas[3]->desc as $item)
						<div class="col-lg-1 col-md-1 col-sm-1 centered bounce-in">
							<span class="{{$item->class}}"></span>
						</div>
						<div class="col-lg-2 col-md-2 col-sm-2 fade-up">
							<h3>{{$item->titulo}}</h3>
							<p>{{$item->descricao}}</p>
						</div>
					@endforeach		
				</div>
			</div>
	    </section>

		<div class="grey">
			<div class="container">

				<div class="row">
		        	<div class="centered gap fade-down section-heading">
		                <h2 class="main-title">{{$paginas[5]['titulo']}}</h2>
		                <hr>
		              <div class="textbody">{!! $paginas[5]['descricao'] !!}</div>
		            </div> 
				</div><!-- row -->

				<div class="row centered">
					<div id="logo-carousel" class="fade-up">
						 @isset($bannerline[1])
		                     @foreach($bannerline[1] as $key => $item)
		                           <div class="item">
		                           	  <a href="{{$item->link}}"><img src="{{$item->path}}"  alt="" /></a>
							       </div>
		                     @endforeach
		                 @endisset
					</div>
				</div>
			</div>
		</div>
		

		<section id="testimonials" class="divider-wrapper">
			<div class="container">
				<div class="centered gap fade-down section-heading">
	                <h2 class="main-title">{{$paginas[2]['titulo']}}</h2>
	                <hr>
	                  <div class="textbody">{!! $paginas[2]['descricao'] !!}</div>
	            </div> 
			    <div class="row mt">
			        @foreach($paginas[2]->desc as $k => $item)
			              @if ($k % 2 == 0)
					        <div class="col-md-6">
					      @endif  	
					            <div class="blockquote-box fade-up clearfix">
					                <div class="square pull-left">
					                   <i class="{{$item->class}}" aria-hidden="true"></i>
					                </div>
					                <h4>{{$item->titulo}}</h4>
					                <p>{{$item->descricao}}</p>
					            </div>
					      @if ($k % 2 == 0)
					        </div>  
					      @endif  	
			        @endforeach	
			    </div>
			    	<a class="btn btn-outlined btn-primary" type="button"  target="_blank" href="{{route('pagina.getPage',3)}}" style="margin-left: 46%">Ver Mais</a> 
			</div>
	    </section>

	    <div class="row" >
			<div class="container">

				<div class="row">
		        	<div class="centered gap fade-down section-heading">
		                <h2 class="main-title">Sistema Integrado</h2>
		                <hr>
		              <div class="textbody">{!! $paginas[5]['descricao'] !!}</div>
		            </div> 
				</div><!-- row -->

				<div class="row mt">

					        <div class="col-md-6">
					 
					            <div class="blockquote-box fade-up clearfix">
					                <div class="square pull-left">
					                   <i class="fab fa-google fa-5x" aria-hidden="true"></i>
					                </div>
					                <h4>Google Analytics</h4>
					                <p>Sistema integrado com o Google Analytics</p>
					            </div>
					  
					        </div>  
					        <div class="col-md-6">
					 
					            <div class="blockquote-box fade-up clearfix">
					                <div class="square pull-left">
					               <i class="fab fa-mailchimp fa-5x"></i>
					                </div>
					                <h4>Mail Chimp</h4>
					                <p>Sistema integrado com o Mail Chimp</p>
					            </div>
					  
					        </div>  
			
				</div>
			</div>
		</div>
		

		<div id="call">
			<div class="container">
				<div class="row fade-up">
					<h3>{{$exp[0]['expression']}}</h3>
					<div class="col-lg-8 col-lg-offset-2">
						<div class="textbody"><p>{{$exp[1]['expression']}}</p></div>
						<form method="post"  action="newsletter/teste" id="searchForm">
							 <input name="crf" id="crf" type="hidden" value="{{csrf_token()}}">
					      	<p><input type="text" class="form-control" name="email" id="emailnew" placeholder="Email" /></p>
							      <div class="form-check">
								    <p> <input type="checkbox" class="form-check-input" id="politica" name="politica">
								    <label class="form-check-label" for="exampleCheck1">* Li e aceito a <a href="{{route('policy')}}" target="_blank" style="color: #FFFFFF !important;">Politica e Privacidade da FeelBit</a></label>
								   	</p>
								 </div>
								<div class="alert alert-danger" role="alert" id="alerterro" style="display: none; background: #C24641 !important;"></div>
							<input class="btn btn-outlined btn-primary btn-lg bounce-in" type="submit" name="submit" value="Enviar" />
					    </form>
					</div>
				</div><!-- row --> 
			</div><!-- container -->
		</div><!-- Call to action -->
		
		<div class="container" id="contact-us">
			<div class="row mt">
	        	<div class="centered gap fade-down section-heading">
	                <h2 class="main-title">{{$exp[2]['expression']}}</h2>
	                <hr>
	               <div class="textbody"> <p>{{$exp[3]['expression']}}</p></div>
	            </div>
			</div><!-- row -->
		</div><!-- container -->
		<div class="container">
			<div class="row gap">
				<div class="fade-up col-md-6 fade-up">
					<p>{{$exp[4]['expression']}}</p>
					<p>{{$exp[5]['expression']}}</p>
				</div>
				<div class="fade-up col-md-6 fade-up">
					<div id="message"></div>
					<form method="post" id="contact-form" class="contact-form">
						<input name="_token" id="_token" type="hidden" value="{{csrf_token()}}">
						<p><input type="text" class="form-control" name="nome" id="nome" placeholder="Nome *" /></p>
						<div class="col-md-12">
                    
                             <div class="alert alert-danger" role="alert" id="erronome" style="display: none;"></div>
                 
                        </div>
						<p><input type="text" class="form-control" name="email" id="email" placeholder="Email *" /></p>
						<div class="col-md-12">

                             <div class="alert alert-danger" role="alert" id="erroemail" style="display: none;"></div>

                        </div>
						<p><input type="text" class="form-control" name="subject" id="subject" placeholder="Assunto *" /></p>
						<div class="col-md-12">
                        
                             <div class="alert alert-danger" role="alert" id="erroassunto" style="display: none;"></div>
                         
                        </div>
						<p><textarea name="desc" class="form-control" id="desc" placeholder="Discrição"></textarea></p>
					
						<div class="form-check">
						 <p>   <input type="checkbox" class="form-check-input" id="termos" name="termos">
						    <label class="form-check-label" for="exampleCheck1">* Li e aceito a <a href="{{route('policy')}}" target="_blank" style="color: black !important;">Politica e Privacidade da FeelBit</a></label>
						 </p>
						 <div class="col-md-12">
                        
                             <div class="alert alert-danger" role="alert" id="errotermos" style="display: none;"></div>
                         
                        </div>
						
						</div>
						<p>{{$exp[8]['expression']}}</p>
						<input class="btn btn-outlined btn-primary" type="submit" name="submit" id="sendcontact" value="Enviar" />
					     <div class="fa-3x" style="display: none;" id="loaderorca">
                            <i class="fa fa-spinner fa-pulse" style="margin-left: 50%;"></i>
                        </div>
                        <div class="alert alert-success" role="alert" id="enviosucesso" style="display: none;"></div>
					</form>
				</div>
			</div><!-- row -->
		</div>

	</div>


@stop

@section('scripts')
     
@stop