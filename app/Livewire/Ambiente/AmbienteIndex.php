<?php

namespace App\Livewire\Ambiente;

use App\Models\Ambiente;
use Livewire\Component;
use Livewire\WithPagination;

class AmbienteIndex extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public string $busca = '';
    public function updatingBusca()
    {
        $this->resetPage();
    }
    public function excluir($id)
    {
        try {
            Ambiente::findOrFail($id)->delete();
            session()->flash('sucesso', 'Registro excluído.');
        } catch (\Illuminate\Database\QueryException $e) {
            session()->flash('erro', 'Não é possível excluir: existem dados vinculados.');
        }
    }
    public function render()
    {
        $itens = Ambiente::query()
            ->when($this->busca, function ($query) {
                $termo = $this->busca;
                $query->where(function ($q) use ($termo) {
                    $q->where('nome', 'like', '%' . $termo . '%');
                    $q->orWhere('descricao', 'like', '%' . $termo . '%');
                });
            })
            ->latest('id')->paginate(10);
        return view('livewire.ambiente.ambiente-index', compact('itens'));
    }
}
