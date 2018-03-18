<?php include "includes/db.php"; ?>
<?php include "includes/header.php"; ?>
    
    <!-- Navigation -->
    <?php include "includes/navigation.php"; ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <?php 

                    if(isset($_GET['bus_id'])) {
                        $selected_bus = $_GET['bus_id'];
                    }

                    $query = "SELECT *  FROM  posts WHERE post_id = $selected_bus ";
                    $select_all_bus_query = mysqli_query($connection,$query);

                    while($row = mysqli_fetch_assoc($select_all_bus_query)) {
                        $bus_title = $row['post_title'];
                        $bus_author = $row['post_author'];
                        $bus_date = $row['post_date'];
                        $bus_image = $row['post_image'];
                        $bus_content = $row['post_content'];
                        $bus_id = $row['post_id'];
                        ?>

                        <h1 class="page-header">
                        Page Heading
                        <small>Secondary Text</small>
                        </h1>

                        <!-- First Blog Post -->
                        <h2>
                            <a href="bus_info.php?bus_id=<?php echo $post_id; ?>"><?php echo $bus_title; ?></a>
                        </h2>
                        <p class="lead">
                            by <a href="index.php"><?php echo $bus_author; ?></a>
                        </p>
                        <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $bus_date; ?></p>
                        <hr>
                        <img class="img-responsive" src="images/<?php echo $bus_image; ?>" alt="">
                        <hr>
                        <p><?php echo $bus_content ?></p>
                        

                        <hr>
                    <?php } ?>


                    <!-- Blog Comments -->

                <?php 

                    if (isset($_POST['submit_query'])) {
                        $user_name = ucfirst($_SESSION['s_username']) ;
                        if($user_name == "") {
                            $user_name = "(unknown)";
                        }
                        $user_email = $_POST['user_email'];
                        $user_query = $_POST['user_query'];

                        $query = "INSERT INTO query(query_bus_id, query_user, query_email, query_date, query_content, query_replied) VALUES ('$selected_bus', '$user_name', '$user_email', now(), '$user_query', 'no')";

                        $query_insert = mysqli_query($connection, $query);
                        if(!$query_insert) {
                            die("Query Failed" . mysqli_error($connection));
                        }

                        $query = "UPDATE posts SET post_query_count = post_query_count + 1 WHERE post_id = $bus_id";
                        $increase_query_count = mysqli_query($connection,$query);
                    }

                ?>



                <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form action="bus_info.php?bus_id=<?php echo $selected_bus ?>" method="post" role="form">
                        
                        <!-- <div class="form-group">
                            <label for="name">Name</label>
                            <input class="form-control" name="user_name"></textarea>
                        </div> -->

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="user_email"></textarea>
                        </div>

                        <div class="form-group">
                            <label> Query</label>
                            <textarea class="form-control" rows="3" name="user_query"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary" name="submit_query">Submit</button>
                    </form>
                </div>

                <hr>

                <!-- Posted Comments -->

                <?php 

                $query = "SELECT * FROM query WHERE query_bus_id = $bus_id";
                $get_query = mysqli_query($connection,$query);

                while ($row = mysqli_fetch_assoc($get_query)) {
                    
                $query_user = $row['query_user'];
                $query_content = $row['query_content'];
                $query_date = $row['query_date'];

                ?>


                <!-- Comment -->
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"> <?php echo $query_user; ?>
                            <small><?php echo $query_date; ?></small>
                        </h4>
                        <?php echo $query_content; ?>
                    </div>
                </div>
      
                <?php } ?>

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <?php include "includes/sidebar.php"; ?>

        </div>
        <!-- /.row -->

        <hr>

<?php include "includes/footer.php"; ?>