@extends('layouts.user')

@section('content')
    
    <style>
        body{
            background-color: #007DC5;
        }
    </style>

    <div class="container" id="dev-search">
        <div class="grid__publicacion mt-5">
            <div class="grid__publicacion--item" v-for="post in posts" style="margin-top: 8px;" v-if="post[0] != null">
                <div class="container">
                    <a :href="'{{ url('/post/show/') }}'+'/'+post[0].code">
                        <div class="card">
                            <div class="card-body--grid">
                                <div class="card-body--item">
                                    <img v-if="post[0].user.image == null" class="img_p" src="https://cdn.pixabay.com/photo/2016/11/14/17/39/person-1824144_960_720.png" alt="">

                                    <img v-else class="img_p" :src="post[0].user.image" alt="">                          

                             
                                </div>
                                <div class="card-body--item">
                                    <div class="top_title">
                                        <p class="titulo ">@{{ post[0].user.name }}</p>
                                        <p class="fecha_">@{{ post[0].created_at.toString().substring(0, 10) }}</p>
                                    </div>                               
                                    <p>@{{ post[0].title }}</p>

                                    <div>
                                 
                                    </div>
                                 <!--   <a href="" class="btn-general">Ver publicacion</a>-->
                                </div>
                            
                            
    
    
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
       


        <div class="row">
            <div class="col-12">
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <li v-for="page in pages" class="page-item"><a class="page-link"  @click="search(page)">@{{ page }}</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>

@endsection

@push('scripts')

<script type="text/javascript">
        
        const app = new Vue({
            el: '#dev-search',
            data(){
               return{
                   query:"{{ $search }}",
                   posts:[],
                   page:1,
                   pages:0
               }
            },
            methods:{
                
                search(page = 1){

                    this.page = page

                    axios.post("{{ url('/search/') }}", {"search": this.query, "page": this.page})
                    .then(res => {

                        if(res.data.success == true){
                            
                            this.posts = res.data.posts
                            this.pages = Math.ceil(res.data.postsCount / 20)

                        }

                    })
                
                }

            },
            created(){
                
                this.search()

            }
        }); 


    </script>

@endpush