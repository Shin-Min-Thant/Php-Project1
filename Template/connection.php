<?php 
$connection = mysqli_connect('localhost','root','','php project');
if($connection==true){
    mysqli_connect('localhost','root','','php project'); 
}else{
    echo"Connect error".mysqli_connect_error();
}
?>