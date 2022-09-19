<?php include("connection.php"); ?>
<?php session_start(); ?>
<!-- ////// -->
<!-- Start: Data Update Code -->
<?php
if (isset($_POST['save_btn'])) {
    $name = $_POST['stud_name'];
    $father = $_POST['father_name'];
    $mother = $_POST['mother_name'];
    $gender_box = $_POST['gender'];
    $dobs = $_POST['dob'];
    $email = $_POST['User_email'];
    $user_pass = $_POST['u_password'];
    $ph_no = $_POST['Phone_no'];
    $add = $_POST['u_address'];

    $hobb =  $_POST['hobbies'];
    $hobbstr =  implode(",", $hobb);

    $lang = $_POST['languages'];

    $image = $_FILES['stud_image']['name'];
    $tempname = $_FILES['stud_image']["tmp_name"];
    $img_folder = "upload/" . $image;   //directory.img name
    // echo   $img_folder;
    // -------image validaion-------
    $allowed_extension = array('gif', 'png', 'jpg', 'jpeg');
    $image = $_FILES['stud_image']['name'];
    $file_exttension = pathinfo($image, PATHINFO_EXTENSION);
    if(!in_array($file_exttension, $allowed_extension))
    {
        $_SESSION['status'] = "<b>" ."you are allowed with only jpg, png, jpeg and gif" . "</b>";
            echo "<script> window.location= 'form.php'; </script>";
    }
    else
    {
        if(file_exists("upload/" . $image))
        {
            $filename =  $image;
            $_SESSION['status'] = "Image already Exist " .$filename;
            echo "<script> window.location= 'form.php'; </script>";
        }
        else
        {
            $query = "INSERT INTO student(stud_name,father_name,mother_name,gender,dob,User_email,u_password,Phone_no,u_address,hobbies,languages,stud_image) VALUE  ('$name','$father','$mother','$gender_box','$dobs','$email','$user_pass','$ph_no','$add','$hobbstr','$lang','$image')";
            
            $query_run = mysqli_query($conn, $query);
            //die($query.' - '.$query_run);
            if ($query_run)
            {
                move_uploaded_file($tempname, $img_folder);

                $_SESSION['status'] = "Update Record Sucessfull";
                // header('location:index.php');
                echo "<script>location.href='index.php' </script>";
                                 
               
            } 
            else 
            {
                $_SESSION['status'] = "Record upload failed ";
                echo "<script> window.location= 'form.php'; </script>";
            }

        }

    }

    
}


// <!--------------------------------- End: Data insert Code -->

// <!----------------------------- Start: updata data code -------------------------->
if(isset($_POST['update_btn']))
{
    // print_r($_POST);     //chacking perpose
    $stud_id = $_POST['stud_id'];
    $name = $_POST['stud_name'];
    $father = $_POST['father_name'];
    $mother = $_POST['mother_name'];
    $gender_box = $_POST['gender'];
    $dobs = $_POST['dob'];
    $email = $_POST['User_email'];
    $ph_no = $_POST['Phone_no'];
    $add = $_POST['u_address'];
    
    $hobb =  $_POST['hobbies'];
    $up_hobbstr =  implode(",",$hobb);

    $lang = $_POST['languages'];
    // ------------------------------
    $new_image = $_FILES['stud_image']['name']; //new iage ko insert karaya ja rh hai new edit.php se
    $old_image = $_POST['stud_image_old'];  //jo id mera hidden pass ho rha hai, post method mai aa rha hai
    // ------------------------------------

        // new image insert karne per
    if($new_image != '')   //!= one time condation excuid
    {       // image update ko  new
         $update_filename = $new_image; //$new_image
    }
    else //null is not condition is true, upload a old image
    {       // photo ko upload nhi kar ne per puren file ko upload kare ga
        $update_filename  =  $old_image;
    }

    // ---------------- "small problem" blank image valodation  show -----------
    // $allowed_extension = array('gif', 'png', 'jpg', 'jpeg');
    // $filename = $_FILES['stud_image']['name'];
    // $file_exttension = pathinfo($filename, PATHINFO_EXTENSION);
    // if(!in_array($file_exttension, $allowed_extension))   //is jaga wrong hogaya ta 
    // //in_array in use to array data
    // {
    //     $_SESSION['status'] = "select image and allowed with only jpg, png, jpeg and gif ";
    //     header('Location: record.php');  
        
    // }
    // else             
    // {        
        # blank image post suggect msg show 'gif', 'png', 'jpg', 'jpeg'
        #
        // ----------------end : "small problem" blank image valodation  show -----------

        if(file_exists("upload/" . $_FILES['stud_image']['name']))  //file_exists("apna path image" . your_postfile)
        {
            $filename =  $old_image;  //image ke over right ko chack kare ga
            $_SESSION['status'] = "Image already Exist "  .$filename; //same image mai msg dislay show kare ga
            header('Location: record.php');         //location set kare ga
        }else{
            move_uploaded_file($_FILES['stud_image']["tmp_name"], "upload/".$_FILES["stud_image"]["name"]);
            unlink("upload/".$old_image);    // old image remove hogaya
        }
        $query = "UPDATE student set stud_name='$name', father_name=' $father', mother_name='$mother', gender='$gender_box', dob='$dobs', User_email='$email', Phone_no='$ph_no', u_address='$add', hobbies='$up_hobbstr', languages='$lang',  stud_image='$update_filename' WHERE id='$stud_id' "; 
        $query_run = mysqli_query($conn,$query);   

        if($query_run)
        {
            $_SESSION['status'] = "Data update sucessfully";
             header("Location: record.php");
        }
        else
        {
            $_SESSION['status'] = "Data not update sucessfully";
            header("Location: record.php");
        }
    }
