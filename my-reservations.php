<?php
// BEGIN Member: Arbenita Shala
session_start();

$conn = mysqli_connect("localhost", "root", "", "venue_db");

if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

/* DELETE */
if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM bookings WHERE id=$id");
}

/* UPDATE */
if(isset($_POST['update'])){
    $id = $_POST['id'];
    $date = $_POST['event_date'];
    $notes = $_POST['notes'];

    mysqli_query($conn, "UPDATE bookings 
        SET event_date='$date', notes='$notes'
        WHERE id=$id");
}

/* SELECT */
$result = mysqli_query($conn, "
    SELECT bookings.*, services.name 
    FROM bookings, services
    WHERE bookings.service_id = services.id
    AND bookings.user_id = $user_id
");
?>

<!DOCTYPE html>
<html>
<head>
    <title>My Reservations</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<main class="page-one">
    <h2>My Reservations</h2>

    <?php
    if(mysqli_num_rows($result) == 0){
        echo "<p>No reservations found.</p>";
    }

    while($row = mysqli_fetch_assoc($result)){
    ?>

    <div class="service-card">
        <h3><?php echo $row['name']; ?></h3>

        <form method="POST">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

            Date:
            <input type="date" name="event_date" value="<?php echo $row['event_date']; ?>"><br><br>

            Notes:
            <textarea name="notes"><?php echo $row['notes']; ?></textarea><br><br>

            <button name="update" class="btn primary-btn">Update</button>
            <a href="?delete=<?php echo $row['id']; ?>" class="btn ghost-btn">Delete</a>
        </form>
    </div>

    <?php } ?>

</main>
    <!-- End Member : Arbenita Shala --> 
</body>
</html>

</body>
</html>
