@extends('layouts.admin')

@section('content')

    <div id="dev-app">
        <div class="container">
            <div class="top_title">
                <h3 class="text-center">Solicitudes</h3>
               
              </div>
         
         <div class="bg__tables">
            <div class="row">
                <div class="col-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Email</th>
                                <th scope="col">R.I.F</th>
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
                                    <a class="btn btn-success" :href="'{{ url('/admin/verify-user/show/') }}'+'/'+user.id">Ver información</a>
                                    
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

    </div>

@endsection

@push('scripts')

    <script>
                    
        const app = new Vue({
            el: '#dev-app',
            data(){
                return{
                    userId:"",
                    users:[],
                    pages:0
                }
            },
            methods:{

                fetch(page = 1){

                    axios.get("{{ url('/admin/verify-user/fetch/') }}"+"/"+page)
                    .then(res => {

                        this.users = res.data.users
                        this.pages = Math.ceil(res.data.usersCount / 20)

                    })
                    .catch(err => {
                        $.each(err.response.data.errors, function(key, value){
                            alertify.error(value[0])
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