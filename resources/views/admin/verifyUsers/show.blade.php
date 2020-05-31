@extends('layouts.user')

@section('content')

    <div id="dev-profile">

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h3 class="text-center">Datos Generales</h3>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">R.I.F</label>
                        <input type="text" class="form-control" id="name" v-model="rif" disabled="true">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">País</label>
                        <select class="form-control" v-model="countryId" disabled="true">
                            <option :value="country.id" v-for="country in countries">@{{ country.name }}</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="fiscalAddress">Dirección fiscal</label>
                        <input type="text" class="form-control" id="fiscalAddress" v-model="fiscalAddress" disabled="true">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="deliveryAddress">Dirección de Entrega</label>
                        <input type="text" class="form-control" id="deliveryAddress" v-model="deliveryAddress" disabled="true">
                    </div>
                </div>

                <div class="col-12">
                    <h3 class="text-center">Descripción de la Actividad e información comercial</h3>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="categoryId">Ramo Comercial</label>
                        <select class="form-control" v-model="categoryId" id="categoryId" disabled="true">
                            <option :value="category.id" v-for="category in categories">@{{ category.name }}</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="products">Productos y/o servicios que ofrece (separados por coma)</label>
                        <input type="text" class="form-control" id="products" v-model="products" disabled="true">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="startDate">Fecha de inicio de operaciones</label>
                        <input type="date" class="form-control" id="startDate" v-model="startDate" disabled="true">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="employeeAmount">Cantidad de empleados</label>
                        <input type="text" class="form-control" id="employeeAmount" v-model="employeeAmount" disabled="true">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="maleEmployeeAmount">Cantidad de empleados hombre</label>
                        <input type="text" class="form-control" id="maleEmployeeAmount" v-model="maleEmployeeAmount" disabled="true">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="femaleEmployeeAmount">Cantidad de empleados mujer</label>
                        <input type="text" class="form-control" id="femaleEmployeeAmount" v-model="femaleEmployeeAmount" disabled="true">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="femaleLeadershipAmount">Mujeres lideres en la origanización</label>
                        <input type="text" class="form-control" id="femaleLeadershipAmount" v-model="femaleLeadershipAmount" disabled="true">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="comercialCountries">Paises con presencia comercial</label>
                        <ul>
                            <li v-for="comercialCountry in comercialCountries">@{{ comercialCountry.name }}</li>
                        </ul>
                    </div>

                </div>
                
                <div class="col-12">
                    <h3 class="text-center">Información de contacto</h3>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="contactName">Persona de contacto</label>
                        <input type="text" class="form-control" id="contactName" v-model="contactName" disabled="true">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="contactPhone">Número de teléfono</label>
                        <input type="text" class="form-control" id="contactPhone" v-model="contactPhone" disabled="true">
                    </div>
                </div>
                
                <div class="col-12">
                    <h3 class="text-center">Información complementaria</h3>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="mainClients">Clientes principales (separados por coma)</label>
                        <input type="text" class="form-control" id="mainClients" v-model="mainClients" disabled="true">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" v-model="importCheck" value="true" id="importCheck" disabled="true">
                        <label class="form-check-label" for="importCheck">
                            ¿Importas?
                        </label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="true" id="exportCheck" v-model="exportCheck" disabled="true">
                        <label class="form-check-label" for="exportCheck">
                            ¿Exportas?
                        </label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="true" v-model="nationalMadeCheck" id="nationalMadeCheck" disabled="true">
                        <label class="form-check-label" for="nationalMadeCheck">
                            ¿Fabricación nacional?
                        </label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="true" id="relatedActivitiesCheck" v-model="relatedActivitiesCheck" disabled="true">
                        <label class="form-check-label" for="relatedActivitiesCheck">
                            ¿Desea ser informado sobre negocios relacionados a su actividad comercial?
                        </label>
                    </div>
                </div>
                
                
                <div class="col-12">
                    <p class="text-center">
                        ¿Desea validar la empresa?
                    </p>
                    <p class="text-center">
                        <button class="btn btn-success" @click="verifyUser(true)">Sí</button>
                        <button class="btn btn-danger" @click="verifyUser(false)">No</button>
                    </p>
                </div>
               
            </div>
        </div>

    </div>

@endsection

@push("scripts")

<script type="text/javascript">
        
        const app = new Vue({
            el: '#dev-profile',
            data(){
               return{
                    countries:[],
                    rif:"{{ $user->rif }}",
                    countryId:"{{ $user->country_id }}",
                    fiscalAddress:"{{ $user->fiscal_address }}",
                    deliveryAddress:"{{ $user->delivery_address }}",
                    categories:[],
                    categoryId:"{{ $user->category_id }}",
                    products:"{{ $user->comercialInfo->products }}",
                    startDate:"{{ $user->comercialInfo->opening }}",
                    employeeAmount:"{{ $user->comercialInfo->employees_amount }}",
                    maleEmployeeAmount:"{{ $user->comercialInfo->men_employees_amount }}",
                    femaleEmployeeAmount:"{{ $user->comercialInfo->women_employees_amount }}",
                    femaleLeadershipAmount:"{{ $user->comercialInfo->women_leadership_amount }}",
                    selectedComercialCountry:"",
                    comercialCountries:[],
                    contactName:"{{ $user->comercialInfo->contact_person }}",
                    contactPhone:"{{ $user->comercialInfo->phone_number }}",
                    mainClients:"{{ $user->comercialInfo->main_clients }}",
                    importCheck:"{{ $user->comercialInfo->import ? 1 : '' }}",
                    exportCheck:"{{ $user->comercialInfo->export ? 1 : '' }}",
                    nationalMadeCheck:"{{ $user->comercialInfo->national_made ? 1 : '' }}",
                    relatedActivitiesCheck:"{{ $user->comercialInfo->related_activities ? 1 : '' }}",
                    isVerifyUser: "{{ $user->verify_user }}"

               }
            },
            methods:{
                
                fetchCountries(){

                    axios.get("{{ url('/country/fetch') }}")
                    .then(res => {
                        
                        if(res.data.success == true){

                            this.countries = res.data.countries

                        }else{

                            alert(res.data.msg)

                        }

                    })

                },
                fetchCategories(){

                    axios.get("{{ url('/category/fetchAll') }}")
                    .then(res => {

                        if(res.data.success == true){

                            this.categories = res.data.categories

                        }else{

                            alert(res.data.msg)

                        }

                    })

                },

                userCountriesFetch(){

                    axios.get("{{ url('/admin/verify-info/countries-info/fetch') }}"+"/"+"{{ $user->id }}")
                    .then(res => {

                        this.comercialCountries = res.data.countries

                    })

                },

                verifyUser(verify){

                    axios.post("{{ url('/admin/verify-info/verify/') }}"+"/"+"{{ $user->id }}", {verify: verify})
                    .then(res => {

                        if(res.data.success == true){

                            alert(res.data.msg)
                            window.location.href="{{ url('/admin/verify-user/index') }}"

                        }else{

                            alert(res.data.msg)

                        }

                    })

                }

            },
            created(){
                this.fetchCountries()
                this.fetchCategories()
                this.userCountriesFetch()

            }
        }); 


    </script>

@endpush