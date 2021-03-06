@extends('layouts.user')

@section('content')

    <div class="container" id="dev-landing">
        <div class="row bg">
            <div class="col-12">
                <h5 class="card-title mb-5">Mis publicaciones</h5>
            </div>
            <div class="col-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Titulo</th>
                            <th>Código</th>
                            <th>Tipo de publicación</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(post, index) in posts">
                            <td>@{{ index + 1 }}</td>
                            <td>@{{ post.title }}</td>
                            <td>@{{ post.code }}</td>
                            <td>
                                <span v-if="post.is_private == 0">Pública</span>
                                <span v-else>Privada</span>
                            </td>
                            <td>
                                <a class="btn btn-success" :href="'{{ url('/my-posts/show/') }}'+'/'+post.id"><i class="fa fa-eye"></i></a>
                                <a class="btn btn-success" :href="'{{ url('/my-posts/edit/') }}'+'/'+post.id"><i class="fa fa-edit"></i></a>
                                <button class="btn btn-secondary" @click="confirm(post.id)"><i class="fa fa-trash"></i></button>
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
                        <li v-for="page in pages" class="page-item"><a class="page-link"  @click="fetch(page)">@{{ page }}</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>

@endsection

@push('scripts')

<script type="text/javascript">
        
        const app = new Vue({
            el: '#dev-landing',
            data(){
               return{
                   posts:[],
                   pages:0
               }
            },
            methods:{
                
                fetch(page = 1){

                    axios.get("{{ url('/my-posts/fetch/') }}"+"/"+page)
                    .then(res => {

                        if(res.data.success == true){
                            
                            this.posts = res.data.posts
                            this.pages = Math.ceil(res.data.postsCount / 20)

                        }

                    })
                
                },
                confirm(id){

                    if(confirm("¿Estás seguro?")){

                        axios.post("{{ url('/post/delete') }}", {postId: id}).then(res => {

                            if(res.data.success == true){
                                alertify.success(res.data.msg)
                                this.fetch()
                            }else{
                                alertify.error(re.data.msg)
                            }

                        })

                    }

                }

            },
            created(){
                
                this.fetch()

            }
        }); 


    </script>

@endpush