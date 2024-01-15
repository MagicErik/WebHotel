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

    ?>
    <div class="box1">
        <h2>User Reservations</h2>

        <table border="1">
            <tr>
                <th>Reservation ID</th>
                <th>User Name</th>
                <th>Room Number</th>
                <th>Room Type</th>
                <th>Check-In Date</th>
                <th>Check-Out Date</th>
                <th>Status</th>
            </tr>

            <?php
            include('../scripts/data/db_connection.php');

            // Update reservation status if form is submitted
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $reservationID = $_POST["reservationID"];
                $newStatus = $_POST["newStatus"];

                $updateSql = "UPDATE Reservations SET Status = '$newStatus' WHERE ReservationID = $reservationID";
                $conn->query($updateSql);
                
            }

            $sql = "SELECT Reservations.ReservationID, User.FirstName, User.LastName, Rooms.RoomNumber, Rooms.RoomType, Reservations.CheckInDate, Reservations.CheckOutDate,  Reservations.Status
                FROM Reservations
                JOIN User ON Reservations.UserID = User.id
                JOIN Rooms ON Reservations.RoomID = Rooms.RoomID";

            $result = $conn->query($sql);
            // Display reservations
            if ($result->num_rows > 0) {
                // Optionen für das Dropdown-Menü
                $statusOptions = array('neu', 'bestätigt', 'storniert');

                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["ReservationID"] . "</td>";
                    echo "<td>" . $row["FirstName"] . " " . $row["LastName"] . "</td>";
                    echo "<td>" . $row["RoomNumber"] . "</td>";
                    echo "<td>" . $row["RoomType"] . "</td>";
                    echo "<td>" . $row["CheckInDate"] . "</td>";
                    echo "<td>" . $row["CheckOutDate"] . "</td>";
                    echo "<td>";
                    echo "<form method='post' action='" . $_SERVER["PHP_SELF"] . "'>";
                    echo "<input type='hidden' name='reservationID' value='" . $row["ReservationID"] . "'>";
                    echo "<select name='newStatus' onchange='this.form.submit()'>";
                   
                    foreach ($statusOptions as $statusOption) {
                        $selected = ($row["Status"] == $statusOption) ? " selected" : "";
                        echo "<option value='$statusOption'$selected>$statusOption</option>";
                    }

                    echo "</select>";
                    echo "</form>";
                    echo "</td>";
                }
            } else {
                echo "<tr><td colspan='6'>No reservations found</td></tr>";
            }
            $conn->close();
            ?>
        </table>
    </div>
</body>



</html>