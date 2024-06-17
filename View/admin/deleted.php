<?php 
include "../../App/connect.php";
$data=new Database;
$data->connect();

if (isset($_GET['id_product'])) {
    $iddl = $_GET['id_product'];
 $sql="DELETE FROM product WHERE id_product = '$iddl'";
    $result=$data->query($sql);
    // Check if the query was successful
    if ($result) {
        echo "Deletion successful";
        echo '<script>
                alert("Deletion successful for product ID: ' . $iddl. '");
                window.location.href="product.php";
              </script>';
    } else {
        // Output the error message for debugging
    }

    // Close the statement
    $stmt->close();
}

// Close the database connection
?>
