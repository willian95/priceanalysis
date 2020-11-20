@extends('layouts.user')

@section('content')

    <div class="container" id="dev-businesses">
        <div class="row" v-for="category in categories">
            <div class="col-12" v-if="category.users.length > 0">
                <h3 class="text-center">@{{ category.name }}</h3>
            </div>
            <div class="col-3" v-for="user in category.users">
                <div class="card">
                    <div class="card-body">
                        <img v-if="user.image == null" class="img_p" src="https://cdn.pixabay.com/photo/2016/11/14/17/39/person-1824144_960_720.png" alt="">
                        <img v-else class="img_p" :src="user.image" alt="">
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

@endsection

@push('scripts')

<script type="text/javascript">
        
        const app = new Vue({
            el: '#dev-businesses',
            data(){
               return{
                   categories:[],
                   pages:0
               }
            },
            methods:{
                
                fetch(page = 1){

                    axios.get("{{ url('/businesses/fetch/') }}"+"/"+page)
                    .then(res => {

                        if(res.data.success == true){
                            
                            this.categories = res.data.categories
                            this.pages = Math.ceil(res.data.categoriesCount / 10)

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