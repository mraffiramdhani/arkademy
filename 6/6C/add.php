<?php

    include 'controller/connection.php';

    $conn = Open();

    if(isset($_POST['submit'])){
        $name = $_POST['product_name'];
        $price = $_POST['product_price'];
        $category = $_POST['category'];
        $cashier = $_POST['cashier'];
        mysqli_query($conn, "INSERT INTO product (name,price,id_category,id_cashier) VALUES ('$name', $price, $category, $cashier) ");
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
        <button type="button" class="btn btn-pink text-white" id="open-create"><b>ADD</b></button>
    </div>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                Create New Data
            </div>
            <div class="card-body">
                <form action="add.php" method="POST">

                        <div class="form-group">
                            <label for="cashier">Cashier</label>
                            <select class="form-control" id="cashier" name="cashier">
                                <?php 
                                        $query = "SELECT id, name FROM cashier";
                                        $data = mysqli_query(Open(), $query);
                                        $no = 1;
                                        while($row = mysqli_fetch_array($data)){
                                    ?>
                                <option value="<?= $row['id'] ?>">
                                    <?= $row['name'] ?>
                                </option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="product">Product</label>
                            <input type="text" id="product_name" name="product_name" class="form-control" placeholder="Enter Product Name">
                        </div>
                        <label for="product_price">Price</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Rp.</span>
                            </div>
                            <input type="number" class="form-control" id="product_price" name="product_price" placeholder="Enter Product Price">
                        </div>
                        <div class="form-group">
                            <label for="category">Category</label>
                            <select class="form-control" id="category" name="category">
                                <?php 
                                        $query = "SELECT id, name FROM category";
                                        $data = mysqli_query(Open(), $query);
                                        $no = 1;
                                        while($row = mysqli_fetch_array($data)){
                                    ?>
                                <option value="<?= $row['id'] ?>">
                                    <?= $row['name'] ?>
                                </option>
                                <?php } ?>
                            </select>
                        </div>
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="submit">Confirm</button>
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