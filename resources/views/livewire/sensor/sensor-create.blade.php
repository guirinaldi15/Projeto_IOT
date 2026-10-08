<div>
    <div class="container py-4">
        <h2 class="mb-4">{{ $edicao ? 'Editar' : 'Cadastrar' }} Sensor</h2>
        <div class="card shadow-sm">
            <div class="card-body">
                <form wire:submit="salvar">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="ambiente_id" class="form-label fw-semibold">Ambiente</label>
                            <select id="ambiente_id" wire:model="ambiente_id"
                                class="form-select @error('ambiente_id') is-invalid @enderror">
                                <option value="">Selecione...</option>
                                @foreach(\App\Models\Ambiente::orderBy('id')->get() as $opcao)
                                <option value="{{ $opcao->id }}">{{ $opcao->nome }}</option>
                                @endforeach
                            </select>
                            @error('ambiente_id') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="codigo" class="form-label fw-semibold">Código</label>
                            <input type="text" id="codigo" wire:model="codigo"
                                class="form-control @error('codigo') is-invalid @enderror">
                            @error('codigo') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="tipo" class="form-label fw-semibold">Tipo</label>
                            <input type="text" id="tipo" wire:model="tipo"
                                class="form-control @error('tipo') is-invalid @enderror">
                            @error('tipo') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
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
                    <a class="btn btn-outline-secondary" href="{{ route('sensores.index') }}">Cancelar</a>
                </form>
            </div>
        </div>
    </div>
</div>