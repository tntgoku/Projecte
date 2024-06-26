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
        $sql= "select * from user where Name = '$idcustomer'";
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
}


?>