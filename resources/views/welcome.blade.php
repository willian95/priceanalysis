@extends('layouts.user')

@section('content')

    <div class="container" id="dev-landing">
        <div class="row" v-for="post in posts">
            <div class="offset-md-2 col-md-8">
                <a :href="'{{ url('/post/show/') }}'+'/'+post.id">
                    <div class="card">
                        <div class="card-body">
                            @{{ post.title }}
                        </div>
                    </div>
                </a>
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

                    axios.get("{{ url('/post/fetch/') }}"+"/"+page)
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