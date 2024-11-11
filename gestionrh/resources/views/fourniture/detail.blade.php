@extends('layouts.website')

@section('content')
<div class="container-fluid">

    <div class="col-md-12">
        <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                    <h4 class="card-title">Detail des Fournitures</h4>
                    </div>
                </div>
              <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="">Projet Initial</label>
                        <input type="text" class="form-control" name="" id="" value="{{$fourni->projet->name_projet}}" readonly>
                    </div>
                    <div class="col-md-6">
                        <label for="">Motif de la demande</label>
                        <input type="text" class="form-control" name="" id="" value="{{$fourni->motif}}" readonly>
                    </div>
                </div>
            <div class="d-flex justify-content:end mb-3">

                {{-- @if ($error != '1' || $fourni->id_etat_valid_comptable != NULL || $fourni->id_etat_valid_comptable != '') --}}
                    @if ($error != '1' || $fourni->id_user_comptable == Auth::user()->id_employe)
                    <button class="btn btn-primary btn-round ms-auto" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <i class="fa fa-plus"></i> Ajouter des articles
                    </button>
                    @endif
                {{-- @endif --}}
                    {{-- <button class="btn btn-primary btn-round ms-auto" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <i class="fa fa-plus"></i> Ajouter des articles
                    </button> --}}


                    {{-- DEEBUT ADD ARTICLE  --}}
                    @include('fourniture.modal.addmodal')
                    {{-- FIN ADD ARTICLE --}}

                    {{-- DEBUT EDIT ARTICLE --}}
                    @include('fourniture.modal.editmodal')

            </div>
            <div class="table-responsive">
                <table
                  id="add-row"
                  class="display table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Article</th>
                            <th>Quantite demandée</th>
                            <th>Quantite accordee</th>
                            <th>Projet</th>
                            <th style="width: 10%">Action</th>
                        </tr>
                    </thead>
                          <tbody>
                           @forelse ($panier as $detail)
                          <tr>
                              <td>{{$detail->id}}</td>
                              <td class="article">{{$detail->article->name_article ?? ''}}</td>
                              <td class="Qte_demande">{{$detail->Quantite_demandee ?? ''}}</td>
                              {{-- @if ($fourni->id_user_comptable == Auth::user()->id_employe) --}}
                              <td>
                                <div>
                                    <form action="{{route('panier_article.article_accordee', $detail->id)}}">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <input style="width:95px;" type="number" name="qte_accordee" id="qte_accordee" value="{{$detail->Quantite_demandee}}" max="{{$detail->Quantite_demandee}}" min="0">
                                                @if (!empty($ComptableValid))
                                                <button onclick="return confirm('Etes-vous sure de valoir accorder cette quantite au demandeur')" type="submit" class="btn btn-primary btn-sm">Confirmer</button>
                                                @endif
                                            </div>
                                            <div class="col-md-9">

                                            </div>
                                        </div>
                                    </form>
                                </div>
                              </td>

                              <td>{{$detail->fourniture->projet->name_projet}}</td>
                              {{-- @if ($error != '1' || $fourni->id_user_comptable == Auth::user()->id_employe) --}}
                              @if (!empty($ComptableValid))
                              <td>
                                  <div class="form-button-action">
                                      <button
                                      type="button"
                                      data-bs-toggle="tooltip"
                                      title=""
                                      class="btn btn-link btn-primary btn-lg"
                                      data-original-title="Edit Task"
                                      >
                                      {{-- <a href="" data-bs-toggle="modal" data-myquantity="{{$detail->Quantite_demandee}}"
                                        data-myarticle="{{$detail->article->name_article ?? ''}}" data-bs-target="#editModal" class="editModal"
                                      > --}}
                                      <a href="" class="m-r-15 text-muted editModal" data-bs-toggle="modal" data-bs-target="#editModal" data-bs-id="{{$detail->id}}"><i class="fa fa-edit"></i></a>
                                      </button>
                                      <button
                                      type="button"
                                      data-bs-toggle="tooltip"
                                      title=""
                                      class="btn btn-link btn-danger"
                                      data-original-title="Remove"
                                      ><a onclick="return confirm('Etes vous sure de vouloir supprimer l\'article')"
                                      href="{{route('fourniture.delete', $detail->id)}}" class="btn btn-link btn-danger"><i class="fa fa-times"></i></a>
                                      </button>
                                  </div>
                              </td>
                              @endif
                              </tr>
                           @empty
                               <td colspan="7">Aucune Article trouvé</td>
                           @endforelse
                          </tbody>

                </table>
                @if (!empty($ComptableValid))
                <div style="align-content: center;">
                    <button class="btn btn-success btn-round ms-auto" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Changer le statut
                   </button>
                </div>
                @endif
                @if ($error != '1')
                <a href="{{route('fourniture_cash', $fourni)}}" class="btn btn-success btn-sm">Envoyer pour validation</a>


               &nbsp;&nbsp;
                <a href="" type="reset" class="btn btn-danger btn-sm">Annuler</a>
                @endif
            </div>
        </div>
    </div>
</div>
<script>
    $(".editModal").click(function(){
                var detail_id =  $(this).attr('data-bs-id');

                $.ajax({
                id:{detail_id},
                url:"{{route('fourniture.editer_article')}}",
                type:"GET",
                data:{id:detail_id},
                success:function(data){
                    var panier = data.panier;
                    var article = data.article;
                    $('#detail_id').val(panier[0]['id']);
                    var htmlarticle = "<option value=''>Selectionner un article </option>";

                    for(let i=0; i< article.length; i++)
                    {
                        if(panier[0]['id_article'] == article[i]['id']){
                            htmlarticle += `<option value="`+article[i]['id']+`" selected>`+article[i]['name_article']+`</option>`;

                        }else{
                            htmlarticle += `<option value="`+article[i]['id']+`">`+article[i]['name_article']+`</option>`;
                        }

                    }

                    var result = $("#edit_article").html(htmlarticle);
                }
            });
            var _this = $(this).parents('tr');
			$('#qte_demande').val(_this.find('.Qte_demande').text());

        });

            $("#updated").submit(function(){

            var formData = $(this).serialize();

            $.ajax({
                url:"{{route('fourniture.update_article')}}",
                type:"POST",
                data:formData,
                success:function(data){

                    if(data.success == true){

                        location.reload();
                    }
                    else{
                        alert(data.msg);
                        }
                    }
                });

            });
</script>
@endsection

{{-- @section('script')
    <script>
        $(document).ready(function(){
            $(document).on('click', '.editModal', function(){
                var stud_id = $(this).val();

                $('#editModal').modal('show');
            })
        });
    </script>
@endsection --}}
