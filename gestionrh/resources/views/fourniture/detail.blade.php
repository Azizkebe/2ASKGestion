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
                    <button class="btn btn-primary btn-round ms-auto" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <i class="fa fa-plus"></i> Ajouter des articles
                    </button>
                    {{-- DEEBUT ADD ARTICLE  --}}
                    @include('fourniture.modal.addmodal')
                    {{-- FIN ADD ARTICLE --}}

                    {{-- DEBUT EDIT ARTICLE --}}
                    @include('fourniture.modal.editmodal')
                    {{-- <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h1 class="modal-title fs-5" id="exampleModalLabel">Ajout Article de Fourniture - {{$fourni->projet->name_projet}} </h1>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="modal-body">
                                <div class="mt-3 mb-3">

                                    <label for="">Article:</label>
                                    <select name="id_article" id="id_article" class="form-select">
                                        <option value="">-- choisir un article --</option>
                                        @foreach ($article as $article)
                                            <option value="{{$article->id}}">{{$article->name_article}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mt-3">
                                    <label for="">Quantite demandée</label>

                                    <input type="number" name="quantite_demande" min="0" id="quantite_demande" class="form-control">
                                </div>
                                </div>
                                <div class="modal-footer">
                                <button type="reset" class="btn btn-danger" data-bs-dismiss="modal">Fermer</button>
                                <button type="submit" class="btn btn-primary">Mettre à jour</button>
                                </div>
                            </form>
                            </div>
                        </div>
                    </div> --}}
                    {{-- <p>{{$panier}}</p> --}}
                    {{-- FIN EDIT ARTICLE --}}
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
                              <td>{{$detail->article->name_article ?? ''}}</td>
                              <td>{{$detail->Quantite_demandee ?? ''}}</td>
                              <td>{{$detail->Quantite_accordee}}</td>
                              <td>{{$detail->fourniture->projet->name_projet}}</td>
                              <td>
                                  <div class="form-button-action">
                                      <button
                                      type="button"
                                      data-bs-toggle="tooltip"
                                      title=""
                                      class="btn btn-link btn-primary btn-lg"
                                      data-original-title="Edit Task"
                                      >
                                      <a href="" data-bs-toggle="modal" data-myquantity="{{$detail->Quantite_demandee}}"
                                        data-myarticle="{{$detail->article->name_article ?? ''}}" data-bs-target="#editModal" class="editModal"
                                      >
                                      <i class="fa fa-edit"></i></a>
                                      </button>
                                      <button
                                      type="button"
                                      data-bs-toggle="tooltip"
                                      title=""
                                      class="btn btn-link btn-danger"
                                      data-original-title="Remove"
                                      ><a onclick="return confirm('Etes vous sure de vouloir supprimer l\'article')"
                                      href="{{route('panier_article.delete', $detail->id)}}" class="btn btn-link btn-danger"><i class="fa fa-times"></i></a>
                                      </button>
                                  </div>
                              </td>
                              </tr>
                           @empty
                               <td colspan="6">Aucune Article trouvé</td>
                           @endforelse
                          </tbody>

                </table>
               <a href="{{route('fourniture_cash', $fourni)}}" class="btn btn-success btn-sm">Envoyer pour validation</a>&nbsp;&nbsp;
                <a href="" type="reset" class="btn btn-danger btn-sm">Annuler</a>

            </div>
        </div>
    </div>
</div>

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
