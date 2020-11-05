<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\BrandsImport;
use Excel;

class ExcelController extends Controller
{
    
    function index(){

        Excel::import(new BrandsImport, 'commerceprice_productos.xls');

    }

}
