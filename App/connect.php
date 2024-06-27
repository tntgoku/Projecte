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
class Product{
    public $id;
    public $name;
    public $color;
    public $cost;
    public $discount;
    public $img;
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
        $sql="INSERT INTO billall(id_bill,id_sp,amount,cost,ngtao)
                VALUES ($id_bill,$id_sp,$amount,$cost,'$ngtao');
        ";
        $data =new Database();
        $data->connect();
        $result=$data->query($sql);
        if($result===TRUE){
            echo '
            <script>
                    alert("Bill inserted successfully!");
                </script>
                        ';
        }
    }
    public function insertbilltong($idcus,$id_sp,$amount,$total,$status,$ngtao){
        $sql="INSERT INTO bill(id_us,id_sp,count,Total_payment,status,ngtao)
        VALUES ($idcus,$id_sp,$amount,$total,$status,'$ngtao');
";
$data =new Database();
$data->connect();
$result=$data->query($sql);
if($result===TRUE){
    echo '
    <script>
            alert("Thanh toan thanh cong");
        </script>
                ';
}
    }
}
class Customer{
    private $idcus;
    private $name;
    private $data;
    public function __construct() {
        $this->data = new Database();
        $this->data->connect();
    }
    public function getinforcus($idcustomer){
        $sql= "select * from user where id_user = '$idcustomer'";
        $result=$this->data->query( $sql);
        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
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