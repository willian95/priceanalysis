@extends('layouts.user')

@section('content')

    <div id="dev-login">
<div class="grid__form">
    <div class="grid__form__item">

        <div class="overlay">
            <h3 class="mb-5">Menos tiempo, Más dinero</h3>
            <!--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nemo minus ratione tenetur officiis explicabo corporis eius rem tempore, quos dicta, repudiandae commodi, eveniet hic illum sed doloremque amet velit asperiores.</p>-->

            <div class="container">
                
                <div class="row">

                </div>
                
            </div>

            <a class="logo__1" href="{{ url('/') }}">
                CommercePrice
              <!---  <img class="logo" src="{{ asset('assets/img/logo-cap.png') }}" alt="">--->
            </a>
        </div>
        <img class="img-form" src="{{ asset('assets/img/login.jpg') }}" alt="">
      
    </div>
    <div class="grid__form__item">
        
        <div class="container">
            <div class="row">
                <div class="offset-md-3 col-md-6">
                    <div class="" style="width: 100%;">
                        
                        <h3>Cambiar contraseña</h3>

                        <div class="card-body box" v-cloak>
                            <div class="form-group inputBox">                      
                                <input  type="password" class="form-control" id="email" v-model="password" required="">
                                <label for="email">   <img style="width: 16px;" class="icon__form icon__form2" src="{{ asset('assets/img/iconos/bx-lock-alt.svg') }}" alt="">Contraseña</label>

                            </div>
                            <div class="form-group inputBox">
                                <input type="password" class="form-control" id="password" v-model="passwordConfirmation" required="">
                                <label for="password"><img style="width: 16px;" class="icon__form icon__form2" src="{{ asset('assets/img/iconos/bx-lock-alt.svg') }}" alt="">Repetir contraseña</label>

                            </div>

                        </div>

                        <div class="text-center">
                            <button class="btn btn-primary" @click="restore()">Restablecer</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection

@push('scripts')

    <script type="text/javascript">
        
        const app = new Vue({
            el: '#dev-login',
            data(){
               return{
                   hash:"{{ $hash }}",
                   password:"",
                   passwordConfirmation:""
               }
            },
            methods:{
                
                async restore(){

                    try{
                        let res = await axios.post("{{ url('/update/password') }}", {"hash": this.hash, "password": this.password, "password_confirmation": this.passwordConfirmation})

                        if(res.data.success == true){
                            alertify.success(res.data.msg)
                            window.setTimeout(() => {
                                window.location.href="{{ url('/login') }}"
                            }, 3000);
                        }else{
                            alertify.error(res.data.msg)
                        }

                    }catch(err){

                        $.each(err.response.data.errors, function(key, value) {
                            alertify.error(value)
                        })

                    }

                }

            }
        }); 


    </script>

@endpush