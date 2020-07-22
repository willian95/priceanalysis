@extends('layouts.admin')

@section('content')

    <div id="dev-app">
        <div class="container">
            <div class="top_title">
                <h3 class="text-center">Emails</h3>
                <button class="btn btn-success mr-5" data-toggle="modal" data-target="#createEmail">Crear<img src="{{ asset('assets/img/iconos/bx-list-plus.svg') }}" alt=""></button>
              </div>
     
          <div class="bg__tables">
            <div class="row">
               
                <div class="col-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Email</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(email, index) in emails">
                                <th>@{{ index + 1 }}</th>
                                <td>@{{ email.email }}</td>
                                <td>
                                    <button class="btn btn-success fa fa-edit btn-transparent__green" data-toggle="modal" data-target="#createEmail" @click="edit(email)"></button>
                                    <button class="btn btn-danger" @click="erase(email.id)"><img class="filter " src="{{ asset('assets/img/iconos/bx-trash.svg') }}" alt=""></button>
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

        <div class="modal fade" id="createEmail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            <label for="email">Email</label>
                            <input type="text" class="form-control" id="name" v-model="email">
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
                    modalTitle:"Crear email",
                    email:"",
                    emailId:"",
                    action:"create",
                    emails:[],
                    pages:0
                }
            },
            methods:{

                create(){
                    this.action = "create"
                    this.email = ""
                    this.emailId = ""
                },
                store(){

                    axios.post("{{ url('/admin/email/store') }}", {email: this.email})
                    .then(res => {

                        if(res.data.success == true){

                            alertify.success(res.data.msg)
                            this.email = ""
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

                    axios.post("{{ url('admin/email/update') }}", {id: this.emailId, email: this.email})
                    .then(res => {

                        if(res.data.success == true){

                            alertify.success(res.data.msg)
                            this.email = ""
                            this.emailId = ""
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
                edit(email){
                    this.action = "edit"
                    this.email = email.email
                    this.emailId = email.id
                },
                fetch(page = 1){

                    axios.get("{{ url('/admin/email/fetch/') }}"+"/"+page)
                    .then(res => {

                        this.emails = res.data.emails
                        this.pages = Math.ceil(res.data.emailsCount / 20)

                    })
                    .catch(err => {
                        $.each(err.response.data.errors, function(key, value){
                            alertify.error(value[0])
                        });
                    })

                },
                erase(id){

                    if(confirm("¿Está seguro?")){

                        axios.post("{{ url('/admin/email/delete/') }}", {id: id}).then(res => {

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