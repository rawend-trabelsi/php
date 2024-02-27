<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Table de commandes</title>

    <style>
        body {
            margin: 0;
            padding: 0;
        }

        .sidebar {
            float: left;
        }

        #content {
            padding: 20px;
            box-sizing: border-box;
            margin-left: 200px; /* Ajustez en fonction de la largeur du sidebar */
        }

        table {
            width: 100%;
            margin-top: 15px;
            font-size: 12px;
            border-collapse: collapse; /* Fusionner les bordures des cellules */
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 15px;
            text-align: left;
        }

        th {
            background-color: #4b4276;
            color: white;
        }
    </style>
</head>
<body>

<div class="sidebar">
    <?php
   
        include(APPPATH . 'views/sidbar.php');
    
    ?>
</div>

<div id="content">
    <h1>Table des commandes</h1>
    <table>
        <thead>
        <tr>
            <th>Date de création</th>
            <th>Informations client</th>
            <th>Éléments du panier</th>
            <th>Total</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($Commandes as $row): ?>
            <tr>
                <td><?php echo $row->date_creation; ?></td>
                <td><?php echo $row->customer_data; ?></td>
                <td><?php echo $row->items; ?></td>
                <td><?php echo $row->total; ?></td> <!-- Afficher le total -->
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>

</body>
</html>
