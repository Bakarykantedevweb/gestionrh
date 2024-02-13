<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formation</title>
</head>

<body style="font-family: Arial, sans-serif; margin: 0; padding: 0; background-color: #f4f4f4; color: #333;">

    <div id="container"
        style="max-width: 600px; margin: 20px auto; background-color: #fff; padding: 20px; border-radius: 5px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">

        <h1 style="color: #333;">Nouvelle formation disponible !</h1>

        <h2 style="margin-top: 0;">Cher agent,</h2>

        <p style="line-height: 1.6;">Vous avez été sélectionné pour suivre une nouvelle formation :</p>

        <table style="width: 100%; margin-top: 10px; border-collapse: collapse;">
            <tr>
                <td style="padding: 8px; border: 1px solid #ddd;">Titre</td>
                <td style="padding: 8px; border: 1px solid #ddd;">{{ $formation->titre }}</td>
            </tr>
            <tr>
                <td style="padding: 8px; border: 1px solid #ddd;">Date de début</td>
                <td style="padding: 8px; border: 1px solid #ddd;">{{ \Carbon\Carbon::parse($formation->date_debut)->isoFormat('LL') }}</td>
            </tr>
            <tr>
                <td style="padding: 8px; border: 1px solid #ddd;">Date de fin</td>
                <td style="padding: 8px; border: 1px solid #ddd;">{{ \Carbon\Carbon::parse($formation->date_fin)->isoFormat('LL') }}</td>
            </tr>
        </table>

        <p style="line-height: 1.6; margin-top: 10px;">Merci de vous connecter à votre compte pour plus de détails.</p>

        <p style="line-height: 1.6; margin-top: 10px;">Cordialement,</p>
        <p>Banque International pour le Mali.</p>

    </div>

</body>

</html>
