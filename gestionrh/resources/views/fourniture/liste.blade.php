@extends('layouts.website')

@section('content')
<div class="container-fluid">
    <div class="col-md-12">
        <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                    <h4 class="card-title">Liste des Fournitures</h4>
                    <button class="btn btn-primary btn-round ms-auto">
                        <a href="{{route('fourniture.add')}}" class="text-white"><i class="fa fa-plus"></i> Nouvelle demande</a>
                    </button>
                    </div>
                </div>
              <div class="card-body">

                @include('fourniture.modal.validatemodal')
                <div class="table-responsive">
                    @include('fourniture.modal.validatemodal')
                  <table
                    id="add-row"
                    class="display table table-striped table-hover"
                  >
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Projet</th>
                        <th>Motif</th>
                        <th>Service</th>
                        <th>Etat</th>
                        <th style="width: 10%">Action</th>
                        <th>Suivi demande</th>
                      </tr>
                        </thead>
                            <tbody>
                             @forelse ($fourniture as $demande)
                            <tr>
                                <td class="id">{{$demande->id}}</td>
                                <td class="projet">{{$demande->projet->name_projet}}</td>
                                <td class="projet2" hidden>{{$demande->projet->name_projet}}</td>
                                <td class="motif">{{$demande->motif}}</td>
                                <td class="bureau">{{$demande->bureau}}</td>
                                <td class="etat">{{$demande->etat->statut_demande ?? 'Nouvelle demande'}}</td>
                                <td class="validateur1" hidden>{{$demande->user->employe->service->employe->prenom ?? ''}} {{$demande->user->employe->service->employe->nom ??''}}</td>
                                <td class="validateur2" hidden>{{$demande->user_comptable->prenom ?? ''}} {{$demande->user_comptable->nom ?? ''}}</td>
                                <td class="etat2" hidden>{{$demande->etat_valid->statut_demande ?? ''}}</td>
                                <td class="comment" hidden>{{$demande->commentaire ?? ''}}</td>

                                <td>
                                    <div class="form-button-action">
                                        <button
                                        type="button"
                                        data-bs-toggle="tooltip"
                                        title=""
                                        class="btn btn-link btn-primary btn-lg"
                                        data-original-title="Edit Task"
                                        ><a href="{{route('fourniture.detail', $demande->id)}}"><i class="fa fa-info"></i></a>
                                        </button>

                                        @if ($demande->id_etat_demande == '1' || $demande->id_etat_demande == '2' || $demande->id_etat_demande == '3')
                                        <div style="display: none;">
                                            <button
                                            type="button"
                                            data-bs-toggle="tooltip"
                                            title=""
                                            class="btn btn-link btn-danger"
                                            data-original-title="Remove"
                                            >
                                            <a onclick="return confirm('Etes vous sure de vouloir supprimer la fourniture')"
                                            href="{{route('delete_fourniture.delete', $demande->id)}}" class="btn btn-link btn-danger"><i class="fa fa-trash"></i>
                                           </a>
                                            </button>
                                        </div>
                                        @else
                                        <button
                                        type="button"
                                        data-bs-toggle="tooltip"
                                        title=""
                                        class="btn btn-link btn-danger"
                                        data-original-title="Remove"
                                        >
                                        <a onclick="return confirm('Etes vous sure de vouloir supprimer la fourniture')"
                                        href="{{route('delete_fourniture.delete', $demande->id)}}" class="btn btn-link btn-danger"><i class="fa fa-trash"></i>
                                       </a>
                                        </button>
                                        @endif
                                    </div>
                                </td>
                                <td>
                                    <div class="form-button-action">
                                        <button
                                        type="button"
                                        data-bs-toggle="tooltip"
                                        title=""
                                        class="btn btn-link btn-primary btn-lg"
                                        data-original-title="Edit Task"
                                        >
                                            <a href="" class="m-r-15 text-muted update" data-bs-toggle="modal" data-bs-target="#update" data-bs-id="'.$demande->id.'"><i class="fa fa-eye"></i></a>

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
        $(".update").click(function()
            {
            var _this = $(this).parents('tr');
			$('#e_id').val(_this.find('.id').text());
			$('#e_projet').val(_this.find('.projet').text());
			$('#e_projet2').val(_this.find('.projet2').text());
			$('#e_motif').val(_this.find('.motif').text());
			$('#e_service').val(_this.find('.bureau').text());
			$('#e_validateur1').val(_this.find('.validateur1').text());
			$('#e_validateur2').val(_this.find('.validateur2').text());
			$('#e_etat').val(_this.find('.etat').text());
			$('#e_etat2').val(_this.find('.etat2').text());
			$('#comment').val(_this.find('.comment').text());
            $('#update').modal('show');
        });
    });
</script>
@endsection
