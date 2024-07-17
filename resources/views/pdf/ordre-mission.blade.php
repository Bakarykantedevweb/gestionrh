<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ordre de Mission</title>
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
            line-height: 1.6;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 100%;
            margin: auto;
            background: #fff;
            padding: 20px;
        }

        header {
            width: 100%;
            display: inline-block;
            margin-bottom: 30px;
        }

        .left,
        .right {
            display: inline-block;
            vertical-align: top;
        }

        .left {
            width: 60%;
            text-align: left;
        }

        .right {
            width: 35%;
            text-align: right;
        }

        header .left h1 {
            margin: 0;
            font-size: 1.5em;
            color: #333;
        }

        header .right p {
            margin: 5px 0;
            font-size: 1em;
            color: #666;
        }

        header .right h2 {
            margin: 10px 0;
            font-size: 1.5em;
            color: #333;
            text-transform: uppercase;
        }

        main {
            width: 100%;
            display: inline-block;
            margin-bottom: 30px;
        }

        .col {
            display: inline-block;
            vertical-align: top;
            width: 48%;
        }

        main p {
            margin: 15px 0;
            font-size: 1em;
            color: #333;
        }

        main p strong {
            color: #000;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 1px solid #333;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <div class="container">
        <header>
            <div class="left">
                <img src="admin/assets/img/logo.jpg" alt="" width="200">
            </div>
            <div class="right">
                <p>Bamako, {{ \Carbon\Carbon::parse(date('d-m-Y'))->isoFormat('LL') }}</p>
                <h2>ORDRE DE MISSION</h2>
                <p>AU MALI</p>
                <p>Numero: {{ $ordreMission->numero }}</p>
            </div>
        </header>
        <main>
            <div class="col">
                <p><strong>Matricule :</strong> {{ $ordreMission->agent->matricule }}</p>
                <p><strong>Lieu de travail :</strong> {{ $ordreMission->agent->agence->nom }}</p>
                <p><strong>Nom et Prénoms :</strong> {{ $ordreMission->agent->prenom.' '.$ordreMission->agent->nom}}</p>
                <p><strong>Fonction :</strong> {{ $ordreMission->agent->poste->nom }}</p>
                <p><strong>Destination de la Mission : </strong> {{ $ordreMission->agence->nom }}</p>
            </div>
            <div class="col">
                @if ($ordreMission->moyen_transport == 'Avion')
                    <p><strong>Moyen de Transport :</strong> Avion</p>
                    <p><strong>Heure de Départ Souhaitée :</strong> {{ $ordreMission->heure_depart }}</p>
                    <p><strong>Heure de Retour Souhaitée :</strong> {{ $ordreMission->heure_retour }}</p>
                @else
                    <p><strong>Moyen de  Transport :</strong> {{ $ordreMission->moyen_transport }}</p>
                @endif

                @if ($ordreMission->objet == 'Autre')
                    <p><strong>Objet de la Mission :</strong> {{ $ordreMission->objetTitre }}</p>
                @else
                    <p><strong>Objet de la Mission :</strong> {{ $ordreMission->objet }}</p>
                @endif
                <p><strong>Durée de Mission :</strong> Du {{ \Carbon\Carbon::parse($ordreMission->date_debut)->isoFormat('LL') }} Au {{ \Carbon\Carbon::parse($ordreMission->date_fin)->isoFormat('LL') }} Soit 0{{ $ordreMission->duree }} Jours</p>
            </div>
        </main>
        <table>
            <thead>
                <tr>
                    <th>{{ $ordreMission->superieur->poste->nom }}</th>
                    <th>Responsable capital humaine</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $ordreMission->superieur->prenom.' '.$ordreMission->superieur->nom }}</td>
                    <td>{{ $ordreMission->grh }}</td>
                </tr>
                <tr>
                    <td>Signature : </td>
                    <td>Signature : </td>
                </tr>
                <tr>
                    <td>Date :</td>
                    <td>Date :</td>
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>
