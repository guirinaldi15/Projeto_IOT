<?php

namespace App\Livewire\Ambiente;
use App\Models\Ambiente;
use Livewire\Component;

class AmbienteCreate extends Component
{
    public $nome = '';
    public $descricao = '';
    public $status = true;
    public function mount(): void {}
    public function salvar()
    {
        $dados = $this->validate(['nome' => 'required|string|max:255', 'descricao' => 'nullable|string', 'status' => 'boolean']);

        Ambiente::create($dados);
        session()->flash('sucesso', 'Cadastro realizado com sucesso!');
        return $this->redirectRoute('ambientes.index', navigate: true);
    }
    public function render()
    {
        return view('livewire.ambiente.ambiente-create', ['edicao' => false]);
    }
}
