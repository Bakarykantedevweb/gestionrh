<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notification de paiement de salaire</title>
</head>

<body
    style="font-family: 'Times New Roman', Times, serif; line-height: 1.6; margin: 0; padding: 0; background-color: #f4f4f4;">
    <div
        style="max-width: 600px; margin: 20px auto; padding: 20px; background-color: #fff; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1);">
        <h2 style="color: #333;">Notification de paiement de salaire</h2>
        <p style="color: #666;">
            Bonjour
            @if ($contrat->agent->sexe == 'M')
                Monsieur
            @else
                Madame
            @endif,{{ $contrat->agent->prenom . '-' . $contrat->agent->nom }}
        </p>
        <p style="color: #666;">Nous espérons que cette communication vous trouve en bonne santé et plein de vitalité.
            Nous sommes heureux de vous informer que les salaires du mois de <b>{{ Str::ucfirst($periode->mois) }}</b> ont été traités et
            versés avec succès.</p>
        <p style="color: #666;">Nous comprenons que la période de paie est cruciale pour vous, et nous avons travaillé
            diligemment pour assurer que chaque employé reçoive son salaire à temps et sans aucune interruption.</p>
        <p style="color: #666;">Veuillez vérifier vos comptes pour confirmer la réception du paiement. Si vous
            rencontrez le moindre problème ou si vous avez des questions concernant votre salaire, n'hésitez pas à
            contacter le service des ressources humaines.</p>
        <p style="color: #666;">Encore une fois, merci pour votre engagement et votre professionnalisme. Nous sommes
            fiers d'avoir une équipe aussi remarquable.</p>
        <p style="margin-top: 20px; font-style: italic;">Cordialement,<br>Banque Internationnal pour le Mali
</body>

</html>
