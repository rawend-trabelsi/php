 <html><head> </head>
 <body>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />

    <!-- Bootstrap icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />

    <!-- Core theme CSS (includes Bootstrap) -->
    <link href="<?= base_url('assets/css/styles.css'); ?>" rel="stylesheet" /></head><body><nav class="navbar navbar-expand-lg navbar-light">
            <!-- Navigation -->

        <div class="container px-4 px-lg-5">
            <a class="navbar-brand"  href="<?= base_url('welcome/index'); ?>">Prestige Parfums</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="<?= base_url('welcome/index'); ?>">Acceuil</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= base_url('utilisateur/about'); ?>">A propos nous</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= base_url('contact/index'); ?>">contact</a></li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdown"  role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">Categories</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                          
                          
                            <li><a class="dropdown-item" href="<?= site_url('welcome/categorie/0'); ?>">Nom de la catégorie</a></li>
<li><a class="dropdown-item" href="<?= site_url('welcome/categorie/7'); ?>">Femme</a></li>
<li><a class="dropdown-item" href="<?= site_url('welcome/categorie/5'); ?>">Homme</a></li>
<li><a class="dropdown-item" href="<?= site_url('welcome/categorie/12'); ?>">Kids</a></li>



                        </ul>
                    </li>
                </ul>
                <form class="d-flex">
                <a id="cart-link" class="btn btn-outline-dark" href="<?= base_url('panier'); ?>">
    <i class="bi bi-cart-fill me-1"></i> Panier
    <span id="nombre-articles-panier" class="badge bg-dark text-white ms-1 rounded-pill">
        <?= $this->Panier_model->get_nombre_articles_du_panier(); ?>
    </span>
</a>





                    <a class="btn btn-outline-dark me-2" href="#">
                        <i class="bi bi-heart-fill me-1"></i> 
                    </a>
                    <a class="btn btn-outline-dark me-2" href="#">
                        <i class="bi bi-person"></i> 
                    </a>
                </form>
            </div>
        </div>
    </nav></body></html><!-- Navigation -->
 