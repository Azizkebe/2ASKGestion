<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ordre de Mission</title>
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
    </style>
</head>
<body>
    <div style="margin-bottom: 40px;" class="row">
        <div style="float: left;" class="col col-md-6">
            <img src="{{ public_path('storage\anpej_ministre.jpg') }}" class="image img-thumbnail" height="100px" width="250px" />
        </div>
        <div style="float: right; font-style: italic;" class="col md-6">
            <p>No......................./ANPEJ/DG/SG/RRH/ARH</p>
            <p>Dakar, le ..........</p>
        </div>
    </div><br><br><br><br><br><br>
    <div style="margin: 20px;">
        <h1 style="text-align:center; margin:auto;padding:20px;
         border:10px solid gray; cellspacing:0; width:500px;">ORDRE DE MISSION</h1>
    </div><br><br>
    <div style="font-size: 20px;margin-left:20px; text-align:justify;" class="row">
        <div style="margin-top:40px;" class="col col-md-12">
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
        </div>
        {{-- <div class="col col-md-6">
            <span></span>
        </div> --}}
    </div>
</body>
</html>
