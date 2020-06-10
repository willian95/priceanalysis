@extends('layouts.user')

@section('content')

    <div class="container" id="dev-landing">
        <div class="row bg">
            <div class="col-12">
                <h5 class="card-title mb-5">Mis pubicaciones</h5>
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
                                <a class="btn btn-success" :href="'{{ url('/my-posts/show/') }}'+'/'+post.id">Ver</a>
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
                
                }

            },
            created(){
                
                this.fetch()

            }
        }); 


    </script>

@endpush