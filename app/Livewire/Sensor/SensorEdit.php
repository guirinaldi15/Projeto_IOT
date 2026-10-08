<?php
namespace App\Livewire\Sensor;
use App\Models\Sensor;
use App\Models\Ambiente;
use Livewire\Component;
use Illuminate\Validation\Rule;
class SensorEdit extends Component
{
    public $id;
    public $ambiente_id = '';
    public $codigo = '';
    public $tipo = '';
    public $descricao = '';
    public $status = true;
    public function mount(int $id): void
    {
        $item = Sensor::findOrFail($id);
        $this->id = $item->id;
        $this->ambiente_id = $item->ambiente_id;
        $this->codigo = $item->codigo;
        $this->tipo = $item->tipo;
        $this->descricao = $item->descricao;
        $this->status = $item->status;
    }
    public function salvar()
    {
        $dados = $this->validate([
            'ambiente_id' => 'required|exists:ambientes,id',
            'codigo' => ['required','string','max:255', Rule::unique('sensors','codigo')->ignore($this->id)],
            'tipo' => 'required|string|max:255',
            'descricao' => 'required|string',
            'status' => 'boolean'
        ]);
        Sensor::findOrFail($this->id)->update($dados);
        session()->flash('sucesso', 'Sensor atualizado com sucesso!');
        return $this->redirectRoute('sensores.index', navigate: true);
    }
    public function render()
    {
        return view('livewire.sensor.sensor-edit', ['ambientes' => Ambiente::orderBy('nome')->get()]);
    }
}
