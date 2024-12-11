<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BON ENTREE</title>
    <style>
        body{
            text-align: justify;
        }
        .text{
            font-style: italic;
            text-decoration: 1px solid underline;
            margin-left: 60px;
            margin-right: 10px;
        }
        table{
            /* border:1px black solid; */
            width:80%;
            margin:auto;

        }
        td, table th, tr{
            border: 1px black solid;
        }
        /* tr, th td{
            border:1px black solid;

        } */
    </style>
</head>
<body>
    <div style="margin-bottom: 40px;" class="row">
        <div style="float: left;" class="col col-md-6">
            <img src="{{ public_path('storage\anpej_ministre.jpg') }}" class="image img-thumbnail" height="100px" width="250px" />
        </div>

    </div><br><br>
    <div style="margin: 5px;">
        <h1 style="text-align:center; margin:auto;padding:20px;
          width:500px;">BON ENTREE</h1>
    </div><br>
    <div style="float: right; font-style: italic; margin-right: 180px;" class="col md-6">
        <p>Dans l'existant: 4</p>
        <p>Instruction generale art 12a, 12c, 19a</p>
        <p>Annee: budgétaire: </p>
        <p>Nº..............du.............</p>
    </div><br>
    <div style="font-size: 20px;margin-left:20px; margin-top:120px; text-align:justify;" class="row">
        <div class="card">
            <div class="card-body">

                <div class="table-responsive">
                    <table style="border:1px black solid;" cellspacing="0"
                      class=" table table-striped table-hover">
                      <thead>
                        <tr>
                          {{-- <th></th> --}}
                          <th>DESIGNATIONS DES MATIERES</th>
                          <th colspan="4">CHIFFRES A COMPTABILISER</th>
                          {{-- <th rowspan="2">OBSERVATIONS</th> --}}
                        </tr>
                        <tr>
                            {{-- <th></th> --}}
                            <th>Specification</th>
                            <th>Nbre Unités</th>
                            <th>Nature</th>
                            <th>Prix Unitaire CFA</th>
                            <th>Montant total TTC FCFA</th>

                        </tr>
                    </thead>
                    <tbody>
                            <?php $total_price = 0 ?>
                               @forelse ($article as $article)
                                <tr>
                                  <td>{{$article->name_article}}</td>
                                  <td style="text-align:right;">{{$article->Quantite_stock}}</td>
                                  <td></td>
                                  <td style="text-align:right;">{{$article->prix_unitaire}} FCFA</td>
                                  <td style="text-align:right;">{{$article->prix_unitaire  * $article->Quantite_stock}} FCFA</td>
                                </tr>
                                <?php $total_price = $total_price + $article->prix_unitaire  * $article->Quantite_stock ?>

                                @empty
                                    <td colspan="5">Aucune donnée trouvé</td>
                                @endforelse
                                <tr>
                                    <td>TOTAL</td>
                                    <td style="text-align:right;" colspan="4">{{$total_price}} FCFA</td>

                                </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        {{-- <div style="margin-top:40px;" class="col col-md-12">
            <div>
                <label class="text" for="">Prenom et Nom:</label>
                <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;
                    {{$OM_info->user->employe->prenom}} {{$OM_info->user->employe->nom}}</span>
            </div>
            <div style="margin-top:40px;">
                <label class="text" for="">Fonction:</label>
                <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                     {{$OM_info->user->employe->poste->poste}}</span>
            </div>
            <div style="margin-top:40px;">
                <label class="text" for="">Destination:</label>
                <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    {{$OM_info->destination}}</span>
            </div>
            <div style="margin-top:40px;">
                <label class="text" for="">Objet de la Mission:</label>
                <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    {{$OM_info->objet}}</span>
            </div>
            <div style="margin-top:40px;">
                <label class="text" for="">Date de depart:</label>
                <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    {{date('d-m-Y',strtotime($OM_info->date_depart))}}</span>
            </div>
            <div style="margin-top:40px;">
                <label class="text" for="">Date de Retour:</label>
                <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;
                    {{date('d-m-Y',strtotime($OM_info->date_retour))}}</span>
            </div>
            <div style="margin-top:40px;">
                <label class="text" for="">Moyen de transport:</label>
                <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    {{$OM_info->voiture->matricule}}</span>
            </div>
        </div> --}}
        {{-- <div class="col col-md-6">
            <span></span>
        </div> --}}
    </div><br>
    <div style="margin: 5px;" class="row">
        <div style="float: right;" class="col col-md-6">
            <p>Dans l'existant: 4</p>
            <p>Instruction generale art 12a, 12c, 19a</p>
            <p>Annee: budgétaire: </p>
            <p>Nº..............du.............</p>
        </div>
        <div class="col col-md-6">
            <p>Dans l'existant: 4</p>
            <p>Instruction generale art 12a, 12c, 19a</p>
            <p>Annee: budgétaire: </p>
            <p>Nº..............du.............</p>
        </div>
    </div>
</body>
</html>
