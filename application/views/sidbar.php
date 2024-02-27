<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Side Navigation Bar</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <script src="https://kit.fontawesome.com/b99e675b6e.js">
       
      
    </script>
    <style>

@import url('https://fonts.googleapis.com/css?family=Josefin+Sans&display=swap');

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    list-style: none;
    text-decoration: none;
    font-family: 'Josefin Sans', sans-serif;
}

body {
    background-color: #f3f5f9;
}

.wrapper {
    display: flex;
    position: relative;
}

.wrapper .sidebar {
    width: 200px;
    height: 100%;
    background: #4b4276;
    padding: 30px 0;
    position: fixed;
    transition: width 0.3s ease; /* Add a transition property */
}

.wrapper .sidebar h2 {
    color: #fff;
    text-transform: uppercase;
    text-align: center;
    margin-bottom: 30px;
}

.wrapper .sidebar ul li {
    padding: 15px;
    border-bottom: 1px solid #bdb8d7;
    border-bottom: 1px solid rgba(0, 0, 0, 0.05);
    border-top: 1px solid rgba(255, 255, 255, 0.05);
}

.wrapper .sidebar ul li a {
    color: #bdb8d7;
    display: block;
}

.wrapper .sidebar ul li a .fas {
    width: 25px;
}

.wrapper .sidebar ul li:hover {
    background-color: #594f8d;
}

.wrapper .sidebar ul li:hover a {
    color: #fff;
}

.wrapper .sidebar .social_media {
    position: absolute;
    bottom: 0;
    left: 50%;
    transform: translateX(-50%);
    display: flex;
}

.wrapper .sidebar .social_media a {
    display: block;
    width: 40px;
    background: #594f8d;
    height: 40px;
    line-height: 45px;
    text-align: center;
    margin: 0 5px;
    color: #bdb8d7;
    border-top-left-radius: 5px;
    border-top-right-radius: 5px;
}

.wrapper .main_content {
    width: 100%;
    margin-left: 200px;
    min-height: 100vh;
    background-color: #f3f5f9;
    transition: all 0.3s;
}

.wrapper.active .sidebar {
    width: 0; /* Adjust the width when the sidebar is active */
}

.wrapper.active .main_content {
    width: calc(100% - 200px);
    margin-left: 200px;
}

.wrapper .main_content .header {
    padding: 20px;
    background: #fff;
    color: #717171;
    border-bottom: 1px solid #e0e4e8;
}

.wrapper .main_content .info {
    margin: 20px;
    color: #717171;
    line-height: 25px;
}

.wrapper .main_content .info div {
    margin-bottom: 20px;
}

.logo img {
    width: 200px;
    height: auto;
    margin-bottom: 100px;
}

/* Responsive Styles */
@media screen and (max-width: 768px) {
    .wrapper .sidebar {
        width: 0;
        padding: 10px 0;
    }

    .wrapper.active .main_content {
        width: 100%;
        margin-left: 0;
    }
}
</style>
<body>

<div class="wrapper">
    <div class="sidebar">
        <div class="logo">
            <img src="<?= base_url('assets/images/logo.png') ?>" alt="Logo" style="width: 200px; margin-bottom: 20px;">
        </div>

        <ul>
        
            <li><a href="<?= base_url('Home/index') ?>"><i class="fas fa-home"></i>Home</a></li>
            <li><a href="<?= base_url('admins/add_admin') ?>"><i class="fas fa-user"></i>Profile</a></li>
            <li><a href="<?= base_url('categories/index') ?>"><i class="fas fa-plus-circle"></i>Categories</a></li>
            <li><a href="<?= base_url('parfums') ?>"><i class="fas fa-box-open"></i> Parfums</a></li>
            <li><a href="<?= base_url('Order/display_table') ?>"><i class="fas fa-shopping-cart"></i>Orders</a></li>
            <li><a href="<?= base_url('contacts/index') ?>"><i class="fas fa-address-book"></i>Contacts</a></li>  <li><a href="<?= base_url('auth') ?>"><i class="fas fa-sign-out-alt"></i>LOG OUT</a></li>
        </ul>
    </div>
    
</div>

</body>
</html>
