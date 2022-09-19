<?php session_start(); 

if(isset($_SESSION['uemail']))  //session set nhi hai tho session set karo
{
    echo "<script>location.href='record.php' </script>";
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

    <title>Registration form</title>
</head>

<body class="p-3 mb-2 bg-info text-white">

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

    <!-- Note:
      html ke "name" atribut ka name sqli ke name per same hai-->
    <div class="container col-sm-6 p-3 border border-white rounded-sm bg-secondary">
        <h2 class="p-2">Registration form</h2>
        <form action="code.php" method="POST" enctype="multipart/form-data">

            <div class="form-group">
                <label for="FullName">Full Name</label>
                <input type="text" class="form-control" name="stud_name" required placeholder="Full Name">
            </div>
            <div class="form-group">
                <label for="FatherName:">Father Name</label>
                <input type="text" class="form-control" name="father_name" placeholder="Father Name">
            </div>

            <div class="form-group">
                <label for="MotherName:">Mother Name</label>
                <input type="text" class="form-control" name="mother_name" placeholder="Mother Name">
            </div>

            <label for="">Gender</label><br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" value="Male">
                <label class="form-check-label" for="Male">Male</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" value="Female">
                <label class="form-check-label" for="Female">Female</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" value="Other">
                <label class="form-check-label" for="Other">Other</label>
            </div>
            <br> <br>
            <div class="form-group">
                <label for="">Date Of Bitrh</label> 
                <input type="date" name="dob" value="<?php echo date('d-m-Y') ?>">
            </div>
            
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" name="User_email" aria-describedby="emailHelp" placeholder="Email number">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>

            <div class="form-group">
                <label for="">Password</label>
                <input type="password" class="form-control" name="u_password" placeholder="password">
            </div>

            <div class="form-group">
                <label for="Phoneno">Phone No</label>
                <input type="tel" class="form-control" name="Phone_no" placeholder="Phone number">
            </div>

            <div class="form-group">
                <label for="UserAddress">Address</label>
                <textarea class="form-control" rows="3" name="u_address" placeholder="Enter addess"></textarea>
            </div>

            <div class="form-group">
                <label for="">Hobbies</label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="hobbies[]" value="Reading">
                    <label class="form-check-label">Reading</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="hobbies[]" value="Blogging">
                    <label class="form-check-label">Blogging</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="hobbies[]" value="Painting">
                    <label class="form-check-label">Painting</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="hobbies[]" value="Photography">
                    <label class="form-check-label">Photography</label>
                </div>
            </div>

            <div class="form-group">
                <label for="exampleFormControlSelect1">Languages</label>
                <select class="form-control" name="languages">
                    <option value="Not selected">Select Language-</option>
                    <option value="English">English</option>
                    <option value="Hindi">Hindi</option>
                </select>
            </div>

            <div class="form-group">
                <label for="exampleFormControlFile1">Upload Image</label>
                <input type="file" name="stud_image" class="form-control-file">
            </div>

            <button type="submit" name="save_btn" class="btn btn-outline-dark btn-lg btn-block">Submit</button>
            <a href="./index.php" class="btn btn-outline-danger btn-lg btn-block">Cancle</a>

        </form>

    </div>


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