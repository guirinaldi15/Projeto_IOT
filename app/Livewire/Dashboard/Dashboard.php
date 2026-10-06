<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;
use App\Models\Ambiente;
use App\Models\Registro;

class Dashboard extends Component
{
    /**
     * Renderiza a view do componente Livewire injetando os dados do banco.
     */
    public function render()
    {
        // ABORDAGEM BLINDADA: Busca os ambientes de forma simples (evita o erro do método withCount)
        $ambientes = Ambiente::all();

        // Busca os últimos 10 registros de telemetria sem forçar relacionamentos restritos
        $registros = Registro::latest()
            ->take(10)
            ->get();

        // Retorna a view correta passando as variáveis tratadas
        return view('livewire.dashboard.dashboard', [
            'ambientes' => $ambientes,
            'registros' => $registros
        ]);
    }
}
