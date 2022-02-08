<?php
include 'connection.php';

    $editId = $_GET['edit'];

    $sql = "SELECT * FROM `crud` where id =?";

    $stmt= $conn->prepare($sql);
    $stmt->bind_param("i",$editId);
    $stmt->execute();
    $result = $stmt->get_result();

    while($row = mysqli_fetch_assoc($result)){
        $id = $row['id'];
        $name = $row['Name'];
        $address = $row['Address'];
        $email = $row['Email'];

    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Crud</title>
</head>
<body>
    <form method="post">
        <input type="text" placeholder="Name" name="name" value=<?php echo $name;?> required><br><br>
        <input type="hidden" name="id" value="<?php echo $id?>">
        <input type="text" placeholder="Address" name="address" value=<?php echo $address;?> required><br><br>
        <input type="email" placeholder="Email" name="email" value=<?php echo $email;?> required><br><br>
        <input type="submit" name="update" value="Update">
    </form>
</body>
</html>

<?php
    if(isset($_POST['update'])){
        $id = $_POST['id'];
        $name = $_POST['name'];
        $address = $_POST['address'];
        $email = $_POST['email'];

        $sql2 ="UPDATE `crud` SET `Name`=?,`Address`=?,`Email`=? WHERE id=?";

        $stmt2 = $conn->prepare($sql2);
        $stmt2->bind_param('sssi',$name,$address,$email,$id);
        if($stmt2->execute()){
            echo"<script>alert('Updated successfully');</script>";

            echo"<script>window.open('index.php','_self');</script>";
        }
    }

?>
