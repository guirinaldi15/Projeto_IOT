<?php
namespace App\Livewire\Sensor;
use App\Models\Sensor;
use Livewire\Component;
use Livewire\WithPagination;
class SensorIndex extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public string $termo = '';
    public function updatingTermo(): void { $this->resetPage(); }
    public function excluir(int $id): void
    {
        $item = Sensor::findOrFail($id);
        if ($item->registros()->exists()) {
            session()->flash('erro', 'Não é possível excluir: existem dados vinculados.');
            return;
        }
        $item->delete();
        session()->flash('sucesso', 'Sensor excluído com sucesso.');
    }
    public function render()
    {
        $sensores = Sensor::query()
            ->with('ambientes')->withCount('registros')
            ->when($this->termo !== '', function ($query) {
                $termo = $this->termo;
                $query->where(function ($q) use ($termo) {
                    $q->where('codigo', 'like', '%'.$termo.'%')
                      ->orWhere('tipo','like','%'.$termo.'%');
                    $q->orWhereHas('ambientes', fn ($a) => $a->where('nome','like','%'.$termo.'%'));
                });
            })
            ->orderByDesc('id')->paginate(10);
        return view('livewire.sensor.sensor-index', compact('sensores'));
    }
}
