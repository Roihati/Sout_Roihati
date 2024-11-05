<!DOCTYPE html>
<html>
<head>
    <title>Nouveau Message de Contact</title>
</head>
<body>
    <h2>Vous avez reçu un nouveau message de contact</h2>
    <p><strong>Nom :</strong> {{ $details['firstname'] }} {{ $details['lastname'] }}</p>
    <p><strong>Email :</strong> {{ $details['email'] }}</p>
    <p><strong>Téléphone :</strong> {{ $details['phone'] }}</p>
    <p><strong>Message :</strong> {{ $details['message'] }}</p>
</body>
</html>
