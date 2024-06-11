<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function transferDatas()
    {
        $datasSQLServer = DB::connection('sqlsrv')->select("SELECT CODARV, DESCRICAO, GRAU, ANALITICO, CODARVPAI FROM AD_ARVOREECOM");


        foreach ($datasSQLServer as $dataSQLServer) {
//            dd($dataSQLServer);

            $desc_format = mb_strtolower($dataSQLServer->DESCRICAO);
            $slug = Str::slug($desc_format,);

            if ($dataSQLServer->CODARVPAI === "-999999999"){
                $parent = null;
            }
            else{
                $parent = $dataSQLServer->CODARVPAI;
            }

            DB::connection('mysql')->table('product_categories')->insert([
                'id' => $dataSQLServer->CODARV,
                'name' => $desc_format,
                'step' => $dataSQLServer->GRAU,
                'analytical' => $dataSQLServer->ANALITICO,
                'slug' => $slug,
                'category_id' => $parent,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ]);

            echo $dataSQLServer->CODARV;
            echo "<br>";
            sleep(1);
        }
        return "Dados transferidos com sucesso!";
    }
}
