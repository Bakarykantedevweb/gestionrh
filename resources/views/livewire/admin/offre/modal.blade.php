<!-- Delete Holiday Modal -->
<div wire:ignore.self id="detail_offre" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <div class="form-header">
                    <h3>Detail Offre </h3>
                </div>
                <form>
                    <div class="modal-btn delete-action">
                        <div class="row">
                            <textarea wire:model="description" class="form-control" cols="30" rows="10">
                                
                            </textarea>
                            <a href="javascript:void(0);" data-dismiss="modal"
                                class="btn btn-primary cancel-btn">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /Delete Holiday Modal -->
