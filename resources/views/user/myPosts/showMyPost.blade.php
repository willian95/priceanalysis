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

                <div class="col-12 card__shadow-general">
                    <table class="table ">
                        <thead>
                            <tr>
                                <th>Empresa</th>
                                <th>Total</th>
                                <th>Flete</th>
                                <th>Productos</th>
                                <th>% Diferencia</th>
                                <th>Ver Productos</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(offer, index) in offers">
                                <td v-bind:class="{'bestPrice': offer.id == bestPriceId,  'worstPrice': offer.id == worstPriceId}">
                                    @{{ offer.user.company_name }}
                                    
                                </td>
                                <td>$ @{{ offer.sum + offer.shipping_cost }}</td>
                                <td>$ @{{ offer.shipping_cost }}</td>
                                <td>$ @{{ offer.sum }}</td>
                                <td>
                                    @{{ (((offer.sum + offer.shipping_cost)/(offers[0].sum + offers[0].shipping_cost)*100) - 100).toFixed(4)  }} %
                                </td>
                                <td>
                                    <button class="btn btn-info" @click="showOffer(offer.products)" data-toggle="modal" data-target="#productModal">ver</button>
                                </td>    
                            </tr>
                        </tbody>
                    </table>
                </div>
                
                <!--<div class="offset-md-2 col-md-8 card__shadow-general" v-for="offer in offers" v-bind:class="{'bestPrice': offer.id == bestPriceId,  'worstPrice': offer.id == worstPriceId}">

                    <h3 class="mt-3 ml-3" >@{{ offer.user.name }}</h3>
                    <div class="line-pag  items_offert justify-content-around mt-4 mb-4">
                    
                        <p><span v-if="offer.user.phone_number"><strong>tel:</strong> @{{ offer.user.phone_number }}</span> <span v-if="offer.user.email"><strong>email:</strong> @{{ offer.user.email }}</span></p>
                        <div class="line-pag  items_offert justify-content-around">
                            <p> <i class="fa fa-cart-plus"></i> Productos: $ @{{ offer.sum }}</p>
                            <p style="margin-left: 10px;"> <i class="fa fa-bus"></i> Flete: $ @{{ offer.shipping_cost }}</p>
                            <p style="margin-left: 10px;"> <i class="fa fa-dollar"></i> Total: $ @{{ offer.sum + offer.shipping_cost }}</p>
                        </div>
                    </div>
                

                    <div class="text-center" style="padding-left: 34px; padding-right: 64px;">
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

                </div>-->
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

            <div class="modal fade" id="productModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Productos</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <table class="table ">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Producto</th>
                                    <th>Precio</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(product, index) in productsOffer">
                                    <td>@{{ index + 1 }}</td>
                                    <td>@{{ product.post_product.product }} - @{{ product.post_product.amount }} @{{ product.post_product.unit_name }} </td>
                                    <td>@{{ product.price }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    </div>
                    </div>
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
                    productsOffer:[],
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
                            alertify.error(res.data.msg)
                        }

                    })

                },
                showOffer(products){
                    this.productsOffer = products
                },
                storeOffer(){

                    var element = $('.offer').map((_,el) => el).get()
                    element.forEach((data, index) => {
                        
                        this.productOffer.push({postProductId: data.id.substring(5, data.id.length), price: $("#"+data.id).val()})
                       
                    })

                    axios.post("{{ url('/offer/post/') }}"+"/"+this.postId, {offerProducts: this.productOffer, postId: this.postId})
                    .then(res => {

                        if(res.data.success == true){

                            alertify.success(res.data.msg)
                            this.productOffer = []
                            var element = $('.offer').map((_,el) => el).get()
                            element.forEach((data, index) => {
                                
                                $("#"+data.id).val("")
                            
                            })

                            this.fetchOffers()

                        }else{

                            alertify.error(res.data.msg)

                        }

                    })

                },
                fetchOffers(page = 1){

                    axios.get("{{url('/offer/fetch/post/') }}"+"/"+this.postId+"/page"+"/"+page)
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

                }

            },
            created(){
                
                this.productFetch()
                this.fetchOffers(1)

            }
        }); 


    </script>

@endpush