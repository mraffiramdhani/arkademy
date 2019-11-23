<?php

    include 'controller/connection.php';

    $conn = Open();

    if(isset($_POST['submit'])){
        $name = $_POST['product_name'];
        $price = $_POST['product_price'];
        $category = $_POST['category'];
        $cashier = $_POST['cashier'];
        $id = $_POST['id'];
        mysqli_query($conn, "UPDATE product SET name = '$name' ,price = $price ,id_category = $category ,id_cashier = $cashier WHERE id = $id");
        header("location:index.php");
    }

    Close($conn);
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>ARKADEMY COFFEE SHOP</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
        .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      .text-pink{
        color: #ff59b2;
      }

      .btn-pink{
        background-color: #ff59b2;
      }

      .table-head-grey{
        background-color: #c2c2c2;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
</head>

<body>
    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
        <a class="navbar-brand" href="index.php">
            <img src="images/brand.png" height="30" alt="">
        </a>
        <h5 class="my-0 mr-md-auto font-weight-normal"><span class="text-pink">ARKADEMY</span> COFFEE SHOP</h5>
    </div>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                Create New Data
            </div>
            <div class="card-body">
                <form action="edit.php" method="POST">
                    <?php 
                        $id = $_GET['id'];

                        $query = "SELECT c.name AS cashier,c.id AS cashier_id,a.name AS product,b.name AS category,b.id AS category_id,a.price FROM product AS a JOIN category AS b ON a.id_category = b.id JOIN cashier AS c ON a.id_cashier = c.id WHERE a.id = $id";

                        $result = mysqli_query(Open(), $query);

                        while($row = mysqli_fetch_array($result))
                        {                        
                    ?>
                    <input type="hidden" name="id" value="<?= $id ?>">
                        <div class="form-group">
                            <label for="cashier">Cashier</label>
                            <select class="form-control" id="cashier" name="cashier">
                                <option value="<?= $row['cashier_id'] ?>"><?= $row['cashier'] ?></option>
                                <?php 
                                    $q = "SELECT id, name FROM cashier";
                                    $d = mysqli_query(Open(), $q);
                                    while($key = mysqli_fetch_array($d)){
                                ?>
                                <option value="<?= $key['id'] ?>">
                                    <?= $key['name'] ?>
                                </option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="product">Product</label>
                            <input type="text" id="product_name" name="product_name" class="form-control" value="<?= $row['product'] ?>">
                        </div>
                        <label for="product_price">Price</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Rp.</span>
                            </div>
                            <input type="text" class="form-control" id="product_price" name="product_price" value="<?= $row['price'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="category">Category</label>
                            <select class="form-control" id="category" name="category">
                                <option value="<?= $row['category_id'] ?>"><?= $row['category'] ?></option>
                                <?php 
                                    $q = "SELECT id, name FROM category";
                                    $d = mysqli_query(Open(), $q);
                                    while($key = mysqli_fetch_array($d)){
                                ?>
                                <option value="<?= $key['id'] ?>">
                                    <?= $key['name'] ?>
                                </option>
                                <?php } ?>
                            </select>
                        </div>
                        <?php } ?>
                    <div class="modal-footer">
                        <a href="index.php" type="button" class="btn btn-danger">Back</a>
                        <button type="submit" class="btn btn-primary" name="submit">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/app.js"></script>
</body>

</html>