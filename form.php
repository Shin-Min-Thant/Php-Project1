<?php include_once('./template/header.php') ?>
<?php include_once('./template/connection.php')?>
<div class="container mt-5 ">
    <h2 class="text-center">Register your information</h2>
    <div class="card box">
        <div class="card-body">
            <form action="" method="post">
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
                        <input type="address" id="address" name="userAddress" class="form-control" placeholder="Enter your address">
                    </div>
                    <div class="col-6 mb-3">
                        <label for="phone">Phone</label>
                        <input type="text" id="phone" name="userPhone" class="form-control" placeholder="Enter your phone">
                    </div>
              
                    
                </div>
                <input type="submit" class="btn btn-primary float-end done" name="userDone" value="Done">
                
            </form>
            </div>
        </div>
    </div>

</div>

<?php 
// var_dump($_POST);
if(isset($_POST["userDone"])){
    $name = htmlentities($_POST["userName"]);
    $email = htmlentities($_POST["userEmail"]);
    $address = htmlentities($_POST["userAddress"]);
    $phone = htmlentities($_POST["userPhone"]);


// $sql ="INSERT INTO form(Name,Email,Address,Phone) VALUES('$name','$email','$address','$phone')";
// $query = mysqli_query($connection,$sql);
if($name == "" || $name == null || $email == "" || $email == null || $address == "" || $address == null || $phone == "" || $phone == null){
    echo"<div class='alert alert-danger'>You need to fill.</div>";
}else{
    $sql = "INSERT INTO form(Name,Email,Address,Phone) VALUES(?,?,?,?)";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param('ssss',$name,$email,$address,$phone);
    $stmt->execute();

if($stmt == true){
    echo "<div class='alert alert-success'>Complete your regisering.</div> ";
}else{
    echo "SQl query fails.". mysqli_error();
}
}

// if($query){
//     header("location: ./index.php");
// }else{
//     echo "Error Happen".mysqli_errror() ;
// }
};

?>

<?php include_once('./template/footer.php')?>