@extends('layouts.user')

@section('content')

    <div id="dev-post-show">
        <div class="container">

            <div class="row">
                <div class="offset-md-2 col-md-8">
                    <h3 class="text-center">Razón social: @{{ businessName }}</h3>
                </div>
                <div class="offset-md-2 col-md-8">
                    <h3 class="text-center">R.I.F: @{{ rif }}</h3>
                </div>
                <div class="offset-md-2 col-md-8">
                    <h3 class="text-center">@{{ title }}</h3>
                </div>
                <div class="offset-md-3 col-md-6">
                    <p>
                        @{{ description }}
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="offset-md-2 col-md-8">
                    <h5 class="text-center">agregar oferta</h5>
                </div>
                <div class="offset-md-2 col-md-8">
                    <div class="form-group" v-for="product in products">
                        <label>@{{ product.product }} - @{{ product.amount }} @{{ product.unit_name }}</label>
                        <input class="offer form-control" :id="'offer'+product.id" type="text" placeholder="precio">
                    </div>
                    @if(\Auth::check())
                    <p class="text-center">
                        <button class="btn btn-success" @click="storeOffer()">Ofertar</button>
                    </p>
                    @endif
                </div>
            </div>
            <!--<div class="row">
                <div class="offset-md-2 col-md-8">
                    <h5 class="text-center">Ofertas</h5>
                </div>
                <div class="offset-md-2 col-md-8">
                    <div class="form-group" v-for="offer in offers">
                        
                        <div class="card" v-if="offer.id == bestPriceId" style="background-color: green;">
                            <div class="card-body">
                                <p>@{{ offer.user.name }}</p>
                                <p><label>Total: @{{ offer.sum }}</label></p>
                                <label style="margin-right: 5px;" v-for="product in offer.products">@{{ product.post_product.product }} - @{{ product.price }}</label>
                            </div>
                        </div>


                        <div class="card" v-if="offer.id == midPriceId" style="background-color: yellow;">
                            <div class="card-body">
                                <p>@{{ offer.user.name }}</p>
                                <p><label>Total: @{{ offer.sum }}</label></p>
                                <label style="margin-right: 5px;" v-for="product in offer.products">@{{ product.post_product.product }} - @{{ product.price }}</label>
                            </div>
                        </div>

                        <div class="card" v-if="offer.id == worstPriceId" style="background-color: red;">
                            <div class="card-body">
                                <p>@{{ offer.user.name }}</p>
                                <p><label>Total: @{{ offer.sum }}</label></p>
                                <label style="margin-right: 5px;" v-for="product in offer.products">@{{ product.post_product.product }} - @{{ product.price }}</label>
                            </div>
                        </div>

                        <div class="card" v-if="offer.id != bestPriceId && offer.id != midPriceId && offer.id != worstPriceId">
                            <div class="card-body">
                                <p>@{{ offer.user.name }}</p>
                                <p><label>Total: @{{ offer.sum }}</label></p>
                                <label style="margin-right: 5px;" v-for="product in offer.products">@{{ product.post_product.product }} - @{{ product.price }}</label>
                            </div>
                        </div>

                    </div>
                </div>
            </div>-->
            <div class="row">
                <div class="col-12">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <li v-for="page in pages" class="page-item"><a class="page-link"  @click="fetchOffers(page)">@{{ page }}</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')

    <script type="text/javascript">
        
        const app = new Vue({
            el: '#dev-post-show',
            data(){
               return{
                    businessName:"{{ $post->user->company_name }}",
                    rif:"{{ $post->user->rif }}",
                    title:'{{ $post->title }}',
                    postId:'{{ $post->id }}',
                    description:'{{ $post->description }}',
                    products:[],
                    productOffer:[],
                    offers:[],
                    offersCount:0,
                    pages:0,
                    bestPriceId:0,
                    midPriceId:0,
                    worstPriceId:0
               }
            },
            methods:{
                
                productFetch(){

                    axios.get("{{ url('/post/product/') }}"+"/"+this.postId)
                    .then(res => {
                        
                        if(res.data.success == true){
                            this.products = res.data.products
                        }else{
                            alert(res.data.msg)
                        }

                    })

                },
                storeOffer(){

                    var element = $('.offer').map((_,el) => el).get()
                    element.forEach((data, index) => {
                        
                        this.productOffer.push({postProductId: data.id.substring(5, data.id.length), price: $("#"+data.id).val()})
                       
                    })

                    axios.post("{{ url('/offer/post/') }}"+"/"+this.postId, {offerProducts: this.productOffer, postId: this.postId})
                    .then(res => {

                        if(res.data.success == true){

                            alert(res.data.msg)
                            this.productOffer = []
                            var element = $('.offer').map((_,el) => el).get()
                            element.forEach((data, index) => {
                                
                                $("#"+data.id).val("")
                            
                            })

                            this.fetchOffers()

                        }else{

                            alert(res.data.msg)

                        }

                    })

                },
                fetchOffers(page = 1){

                    axios.get("/offer/fetch/post/"+this.postId+"/page"+"/"+page)
                    .then(res => {

                        if(res.data.success == true){

                            this.offers = res.data.offers
                            this.pages = Math.ceil(res.data.offersCount/20)

                            this.bestPriceId = res.data.bestPriceId
                            this.midPriceId = res.data.midPriceId
                            this.worstPriceId = res.data.worstPriceId

                        }else{
                            alert(res.data.msg)
                        }

                    })

                }

            },
            created(){
                
                this.productFetch()
                localStorage.setItem("previousUrl", "{{ url()->current() }}")
                let previousUrl = localStorage.getItem("previousUrl")
                if("{{ url()->current() }}" == previous){
                    localStorage.removeItem("previousUrl")
                }
                //this.fetchOffers(1)

            }
        }); 


    </script>

@endpush