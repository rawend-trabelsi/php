<!-- File: application/views/contacts/index.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact List</title>

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
        <h1>Liste de contact</h1>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NOM</th>
                    <th>PRENOM</th>
                    <th>Email</th>
                    <th>TELEPHONE</th>
                    <th>Message</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($contacts as $contact): ?>
                    <tr>
                        <td><?= $contact->id ?></td>
                        <td><?= $contact->first_name ?></td>
                        <td><?= $contact->last_name ?></td>
                        <td><?= $contact->email ?></td>
                        <td><?= $contact->phone ?></td>
                        <td><?= $contact->message ?></td>
                        <td>
                            <!-- Add action buttons here -->
                            <!-- For example, you can add an "Edit" and "Delete" button -->
                           
                            <a href="<?= base_url('contacts/delete/' . $contact->id) ?>" onclick="return confirm('Are you sure you want to delete this contact?')" class="btn btn-danger btn-action"><i class="fas fa-trash"></i> Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
