<?php

namespace App\Livewire\Ambiente;

use App\Models\Ambiente;
use Livewire\Component;

class AmbienteDelete extends Component
{
     public function excluir(int $id): void
    {
        $item = Ambiente::findOrFail($id);
        if ($item->registros()->exists()) {
            session()->flash('erro', 'Não é possível excluir: existem dados vinculados.');
            return;
        }
        $item->delete();
        session()->flash('sucesso', 'Sensor excluído com sucesso.');
    }
    public function render()
    {
        return view('livewire.ambiente.ambiente-delete');
    }
}
