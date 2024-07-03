<?php 
include 'constand.php';
class Database{
    private $hostname =SEVERNAME;
    private $username =USERNAME;
    private $pwd= PASSWORD;
    private $DB=DATABASE;
    private $conn;

    public function connect(){
        $this->conn= mysqli_connect($this->hostname,$this->username,$this->pwd,$this->DB);
        if($this->conn->connect_error){
            die("Không thể kết nối tới Database: '$this->DB'");
        }
        return $this->conn;
    }

    // Cai nay la ep dinh dang 
    public function real_escape_string($string) {
        return $this->conn->real_escape_string($string);
    }
    public function insertData($name,$type_id,$color,$size,$cost,$amount,$discount,$img){
        $sql= "INSERT INTO product(Name,Type_id,Color,Size,Color,Amount,Discount,img)
                VALUES ($name, $type_id, $color, $size, $cost, $amount, $discount,$img)";
         if ($this->conn->query($sql) === TRUE) {
            echo "
<script>
        alert("+"Product inserted successfully!"+");
        window.location.href = "+"add.php"+"; // Redirect back to add product page
    </script>
            ";
        } else {
            echo "Error: " . $sql . "<br>" . $this->conn->error;
        }
        
    }
    public function closedDB(){
        mysqli_close($this->conn);
    }
        public function query($sql){
            if (!$this->conn) {
                $this->connect();
            }
            $query=mysqli_query($this->conn,$sql);
            if (!$query) {
                die('Query Error: ' . mysqli_error($this->conn));
            }
            return $query;
        }
    public function query1($sql) {
        $stmt = $this->conn->prepare($sql);
        if (!$stmt) {
            die('Prepare Statement Error: ' . $this->conn->error);
        }
        return $stmt;
    }
}
$db =new Database();
$db->connect();
class Product extends Database{
    public $id;
    private $name;
    private $color;
    private $cost;
    private $discount;
    private $img;
    private $data;
    public function __construct1() {
        $this->data = new Database();
        $this->data->connect();
    }
    public function getinforQuantity($id){
       $sql123="SELECT * FROM product WHERE id_product ='".$id."'";
       $result = $this->query($sql123);
       if ($result->num_rows > 0) {
           $data = array();
           while ($row = $result->fetch_assoc()) {
               $data[] = $row;
           }
           return $data[0]['Amount'];
       } else {
           return null;
       }
    }
    public function updateQuantity($id,$quantity){
        $product=new Product();
        $amountpro= $product->getinforQuantity($id);
        if($amountpro <=0){
            echo " <script>alert('id ".$id." nay co san = 0 nen khong the update');</script>";
        }else{
            $quantity=$amountpro-$quantity;
            $sql="UPDATE `product` SET `Amount` = '$quantity' WHERE `product`.`id_product` = '".$id."'";
            $result=$this->query($sql);
            // cai nay xoa cung dc
            // if($result==TRUE){
            //     echo "<script>alert('Sua thanh cong ".$id."');</script>";
            // }else{
            //     echo " Ko sua dc";
            // }
        }
    }
}
class Cart{
    private $cartItems; 
    public function addToCart($productId) {
        // Example: In a real scenario, you would fetch product details from the database
        // Replace with your actual database query
        $product = $this->getProductById($productId);

        if ($product) {
            $this->cartItems[] = $product->id;
            return true;
        }
        return false;
    }
    private function getProductById($productId) {
        // Example: Fetch product details from database based on $productId
        // Replace with your actual database query
        // For demonstration, creating a dummy product
        $dummyProduct = new Product($productId, "Product $productId", "Color", 10, 0, "img.jpg");
        return $dummyProduct;
    }
    public function insertBill($id_bill,$id_sp,$amount,$cost,$ngtao){
        $sql="INSERT INTO bill_detail(id_billl,id_sp,amount,cost,date)
                VALUES ($id_bill,$id_sp,$amount,$cost,'$ngtao');
        ";
        $data =new Database();
        $data->connect();
        $result=$data->query($sql);
        // cai nay xoa cung dc
        // if($result===TRUE){
        //     echo '
        //     <script>
        //             alert("Bill inserted successfully!");
        //         </script>
        //                 ';
        // }
    }

