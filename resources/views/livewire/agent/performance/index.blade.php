<div>
    {{-- @include('livewire.agent.performance.modal') --}}
    <div class="content container-fluid">
        <div class="row">
            <div class="col-xl-12 col-sm-12 col-12">
                <div class="breadcrumb-path mt-4">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('agent-dashboard') }}"><img src="assets/img/dash.png"
                                    class="mr-2" alt="breadcrumb" />Acceuil</a>
                        </li>
                        <li class="breadcrumb-item active"> Performances</li>
                    </ul>
                    <h3>Performances</h3>
                </div>
            </div>
        </div>
    </div>
    @if ($afficheListe)
        <div class="col-xl-12 col-sm-12 col-12 mt-4">
            <div class="card">
                <div class="table-heading">
                    <h2>Listes des Performances</h2>
                </div>
                <div class="table-responsive">
                    <table class="table custom-table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Agent</th>
                                <th>Date</th>
                                <th>Question</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($performances as $performance)
                                <tr>
                                    <td>{{ $performance->id }}</td>
                                    <td>{{ $performance->agent->prenom . ' ' . $performance->agent->nom }}</td>
                                    <td>{{ \Carbon\Carbon::parse($performance->date)->isoFormat('LL') }}</td>
                                    <td>
                                        <a href="#" wire:click="voirQuestion({{ $performance->id }})">
                                            <i data-feather="eye"></i>
                                        </a>
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
    @if ($createNote)
        <div class="col-xl-12 col-sm-12 col-12 mt-4">
            <div class="card">
                <div class="card-header">
                    <h3>Formulaire note performance</h3>
                    <a href="#" wire:click="retour" class="action_label5 mt-3 ml-3 mb-3">Retour a la liste</a>
                </div>
                <div class="card-body">
                    <form wire:submit.prevent="saveQuestionNote">
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
                                    @if (count($questionListes) > 0)
                                        @foreach ($questionListes as $item)
                                            <tr>
                                                <td>{{ $item->id }}</td>
                                                <td>{{ $item->question->libelle }}</td>
                                                <td><input type="number" class="form-control"
                                                        wire:model="note.index{{ $item->id }}"></td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td></td>
                                            <td>Pas de Question</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-xl-12 col-sm-12 col-12 mb-4">
                                <div class="form-btn">
                                    <button type="submit" class="btn btn-apply w-auto">Soumettre</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endif
</div>
