
@include('frontend.head')
    <body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">


                @include('frontend.navbar')

    			 @yield('content')

    	
    		  	@include('frontend.footer')

            <script src="{{asset('js/bootstrap.min.js')}}"></script>
            <!-- Plugin JavaScript -->
            <script src="{{asset('js/jquery.easing.min.js')}}"></script>
            <!-- Custom Theme JavaScript -->
            <script src="{{asset('js/theme.js')}}"></script>

            <script src="{{asset('js/plugins.js')}}"></script>

             <script src="{{asset('js/pluginstwo.js')}}"></script>

            <script src="{{asset('js/imagesloaded.js')}}"></script>

            <script src="{{asset('js/prettyPhoto.js')}}"></script>

            <script src="{{asset('js/init.js')}}"></script>


     </body>
 </html>
