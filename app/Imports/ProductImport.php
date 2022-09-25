<?php

namespace App\Imports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Str;


class ProductImport implements ToModel,WithHeadingRow
{

    public function model(array $row)
    {
        $product = Product::where('ean',$row['ean'])->first();
        if ($product) {
            //LOGIC HERE TO UPDATE
            $product->DEPOT_ID=$row['depot_id'];
            $product->DEPOT_NAME=$row['depot_name'];
            $product->BOND_CODE=$row['bond_code'];
            $product->MANUFACTURER_CODE=$row['manufacturer_code'];
            $product->VEHICLE_TYPE=$row['vehicle_type'];

            $product->SHORT_DESCRIPTION=$row['short_description'];
            $product->LONG_DESCRIPTION=$row['long_description'];
            $product->SIZE=$row['size'];
            $product->BRAND=$row['brand'];
            $product->LOAD_SPEED=$row['load_speed'];
            $product->SECTION=$row['section'];
            $product->PROFILE=$row['profile'];
            $product->RIM=$row['rim'];
            $product->LOAD_INDEX=$row['load_index'];
            $product->SPEED=$row['speed'];
            $product->XL=$row['xl'];
            $product->RFT=$row['rft'];
            $product->SELFSEAL=$row['selfseal'];
            $product->BRAND_CATEGORY=$row['brand_category'];
            $product->SEASON= $row['season'];
            $product->VEHICLE_SPECIFICATION=$row['vehicle_specification'];
            $product->MOLD_ID=$row['mold_id'];
            $product->HOMOLGATION=$row['homolgation'];
            $product->NOISE_CANCEL=$row['noise_cancel'];
            $product->RIM_PROT=$row['rim_prot'];
            $product->WEIGHT=$row['weight'];
            $product->TREAD_DEPTH=$row['tread_depth'];
            $product->VOLUME=$row['volume'];
            $product->CLASS=$row['class'];
            $product->FUEL=$row['fuel'];
            $product->WET=$row['wet'];
            $product->NOISE=$row['noise'];
            $product->NOISE_DB=$row['noise_db'];
            $product->STOCKBAL=$row['stockbal'];
            $product->PRICE=$row['price'];
            $product->TITLE=$row['short_description'];
            $product->PHOTO=$row['image'];
            $product->IMAGE=$row['image'];
            $product->slug=Str::slug($row['long_description'].$product->ean, '-');
            $product->save();

            return null;
        }

        return new Product([
            'DEPOT_ID'=> $row['depot_id'],
            'DEPOT_NAME'=> $row['depot_name'],
            'BOND_CODE'=> $row['bond_code'],
            'MANUFACTURER_CODE'=> $row['manufacturer_code'],
            'EAN'=> $row['ean'],
            'VEHICLE_TYPE'=> $row['vehicle_type'],
            'SHORT_DESCRIPTION'=>$row['short_description'],
            'LONG_DESCRIPTION'=>$row['long_description'],
            'SIZE'=>$row['size'],
            'BRAND'=>$row['brand'],
            'LOAD_SPEED'=>$row['load_speed'],
            'PATTERN'=>$row['pattern'],
            'PROFILE'=>$row['profile'],
            'RIM'=>$row['rim'],
            'LOAD_INDEX'=>$row['load_index'],
            'SPEED'=>$row['speed'],
            'XL'=>$row['xl'],
            'RFT'=>$row['rft'],
            'SELFSEAL'=>$row['selfseal'],
            'BRAND_CATEGORY'=>$row['brand_category'],
            'SEASON'=> $row['season'],
            'VEHICLE_SPECIFICATION'=> $row['vehicle_specification'],
            'MOLD_ID'=> $row['mold_id'],
            'HOMOLGATION'=> $row['homolgation'],
            'NOISE_CANCEL'=> $row['noise_cancel'],
            'RIM_PROT'=> $row['rim_prot'],
            'WEIGHT'=> $row['weight'],
            'TREAD_DEPTH'=>$row['tread_depth'],
            'VOLUME'=>$row['volume'],
            'CLASS'=> $row['class'],
            'FUEL'=>$row['fuel'],
            'WET'=> $row['wet'],
            'NOISE'=> $row['noise'],
            'NOISE_DB'=> $row['noise_db'],
            'STOCKBAL'=> $row['stockbal'],
            'PRICE'=> $row['price'],
            'TITLE'=>$row['short_description'],
            'PHOTO'=>$row['image'],
            'IMAGE'=> $row['image'],
            'SLUG'=>Str::slug($row['long_description'].$row['ean'], '-'),
        ]);
    }
}
