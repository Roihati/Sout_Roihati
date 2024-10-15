<?php $__env->startSection('meta'); ?>
<meta name="description" content="About our platform">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('title'); ?>
<title>About</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>

<!-- Inclure Font Awesome pour les icônes -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
<link rel="preconnect" href="https://fonts.bunny.net">
<link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha384-oS3vJWv+0UjzB1q6iZ6ztE1xzu4w5Oq3T1ZC1Rv8nGx5iykK0sE7O6ChwdP2K5jK" crossorigin="anonymous">
<style>
    /* Style personnalisé */
    .about-section {
        padding: 40px;
        background-color: #f9f9f9;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        max-width: 800px;
        margin: 40px auto;
    }
    .about-section h1 {
        color: #333;
        font-size: 32px;
        margin-bottom: 20px;
    }
    .about-section p {
        font-size: 18px;
        color: #555;
        line-height: 1.6;
        margin-bottom: 20px;
    }
    .about-section img {
        max-width: 100%;
        height: auto;
        border-radius: 8px;
        margin-bottom: 20px;
    }
    .social-links {
        text-align: center;
        margin-top: 20px;
    }
    .social-links a {
        margin: 0 10px;
        color: #555;
        font-size: 24px;
        transition: color 0.3s;
    }
    .social-links a:hover {
        color: #3182ce;
    }
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="about-section">
    <center>
        <h1>Bienvenue sur notre plateforme web</h1>
        <img src="<?php echo e(asset('assets/images/l.webp')); ?>" width="65px"></img>     
    </center>
    <p>Nous facilitons la vente des produits des fournisseurs aux supermarchés partenaires, ainsi que celle des produits des supermarchés aux consommateurs finaux.</p>
    <p>Notre mission est de créer un écosystème de commerce transparent et efficace, où chaque acteur de la chaîne de valeur peut maximiser ses bénéfices tout en offrant le meilleur service possible aux consommateurs finaux.</p>
    <p>Si vous avez des questions ou souhaitez en savoir plus, n'hésitez pas à nous contacter.</p>
    
    <div class="social-links">
        <p>Suivez-nous sur les réseaux sociaux :</p>
        <a href="https://www.facebook.com" target="_blank"><i class="fab fa-facebook"></i></a>
        <a href="https://www.whatsapp.com" target="_blank"><i class="fab fa-whatsapp"></i></a>
        <a href="https://www.twitter.com" target="_blank"><i class="fab fa-twitter"></i></a>
        <a href="https://www.linkedin.com" target="_blank"><i class="fab fa-linkedin"></i></a>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script>
    // Script personnalisé
    document.addEventListener('DOMContentLoaded', function() {
        console.log('Page About chargée');
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app_acceil', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\Sout_Roihati\projet_soutenance\resources\views/about.blade.php ENDPATH**/ ?>