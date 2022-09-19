<?php
session_start();

//----------------------

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

    <title>Login form</title>
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



    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Rakesh Sharma</a>
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item active ">
                    <a class="nav-link" href="aboutme.php">About Me </a>
                </li>
                
                
            </ul>
            <form class="form-inline my-2 my-lg-0">
                
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Admin</button>
            </form>
        </div>
    </nav>

    <!-- ------------------- -->

    <div class="container pt-5">
    <div class="row ">
        <div class="col-sm-6 pt-5 ">
            
                <form class="form-signin " action="code.php" method="POST">
                <div class="form-label-group">
                <!-- <h1 class="text-center">Mini Project</h1> -->
                
                    <!-- User_email sql ka field ka same name hai -->
                    <input type="email" class="form-control" name="User_email" placeholder="Email address" required autofocus>
                    <label for="inputEmail">Email address</label>
                </div>

                <div class="form-label-group">
                    <!-- u_password sql ka field ka same name hai -->
                    <input type="password" class="form-control" name="u_password" placeholder="Password" required>
                    <label for="inputPassword">Password</label>
                </div>
                
                <!-- note: use a input method not button tag-->
                <input class="btn btn-lg btn-primary btn-block" type="submit" name="login_fm">
                
                <a class="btn btn-lg btn-primary btn-block btn-secondary" href="./form.php">Registration</a>   
                
                </form>
           
        </div>
        <div class="col-sm-6 pt-5">
            <div class="container">
                <div class="row">
                    <div class="col">
                    <ul><h4>FrontEnd</h4>
                        <li>HTML</li>
                        <li>BootStrap</li>
                    </ul>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <ul>
                            <h4>BackEnd</h4>
                            <li>PHP</li>
                            <li>SQLI</li>
                        </ul>
                        
                    </div>
                </div>

                <spam>User: create a multipal account, and Deleted, Update, &
                user login Email and password </spam>
            </div> 
        </div>
    </div>
</div>

<?php
// second method
  
?>

<div class="container">
    <div class=" row bg-secondary">

    </div>
    </div-row-12>
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