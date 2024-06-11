<?php

namespace App\Livewire;

use Livewire\Attributes\Rule;
use Livewire\Component;

class CreatininaCalculation extends Component
{
    public $resultado_dif_zero = true;
    public $vol_min = null;
    public $sup_corp = null;
    public $dep_n_corr = null;
    public $dep_corr = null;
    public $mg_24 = null;
    public $mg_kg_24 = null;
    #[Rule('required|numeric')]
    public $creatina_urina = '';
    #[Rule('required|numeric')]
    public $creatina_soro = '';
    #[Rule('required|numeric')]
    public $volume_urinario = '';
    #[Rule('required|numeric')]
    public $tempo_colheita = '';
    #[Rule('required|numeric')]
    public $peso_paciente = '';
    #[Rule('required|numeric')]
    public $altura_paciente = '';


    public function convert_float()
    {
        $this->creatina_urina = floatval($this->creatina_urina);
        $this->creatina_soro = floatval($this->creatina_soro);
        $this->volume_urinario = floatval($this->volume_urinario);
        $this->tempo_colheita = floatval($this->tempo_colheita);
        $this->peso_paciente = floatval($this->peso_paciente);
        $this->altura_paciente = floatval($this->altura_paciente);
    }

    public function calcule_creatina()
    {
        $this->convert_float();
        if ($this->diferente_zero()) {
            $this->volume_minuto();
            $this->depuracao_nao_corrigida();
            $this->superficie_corporal();
            $this->depuracao_corrigida();
            $this->mg_24h();
            $this->mg_kg_24h();
        }

    }

//    public function mount()
//    {
//        $this->resultado_dif_zero = true;
//    }

    public function diferente_zero()
    {
        if ($this->creatina_urina != 0 && $this->creatina_soro != 0 && $this->volume_urinario != 0 && $this->tempo_colheita != 0 && $this->peso_paciente != 0 && $this->altura_paciente != 0) {
            $this->resultado_dif_zero = true;
            return $this->resultado_dif_zero;
        }
        $this->resultado_dif_zero = false;
        return $this->resultado_dif_zero;
    }

    public function volume_minuto()
    {
        $conver_minutos = $this->tempo_colheita * 60;
        $this->vol_min = round($this->volume_urinario / $conver_minutos, 2);
    }

    public function superficie_corporal()
    {
        $this->sup_corp = round(sqrt(($this->altura_paciente * $this->peso_paciente) / 3600), 2);
    }

    public function depuracao_nao_corrigida()
    {
        $this->dep_n_corr = round(($this->creatina_urina / $this->creatina_soro) * $this->vol_min, 2);
    }

    public function depuracao_corrigida()
    {
        $this->dep_corr = round(($this->dep_n_corr * 1.73) / $this->sup_corp, 2);
    }

    public function mg_24h()
    {
        $this->mg_24 = round(($this->creatina_urina * $this->volume_urinario) / 100, 2);
    }

    public function mg_kg_24h()
    {
        $this->mg_kg_24 = round($this->mg_24 / $this->peso_paciente, 2);
    }

    public function render()
    {

//        dd($this->resultado_dif_zero);

        return view('livewire.creatinina-calculation', [
            'vol_min' => $this->vol_min,
            'sup_corp' => $this->sup_corp,
            'dep_n_corr' => $this->dep_n_corr,
            'dep_corr' => $this->dep_corr,
            'mg_24' => $this->mg_24,
            'mg_kg_24' => $this->mg_kg_24,
            'resultado_dif_zero' => $this->resultado_dif_zero,
        ]);
    }
}
