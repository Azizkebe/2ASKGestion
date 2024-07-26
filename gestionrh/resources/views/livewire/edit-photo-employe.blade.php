<div>
    <div class="container">
        <div style="display: flex; justify-content:end" class="header">
            <button class="btn btn-primary" wire:click.prevent="AddNew"><i class="fa fa-plus-circle"> Ajouter</i></button>
        </div>
        <div class="card">
            <div class="header"></div>
            <div class="body">
                <table class="table table-striped">
                    <tr>
                        <th>LLLL</th>
                        <th>HHHH</th>
                        <th>hhhh</th>
                        <th>Modifier</th>
                    </tr>
                   <tr>
                    <td>AAAA</td>
                    <td>BBBB</td>
                    <td>CCCC</td>
                    <td>
                        <a href="" class="fa fa-edit"></a>
                        <a style="color:red;" href="" class="fa fa-trash"></a>
                    </td>
                   </tr>
                </table>
            </div>
        </div>

    </div>
    <div class="modal fade" id="form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              ...
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
    </div>
</div>
{{-- @livewire('edit-photo-employe',['employe'=>$employe]) --}}
{{-- blabla
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
</div> --}}


