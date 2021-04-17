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
                    

                    @if(\Auth::check())
                        @if(App\Offer::where("user_id", \Auth::user()->id)->where("post_id", $post->id)->count() === 0 )

                        <div class="col-md-12 mt-4 flex_line">
                            <h5 class=" card-title">Agregar oferta</h5>
                            <small>* Los precios son representados en dólares</small>
                        
                        </div>
                        <div class=" col-6 offset-3 mr-4">
                            <div class="form-group" v-if="requestShipping == 1">
                                <label>Flete</label>
                                <input class="form-control  mr-4" type="text" placeholder="precio" v-model="shippingCost" @keyup="checkOfferProducts()"  @keypress="isNumberDot($event)">
                            </div>
                            
                        </div>
                        <div class="form-group offset-3 col-10" v-for="product in products">
                            <div class="">
                                <label>@{{ product.product }}</label>              
                                <input class="offer form-control col-7  mr-4 " :id="'offer'+product.id+'-'+product.amount" type="text" placeholder="precio unitario" @keyup="checkOfferProducts()"  @keypress="isNumberDot($event)"> x cant. @{{ product.amount }}                                
                                
                            </div>
                                                                
                        </div> 

                        <div class="form-group offset-3 col-10" v-for="product in pendingProducts">
                            <div class="">
                                <label>@{{ product.displayName }}</label>              
                                <input class="pending-offer form-control col-7  mr-4 " :id="'pending_offer'+product.id+'-'+product.amount" type="text" placeholder="precio unitario" @keyup="checkOfferProducts()"  @keypress="isNumberDot($event)"> x cant. @{{ product.amount }}                                
                                
                            </div>
                                                                
                        </div> 

                        <div class="row">
                            <div class="col-md-6">
                                <p class="ml-5 mt-4">
                                    @if(\Auth::user()->id != $post->user->id)
                                    <button class="btn btn-success " @click="storeOffer()">Ofertar <i class="fa fa-plus ml-2"></i></button>
                                    @else
                                        <p>Esta publicación te pertenece, por lo tanto no puedes ofertar en ella</p>
                                    @endif
                                </p>
                            </div>
                            <div class="col-md-6">
                                <p class="ml-5 mt-4 pr-4">
                                    
                                    <p class="text-right"><span class="font-weight-bold">Total:</span> $ @{{ total }}</p>
                            
                                </p>
                            </div>
                        </div>
                        @else
                            <h3 class="text-center mt-2 mb-2">Ya has realizado una oferta para esta publicación</h3>
                            <p class="ml-5 mt-4">
                                @if(\Auth::user()->id != $post->user->id)
                                    <a :href="'{{ url('/my-offers/edit/') }}'+'/'+postId" class="btn btn-success">Editar <i class="fa fa-plus ml-2"></i></a>
                                @endif
                            </p>
                        @endif
                    @endif
                    
                </div>
                
               

            

            </div>


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
                    pendingProductOffer:[],
                    pendingProducts:[],
                    offers:[],
                    offersCount:0,
                    pages:0,
                    bestPriceId:0,
                    midPriceId:0,
                    worstPriceId:0,
                    total:0
               }
            },
            methods:{
                
                productFetch(){

                    axios.get("{{ url('/post/product/') }}"+"/"+this.postId)
                    .then(res => {
                        
                        if(res.data.success == true){
                            this.products = res.data.products
                            this.pendingProducts = res.data.pendingProducts
                        }else{
                            alertify.error(res.data.msg)
                        }

                    })

                },
                checkOfferProducts(){
                    this.total = 0
                    var element = $('.offer').map((_,el) => el).get()
                    element.forEach((data, index) => {
                        
                        let amount = data.id.substring(data.id.indexOf("-") + 1, data.id.length)
                        let total = $("#"+data.id).val() * parseFloat(amount)
                        
                        this.total = parseFloat(this.total) + parseFloat(total)

                    })

                    var element = $('.pending-offer').map((_,el) => el).get()
                    element.forEach((data, index) => {
                        
                        let amount = data.id.substring(data.id.indexOf("-") + 1, data.id.length)
                        let total = $("#"+data.id).val() * parseFloat(amount)
                        
                        this.total = parseFloat(this.total) + parseFloat(total)

                    })

                    this.total = this.total + parseFloat(this.shippingCost)
                    
                },
                storeOffer(){

                    var element = $('.offer').map((_,el) => el).get()
                    element.forEach((data, index) => {
                        
                        let amount = data.id.substring(data.id.indexOf("-") + 1, data.id.length)
                        this.productOffer.push({postProductId: data.id.substring(5, data.id.length), price: $("#"+data.id).val(), "amount": amount})
                       
                    })

                    var element = $('.pending-offer').map((_,el) => el).get()
                    element.forEach((data, index) => {
                        
                        let amount = data.id.substring(data.id.indexOf("-") + 1, data.id.length)
                        this.pendingProductOffer.push({id: data.id.substring(13, data.id.length), price: $("#"+data.id).val(), "amount": amount})
                       
                    })

                    axios.post("{{ url('/offer/post/') }}"+"/"+this.postId, {offerProducts: this.productOffer, pendingOfferProduct: this.pendingProductOffer, postId: this.postId, shippingCost: this.shippingCost})
                    .then(res => {

                        if(res.data.success == true){

                            alertify.success(res.data.msg)
                            this.shippingCost = 0
                            this.productOffer = []
                            var element = $('.offer').map((_,el) => el).get()
                            element.forEach((data, index) => {
                                
                                $("#"+data.id).val("")
                            
                            })

                            this.fetchOffers()
                            window.setTimeout(() => {
                                window.location.href="{{ url('/home') }}"
                            }, 2000);

                        }else{

                            alertify.error(res.data.msg)

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
                            alertify.error(res.data.msg)
                        }

                    })

                },
                isNumberDot(evt) {
                    evt = (evt) ? evt : window.event;
                    var charCode = (evt.which) ? evt.which : evt.keyCode;
                    if ((charCode > 31 && (charCode < 48 || charCode > 57)) && charCode !== 46) {
                        evt.preventDefault();;
                    } else {

                        return true;
                    }
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