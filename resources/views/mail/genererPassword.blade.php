<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Votre mot de passe a été régénéré - OptiRH</title>
</head>
<body style="font-family: Arial, sans-serif; line-height: 1.6; margin: 20px; padding: 20px; background-color: #f9f9f9;">
    <div style="max-width: 600px; margin: 0 auto; background-color: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
        <img src="{{ $message->embed(public_path('admin\assets\img\or.jpg')) }}" alt="logo" width="100">
        <h1 style="color: #333; font-size: 24px; text-align: center; margin-bottom: 20px;">Votre mot de passe a été régénéré</h1>
        <p style="color: #555; font-size: 16px; margin-bottom: 15px;">Bonjour <span style="font-weight: bold;">{{ $data['prenom'] }} {{ $data['nom'] }}</span>,</p>
        <p style="color: #555; font-size: 16px; margin-bottom: 15px;">Nous vous informons que votre mot de passe a été régénéré avec succès. Vous pouvez désormais accéder à votre compte sur la plateforme OptiRH en utilisant les informations de connexion suivantes :</p>
        <p style="color: #555; font-size: 16px; margin-bottom: 15px;"><span style="font-weight: bold;">E-mail :</span> {{ $data['email'] }}</p>
        <p style="color: #555; font-size: 16px; margin-bottom: 15px;"><span style="font-weight: bold;">Nouveau mot de passe :</span> {{ $data['password'] }}</p>
        <p style="color: #555; font-size: 16px; margin-bottom: 15px;">Nous vous recommandons de vous connecter dès que possible pour personnaliser votre mot de passe et vérifier vos informations personnelles.</p>
        <p style="color: #555; font-size: 16px; margin-bottom: 15px;">Pour accéder à la plateforme, veuillez suivre ce lien : <span style="font-weight: bold;">http://127.0.0.1:8000/login-agent</span></p>
        <p style="color: #555; font-size: 16px; margin-bottom: 15px;">Si vous rencontrez des difficultés ou avez des questions, n'hésitez pas à contacter notre service d'assistance.</p>
        <div style="margin-top: 30px; text-align: center; font-size: 14px; color: #777;">
            Cordialement,<br>
            L'équipe OptiRH
        </div>
    </div>
</body>
</html>
