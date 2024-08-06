<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contrat de travail à durée indéterminée</title>
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
            line-height: 1.5;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
        }

        .container {
            width: 100%;
            margin: 20px auto;
            padding: 20px;
            background-color: white;
            border: 1px solid #000;
        }

        .title {
            text-align: center;
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .section {
            margin-bottom: 20px;
        }

        .section-title {
            font-weight: bold;
            margin-bottom: 10px;
        }

        .content p {
            margin: 0 0 10px;
        }

        .signature {
            width: 100%;
            display: inline-block;
            margin-top: 40px;
        }

        .signature div {
            width: 45%;
            display: inline-block;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="title">
            @if ($contrat->type_contrat_id == 1)
                Contrat de travail à durée indéterminée
            @elseif ($contrat->type_contrat_id == 2)
                Contrat de travail à durée déterminée
            @elseif ($contrat->type_contrat_id == 3)
                Contrat de Qualification
            @endif
        </div>

        <div class="section">
            <p>Entre les soussignés :</p>
            <div class="content">
                <p>La Banque Internationale pour le Mali dont le siège social se
                    situe au Mali représentée par <strong>Mr. Macky Niang</strong></p>
            </div>
            <p>D’une part</p>
            <p>Et</p>
            <div class="content">
                <p>
                    @if($contrat->agent->sexe == "M")
                        Mr.
                    @else
                        Mme.
                    @endif
                    {{ $contrat->agent->prenom }} {{ $contrat->agent->nom }} né(e) le {{ $contrat->agent->jour.'-'.$contrat->agent->mois.'-'.$contrat->agent->annee }} à Bamako
                    de nationalité Malienne immatriculé(e) {{ $contrat->agent->matricule }} à la Sécurité sociale sous le numéro {{ $contrat->numero }} et
                    demeurant a Bamako.
                </p>
            </div>
            <p>D’autre part</p>
            <p>Il a été convenu ce qui suit.</p>
        </div>

        <div class="section">
            <div class="section-title">Article I. Engagement</div>
            <div class="content">
                <p>L’employeur engage Mr. <strong>Modibo DIAKITE</strong> à compter du {{ $contrat->date_creation }} sous réserve
                    d’effectuer la visite médicale d’embauche préalable.</p>
                <p>Le présent contrat est encadré par les dispositions de la convention collective en vigueur dans
                    l’entreprise (préciser) et par le règlement intérieur de l’entreprise dont le salarié déclare avoir
                    pris connaissance.</p>
            </div>
        </div>

        <div class="section">
            <div class="section-title">Article II. Fonctions et qualifications</div>
            <div class="content">
                <p>Le salarié est recruté en qualité de <strong>{{ $contrat->agent->poste->nom }}</strong> et exercera les fonctions suivantes
                    (lister les fonctions) sujettes à une éventuelle évolution.
                </p>
            </div>
        </div>

        <div class="section">
            <div class="section-title">Article III. Rémunération</div>
            <div class="content">
                <p>Le salarié est soumis à la durée légale du travail applicable au sein de l’entreprise. Il percevra à
                    ce titre une rémunération brute mensuelle de <strong>{{ number_format($contrat->salaire) }}</strong>
                    correspondant au salaire de base.</p>
            </div>
        </div>


        <div class="section">
            <div class="section-title">Article V. Lieu de travail</div>
            <div class="content">
                <p>Le salarié exercera son activité au sein des locaux de l’entreprise situés a Bamako. En cas de nécessité le salarié pourra être amené à exercer son activité de façon
                    temporaire en dehors de ces locaux.</p>
            </div>
        </div>

        <div class="section">
            <div class="section-title">Articles VI. Rupture du contrat</div>
            <div class="content">
                <p>Chacune des deux parties est autorisée à rompre le contrat de travail sous réserve de respecter le
                    délai de préavis conformément aux dispositions légales et conventionnelles en vigueur.</p>
            </div>
        </div>

        <div class="section">
            <div class="section-title">Articles VII. Congés payés</div>
            <div class="content">
                <p>Conformément aux conditions légales et conventionnelles le salarié dispose d’un droit aux congés
                    payés annuels.</p>
            </div>
        </div>

        <div class="section">
            <div class="content">
                <p>Fait en deux exemplaires à Bamako le {{ $contrat->date_creation }}</p>
            </div>
        </div>

        <div class="signature">
            <div>
                <p>Signature de l’employeur</p>
                <p></p>
            </div>
            <div>
                <p>Signature du salarié</p>
                <p></p>
            </div>
        </div>
    </div>
</body>

</html>
