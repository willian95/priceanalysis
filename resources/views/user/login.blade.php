@extends('layouts.user')

@section('content')

    <div id="dev-login">
<div class="grid__form">
    <div class="grid__form__item">
       
        <div class="overlay">
            <h3 class="mb-5">Iniciar Sesión</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nemo minus ratione tenetur officiis explicabo corporis eius rem tempore, quos dicta, repudiandae commodi, eveniet hic illum sed doloremque amet velit asperiores.</p>
            <a class="logo__1" href="{{ url('/') }}">
                LOREM IPSUM
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
                        
                        <div class="card-body box">
                            <div class="form-group inputBox">                      
                                <input  type="text" class="form-control" id="email" v-model="email" required="">
                                <label for="email">   <img class="icon__form" src="{{ asset('assets/img/iconos/bx-envelope.svg') }}" alt="">E-mail</label>

                            </div>
                            <div class="form-group inputBox">
                                <input type="password" class="form-control" id="password" v-model="password" required="">
                                <label for="password"><img class="icon__form icon__form2" src="{{ asset('assets/img/iconos/bx-lock-alt.svg') }}" alt="">Contraseña</label>

                            </div>
                         <div class="content__btn">
                             
                            <button class="btn-general" @click="login()">Entrar</button>
                            <p>  ó  <a  href="{{ url('/register') }}">Registrarme</a></p>
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

@push('scripts')

    <script type="text/javascript">
        
        const app = new Vue({
            el: '#dev-login',
            data(){
               return{
                   email:"",
                   password:""
               }
            },
            methods:{
                
                login(){

                    axios.post("{{ url('/login') }}",{email: this.email, password: this.password})
                    .then(res => {

                        if(res.data.success == true){
                            
                            alertify.success(res.data.msg)
                            this.email = ""
                            this.password = ""

                            if(res.data.role_id == 2)
                            {
                                if(localStorage.getItem("previousUrl"))
                                {
                                    window.location.href=localStorage.getItem("previousUrl")
                                }else{
                                    window.location.href = "{{ url('/') }}"
                                }
                                
                            }

                            else if(res.data.role_id == 1)
                                window.location.href = "{{ url('/admin/dashboard') }}"

                        }else{
                            alertify.error(res.data.msg)
                        }

                    })
                    .catch(err => {
                        $.each(err.response.data.errors, function(key, value) {
                            alertify.error(value)
                        })
                    })

                }

            },
            created(){
                

            }
        }); 


    </script>

@endpush