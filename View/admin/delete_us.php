<?php 
include "../../App/connect.php";
$data=new Database;
$data->connect();

if (isset($_REQUEST['id_us'])) {
    $id = $_REQUEST['id_us'];
 $sql="DELETE FROM user WHERE id_user = '$id'";
    $result=$data->query($sql);
    // Check if the query was successful
    if ($result) {
        echo "Deletion successful";
        echo '<script>
                alert("Deletion successful for user ID: ' . $id. '");
                window.location.href="customer.php";
              </script>';
    } else {
        // Output the error message for debugging
    }

    // Close the statement
    $stmt->close();
}

// Close the database connection
?>