// }

?>


<!-- End: updata data code -->

<!-- -------------------- start: delection section------------------- -->
<?php
if(isset($_POST['stud_del']))
{
    $stud_id = $_POST['stud_del_id']; 
    $stud_img = $_POST['stud_del_img'];

    $query = "DELETE FROM student WHERE id='$stud_id' ";
    $query_run = mysqli_query($conn,$query);

    if($query_run)
    {
        unlink("upload/". $stud_img);
        $_SESSION['status'] = "Data and image deleted sucessfully";
        header("Location: record.php");
    }
    else
    {
        $_SESSION['status'] = "Data not deleted";
        header("Location: record.php");
    }
}
?>
<!-- End: delection section -->

<!-- start: login -->
<?php
// -------------------- chack proces redirect---------------
// if(!isset($_SESSION['uemail']))  //session set nhi hai tho session set karo
// {
//     echo $_SESSION['uemail'];

// }
// else
// {
//     echo "<script>location.href='record.php' </script>";  //session set hai tho thenredirect process
// }
//  ---------------------------end-------------------------------

if(!isset($_SESSION['uemail']))  //session set nhi hai tho session set karo
{
    if(isset($_POST['login_fm']))
    {
        $email = $_POST['User_email'];
        $user_pass = $_POST['u_password'];

        // Checking the values are existing in the database or not
        $query = "SELECT * FROM student WHERE User_email='$email' && u_password='$user_pass' ";
        $query_run = mysqli_query($conn, $query);
        $result = mysqli_num_rows($query_run);
        // echo $result;  chack a pass value 1

        //  If the posted values are equal to the database values, then session will be created for the user. 
        if($result == 1)
        {
            $_SESSION['uemail'] = $email ;  // user name ko session mai store karaya ja rha hai, display karane ke liya record.php
            $_SESSION['status'] = "Login sucessfull";
            // header("Location: record.php");
            echo "<script>location.href='record.php' </script>";   //redirect both use
        
        }                
        else
        {
            // If the login credentials doesn't match, he will be shown with an error message.
            $_SESSION['status'] = "Please try again email and password";
            //header("Location: index.php");
            echo "<script>location.href='index.php' </script>"; 
            
        }
    }

}
else
{
    echo "<script>location.href='record.php' </script>";  //session set hai tho thenredirect process
}

// ------------- logout section-------------
if(isset($_POST['logout'])){
    session_unset();   //all session unset
    session_destroy(); //session file del ho jaye ga
    echo "<script>location.href='index.php' </script>";
}

?>

<!-- u_admin@gmaile.com  1234 -->