@extends('layouts.user')

@section('content')

    <div id="dev-post-show">
        <div class="container">
            <div class="row">
                <div class="offset-md-2 col-md-8">
                    <h3 class="text-center mt-5 font">@{{ title }}</h3>
                </div>
                <div class="offset-md-3 col-md-6 text-center">
                    <p>
                        @{{ description }}
                    </p>
                </div>
            </div>
            
            <div class="row">
                <div class="offset-md-2 col-md-8 ">
                    <h5 class="card-title mb-4 mt-3">Ofertas</h5>
                </div>
                <div class="offset-md-2 col-md-8 card__shadow-general" v-for="offer in offers" v-bind:class="{'bestPrice': offer.id == bestPriceId,  'worstPrice': offer.id == worstPriceId}">

                    <h3 class="mt-3 ml-3" >@{{ offer.user.name }}</h3>
                    <div class="line-pag  items_offert justify-content-around mt-4 mb-4">
                    <h3 class="mt-3 ml-3" >@{{ offer.user.name }} </h3>
                    <p><span v-if="offer.user.phone_number">tel: @{{ offer.user.phone_number }}</span> <span vif="offer.user.email">email: @{{ offer.user.email }}</span></p>
                    <div class="line-pag  items_offert justify-content-around">
                        <p> <i class="fa fa-cart-plus"></i> Productos: @{{ offer.sum }}</p>
                        <p> <i class="fa fa-bus"></i> Flete: @{{ offer.shipping_cost }}</p>
                        <p> <i class="fa fa-dollar"></i> Total: @{{ offer.sum + offer.shipping_cost }}</p>
                    </div>

               <div class="text-center" style="padding-left: 34px;
               padding-right: 64px;">
                <table class="table ">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Producto</th>
                            <th>Precio</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(product, index) in offer.products">
                            <td>@{{ index + 1 }}</td>
                            <td>@{{ product.post_product.product }} - @{{ product.post_product.amount }} @{{ product.post_product.unit_name }} </td>
                            <td>@{{ product.price }}</td>
                        </tr>
                    </tbody>
                </table>
               </div>

                    
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
                this.fetchOffers(1)

            }
        }); 


    </script>

@endpush