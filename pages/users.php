<!DOCTYPE html>
<?php
include('../scripts/auth/session.php');
?>
<html>

<head>
    <?php include_once('../scripts/load/loadCss.php');
    ?>
    <title>Login</title>
</head>

<body>
    <?php
    include('../scripts/nav/menue.php');
    include('../scripts/data/db_connection.php');
    if (isset($_POST['Save'])) {
        
        foreach ($_POST["id"] as $email => $id) {
            // Aktualisiere nur, wenn die Email-Adresse vorhanden ist
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $id = $_POST["id"][$email];
                $email = $_POST["email"][$email];
                $password = $_POST["password"][$email];
                $name = $_POST["name"][$email];
                $firstname = $_POST["firstname"][$email];
                $lastname = $_POST["lastname"][$email];
                $gender = $_POST["gender"][$email];
                $active = isset($_POST["active"][$email]) ? 1 : 0;
                $admin = $_POST["admin"][$email];

                $sql = "UPDATE `user`
                    SET `id`='$id', `email`='$email', `password`='$password',
                    `name`='$name', `firstname`='$firstname', `lastname`='$lastname',
                    `gender`='$gender', `active`='$active', `admin`='$admin'
                    WHERE `email`='$email'";
                $conn->query($sql);
            }
        }
    }

    // SQL-Abfrage
    $sql = "SELECT `id`, `email`, `name`, `firstname`, `lastname`, `gender`, `active`, `admin` FROM `user`";
    $result = $conn->query($sql);

    // HTML-Tabelle mit Formular
    echo "<div class='box1'><form method='post' action='" . $_SERVER["PHP_SELF"] . "'>
        <table border='1'>
            <tr>
                <th>ID</th>
                <th>Email</th>
                <th>Name</th>
                <th>Firstname</th>
                <th>Lastname</th>
                <th>Gender</th>
                <th>Active</th>
                <th>Admin</th>
            </tr>";

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
        <td><input type='text' name='id[" . $row["email"] . "]' value='" . $row["id"] . "'></td>
        <td><input type='text' name='email[" . $row["email"] . "]' value='" . $row["email"] . "'></td>
        <td><input type='text' name='name[" . $row["email"] . "]' value='" . $row["name"] . "'></td>
        <td><input type='text' name='firstname[" . $row["email"] . "]' value='" . $row["firstname"] . "'></td>
        <td><input type='text' name='lastname[" . $row["email"] . "]' value='" . $row["lastname"] . "'></td>
        <td><input type='text' name='gender[" . $row["email"] . "]' value='" . $row["gender"] . "'></td>
        <td><input type='checkbox' name='active[" . $row["email"] . "]' " . ($row["active"] == 1 ? "checked" : "") . "></td>
        <td><input type='text' name='admin[" . $row["email"] . "]' value='" . $row["admin"] . "'></td>
    </tr>";
        }
        echo "</table>
          <input type='submit' name='Save'value='Änderungen speichern'>
          </form>   ";
    } else {
        echo "Keine Ergebnisse gefunden";
    }


    ?>



</body>



</html>