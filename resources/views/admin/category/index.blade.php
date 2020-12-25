@extends('layouts.admin')

@section('content')

    <div id="dev-app">
        <div class="container">
            <div class="top_title">
                <h3 class="text-center">Categorías </i> </h3>
                <button class="btn btn-success mr-5" @click="create()" data-toggle="modal" data-target="#createCategory">Crear  <img src="{{ asset('assets/img/iconos/bx-list-plus.svg') }}" alt=""></button>  
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
                                    <th scope="col">Categoría</th>
                                    <th scope="col">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(category, index) in categories">
                                    <th v-if="page > 1">@{{ (index + 1) + (20 * (page - 1)) }}</th>
                                    <th v-if="page == 1 ">@{{ (index + 1)  }}</th>
                                    <td>@{{ category.name }}</td>
                                    <td>
                                        <button class="btn btn-success w-90 fa fa-edit btn-transparent__green mr-4" data-toggle="modal" data-target="#createCategory" @click="edit(category)"> 
                                            <i class="" >
                                        </button>
                                        <button class="btn btn-danger w-90 fa fa-trash " @click="erase(category.id)"></button>
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

        <!-- modal -->

        <div class="modal fade" id="createCategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">@{{ modalTitle }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">Nombre</label>
                            <input type="text" class="form-control" id="name" v-model="name">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-primary" @click="store()" v-if="action == 'create'">Crear</button>
                        <button type="button" class="btn btn-primary" @click="update()" v-if="action == 'edit'">Editar</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- modal -->
    </div>

@endsection

@push('scripts')

    <script>
                    
        const app = new Vue({
            el: '#dev-app',
            data(){
                return{
                    modalTitle:"Crear categoría",
                    name:"",
                    categoryId:"",
                    action:"create",
                    categories:[],
                    page:1,
                    pages:0
                }
            },
            methods:{

                create(){
                    this.action = "create"
                    this.name = ""
                    this.categoryId = ""
                },
                store(){

                    axios.post("{{ url('/admin/category/store') }}", {name: this.name})
                    .then(res => {

                        if(res.data.success == true){

                            alertify.success(res.data.msg)
                            this.name = ""
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

                },
                update(){

                    axios.post("{{ url('admin/category/update') }}", {id: this.categoryId, name: this.name})
                    .then(res => {

                        if(res.data.success == true){

                            alertify.success(res.data.msg)
                            this.name = ""
                            this.categoryId = ""
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

                },
                edit(category){
                    this.action = "edit"
                    this.name = category.name
                    this.categoryId = category.id
                },
                fetch(page = 1){
                    this.page = page
                    axios.get("{{ url('/admin/category/fetch/') }}"+"/"+this.page)
                    .then(res => {

                        this.categories = res.data.categories
                        this.pages = Math.ceil(res.data.categoriesCount / 20)

                    })
                    .catch(err => {
                        $.each(err.response.data.errors, function(key, value){
                            alertify.error(value[0])
                        });
                    })

                },
                erase(id){

                    if(confirm("¿Está seguro?")){

                        axios.post("{{ url('/admin/category/delete/') }}", {id: id}).then(res => {

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