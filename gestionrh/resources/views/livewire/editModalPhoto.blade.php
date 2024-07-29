<div class="modal fade" id="editModalPhoto" tabindex="-1" role="dialog" aria-labelledby="editModalPhotoLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editModalPhoto">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
         <form action="">
            <div>
                <label for="">Photo</label>
                <input type="file" name="filename" id="filename" wire:model.live="filename">
            </div>
            <div>
                <label for="">DDD</label>
            </div>
         </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
          <button type="button" class="btn btn-primary">Mettre à jour</button>
        </div>
      </div>
    </div>
</div>
