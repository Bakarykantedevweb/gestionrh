<!-- Add Droit Modal -->
<div wire:ignore.self id="add_droit" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Nouveau Droit</h5>
                <button type="button" class="close" wire:click="closeModal" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="saveDroit">
                    <div class="form-group">
                        <label>Type Droit <span class="text-danger">*</span></label>
                        <select wire:model="type_droit_id" class="form-control">
                            <option value="">---</option>
                            @foreach ($type_droits as $items)
                                <option value="{{ $items->id }}">{{ $items->nom }}</option>
                            @endforeach
                        </select>
                        @error('type_droit_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Nom <span class="text-danger">*</span></label>
                        <input class="form-control" wire:model="nom" type="text">
                        @error('nom')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Access <span class="text-danger">*</span></label>
                        <select wire:model="acces" id="" class="form-control">
                            <option>--Choisir---</option>
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                        @error('acces')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Route <span class="text-danger">*</span></label>
                        <input class="form-control" wire:model="route" type="text">
                        @error('route')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="submit-section">
                        <button class="btn btn-primary submit-btn">Enregistrer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /Add Droit Modal -->

<!-- Edit Droit Modal -->
<div wire:ignore.self id="edit_droit" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modifier Droit</h5>
                <button type="button" class="close" wire:click="closeModal" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="UpdateDroit">
                    <div class="form-group">
                        <label>Type Droit <span class="text-danger">*</span></label>
                        <select wire:model="type_droit_id" class="form-control">
                            <option value="">---</option>
                            @foreach ($type_droits as $items)
                                <option value="{{ $items->id }}">{{ $items->nom }}</option>
                            @endforeach
                        </select>
                        @error('type_droit_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Nom <span class="text-danger">*</span></label>
                        <input class="form-control" wire:model="nom" type="text">
                        @error('nom')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Access <span class="text-danger">*</span></label>
                        <select wire:model="acces" id="" class="form-control">
                            <option>--Choisir---</option>
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                        @error('acces')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Route <span class="text-danger">*</span></label>
                        <input class="form-control" wire:model="route" type="text">
                        @error('route')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="submit-section">
                        <button class="btn btn-primary submit-btn">Enregistrer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /Edit Droit Modal -->
