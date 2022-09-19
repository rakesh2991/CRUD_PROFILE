<?php
session_start();
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>List of Data</title>
</head>

<body>


<div class="container-fluid">
    
    
    <h5 class= "pt-4">WellCome to mini project <spam class="text-danger">
        <!-- start: loging user name view a email id   -->
        <?php 
        if(isset($_SESSION['uemail']))  //session set nhi hai tho session set karo
        {
            echo $_SESSION['uemail'];
        
        }
        else
        {
            echo "<script>location.href='index.php' </script>";  //session set hai tho thenredirect process
        }
        ?>
    </spam> </h5>
     <!-- end: loging user name view a email id   -->

    <!-- Start: log out button -->
    <form action="code.php" method="POST">
        <input class="btn btn-warning" type="submit" value="Logout" name="logout">
    </form>
    <!-- End: logout section -->
    <h4 class="mx-auto pt-4" style="width: 500px;">List of record</h4>

    <?php
    // pop up use a display msg data update
    if (isset($_SESSION['status']) && $_SESSION != '') {
    ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong><?php echo $_SESSION['status']; ?></strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php
        unset($_SESSION['status']);      //unset close kardena
    }
    ?>

<?php
    include("connection.php");
    $query = "SELECT * FROM student";
    $query_run = mysqli_query($conn,$query);
?>


    <table class="table table-hover w-100">
        <thead class="thead-dark">
            <th>ID</th>
            <th>Name</th>
            <th>Father</th>
            <th>Mother</th>
            <th>Gender</th>
            <th>DOB</th>
            <th>Email</th>
            <th>Password</th>
            <th>Phone_no</th>
            <th>Address</th>
            <th>Hobbies</th>
            <th>Language</th>
            <th>Photo</th>
            <th>Edit</th>
            <th>Delete</th>
            <th>View</th>
        </thead>

        <tbody class="bg-info text-white">
            <?php
            if(mysqli_num_rows($query_run)>0)
            {
                foreach($query_run as $row)
                {
                    ?>
                    <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['stud_name']; ?></td>
                    <td><?php echo $row['father_name']; ?></td>
                    <td><?php echo $row['mother_name']; ?></td>
                    <td><?php echo $row['gender']; ?></td>
                    <td><?php $new_date = date('d-m-Y', strtotime($row['dob']));
                    echo $new_date; ?>
                    </td>
                    <td><?php echo $row['User_email']; ?></td>
                    <td><?php echo $row['u_password']; ?></td>
                    <td><?php echo $row['Phone_no']; ?></td>
                    <td><?php echo $row['u_address']; ?></td>
                    <td><?php echo $row['hobbies']; ?></td>
                    <td><?php echo $row['languages']; ?></td>
                   

                    <td>
                    
                    <img class="img-fluid" src="<?php echo "upload/".$row['stud_image']; ?>" width="100px" alt="Image">  
                    </td>
                        
                    <td>
                        <a class="btn btn-secondary" href="edit.php?id=<?php echo $row['id'];?>" > Edit</a>        
                     
                    </td>
                    <td>
                        <!-- note same use a link section -->
                    <form action="code.php" method="POST">
                        <!-- 1. id select 2. img select 3. button press -->                        
                    <input type="hidden" name="stud_del_id" value="<?php echo $row['id']; ?>">  <!-- id ko call kar rha hai  -->
                    <!-- image ke liya -->
                    <!-- stud_image sql table ka name hai -->
                    <input type="hidden" name="stud_del_img" value="<?php echo $row['stud_image']; ?>">  
                    <button class="btn btn-danger" type="submit" name="stud_del">Deleted </button>  
                    </form>
                    </td>

                    <td>
                    <a class="btn btn-warning" href="view.php?id=<?php echo $row['id'];?>" > view</a>
                    </td>
                
                </tr>

                    <?php
                }
            }
            else
            {
                ?>
                <tr>
                <td colspan="16">No Record Available</td>
               </tr>

               <?php
            }
            ?>
                

        </tbody>
    </table>


</div>
    

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
   
</body>

</html>