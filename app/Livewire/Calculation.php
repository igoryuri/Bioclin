<?php

namespace App\Livewire;

use Livewire\Attributes\Rule;
use Livewire\Component;

class Calculation extends Component
{
    public $rni = null;

    #[Rule('required|numeric')]
    public $amostra = '';
    #[Rule('required|numeric')]
    public $plasma = '';
    #[Rule('required|numeric')]
    public $isi = '';

    public function conver_float()
    {
        $this->amostra = floatval($this->amostra);
        $this->plasma = floatval($this->plasma);
        $this->isi = floatval($this->isi);
    }

    public function calculeRNI()
    {
        $this->validate();
        $this->conver_float();

        $base = ($this->amostra/$this->plasma);

        $this->rni = round(($base ** $this->isi), 2);

    }

    public function render()
    {
        return view('livewire.calculation', ['rni' => $this->rni]);
    }
}
