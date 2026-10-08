<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Ambientes</h2><a class="btn btn-primary" href="{{ route('ambientes.create') }}">+ Novo</a>
    </div>
    @if(session('sucesso')) <div class="alert alert-success">{{ session('sucesso') }}</div> @endif
    @if(session('erro')) <div class="alert alert-danger">{{ session('erro') }}</div> @endif
    <input type="search" wire:model.live.debounce.300ms="busca" class="form-control mb-3" placeholder="Pesquisar...">
    <div class="table-responsive card shadow-sm">
        <table class="table table-striped table-hover mb-0 align-middle">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Descricao</th>
                    <th>Status</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse($itens as $item)
                <tr wire:key="ambientes-{{ $item->id }}">
                    <td>{{ $item->nome }}</td>
                    <td>{{ $item->descricao }}</td>
                    <td>{{ $item->status ? 'Ativo' : 'Inativo' }}</td>
                    <td class="text-nowrap">
                        <a class="btn btn-sm btn-outline-info" href="{{ route('ambientes.index', $item->id) }}">Ver</a>
                        <a class="btn btn-sm btn-outline-warning"
                            href="{{ route('ambiente.edit', $item->id) }}">Editar</a>
                        <button class="btn btn-sm btn-outline-danger" wire:click="excluir({{ $item->id }})"
                            wire:confirm="Deseja excluir este registro?">Excluir</button>
                    </td>
                </tr>
                @empty <tr>
                    <td colspan="4" class="text-center p-4">Nenhum registro encontrado.</td>
                </tr> @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-3">{{ $itens->links() }}</div>
</div>