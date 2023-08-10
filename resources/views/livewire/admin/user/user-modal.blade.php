<!-- Add Department Modal -->
<div wire:ignore.self id="add_user" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Nouvel Utilisateur</h5>
                <button type="button" class="close" wire:click="closeModal" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="saveUser">
                    <div class="form-group">
                        <label>Type Utilisteur <span class="text-danger">*</span></label>
                        <select wire:model="role_type_user_id" class="form-control">
                            <option>---</option>
                            @forelse ($role_name as $type_user)
                                <option value="{{ $type_user->id }}">{{ $type_user->role_type }}</option>
                            @empty
                                <option selected disabled>Pas de Type Utilisateur</option>
                            @endforelse
                        </select>
                        @error('role_type_user_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Role Utilisteur <span class="text-danger">*</span></label>
                        <select wire:model="role" class="form-control">
                            <option>---</option>
                            @forelse ($roles as $user)
                                <option value="{{ $user->id }}">{{ $user->nom }}</option>
                            @empty
                                <option selected disabled>Pas de Role Utilisateur</option>
                            @endforelse
                        </select>
                        @error('role')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Nom Complet <span class="text-danger">*</span></label>
                        <input class="form-control" wire:model="name" type="text">
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>E-mail <span class="text-danger">*</span></label>
                        <input class="form-control" wire:model="email" type="email">
                        @error('email')
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
<!-- /Add Department Modal -->

<!-- Edit Department Modal -->
<div wire:ignore.self id="edit_user" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modifier Utilisateur</h5>
                <button type="button" class="close" wire:click="closeModal" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="UpdateUser">
                    <div class="form-group">
                        <label>Type Utilisteur <span class="text-danger">*</span></label>
                        <select wire:model="role_type_user_id" class="form-control">
                            <option>---</option>
                            @forelse ($role_name as $type_user)
                                <option value="{{ $type_user->id }}">{{ $type_user->role_type }}</option>
                            @empty
                                <option selected disabled>Pas de Type Utilisateur</option>
                            @endforelse
                        </select>
                        @error('role_type_user_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Role Utilisteur <span class="text-danger">*</span></label>
                        <select wire:model="role" class="form-control">
                            <option>---</option>
                            @forelse ($roles as $user)
                                <option value="{{ $user->id }}">{{ $user->nom }}</option>
                            @empty
                                <option selected disabled>Pas de Role Utilisateur</option>
                            @endforelse
                        </select>
                        @error('role')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Nom Complet <span class="text-danger">*</span></label>
                        <input class="form-control" wire:model="name" type="text">
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>E-mail <span class="text-danger">*</span></label>
                        <input class="form-control" wire:model="email" type="email">
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="submit-section">
                        <button class="btn btn-primary submit-btn">Mettre a jour</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- Delete --}}
<div wire:ignore.self class="modal custom-modal fade" id="delete_user" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <div class="form-header">
                    <h3>Suppression Utilisateur</h3>
                    <p>Voulez-vous vraiment supprimer?</p>
                </div>
                <form wire:submit.prevent="DestroyUser">
                    <div class="modal-btn delete-action">
                        <div class="row">
                            <div class="col-6">
                                <button class="btn btn-primary continue-btn" type="submit">Delete</button>
                            </div>
                            <div class="col-6">
                                <a data-dismiss="modal" class="btn btn-primary cancel-btn">Cancel</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
