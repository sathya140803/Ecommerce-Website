<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        .admin_img{
    width: 50px;
    height: 50px;
}
        </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../Style.css">
    <!-- Bootstrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Font Awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
</head>
<body>
    <div class="container-fluid p-0">
<nav class="navbar navbar-expand-lg navbar-light bg-info " >
<div class="container-fluid" alt=""class="logo">
</div>
</nav>
<!--second-->
<div class="bg-light">
    <h3 class="text-center p-2">Manage items</h3>
</div>
<!--third-->
<div class="row">
    <div class="col-md-12 bg-secondary p-1 ">
        <div>
            <a href="#">
                <img src="../logo.jpeg" alt="" alt=""class="admin_img">
            </a>
            <p class ="text-light text-center">Admin name</P>
        </div>
         <div class="button text-center">
           <button><a href="" class="nav-link text-light bg-info my-1">Insert game</a></button>
           <button><a href="" class="nav-link text-light bg-info my-1">View game</a></button>
           <button><a href="index.php?insert_category" class="nav-link text-light bg-info my-1">Insert categories</a></button>
           <button><a href="insert_game.php" class="nav-link text-light bg-info my-1">insert game</a></button>
           <button><a href="" class="nav-link text-light bg-info my-1">All orders</a></button>
           <button><a href="" class="nav-link text-light bg-info my-1">All payment</a></button>
           <button><a href="" class="nav-link text-light bg-info my-1">logout</a></button>
           
         </div>
    </div>
</div>

<div class="container my-5">
    <?php 
    if(isset($_GET['insert_category'])){
        include('insert_categories.php');
    }
    if(isset($_GET['insert_game'])){
        include('insert_game.php');
    }
    ?>
  </div>

</div>





<!-- Bootstrap JS Bundle (includes Popper) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>