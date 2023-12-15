<div>
    @include('livewire.admin.agent.agent-modal')
    <!-- Page Header -->
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="page-title">Agents</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                    <li class="breadcrumb-item active">Agent</li>
                </ul>
            </div>
            <div class="col-auto float-right ml-auto">
                <a href="{{ route('agent.index') }}" class="btn add-btn"><i
                        class="fa fa-list"></i> Retour</a>
                <div class="view-icons">
                    <a href="" class="grid-view btn btn-link active"><i class="fa fa-th"></i></a>
                </div>
            </div>
        </div>
    </div>
    <!-- /Page Header -->
    @include('layouts.partials.message')
    @include('layouts.partials.error')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Creation d'un agent</h4>
                </div>
                <div class="card-body">
                    <form wire:submit.prevent="saveEmploye">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label">Prenom <span class="text-danger">*</span></label>
                                    <input class="form-control" wire:model="prenom" type="text">
                                    @error('prenom')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label">Nom <span class="text-danger">*</span></label>
                                    <input class="form-control" wire:model="nom" type="text">
                                    @error('nom')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label">Email <span class="text-danger">*</span></label>
                                    <input class="form-control" wire:model="email" type="email">
                                    @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label class="col-form-label">Date de Naissance <span class="text-danger">*</span></label>
                                <div class="row">
                                    <div class="col-md-4">
                                        <select class="form-control" wire:model="jour">
                                            <option>Jour</option>
                                            <?php for ($i = 1; $i <= 31; $i++) : ?>
                                            <option value="<?php echo $i; ?>">
                                                <?php echo $i; ?>
                                            </option>
                                            <?php endfor; ?>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <select class="form-control" wire:model="mois">
                                            <option>Mois</option>
                                            <option value="Janvier">Janvier</option>
                                            <option value="Fevrier">Fevrier</option>
                                            <option value="Mars">Mars</option>
                                            <option value="Avril">Avril</option>
                                            <option value="Mai">Mai</option>
                                            <option value="Juin">Juin</option>
                                            <option value="Juillet">Juillet</option>
                                            <option value="Aout">Aout</option>
                                            <option value="Septembre">Septembre</option>
                                            <option value="Octobre">Octobre</option>
                                            <option value="Novembre">Novembre</option>
                                            <option value="Decembre">Decembre</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <select class="form-control" wire:model="annee">
                                            <option value="0">Annee</option>
                                            <?php for ($i = 1900; $i <= date('Y'); $i++) : ?>
                                            <option value="<?php echo $i; ?>">
                                                <?php echo $i; ?>
                                            </option>
                                            <?php endfor; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label">Age <span class="text-danger">*</span></label>
                                    <input class="form-control" readonly wire:model="age" type="number">
                                    @error('age')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label">Telephone <span class="text-danger">*</span></label>
                                    <input class="form-control" wire:model="telephone" type="text">
                                    @error('telephone')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label">Departement <span class="text-danger">*</span></label>
                                    <select class="form-control" wire:model="departement_id">
                                        <option value="">---</option>
                                        @foreach ($departements as $dep)
                                        <option value="{{ $dep->id }}">
                                            {{ $dep->nom . '(' . $dep->code . ')' }}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('departement_id')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Poste <span class="text-danger">*</span></label>
                                    <select class="form-control" wire:model="poste_id">
                                        <option value="">---</option>
                                        @foreach ($postes as $pos)
                                        <option value="{{ $pos->id }}">{{ $pos->nom }}</option>
                                        @endforeach
                                    </select>
                                    @error('poste_id')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Sexe <span class="text-danger">*</span></label>
                                    <select wire:model="sexe" class="form-control">
                                        <option value="">...</option>
                                        <option value="M">Masculin</option>
                                        <option value="F">Feminin</option>
                                    </select>
                                    @error('sexe')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="">Photo</label>
                                <input type="file" wire:model="photo" class="form-control">
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit">Enregistrer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
