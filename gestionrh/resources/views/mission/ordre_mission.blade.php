<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ordre de mission</title>
    <style>
        body {
            font-family: sans-serif;
        }
        #customers {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
        }

        #customers td, #customers th {
        border: 1px solid #ddd;
        padding: 8px;
        }

        #customers tr:nth-child(even){background-color: #f2f2f2;}

        #customers tr:hover {background-color: #ddd;}

        #customers th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #04AA6D;
        color: white;
        }
    </style>
</head>
<body>
    <div style="margin:" class="row">
        <div style="float: left;" class="col col-md-6">
            {{-- <img src="data:image/png;base64,{{ $main_image }}"> --}}
            <a href="{{asset('icon/ANPEJ_MINISTERE.png')}}" target="_blank">
                <img style="width:120px;" src="{{asset('icon/ANPEJ_MINISTERE.png')}}"
                title="Logo" alt="piece Logo" >
            </a>
        </div>
        <div style="float: right;" class="col col-md-6">
            <p>No......................./ANPEJ/DG/SG/RRH/ARH</p>
            <p>Dakar, le ..........</p>
        </div>
    </div><br>
    <div style="margin-top: 100px;" class="row">
        <div class="col col-md-6">
            <h2 class="title" style="border: solid 5px black;
                text-align:center;
                width:500px;
                margin:auto;
                cellspacing:0;">
                ORDRE DE MISSION
            </h2>
        </div>
    </div>
    <div class="row">
        <div class="col col-md-6">
            <div style="margin-top: 40px; margin-bottom:25px; height:50px;">
                <label class="customers" style="text-decoration: underline;" for="">Prenom et Nom:</label>
                <span style="font-weight: bolder;">{{$OM_info->user->employe->prenom}} {{$OM_info->user->employe->nom}}</span>
            </div>
            <div style="margin-top: 5px; margin-bottom:25px; height:50px;">
                <label style="text-decoration: underline;" for="">Fonction:</label>
                <span style="font-weight: bolder;">{{$OM_info->user->employe->poste->poste}}</span>
            </div>
            <div style="margin-top: 5px; margin-bottom:25px;height:50px;">
                <label style="text-decoration: underline;" for="">Destination:</label>
                <span style="font-weight: bolder;">{{$OM_info->destination}}</span>
            </div>
            <div style="margin-top: 5px; margin-bottom:25px;height:50px;">
                <label style="text-decoration: underline;" for="">Objet de la Mission:</label>
                <span style="font-weight: bolder;">{{$OM_info->objet}}</span>
            </div>
            <div style="margin-top: 5px; margin-bottom:25px;height:50px;">
                <label style="text-decoration: underline;" for="">Date de depart:</label>
                <span style="font-weight: bolder;">{{date('d-m-y',strtotime($OM_info->date_depart))}}</span>
            </div>
            <div style="margin-top: 5px; margin-bottom:25px;height:50px;">
                <label style="text-decoration: underline;" for="">Date de Retour:</label>
                <span style="font-weight: bolder;">{{date('d-m-y',strtotime($OM_info->date_retour))}}</span>
            </div>
            <div style="margin-top: 5px; margin-bottom:25px;height:50px;">
                <label style="text-decoration: underline;" for="">Moyen de transport:</label>
                <span style="font-weight: bolder;">hhhhhhh</span>
            </div>
        </div>
    </div>
</body>
</html>
