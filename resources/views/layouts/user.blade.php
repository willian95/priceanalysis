<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.css') }}" >
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" >
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" >
    <link rel="stylesheet" href="{{ asset('css/media.css') }}" >
    <link rel="stylesheet" href="{{ asset('js/alertify/css/alertify.css') }}" >
    <link rel="stylesheet" href="{{ asset('js/alertify/css/themes/bootstrap.css') }}" >
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;700;800&display=swap" rel="stylesheet">
    <title>Commerceprice</title>
</head>
<body>
    
    @include('user.partials.navbar')

    @yield('content')
 
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="{{ asset('/js/alertify/alertify.min.js') }}"></script>
    <script src="{{ asset('/js/app.js') }}"></script>
    <script src="{{ asset('assets/js/script.js') }}"></script>
    
    <script type="text/javascript">
        
        const navbar = new Vue({
            el: '#navbarNav',
            data(){
               return{
                   searchString:""
               }
            },
            methods:{
                
                search(){

                    axios.post("{{ url('/search') }}", {searchString: this.searchString}).then(res => {

                        if(res.data.success == true){

                            window.location.href="{{ url('/post/show/') }}"+"/"+res.data.code

                        }else{
                            alertify.error(res.data.msg)
                        }

                    })

                }

            },
            created(){
                

            }
        }); 


    </script>

    @stack('scripts')

</body>
</html>