
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
					                <h2 class="main-title">{{$pagepolicy->nome}}</h2>
					            </div>

					<div class="col-md-12 text-justify">
						{!! $pagepolicy->descricao !!}
						
				    </div>

			</div>	
	    </section>
	</div>


@stop