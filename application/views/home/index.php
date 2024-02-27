<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Home</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- Custom Styles -->
    <style>
        body {
            background-color: #f8f9fa; /* Couleur de fond Bootstrap */
            margin: 0; /* Réinitialisation de la marge par défaut */
            padding: 0; /* Réinitialisation du padding par défaut */
        }

        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: 250px; /* Largeur de la barre latérale */
            height: 100%;
            color: white; /* Couleur du texte de la barre latérale */
           
            padding-top: 70px; /* Ajouter un padding en haut pour éviter le chevauchement avec la barre de navigation */
        }

        .content {
            margin-left: 250px; /* Assurer que le contenu ne chevauche pas la barre latérale */
            padding: 20px;
        }

        h2 {
            color: #007bff; /* Couleur bleue pour les titres */
        }
    </style>
</head>

<body>

    <div class="sidebar">
        <?php $this->load->view('sidbar'); ?>
    </div>

    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="d-flex justify-content-center align-items-center vh-100 flex-column">
                        <h2 class="mb-4">Bienvenue Admin!</h2>
                        <h2 class="mb-4">Système Prestiges Parfums</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS et Popper.js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Incluez vos scripts personnalisés ou bibliothèques JS ici -->
</body>

</html>
