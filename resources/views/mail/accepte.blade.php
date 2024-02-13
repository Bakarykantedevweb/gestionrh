<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acceptation de Candidature</title>
</head>

<body style="font-family: Arial, sans-serif; margin: 0; padding: 0; background-color: #f4f4f4; color: #333;">

    <div id="container"
        style="max-width: 600px; margin: 20px auto; background-color: #fff; padding: 20px; border-radius: 5px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">

        <h1 style="color: #333;">Félicitations ! Votre candidature a été acceptée</h1>

        <h2 style="margin-top: 0;">Monsieur/Madame {{ $data['prenom'].' '.$data['nom'] }},</h2>

        <p style="line-height: 1.6;">Nous sommes heureux de vous informer que votre candidature pour le poste {{ $data['titre'] }} a été acceptée. Nous sommes impressionnés par votre profil et aimerions vous inviter pour un
            entretien.</p>

        <p style="line-height: 1.6;">Nous sommes impatients de discuter avec vous et d'en apprendre davantage sur vos
            compétences et votre expérience.</p>
        <p style="line-height: 1.6;"> La date de l'entretien est le {{ \Carbon\Carbon::parse($data['date'])->isoFormat('LL') }} à {{ $data['heure'] }}</p>

        <p style="line-height: 1.6;">Merci et félicitations encore !</p>

    </div>

</body>

</html>
