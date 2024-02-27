<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfumes</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
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



        .table th,
        .table td {
            text-align: center;
        }

        .btn-action {
            margin-right: 5px;
        }

        .btn-primary {
            background-color: #007bff;
            color: #fff;
            border: none;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .btn-success {
            background-color: #28a745;
            color: #fff;
            border: none;
        }

        .btn-success:hover {
            background-color: #218838;
        }

        .btn-warning {
            background-color: #ffc107;
            color: #212529;
            border: none;
        }

        .btn-warning:hover {
            background-color: #d39e00;
        }

        .btn-danger {
            background-color: #dc3545;
            color: #fff;
            border: none;
        }

        .btn-danger:hover {
            background-color: #c82333;
        }
    </style>
</head>

<body>
    <?php $this->load->view('sidbar'); ?>
    <div id="content">
        <h1>Parfums</h1>

        <form action="<?= base_url('parfums') ?>" method="get" class="mb-3">
            <div class="input-group">
                <input type="text" name="search" id="search" class="form-control" placeholder="Search" value="<?= isset($search) ? $search : '' ?>">
                <div class="input-group-append">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
                </div>
            </div>
        </form>

        <a href="<?= base_url('parfums/create') ?>" class="btn btn-success mb-3"><i class="fas fa-plus"></i> Ajouter parfum</a>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Image</th>
                    <th>Prix</th>
                    <th>Description</th>
                    <th>Categorie</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($perfumes as $perfume) : ?>
                    <tr>
                        <td><?= $perfume->id ?></td>
                        <td><?= $perfume->nom ?></td>
                        <td><img src="<?= base_url('uploads/' . $perfume->image) ?>" alt="Perfume Image" style="max-width: 100px;"></td>
                        <td><?= $perfume->prix ?></td>
                        <td><?= $perfume->description ?></td>
                        <td><?= $perfume->categorie_id ?></td>
                        <td>
                            <a href="<?= base_url('parfums/edit/' . $perfume->id) ?>" class="btn btn-warning btn-action"><i class="fas fa-edit"></i> Edit</a>
                            <a href="<?= base_url('parfums/delete/' . $perfume->id) ?>" onclick="return confirm('Are you sure you want to delete this perfume?')" class="btn btn-danger btn-action"><i class="fas fa-trash"></i> Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</body>

</html>