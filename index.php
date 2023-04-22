<?php include_once('./template/header.php') ?>
<?php include_once('./template/connection.php')?>

<div class="container">
    <div class="card">
        <div class="card-body">
            <h1 class="text-center">Thank You for your registering</h1>
            <form action="">
                <div class="row">
                    <div class="col-8 offset-2">
                    <table class="table table-bodered col-12 table-dark">
                        
                        <tr>
                          <th >Id</th>
                          <th >Name</th>
                          <th >Email</th>
                          <th >Address</th>
                          <th >Phone</th>
                          <th>Update&Delete</th>
                        </tr>

                        
                        <!-- <tr>
                            <td>1</td>
                            <td>Mya Lin</td>
                            <td>myalin@gmail.com</td>
                            <td>Mandlay</td>
                            <td>098765345</td>
                            
                            <td>
                                <a href="./update.php" class="btn btn-success">Update</a>
                                <a href="./delete.php" class="btn btn-danger">Delete</a>
                            </td>
                        </tr> -->

                        <?php 
                        $sql ="SELECT * FROM form";
                        $query = mysqli_query($connection,$sql);
                        // $totalRow = mysqli_num_rows($query);
                        // echo $totalRow;

                        while($row = mysqli_fetch_assoc($query)){
                         echo"
                         <tr>
                           
                         <td>{$row['Id']}</td>
                         <td>{$row['Name']}</td>
                         <td>{$row['Email']}</td>
                         <td>{$row['Address']}</td>
                         <td>{$row['Phone']}</td>
                         
                         <td>
                             <a href='./update.php?userId={$row['Id']}' class='btn btn-success'>Update</a>
                             <a href='./delete.php?userId={$row['Id']}' class='btn btn-danger'>Delete</a>
                         </td>
                     </tr>
                     ";
                        }

           
                        



                  
                        ?>

                       
                    </table>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include_once('./template/footer.php')?>