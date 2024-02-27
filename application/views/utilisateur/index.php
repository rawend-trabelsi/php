<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Prestige Parfums</title>

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />

    <!-- Bootstrap icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Core theme CSS (includes Bootstrap) -->
    <link href="<?= base_url('assets/css/styles.css'); ?>" rel="stylesheet" />

    <style>
      

/* Couleur de fond pour la barre de navigation */
.navbar {
    background-color: #ffe4e1; /* Couleur rose clair (vous pouvez changer la couleur selon vos préférences) */
}

/* Couleur de fond pour le pied de page */
footer {
    background-color: #ffe4e1; /* Couleur rose clair (la même couleur que la barre de navigation) */
}

/* Couleur de fond pour le corps de la page */
body {
    background-color: #fffaf0; /* Une teinte légèrement plus claire que la barre de navigation et le pied de page */
}

/* ... Styles existants ... */

.search-bar {
    display: flex;
    flex-direction: column;
    align-items: center;
    margin-top: 20px;
}

.search-input {
    width: 300px;
    padding: 10px;
    border: none;
    border-radius: 5px;
    margin-bottom: 10px;
    text-align: center; /* Center the text within the input */
}

        .search-input {
            width: 300px;
            padding: 10px;
            border: none;
            border-radius: 5px;
            margin-bottom: 10px;
        }

        .search-btn {
            background-color: #343a40; /* Dark background color for search button */
            color: #ffffff; /* White text color for search button */
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
        }

        .search-btn:hover {
            background-color: #0056b3; /* Dark blue on hover */
        }

        
        .product-card {
            transition: transform 0.3s;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border: 1px solid #e0e0e0;
            margin-bottom: 20px; /* Espacement entre les cartes de produits */
        }

        .product-card:hover {
            transform: scale(1.05);
        }

        .product-card img {
            max-height: 300px;
            object-fit: cover;
            width: 100%;
            border-bottom: 1px solid #e0e0e0;
        }

        .product-card .card-body {
            padding: 15px;
        }

        .product-card .card-footer {
            padding: 10px 15px;
            border-top: 1px solid #e0e0e0;
        }

        
        
        .pagination {
    display: flex;
    justify-content: center;
    align-items: center;
    list-style: none;
    padding: 0;
}

.pagination li {
    margin: 0 5px;
}

.pagination a {
    display: flex;
    justify-content: center;
    align-items: center;
    width: 30px;
    height: 30px;
    background-color: #f8f9fa;
    border: 1px solid #dee2e6;
    border-radius: 50%;
    text-align: center;
    text-decoration: none;
    color: #343a40;
    font-weight: bold;
}

.pagination .active a {
    background-color: #007bff;
    color: #ffffff;
}

.pagination a:hover {
    background-color: #007bff;
    color: #ffffff;
}
.custom-bg-light {
    background-color: #ffe4e1;
}

    </style>
</head>

<body>
<?php include('navigation.php'); ?>
  
    <form class="d-flex" action="<?= base_url('welcome/search'); ?>" method="get">
    <input class="search-input" type="text" placeholder="Recherche" name="q">
    <button class="search-btn" type="submit">
        <i class="bi bi-search"></i> Rechercher
    </button>
</form>



    <!-- Image Carousel -->
    <div id="imageCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="<?= base_url('assets/images/acceuil.png'); ?>"  alt="Image d'acceuil" class="img-fluid">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#imageCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#imageCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <!-- Section des produits -->
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            <?php foreach ($parfums as $parfum): ?>
                <div class="col mb-5">
                    <div class="card h-100 product-card">
                        <img class="card-img-top" src="<?= base_url('uploads/' . $parfum->image); ?>"
                            alt="<?= $parfum->nom; ?>" />
                        <div class="card-body p-4">
                            <div class="text-center">
                                <h5 class="fw-bolder"><?= $parfum->nom; ?></h5>
                                dt<?= $parfum->prix; ?>
                            </div>
                        </div>
                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                            <div class="text-center">
                            <a href="<?= base_url('index.php/welcome/product_details/' . $parfum->id); ?>" data-product-id="<?= $parfum->id; ?>" class="btn btn-outline-dark">
            <i class="bi bi-info-circle"></i> Voir details
        </a>




                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="pagination">
            <?= $this->pagination->create_links(); ?>
        </div>
</section>

   


<?php include('footer.php'); ?>

    <!-- Bootstrap core JS and Core theme JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('assets/js/scripts.js'); ?>"></script>
</body>

</html>