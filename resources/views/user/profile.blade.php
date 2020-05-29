@extends('layouts.user')

@section('content')

    <div id="dev-login">

        <div class="container">
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
                        <label for="name">R.I.F</label>
                        <select class="form-control" v-model="country">
                            <option value="">Estados Unidos</option>
                            <option value="">Colombia</option>
                            <option value="">Venezuela</option>
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
                <div class="col-12">
                    <h3 class="text-center">Descripción de la Actividad e información comercial</h3>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="comercialBranch">Ramo Comercial</label>
                        <select class="form-control" v-model="comercialBranch">
                            <option value="">Contaduría</option>
                            <option value="">Pescadería</option>
                            <option value="">Informática</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="products">Productos y/o servicios que ofrece</label>
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
                        <label for="femaleLidershipAmount">Mujeres lideres en la origanización</label>
                        <input type="text" class="form-control" id="femaleLidershipAmount" v-model="femaleLidershipAmount">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="comercialCountries">Paises con presencia comercial</label>
                        <select class="form-control" v-model="comercialCountries" multiple>
                            <option value="">Venezuela</option>
                            <option value="">Estados Unidos</option>
                            <option value="">Dinamarca</option>
                        </select>
                    </div>
                </div>
                <div class="col-12">
                    <h3 class="form-control">Información de contacto</h3>
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
                <div class="col-12">
                    <h3 class="form-control">Información complementaria</h3>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="mainClients">Clientes principales</label>
                        <input type="text" class="form-control" id="mainClients" v-model="mainClients">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="importCheck">
                        <label class="form-check-label" for="importCheck">
                            ¿Importas?
                        </label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="exportCheck">
                        <label class="form-check-label" for="exportCheck">
                            ¿Exportas?
                        </label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="nationalMadeCheck">
                        <label class="form-check-label" for="nationalMadeCheck">
                            ¿Fabricación nacional?
                        </label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="relatedActivitiesCheck">
                        <label class="form-check-label" for="relatedActivitiesCheck">
                            ¿Desea ser informado sobre negocios relacionados a su actividad comercial?
                        </label>
                    </div>
                </div>
                
            </div>
        </div>

    </div>

@endsection