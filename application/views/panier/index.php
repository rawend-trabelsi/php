<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout Cart</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        /* Additional Styles */
        nav {
            background-color: #ffe4e1;
        }

        /* Couleur de fond pour le pied de page */
        footer {
            background-color: #ffe4e1; /* Couleur rose clair (la même couleur que la barre de navigation) */
            padding: 20px 0;
            text-align: center;
        }

        /* Couleur de fond pour le corps de la page */
        body {
            background-color: #fffaf0; /* Une teinte légèrement plus claire que la barre de navigation et le pied de page */
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .container {
            flex: 1;
        }

        h2 {
            margin-top: 20px;
        }

        .cart-table {
            margin-top: 20px;
        }

        .total-section {
            margin-top: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .total-section p {
            font-size: 18px;
            font-weight: bold;
        }

        .btn-outline-dark {
            margin-top: 10px;
        }
    </style>
</head>

<body>

    <?php
    // Include navigation
    include(APPPATH . 'views/utilisateur/navigation.php');
    ?>

    <div class="container">
        <h2>Panier</h2>
        <div class="table-responsive">
        <table class="table table-bordered cart-table">
            <thead>
                <tr>
                    <th>Nom de produit</th>
                    <th>prix unitaire</th>
                    <th>Quantite </th>
                    <th>Totale</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($items as $item): ?>
                    <tr>
                        <td><?= isset($item['nom']) ? $item['nom'] : 'N/A'; ?></td>
                        <td><?= isset($item['prix_unitaire']) ? 'dt' . $item['prix_unitaire'] : 'N/A'; ?></td>
                        <td>
                            <input type="number" name="quantity[]" value="<?= isset($item['quantite']) ? $item['quantite'] : 1; ?>" min="1">
                        </td>
                        <td><?= isset($item['prix_unitaire']) && isset($item['quantite']) ? 'dt' . ($item['prix_unitaire'] * $item['quantite']) : 'N/A'; ?></td>
                        <td>
                            <a href="<?= site_url('panier/annuler_item/' . $item['id']); ?>" class="btn btn-danger cancel-btn">
                                <i class="bi bi-x"></i> <!-- Bootstrap Icons 'x' for cancel -->
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        </div>
        <div class="total-section">
            <p>Total: dt<?= isset($total) ? number_format($total, 2) : '0.00'; ?></p>
            <a href="<?= site_url('commande/index'); ?>" class="btn btn-outline-dark">Commander</a>
            <!-- Continue Shopping button -->
            <a href="<?= site_url('welcome/index'); ?>" class="btn btn-outline-dark">Continue Shopping</a>
        </div>

    </div>

    <?php
    // Include footer
    include(APPPATH . 'views/utilisateur/footer.php');
    ?>

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</body>

</html>
