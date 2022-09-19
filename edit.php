<?php
// echo $id = $_GET['id']; 
session_start();
// -------------login user allow only edit page------------------
// if(isset($_SESSION['uemail']))  //session set nhi hai tho session set karo
// {
//     echo "<script>location.href='record.php' </script>";
// }

?>
<!-- ---------- user without login not view edit page -->
<?php 
    if(isset($_SESSION['uemail']))  //session set nhi hai tho session set karo
    {
        //echo $_SESSION['uemail'];
    
    }
    else
    {
        echo "<script>location.href='index.php' </script>";  //session set hai tho thenredirect process
    }
?>


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>Edit </title>
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
                <h2 class="p-2">Edit Form </h2>
                <form action="code.php" method="POST" enctype="multipart/form-data">

                    <input type="hidden" name="stud_id" value="<?php echo $row['id']; ?>" /> <!-- //this line imp id ko hidden kiya gaya hai -->
                    
                    <div class="form-group">
                        <label for="stud_name">Student Name:</label>
                        <input type="text" class="form-control" id="stud_name" name="stud_name" value="<?php echo $row['stud_name']; ?>">
                    </div>

                    <div class="form-group">
                        <label for="Father_name">Father Name:</label>
                        <input type="text" class="form-control" id="father_name" name="father_name" value="<?php echo $row['father_name']; ?>">
                    </div>

                    <div class="form-group">
                        <label for="mother_name">Mother Name:</label><br>
                        <input type="text" class="form-control" id="fname" name="mother_name" value="<?php echo $row['mother_name']; ?>">
                    </div>

                    <!-- name="redy" value same rha ga -->

                    <fieldset class="form-group">
                        <div class="row">
                        <legend class="col-form-label col-sm-2 pt-0">Gender</legend>
                        <div class="col-sm-6">

                            <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" value="Male" <?php
                                                                                                                if ($row['gender'] == "Male")          // == comparisition ke use kiya jata hai 
                                                                                                                {
                                                                                                                    echo "checked";
                                                                                                                }
                                                                                                                ?>>
                                        <label class="form-check-label" for="Male">Male</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" value="Female" <?php
                                                                                                                    if ($row['gender'] == "Female") {
                                                                                                                        echo "checked";
                                                                                                                    }
                                                                                                                    ?>>
                                        <label class="form-check-label" for="Female">Female</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" value="Other" <?php
                                                                                                                    if ($row['gender'] == "Other") {
                                                                                                                        echo "checked";   //checked attribut kiya jata hai
                                                                                                                    }
                                                                                                                    ?>>
                                        <label class="form-check-label" for="Other">Other</label>
                                    </div>
                                                
                        </div>
                        </div>
                    </fieldset>

                                
                                

                    <div class="form-group">
                        <label for="Date of bitrh:">Date of bitrh:</label><br>
                        <input type="date" name="dob" value="<?php echo  $row['dob']; ?>">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" name="User_email" aria-describedby="emailHelp" placeholder="Email number" value="<?php echo  $row['User_email']; ?>">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>

                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="text" class="form-control" name="u_password" placeholder="password" value="<?php echo  $row['u_password']; ?>">
                    </div>

                    <div class="form-group">
                        <label for="Phoneno">Phone No</label>
                        <input type="tel" class="form-control" name="Phone_no" placeholder="Phone number" value="<?php echo  $row['Phone_no']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="UserAddress">Address</label>
                        <textarea class="form-control" rows="3" name="u_address" placeholder="Enter addess"><?php echo  $row['u_address']; ?> </textarea>
                    </div>

                    <?php
                    $old_hobiess =  $row['hobbies'];    //Reading,Painting Hobbies     cheacking process
                    // echo $old_hobiess;
                    $store_hobiess = explode(",", $old_hobiess);    //string ko array mai convert karta hai
                    // echo $store_hobiess;  //Array to string conversion   array convert hpgya hai
                    ######################
                    // array indexing ko chack karen ne ke liya "print_r()" ka use karte hai.
                    // print_r($store_hobiess);    //ArrayArray ( [0] => Reading [1] => Painting )
                    ############################
                    ?>
                    <div class="form-group">
                        <label for="">Hobbies</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" value="Reading" name="hobbies[]" <?php
                                                                                                                if (in_array("Reading", $store_hobiess)) {
                                                                                                                    echo "checked";
                                                                                                                }
                                                                                                                ?>>
                            <label class="form-check-label">Reading</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" value="Blogging" name="hobbies[]" <?php
                                                                                                                if (in_array("Blogging", $store_hobiess)) {
                                                                                                                    echo "checked";
                                                                                                                }
                                                                                                                ?>>
                            <label class="form-check-label">Blogging</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" value="Painting" name="hobbies[]" <?php
                                                                                                                if (in_array("Painting", $store_hobiess)) {
                                                                                                                    echo "checked";
                                                                                                                }
                                                                                                                ?>>
                            <label class="form-check-label">Painting</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" value="Photography" name="hobbies[]" <?php
                                                                                                                    if (in_array("Photography", $store_hobiess)) {
                                                                                                                        echo "checked";
                                                                                                                    }
                                                                                                                    ?>>
                            <label class="form-check-label">Photography</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="language">Languages</label>
                        <?php
                        // echo $row['languages'];   //testing processing
                        ?>
                        <select class="form-control" name="languages">
                            <option>-Select Language-</option>
                            <option value="English" <?php
                                                    if ($row['languages'] == "English") {
                                                        echo "selected";
                                                    }
                                                    ?>>English</option>
                            <option value="Hindi" <?php
                                                    if ($row['languages'] == "Hindi") {
                                                        echo "selected";
                                                    }
                                                    ?>>Hindi</option>
                        </select>
                        
                    </div>

                    <div class="form-group">
                    <!-- type="file" image or file ko insert karte hai  -->
                    <lable for="">Student image </lable>
                        <input type="file" accept="image/*" name="stud_image"> 
                        <!-- previous old image ke data ko call kiya gaya hai "value" under or type="text" chack process hai or type="hidden" pass kiya hai-->
                        <input type="hidden" name="stud_image_old" value="<?php echo $row['stud_image'] ?>" >
                        <br><spam> Select a new or previous image </spam>  
                    </div>
                    
                    <!-- image upload -->
                    <img class="img-thumbnail rounded" src="<?php echo "upload/" . $row['stud_image']; ?>" width="100px;" > <br>
                    <spam> Previous Image View </spam>  
                                       
                    <div class="form-group">
                    <button class="btn btn-danger" type="submit" name="update_btn">Update Data</button>
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