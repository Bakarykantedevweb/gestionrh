<div wire:ignore.self id="voir_stagiaire" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Listes des Questions</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card">
                    {{-- <div class="card-header">
                        <h4 class="card-title mb-0">Basic Table</h4>
                    </div> --}}
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table mb-0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Question</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($questionListes as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->question->libelle }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
