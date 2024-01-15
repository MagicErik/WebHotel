<!DOCTYPE html>
<?php
include('../scripts/auth/session.php');
?>
<html>

<head>
    <?php include_once('../scripts/load/loadCss.php');
    ?>
    <title>Reservations</title>
</head>

<body>
    <?php
    include('../scripts/nav/menue.php');
    include('../scripts/data/db_connection.php');

    // Überprüfe, ob das Formular gesendet wurde
    if (isset($_POST['createReservation'])) {
        // Hole die Formulardaten
        $email = $_SESSION["email"];
        $roomType = $_POST["roomType"];
        $checkInDate = $_POST["checkInDate"];
        $checkOutDate = $_POST["checkOutDate"];
        $breakfast = isset($_POST["breakfastCheckbox"]) ? 1 : 0;
        $parking = isset($_POST["parkingCheckbox"]) ? 1 : 0;
        $pets = isset($_POST["petsCheckbox"]) ? 1 : 0;

        // Füge die Reservierung in die Datenbank ein
        $insertSql = "INSERT INTO Reservations (UserID, RoomID, CheckInDate, CheckOutDate, Status, breakfast,parking,pets)
                  VALUES (
                    (SELECT id FROM User WHERE email = '$email'),
                    (SELECT RoomID FROM Rooms WHERE RoomType = '$roomType'),
                    '$checkInDate',
                    '$checkOutDate',
                    'neu',
                    '$breakfast',
                    '$parking',
                    '$pets'
                  )";

        if ($conn->query($insertSql) === TRUE) {
            echo "Reservation successfully submitted!";
        } else {
            echo "Error: " . $insertSql . "<br>" . $conn->error;
        }
    } else {
        // Wenn das Formular nicht gesendet wurde, leite den Benutzer zurück zum Reservierungsformular
        //header("Location: reservations.php");
    }

    // Schließe die Datenbankverbindung
    $conn->close();
    ?>
    <div class="box1">
        <div class="container mt-5">
            <form action="#" method="post">
                <div class="form-group">
                    <label for="roomType">Room Type:</label>
                    <select class="form-control" id="roomType" name="roomType" required>
                        <option value="Standard">Standard (250 € pro Nacht)</option>
                        <option value="Suite">Suite (500 € pro Nacht)</option>
                        <!-- Add more room types if needed -->
                    </select>
                </div>

                <div class="form-group">
                    <label for="checkInDate">Check-In Date:</label>
                    <input type="date" class="form-control" id="checkInDate" name="checkInDate" required>
                </div>

                <div class="form-group">
                    <label for="checkOutDate">Check-Out Date:</label>
                    <input type="date" class="form-control" id="checkOutDate" name="checkOutDate" required>
                </div>
                <div class="form-group">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="breakfastCheckbox" name="breakfastCheckbox">
                        <label class="form-check-label" for="breakfastCheckbox">Frühstück (Breakfast) + 10€ (pro Nacht)</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="parkingCheckbox" name="parkingCheckbox">
                        <label class="form-check-label" for="parkingCheckbox">Parkplatz (Parking) + 3,5€ (pro Nacht)</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="petsCheckbox" name="petsCheckbox">
                        <label class="form-check-label" for="petsCheckbox">Haustiere (Pets)+ 5€ (pro Nacht)</label>
                    </div>
                </div> 
                </br>

                <button type="submit" name="createReservation" class="btn btn-primary">Submit Reservation</button>
            </form>

        </div>
    </div>
</body>



</html>