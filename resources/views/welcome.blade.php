@extends('layouts.user')

@section('content')

    <div class="container" id="dev-landing">
        <div class="row" v-for="post in posts" style="margin-top: 8px;">
            <div class="offset-md-3 col-md-6">
                <a :href="'{{ url('/post/show/') }}'+'/'+post.code">
                    <div class="card">
                        <div class="card-body">
                            <p>@{{ post.user.name }}</p>
                            <h5>@{{ post.title }}</h5>

                            <p>@{{ post.created_at.toString().substring(0, 10) }}</p>

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