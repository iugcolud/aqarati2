//profile.php

<?php
session_start();

if (!isset($_SESSION["email"])) {
    header("location:index.php");
    exit();
}

include('navbar.php');
include('tenant-engine.php');
?>

<style>
.card {
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
    max-width: 300px;
    margin: auto;
    text-align: center;
    font-family: arial;
}

button {
    border: none;
    outline: 0;
    display: inline-block;
    padding: 8px;
    color: white;
    background-color: #9dc99d;
    text-align: center;
    cursor: pointer;
    width: 100%;
    font-size: 18px;
}

button:hover,
a:hover {
    opacity: 0.7;
}

.form-group {
    text-align: left;
}
</style>

<center>
    <h3 style="font-family: Century Gothic, CenturyGothic, AppleGothic, sans-serif;color: #426942;font-weight:bold;">
        Tenant Profile
    </h3>
</center>

<div class="container">
    <?php
    include("config/config.php");
    $u_email = $_SESSION["email"];

    $sql = "SELECT * from tenant where email='$u_email'";
    $result = mysqli_query($db, $sql);

    if (mysqli_num_rows($result) > 0) {
        while ($rows = mysqli_fetch_assoc($result)) {
    ?>
    <div class="card">
        <img src="images/avatar.png" alt="John" style="height:200px; width: 100%">
        <h1><?php echo $rows['full_name']; ?></h1>
        <p class="title"><?php echo $rows['email']; ?></p>
        <p><b>Phone No.:</b><?php echo $rows['phone_no']; ?></p>
        <p><b>Address:</b><?php echo $rows['address']; ?></p>
        <p><b>Id Type:</b><?php echo $rows['id_type']; ?></p>
        <p><img src="<?php echo $rows['id_photo']; ?>" height="100px"></p>
        <p>
            <button type="button" class="btn btn-lg" data-toggle="modal" data-target="#myModal"
                style="background-color:#426942;">Update Profile</button>
        </p>

        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Update Profile</h4>
                    </div>
                    <div class="modal-body">
                        <form method="POST" style="font-family: Century Gothic, CenturyGothic, AppleGothic, sans-serif;color: #426942;">
                            <div class="form-group">
                                <label for="full_name">Full Name:</label>
                                <input type="hidden" value="<?php echo $rows['tenant_id']; ?>" name="tenant_id">
                                <input type="text" class="form-control" id="full_name" value="<?php echo $rows['full_name']; ?>"
                                    name="full_name">
                            </div>
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" class="form-control" id="email" value="<?php echo $rows['email']; ?>"
                                    name="email" readonly>
                            </div>
                            <div class="form-group">
                                <label for="phone_no">Phone No.:</label>
                                <input type="text" class="form-control" id="phone_no"
                                    value="<?php echo $rows['phone_no']; ?>" name="phone_no">
                            </div>
                            <div class="form-group">
                                <label for="address">Address:</label>
                                <input type="text" class="form-control" id="address"
                                    value="<?php echo $rows['address']; ?>" name="address">
                            </div>
                            <div class="form-group">
                                <label for="id_type">Type of ID:</label>
                                <input type="text" class="form-control" value="<?php echo $rows['id_type']; ?>"
                                    name="id_type" readonly>
                            </div>
                            <div class="form-group">
                                <label>Your Id:</label><br>
                                <img src="<?php echo $rows['id_photo']; ?>" id="output_image" height="100px" readonly>
                            </div>
                            <hr>
                            <center>
                                <button id="submit" name="tenant_update" class="btn btn-primary btn-block"
                                    style="background-color: #426942;font-weight:bold;">Update</button>
                            </center>
                            <br>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"
                            style="background-color: #426942;font-weight:bold;">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
        }
    }
    ?>
</div>









//customer-login.php

<?php
session_start();
if (isset($_SESSION["email"])) {
    header("location:index.php");
}

include("navbar.php");
include("tenant-engine.php");
?>

<div class="container">
    <h3 style="font-weight: bold; text-align: center; color: #426942; font-family: Century Gothic, CenturyGothic, AppleGothic, sans-serif;">Tenant Login</h3>
    <hr><br><br>
    <form method="POST">
        <div class="form-group" style="color: #426942;">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required>
        </div>
        <div class="form-group" style="color: #426942;">
            <label for="pwd">Password:</label>
            <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password" required>
        </div>
        <div class="form-group">
            <a href="forgot-password-owner.php" style="color: #426942; font-family: Century Gothic, CenturyGothic, AppleGothic, sans-serif;">Lost your Password ?</a>
        </div>
        <center>
            <input type="submit" id="submit" name="tenant_login" class="btn btn-primary btn-block" value="Login" style="background-color:#9dc99d; font-size:20px;">
        </center>
    </form>
</div>



