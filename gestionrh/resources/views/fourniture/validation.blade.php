@extends('layouts.website')

@section('content')
<div class="container-fluid">
    <div class="col-md-12">
        <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                    <h4 class="card-title">Liste des validations</h4>
                    <button class="btn btn-primary btn-round ms-auto">
                        {{-- <a href="{{route('fourniture.add')}}" class="text-white"><i class="fa fa-plus"></i> Ajouter une Fourniture</a> --}}
                    </button>
                    </div>
                    <div>
                        {{-- @include('fourniture.modal.validatemodal') --}}
                        @include('fourniture.modal.editValidModal')
                    </div>
                </div>
              <div class="card-body">

                <div class="table-responsive">
                  <table
                    id="add-row"
                    class="display table table-striped table-hover"
                  >
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Date Reception</th>
                        <th>Demandeur</th>
                        <th>Projet</th>
                        <th>Motif</th>
                        <th>Service</th>
                        <th>Etat de Validation du N+1</th>
                        <th>Etat de validation Finale</th>

                        <th style="width: 10%">Action</th>
                      </tr>
                        </thead>
                            <tbody>
                             @forelse ($fourniture as $demande)
                            <tr>

                                <td>{{$demande->id}}</td>
                                <td>{{$demande->updated_at}}</td>
                                <th>{{$demande->user->employe->prenom}} {{$demande->user->employe->nom}}</th>
                                <td>{{$demande->projet->name_projet}}</td>
                                <td>{{$demande->motif}}</td>
                                <td>{{$demande->bureau}}</td>
                                <td>{{$demande->etat->statut_demande}}</td>
                                <td>{{$demande->etat_valid->statut_demande ?? ''}}</td>
                                <td>
                                    <div class="form-button-action">
                                        <button
                                        type="button"
                                        data-bs-toggle="tooltip"
                                        title=""
                                        class="btn btn-link btn-primary btn-lg"
                                        data-original-title="Edit Task"
                                        >
                                        <a href="{{route('fourniture.detail', $demande->id)}}"><i class="fa fa-info"></i></a>

                                        {{-- @if ($demande->id_user_comptable == NULL || $demande->id_user_comptable == '')
                                        <button
                                        type="button"
                                        data-bs-toggle="tooltip"
                                        title=""
                                        class="btn btn-link btn-primary btn-lg"
                                        data-original-title="Edit Task">
                                        <a href="{{route('fourniture.edit', $demande->id)}}"><i class="fa fa-edit"></i></a>
                                        </button>
                                        @endif --}}
                                        @if (!empty($comptableAdd))
                                        <button
                                        type="button"
                                        data-bs-toggle="tooltip"
                                        title=""
                                        class="btn btn-link btn-primary btn-lg"
                                        data-original-title="Edit Task">
                                        <a data-bs-toggle="modal" data-bs-target="#editValidModal" data-bs-id="{{$demande->id}}" class="m-r-15 text-muted editValidModal"><i class="fa fa-edit"></i></a>
                                        </button>
                                        @endif
                                        <button
                                        type="button"
                                        data-bs-toggle="tooltip"
                                        title=""
                                        class="btn btn-link btn-danger"
                                        data-original-title="Remove"
                                        >
                                        </button>
                                    </div>
                                </td>
                                </tr>
                             @empty
                                 <td colspan="9">Aucune donnée trouvé</td>
                             @endforelse
                            </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
   $(document).ready(function(){
    $(".editValidModal").click(function(){
        var detail_id =  $(this).attr('data-bs-id');

        $.ajax({
        id:{detail_id},
        url:"{{route('fourniture.edit_valid')}}",
        type:"GET",
        data:{id:detail_id},
        success:function(data){

            var statut = data.etat;
            var fourniture = data.fourniture;

            var htmlstatut = "<option value=''>Selectionner un statut </option>";
            $('#detail_id').val(fourniture[0]['id']);

            for(let i=0; i< statut.length; i++)
            {
                if(fourniture[0]['id_etat_valid_comptable'] == statut[i]['id']){
                    htmlstatut += `<option value="`+statut[i]['id']+`" selected>`+statut[i]['statut_demande']+`</option>`;

                }else{
                    htmlstatut += `<option value="`+statut[i]['id']+`">`+statut[i]['statut_demande']+`</option>`;
                }
            }

            var result = $("#edit_statut").html(htmlstatut);
        }
        });
    });
    $("#updateValidModal").submit(function(){

    var formData = $(this).serialize();
    $.ajax({
        url:"{{route('fourniture.edit_update')}}",
        type:"POST",
        data:formData,
        success:function(data){
            // console.log(data.success);
            if(data.success == true){

                location.reload();
            }
            else{
                alert(data.msg);
                }
            }
        });
    });
});


</script>
@endsection
