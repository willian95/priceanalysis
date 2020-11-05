<?php

namespace App\Imports;

use App\Brand;
use App\Product;
//use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class BrandsImport implements ToCollection
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) 
        {
            if($row[2] != "" && $row[0] != ""){

                $brand = Brand::firstOrCreate(
                    ["name" => $row[2]]
                );
    
               
                $product = Product::where("id", $row[0])->first();
                $product->brand_id = $brand->id;
                $product->update();
                

            }
            
            

        }
    }
}
