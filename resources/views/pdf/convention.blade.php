<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Convention</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            text-align: justify;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        .header {
            text-align: right;
        }

        .date {
            margin-bottom: 20px;
        }

        .content {
            margin-bottom: 20px;
        }

        .signature {
            float: right;
        }
    </style>
</head>

<body>
    <div class="container">
        <img src="admin/assets/img/logo.jpg" alt="" width="200">
        <h3>
            DIRECTION DU CAPITAL HUMAIN <br>
            N/Réf : 00/12/2023-DCH /BIM-sa
        </h3>
        <div class="header">
            <p>Bamako, le {{ \Carbon\Carbon::parse($stagiaire->date_fin)->isoFormat('LL') }}</p>
            <p style="font-weight: bold">Monsieur {{ $stagiaire->prenom }} {{ $stagiaire->nom }}</p>
        </div>

        <div class="content">
            <p style="font-weight: bold">
                @if ($stagiaire->sexe == 'M')
                    Monsieur,
                @else
                    Madame,
                @endif
            </p>
            <p>
                Nous avons le plaisir de vous accueillir dans notre Etablissement pour un Stage de Formation d’une
                période de deux (2) mois du {{ \Carbon\Carbon::parse($stagiaire->date_debut)->isoFormat('LL') }} au
                {{ \Carbon\Carbon::parse($stagiaire->date_fin)->isoFormat('LL') }}.
            </p>
            <p>
                Vous êtes affecté (e) au sein de @if ($stagiaire->agence_id == 1)
                    la Direction {{ $stagiaire->departement->nom }}
                @else
                    l’Agence {{ $stagiaire->agence->nom }}
                @endif.
            </p>
            <p>A la fin de votre période de stage le {{ \Carbon\Carbon::parse($stagiaire->date_fin)->isoFormat('LL') }},
                vous devrez vous présenter obligatoirement au Capital Humain
                pour la remise de votre badge.
            </p>
            <p>Aucune prolongation ne peut être accordée à l’issue de cette période de stage. Durant votre période de
                stage vous devrez vous conformer au règlement intérieur de la banque.</p>
            <p>Nous vous invitons à nous marquer votre accord sur les termes de la présente en nous retournant le double
                de cette lettre revêtue de la mention « lu et approuvé » daté et signé.</p>
            <p>Nous vous prions d’agréer Monsieur, nos salutations distinguées.</p>
        </div>

        <div class="signature">
            <p>Le stagiaire B.I.M s.a</p>
            <p>N° de la pièce d’identité :</p>
        </div>
    </div>
</body>

</html>
