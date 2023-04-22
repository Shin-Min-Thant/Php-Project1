<?php include_once('./template/header.php') ?>
<?php include_once('./template/connection.php')?>

<?php 
$id = $_GET['userId'];
$sql = "DELETE FROM form WHERE Id = ?";
// $query = mysqli_query($connection,$sql);
$stmt = $connection->prepare($sql);
$stmt->bind_param('s',$id);
$stmt->execute();

if($stmt){
    header("location: ./index.php");
}else{
    echo"Delete Fails".mysqli_error();
};
?>

<?php include_once('./template/footer.php')?>