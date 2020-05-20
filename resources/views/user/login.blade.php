@extends('layouts.user')

@section('content')

    <div id="dev-login">

        <div class="container">
            <div class="row">
                <div class="offset-md-3 col-md-6">
                    <div class="card" style="width: 100%;">
                        <div class="card-body">
                            <h5 class="card-title">Login</h5>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" v-model="email">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" v-model="password">
                            </div>
                            <button class="btn btn-primary" @click="login()">Login</button>
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
                            
                            alert(res.data.msg)
                            this.email = ""
                            this.password = ""

                            window.location.href = "{{ url('/') }}"

                        }else{
                            alert(res.data.msg)
                        }

                    })
                    .catch(err => {

                    })

                }

            },
            created(){
                

            }
        }); 


    </script>

@endpush