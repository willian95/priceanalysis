@extends('layouts.admin')

@push("css")
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.css" >
@endpush

@section('content')

    <div id="dev-app">
        
        <div class="container">
            <div class="top_title">
                <h3 class="text-center">Historico de precios</h3>
            </div>
            <div class="bg__tables ">
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group inputBox">
                            <label for="name">Nombre</label>
                            <input autocomplete="off" type="text" class="form-control" id="name" v-model="searchString" placeholder="ej: Harina de maíz" @keyup="search()">
                            <ul class="select_search">
                                <li v-for="search in searches">
                                    <a href="#" @click="selectProduct(search)">
                                        @{{ search.name }} @{{ search.brand.name }}
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3" v-if="productId != 0">
                        <div class="form-group inputBox">
                            <label for="unit">Unidad</label>
                            <select class="form-control" v-model="selectedUnit">
                                <option :value="unit" v-for="unit in units">@{{ unit.unit.name }}</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="">Fecha inicio</label>
                            <input type="date" class="form-control" v-model="startDate">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="">Fecha fin</label>
                            <input type="date" class="form-control" v-model="endDate">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <p class="text-center">
                            <button class="btn btn-primary" @click="getHistory()">Buscar</button>
                        </p>
                    </div>

                    <div class="col-12">
                        <canvas id="myChart"></canvas>
                    </div>
                </div>

            </div>
        </div>

    </div>

@endsection

@push('scripts')

    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>

    
    <script>

        const app = new Vue({
            el: '#dev-app',
            data(){
                return{
                    searchString:"",
                    searches:[],
                    units:"",
                    productId:"",
                    selectedUnit:"",
                    startDate:"",
                    endDate:"",
                    dates:[],
                    resultByDate:[],
                    myChart:null
                }
            },
            methods:{
                
                search(){

                    if(this.searchString != ""){
                        axios.post("{{ url('/admin/product/search') }}", {"search": this.searchString})
                        .then(res => {

                            this.searches = res.data.products

                        })
                    }else{
                        this.searches = ""
                    }

                },
                getHistory(){

                    axios.post("{{ url('/admin/price-history/history') }}", {"productId": this.productId, "selectedUnit": this.selectedUnit.unit_id, "startDate":this.startDate, "endDate": this.endDate})
                    .then(res => {

                        this.dates = []
                        this.resultByDate = []

                        let resultDates = res.data
                        this.getEntries(resultDates)

                    })

                },
                getEntries(resultDates){

                    let entries = Object.entries(resultDates)

                    if(entries.length == 0){
                        this.updateChart()
                    }

                    entries.forEach((entry) => {
                        this.getAverage(entry)
                    })

                },
                getAverage(entry){

                    let date = entry[0]
                    let average = 0
                    var total = 0;

                    entry[1].forEach((data) => {

                        total = parseFloat(data.price) + total

                    })

                    average = total/entry[1].length
                    this.dates.push(date)
                    this.resultByDate.push(average)

                    this.updateChart()

                },
                selectProduct(product){
                    this.productId = product.id
                    this.name = product.name
                    this.searches = ""
                    this.fetchUnits(product.id)
                },
                fetchUnits(id){
                    
                    if(id > 0){
                        axios.get("{{ url('/product/unit/') }}"+"/"+id)
                        .then(res => {

                            if(res.data.success == true){

                                this.units = res.data.units;

                            }else{
                                alertify.error(res.data.msg)
                            }

                        })
                    }
                    

                },
                updateChart(){
                    
                    var ctx = document.getElementById('myChart').getContext('2d');
                    
                    console.log(this.myChart)

                    if (this.myChart != undefined || this.myChart !=null) {
                        this.myChart.destroy();
                        console.log("hey")
                    }

                   this.myChart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: this.dates,
                            datasets: [{
                                label: 'promedio por fecha',
                                data: this.resultByDate,
                                borderWidth: 1
                            }]
                        },
                        options: {
                            scales: {
                                yAxes: [{
                                    ticks: {
                                        beginAtZero: true
                                    }
                                }]
                            }
                        }
                    });
                }

            },
            mounted(){

                

            }
        })
    </script>

@endpush