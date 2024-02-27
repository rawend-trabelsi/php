<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories</title>

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

        .table th, .table td {
            text-align: center;
        }

        .btn-action {
            margin-right: 5px;
        }
    </style>
</head>
<body>

    <?php $this->load->view('sidbar'); ?>

    <div id="content">
        <h1>Categories</h1>

        <form action="<?= base_url('categories/index') ?>" method="get" class="mb-3">
            <div class="input-group">
                <input type="text" name="search" id="search" class="form-control" placeholder="Search" value="<?= isset($search) ? $search : '' ?>">
                <div class="input-group-append">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
                </div>
            </div>
        </form>

        <a href="<?= base_url('categories/create') ?>" class="btn btn-success mb-3"><i class="fas fa-plus"></i> ajouter Categorie</a>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($categories as $category): ?>
                    <tr>
                        <td><?= $category->id ?></td>
                        <td><?= $category->nom ?></td>
                        <td>
                            <a href="<?= base_url('categories/edit/' . $category->id) ?>" class="btn btn-warning btn-action"><i class="fas fa-edit"></i> Edit</a>
                            <a href="<?= base_url('categories/delete/' . $category->id) ?>" onclick="return confirm('Are you sure you want to delete this category?')" class="btn btn-danger btn-action"><i class="fas fa-trash"></i> Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
