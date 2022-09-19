<?php
// echo $id = $_GET['id']; 

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>View Profile </title>
</head>

<body class="p-3 mb-2 bg-info text-white">

    <?php
    include("connection.php");
    $id = $_GET['id'];                                  //'id' URLS mai show kare ga 
    $query = "SELECT * FROM student WHERE id='$id' ";   //$id pass a $_GET['id'] 
    $query_run = mysqli_query($conn, $query);

    if (mysqli_num_rows($query_run) > 0) {
        foreach ($query_run as $row) {
    ?>
            <div class="container col-sm-6 p-3  border border-white rounded-sm bg-secondary">
                <h2 class="p-2">View Profile </h2>

                <input type="hidden" name="stud_id" value="<?php echo $row['id']; ?>" /> <!-- //this line imp id ko hidden kiya gaya hai -->


                <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Student Name</label>
                    <div class="col-sm-6">
                    <label class="form-control-plaintext font-weight-bold"><?php echo $row['stud_name']; ?>  <label>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Father Name</label>
                    <div class="col-sm-6">
                    <label class="form-control-plaintext font-weight-bold"><?php echo $row['father_name']; ?> <label>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Mother Name</label>
                    <div class="col-sm-6">
                    <label class="form-control-plaintext font-weight-bold"><?php echo $row['mother_name']; ?> <label>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Gender</label>
                    <div class="col-sm-6">
                    <label class="form-control-plaintext font-weight-bold"><?php echo $row['gender']; ?> <label>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Date of bitrh</label>
                    <div class="col-sm-6">
                    <label class="form-control-plaintext font-weight-bold"> <?php
                        $new_date = date('d-m-Y', strtotime($row['dob']));
                        echo $new_date; ?> 
                   
                    <label>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Email address</label>
                    <div class="col-sm-6">
                    <label class="form-control-plaintext font-weight-bold"><?php echo  $row['User_email']; ?> <label>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Password</label>
                    <div class="col-sm-6">
                    <label class="form-control-plaintext font-weight-bold"><?php echo  $row['u_password']; ?>                   
                    <label>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Phone No</label>
                    <div class="col-sm-6">
                    <label class="form-control-plaintext font-weight-bold"><?php echo  $row['Phone_no']; ?>                   
                    <label>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Address</label>
                    <div class="col-sm-6">
                    <label class="form-control-plaintext font-weight-bold"><?php echo  $row['u_address']; ?>                  
                    <label>
                    </div>
                </div>

                
                
                <?php
                    $old_hobiess =  $row['hobbies'];    //Reading,Painting Hobbies     cheacking 
                    $store_hobiess = explode(",", $old_hobiess);    //string ko array mai convert 
                ?>
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Hobbies</label>
                    <div class="col-sm-6">
                    <label class="form-control-plaintext font-weight-bold"><?php echo  $row['hobbies']; ?>                  
                    <label>
                    </div>
                </div>


                <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Languages</label>
                    <div class="col-sm-6">
                    <label class="form-control-plaintext font-weight-bold"><?php echo  $row['languages']; ?>                  
                    <label>
                    </div>
                </div>

                    
                   
                <!-- image upload -->
                <img class="img-thumbnail rounded" src="<?php echo "upload/" . $row['stud_image']; ?>" width="100px;" > <br>
                <spam> Previous Image View </spam>  
                                    
                <div class="form-group">
                <a class="btn btn-success" href="index.php">back</a>
                </div>
                
            </form>
        <?php
        }
    }
?>
    

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

            <!-- Option 2: Separate Popper and Bootstrap JS -->
            <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    -->
</body>

</html>