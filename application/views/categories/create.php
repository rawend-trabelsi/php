<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Category</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <style> 
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
        }

        #sidebar {
            min-width: 200px;
            max-width: 280px;
            background: #4b4276;
            color: white;
            transition: all 0.3s;
            position: fixed;
            height: 100%;
            overflow-y: auto;
        }

        #sidebar.active {
            width: 280px;
        }

        #content {
            flex: 1;
            padding: 20px;
            margin-left: 200px;
            transition: all 0.3s;
        }

        #content.active {
            margin-left: 280px;
        }

        #sidebarCollapse {
            width: 40px;
            height: 40px;
            background-color: #343a40;
            color: #fff;
            cursor: pointer;
        }

        #sidebarCollapse:hover {
            background-color: #343a40;
            color: #fff;
        }

        /* Add any additional styles specific to your content */
        label {
            margin-top: 10px;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            box-sizing: border-box;
        }

        button {
            background-color: #343a40;
            color: #fff;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
        }

        a {
            color: #343a40;
            text-decoration: none;
            margin-top: 10px;
            display: inline-block;
        }
    </style>
</head>
<body>
    <?php $this->load->view('sidbar'); ?>
    <div id="content">
        <h2>nouveau categorie</h2>

        <?php echo validation_errors(); ?>

        <form action="<?= base_url('categories/store') ?>" method="post">
            <div class="form-group">
                <label for="nom">Nom categorie</label>
                <input type="text" class="form-control" name="nom" id="nom" value="<?= set_value('nom') ?>">
            </div>
            <button type="submit" class="btn btn-primary">ajouter</button>
        </form>

        <a href="<?= base_url('categories') ?>" class="btn btn-default">retourne aux Categories</a>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>
