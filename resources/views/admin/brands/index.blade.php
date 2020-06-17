@extends('layouts.admin')

@section('content')

    <div id="dev-app">
        <div class="container">
            <div class="top_title">
                <h3 class="text-center">Marcas </i> </h3>
                <button class="btn btn-success mr-5" data-toggle="modal" data-target="#createBrand">Crear  <img src="{{ asset('assets/img/iconos/bx-list-plus.svg') }}" alt=""></button>  
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
                                    <th scope="col">Marcas</th>
                                    <th scope="col">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(brand, index) in brands">
                                    <th>@{{ index + 1 }}</th>
                                    <td>@{{ brand.name }}</td>
                                    <td>
                                        <button class="btn btn-success w-90 fa fa-edit btn-transparent__green mr-4" data-toggle="modal" data-target="#createBrand" @click="edit(brand)"> 
                                            <i class="" >
                                        </button>
                                        <button class="btn btn-danger w-90 fa fa-trash " @click="erase(brand.id)"></button>
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

        <!-- modal -->

        <div class="modal fade" id="createBrand" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    modalTitle:"Crear Marca",
                    name:"",
                    brandId:"",
                    action:"create",
                    brands:[],
                    pages:0
                }
            },
            methods:{

                create(){
                    this.action = "create"
                    this.name = ""
                    this.brandId = ""
                },
                store(){

                    axios.post("{{ url('/admin/brand/store') }}", {name: this.name})
                    .then(res => {

                        if(res.data.success == true){

                            alert(res.data.msg)
                            this.name = ""
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
                update(){

                    axios.post("{{ url('admin/brand/update') }}", {id: this.brandId, name: this.name})
                    .then(res => {

                        if(res.data.success == true){

                            alert(res.data.msg)
                            this.name = ""
                            this.brandId = ""
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
                edit(brand){
                    this.action = "edit"
                    this.modalTitle = "Editar marca"
                    this.name = brand.name
                    this.brandId = brand.id
                },
                fetch(page = 1){

                    axios.get("{{ url('/admin/brand/fetch/') }}"+"/"+page)
                    .then(res => {

                        this.brands = res.data.brands
                        this.pages = Math.ceil(res.data.brandsCount / 20)

                    })
                    .catch(err => {
                        $.each(err.response.data.errors, function(key, value){
                            alert(value)
                        });
                    })

                },
                erase(id){

                    if(confirm("¿Está seguro?")){

                        axios.post("{{ url('/admin/brand/delete/') }}", {id: id}).then(res => {

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

                    }

                }
            },
            mounted(){
                this.fetch()
            }

        })

    </script>

@endpush
                