    public function insertbilltong($idbill,$idcus,$id_sp,$amount,$total,$status,$ngtao,$address,$description){
        $sql="INSERT INTO bill(id_Bill,id_us,id_sp,count,Total,status,date,address,note)
            VALUES ($idbill,$idcus,$id_sp,$amount,$total,$status,'$ngtao','$address','$description')";
        $data =new Database();
        $data->connect();
        $result=$data->query($sql);
        // cai nay xoa cung dc
        // if($result===TRUE){
        //     echo '
        //     <script>
        //             alert("Thanh toan  cong");
        //         </script>
        //                 ';
        //     // header ("Location: projecte/view/User/thanks.php");
        // }
    }
    public function updatethanhtoan($idcus,$amount,$total,$status,$ngtao){
        $sql ="Update bill set count = '$amount',Total= '$total',";
    }
}
class Customer{
    private $idcus;
    private $name;
    private $data;
    private $phone;
    private $address;
    private $email;
    public function __construct() {
        $this->data = new Database();
        $this->data->connect();
    }
    public function getinforcus($idcustomer){
        $sql= "select * from user where id_user = $idcustomer";
        $result=$this->data->query( $sql);
        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        }
        return null;
    }
    public function getinforcusname($name,$address,$phone){
        $sql= "select * from user where Name = '$name' and Address = '$address'";
        $result=$this->data->query( $sql);
        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        }
        return null;
    }
    public function getIDcus($name,$address,$phone){
        $sql= "select id_user from user where Name = '$name' and Address = '$address'";
        $result=$this->data->query( $sql);
        if ($result->num_rows > 0) {
            $user1=[];
            while($row=$result->fetch_assoc()){
                $user1[]=$row;
            }
            return $user1;
        }
        return null;
    }
    public function displayCustomerInfo($idcustomer) {
        $customerInfo = $this->getinforcus($idcustomer);
        if ($customerInfo) {
            foreach ($customerInfo as $info) {
                echo $info . "<br>";
            }
            // Thêm các trường thông tin khác theo yêu cầu
        } else {
            echo "Customer not found.";
        }
    }
    public function deletedCustomer($id,$name){
        $sql= 'DELETE FROM user WHERE user.id_user ='."$id" ;
    $result= $this->data->query($sql);
    if($result===TRUE){
        echo '
        <script>alert("Xoa thanh cong'.$name.'") </script> 
        ';
    }else{
        echo '
        <script>alert("Khong the xoa") </script> 
        ';
    }
    }
    public function updateCustomer($id,$name,$phone,$address,$pass,$pass1,$account){
        $sql_check = "SELECT * from user where Login_name = '$account' and id_user <> '$id'";
        $result_check = $this->data->query($sql_check);
        if ($result_check->num_rows > 0){
            echo '<script>
                alert("Tên đăng nhập đã tồn tại");
                window.location.href="update_customer.php";
              </script>'; 
        }
        if($pass !=$pass1){
            echo '
            <script>alert("Vui lòng nhập lại mật khẩu") </script> 
            ';
        }else{
            $sql ="UPDATE `user` SET `Name` = '$name',Address='$address',Phone_Num='$phone',
            pass='$pass',Login_name='$account'
             WHERE `user`.`id_user` = '$id'";
             $result=$this->data->query($sql);
             if($result===TRUE){
                echo '<script>
                alert("Cập nhật thông tin người dùng '.$name.' thành công");
                window.location.href="customer.php";
              </script>';
             }else{
                echo '<script>
                alert("Cập nhật thông tin người dùng '.$name.' thất bại");
                window.location.href="update_customer.php";
              </script>';
             }
        }
    }
}


?>