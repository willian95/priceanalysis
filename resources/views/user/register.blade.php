@extends('layouts.user')

@section('content')

    <div id="dev-register">

        <div class="grid__form">
            <div class="grid__form__item">
       
                <div class="overlay">
                    <h3 class="mb-5">Registro
                </h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nemo minus ratione tenetur officiis explicabo corporis eius rem tempore, quos dicta, repudiandae commodi, eveniet hic illum sed doloremque amet velit asperiores.</p>
                    <a class="logo__1" href="{{ url('/') }}">
                        LOREM IPSUM
                      <!---  <img class="logo" src="{{ asset('assets/img/logo-cap.png') }}" alt="">--->
                    </a>
                </div>
                <img class="img-form" src="{{ asset('assets/img/login.JPG') }}" alt="">
              
            </div>


            <div class="grid__form__item">
                <div class="container">
                    <div class="row">
                        <div class="offset-md-1 col-md-8 mt-5">
                            <div class="" style="width: 100%;">
                                <div class="card-body box" >
                           
                                    <div class="form-group  inputBox ">                              
                                        <input type="text" class="form-control" required="" id="name" v-model="name">
                                        <label for="name"><img class="icon__form icon__form4" src="{{ asset('assets/img/iconos/bx-group.svg') }}" alt="">Nombre</label>
                                    </div>
                                    <div class="form-group  inputBox">
                                        <input type="text" class="form-control" required="" id="businessName" v-model="businessName">
                                        <label for="businessName"><img class="icon__form icon__form3" src="{{ asset('assets/img/iconos/bx-id-card.svg') }}" alt="">Nombre comercial</label>
                                    </div>
                                    <div class="form-group  inputBox">
                                        <input type="text" class="form-control" required="" id="rif" v-model="rif">
                                        <label for="rif"><img class="icon__form icon__form4 " src="{{ asset('assets/img/iconos/bx-barcode.svg') }}" alt="">R.I.F</label>
                                    </div>
                                    <div class="form-group  inputBox">                                
                                        <input type="email" class="form-control" required="" id="email" v-model="email">
                                        <label for="email"> <img class="icon__form" src="{{ asset('assets/img/iconos/bx-envelope.svg') }}" alt="">E-mail</label>
                                    </div>
                                    <div class="form-group  inputBox">
                                        <input type="text" class="form-control" required="" id="telephone" v-model="telephone">
                                        <label for="telephone"><img class="icon__form icon__form5 " src="{{ asset('assets/img/iconos/bx-phone.svg') }}" alt="">Teléfono</label>
                                    </div>
                                    <div class="form-group  inputBox">
                                        <input type="password" class="form-control" required="" id="password" v-model="password">
                                        <label for="password"><img class="icon__form icon__form2" src="{{ asset('assets/img/iconos/bx-lock-alt.svg') }}" alt="">Contraseña</label>
                                    </div>
                                    <div class="form-group  inputBox">
                                        <input type="password" class="form-control" required="" id="passwordConfirmation" v-model="passwordConfirmation">
                                        <label for="passwordConfirmation"><img class="icon__form icon__form2 icon__form3" src="{{ asset('assets/img/iconos/bx-lock-alt.svg') }}" alt="">Confirmar contraseña</label>
                                    </div>
                                    <div class="content__btn">
                             
                                        <button class="btn-general" @click="register()">Registrar </button>
                                        <p>  ó  <a  href="{{ url('/login') }}">Inicia sesión</a></p>
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
            el: '#dev-register',
            data(){
               return{
                    name:"",
                    businessName:"",
                    email:"",
                    telephone:"",
                    password:"",
                    passwordConfirmation:"",
                    rif:""
               }
            },
            methods:{
                
                register(){

                    axios.post("{{ url('/register') }}", {name: this.name, businessName: this.businessName, email: this.email, telephone: this.telephone, password: this.password, password_confirmation: this.passwordConfirmation, rif: this.rif})
                    .then(res => {

                        if(res.data.success == true){
                            alert(res.data.msg)
                            this.name=""
                            this.businessName = ""
                            this.email = ""
                            this.telephone  = ""
                            this.password = ""
                            this.passwordConfirmation  = ""
                        }

                    })
                    .catch(err => {
                        $.each(err.response.data.errors, function(key, value) {
                            alert(value)
                        })

                    })
                }

            },
            created(){
                

            }
        }); 


    </script>

@endpush