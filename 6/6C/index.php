<?php
    include 'controller/connection.php';

    $conn = Open();

    if(isset($_GET['delete_id'])){
        $id = $_GET['delete_id'];
        mysqli_query($conn, "DELETE FROM product WHERE id = $id");
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
        <a href="add.php" class="btn btn-pink text-white"><b>ADD NEW DATA</b></a>
    </div>
    <div class="container mt-5">
        <table class="shadow rounded-lg text-center table table-borderless">
            <thead class="table-head-grey text-white">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Cashier</th>
                    <th scope="col">Product</th>
                    <th scope="col">Category</th>
                    <th scope="col">Price</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $query = "SELECT a.id,c.name AS cashier,a.name AS product,b.name AS category,a.price FROM product AS a JOIN category AS b ON a.id_category = b.id JOIN cashier AS c ON a.id_cashier = c.id";
                    $data = mysqli_query(Open(), $query);
                    if(mysqli_num_rows($data) == 0){
                ?>
                <tr>
                    <td colspan="6">Data not Found</td>
                </tr>
                <?php
                    }else{
                        $no = 1;
                        while($row = mysqli_fetch_array($data)){
                ?>
                <tr>
                    <th scope="row">
                        <?php echo $no ?>
                    </th>
                    <td>
                        <?= $row['cashier'] ?>
                    </td>
                    <td>
                        <?= $row['product'] ?>
                    </td>
                    <td>
                        <?= $row['category'] ?>
                    </td>
                    <td>Rp.
                        <?= rupiah($row['price']) ?>
                    </td>
                    <td><a href="edit.php?id=<?= $row['id'] ?>" class="text-success">Edit</a> | <a href="javascript:void(0)" onclick="if(confirm('Are you sure ?')){window.location.href = 'index.php?delete_id='+<?= $row['id'] ?>; };" class="text-danger data-delete">Delete</a></td>
                </tr>
                <?php $no++;}} ?>
            </tbody>
        </table>
    </div>
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>

</body>

</html>