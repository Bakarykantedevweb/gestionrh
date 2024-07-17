<div>
    @include('livewire.admin.performance.modal')
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="page-title">Performances</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Tableau de Bord</a></li>
                    <li class="breadcrumb-item active">Performances</li>
                </ul>
            </div>
            @if ($afficherListe)
                <div class="col-auto float-right ml-auto">
                    <a href="#" class="btn add-btn" wire:click="activeContent"><i class="fa fa-plus"></i> Ajouter
                        une Performance</a>
                </div>
            @endif

            @if ($createPerformance)
                <div class="col-auto float-right ml-auto">
                    <a href="#" class="btn add-btn" wire:click="retour"><i class="fa fa-list"></i> Retour a la
                        liste</a>
                </div>
            @endif
        </div>
    </div>
    @include('layouts.partials.message')
    @include('layouts.partials.error')
    @if ($afficherListe)
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-striped custom-table mb-0 datatable">
                        <thead>
                            <tr>
                                <th style="width: 30px;">#</th>
                                <th>Superviseur</th>
                                <th>Agent</th>
                                <th>Date</th>
                                <th>Question</th>
                                <th>Telecharger</th>
                                <th class="text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($performances as $performance)
                                <tr>
                                    <td>{{ $performance->id }}</td>
                                    <td>
                                        <h2 class="table-avatar">
                                            <a href="" class="avatar"><img alt=""
                                                    src="{{ asset('uploads/admin/agent/' . $performance->superieur->photo) }}"></a>
                                            <a href="">{{ $performance->superieur->prenom . ' ' . $performance->superieur->nom }}
                                            </a>
                                        </h2>
                                    </td>
                                    <td>
                                        <h2 class="table-avatar">
                                            <a href="" class="avatar"><img alt=""
                                                    src="{{ asset('uploads/admin/agent/' . $performance->agent->photo) }}"></a>
                                            <a href="">{{ $performance->agent->prenom . ' ' . $performance->agent->nom }}
                                            </a>
                                        </h2>
                                    </td>
                                    <td>{{ \Carbon\Carbon::parse($performance->date)->isoFormat('LL') }}</td>
                                    <td><button class="btn btn-primary btn-sm"
                                            wire:click="voirQuestion({{ $performance->id }})" data-toggle="modal"
                                            data-target="#voir_stagiaire"><i class="fa fa-eye"></i></button></td>
                                    <td>
                                        @if ($performance->status == 0)
                                            <span class="btn btn-danger btn-sm">En attente</span>
                                        @else
                                            <a href="#" wire:click="afficherDetail({{ $performance->id }})"
                                                class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>
                                        @endif
                                    </td>
                                    <td class="text-right">
                                        <div class="dropdown dropdown-action">
                                            @if ($performance->status == 0)
                                                <button wire:click="editPerformance({{ $performance->id }})"
                                                    type="button" data-toggle="modal" data-target="#emargement"
                                                    class="btn btn-primary btn-sm">Action</button>
                                            @else
                                                <span class="btn btn-success btn-sm">Approuver</span>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center">Pas de performance</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endif

    @if ($createPerformance)
        <div class="card">
            <div class="card-body">
                <h3 class="card-title"> Creation de la performance</h3>
                <form wire:submit.prevent="savePerformance">
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
                            <label for="superieur_id">Superviseur</label>
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
                        <div class="form-group col-md-12">
                            <label for="">Date</label>
                            <input type="date" wire:model="date" class="form-control">
                            @error('date')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-3">
                            <button type="button" class="btn btn-primary btn-xs" wire:click="addQuestion"><i
                                    class="fa fa-plus"></i> Ajouter</button>
                        </div>
                        <div class="col-md-3"></div>
                        <div class="col-md-3"></div>
                        <div class="col-md-3"></div>
                        @foreach ($questions as $index => $question)
                            <div class="form-group col-md-8">
                                <label for="">Question</label>
                                <input type="text" wire:model="questions.{{ $index }}.question"
                                    class="form-control">
                            </div>
                            {{-- <div class="form-group col-md-4">
                                <label for="">Note (/10)</label>
                                <input type="numbre"
                                    wire:model="questions.{{ $index }}.note" readonly class="form-control">
                            </div> --}}
                            <div class="col-md-4 mt-2">
                                <br>
                                <button type="button" class="btn btn-danger"
                                    wire:click="removeQuestion({{ $index }})">Supprimer</button>
                            </div>
                        @endforeach
                    </div>
                    <div class="submit-section">
                        <button class="btn btn-primary submit-btn" type="submit">Enregistrer</button>
                    </div>
                </form>
            </div>
        </div>
    @endif

    @if ($detailPerformances)
        <div class="card">
            <div class="card-body">
                <h3 class="card-title"> Detail Performance</h3>
                <div class="row">

                </div>
                <div class="table-responsive">
                    <table class="table mb-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Question</th>
                                <th>Note</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($questionListes as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->question->libelle }}</td>
                                    <td><input class="form-control" readonly value="{{ $item->note }}">
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endif
</div>
