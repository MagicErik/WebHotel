<?php
include('../scripts/auth/session.php');
?>
<!DOCTYPE html>
<html>

<head>
    <title>FAQ</title>
    <?php include_once ('../scripts/load/loadCss.php');
    ?>
</head>

<body>
    <?php
    include('../scripts/nav/menue.php');
    ?>

    <div class="box1">
        <div class="container-xl px-4 mt-4">
            <?php 
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                require('../scripts/data/db_connection.php');
                // Retrieve values from the form
                $sql = "SELECT * FROM user WHERE email=?" ;
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("s", $email);
                $stmt->execute();
                $result = $stmt->get_result();
                $row = mysqli_fetch_array($result);
                
                $username = $_POST['username'];
                $first_name = $_POST['first_name'];
                $last_name = $_POST['last_name'];
                $org_name = $_POST['org_name'];
                $location = $_POST['location'];
                $email = $_POST['email'];
                $phone = $_POST['phone'];
                $birthday = $_POST['birthday'];


            }
            echo "
            <div class='row'>
            <div class='col-xl-4'>
                <!-- Profile picture card-->
                <div class='card mb-4 mb-xl-0'>
                    <div class='card-header'>Profile Picture</div>
                    <div class='card-body text-center'>
                        <!-- Profile picture image-->
                        <img class='img-account-profile rounded-circle mb-2'
                            src='http://bootdey.com/img/Content/avatar/avatar1.png' alt=''>
                        <!-- Profile picture help block-->
                        <div class='small font-italic text-muted mb-4'>JPG or PNG no larger than 5 MB</div>
                        <!-- Profile picture upload button-->
                        <button class='btn btn-primary' type='button'>Upload new image</button>
                    </div>
                </div>
            </div>
            <div class='col-xl-8'>
                <!-- Account details card-->
                <div class='card mb-4'>
                    <div class='card-header'>Account Details</div>
                    <div class='card-body'>
                        <form action='#' method='post'>
                            <!-- Form Group (username)-->
                            <div class='mb-3'>
                                <label class='small mb-1' for='inputUsername'>Username (how your name will appear to
                                    other users on the site)</label>
                                <input class='form-control' id='inputUsername' type='text'
                                    placeholder=".$_SESSION['username']." name='username'>
                            </div>
                            <!-- Form Row-->
                            <div class='row gx-3 mb-3'>
                                <!-- Form Group (first name)-->
                                <div class='col-md-6'>
                                    <label class='small mb-1' for='inputFirstName'>First name</label>
                                    <input class='form-control' id='inputFirstName' type='text'
                                        placeholder='enter fóur first name' value=".$_SESSION['firstname']." name='first_name'>
                                </div>
                                <!-- Form Group (last name)-->
                                <div class='col-md-6'>
                                    <label class='small mb-1' for='inputLastName'>Last name</label>
                                    <input class='form-control' id='inputLastName' type='text'
                                        placeholder='' value=".$_SESSION['lastname']." name='last_name'>
                                </div>
                            </div>
                            <!-- Form Row        -->
                        
                            <!-- Form Row-->
                            <div class='row gx-3 mb-3'>
                            <div class='col-md-6'>
                                <label class='small mb-1' for='inputEmailAddress'>Email address</label>
                                <input class='form-control' id='inputEmailAddress' type='email'
                                    placeholder='Enter your email address' value=".$_SESSION['email']." name='email'>
                                    </div>
                                <!-- Form Group (birthday)-->
                                <div class='col-md-6'>
                                    <label class='small mb-1' for='inputBirthday'>Gender</label>
                                    <input class='form-control' id='inputBirthday' type='text' name='birthday'
                                        placeholder='Enter your birthday' value=".$_SESSION['gender'].">
                                </div>
                            </div>
                            <!-- Save changes button-->
                            <button class='btn btn-primary' type='button'>Save changes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </div>
        "; ?>
    </div>
</body>