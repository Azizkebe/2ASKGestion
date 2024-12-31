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
        <div style="float: right; font-style: italic;" class="col md-6">
            <span>Dans l'existant: 4</span><br>
            <span>Instruction generale art 12a, 12c, 19a</span><br>
            <span>Annee: budgétaire: {{$currentYear}}</span><br>
            <span>Nº...................du {{$today}} {{$mouth}} {{$currentYear}}</span>
        </div><br>

    </div>
    <div style="margin: 3px;">
        <h1 style="text-align:center; margin:auto;padding:20px;
          width:500px;">BON D'ENTREE</h1>
          <p style="text-align:center; margin:auto;
          width:500px;">Des Matieres du {{$info_grp->group->groupe ?? ''}} dans le projet de {{$info_grp->projet->name_projet ?? ''}}</p>
    </div>
    <div style="font-size: 20px;margin-left:20px; margin-top:60px; text-align:justify;" class="row">
        <div class="card">
            <div class="card-body">

                <div class="table-responsive">
                    <table style="border:1px black solid;" cellspacing="0"
                      class=" display table table-striped table-hover">
                      <thead>
                        <tr>
                          {{-- <th></th> --}}
                          <th colspan="3">DESIGNATIONS DES MATIERES</th>
                          <th colspan="3">CHIFFRES A COMPTABILISER</th>
                          <th style="padding-top: 0; margin-top:0;" rowspan="2">OBSERVATIONS</th>
                        </tr>
                        <tr>
                            <th>No</th>
                            <th>Nature des matieres</th>
                            <th>Specification</th>
                            <th>Nbre Unités</th>
                            {{-- <th>Nature</th> --}}
                            <th>Prix Unitaire CFA</th>
                            <th>Montant total TTC FCFA</th>
                            {{-- <th rowspan="2" colspan="2">Fournisseur</th> --}}
                        </tr>

                    </thead>
                    <tbody>
                            <?php $total_price = 0; $total_unite = 0; ?>
                               @forelse ($article as $article)
                                <tr>
                                  <td>{{$article->numero_article ?? ''}}</td>
                                  <td>{{$article->matiere->nature ?? ''}}</td>
                                  <td>{{$article->name_article}}</td>
                                  <td style="text-align:right;">{{$article->Quantite_stock}}</td>
                                  {{-- <td></td> --}}
                                  <td style="text-align:right;">{{$article->prix_unitaire}}F </td>
                                  <td style="text-align:right;">{{$article->prix_unitaire  * $article->Quantite_stock}}F </td>
                                  <td style="text-align:center;">{{$article->fournisseur->name_fournisseur ?? ''}}</td>

                                </tr>

                                <?php
                                    $total_unite = $total_unite + $article->Quantite_stock ;
                                    $total_price = $total_price + $article->prix_unitaire  * $article->Quantite_stock;
                                ?>

                                @empty
                                    <td colspan="5">Aucune donnée trouvé</td>
                                @endforelse
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td style="text-align: right;font-weight:bolder;">{{$total_unite}}</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>TOTAL</td>
                                    <td style="text-align:right;font-weight:bolder;" colspan="5">{{$total_price}} FCFA</td>
                                    <td></td>
                                </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div style="margin: 5px;" class="row">
        <div style="float: left;" class="col col-md-6">
            <span style="text-decoration: underline;">CERTIFICATION</span><br>
            <span>Arreté le present bon à</span><br>
            <span><span style="font-weight: bolder;"> {{$total_unite}} unités</span> representant</span><br>
            <span> une valeur de <span style="font-weight: bolder;">{{$total_price}} FCFA</span></span><br>
            <span>A......................., le..........................</span>
        </div>
        <div style="float: right;" class="col col-md-6">
            <span style="text-decoration: underline;">AUGMENTATION DES PRISES EN CHARGES</span><br>
            <span>Le comptable des matieres soussigné, declare ce</span><br>
            <span>jour augmenter ses prises en charge de ........... unités</span><br>
            <span>representant une valeur de ....................FCFA</span><br>
            <span>A............................., le...........................</span><br>
        </div>
    </div>
</div>
<br>
<div style="height:40px; clear:both; width:80%; display:flex;" class="row">
    <div style="" class="col col-md-4">
        <p style="text-align:left; text-decoration:underline 1px solid;">La Comptable des Matieres</p>
    </div>
    <div style="" class="col col-md-4">
        <p style=" text-decoration:underline 1px solid;">Le DAFC</p>
    </div>
    <div style="" class="col col-md-4">
        <p style="text-decoration:underline 1px solid;">L'Administrateur des matieres</p>
    </div>
</div>
{{-- <div style="margin:5px; clear:both;">
    <div class="row">
        <div class="col col-md-4">
            <span style="text-decoration:underline 1px solid;"> La comptable des Matieres</span>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        </div>
        <div class="col col-md-4">
            <span style="text-decoration:underline 1px solid; text-align:right;">Le DAFC</span>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        </div>
        <div class="col col-md-4">

            <span style="text-decoration:underline 1px solid; text-align:right;">L'Administrateur des Matieres</span>
        </div>
    </div>
</div> --}}
</body>
</html>
