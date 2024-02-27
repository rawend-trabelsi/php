<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Fontawesome icon -->
   <!-- Linking CSS using base_url() -->
   <link rel="stylesheet" href="<?= base_url('assets/css/mastyle.css') ?>">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />


    
  </head>
  <body>

    
    <section class = "contact-section">
      <div class = "contact-bg">
        <h3>rester en contact avec nous</h3>
        <h2>contactez nous </h2>
        <div class = "line">
          <div></div>
          <div></div>
          <div></div>
        </div>
        <p class = "text"></p>
      </div>


      <div class = "contact-body">
        <div class = "contact-info">
          <div>
            <span><i class = "fas fa-mobile-alt"></i></span>
            <span>numéro de telephone</span>
            <span class = "text">27371088</span>
          </div>
          <div>
            <span><i class = "fas fa-envelope-open"></i></span>
            <span>E-mail</span>
            <span class = "text">rawendtrabelsi@gmail.com</span>
          </div>
          <div>
            <span><i class = "fas fa-map-marker-alt"></i></span>
            <span>Address</span>
            <span class = "text">NABEUL 8000 sisi Achour</span>
          </div>
          <div>
            <span><i class = "fas fa-clock"></i></span>
            <span>temps d'ouverture</span>
            <span class = "text">Monday - Friday (9:00 AM to 5:00 PM)</span>
          </div>
        </div>

        <div class = "contact-form">
        <form method="post" action="<?= site_url('contact/index') ?>">
    <div>
        <input type="text" name="first_name" class="form-control" placeholder="PRENOM">
        <input type="text" name="last_name" class="form-control" placeholder="NOM">
    </div>
    <div>
        <input type="email" name="email" class="form-control" placeholder="E-mail">
        <input type="text" name="phone" class="form-control" placeholder="TELEPHONE">
    </div>
    <textarea rows="5" name="message" placeholder="Message" class="form-control"></textarea>
    <input type="submit" class="send-btn" value="Envoyer Message">
    
<!-- Add this after the form in your contact/index view -->
<?php if (!empty($message)): ?>
    <div class="message"><?= $message ?></div>
<?php endif; ?>

</form>


          <div>
          <img src="<?= base_url('assets/images/contact-png.png') ?>" alt="">

          </div>
        </div>
      </div>

      
      <div class = "contact-footer">
        <h3>Follow Us</h3>
        <div class = "social-links">
          <a href = "#" class = "fab fa-facebook-f"></a>
          <a href = "#" class = "fab fa-twitter"></a>
          <a href = "#" class = "fab fa-instagram"></a>
          <a href = "#" class = "fab fa-linkedin"></a>
          <a href = "#" class = "fab fa-youtube"></a>
        </div>
      </div>
    </section>

    

  </body>
</html>