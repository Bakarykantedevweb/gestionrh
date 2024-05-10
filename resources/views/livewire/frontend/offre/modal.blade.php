<div wire:ignore.self class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header p-4">
        <h4 class="mb-0 text-center">{{ $offre->titre }}</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       <div class="login-register">
          <div class="tab-content">
            <div class="tab-pane active" id="candidate" role="tabpanel">
              <form class="mt-4" wire:submit.prevent="SavePostuler">
                <div class="row">
                  <div class="mb-3 col-12">
                    <label class="form-label" for="Email2">CV <span class="text-danger"> en PDF *</span></label>
                    <input type="file" wire:model="cv" class="form-control" id="Email22">
                    @error('cv')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                  <div class="mb-3 col-12">
                    <label class="form-label" for="password2">Lettre de motivation <span class="text-danger"> en PDF *</span></label>
                    <input type="file" wire:model="lettre" class="form-control" id="password32">
                    @error('lettre')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                </div>
                <div class="row g-2">
                  <div class="col-md-12">
                    <button class="btn btn-primary d-grid" type="submit">Postuler</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
