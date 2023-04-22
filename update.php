
<?php include_once('./template/header.php') ?>
<?php include_once('./template/connection.php')?>

<?php 

if(isset($_GET['userId'])) {
    $id = $_GET['userId'];
    $sql = "SELECT * FROM form WHERE Id = ?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $data = $stmt->get_result()->fetch_assoc();
}

// $id = $_GET['userId'];
// $sql = "SELECT * FROM form WHERE Id = $id";
// $query = mysqli_query($connection,$sql);
// $data = mysqli_fetch_assoc($query);

?>
<div class="container mt-5 ">
    <h2 class="text-center">Register your information</h2>
    <div class="card box">
        <div class="card-body">
            <form action="" method="post">
                <input type="hidden" name="userId" value="<?= $data['Id'] ?>" >
                <div class="row">
                    <div class="col-6 mb-3">
                        <label for="name">Name</label>
                        <input type="text" id="name" name="userName" class="form-control" placeholder="Enter your name">
                    </div>
                    <div class="col-6 mb-3">
                        <label for="email">Email</label>
                        <input type="text" id="email" name="userEmail" class="form-control" placeholder="Enter your email">
                    </div>
                    <div class="col-6 mb-3">
                        <label for="address">Address</label>
                        <input type="text" id="address" name="userAddress" class="form-control" placeholder="Enter your address">
                    </div>
                    <div class="col-6 mb-3">
                        <label for="phone">Phone</label>
                        <input type="text" id="phone" name="userPhone" class="form-control" placeholder="Enter your phone">
                    </div>
            
                    
                </div>
                <input type="submit" class="btn btn-primary float-end done" value="Update" name="userUpdate">
                
            </form>
            </div>
        </div>
    </div>

</div>

<?php 
if(isset($_POST["userUpdate"])){
    $id = htmlentities($_POST['userId']);
    $name = htmlentities($_POST['userName']);
    $email = htmlentities($_POST['userEmail']);
    $address = htmlentities($_POST['userAddress']);
    $phone = htmlentities($_POST['userPhone']);

    $updateSql = "UPDATE form SET Name=?, Email=?, Address=?, Phone=? WHERE Id=$id";
    // $updateQuery = mysqli_query($connection,$updateSq$l);
    $stmt = $connection->prepare($updateSql);
    $stmt->bind_param('ssss',$name,$email,$address,$phone);
    $stmt->execute();


    if($stmt){
        header("location: ./index.php");
    }else{
        echo "Update error" .mysqli_error();
    }
}
?>
<?php include_once('./template/footer.php')?>