<?php 
include '../../App/connect.php';
$data=new Database();
$customer1=new Customer();
$cartcus=new Cart();
$productdb=new Product();
session_start();
date_default_timezone_set('Asia/Ho_Chi_Minh');
$currentDate=date("Y-m-d");
$currentDate1=date("Y-m-d H:i:s");
$thanhthoan=0;
echo $currentDate ."<br>";

$cart=$_SESSION['cart'];
echo "<pre>";
print_r($cart);
echo "</pre>";
echo $_POST['tong']."<br>".$_POST['sum'];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy giá trị của input radio

    if(isset(($_POST['city'])) ){
        if(isset($_POST['mytextarea']) && ($_POST['mytextarea'] != '')){
    
            $address1= "Địa chỉ:".$_POST['mytextarea'].":---".$_POST['city']."-".$_POST['distric']."-".$_POST['village']."-";
        }else{
            $address1= "Địa chỉ:".":::".$_POST['city']."-".$_POST['distric']."-".$_POST['village']."-";
            
        }
    }else{
        $address1="ko co dia chi";
    }
    if (isset($_POST['payment-1'])) {
        $radioValue = $_POST['payment-1'];
        if(isset($_POST['thanhtoan123'])){
            echo $_POST['name-user'] ."<br>";
            $_SESSION['tong']=$_POST['tong'];
            print_r($_SESSION['cart']);
            echo "<br>" .$_POST['name-cus']. "<br>";
            $namecus=$_POST['name-cus'];
            $phonecus=$_POST['phone'];
            echo $phonecus . "<br><br>";
            if($_SESSION['idcus']==0){
                $sql="INSERT INTO user(Name,Address,Phone_Num) VALUES('".$namecus."','".$address1."','".$phonecus."')";
                $result=$data->query($sql);
                if($result==true){
                    echo '<script>
                    alert("Thêm thành công sản phẩm '.$_POST['name-cus'].'");
                    </script>';
                    $infor1=$customer1->getIDcus($namecus,$address1,$phonecus);
                    foreach ($infor1 as $item1){
                        $row1=$item1['id_user'];
                    }
                }
            }else{
                if(($radioValue == 'QR-MOMO') || ($radioValue == 'ATM-MOMO')){
                    $thanhthoan=0;
                }else{
                    $thanhthoan=1;
                }
                $row1=$_SESSION['idcus'];
            }
            
        // Xử lý dữ liệu theo giá trị của input radio
        $_SESSION['address']=$address1;
        if ($radioValue == 'QR-MOMO') {
            // Nếu chọn thanh toán bằng MOMO
            // Thực hiện các hành động tương ứng
            $cart_code="select * from bill order by bill.id_Bill  LIMIT 25";
            $result12=$data->query($cart_code);
            if($result12->num_rows >0){
                while($row=mysqli_fetch_assoc($result12)){
                    $idbill1=$row['id_Bill'];
                }
            }
            $idbillnew=$idbill1+1;
            $result= $cartcus->insertbilltong($idbillnew,$row1,'2',$_POST['sum'],$_POST['tong'],1,$currentDate,$address1,$_POST['mytextarea']);
            foreach($cart as $item){
               
                $cartcus->insertBill($idbillnew,$item['id_product'],$item['Quantity'],$item['Cost'],$currentDate1);
                $productdb->updateQuantity($item['id_product'],$item['Quantity']);
            }
            echo "<script> 
            alert('Bạn đã chọn thanh toán QR-MOMO. Dữ liệu sẽ được chuyển đến trang thanh toán QR-MOMO.);
            </script>";
            header("Location: qr-momo.php");
            exit();
            // Tiếp tục xử lý hoặc chuyển hướng đến trang thanh toán MOMO
        } elseif($radioValue == 'ATM-MOMO') {
            // Xử lý các trường hợp khác
            $cart_code="select * from bill order by bill.id_Bill  LIMIT 25";
            $result12=$data->query($cart_code);
            if($result12->num_rows >0){
                while($row=mysqli_fetch_assoc($result12)){
                    $idbill1=$row['id_Bill'];
                }
            }
            $idbillnew=$idbill1+1;
            $result= $cartcus->insertbilltong($idbillnew,$row1,'2',$_POST['sum'],$_POST['tong'],1,$currentDate,$address1,$_POST['mytextarea']);
            foreach($cart as $item){
                $cartcus->insertBill($idbillnew,$item['id_product'],$item['Quantity'],$item['Cost'],$currentDate1);
                $productdb->updateQuantity($item['id_product'],$item['Quantity']);
            }
            echo "<script> 
            alert('Bạn đã chọn thanh toán ATM-MOMO. Dữ liệu sẽ được chuyển đến trang thanh toán ATM-MOMO.);</script>";
            header("Location: atm-momo.php");
            exit();
        }else{
            $cart_code="select * from bill order by bill.id_Bill  LIMIT 25";
            $result12=$data->query($cart_code);
            if($result12->num_rows >0){
                while($row=mysqli_fetch_assoc($result12)){
                    $idbill1=$row['id_Bill'];
                }
            }
            $idbillnew=$idbill1+1;
            $result= $cartcus->insertbilltong($idbillnew,$row1,2,$_POST['sum'],$_POST['tong'],0,$currentDate,$address1,$_POST['mytextarea']);
            foreach($cart as $item){
                $cartcus->insertBill($idbillnew,$item['id_product'],$item['Quantity'],$item['Cost'],$currentDate1);
                $productdb->updateQuantity($item['id_product'],$item['Quantity']);
            }
            echo "<script> 
            alert('Bạn đã chọn thanh toán Thanh toán khi nhận hàng. Dữ liệu sẽ được chuyển đến trang thanh toán Khi nhận hàng.);
            </script>";
            // header("Location:thanks.php");
        }
    } else {
        // Xử lý khi không có dữ liệu radio được gửi đi
        echo "Không có dữ liệu radio được gửi đi";
    }
// Kiểm tra xem có dữ liệu từ form gửi đi không

    }}
    //echo "id cua khac la". $row1;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container">ahahahjja
        s
    </div>
</body>
</html>