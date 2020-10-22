@extends('layouts.admin')

@section('content')

    <div id="dev-app">
        <div class="container">
            <div class="top_title">
                <h3 class="text-center">Publicaciones </i> </h3>
            </div>

        <!--    <div class="row">
                <div class="col-12">
                    <h2 class="text-center">Categorías</h2>
                </div>
            </div>-->
            <div class="bg__tables">
                <div class="row">
                   <!--- <div class="col-12">
                        <p class="text-center">
                            <button class="btn btn-success" data-toggle="modal" data-target="#createCategory">Crear</button>
                        </p>
                    </div>--->
                    <div class="col-12">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Titulo</th>
                                    <th scope="col">Usuario</th>
                                    <th scope="col">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(post, index) in posts">
                                    <th v-if="page > 1">@{{ (index + 1) + (20 * (page - 1)) }}</th>
                                    <th v-if="page == 1 ">@{{ (index + 1)  }}</th>
                                    <td>@{{ post.title }}</td>
                                    <td>@{{ post.title }}</td>
                                    <td>
                                        <a :href="'{{ url('/') }}'+'/post/show/'+post.code" class="btn btn-success w-90 fa fa-edit btn-transparent__green mr-4" target="_blank"> 
                                            ver
                                        </a>
                                        <button class="btn btn-danger w-90 fa fa-trash " @click="erase(post.id)">eliminar</button>
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
                                <li class="line-pag">
                                    <a class="page-link" v-if="page > 1" @click="fetch(1)">Primero</a>
                                </li>
                                <li class="line-pag line-pag_r" >
                                    <a class="page-link" v-if="page > 1" @click="fetch(page - 1)"><i class="fa fa-long-arrow-left" aria-hidden="true"></i>
                                    </a>
                                </li>
                                <li class="page-item" v-for="index in pages">
                                    <a class="page-link" style="background-color: #007dc5; color: #fff !important;"   v-if="page == index && index >= page - 3 &&  index < page + 3"  :key="index" @click="fetch(index)" >@{{ index }}</a>
                                    <a class="page-link"  v-if="page != index && index >= page - 3 &&  index < page + 3"  :key="index" @click="fetch(index)" >@{{ index }}</a> 
                                </li>
                                <li class="line-pag">
                                    <a class="page-link" v-if="page < pages" @click="fetch(page + 1)"><i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                                    </a>
                                </li>
                                <li class="line-pag">
                                    <a class="page-link" v-if="page < pages" @click="fetch(pages)">último</a>
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
                    posts:[],
                    page:1,
                    pages:0
                }
            },
            methods:{

                fetch(page = 1){
                    this.page = page
                    axios.get("{{ url('/admin/post/fetch/') }}"+"/"+this.page)
                    .then(res => {

                        this.posts = res.data.posts
                        this.pages = Math.ceil(res.data.postsCount / 20)

                    })
                    .catch(err => {
                        $.each(err.response.data.errors, function(key, value){
                            alertify.error(value[0])
                        });
                    })

                },
                erase(id){

                    if(confirm("¿Está seguro?")){

                        axios.post("{{ url('/admin/post/delete/') }}", {id: id}).then(res => {

                            if(res.data.success == true){
                                alertify.success(res.data.msg)
                                this.fetch()
                            }else{

                                alertify.error(res.data.msg)

                            }

                        })
                        .catch(err => {
                            $.each(err.response.data.errors, function(key, value){
                                alertify.error(value[0])
                            });
                        })

                    }

                }
                

            },
            mounted(){
                this.fetch()
            }

        })

    </script>

@endpush