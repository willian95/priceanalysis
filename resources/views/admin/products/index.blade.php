@extends('layouts.admin')

@section('content')

    <div id="dev-app">
        <div class="container">
            <div class="top_title">
                <h3 class="text-center">Products</h3>
                <button class="btn btn-success mr-5" data-toggle="modal" data-target="#createProduct" @click="create()">Crear <img src="{{ asset('assets/img/iconos/bx-list-plus.svg') }}" alt=""></button> 
              </div>
        <div class="bg__tables ">
            <div class="row">
                <div class="col-12">
                    <form class="form-inline">
                        <input style="width: 300px;" v-model="searchString" class="form-control mr-sm-2" type="search" placeholder="Nombre del producto" aria-label="Search" @keyup="search()">
                    </form>
                </div>
                <div class="col-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Producto</th>
                                <th scope="col">Marca</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(product, index) in products">
                                <th v-if="page > 1">@{{ (index + 1) + (20 * (page - 1)) }}</th>
                                <th v-if="page == 1 ">@{{ (index + 1)  }}</th>
                                
                                <td>@{{ product.name }}</td>
                                <td v-if="product.brand">@{{ product.brand.name }}</td>
                                <td v-else></td>
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
                        <div class="form-group">
                            <label for="brand">Marca</label>
                            <select class="form-control" id="brand" v-model="selectedBrand">
                                <option :value="brand.id" v-for="brand in brands">@{{ brand.name }}</option>
                            </select>
                            <button class="btn btn-success" @click="openBrandForm()" v-if="showBrand == false">+</button>
                        </div>

                        <div class="form-group" v-if="showBrand == true">
                            <h3 class="text-center">Marca</h3>
                            <label for="brandCreate">Nombre</label>
                            <input type="text" class="form-control" id="brandCreate" v-model="brandName">
                            <button class="btn btn-secondary" @click="hideBrandForm()">Cerrar</button>
                            <button class="btn btn-success" @click="storeBrand()">Crear</button>
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
                    selectedBrand:"",
                    brands:[],
                    units:[],
                    selectedUnits:"",
                    brandName:"",
                    showBrand:false,
                    searchString:"",
                    emailResponse:"{{ $email }}",
                    page:1,
                    pages:0
                }
            },
            methods:{

                create(){
                    this.action = "create"
                    this.name = ""
                    this.selectedBrand = "" 
                    this.productId = ""
                },
                store(){

                    axios.post("{{ url('/admin/product/store') }}", {name: this.name, units: this.selectedUnits, brandId: this.selectedBrand, emailResponse: this.emailResponse})
                    .then(res => {

                        if(res.data.success == true){

                            alertify.success(res.data.msg)
                            this.name = ""
                            this.selectedUnits = ""
                            $(".unit-card").css("background-color", "white")
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

                    axios.post("{{ url('admin/product/update') }}", {id: this.productId, name: this.name, brand_id: this.selectedBrand})
                    .then(res => {

                        if(res.data.success == true){

                            alertify.success(res.data.msg)
                            this.name = ""
                            this.productId = ""
                            this.selectedBrand = ""
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
                edit(product){
                    this.action = "edit"
                    this.name = product.name
                    this.productId = product.id
                    this.selectedBrand = product.brand_id
                },
                fetch(page = 1){
                    this.page = page
                    axios.get("{{ url('/admin/product/fetch/') }}"+"/"+this.page)
                    .then(res => {

                        this.products = res.data.products
                        this.pages = Math.ceil(res.data.productsCount / 20)

                    })
                    .catch(err => {
                        $.each(err.response.data.errors, function(key, value){
                            alertify.error(value)
                        });
                    })

                },
                erase(id){

                    if(confirm("¿Está seguro?")){

                        axios.post("{{ url('/admin/product/delete/') }}", {id: id}).then(res => {

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

                },
                fetchUnits(){

                    axios.get("{{ url('/unit/fetchAll') }}").then(res => {

                        this.units = res.data.units

                    })
                    .catch(err => {
                        $.each(err.response.data.errors, function(key, value){
                            alertify.error(value[0])
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
                },
                openBrandForm(){

                    this.showBrand = true

                },
                hideBrandForm(){

                    this.showBrand = false
                    this.brandName = ""

                },
                storeBrand(){

                    axios.post("{{ url('/admin/brand/store') }}", {name: this.brandName})
                    .then(res => {

                        if(res.data.success == true){

                            alertify.success(res.data.msg)
                            this.brandName = ""
                            this.selectedBrand = ""
                            this.fetchBrands()
                            this.hideBrandForm()
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
                fetchBrands(){

                    axios.get("{{ url('/brand/fetch/all') }}").then(res => {

                        if(res.data.success == true){
                            this.brands = res.data.brands
                        }else{

                            alertify.error(res.data.msg)

                        }

                    })

                },
                search(){

                    if(this.searchString != ""){
                        axios.post("{{ url('/admin/product/search') }}", {"search": this.searchString})
                        .then(res => {

                            this.products = res.data.products
                            this.pages = 1

                        })
                    }else{
                        this.fetch()
                    }

                }
                

            },
            mounted(){
                this.fetch()
                this.fetchBrands()
                this.fetchUnits()
            }

        })

    </script>

@endpush