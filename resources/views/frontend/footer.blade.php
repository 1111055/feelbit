	<div id="footerwrap">
		<div class="container">
			<div class="row">
				<div class="col-lg-4">
				<ul id="social-icons">
				
				  @foreach($socials as $k => $item)
	               <a href="{{$item->link}}" target="_blank"> <li class="{{strtolower($item->nome)}} col-lg-4"><i class="{{$item->class}}"></i></li></a>
	              @endforeach  
	            </ul>
				</div><!--col-lg-4-->
				<div class="col-lg-4">
					<h4 class="widget-title">{{$exp[6]['expression']}}</h4>
					<p>{{$exp[6]['descricao']}}</p>
				</div><!--col-lg-4-->
				<div class="col-lg-4">
					<h4 class="widget-title">Onde Estamos</h4>
					<p>{{$setting->rua}}, {{$setting->localidade}}  <br/>
					{{$setting->cidade}}.<br/>
					T: {{$setting->contacto1}} <br/>
					E: {{$setting->email1}}
					</p>
				</div><!--col-lg-4-->
			</div><!-- row -->
		</div><!-- container -->
		<div id="footer-copyright">
			<div class="container">
				{{$exp[7]['expression']}}
			</div>
		</div>
	</div>
	
	<a id="gototop" class="gototop no-display" href="#"><i class="fa fa-angle-up"></i></a>