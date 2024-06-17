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
}
$db =new Database();
$db->connect()


?>