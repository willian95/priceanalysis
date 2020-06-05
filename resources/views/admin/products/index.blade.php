@extends('layouts.admin')

@section('content')

    <div id="dev-app">
        <div class="container">
            <div class="top_title">
                <h3 class="text-center">Products</h3>
                <button class="btn btn-success mr-5" data-toggle="modal" data-target="#createProduct">Crear <img src="{{ asset('assets/img/iconos/bx-list-plus.svg') }}" alt=""></button> 
              </div>
        <div class="bg__tables ">
            <div class="row">
               
                <div class="col-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Producto</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(product, index) in products">
                                <th>@{{ index + 1 }}</th>
                                <td>@{{ product.name }}</td>
                                <td>
                                    <button class="btn btn-success fa fa-edit btn-transparent__green" data-toggle="modal" data-target="#createProduct" @click="edit(product)"></button>
                                    <button class="btn btn-danger" @click="erase(product.id)"><img class="filter " src="{{ asset('assets/img/iconos/bx-trash.svg') }}" alt=""></button>
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

        <div class="modal fade" id="createProduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        <h3 class="text-center">Unidades</h3>
                        <div class="card unit-card" v-for="unit in units" @click="selectUnit(unit)" :id="'unit'+unit.id">
                            <div class="card-body">
                                @{{ unit.name }}
                            </div>
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
                    modalTitle:"Crear producto",
                    name:"",
                    productId:"",
                    action:"create",
                    products:[],
                    units:[],
                    selectedUnits:"",
                    pages:0
                }
            },
            methods:{

                create(){
                    this.action = "create"
                    this.name = ""
                    this.productId = ""
                },
                store(){

                    axios.post("{{ url('/admin/product/store') }}", {name: this.name, units: this.selectedUnits})
                    .then(res => {

                        if(res.data.success == true){

                            alert(res.data.msg)
                            this.name = ""
                            this.selectedUnits = ""
                            $(".unit-card").css("background-color", "white")
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

                    axios.post("{{ url('admin/product/update') }}", {id: this.productId, name: this.name})
                    .then(res => {

                        if(res.data.success == true){

                            alert(res.data.msg)
                            this.name = ""
                            this.productId = ""
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
                edit(product){
                    this.action = "edit"
                    this.name = product.name
                    this.productId = product.id
                },
                fetch(page = 1){

                    axios.get("{{ url('/admin/product/fetch/') }}"+"/"+page)
                    .then(res => {

                        this.products = res.data.products
                        this.pages = Math.ceil(res.data.productsCount / 20)

                    })
                    .catch(err => {
                        $.each(err.response.data.errors, function(key, value){
                            alert(value)
                        });
                    })

                },
                erase(id){

                    if(confirm("¿Está seguro?")){

                        axios.post("{{ url('/admin/product/delete/') }}", {id: id}).then(res => {

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

                },
                fetchUnits(){

                    axios.get("{{ url('/unit/fetchAll') }}").then(res => {

                        this.units = res.data.units

                    })
                    .catch(err => {
                        $.each(err.response.data.errors, function(key, value){
                            alert(value)
                        });
                    })
                },
                selectUnit(unit){
                    if(this.selectedUnits == ""){
                        this.selectedUnits = [unit]
                        $("#unit"+unit.id).css("background-color", "gray")
                    }else{

                        exists = false
                        this.selectedUnits.forEach((data, index) => {
                            
                            if(data.id == unit.id){
                                exists = true
                                this.selectedUnits.splice(index, 1)
                            }   

                        })

                        if(exists){
                            $("#unit"+unit.id).css("background-color", "white")
                        }else{
                            this.selectedUnits.push(unit)
                            $("#unit"+unit.id).css("background-color", "gray")
                        }
                        
                    }
                }
                

            },
            mounted(){
                this.fetch()
                this.fetchUnits()
            }

        })

    </script>

@endpush