@component('mail::message')  // Début du modèle de courriel avec le composant 'message'

# Nouvelle demande de contact  // Titre du courriel

Une nouvelle demande de contact a été faite.  // Premier paragraphe

<br>  // Saut de ligne pour séparer les informations

- Prénom: {{ $details['firstname'] }}  // Affichage du prénom transmis dans la variable $details
- Nom: {{ $details['lastname'] }}  // Affichage du nom transmis dans la variable $details
- Email: {{ $details['email'] }}  // Affichage de l'adresse email transmise dans la variable $details
- Téléphone: {{ $details['phone'] }}  // Affichage du numéro de téléphone transmis dans la variable $details

<br>  // Saut de ligne pour séparer le message du reste des informations

**Message:**  // En-tête du message
{{ $details['message'] }}  // Affichage du message transmis dans la variable $details

Merci,<br>  // Phrase de politesse
{{ config('app.name') }}  // Affichage du nom de l'application (défini dans le fichier de configuration)

@endcomponent  // Fin du modèle de courriel