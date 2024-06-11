<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RedirectionController extends Controller
{
//    protected $redirections = [
//        'veterinarian/albumin-monoreagent-bio-120-200-k040-3-1.html' => 'https://www.grupobioclin.com.br/products/equipments/human-equip/biochemistry-equip/automatic/bs380-automatic-analyzer/1667',
//        'equipamentos/hematologicos/analisador-hematologico-hematoclin-2-8-vet-r666.html' => 'https://www.grupobioclin.com.br/products/equipamentos/humano-equip/bioquimica-equip/automatico/analisador-hematologico-hematoclin-28-vet/1671',
//        'biolisa-hbsag-k120-1.html' => 'https://www.grupobioclin.com.br/products/reagentes/humano/imunologia/elisa/biolisa-hbsag-96-testes/2308',
//        'biolisa-toxoplasmose-igm-dbs-480-testes-k270-3.html' => 'https://www.grupobioclin.com.br/products/reagentes/humano/imunologia/elisa/biolisa-toxoplasmose-igm-dbs-480-testes/32769',
//        'agua-purificada-24-testes-f003-1.html' => 'https://www.grupobioclin.com.br/products/reagentes/humano/controles-de-qualidade/agua/agua-purificada/1739',
//        'desidrogenase-latica-ldh-uv-50-ml-k014-2.html' => 'https://www.grupobioclin.com.br/products/reagentes/humano/bioquimica/automacao/desidrogenase-latica-ldh-uv-50-ml/16186',
//        // Add more redirections here as needed
//    ];
//
//    public function redirect(Request $request)
//    {
//        $currentUrl = $request->path();
//
//        // Validate if the old URL ends with ".html"
//        if (!preg_match('/\.html$/', $currentUrl)) {
//            abort(404); // Page not found if the extension is not .html
//        }
//
//        if (array_key_exists($currentUrl, $this->redirections)) {
//            return redirect()->away($this->redirections[$currentUrl]);
//        } else {
//            abort(404); // Page not found if the URL is not in the redirection array
//        }
//    }
}
