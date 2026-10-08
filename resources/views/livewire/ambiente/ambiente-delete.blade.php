<div class="container py-4">
    <div class="card">
        <div class="card-body">
            <h2>Excluir Ambiente</h2>
            <p>Deseja excluir <strong>{{ $item->nome }}</strong>?</p>@if(session('erro'))<div
                class="alert alert-danger">{{ session('erro') }}</div>@endif<button wire:click="excluir"
                wire:confirm="Confirma a exclusão?" class="btn btn-danger">Excluir definitivamente</button> <a
                href="{{ route('ambientes.index') }}" class="btn btn-secondary">Cancelar</a>
        </div>
    </div>
</div>