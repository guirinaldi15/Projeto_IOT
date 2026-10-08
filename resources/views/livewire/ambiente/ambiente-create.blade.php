<div class="container py-4">
    <h2 class="mb-4">{{ $edicao ? 'Editar' : 'Cadastrar' }} Ambiente</h2>
    <div class="card shadow-sm">
        <div class="card-body">
            <form wire:submit="salvar">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="nome" class="form-label fw-semibold">Nome</label>
                        <input type="text" id="nome" wire:model="nome"
                            class="form-control @error('nome') is-invalid @enderror">
                        @error('nome') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="descricao" class="form-label fw-semibold">Descrição</label>
                        <textarea id="descricao" wire:model="descricao"
                            class="form-control @error('descricao') is-invalid @enderror" rows="3"></textarea>
                        @error('descricao') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="status" class="form-label fw-semibold">Ativo</label>
                        <div class="form-check"><input class="form-check-input" type="checkbox" wire:model="status"
                                id="status"><label class="form-check-label" for="status">Sim</label></div>
                        @error('status') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
                    </div>
                </div><button class="btn btn-primary" type="submit">Salvar</button>
                <a class="btn btn-outline-secondary" href="{{ route('ambientes.index') }}">Cancelar</a>
            </form>
        </div>
    </div>
</div>