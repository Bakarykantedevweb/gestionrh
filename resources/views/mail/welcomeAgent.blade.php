<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gestion RH</title>
</head>
<body style="margin: 0; padding: 0; background-color: #F3F2F0;">
    <table role="presentation" align="center" width="100%" cellspacing="0" cellpadding="0" border="0">
        <tr>
            <td>
                <table role="presentation" align="center" width="750" cellspacing="0" cellpadding="0" border="0">
                    <tr>
                        <td>
                            <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0">
                                <tr>
                                    <td style="background-color: white; border-radius: 5px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);">
                                        <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0">
                                            <tr>
                                                <td style="text-align: center;">
                                                    <h3 style="font-size: 1.5em; margin: 0; padding: 15px;">Bienvenue sur l'application KanteBK basée sur la Gestion des RH</h3>
                                                    <br>
                                                    <h4 style="font-size: 1em; margin: 0;">Bonjour {{$data['prenom'].' '.$data['nom']}},</h4>
                                                    <p style="max-width: 100%; text-align: left; margin: 10px 0;">
                                                        L'application KanteBK de gestion des ressources humaines est un outil puissant conçu pour simplifier et optimiser la gestion des employés au sein de votre organisation.
                                                    </p>
                                                    <p style="max-width: 100%; text-align: left; margin: 10px 0;">
                                                        Notre application offre une suite complète de fonctionnalités pour rationaliser les processus de RH et améliorer l'efficacité opérationnelle.
                                                    </p>
                                                    <p style="max-width: 100%; text-align: left; margin: 10px 0;">Vous trouverez ci-dessous vos informations de connexions a savoir Email et le Mot de passe:</p>
                                                    <table border="1" style="margin: 0 auto; border-collapse: collapse; width: 100%;">
                                                        <tr>
                                                            <th>Informations</th>
                                                            <th>Valeurs</th>
                                                        </tr>
                                                        <tr>
                                                            <td>Nom</td>
                                                            <td style="text-align: right">{{ $data['nom'] }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Prenom</td>
                                                            <td style="text-align: right">{{ $data['prenom'] }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Email</td>
                                                            <td style="text-align: right">{{ $data['email'] }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Mot de passe</td>
                                                            <td style="text-align: right">password</td>
                                                        </tr>
                                                    </table>
                                                    <p style="max-width: 100%; text-align: left; margin: 10px 0;"><span style="color: red">NB :</span> Vous pouvez modifier votre Mot de passe après votre Connexion.</p>
                                                    <a href="{{ url('/') }}" style="text-decoration: none;"><button class="custom-button" style="display: block; margin: 0 auto; padding: 10px 20px; background-color: #007BFF; color: #fff; border: none; border-radius: 5px; cursor: pointer; font-size: 16px;">Cliquez ici pour vous connecter</button></a>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
