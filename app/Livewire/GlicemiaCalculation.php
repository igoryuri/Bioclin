<?php

namespace App\Livewire;

use Livewire\Attributes\Rule;
use Livewire\Component;

class GlicemiaCalculation extends Component
{

    #[Rule('required|numeric')]
    public $a1c;
    public $result_glicemia = null;


    public function convert_float()
    {
        $this->a1c = floatval($this->a1c);
    }

    public function calcule_glicemia()
    {
        $this->convert_float();

        $this->result_glicemia = ($this->a1c * 28.7) - 46.7;

    }

    public function render()
    {
        return view('livewire.glicemia-calculation', ['result_glicemia' => $this->result_glicemia]);
    }
}
