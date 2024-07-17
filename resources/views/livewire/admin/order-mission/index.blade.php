<div>
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="page-title">Gestion des Ordres de mission</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Tableau de Bord</a></li>
                    <li class="breadcrumb-item active">Gestion des Ordres de mission</li>
                </ul>
            </div>
            @if ($afficherListe)
                <div class="col-auto float-right ml-auto">
                    <a href="#" wire:click="activeContent" class="btn add-btn"><i class="fa fa-plus"></i>
                        Ordre de mission</a>
                </div>
            @endif

            @if ($afficherForm)
                <div class="col-auto float-right ml-auto">
                    <a href="#" wire:click="retour" class="btn add-btn"><i class="fa fa-list"></i>
                        Liste</a>
                </div>
            @endif

            @if ($editOrdreForm)
                <div class="col-auto float-right ml-auto">
                    <a href="#" wire:click="retourEdit" class="btn add-btn"><i class="fa fa-list"></i>
                        Liste</a>
                </div>
            @endif
        </div>
    </div>
    @include('layouts.partials.message')
    @include('layouts.partials.error')
    @if ($afficherListe)
        <div class="row">
            <div class="col-md-12">
                <div>
                    <table class="table table-striped custom-table mb-0 datatable">
                        <thead>
                            <tr>
                                <th>Numero</th>
                                <th>Agents</th>
                                <th>Date Debut</th>
                                <th>Date Fin</th>
                                <th>Duree</th>
                                <th>Telecharger</th>
                                <th class="text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($ordreMissions as $item)
                                <tr>
                                    <td>{{ $item->numero }}</td>
                                    <td>{{ $item->agent->prenom . ' ' . $item->agent->nom }}</td>
                                    <td>{{ \Carbon\Carbon::parse($item->date_debut)->isoFormat('LL') }}</td>
                                    <td>{{ \Carbon\Carbon::parse($item->date_fin)->isoFormat('LL') }}</td>
                                    <td>{{ $item->duree }}</td>
                                    <td>
                                        <a href="{{ url('admin/ordre-missions/'.$item->id) }}" target="_blank" class="btn btn-primary btn-sm">
                                            <i class="fa fa-file-pdf-o"></i>
                                        </a>
                                    </td>
                                    <td class="text-right">
                                        <button wire:click="editOrdreMission({{ $item->id }})"
                                            class="btn btn-primary btn-sn">Modifier</button>
                                    </td>
                                </tr>
                            @empty
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endif
    @if ($afficherForm)
        <div class="card">
            <div class="card-body">
                <h3 class="card-title"> Creation une ordre de mission</h3>
                <form wire:submit.prevent="SaveOrdreMission">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="agent_id">Agent</label>
                            <input list="agent_list" class="form-control" wire:model="agent_id" id="agent_id">
                            <datalist id="agent_list">
                                @foreach ($agents as $agent)
                                    <option value="{{ $agent->id }}">
                                        {{ $agent->prenom . ' ' . $agent->nom . '(' . $agent->poste->nom . ')' }}
                                    </option>
                                @endforeach
                                </select>
                                @error('agent_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="superieur_id">Superieur</label>
                            <input list="superviseur_list" class="form-control" wire:model="superieur_id"
                                id="superieur_id">
                            <datalist id="superviseur_list">
                                @foreach ($agents as $agent)
                                    <option value="{{ $agent->id }}">
                                        {{ $agent->prenom . ' ' . $agent->nom . '(' . $agent->poste->nom . ')' }}
                                    </option>
                                @endforeach
                            </datalist>
                            @error('superieur_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Agence</label>
                            <select wire:model="agence_id" class="form-control">
                                <option>---</option>
                                @foreach ($agences as $agence)
                                    <option value="{{ $agence->id }}">{{ $agence->nom }}</option>
                                @endforeach
                            </select>
                            @error('agence_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Objet</label>
                            <select class="form-control" wire:model="objet">
                                <option value="">---</option>
                                @foreach ($optionsObjet as $option => $inputType)
                                    <option value="{{ $option }}">{{ $option }}</option>
                                @endforeach
                            </select>
                            @error('objet')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        @if ($objet == 'Autre')
                            <div class="form-group col-md-6">
                                <label for="">Titre de l'objet</label>
                                <input type="text" wire:model="objetTitre" class="form-control">
                            </div>
                        @endif
                        <div class="form-group col-md-6">
                            <label for="">Date Debut</label>
                            <input type="date" class="form-control" wire:model="date_debut">
                            @error('date_debut')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Date Fin</label>
                            <input type="date" class="form-control" wire:model="date_fin">
                            @error('date_fin')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Duree</label>
                            <input type="number" class="form-control" wire:model="duree" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Moyen de tranport</label>
                            <select class="form-control" wire:model="moyen_transport">
                                <option value="">---</option>
                                @foreach ($optionsMoyenTransport as $optionMT => $inputTypeMT)
                                    <option value="{{ $optionMT }}">{{ $optionMT }}</option>
                                @endforeach
                            </select>
                            @error('objet')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        @if ($moyen_transport == 'Avion')
                            <div class="form-group col-md-6">
                                <label for="">Heure Depart</label>
                                <input type="time" wire:model="heure_depart" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Heure retour</label>
                                <input type="time" wire:model="heure_retour" class="form-control">
                            </div>
                        @endif
                        <div class="form-group col-md-6">
                            <label for="">Responsable Capital Humain</label>
                            <input type="texte" wire:model="grh" readonly class="form-control">
                        </div>
                    </div>
                    <div class="submit-section">
                        <button class="btn btn-primary submit-btn" type="submit">Enregistrer</button>
                    </div>
                </form>
            </div>
        </div>
    @endif
    @if ($editOrdreForm)
         <div class="card">
            <div class="card-body">
                <h3 class="card-title"> Modification ordre de mission</h3>
                <form wire:submit.prevent="UpdateOrdreMission">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="agent_id">Agent</label>
                            <input list="agent_list" class="form-control" wire:model="agent_id" id="agent_id">
                            <datalist id="agent_list">
                                @foreach ($agents as $agent)
                                    <option value="{{ $agent->id }}">
                                        {{ $agent->prenom . ' ' . $agent->nom . '(' . $agent->poste->nom . ')' }}
                                    </option>
                                @endforeach
                                </select>
                                @error('agent_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="superieur_id">Superieur</label>
                            <input list="superviseur_list" class="form-control" wire:model="superieur_id"
                                id="superieur_id">
                            <datalist id="superviseur_list">
                                @foreach ($agents as $agent)
                                    <option value="{{ $agent->id }}">
                                        {{ $agent->prenom . ' ' . $agent->nom . '(' . $agent->poste->nom . ')' }}
                                    </option>
                                @endforeach
                            </datalist>
                            @error('superieur_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Agence</label>
                            <select wire:model="agence_id" class="form-control">
                                <option>---</option>
                                @foreach ($agences as $agence)
                                    <option value="{{ $agence->id }}">{{ $agence->nom }}</option>
                                @endforeach
                            </select>
                            @error('agence_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Objet</label>
                            <select class="form-control" wire:model="objet">
                                <option value="">---</option>
                                @foreach ($optionsObjet as $option => $inputType)
                                    <option value="{{ $option }}">{{ $option }}</option>
                                @endforeach
                            </select>
                            @error('objet')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        @if ($objet == 'Autre')
                            <div class="form-group col-md-6">
                                <label for="">Titre de l'objet</label>
                                <input type="text" wire:model="objetTitre" class="form-control">
                            </div>
                        @endif
                        <div class="form-group col-md-6">
                            <label for="">Date Debut</label>
                            <input type="date" class="form-control" wire:model="date_debut">
                            @error('date_debut')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Date Fin</label>
                            <input type="date" class="form-control" wire:model="date_fin">
                            @error('date_fin')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Duree</label>
                            <input type="number" class="form-control" wire:model="duree" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Moyen de tranport</label>
                            <select class="form-control" wire:model="moyen_transport">
                                <option value="">---</option>
                                @foreach ($optionsMoyenTransport as $optionMT => $inputTypeMT)
                                    <option value="{{ $optionMT }}">{{ $optionMT }}</option>
                                @endforeach
                            </select>
                            @error('objet')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        @if ($moyen_transport == 'Avion')
                            <div class="form-group col-md-6">
                                <label for="">Heure Depart</label>
                                <input type="time" wire:model="heure_depart" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Heure retour</label>
                                <input type="time" wire:model="heure_retour" class="form-control">
                            </div>
                        @endif
                        <div class="form-group col-md-6">
                            <label for="">Responsable Capital Humain</label>
                            <input type="texte" wire:model="grh" readonly class="form-control">
                        </div>
                    </div>
                    <div class="submit-section">
                        <button class="btn btn-primary submit-btn" type="submit">Enregistrer</button>
                    </div>
                </form>
            </div>
        </div>
    @endif
</div>
