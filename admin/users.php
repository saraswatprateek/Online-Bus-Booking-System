<?php include"includes/admin_header.php"; ?>

    <div id="wrapper">
        
        <!-- Navigation -->
        <?php include"includes/admin_navigation.php"; ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcone To Admin
                            <small>Author</small>
                        </h1>


                        <?php 

                        if (isset($_GET['source'])) {
                            $source = $_GET['source'];
                        }
                        else {
                            $source = "";
                        }

                        switch ($source) {
                            case 'update_user':
                                include "includes/update_user.php";
                                break;

                            default: ?>
                                <table class="table table-bordered table-hover"> 
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>UserName</th>
                                        <th>Firstname</th>
                                        <th>Lastname</th>
                                        <th>Email</th>
                                        <th>Phone No.</th>
                                        <th>Role</th>
                                        
                                    </tr>
                                </thead>

                                <tbody>
                                    
                                    <?php 

                                        $query = "SELECT *  FROM  users";
                                        $select_users = mysqli_query($connection,$query);

                                        while($row = mysqli_fetch_assoc($select_users)) {
                                            $user_id = $row['user_id'];
                                            $username = $row['username'];
                                            $user_firstname = $row['user_firstname'];
                                            $user_lastname = $row['user_lastname'];
                                            $user_email = $row['user_email'];
                                            $user_role = $row['user_role'];
                                            $user_phoneno = $row['user_phoneno'];  
                                            $user_image = $row['user_image'];                                      

                                     ?>
                                    <tr>
                                        <td><?php echo $user_id ?></td>
                                        <td><?php echo $username ?></td>
                                        <td><?php echo $user_firstname ?></td>
                                        <td><?php echo $user_lastname ?></td>
                                        <td><?php echo $user_email ?></td>
                                        <td><?php echo $user_phoneno ?></td>
                                        <td><?php echo $user_role ?></td>
                                        
                                        <?php echo "<td><a href='users.php?delete=$user_id'>Delete</a></td>"; ?>
                                        <?php echo "<td><a href='users.php?source=update_user&user_id=$user_id'>Edit</a></td>"; ?>
                                        <?php echo "<td><a href='users.php?alter_role=$user_id'>Alter Role</a></td>"; ?>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                                </table><?php
                                break;
                        }
                        // if ($source = 'add_bus') {
                        //        include "includes/add_bus.php";   
                        // }
                        // elseif ($source = '') {
                        //     
                        // }   
                        ?>

                        <?php 

                        if (isset($_GET['delete'])) {
                            
                            $user_idd = $_GET['delete'];
                            // echo "$bus_idd";
                            $query = "DELETE FROM users WHERE user_id = {$user_idd} ";

                            $delete_query = mysqli_query($connection,$query);
                            header("Location : users.php");
                            if(!$delete_query) {
                                die("Query Failed" . mysqli_error($connection));
                            }
                        }

                        ?>

                        <?php 

                        if (isset($_GET['alter_role'])) {
                            $user_id = $_GET['alter_role'];

                            if($user_role == "subscriber")
                            $query = "UPDATE users SET user_role = 'admin' WHERE user_id = '$user_id'";
                            else if($user_role == "admin")
                            $query = "UPDATE users SET user_role = 'subscriber' WHERE user_id = '$user_id'";
                            $add_admin = mysqli_query($connection, $query);

                            if(!$add_admin) {
                                die("Query Failed" . mysqli_error($connection));
                            }
                            header("Location: users.php");
                        }

                        ?>


                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

<?php include"includes/admin_footer.php"; ?>