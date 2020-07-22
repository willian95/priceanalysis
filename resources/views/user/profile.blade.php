@extends('layouts.user')

@section('content')

    <div id="dev-profile">

      

        <div class="container mt-50 ">
            <!----indicadores---->
            <h5 class="card-title mb-5 mb-5">Mis datos</h5>
            <div class="tabs__profile mt-5">
                <input type="radio" id="tab1" name="tab-control" checked>
                <input type="radio" id="tab2" name="tab-control">
                <input type="radio" id="tab3" name="tab-control">  
                <input type="radio" id="tab4" name="tab-control">
                <input type="radio" id="tab5" name="tab-control">               
                <ul>
                    <li title="Datos Generales"><label for="tab1" role="button"><br><span><img class="icon_tab" src="{{ asset('assets/img/iconos/bx-id-card.svg') }}" alt=""> Datos Generales </span></label></li>
                    <li title="Descripción comercial"><label for="tab2" role="button"><br><span><img class="icon_tab" src="{{ asset('assets/img/iconos/bx-file.svg') }}" alt="">Descripción de act. comercial</span></label></li>
                    <li title="Información de contacto "><label for="tab3" role="button"><br><span><img class="icon_tab" src="{{ asset('assets/img/iconos/bx-user.svg') }}" alt="">Información de contacto </span></label></li>  
                    <li title="Informacion"><label for="tab4" role="button" ><br><span><img class="icon_tab icon_tab1" src="{{ asset('assets/img/iconos/bx-user-plus.svg') }}" alt="">Información complementaria </span></label></li>
                    <li title="verificacion"><label for="tab5" role="button" class="verification mt-5"><br><span>¿Desea que su empresa sea verificada?</span></label></li>
                </ul>
                <!----contenido---->
                <div class="slider__tabs"><div class="indicator"></div></div>
                <div class="content">

                    <!----form 1---->
                    <section class="section__w">
                        <div class="row box ">
                            <div class="col-12">
                                <h4 class="card-title mb-5">Datos Generales</h4>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group  inputBox">
            
                                    <input type="text" class="form-control" required="" id="name" v-model="rif" required="">
                                    <label for="name">R.I.F</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group  inputBox">
            
                                    <select class="form-control" required="" v-model="countryId">
                                        <option :value="country.id" v-for="country in countries">@{{ country.name }}</option>
                                    </select>
                                    <label for="name">País</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group  inputBox">
                                    <input type="text" class="form-control" required="" id="fiscalAddress" v-model="fiscalAddress">
                                    <label for="fiscalAddress">Dirección fiscal</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group  inputBox">
                                    <input type="text" class="form-control" required="" id="deliveryAddress"
                                        v-model="deliveryAddress">
                                    <label for="deliveryAddress">Dirección de Entrega</label>
                                </div>
                            </div>
            
                            <div class="col-md-12">
                                <p class="text-center">
                                    <button class="btn btn-success" @click="updateGeneralData()">Actualizar</button>
                                </p>
                            </div>
                        </div>
                    </section>
                    <!----form 2---->
                    <section class="section__w">
                        <div class="row box ">
                            <div class="col-12">
                                <h4 class="card-title mb-5 fs">Descripción de la Actividad e información comercial</h4>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group  inputBox">
                                    <select class="form-control" required="" v-model="categoryId" id="categoryId">
                                        <option :value="category.id" v-for="category in categories">@{{ category.name }}</option>
                                    </select>
                                    <label for="categoryId">Ramo Comercial</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group  inputBox">
                                    <input type="text" class="form-control" required="" id="products" v-model="products">
                                    <label for="products">Productos y/o servicios que ofrece (separados por coma)</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group  inputBox">
                                    <input type="date" class="form-control" required="" id="startDate" v-model="startDate">
                                    <label for="startDate">Fecha de inicio de operaciones</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group  inputBox">
                                    <input type="text" class="form-control" required="" id="employeeAmount"
                                        v-model="employeeAmount">
                                    <label for="employeeAmount">Cantidad de empleados</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group  inputBox">
                                    <input type="text" class="form-control" required="" id="maleEmployeeAmount"
                                        v-model="maleEmployeeAmount">
                                    <label for="maleEmployeeAmount">Cantidad de empleados hombre</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group  inputBox">
                                    <input type="text" class="form-control" required="" id="femaleEmployeeAmount"
                                        v-model="femaleEmployeeAmount">
                                    <label for="femaleEmployeeAmount">Cantidad de empleados mujer</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group  inputBox">
                                    <input type="text" class="form-control" required="" id="femaleLeadershipAmount"
                                        v-model="femaleLeadershipAmount">
                                    <label for="femaleLeadershipAmount">Mujeres lideres en la origanización</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group  inputBox">
                                    <select class="form-control" required="" v-model="selectedComercialCountry"
                                        @change="onComercialCountryChange()">
                                        <option :value="country" v-for="country in countries">@{{ country.name }}</option>
                                    </select>
                                    <label for="comercialCountries">Paises con presencia comercial</label>
                                </div>
            
                                <ul>
                                    <li v-for="comercialCountry in comercialCountries"
                                        @click="deleteComercialCountry(comercialCountry.id)">@{{ comercialCountry.name }}</li>
                                </ul>
            
                            </div>
                            <div class="col-md-12">
                                <p class="text-center">
                                    <button class="btn btn-success" @click="updateComercialActivity()">actualizar datos
                                        comerciales</button>
                                </p>
                            </div>
                        </div>
                    </section>
                    <!----form 3---->
                    <section class="section__w">
                        <div class="row box ">
                            <div class="col-12">
                                <h4 class="card-title mb-5">Información de contacto</h4>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group  inputBox">
                                    <input type="text" class="form-control" required="" id="contactName" v-model="contactName">
                                    <label for="contactName">Persona de contacto</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group  inputBox">
                                    <input type="text" class="form-control" required="" id="contactPhone" v-model="contactPhone">
                                    <label for="contactPhone">Número de teléfono</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <p class="text-center">
                                    <button class="btn btn-success" @click="updateContactInfo()">actualizar información de
                                        contacto</button>
                                </p>
                            </div>
                        </div>
                    </section>
                    <!----form 4---->
                    <section class="section__w">
                        <div class="row box ">
                            <div class="col-12">
                                <h5 class="card-title mb-5">Información complementaria</h5>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group  inputBox">
                                    <input type="text" class="form-control" required="" id="mainClients" v-model="mainClients">
                                    <label for="mainClients">Clientes principales (separados por coma)</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" v-model="importCheck" value="true"
                                        id="importCheck">
                                    <label class="form-check-label" for="importCheck">
                                        ¿Importas?
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="true" id="exportCheck"
                                        v-model="exportCheck">
                                    <label class="form-check-label" for="exportCheck">
                                        ¿Exportas?
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="true" v-model="nationalMadeCheck"
                                        id="nationalMadeCheck">
                                    <label class="form-check-label" for="nationalMadeCheck">
                                        ¿Fabricación nacional?
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="true" id="relatedActivitiesCheck"
                                        v-model="relatedActivitiesCheck">
                                    <label class="form-check-label" for="relatedActivitiesCheck">
                                        ¿Desea ser informado sobre negocios relacionados a su actividad comercial?
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <p class="text-center">
                                    <button class="btn btn-success" @click="updateOtherInfo()">actualizar información
                                        complementaria</button>
                                </p>
                            </div>
                        </div>
                    </section>
            
                    <section class="section__w ">
                        <div class="row box ">
                            <div class="col-12" v-if="isVerifyUser == ''">
                                <h4 class="card-title mb-5">Validación</h4>
                            </div>
                            <div class="col-12" v-if="isVerifyUser == ''">
                                <p class="text-center">
                                    <strong>¿Desea que su empresa sea verificada?</strong> En esta opcion, si el usuario selecciona
                                    <strong>SI</strong>, se le hace una verficiacion total de la informacion, se le pediria
                                    documentacion, en caso que seleccione <strong>NO</strong>, solo se verificaria el numero de
                                    identificacion tributaria; pero al momento de ser visto por otras empresas o personas se acotara
                                    si
                                    la empresa esta validad o No.
                                </p>
                                <p class="text-center">
                                    <button class="btn btn-success" @click="verifyUser(true)">Sí</button>
                                    <button class="btn btn-danger" @click="verifyUser(false)">No</button>
                                </p>
                            </div>
                        </div>
            
                    </section>
            
                </div>
            </div>
            <!--indicadores eeeend -->









            <!---<div class="mt-5">
          
               <div class="shadows__content">
                    <div class="row">
                        <div class="col-12">
                            <h3 class="text-center">Datos Generales</h3>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">R.I.F</label>
                                <input type="text" class="form-control" id="name" v-model="rif">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">País</label>
                                <select class="form-control" v-model="countryId">
                                    <option :value="country.id" v-for="country in countries">@{{ country.name }}</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="fiscalAddress">Dirección fiscal</label>
                                <input type="text" class="form-control" id="fiscalAddress" v-model="fiscalAddress">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="deliveryAddress">Dirección de Entrega</label>
                                <input type="text" class="form-control" id="deliveryAddress" v-model="deliveryAddress">
                            </div>
                        </div>
        
                        <div class="col-md-12">
                            <p class="text-center">
                                <button class="btn btn-success" @click="updateGeneralData()">Actualizar</button>
                            </p>
                        </div>
                    </div>
               </div>
               
                <div class="shadows__content">
                   <div class="row">
                    <div class="col-12">
                        <h3 class="text-center">Descripción de la Actividad e información comercial</h3>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="categoryId">Ramo Comercial</label>
                            <select class="form-control" v-model="categoryId" id="categoryId">
                                <option :value="category.id" v-for="category in categories">@{{ category.name }}</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="products">Productos y/o servicios que ofrece (separados por coma)</label>
                            <input type="text" class="form-control" id="products" v-model="products">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="startDate">Fecha de inicio de operaciones</label>
                            <input type="date" class="form-control" id="startDate" v-model="startDate">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="employeeAmount">Cantidad de empleados</label>
                            <input type="text" class="form-control" id="employeeAmount" v-model="employeeAmount">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="maleEmployeeAmount">Cantidad de empleados hombre</label>
                            <input type="text" class="form-control" id="maleEmployeeAmount" v-model="maleEmployeeAmount">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="femaleEmployeeAmount">Cantidad de empleados mujer</label>
                            <input type="text" class="form-control" id="femaleEmployeeAmount" v-model="femaleEmployeeAmount">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="femaleLeadershipAmount">Mujeres lideres en la origanización</label>
                            <input type="text" class="form-control" id="femaleLeadershipAmount" v-model="femaleLeadershipAmount">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="comercialCountries">Paises con presencia comercial</label>
                            <select class="form-control" v-model="selectedComercialCountry" @change="onComercialCountryChange()">
                                <option :value="country" v-for="country in countries">@{{ country.name }}</option>
                            </select>
                        </div>
    
                        <ul>
                            <li v-for="comercialCountry in comercialCountries" @click="deleteComercialCountry(comercialCountry.id)">@{{ comercialCountry.name }}</li>
                        </ul>
    
                    </div>
                    <div class="col-md-12">
                        <p class="text-center">
                            <button class="btn btn-success" @click="updateComercialActivity()">actualizar datos comerciales</button>
                        </p>
                    </div>
                   </div>
                </div>
                 
                  <div class="shadows__content__grid">
                      <div class="shadows__content__item">
                        <div class="row">
                            <div class="col-12">
                                <h3 class="text-center">Información de contacto</h3>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="contactName">Persona de contacto</label>
                                    <input type="text" class="form-control" id="contactName" v-model="contactName">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="contactPhone">Número de teléfono</label>
                                    <input type="text" class="form-control" id="contactPhone" v-model="contactPhone">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <p class="text-center">
                                    <button class="btn btn-success" @click="updateContactInfo()">actualizar información de contacto</button>
                                </p>
                            </div>
                        </div>
                      </div>
                 
                      <div class="shadows__content__item">
                        <div class="row">
                            <div class="col-12">
                                <h3 class="text-center">Información complementaria</h3>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="mainClients">Clientes principales (separados por coma)</label>
                                    <input type="text" class="form-control" id="mainClients" v-model="mainClients">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" v-model="importCheck" value="true" id="importCheck">
                                    <label class="form-check-label" for="importCheck">
                                        ¿Importas?
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="true" id="exportCheck" v-model="exportCheck">
                                    <label class="form-check-label" for="exportCheck">
                                        ¿Exportas?
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="true" v-model="nationalMadeCheck" id="nationalMadeCheck">
                                    <label class="form-check-label" for="nationalMadeCheck">
                                        ¿Fabricación nacional?
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="true" id="relatedActivitiesCheck" v-model="relatedActivitiesCheck">
                                    <label class="form-check-label" for="relatedActivitiesCheck">
                                        ¿Desea ser informado sobre negocios relacionados a su actividad comercial?
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <p class="text-center">
                                    <button class="btn btn-success" @click="updateOtherInfo()">actualizar información complementaria</button>
                                </p>
                            </div>
                        </div>
                      </div>
                    
                   
                 
                <div class="col-12" v-if="isVerifyUser == ''">
                    <h3 class="text-center">Validación</h3>
                </div>
                <div class="col-12" v-if="isVerifyUser == ''">
                    <p class="text-center">
                    <strong>¿Desea que su empresa sea verificada?</strong> En esta opcion, si el usuario selecciona <strong>SI</strong>, se le hace una verficiacion total de la informacion, se le pediria documentacion, en caso que seleccione <strong>NO</strong>, solo se verificaria el numero de identificacion tributaria; pero al momento de ser visto por otras empresas o personas se acotara si la empresa esta validad o No.
                    </p>
                    <p class="text-center">
                        <button class="btn btn-success" @click="verifyUser(true)">Sí</button>
                        <button class="btn btn-danger" @click="verifyUser(false)">No</button>
                    </p>
                </div>
               
            </div>--->
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
                    products:"{{ $user->comercialInfo ? $user->comercialInfo->products : '' }}",
                    startDate:"{{ $user->comercialInfo ? $user->comercialInfo->opening : '' }}",
                    employeeAmount:"{{ $user->comercialInfo ? $user->comercialInfo->employees_amount : '' }}",
                    maleEmployeeAmount:"{{ $user->comercialInfo ? $user->comercialInfo->men_employees_amount : ''}}",
                    femaleEmployeeAmount:"{{ $user->comercialInfo ? $user->comercialInfo->women_employees_amount : '' }}",
                    femaleLeadershipAmount:"{{ $user->comercialInfo ? $user->comercialInfo->women_leadership_amount : '' }}",
                    selectedComercialCountry:"",
                    comercialCountries:[],
                    contactName:"{{ $user->comercialInfo ? $user->comercialInfo->contact_person : '' }}",
                    contactPhone:"{{ $user->comercialInfo ? $user->comercialInfo->phone_number : '' }}",
                    mainClients:"{{ $user->comercialInfo ? $user->comercialInfo->main_clients : '' }}",
                    importCheck:"{{ $user->comercialInfo ? $user->comercialInfo->import ? 1 : '' : '' }}",
                    exportCheck:"{{ $user->comercialInfo ? $user->comercialInfo->export ? 1 : '' : '' }}",
                    nationalMadeCheck:"{{ $user->comercialInfo ? $user->comercialInfo->national_made ? 1 : '' : '' }}",
                    relatedActivitiesCheck:"{{ $user->comercialInfo ? $user->comercialInfo->related_activities ? 1 : '' : '' }}",
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

                            alertify.error(res.data.msg)

                        }

                    })

                },
                fetchCategories(){

                    axios.get("{{ url('/category/fetchAll') }}")
                    .then(res => {

                        if(res.data.success == true){

                            this.categories = res.data.categories

                        }else{

                            alertify.error(res.data.msg)

                        }

                    })

                },
                updateGeneralData(){

                    axios.post("{{ url('/user/general-data/update') }}", {rif: this.rif, countryId: this.countryId, fiscalAddress:this.fiscalAddress, deliveryAddress: this.deliveryAddress})
                    .then(res => {

                        if(res.data.success == true){

                            alertify.success(res.data.msg)

                        }else{

                            alertify.error(res.data.msg)

                        }

                    })

                },
                updateComercialActivity(){

                    axios.post("{{ url('/user/comercial-activity/update') }}", {categoryId: this.categoryId, products: this.products, startDate:this.startDate, employeeAmount: this.employeeAmount, maleEmployeeAmount: this.maleEmployeeAmount, femaleEmployeeAmount: this.femaleEmployeeAmount,femaleLeadershipAmount: this.femaleLeadershipAmount, comercialCountries: this.comercialCountries})
                    .then(res => {

                        if(res.data.success == true){

                            alertify.success(res.data.msg)

                        }else{

                            alertify.error(res.data.msg)

                        }

                    })

                },
                updateContactInfo(){

                    axios.post("{{ url('/user/contact-info/update') }}", {contactPerson: this.contactName, phoneNumber: this.contactPhone})
                    .then(res => {

                        if(res.data.success == true){

                            alertify.success(res.data.msg)

                        }else{
                            alertify.error(res.data.msg)
                        }

                    })
                
                },
                updateOtherInfo(){

                    axios.post("{{ url('/user/other-info/update') }}", {mainClients: this.mainClients, export: this.exportCheck, import: this.importCheck, relatedActivities: this.relatedActivitiesCheck, nationalMade: this.nationalMadeCheck})
                    .then(res => {

                        if(res.data.success == true){

                            alertify.success(res.data.msg)

                        }else{
                            alertify.error(res.data.msg)
                        }

                    })

                },
                onComercialCountryChange(){

                    //console.log("test-comercial-change", this.selectedComercialCountry)

                    var exists = false

                    this.comercialCountries.forEach((data, index) => {

                        if(data.id == this.selectedComercialCountry.id){
                            exists = true
                            this.comercialCountries.splice(index, 1)    
                        }

                    })

                    if(!exists)
                        this.comercialCountries.push(this.selectedComercialCountry)

                    this.selectedComercialCountry = ""

                },
                deleteComercialCountry(id){

                    this.comercialCountries.forEach((data, index) => {

                        if(data.id == id){
        
                            this.comercialCountries.splice(index, 1)    
                        }

                    })

                },
                userCountriesFetch(){

                    axios.get("{{ url('/user/countries-info/fetch') }}")
                    .then(res => {

                        this.comercialCountries = res.data.countries

                    })

                },
                verifyUser(verify){

                    this.isVerifyUser = verify

                    axios.post("{{ url('user/verify-me') }}", {verify: verify})
                    .then(res => {

                        if(res.data.success == true){

                            alertify.success(res.data.msg)
                            
                        }else{
                            alertify.error(res.data.msg)
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