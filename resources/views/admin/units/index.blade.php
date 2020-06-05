@extends('layouts.admin')

@section('content')

    <div id="dev-app">
        <div class="container">
            <div class="top_title">
                <h3 class="text-center">Unidades</h3>
                <button class="btn btn-success mr-5" data-toggle="modal" data-target="#createUnit"> <img src="{{ asset('assets/img/iconos/bx-list-plus.svg') }}" alt="">Crear</button>
              </div>

          <div class="bg__tables">
            <div class="row">
        
                <div class="col-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Unidad</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(unit, index) in units">
                                <th>@{{ index + 1 }}</th>
                                <td>@{{ unit.name }}</td>
                                <td>
                                    <button class="btn btn-success fa fa-facebook" data-toggle="modal" data-target="#createUnit" @click="edit(unit)"> <img class="filter " src="{{ asset('assets/img/iconos/bx-edit.svg') }}" alt=""></button>
                                  
                                    <button class="btn btn-danger" @click="erase(unit.id)"><img class="filter " src="{{ asset('assets/img/iconos/bx-trash.svg') }}" alt=""></button>
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

        <div class="modal fade" id="createUnit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    modalTitle:"Crear unidad",
                    name:"",
                    unitId:"",
                    action:"create",
                    units:[],
                    pages:0
                }
            },
            methods:{

                create(){
                    this.action = "create"
                    this.name = ""
                    this.unitId = ""
                },
                store(){

                    axios.post("{{ url('/admin/unit/store') }}", {name: this.name})
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

                    axios.post("{{ url('admin/unit/update') }}", {id: this.unitId, name: this.name})
                    .then(res => {

                        if(res.data.success == true){

                            alert(res.data.msg)
                            this.name = ""
                            this.unitId = ""
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
                edit(unit){
                    this.action = "edit"
                    this.name = unit.name
                    this.unitId = unit.id
                },
                fetch(page = 1){

                    axios.get("{{ url('/admin/unit/fetch/') }}"+"/"+page)
                    .then(res => {

                        this.units = res.data.units
                        this.pages = Math.ceil(res.data.unitsCount / 20)

                    })
                    .catch(err => {
                        $.each(err.response.data.errors, function(key, value){
                            alert(value)
                        });
                    })

                },
                erase(id){

                    if(confirm("¿Está seguro?")){

                        axios.post("{{ url('/admin/unit/delete/') }}", {id: id}).then(res => {

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