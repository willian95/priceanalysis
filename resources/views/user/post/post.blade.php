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
                            <button class="btn btn-primary" @click="store()">Registro</button>
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
                store(){
                    
                    axios.post("{{ url('/post/store') }}", {title: this.title, description: this.description, products: this.products})
                    .then(res => {

                        if(res.data.success == true){

                            alert(res.data.msg)
                            this.title = ""
                            this.description = ""
                            this.products = []

                        }else{
                            alert(res.data.msg)
                        }

                    })
                    .catch(err => {
                        $.each(err.response.data.errors, function(key, value) {
                            alert(value)
                        })
                    })

                }

            },
            created(){
                
                

            }
        }); 


    </script>

@endpush