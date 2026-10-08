<div class="container py-4">
    <h2>Editar Sensor</h2>
    <div class="card shadow-sm">
        <div class="card-body">
            <form wire:submit="salvar">
                <div class="mb-3"><label class="form-label" for="ambiente_id">Ambiente</label><select
                        wire:model="ambiente_id" class="form-select">
                        <option value="">Selecione</option>@foreach($ambientes as $ambiente)<option
                            value="{{ $ambiente->id }}">{{ $ambiente->nome }}</option>@endforeach
                    </select>@error('ambiente_id')<div class="text-danger small">{{ $message }}</div>@enderror</div>
                <div class="mb-3"><label class="form-label" for="codigo">Código</label><input type="text"
                        class="form-control" wire:model="codigo">@error('codigo')<div class="text-danger small">{{
                        $message }}</div>@enderror</div>
                <div class="mb-3"><label class="form-label" for="tipo">Tipo</label><input type="text"
                        class="form-control" wire:model="tipo">@error('tipo')<div class="text-danger small">{{ $message
                        }}</div>@enderror</div>
                <div class="mb-3"><label class="form-label" for="descricao">Descrição</label><textarea
                        class="form-control" wire:model="descricao" rows="3"></textarea>@error('descricao')<div
                        class="text-danger small">{{ $message }}</div>@enderror</div>
                <div class="mb-3"><label class="form-label" for="status">Ativo</label><input type="checkbox"
                        class="form-check-input" id="status" wire:model="status">@error('status')<div
                        class="text-danger small">{{ $message }}</div>@enderror</div>
                <button type="submit" class="btn btn-primary" wire:loading.attr="disabled"
                    wire:target="salvar">Salvar</button> <a href="{{ route('sensores.index') }}"
                    class="btn btn-outline-secondary">Cancelar</a>
            </form>
        </div>
    </div>
</div>