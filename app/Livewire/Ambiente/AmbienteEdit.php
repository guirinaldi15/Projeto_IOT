<?php

namespace App\Livewire\Ambiente;

use App\Models\Ambiente;
use Livewire\Component;

class AmbienteEdit extends Component
{
    public $id;
    public $nome = '';
    public $descricao = '';
    public $status = true;
    public function mount($id)
    {
        $item = Ambiente::findOrFail($id);
        $this->id = $item->id;
        $this->nome = $item->nome;
        $this->descricao = $item->descricao;
        $this->status = $item->status;
    }
    public function salvar()
    {
        $dados = $this->validate(['nome' => 'required|string|max:255', 'descricao' => 'nullable|string', 'status' => 'boolean']);

        Ambiente::findOrFail($this->id)->update($dados);
        session()->flash('sucesso', 'Cadastro atualizado com sucesso!');
        return $this->redirectRoute('ambientes.index', navigate: true);
    }
    public function render()
    {
        return view('livewire.ambiente.ambiente-edit', ['edicao' => true]);
    }
}
