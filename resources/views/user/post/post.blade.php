@extends('layouts.user')

@section('content')

    <div id="dev-post">

        <div class="container">
            <div class="row">
                <div class="offset-md-2 col-md-8">
                    <div class="card" style="width: 100%;">
                        <div class="card-body">
                            <h5 class="card-title">Publicar</h5>
                            <div class="form-group">
                                <label for="title">Titulo</label>
                                <input type="text" class="form-control" id="title" v-model="title">
                            </div>
                            <div class="form-group">
                                <label for="description">descripción</label>
                                <textarea class="form-control" rows="5" id="description" v-model="description"></textarea>
                            </div>
                            <button class="btn btn-primary" @click="checkSelectedUsers()">Registro</button>
                            <button class="btn btn-primary" data-toggle="modal" data-target="#businessModal">Enviar a</button>
                            <h5 class="text-center">Productos</h5>
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="name">Nombre</label>
                                        <input type="text" class="form-control" id="name" v-model="name" placeholder="Harina de maíz">
                                    </div>
                                </div>

                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="amount">Cantidad</label>
                                        <input type="text" class="form-control" id="amount" v-model="amount" placeholder="15 bultos">
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <label for="" style="visibility: hidden">hg</label>
                                    <button class="btn btn-success" @click="add()">agregar</button>
                                </div>

                
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <table class="table">
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
                                                <td>@{{ product.name }}</td>
                                                <td>@{{ product.amount }}</td>
                                                <td><button class="btn btn-danger" @click="remove(index)">X</button></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>

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
                        </div>


                    </div>
                    <!--<div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>-->
                    </div>
                </div>
            </div>
        

        <!-- modal -->

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
                    selectedUsers:"",
                    pages:0,
                    name:"",
                    amount:""
               }
            },
            methods:{
                
                add(){

                    if(this.name != "" && this.amount != ""){
                        this.products.push({name: this.name, amount: this.amount})
                        this.name = ""
                        this.amount = ""
                    }else{
                        alert("nombre y cantidad son requeridos")
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

                    axios.post("{{ url('/post/store') }}", {title: this.title, description: this.description, products: this.products, selectedUsers: this.selectedUsers})
                    .then(res => {

                        if(res.data.success == true){

                            alert(res.data.msg)
                            this.title = ""
                            this.description = ""
                            this.products = [],
                            this.selectedUsers = ""

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

                            if(data.user.id == user.id){
                                exists = true
                                this.selectedUsers.splice(index, 1)
                            }   

                        })

                        if(exists){
                            $("#user"+user.id).css("background-color", "white")
                        }else{
                            this.selectedUsers.push({user})
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