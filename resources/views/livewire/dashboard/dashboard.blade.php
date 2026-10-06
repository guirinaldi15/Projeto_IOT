<!-- Importação direta do Bootstrap para garantir que o visual carregue 100% -->

<div class="container-fluid py-4 bg-light min-vh-100">
    <div class="container">
        
        <!-- Cabeçalho com Degradê Vibrante -->
        <div class="row mb-5">
            <div class="col-12 text-center p-5 rounded-4 shadow-sm text-white" style="background: linear-gradient(135deg, #6610f2, #0d6efd);">
                <span class="badge bg-white text-primary fw-bold px-3 py-2 text-uppercase mb-2">Telemetria em Tempo Real</span>
                <h1 class="display-5 fw-extrabold mb-2">⚡ Painel de Monitoramento IoT</h1>
                <p class="lead opacity-75 mb-0">Status em tempo real de ambientes, sensores e logs de registro.</p>
            </div>
        </div>

        <!-- SEÇÃO 1: Cards Coloridos e Vibrantes (Ambientes) -->
        <div class="row g-4 mb-5">
            @if($ambientes->isEmpty())
                <div class="col-12">
                    <div class="card border-0 shadow-sm rounded-4 p-4 text-center text-muted">
                        <p class="mb-0 fs-5">Nenhum ambiente ativo encontrado no banco de dados.</p>
                    </div>
                </div>
            @else
                @foreach($ambientes as $key => $ambiente)
                    <div class="col-12 col-md-4">
                        <!-- Alterna cores vibrantes (Roxo, Ciano, Laranja) com base na repetição -->
                        @php
                            $cores = [
                                0 => ['bg' => 'bg-purple', 'gradient' => 'linear-gradient(45deg, #6f42c1, #a920fa)', 'icon' => '🏢'],
                                1 => ['bg' => 'bg-info', 'gradient' => 'linear-gradient(45deg, #0dcaf0, #0083b0)', 'icon' => '💻'],
                                2 => ['bg' => 'bg-warning', 'gradient' => 'linear-gradient(45deg, #ffc107, #ff8c00)', 'icon' => '📦']
                            ];
                            $corAtual = $cores[$key % 3];
                        @endphp
                        
                        <div class="card border-0 rounded-4 text-white shadow-lg h-100" style="background: {{ $corAtual['gradient'] }};">
                            <div class="card-body p-4 position-relative overflow-hidden">
                                <div class="position-absolute end-0 bottom-0 opacity-25" style="font-size: 5rem; transform: translate(10px, 20px);">
                                    {{ $corAtual['icon'] }}
                                </div>
                                <h6 class="text-uppercase opacity-75 fw-bold mb-1">Espaço Monitorado</h6>
                                <h3 class="fw-bold mb-4">{{ $ambiente->nome }}</h3>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="badge bg-white text-dark rounded-pill px-3 py-2 fw-bold">✓ Conectado</span>
                                    <span class="fw-medium text-white-50">Dispositivo Ativo</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>

        <!-- SEÇÃO 2: Tabela de Histórico de Registros com Cores Vivas -->
        <div class="row">
            <div class="col-12">
                <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
                    <div class="card-header bg-dark text-white py-4 d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center">
                            <span class="fs-4 me-2">📊</span>
                            <h5 class="mb-0 fw-bold">Últimos Registros Recebidos</h5>
                        </div>
                        <span class="spinner-grow spinner-grow-sm text-danger" role="status"></span>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover align-middle mb-0 text-center">
                                <thead class="table-light text-uppercase fs-7 fw-bold text-muted border-bottom">
                                    <tr>
                                        <th class="py-3">Data / Hora</th>
                                        <th class="py-3">Ambiente</th>
                                        <th class="py-3">Métrica</th>
                                        <th class="py-3">Leitura</th>
                                    </tr>
                                </thead>
                                <tbody class="fw-semibold">
                                    @if($registros->isEmpty())
                                        <tr>
                                            <td colspan="4" class="py-5 text-muted bg-light">
                                                Aguardando os primeiros dados de telemetria dos sensores...
                                            </td>
                                        </tr>
                                    @else
                                        @foreach($registros as $registro)
                                            <tr>
                                                <td class="text-secondary py-3">
                                                    {{ $registro->created_at ? $registro->created_at->format('d/m H:i') : 'Agora' }}
                                                </td>
                                                <td>
                                                    <span class="badge bg-dark-subtle text-dark px-3 py-2 rounded-pill">
                                                        📍 {{ $registro->sensor->ambiente->nome ?? 'Ambiente Geral' }}
                                                    </span>
                                                </td>
                                                <td class="text-primary">
                                                    {{ $registro->tipo ?? 'Sensor Ativo' }}
                                                </td>
                                                <td>
                                                    <!-- Destaca o valor final dentro de um Badge de Alta Visibilidade -->
                                                    <span class="badge bg-danger px-3 py-2 fs-6 shadow-sm">
                                                        🔥 {{ $registro->valor }}
                                                    </span>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<!-- JS do Bootstrap para interações -->
