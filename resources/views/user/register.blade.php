@extends('layouts.user')

@section('content')

    <div id="dev-register">

        <div class="container">
            <div class="row">
                <div class="offset-md-3 col-md-6">
                    <div class="card" style="width: 100%;">
                        <div class="card-body">
                            <h5 class="card-title">Registro</h5>
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
                            <button class="btn btn-primary" @click="register()">Registro</button>
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