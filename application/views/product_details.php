<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?= base_url('assets/css/styles.css'); ?>" rel="stylesheet" />
    <style>
        .navbar {
            background-color: #ffe4e1;
        }

       
        footer {
            background-color: #ffe4e1;
        }

        /* Couleur de fond pour le corps de la page */
        body {
            background-color: #fffaf0;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

       
        #wrapper {
            flex: 1;
            padding: 20px;
        }

       
        h2 {
            color: #555;
        }

        p {
            color: #777;
        }

        
        footer {
            padding: 20px 0;
            text-align: center;
        }

        
        .social-icons a {
            color: #555;
            font-size: 1.5rem;
            margin-right: 10px;
        }

      
        .categories-brands {
            margin-top: 20px;
        }

        .categories-brands h6 {
            color: #555;
            margin-bottom: 10px;
        }

        .categories-brands ul {
            list-style: none;
            padding: 0;
        }

        .categories-brands ul li {
            margin-bottom: 8px;
        }

        
        .contact-info {
            margin-top: 20px;
            color: #555;
        }

        
        .copyright {
            margin-top: 20px;
            color: #555;
        }
    </style>
</head>

<body>

    <?php
    
    if (file_exists(APPPATH . 'views/utilisateur/navigation.php')) {
        include(APPPATH . 'views/utilisateur/navigation.php');
    } else {
        echo "File 'navigation.php' not found!";
    }
    ?>

    <div id="wrapper">
    <div>
    <img src="<?= base_url('uploads/' . $product->image); ?>" alt="<?= $product->nom; ?>" class="img-fluid rounded">
</div>

        <?php if (isset($product->nom)): ?>
            <h2><?= $product->nom; ?></h2>
            <p>Price: dt<?= $product->prix; ?></p>

            <form method="post" action="<?= base_url('panier/ajouter/' . $product->id); ?>">
                <!-- ... other form fields ... -->
                <input type="number" name="quantity" value="1" min="1">
                <button type="submit" class="btn btn-outline-dark add-to-cart-btn">
                    <i class="bi bi-cart-fill me-1"></i> Ajouter au panier
                </button>
            </form>

            <!-- Commander button -->
            <a href="<?= site_url('commande/index'); ?>" class="btn btn-outline-dark">Commander</a>
            <!-- Continue Shopping button -->
            <a href="<?= site_url('welcome/index'); ?>" class="btn btn-outline-dark">Continue Shopping</a>

        <?php else: ?>
            <p>Product details not available.</p>
        <?php endif; ?>
    </div>

    <!-- Pied de page -->
    <footer class="py-5 custom-bg-light">
        <div class="container text-center">
            <!-- Suivez-nous et icônes des médias sociaux -->
            <p class="m-0 text-dark">Follow Us:</p>
            <div class="social-icons">
                <a href="#" class="text-dark me-2" target="_blank" title="Facebook"><i class="bi bi-facebook"></i></a>
                <a href="#" class="text-dark me-2" target="_blank" title="Twitter"><i class="bi bi-twitter"></i></a>
                <a href="#" class="text-dark me-2" target="_blank" title="Instagram"><i class="bi bi-instagram"></i></a>
                <!-- Ajoutez plus d'icônes de médias sociaux au besoin -->
            </div>

            <!-- Informations sur les catégories et les marques -->
            <div class="row mt-3 categories-brands">
                <div class="col-md-4">
                    <h6 class="text-uppercase mb-4">Categories</h6>
                    <ul class="list-unstyled">
                        <li><a href="#">Homme</a></li>
                        <li><a href="#">Femme</a></li>
                        <li><a href="#">Kids</a></li>
                    </ul>
                </div>

                <!-- Informations sur les marques -->
                <div class="col-md-4">
                    <h6 class="text-uppercase mb-4">Nos Marques</h6>
                    <p class="text-muted">Découvrez les meilleures marques de parfums chez Prestige Parfums.</p>
                </div>

                <div class="col-md-4">
                    <h6 class="text-uppercase mb-4">Nos Partenaires</h6>
                    <img src="<?= base_url('assets/images/marque1.jpeg'); ?>" alt="Marque 1" class="img-fluid mb-2"
                        style="max-width: 50px;">
                    <img src="<?= base_url('assets/images/marque2.jpeg'); ?>" alt="Marque 2" class="img-fluid mb-2"
                        style="max-width: 50px;">
                </div>
            </div>

            <!-- Informations de contact -->
            <p class="m-0 mt-4 contact-info">Contact: <a href="mailto:your@email.com" class="text-dark">rawendtrabelsi034@email.com</a></p>

            <!-- Droits d'auteur -->
            <p class="m-0 copyright">© 2024 Prestige Parfums. Tous droits réservés.</p>
        </div>
    </footer>

    <!-- Bootstrap core JS and Core theme JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('assets/js/scripts.js'); ?>"></script>
</body>

</html>
