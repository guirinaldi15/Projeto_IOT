<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Sensores</h2><a class="btn btn-primary" href="{{ route('sensores.create') }}">+ Novo</a>
    </div>
    @if(session('sucesso'))<div class="alert alert-success">{{ session('sucesso') }}</div>@endif
    @if(session('erro'))<div class="alert alert-danger">{{ session('erro') }}</div>@endif
    <input type="search" class="form-control mb-3" wire:model.live.debounce.300ms="termo" placeholder="Pesquisar...">
    <div class="table-responsive card shadow-sm">
        <table class="table table-striped mb-0">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Tipo</th>
                    <th>Ambiente</th>
                    <th>Status</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse($sensores as $item)<tr wire:key="sensor-{{ $item->id }}">
                    <td>{{ $item->codigo }}</td>
                    <td>{{ $item->tipo }}</td>
                    <td>{{ $item->ambientes?->nome ?? '-' }}</td>
                    <td>{{ $item->status ? 'Ativo' : 'Inativo' }}</td>
                    <td><a href="{{ route('sensores.edit', $item->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        <button type="button" wire:click="excluir({{ $item->id }})" wire:confirm="Confirma a exclusão?"
                            class="btn btn-danger btn-sm">Excluir</button></td>
                </tr>
                @empty<tr>
                    <td colspan="5" class="text-center py-3">Nenhum cadastro encontrado.</td>
                </tr>@endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-3">{{ $sensores->links() }}</div>
</div>