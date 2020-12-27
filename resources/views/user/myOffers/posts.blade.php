@extends('layouts.user')

@section('content')

    <div class="container" id="dev-landing">
        <div class="row bg">
            <div class="col-12">
                <h5 class="card-title mb-5">Mis Ofertas</h5>
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
                            <td>@{{ post.post.title }}</td>
                            <td>@{{ post.post.code }}</td>
                            <td>
                                <span v-if="post.post.is_private == 0">Pública</span>
                                <span v-else>Privada</span>
                            </td>
                            <td>
                                <a class="btn btn-success" :href="'{{ url('/my-offers/show/') }}'+'/'+post.post.id">Ver</a>
                                <a class="btn btn-success" :href="'{{ url('/my-offers/edit/') }}'+'/'+post.post.id">Editar</a>
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
                   page:1,
                   pages:0
               }
            },
            methods:{
                
                fetch(page = 1){

                    this.page = page

                    axios.get("{{ url('/my-offers/fetch/') }}"+"/"+page)
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