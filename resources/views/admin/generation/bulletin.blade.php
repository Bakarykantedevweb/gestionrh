<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            border: 1px solid #ccc;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2,
        h3 {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
    <title>Bulletin de Salaire</title>
</head>

<body>
    @php
                $montant = 0;
                $salaireBrut = 0;
                $inps = 0;
                $its = 0;
                $nombre_part = 0;
                $salaireNet = 0;
                $Impotbrut = 0;
                $ReductionChargeFamille=0;
                @endphp
    <div class="container">
        <h2>Bulletin de Salaire</h2>
        <p><strong>Nom :</strong> {{ $detailContrat->agent->nom }}</p>
        <p><strong>Prénom :</strong> {{ $detailContrat->agent->prenom }}</p>
        <p><strong>Poste :</strong> {{ $detailContrat->agent->poste->nom }}</p>
        <table>
            <tr>
                <th>Rubriques</th>
                <th>Montant</th>
            </tr>
            @foreach ($rubriquesDuBulletin as $item)
            <tr>
                <td>{{ $item->rubrique->libelle }}</td>
                <td>{{ number_format($item->montant) }}</td>
            </tr>
            @php $montant += $item->montant; @endphp
            @endforeach
                @php

                // Calcul de l'INPS et du revenu imposable
                $salaireBrut = $montant + $detailContrat->salaire;
                $inps = ($salaireBrut * 3.6)/100;
                $RevenuImposable = $salaireBrut - $inps;
                if ($RevenuImposable > 3494130)
                {
                $ImpotBrut = ($RevenuImposable - 3494130) * 37 / 100; // Tranche 7 : 37%
                }
                elseif ($RevenuImposable > 2384195)
                {
                $ImpotBrut = ($RevenuImposable - 2384195) * 31 / 100; // Tranche 6 : 31%
                }
                elseif ($RevenuImposable > 1789733)
                {
                $ImpotBrut = ($RevenuImposable - 1789733) * 26 / 100; // Tranche 5 : 26%
                }
                elseif ($RevenuImposable > 1176400)
                {
                $ImpotBrut = ($RevenuImposable - 1176400) * 18 / 100; // Tranche 4 : 18%
                }
                elseif ($RevenuImposable > 578400)
                {
                $ImpotBrut = ($RevenuImposable - 578400) * 12 / 100; // Tranche 3 : 12%
                }
                elseif ($RevenuImposable > 330000)
                {
                $ImpotBrut = ($RevenuImposable - 330000) * 5 / 100; // Tranche 2 : 5%
                }
                else {
                $ImpotBrut = 0; // Tranche 1 : 0%
                }

                if($detailContrat->situation_matrimoniale == 'Célibataire' && $detailContrat->nombre_enfant == 0)
                {
                $ReductionChargeFamille = 0;
                }

                if($detailContrat->situation_matrimoniale == 'Divorce' && $detailContrat->nombre_enfant == 0)
                {
                $ReductionChargeFamille = 0;
                }

                if($detailContrat->situation_matrimoniale == 'Veuf' && $detailContrat->nombre_enfant == 0)
                {
                $ReductionChargeFamille = 0;
                }

                if ($detailContrat->situation_matrimoniale == 'Célibataire' || $detailContrat->situation_matrimoniale == 'Divorce'
                ||
                $detailContrat->situation_matrimoniale == 'Veuf') {
                $ReductionChargeFamille = 0; // Célibataire, divorcé(e) ou veuf (veuve), sans enfant à charge
                } elseif ($detailContrat->situation_matrimoniale == 'Marie' && $detailContrat->nombre_enfant == 0) {
                $ReductionChargeFamille = 10; // Marié(e), sans enfant à charge
                } elseif ($detailContrat->situation_matrimoniale == 'Marie' && $detailContrat->agent->sexe == 'M') {
                $ReductionChargeFamille = ($detailContrat->nombre_enfant * 2.5) + 10; // Marié(e), homme, avec enfant(s)
                } elseif ($detailContrat->situation_matrimoniale == 'Marie' && $detailContrat->agent->sexe == 'F') {
                $ReductionChargeFamille = 10; // Marié(e), femme, avec enfant(s)

                // TODO: Ajouter la logique pour la répartition entre les époux si nécessaire
                }

                $its = $ImpotBrut - $ReductionChargeFamille;
                $salaireNet = $salaireBrut - $its;

                @endphp
            <tr>
                <th>Salaire de Base</th>
                <td>{{ number_format($detailContrat->salaire) }}</td>
            </tr>
            <tr>
                <th>Salaire Brut</th>
                <td>{{ number_format($salaireBrut) }}</td>
            </tr>
            <tr>
                <th>INPS</th>
                <td>{{ number_format($inps) }}</td>
            </tr>
            <tr>
                <th>ITS</th>
                <td>{{ number_format($its) }}</td>
            </tr>
            <tr>
                <th>Salaire Net</th>
                <td>{{ number_format($salaireNet) }}</td>
            </tr>
        </table>
    </div>
</body>

</html>

