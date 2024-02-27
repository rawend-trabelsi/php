<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resulta recherché</title>
    <style>
        body {
            background-color: #fffaf0;
        }

        .navbar {
            background-color: #ffe4e1;
        }

        footer {
            background-color: #ffe4e1;
            padding: 20px 0;
            text-align: center;
        }

        .container {
            margin-top: 20px;
        }

        h2 {
            margin-bottom: 20px;
        }

        .list-group-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 10px;
            padding: 10px;
            border: 1px solid #e0e0e0;
            border-radius: 5px;
        }

        .list-group-item img {
            max-width: 100px;
            margin-right: 20px;
        }
    </style>
</head>

<body>
    <?php include('navigation.php'); ?>

    <div class="container">
        <h2>Resultat cherché</h2>

        <?php if (!empty($parfums)): ?>
            <div class="list-group">
                <?php foreach ($parfums as $parfum): ?>
                    <div class="list-group-item">
                        <img src="<?= base_url('uploads/' . $parfum->image); ?>" alt="<?= $parfum->nom; ?>" width="100">
                        <span><?= $parfum->nom; ?></span>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <p>aucune resultat trouvé.</p>
        <?php endif; ?>
    </div>

    <?php include('footer.php'); ?>
</body>

</html>
