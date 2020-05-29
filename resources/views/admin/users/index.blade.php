@extends('layouts.admin')

@section('content')

    <div id="dev-app">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="text-center">Usuarios</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Email</th>
                                <th scope="col">Rif</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(user, index) in users">
                                <th>@{{ index + 1 }}</th>
                                <td>@{{ user.name }}</td>
                                <td>@{{ user.email }}</td>
                                <td>@{{ user.rif }}</td>
                                <td>
                                    <button v-if="user.rif_verified_at == null" class="btn btn-success" @click="confirmRif(user.id)">Confirmar rif</button>
                                    <!--<button class="btn btn-success" @click="validateBusiness(user.id)">Validar Empresa</button>-->
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item">
                                <a class="page-link" href="#" v-for="index in pages" :key="index" @click="fetch(index)" >@{{ index }}</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>

    </div>

@endsection

@push('scripts')

    <script>
                    
        const app = new Vue({
            el: '#dev-app',
            data(){
                return{
                    users:[],
                    pages:0
                }
            },
            methods:{

                confirmRif(id){

                    axios.post("{{ url('admin/user/confirmRif') }}", {id: id})
                    .then(res => {

                        if(res.data.success == true){

                            alert(res.data.msg)
                            this.fetch()
                            
                        }else{

                            alert(res.data.msg)

                        }

                    })
                    .catch(err => {
                        $.each(err.response.data.errors, function(key, value){
                            alert(value)
                        });
                    })

                },
                fetch(page = 1){

                    axios.get("{{ url('/admin/user/fetch/') }}"+"/"+page)
                    .then(res => {

                        this.users = res.data.users
                        this.pages = Math.ceil(res.data.usersCount / 20)

                    })
                    .catch(err => {
                        $.each(err.response.data.errors, function(key, value){
                            alert(value)
                        });
                    })

                }
                

            },
            mounted(){
                this.fetch()
            }

        })

    </script>

@endpush