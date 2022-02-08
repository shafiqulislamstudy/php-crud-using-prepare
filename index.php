<?php
include 'connection.php';


if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $address = $_POST['address'];
    $mail = $_POST['email'];

    $sql ="INSERT INTO `crud`(`Name`, `Address`, `Email`) VALUES (?,?,?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss",$name,$address,$mail);
    if( $stmt->execute()){
        echo"<script>alert('Data Inserted Successfully.');</script>";
    }

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
        <input type="text" placeholder="Name" name="name" required><br><br>
        <input type="text" placeholder="Address" name="address" required><br><br>
        <input type="email" placeholder="Email" name="email" required><br><br>
        <input type="submit" name="submit" value="Submit">
    </form>

    <br>
    <br>
    <h1>View All Data</h1>
    <table>
        <tr>
            <td>Id</td>
            <td>Name</td>
            <td>Address</td>
            <td>Email</td>
            <td>Action</td>
        </tr>

        <?php
            $sql2 = "SELECT * FROM `crud`";

            $stmt= $conn->prepare($sql2);
            $stmt->execute();
            $result = $stmt->get_result();

            while($row = mysqli_fetch_assoc($result)){
                ?>
                
                    <tr>
                        <td><?php echo $row['id'];?></td>
                        <td><?php echo $row['Name'];?></td>
                        <td><?php echo $row['Address'];?></td>
                        <td><?php echo $row['Email'];?></td>
                        <td>
                            <a href="edit.php?edit=<?php echo $row['id']?>">Edit</a>

                            <a onclick="return confirm('Do you want to delete')" href="delete.php?del=<?php echo $row['id'];?>">Delete</a>
                        </td>
                    </tr> 
                            
                
                <?php
            }
            
        
        ?>
    </table>

</body>
</html>
