<!DOCTYPE html>
<html lang="en">

<head>
   

    <!-- Ajoutez vos balises de lien CSS ou vos feuilles de style ici -->
    <link href="<?= base_url('assets/css/styles.css'); ?>" rel="stylesheet" />
    <style>
        .navbar {
            background-color: #ffe4e1;
        }

        body {
            background-color: #fffaf0;
        }

        footer {
            background-color: #ffe4e1;
        }

        /* Styles améliorés pour les articles */
        .product-card {
            transition: transform 0.3s;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border: 1px solid #e0e0e0;
            margin-bottom: 20px;
            border-radius: 10px;
            overflow: hidden; /* Pour cacher les coins arrondis des images */
        }

        .product-card:hover {
            transform: scale(1.05);
        }

        .product-card img {
            max-height: 210px;
            object-fit: cover;
            width: 100%;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }

        .product-card .card-body {
            padding: 15px;
        }

        .product-card .card-footer {
            padding: 10px 10px;
            border-top: 1px solid #e0e0e0;
        }
        .selected-category h2 {
        color: #8b0000; /* Couleur du texte différente pour le titre de la catégorie sélectionnée */
        font-size: 2em; /* Taille de police légèrement plus grande */
        text-transform: uppercase; /* Convertir le texte en majuscules */
        border-bottom: 2px solid #8b0000; /* Bordure inférieure */
        padding-bottom: 10px; /* Espace en dessous de la bordure inférieure */
        margin-bottom: 20px; /* Espace en dessous du titre */
    }
    </style>
</head>

<body>

    <!-- Inclure la navigation -->
    <?php include('navigation.php'); ?>

   
    <section class="py-5">
    <div class="row row-cols-1 row-cols-md-2 g-4 selected-category">
        <div class="container">
        
            <h2 class="text-center mb-4">Catégorie sélectionnée</h2>

            <div class="row row-cols-1 row-cols-md-2 g-4">
                <?php foreach ($parfums as $parfum): ?>
                    <div class="col">
                        <div class="card h-100 product-card border-0">
                            <img src="<?= base_url('uploads/' . $parfum->image); ?>" class="card-img-top"
                                alt="<?= $parfum->nom; ?>">
                            <div class="card-body">
                                <h5 class="card-title"><?= $parfum->nom; ?></h5>
                                <p class="card-text">$<?= $parfum->prix; ?></p>
                                <a href="<?= base_url('index.php/welcome/product_details/' . $parfum->id); ?>" data-product-id="<?= $parfum->id; ?>"  class="btn btn-outline-dark">Voir  Details</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <?php include('footer.php'); ?>

    <!-- Bootstrap core JS and Core theme JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('assets/js/scripts.js'); ?>"></script>
</body>

</html>
