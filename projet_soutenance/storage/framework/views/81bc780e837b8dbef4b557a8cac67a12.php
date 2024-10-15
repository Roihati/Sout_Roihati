<?php $__env->startComponent('mail::message'); ?>  // Début du modèle de courriel avec le composant 'message'

# Nouvelle demande de contact  // Titre du courriel

Une nouvelle demande de contact a été faite.  // Premier paragraphe

<br>  // Saut de ligne pour séparer les informations

- Prénom: <?php echo e($details['firstname']); ?>  // Affichage du prénom transmis dans la variable $details
- Nom: <?php echo e($details['lastname']); ?>  // Affichage du nom transmis dans la variable $details
- Email: <?php echo e($details['email']); ?>  // Affichage de l'adresse email transmise dans la variable $details
- Téléphone: <?php echo e($details['phone']); ?>  // Affichage du numéro de téléphone transmis dans la variable $details

<br>  // Saut de ligne pour séparer le message du reste des informations

**Message:**  // En-tête du message
<?php echo e($details['message']); ?>  // Affichage du message transmis dans la variable $details

Merci,<br>  // Phrase de politesse
<?php echo e(config('app.name')); ?>  // Affichage du nom de l'application (défini dans le fichier de configuration)

<?php echo $__env->renderComponent(); ?>  // Fin du modèle de courriel<?php /**PATH C:\wamp64\www\Sout_Roihati\projet_soutenance\resources\views/emails/contact.blade.php ENDPATH**/ ?>