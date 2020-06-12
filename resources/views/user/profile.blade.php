@extends('layouts.user')

@section('content')

    <div id="dev-profile">

        <div class="tabs">
  
            <input type="radio" id="tab1" name="tab-control" checked>
            <input type="radio" id="tab2" name="tab-control">
            <input type="radio" id="tab3" name="tab-control">  
            <input type="radio" id="tab4" name="tab-control">
            <ul>
              <li title="Features"><label for="tab1" role="button"><svg viewBox="0 0 24 24"><path d="M14,2A8,8 0 0,0 6,10A8,8 0 0,0 14,18A8,8 0 0,0 22,10H20C20,13.32 17.32,16 14,16A6,6 0 0,1 8,10A6,6 0 0,1 14,4C14.43,4 14.86,4.05 15.27,4.14L16.88,2.54C15.96,2.18 15,2 14,2M20.59,3.58L14,10.17L11.62,7.79L10.21,9.21L14,13L22,5M4.93,5.82C3.08,7.34 2,9.61 2,12A8,8 0 0,0 10,20C10.64,20 11.27,19.92 11.88,19.77C10.12,19.38 8.5,18.5 7.17,17.29C5.22,16.25 4,14.21 4,12C4,11.7 4.03,11.41 4.07,11.11C4.03,10.74 4,10.37 4,10C4,8.56 4.32,7.13 4.93,5.82Z"/>
          </svg><br><span>Features</span></label></li>
              <li title="Delivery Contents"><label for="tab2" role="button"><svg viewBox="0 0 24 24"><path d="M2,10.96C1.5,10.68 1.35,10.07 1.63,9.59L3.13,7C3.24,6.8 3.41,6.66 3.6,6.58L11.43,2.18C11.59,2.06 11.79,2 12,2C12.21,2 12.41,2.06 12.57,2.18L20.47,6.62C20.66,6.72 20.82,6.88 20.91,7.08L22.36,9.6C22.64,10.08 22.47,10.69 22,10.96L21,11.54V16.5C21,16.88 20.79,17.21 20.47,17.38L12.57,21.82C12.41,21.94 12.21,22 12,22C11.79,22 11.59,21.94 11.43,21.82L3.53,17.38C3.21,17.21 3,16.88 3,16.5V10.96C2.7,11.13 2.32,11.14 2,10.96M12,4.15V4.15L12,10.85V10.85L17.96,7.5L12,4.15M5,15.91L11,19.29V12.58L5,9.21V15.91M19,15.91V12.69L14,15.59C13.67,15.77 13.3,15.76 13,15.6V19.29L19,15.91M13.85,13.36L20.13,9.73L19.55,8.72L13.27,12.35L13.85,13.36Z" />
          </svg><br><span>Delivery Contents</span></label></li>
              <li title="Shipping"><label for="tab3" role="button"><svg viewBox="0 0 24 24">
              <path d="M3,4A2,2 0 0,0 1,6V17H3A3,3 0 0,0 6,20A3,3 0 0,0 9,17H15A3,3 0 0,0 18,20A3,3 0 0,0 21,17H23V12L20,8H17V4M10,6L14,10L10,14V11H4V9H10M17,9.5H19.5L21.47,12H17M6,15.5A1.5,1.5 0 0,1 7.5,17A1.5,1.5 0 0,1 6,18.5A1.5,1.5 0 0,1 4.5,17A1.5,1.5 0 0,1 6,15.5M18,15.5A1.5,1.5 0 0,1 19.5,17A1.5,1.5 0 0,1 18,18.5A1.5,1.5 0 0,1 16.5,17A1.5,1.5 0 0,1 18,15.5Z" />
          </svg><br><span>Shipping</span></label></li>    <li title="Returns"><label for="tab4" role="button"><svg viewBox="0 0 24 24">
              <path d="M11,9H13V7H11M12,20C7.59,20 4,16.41 4,12C4,7.59 7.59,4 12,4C16.41,4 20,7.59 20,12C20,16.41 16.41,20 12,20M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2M11,17H13V11H11V17Z" />
          </svg><br><span>Returns</span></label></li>
            </ul>
            
            <div class="slider"><div class="indicator"></div></div>
            <div class="content">
              <section>
                <h2>Features</h2>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ea dolorem sequi, quo tempore in eum obcaecati atque quibusdam officiis est dolorum minima deleniti ratione molestias numquam. Voluptas voluptates quibusdam cum?</section>
                  <section>
                    <h2>Delivery Contents</h2>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem quas adipisci a accusantium eius ut voluptatibus ad impedit nulla, ipsa qui. Quasi temporibus eos commodi aliquid impedit amet, similique nulla.</section>
                  <section>
                    <h2>Shipping</h2>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam nemo ducimus eius, magnam error quisquam sunt voluptate labore, excepturi numquam! Alias libero optio sed harum debitis! Veniam, quia in eum.</section>
              <section>
                    <h2>Returns</h2>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa dicta vero rerum? Eaque repudiandae architecto libero reprehenderit aliquam magnam ratione quidem? Nobis doloribus molestiae enim deserunt necessitatibus eaque quidem incidunt.</section>
            </div>
          </div>

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
                updateGeneralData(){

                    axios.post("{{ url('/user/general-data/update') }}", {rif: this.rif, countryId: this.countryId, fiscalAddress:this.fiscalAddress, deliveryAddress: this.deliveryAddress})
                    .then(res => {

                        if(res.data.success == true){

                            alert(res.data.msg)

                        }else{

                            alert(res.data.msg)

                        }

                    })

                },
                updateComercialActivity(){

                    axios.post("{{ url('/user/comercial-activity/update') }}", {categoryId: this.categoryId, products: this.products, startDate:this.startDate, employeeAmount: this.employeeAmount, maleEmployeeAmount: this.maleEmployeeAmount, femaleEmployeeAmount: this.femaleEmployeeAmount,femaleLeadershipAmount: this.femaleLeadershipAmount, comercialCountries: this.comercialCountries})
                    .then(res => {

                        if(res.data.success == true){

                            alert(res.data.msg)

                        }else{

                            alert(res.data.msg)

                        }

                    })

                },
                updateContactInfo(){

                    axios.post("{{ url('/user/contact-info/update') }}", {contactPerson: this.contactName, phoneNumber: this.contactPhone})
                    .then(res => {

                        if(res.data.success == true){

                            alert(res.data.msg)

                        }else{
                            alert(res.data.msg)
                        }

                    })
                
                },
                updateOtherInfo(){

                    axios.post("{{ url('/user/other-info/update') }}", {mainClients: this.mainClients, export: this.exportCheck, import: this.importCheck, relatedActivities: this.relatedActivitiesCheck, nationalMade: this.nationalMadeCheck})
                    .then(res => {

                        if(res.data.success == true){

                            alert(res.data.msg)

                        }else{
                            alert(res.data.msg)
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

                            alert(res.data.msg)
                            
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