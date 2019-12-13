
@extends('frontend.app')

@section('content')

<!-- MAIN IMAGE SECTION -->
	<div id="headerwraplap" class="half">
   		<div class="container">
	    	<div class="gap"></div> 

		</div><!-- /container -->
	</div><!-- /headerwrap -->

	<div id="content-wrapper">
	    <section id="about">
	   		<div class="container">
		    	<div class="gap"></div>
				<div class="row gap">
					        	<div id="bannertext" class="centered fade-down section-heading">
					                <h2 class="main-title">{{$pageabout->titulo}}</h2>
					                <hr>
					                <p>{{$pageabout->subtitulo}}</p>
					            </div>

					<div class="col-md-12 text-justify">
						{!! $pageabout->descricao1 !!}
						 <a href="{{route('contactos')}}"  class="btn btn-outlined btn-primary btn-lg bounce-in" type="submit" name="submit" />{{$exp[2]['expression']}}</a>
				    </div>

			</div>	
	    </section>
	</div>


@stop