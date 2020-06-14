@extends('layouts.user')

@section('content')

    <div id="dev-post">

        <div class="container mt-50">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class=" col-sm-9 col-md-12 col-lg-6 col-xl-9 text-center p-0  mb-2">
                        <div class="card-step px-0 pt-4 pb-0 mb-3">
                       
                            <div id="msform">
                                <!-- progressbar -->
                                <ul id="progressbar">
                                    <li class="active" id="account"><strong>Publicación</strong></li>
                                    <li id="producto"><strong>Producto</strong></li>
                                    <li id="empresa"><strong>Empresa</strong></li>
                                    <li id="finalizar"><strong>Finalizar</strong></li>
                                </ul>
                             <!--   <div class="progress">
                                    <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                                </div> <br>  fieldsets -->
                                <fieldset>
                                    <div class="card__shadow">
                                        <h5 class="card-title mb-5">Detalle de la publicación</h5>
                                        <div class="form-group">
                                        <div class="row box">
                                        
                                                <div class="col-md-6 inputBox">
                                                    <input required="" type="text" class="form-control" id="title" v-model="title">
                                                    <label for="title">Titulo</label>
                                                </div>
                                    
                                            <div class="col-md-6">
                                            
                                                    <label for="type">Tipo de publicación</label>
                                                    <select class="form-control" id="type" v-model="type">
                                                        <option value="public">Pública</option>
                                                        <option value="private">Privada</option>
                                                    </select>
                                            
                                            </div>
                                        </div>
                                        </div>
                                        
                                        <div class="form-group ">
                                            <label for="description">Descripción</label>
                                            <textarea class="form-control" rows="2" id="description" v-model="description"></textarea>
                                        </div>                      
                                    </div>
                                     <button type="button" name="next" class="next action-button" value="Next">Siguiente</button>
                                </fieldset>
                                <fieldset>
                                    <div class="card__shadow">
                                        <h5 class="card-title mb-5">Agregar productos</h5>
                                
                                        <div class="row">
                                            <div class="col-md-5">
                                                <div class="form-group inputBox">
                                                    <label for="name">Nombre</label>
                                                    <input autocomplete="off" type="text" class="form-control" id="name" v-model="name" placeholder="Harina de maíz" @keyup="search()">
                                                    <ul class="select_search">
                                                        <li v-for="search in searches">
                                                            <a href="#" @click="selectProduct(search)">
                                                                @{{ search.name }}
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
        
                                            <div class="col-md-2" v-if="productId == 0">
                                                <div class="form-group inputBox">
                                                    <label for="amount">Cantidad</label>
                                                    <input type="text" class="form-control" id="amount" v-model="amount" placeholder="30">
                                                </div>
                                            </div>
        
                                            <div class="col-md-2" v-if="productId == 0">
                                                <div class="form-group inputBox">
                                                    <label for="unit">Unidad</label>
                                                    <input type="text" class="form-control" id="unit" v-model="unit" placeholder="Kilos">
                                                </div>
                                            </div>
        
                                            <div class="col-md-2" v-if="productId != 0">
                                                <div class="form-group inputBox">
                                                    <label for="amount">Cantidad</label>
                                                    <input type="text" class="form-control" id="amount" v-model="amount" placeholder="15">
                                                </div>
                                            </div>
        
                                            <div class="col-md-2" v-if="productId != 0">
                                                <div class="form-group inputBox">
                                                    <label for="unit">Unidad</label>
                                                    <select class="form-control" v-model="selectedUnit">
                                                        <option :value="unit" v-for="unit in units">@{{ unit.unit.name }}</option>
                                                    </select>
                                                </div>
                                            </div>
        
                                            <div class="col-md-2">
                                                <label for="" style="visibility: hidden">hg</label>
                                                <button class="btn btn-success" @click="add()">agregar</button>
                                            </div>
        
                            
                                        </div>
        
                                        <div class="row">
                                            <div class="col-12">
                                                <table class="table mt-4">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Nombre</th>
                                                            <th>Cantidad</th>
                                                            <th></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr v-for="(product, index) in products">
                                                            <td>@{{ index + 1 }}</td>
                                                            <td>@{{ product.displayName }}</td>
                                                            <td>@{{ product.amount }} @{{ product.unitName }}</td>
                                                            <td><button class="btn btn-danger" @click="remove(index)">X</button></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
        
        
        
                                    </div>
                                    
                                    <button type="button" name="next" class="next action-button" value="Next">Siguiente</button>
                                     <button type="button" name="previous" class="previous action-button-previous" value="Previous">Atrás</button>
                                </fieldset>
                                <fieldset>
                                    <div class="card__shadow">
                                        <h5 class="card-title mb-5">Selecciona empresas para que vean tu publicación.</h5>
                                        <div class="div__step">
                                            <button class="btn btn-primary" data-toggle="modal" data-target="#businessModal">Seleccionar empresa</button>
                                            <!-----    <div class="container">
                                                <div class="row" v-for="category in categories">
                                                    <div class="col-12">
                                                        <h3 class="text-center">@{{ category.name }}</h3>
                                                    </div>
                                                    <div class="col-md-3" v-for="user in category.users">
                                                        <div class="card" :id="'user'+user.id" @click="selectUser(user)">
                                                            <div class="card-body">
                                                                @{{ user.name }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <nav aria-label="Page navigation example">
                                                            <ul class="pagination">
                                                                <li v-for="page in pages" class="page-item"><a class="page-link"  @click="fetch(page)">@{{ page }}</a></li>
                                                            </ul>
                                                        </nav>
                                                    </div>
                                                </div>
                                            </div>---->
                                        </div>
                                    </div>
                                    <button name="next" class="next action-button"    @click="checkSelectedUsers()">Publicar</button>
                                  
                                     <button type="button" name="previous" class="previous action-button-previous" value="Previous">Atrás</button>
                                </fieldset>
                                <fieldset>
                                    <div class="form-card">
                                        <div class="row">
                                            
                                            
                                        </div> <br><br>
                                        <h2 class="purple-text text-center"><strong>¡ÉXITO!
                                        </strong></h2> <br>
                                        <div class="row justify-content-center">
                                            <div class="col-3">
                                                <img class="fit-image"   src="{{ asset('assets/img/check.png') }}" >
                                              </div>
                                        </div>

                                        @if(Auth::check() && Auth::user()->id)
                                        
                                            <a class="nav-link pblicar" href="{{ url('/post/index') }}">Volver a publicar</a>
                                      
                                      
                                    @endif
                                        
                                        <br><br>
                                      
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>




        <!---    <div class="row">
                <div class="offset-md-2 col-md-8">
                    <div class="car" style="width: 100%;">
                        <div class="card-body">
                           <div class="card__shadow">
                            <h5 class="card-title mb-5">Publicar</h5>
                            <div class="form-group inputBox">
                             <div class="row">
                                <div class="col-md-6">
                                    <label for="title">Titulo</label>
                                    <input type="text" class="form-control" id="title" v-model="title">
                                   </div>
    
                                   <div class="col-md-6">
                                
                                        <label for="type">Tipo de publicación</label>
                                        <select class="form-control" id="type" v-model="type">
                                            <option value="public">Pública</option>
                                            <option value="private">Privada</option>
                                        </select>
                                   
                                   </div>
                             </div>
                            </div>
                            <div class="form-group inputBox">
                                <label for="description">Descripción</label>
                                <textarea class="form-control" rows="2" id="description" v-model="description"></textarea>
                            </div>                      
                         
                          
        
                            <button class="btn btn-primary" data-toggle="modal" data-target="#businessModal">Seleccionar empresa</button>
                           
                           </div>
                           
                         <div class="card__shadow">
                            <h5 class="card-title mb-5">Productos</h5>
                            
                            <div class="btn__center">
                                <button class="btn btn-primary" @click="checkSelectedUsers()">Registro</button>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group inputBox">
                                        <label for="name">Nombre</label>
                                        <input type="text" class="form-control" id="name" v-model="name" placeholder="Harina de maíz" @keyup="search()">
                                        <ul>
                                            <li v-for="search in searches">
                                                <a href="#" @click="selectProduct(search)">
                                                    @{{ search.name }}
                                                </a>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="col-md-2" v-if="productId == 0">
                                        <div class="form-group inputBox">
                                            <label for="unit">Unidad</label>
                                            <input type="text" class="form-control" id="unit" v-model="unit" placeholder="Kilos">
                                        </div>
                                    </div>

                                    <div class="col-md-2" v-if="productId != 0">
                                        <div class="form-group inputBox">
                                            <label for="amount">Cantidad</label>
                                            <input type="text" class="form-control" id="amount" v-model="amount" placeholder="15">
                                        </div>
                                    </div>

                                    <div class="col-md-2" v-if="productId != 0">
                                        <div class="form-group inputBox">
                                            <label for="unit">Unidad</label>
                                            <select class="form-control" v-model="selectedUnit">
                                                <option :value="unit" v-for="unit in units">@{{ unit.unit.name }}</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <label for="" style="visibility: hidden">hg</label>
                                        <button class="btn btn-success" @click="add()">agregar</button>
                                    </div>

                    
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <table class="table mt-4">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Nombre</th>
                                                    <th>Cantidad</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr v-for="(product, index) in products">
                                                    <td>@{{ index + 1 }}</td>
                                                    <td>@{{ product.displayName }}</td>
                                                    <td>@{{ product.amount }} @{{ product.unitName }}</td>
                                                    <td><button class="btn btn-danger" @click="remove(index)">X</button></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                        </div>
                        Paso 3
                        <div id="step3" class="step-content-body out">
                            <div class="card__shadow">
                                <h5 class="card-title mb-5">Selecciona empresas para que vean tu publicación.</h5>
                                <div class="div__step">
                                    <button class="btn btn-primary" data-toggle="modal" data-target="#businessModal">Seleccionar empresa</button>
                                    
                                </div>
                            </div>

                        </div>
                        
                        <div class="step-content-foot">
                            <button type="button" class="active" name="prev">Anterior</button>
                            <button type="button" class="active" name="next">Siguiente</button>
                            <button class="btn btn-primary active out" name="finish" @click="checkSelectedUsers()">Publicar</button>
                    
                        </div>
                    </div>
               </div>
            </div>-->

        <!-- modal -->
            <div class="modal fade" id="businessModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Empresas</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <div class="modal-body">

                        <div class="container">
                            <div class="row" v-for="category in categories">
                                <div class="col-12 ">
                                    <div class="categorias">
                                        <p class="text-center">@{{ category.name }}</p>
                                    </div>
                                   
                                </div>
                                <div class="col-md-3" v-for="user in category.users">
                                    <div class="card" :id="'user'+user.id" @click="selectUser(user)">
                                        <div class="card-body">
                                            @{{ user.name }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <nav aria-label="Page navigation example">
                                        <ul class="pagination">
                                            <li v-for="page in pages" class="page-item"><a class="page-link"  @click="fetch(page)">@{{ page }}</a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>


                    </div>

                    </div>
                </div>
            </div>
        

        <!-- modal -->
        </div>

    </div>

@endsection

@push('scripts')

    <script type="text/javascript">
        
        const app = new Vue({
            el: '#dev-post',
            data(){
               return{
                    title:"",
                    description:"",
                    products:[],
                    categories:[],
                    searches:"",
                    selectedUsers:"",
                    pages:0,
                    name:"",
                    amount:"",
                    productId:0,
                    selectedUnit:"",
                    unit:"",
                    units:[],
                    type:"public"
               }
            },
            methods:{
                
                add(){

                    var exists = false
                    this.products.forEach((data, index) => {

                        if(this.productId > 0 && data.product_id == this.productId){
                            exists = true
                        }

                    })

                    if(!exists){
                        
                        if(this.productId > 0){
                            this.products.push({product_id: this.productId, amount: this.amount,unit_id: this.selectedUnit.unit.id, displayName: this.name, unitName: this.selectedUnit.unit.name})
                        }else{
                            this.products.push({product_id: this.productId, amount: this.amount, displayName: this.name, unitName: this.unit})
                        }

                        this.name = ""
                        this.productId = 0
                        this.amount = ""
                        this.selectedUnit = ""
                    }else{
                        alert("Este producto ya existe")
                    }
                        

                },
                selectProduct(product){
                    this.productId = product.id
                    this.name = product.name
                    this.searches = ""
                    this.fetchUnits(product.id)
                },
                fetchUnits(id){
                    
                    if(id > 0){
                        axios.get("{{ url('/product/unit/') }}"+"/"+id)
                        .then(res => {

                            if(res.data.success == true){

                                this.units = res.data.units;

                            }else{
                                alert(res.data.msg)
                            }

                        })
                    }
                    

                },
                search(){  

                    if(this.name != ""){
                        axios.post("{{ url('/product/search/') }}", {search: this.name})
                        .then(res => {

                            if(res.data.success == true){
                                this.searches = res.data.products
                            }else{
                                alert(res.data.msg)
                            }

                        })
                        .catch(err => {
                            $.each(err.response.data.errors, function(key, value){
                                alert(value)
                            });
                        })
                    }else{
                        this.searches = ""
                    }

                },
                remove(id){

                    this.products.forEach((data, index) => {

                        if(index == id){
                            this.products.splice(index, 1)
                        }

                    })

                },
                checkSelectedUsers(){

                    if(this.selectedUsers == ""){
                        
                        if(confirm("No has seleccionado empresas para que vean tu publicación. ¿Deseas continuar?")){
                            this.store()
                        }
                    }else{
                        this.store()
                    }

                },
                store(){

                    axios.post("{{ url('/post/store') }}", {title: this.title, description: this.description, products: this.products, selectedUsers: this.selectedUsers, type: this.type})
                    .then(res => {

                        if(res.data.success == true){

                            alert(res.data.msg)
                            this.title = ""
                            this.description = ""
                            this.products = [],
                            this.selectedUsers = ""
                            $(".card").css("background-color", "white")
                            window.location.href="{{ url('/') }}"

                        }else{
                            alert(res.data.msg)
                        }

                    })
                    .catch(err => {
                        $.each(err.response.data.errors, function(key, value) {
                            alert(value)
                        })
                    })

                },
                fetch(page = 1){

                    axios.get("{{ url('/businesses/fetch/') }}"+"/"+page)
                    .then(res => {

                        if(res.data.success == true){
                            
                            this.categories = res.data.categories
                            this.pages = Math.ceil(res.data.categoriesCount / 10)

                        }

                    })

                },
                selectUser(user){

                    if(this.selectedUsers == ""){
                        this.selectedUsers = [user]
                        $("#user"+user.id).css("background-color", "gray")
                    }else{

                        exists = false
                        this.selectedUsers.forEach((data, index) => {

                            if(data.id == user.id){
                                exists = true
                                this.selectedUsers.splice(index, 1)
                            }   

                        })

                        if(exists){
                            $("#user"+user.id).css("background-color", "white")
                        }else{
                            this.selectedUsers.push(user)
                            $("#user"+user.id).css("background-color", "gray")
                        }
                        
                    }

                }

            },
            created(){
                this.fetch()

            }
        }); 


    </script>

@endpush