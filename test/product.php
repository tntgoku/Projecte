<?php 
include '/xampp/htdocs/Projecte/App/connect.php';
$data=new Database();
$data->connect();
if(isset($_POST['btn-addpro'])){
    header("Location:add.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Danh sách sản phẩm</title>
    <link rel="stylesheet" href="admin.css">
</head>
<body>
    <div class="container">
        <h2>DANH SÁCH SẢN PHẨM</h2><br>
        <div class="container" style="display: flex; justify-content: space-between; margin-bottom: 10px;">
            <div class="col-6" style="display: flex;  justify-content: flex-start;">
    
                <form class="d-flex" role="search" style="width: 100%;">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                  </form>
    
            </div>
            <div class="col-6" style="display: flex; justify-content: space-around;">
                <?php   $toltal=$data->query('select count(*) as tong from product ');
                $result=$toltal->fetch_assoc();
                        echo "<h5> Có " .$result["tong"] ." Sản phẩm</h5> ";
                ?>
            </div>

        </div>
        <form action="" method="post" style=" margin-top:10px;">
            <button type="submit" class="btn btn-success" name="btn-add">Thêm sản phẩm</button>
            <table class="table">
                <thead> <tr>
                    <td>Mã sản phẩm</td>
                    <td>Hình ảnh</td>
                    <td>Tên</td>
                    <td>Loại áo</td>
                    <td>Màu sắc</td>
                    <td>Size</td>
                    <td>Giá</td>
                    <td>Số lượng</td>
                    <td>Giảm giá</td>
                    <td>Thao tác</td>
                </tr></thead>
                <tbody>
                    <?php 
                    $i=1;
                    $sql="select product.id_product ,product.img,product.Name,product_list.Type_name,product.Color,product.Size,product.Cost,
                    product.Amount,product.Discount FROM product INner JOIN product_list ON product_list.Type_id=product.Type_id
                    ORDER BY product.id_product DESC";
                    $result=$data->query($sql);
                        while($row =mysqli_fetch_assoc($result)){?>
                            <tr>
                                <td><?php  $id=$row['id_product'];
                                            echo $id;?></td>
                                <td><img src="/Projecte/img/item/<?php echo $row['img']?>" alt="123" width="60" style="object-fit: cover;"></td>
                                <td><?php echo $row['Name']?></td>
                                <td><?php echo $row['Type_name']?></td>
                                <td><?PHP echo $row['Color'] ?></td>
                                <td><?PHP echo $row['Size'] ?></td>
                                <td><?PHP echo $row['Cost'] ?></td>
                                <td><?PHP echo $row['Amount'] ?></td>
                                <td><?PHP echo $row['Discount'] ?></td>
                                <td><a href="update.php?id_product=<?php echo $row['id_product']?>"><button type="button" class="btn btn-success" name="update">Sửa</button></a></td>
                                <td><button type="button" class="btn btn-danger" name="deleted">Xóa</button></td>
                            </tr>
                        <?php
                        }
                    ?>
                </tbody>
            </table>

        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="scriptad.js"></script>
</body>
</html>
