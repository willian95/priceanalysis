@extends('layouts.user')

@section('content')

    <div id="dev-post-show">
        <div class="container mt-5">

            <div class="row">

              <!---  <div class=" offset-md-2 col-md-12 card__shadow-general--grid" style="margin-top: 20px;">
                    <div class="offset-md-2 col-md-12 card__shadow-general">
                        
                        <h3 class="text-center">
                            Dirección de entrega: @{{ address }}
                        </h3>
                    </div>
                </div>--->
             
                <div class="offset-md-2 col-md-8">
                    <h3 class="text-center font ">@{{ title }}</h3>
                </div>
                <div class="offset-md-3 col-md-6 text-center ">
                    <p>
                        @{{ description }}
                    </p>
                </div>

                
            </div>
            <div class="row ">
                <div class="flex_line-text offset-md-2 mt-3 mb-3">
                    <p class="text-center mb-0"><strong> <i class="fa fa-user"></i> Razón social:</strong> @{{ businessName }}</p>
                    <p class="text-center mb-0"><strong><i class="fa fa-address-card"></i> R.I.F: </strong>@{{ rif }}</p>
                    <p class="text-center"><strong><i class="fa fa-map-pin "></i>Dirección de entrega: </strong>@{{ address }}</p>
                </div>
                <div class="offset-md-2 col-md-8 card__shadow-general ">
                    <div class="col-md-12 mt-4 flex_line">
                        <h5 class=" card-title">Agregar oferta</h5>
                        <small>* Los precios son representados en dolares</small>
                       
                    </div>
                    <div class=" col-6 offset-3 mr-4">
                        <div class="form-group" v-if="requestShipping">
                            <label>Flete</label>
                            <input class="form-control  mr-4" type="text" placeholder="precio" v-model="shippingCost">
                        </div>
                        
                    </div>
                    <div class="form-group offset-3 col-10" v-for="product in products">
                        <div class="">
                            <label>@{{ product.product }} - @{{ product.amount }} @{{ product.unit_name }}</label>              
                            <input class="offer form-control col-7  mr-4 " :id="'offer'+product.id" type="text" placeholder="precio">                                
                            
                        </div>
                                                
                                                
                    </div> 

                    @if(\Auth::check())
                        <p class="ml-5 mt-4">
                            <button class="btn btn-success " @click="storeOffer()">Ofertar <i class="fa fa-plus ml-2"></i></button>
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
                    requestShipping: '{{ $post->request_shipping }}',
                    address: '{{ $post->user->delivery_address  }}',
                    shippingCost:0,
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

                    axios.post("{{ url('/offer/post/') }}"+"/"+this.postId, {offerProducts: this.productOffer, postId: this.postId, shippingCost: this.shippingCost})
                    .then(res => {

                        if(res.data.success == true){

                            alert(res.data.msg)
                            this.shippingCost = 0
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
                if("{{ url()->current() }}" == previousUrl){
                    localStorage.removeItem("previousUrl")
                }
                //this.fetchOffers(1)

            }
        }); 


    </script>

@endpush