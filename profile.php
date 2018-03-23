<?php include "includes/db.php"; ?>
<?php include "includes/header.php"; ?>
    
    <!-- Navigation -->
    <?php include "includes/navigation.php"; ?>

<?php

if (isset($_POST['register'])) {
echo "registered";
    $username = $_POST['username'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $phone_no = $_POST['phone_no'];
    $password = $_POST['password'];

    $image = $_FILES['image']['name'];
    $tmp_image = $_FILES['image']['tmp_name'];

    move_uploaded_file($tmp_image, "images/$image");


$query = "INSERT INTO users(username, user_password, user_firstname, user_lastname, user_email, user_phoneno, user_role, user_image) VALUES('$username', '$password', '$firstname', '$lastname', '$email', '$phone_no', 'subscriber', '$image') ";

$register_user = mysqli_query($connection, $query);

if(!$register_user) {
    die("Query Failed" . mysqli_error($connection));
}

header("Location: login.php");
}

?>

    <!-- Page Content -->
    <!-- <div class="container jumbotron" style="width: 45%; border-radius: 15px"> -->

    <div class="container" style="width: 50%;">
                              
              <h2 style="margin-left: 40%;">Profile</h2>
              <?php echo $_SESSION['s_image'] ; ?>
               <img src="images/<?php echo $_SESSION['s_username']; ?>" class="img-circle" alt="Profile"> 
              <form action="" method="post" enctype="multipart/form-data">
                
                <div class="form-group">
                  <label for="email">Username:</label>
                  <input type="text" class="form-control" id="email" placeholder="Enter Username" name="username">
                </div>

                <div class="form-group">
                  <label for="email">Firstname:</label>
                  <input type="text" class="form-control" id="email" placeholder="Enter Firstname" name="firstname">
                </div>

                <div class="form-group">
                  <label for="email">Lastname:</label>
                  <input type="text" class="form-control" id="email" placeholder="Enter Lastname" name="lastname">
                </div>

                <div class="form-group">
                    <label for="bus-image">Bus Image</label>
                    <input type="file" name="image" >
                </div>

                <div class="form-group">
                  <label for="email">Email:</label>
                  <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
                </div>
                
                <div class="form-group">
                  <label for="pwd">Phone No:</label>
                  <input type="text" class="form-control" id="pwd" placeholder="Enter password" name="phone_no">
                </div>

                <div class="form-group">
                  <label for="pwd">Password:</label>
                  <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password">
                </div>
        
                <button type="submit" class="btn btn-primary" name="register" style="margin-left: 45%; margin-top: 20px;">Register</button>
              </form>

    </div>
        <hr>

<?php include "includes/footer.php"; ?> 