<?php include "includes/db.php"; ?>
<?php include "includes/header.php"; ?>
    
    <!-- Navigation -->
    <?php include "includes/navigation.php"; ?>

    <!-- Page Content -->
    <!-- <div class="container jumbotron" style="width: 45%; border-radius: 15px"> -->

    <div class="container" style="width: 50%;">
                              
        <h2 style="margin-left: 40%;">Profile</h2>
        <?php $image = $_SESSION['s_image'] ; ?>
        <img src="admin/images/<?php echo $image;?>" width="200" style="margin-left: 32%;" class="img-circle" alt="Profile"> 
        <br><br><br><br>
        <div class="tab">
            <button class="tablinks" style="width: 33%" onclick="openCity(event, 'Personel Details')">Personel Details</button>
            <button class="tablinks" style="width: 33%" onclick="openCity(event, 'Tickets Booked')">Tickets Booked</button>
            <button class="tablinks" style="width: 33%"  onclick="openCity(event, 'Edit Details')">Edit Details</button>
        </div>


        <div id="Personel Details" class="tabcontent">
          <h3>Details</h3>
          <br>
          <?php
          $curr_user_id = $_SESSION['s_id'];
          //echo $curr_user_id;
          $query = "SELECT * FROM users where user_id = $curr_user_id";

          $select_user = mysqli_query($connection, $query);

          while ($row = mysqli_fetch_assoc($select_user)) {
            $username = $row['username'];
            $user_firstname = $row['user_firstname'];
            $user_lastname = $row['user_lastname'];
            $user_email = $row['user_email'];
            $user_phoneno = $row['user_phoneno'];
            ?>

            <table class="table table-striped" style="width: 50%">
              <tbody>
                <tr>
                  <td><b>Username:</b> </td>
                  <td><?php echo $username; ?></td>
                </tr>
                <tr>
                  <td><b>FirstName:</b> </td>
                  <td><?php echo ucfirst($user_firstname); ?></td>
                </tr>
                <tr>
                  <td><b>Lastname: </b></td>
                  <td><?php echo ucfirst($user_lastname); ?></td>
                </tr>
                <tr>
                  <td><b>Email: </b></td>
                  <td><?php echo $user_email; ?></td>
                </tr>
                <tr>
                  <td><b>Phone No: </b></td>
                  <td><?php echo $user_phoneno; ?></td>
                </tr>
              </tbody>
            </table>

          <?php } ?>
        </div>

        <div id="Tickets Booked" class="tabcontent">
          <h3>Tickets Booked</h3>
          <br>
          <?php

          $query = "SELECT * FROM orders where user_id = $curr_user_id";

          $select_user_orders = mysqli_query($connection, $query);

          while ($row = mysqli_fetch_assoc($select_user_orders)) {
            $passenger = $row['user_name'];
            $passenger_age = $row['user_age'];
            $source = $row['source'];
            $destination = $row['destination'];
            $dob = $row['date'];
            $cost = $row['cost'];

            ?>

            <table class="table table-striped" style="width: 50%">
              <tbody>
                <tr>
                  <td><b>Passenger Name:</b> </td>
                  <td><?php echo $passenger; ?></td>
                </tr>
                <tr>
                  <td><b>Passenger Age:</b> </td>
                  <td><?php echo $passenger_age; ?></td>
                </tr>
                <tr>
                  <td><b>Source: </b></td>
                  <td><?php echo ucfirst($source); ?></td>
                </tr>
                <tr>
                  <td><b>Destination: </b></td>
                  <td><?php echo ucfirst($destination); ?></td>
                </tr>
                <tr>
                  <td><b>Date Of Booking: </b></td>
                  <td><?php echo $dob; ?></td>
                </tr>
                <tr>
                  <td><b>Cost: </b></td>
                  <td><?php echo $cost; ?></td>
                </tr>

              </tbody>
            </table>

          <?php } ?>
        </div>

        <div id="Edit Details" class="tabcontent">
          <h3>Edit Details</h3>
          <p>Hello</p>
        </div>

    </div>
        <hr>


    <script>
    function openCity(evt, tabName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(tabName).style.display = "block";
        evt.currentTarget.className += " active";
    }
    </script>

<?php include "includes/footer.php"; ?> 