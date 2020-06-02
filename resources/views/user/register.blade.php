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
                        <div class="offset-md-2 col-md-8">
                            <div class="" style="width: 100%;">
                                <div class="card-body">
                           
                                    <div class="form-group">
                                        <label for="name">Nombre</label>
                                        <input type="text" class="form-control" id="name" v-model="name">
                                    </div>
                                    <div class="form-group">
                                        <label for="businessName">Nombre comercial</label>
                                        <input type="text" class="form-control" id="businessName" v-model="businessName">
                                    </div>
                                    <div class="form-group">
                                        <label for="rif">R.I.F</label>
                                        <input type="text" class="form-control" id="rif" v-model="rif">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" id="email" v-model="email">
                                    </div>
                                    <div class="form-group">
                                        <label for="telephone">Telefono</label>
                                        <input type="text" class="form-control" id="telephone" v-model="telephone">
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control" id="password" v-model="password">
                                    </div>
                                    <div class="form-group">
                                        <label for="passwordConfirmation">Confirmar Password</label>
                                        <input type="password" class="form-control" id="passwordConfirmation" v-model="passwordConfirmation">
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