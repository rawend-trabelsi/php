<!-- application/views/parfums/create.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Perfume</title>
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

        /* Additional styles for the content */
        label {
            margin-top: 10px;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            box-sizing: border-box;
        }

        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            box-sizing: border-box;
        }

        select {
            width: 100%;
            padding: 10px;
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
        <h2>Ajouter parfum</h2>

        <?php echo validation_errors(); ?>

        <!-- Add enctype attribute for handling file uploads -->
        <form action="<?= base_url('parfums/store') ?>" method="post" enctype="multipart/form-data">

            <label for="nom">Nom parfum</label>
            <input type="text" name="nom" id="nom" value="<?= set_value('nom') ?>">

            <!-- Use input type="file" for image upload -->
            <label for="image">Image</label>
            <input type="file" name="image" id="image">

            <label for="prix">Prix</label>
            <input type="text" name="prix" id="prix" value="<?= set_value('prix') ?>">

            <label for="description">Description</label>
            <textarea name="description" id="description"><?= set_value('description') ?></textarea>

            <label for="categorie">Categorie</label>
            <select name="categorie" id="categorie">
                <option value="">Select a Category</option>
                <?php foreach ($categories as $category): ?>
                    <option value="<?= $category->id ?>"><?= $category->nom ?></option>
                <?php endforeach; ?>
            </select>

            <!-- Add more input fields for other properties -->

            <button type="submit">ajouter parfum</button>
        </form>

        <a href="<?= base_url('parfums') ?>">retourner aux  Parfums</a>

    </div>

    

</body>
</html>
