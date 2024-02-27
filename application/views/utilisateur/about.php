<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>À propos de nous - Prestige Parfums</title>
    <!-- Lien vers Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        body {
            background-color: #fffaf0;
        }

        .navbar {
            background-color: #ffe4e1;
        }

        .header {
            background-color: #343a40;
            color: #ffffff;
            padding: 20px;
            text-align: center;
        }

        .content {
            padding: 20px;
        }

        .logo {
            max-width: 150px;
            margin: 20px 0;
        }

        .team-member {
            text-align: center;
            margin-bottom: 30px;
        }

        .team-member img {
            max-width: 150px;
            border-radius: 50%;
            margin-bottom: 15px;
        }
    </style>
</head>

<body>
    <!-- Barre de Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="#">Prestige Parfums</a>
        </div>
    </nav>

    <!-- En-tête -->
    <div class="header">
        <h1>À propos de Prestige Parfums</h1>
    </div>

    <!-- Contenu -->
    <div class="container content">
        <div class="row">
            <div class="col-md-6">
                <img src="<?= base_url('assets/images/logo.png'); ?>" alt="Logo Prestige Parfums" class="logo img-fluid">
            </div>
            <div class="col-md-6">
                <h2>Notre Histoire</h2>
                <p>En 2024, Rawend a créé Prestige Parfums avec une passion pour offrir une expérience olfactive
                    exceptionnelle. Notre boutique propose une sélection exquise de parfums, soigneusement choisie pour
                    capturer l'essence de la sophistication et du raffinement.</p>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-md-12">
                <h2>Notre Équipe</h2>
            </div>
            <div class="col-md-4 team-member">
                <img src="<?= base_url('assets/images/p2.png'); ?>" alt="Membre de l'équipe"
                    class="img-fluid rounded-circle">
                <h4>Emma Thompson</h4>
                <p>Experte en Parfumerie</p>
            </div>
            <div class="col-md-4 team-member">
                <img src="<?= base_url('assets/images/p.png'); ?>" alt="Membre de l'équipe"
                    class="img-fluid rounded-circle">
                <h4>Lucas Martin</h4>
                <p>Conseiller Clientèle</p>
            </div>
            <div class="col-md-4 team-member">
                <img src="<?= base_url('assets/images/p.png'); ?>" alt="Membre de l'équipe"
                    class="img-fluid rounded-circle">
                <h4>Isabella Rodriguez</h4>
                <p>Responsable Marketing</p>
            </div>
        </div>
    </div>

    <!-- Lien vers Bootstrap JS et les dépendances (jQuery, Popper.js) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>
