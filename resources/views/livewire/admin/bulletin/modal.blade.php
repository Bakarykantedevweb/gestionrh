<!-- Add Department Modal -->
{{-- <div wire:ignore.self id="add_bulletin" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Bulletin</h5>
                <button type="button" class="close" wire:click="closeModal" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="">
                    <div class="table-responsive m-t-15">
                        <table class="table table-striped custom-table">
                            <thead>
                                <tr>
                                    <th>Rubriques</th>
                                    <th class="text-center">Montant</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($rubriques as $rubrique)
                                    <tr>
                                        <td>{{ $rubrique->libelle }}</td>
                                        <td class="text-center">
                                            <input type="number" class="form-control">
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="submit-section">
                        <button class="btn btn-primary submit-btn">Enregistrer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div> --}}
<!-- /Add Department Modal -->
