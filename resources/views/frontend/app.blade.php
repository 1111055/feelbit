
@include('frontend.head')
    <body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">


                @include('frontend.navbar')

    			 @yield('content')

    	
    		  	@include('frontend.footer')


           <script src="{{asset('js/jquery.js')}}"></script>  
            <script src="{{asset('js/modernizr.custom.js')}}"></script>   
                <!-- Global site tag (gtag.js) - Google Analytics -->
            <script async src="https://www.googletagmanager.com/gtag/js?id=UA-154453478-1"></script>
            
            <script src="https://kit.fontawesome.com/e2c9ee503e.js" crossorigin="anonymous"></script>

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






            <script>
              window.dataLayer = window.dataLayer || [];
              function gtag(){dataLayer.push(arguments);}
              gtag('js', new Date());

              gtag('config', 'UA-154453478-1');


                $(document).ready(function(){
                    jQuery('#headerwrap').backstretch([
                      "image/bg/bg6.jpg"
                    ], {duration: 4000, fade: 500});

                    jQuery('#headerwraplap').backstretch([
                      "../image/bg/lap.jpg"
                    ], {duration: 4000, fade: 500});
                    jQuery('#headerwrapserv').backstretch([
                      "../image/bg/serv.jpg"
                    ], {duration: 4000, fade: 500});
                    jQuery('#headerwrlok').backstretch([
                      "image/bg/looked.jpg"
                    ], {duration: 4000, fade: 500});


                    
                });
            </script>
            @yield('scripts')


     </body>
 </html>
