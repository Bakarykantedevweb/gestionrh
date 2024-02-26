<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attestation de Stage</title>
    <style>
        body {
            font-family: 'Times New Roman', serif;
            font-size: 14px;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            text-align: justify;
        }

        .date {
            text-align: right;
        }

        .header {
            text-align: left;
        }

        .h2 {
            text-align: center;
            color: #2C7BE5;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="header">
            <img src="admin/assets/img/logo.jpg" alt="" width="200">
            <h2>DIRECTION DU CAPITAL HUMAIN</h2>
            <h3>Développement RH & Communication Interne</h3>
        </div>
        <div class="date">
            <p>Bamako, le {{ \Carbon\Carbon::parse(date('d-m-Y'))->isoFormat('LL') }}</p>
        </div>


        <h2 class="h2">ATTESTATION DE STAGE</h2>

        <p>Nous, soussignés, <b>BANQUE INTERNATIONALE POUR LE MALI « BIM s.a »</b> dont le siège social sise à Bamako BP15
            Boulevard de l’Indépendance, attestons que @if ($stagiaire->sexe == 'M')
                Monsieur,
            @else
                Madame,
            @endif <b>{{ $stagiaire->prenom }} {{ $stagiaire->nom }}</b> a effectué un stage pratique dans notre établissement du
            <b>{{ \Carbon\Carbon::parse($stagiaire->date_debut)->isoFormat('LL') }} au
            {{ \Carbon\Carbon::parse($stagiaire->date_fin)->isoFormat('LL') }}</b> au sein <b>de</b> @if ($stagiaire->agence_id == 1)
                <b>la Direction {{ $stagiaire->departement->nom }}</b>
            @else
                <b>l’Agence {{ $stagiaire->agence->nom }}</b>
            @endif.
        </p>
        <p>En foi de quoi, nous délivrons la présente attestation pour servir et valoir ce que de droit.</p>
        <h3>M.DIAKITE Modibo</h3>
        <p style="font-weight: bold">Responsable de la Direction du Capital Humain</p>
    </div>

</body>

</html>
