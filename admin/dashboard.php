<?php

include '../components/connect.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if (!isset($admin_id)) {
   header('location:admin_login.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Dashboard</title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <link rel="stylesheet" href="../css/admin_style.css">

</head>

<body>

   <?php include '../components/admin_header.php'; ?>

   <section class="dashboard">

      <h1 class="heading">Dashboard</h1>

      <div class="box-container">

         <div class="box">
            <h3>Welcome!</h3>
            <p><?= $fetch_profile['name']; ?></p>
            <a href="update_profile.php" class="btn">Update Profile</a>
         </div>

         <div class="box">
            <?php
            $select_products = $conn->prepare("SELECT * FROM `products`");
            $select_products->execute();
            $number_of_products = $select_products->rowCount()
            ?>
            <h3><?= $number_of_products; ?></h3>
            <p>Products added</p>
            <a href="products.php" class="btn">See products</a>
         </div>

         <div class="box">
            <?php
            $select_users = $conn->prepare("SELECT * FROM `users`");
            $select_users->execute();
            $number_of_users = $select_users->rowCount()
            ?>
            <h3><?= $number_of_users; ?></h3>
            <p>Normal users</p>
            <a href="users_accounts.php" class="btn">See Users</a>
         </div>

         <div class="box">
            <?php
            $select_admins = $conn->prepare("SELECT * FROM `admins`");
            $select_admins->execute();
            $number_of_admins = $select_admins->rowCount()
            ?>
            <h3><?= $number_of_admins; ?></h3>
            <p>Admin users</p>
            <a href="admin_accounts.php" class="btn">See admins</a>
         </div>

      </div>

   </section>












   <script src="../js/admin_script.js"></script>

</body>

</html>