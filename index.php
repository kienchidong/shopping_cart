<?php
    session_start();
    require_once ('template/database.php');
    $database = new Database();
    $tong=0;
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Giỏ hàng đơn giản</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style2.css">

</head>
<body>
<div class="container">
    <h2>Giỏ hàng</h2>
    <p>Chi tiết giỏ hàng</p>
    <table class="table">
        <thead>
        <tr>
            <th>id sản phẩm</th>
            <th>Tên sản phẩm</th>
            <th>Hình ảnh</th>
            <th>Giá tiền</th>
            <th>Số lượng</th>
            <th>Thành tiền</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>

        <?php if ($_SESSION) :?>

            <?php foreach ($_SESSION['dulieu'] as $key => $cart) :
                $tong= $tong + $cart['price'] * $cart['quantity']

                ?>
                <tr>
                    <td><?php echo $cart['id'] ?></td>
                    <td><?php echo $cart['product_name'] ?></td>
                    <td><?php echo $cart['product_image'] ?></td>
                    <td><?php echo number_format($cart['price'],0)." VND" ?></td>
                    <td><?php echo $cart['quantity'] ?></td>
                    <td><?php echo number_format(($cart['price'] * $cart['quantity']),0)." VND" ?></td>
                    <td>
                        <form name="remove<?php echo $cart['id']; ?>" action="process.php" method="post">
                            <input type="hidden" name="id" value="<?php echo $cart['id'];?>">
                            <input type="hidden" name="action" value="delete">
                            <input  type="submit" name="xoa" class="btn btn-sm btn-outline-secondary xoa" value="Xóa">
                        </form>
                    </td>
                </tr>


            <?php endforeach; ?>
        <?php endif; ?>
        </tbody>
    </table>
    <div>
        Tổng hóa đơn thành toán: <strong><?php echo number_format($tong, 0) ." VND"; ?></strong>
    </div>
    <div>
        <form name="remove<?php echo $cart['id']; ?>" action="process.php" method="post">
            <input type="hidden" name="action" value="thanhtoan">
            <input  type="submit" name="thanhtoan" class="btn btn-sm btn-outline-secondary" value="Tiến hành thanh toán">
        </form>
    </div>
    <div class="row">
        <?php
        $sql="SELECT * FROM products";
        $products = $database->runQuery($sql);

        ?>
        <?php if ($products) :?>

            <?php foreach ($products as $product) :?>
            <div class="col-sm-4">
                <div class="hang">
                    <form name="<?php echo $product['product_name'];?>" action="process.php" method="post">
                    <div class="card mb-4 box-shadow">
                        <img class="card-img-top" style="height: 315px; width: 100%; display: block;" src="images/products/<?php echo $product['product_image'];?>" data-holder-rendered="true" title="<?php echo '  Giá: '.number_format($product['price'],0)." VND"; ?>">                    <div class="card-body">
                            <p class="card-text" style="font-weight: bold"><?php echo $product['product_name'];?></p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="form-inline">
                                    <input type="number" class="form-control" name="quantity" value="1"><br>
                                    <input type="hidden" name="action" value="add">
                                    <input type="hidden" name="id" value="<?php echo $product['id'];?>">
                                    <input  type="submit" name="submit" class="btn btn-sm btn-outline-secondary" value="Thêm vào giỏ hàng"><i class="fas fa-plus-square"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                </div>
            </div>

            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>

<div class="container">

</div>
</body>
</html>