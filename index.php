<?php
// BEGIN Member 1: Lorena Zeneli
session_start();

$conn = mysqli_connect("localhost", "root", "", "venue_db");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$result = mysqli_query($conn, "SELECT * FROM services");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elite Venue - Home</title>


    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>


<body>


    <header class="site-header">
        <div class="logo">
            <span class="logo-icon">EV</span>
            <span class="logo-text">Elite Venue</span>
        </div>

        <nav class="main-nav">
            <a href="index.php" class="active">Home</a>
            <a href="booking.php">Booking</a>
        </nav>
        <!--END Member 1: Lorena Zeneli -->

        <!-- BEGIN Member 2: Delfina Kukaj -->
        <div class="nav-profile">
            <?php if (isset($_SESSION['user_id'])): ?>
                <div class="profile-bubble">
                    <div class="profile-avatar">
                        <?= strtoupper(substr($_SESSION['user_name'], 0, 1)) ?>
                    </div>
                    <div class="profile-dropdown">
                        <p class="profile-name"><?= htmlspecialchars($_SESSION['user_name']) ?></p>
                        <a href="logout.php" class="logout-link">Log Out</a>
                    </div>
                </div>
            <?php else: ?>
                <a href="login.php" class="btn primary-btn">Login</a>
                <a href="register.php" class="btn ghost-btn">Register</a>
            <?php endif; ?>
        </div>
       
    </header>

   
    <main class="page-one">

        <?php if (isset($_SESSION['logout_msg'])): ?>
            <div class="logout-alert">
                <span>👋 <?= $_SESSION['logout_msg'] ?></span>
                <a href="login.php" class="logout-alert-link">Login again</a>
                <?php unset($_SESSION['logout_msg']); ?>
            </div>
        <?php endif; ?>
        <!-- END Member 2: Delfina Kukaj -->

        <! -- BEGIN Member 1: Lorena Zeneli -->
        <section class="hero">
            <div>
                <p class="eyebrow">Elite · Premium Event Venue</p>
                <h1>Where unforgettable moments come to life.</h1>


                <p class="hero-text">
                    Elegant spaces for weddings, birthdays, and corporate events.
                </p>


                <div class="hero-actions">
                    <a href="booking.php" class="btn primary-btn">Book Now</a>
                </div>
            </div>


            <div>
                <img src="images/venue.webp" class="hero-image">
            </div>
        </section>


        <section class="about">
            <div class="section-header">
                <h2>About Elite Venue</h2>
                <p>Luxury venue designed for unforgettable experiences.</p>
            </div>


            <div class="about-grid">
                <article class="about-item">
                    <h3>Weddings</h3>
                    <p>Elegant and romantic celebrations.</p>
                </article>


                <article class="about-item">
                    <h3>Private Events</h3>
                    <p>Perfect for birthdays and parties.</p>
                </article>


                <article class="about-item">
                    <h3>Corporate</h3>
                    <p>Professional business events.</p>
                </article>
            </div>
        </section>


        <section class="services">
            <div class="section-header">
                <h2>Our Services</h2>
            </div>


            <div class="services-grid">


                <?php
                while ($row = mysqli_fetch_assoc($result)) {


                    $name = strtolower($row['name']);


                    if ($name == "wedding hall") {
                        $img = "img1.jpg";
                    } elseif ($name == "birthday party") {
                        $img = "image2.jpg";
                    } else {
                        $img = "image3.jpg";
                    }


                    echo "<div class='service-card'>";
                    echo "<img src='images/$img' class='service-img'>";
                    echo "<h3>" . htmlspecialchars($row['name']) . "</h3>";
                    echo "<p>" . htmlspecialchars($row['description']) . "</p>";
                    echo "<p class='price'>" . htmlspecialchars($row['price']) . "€</p>";
                    echo "<a href='booking.php' class='btn primary-btn'>Book Now</a>";
                    echo "</div>";
                }
                ?>

            </div>
        </section>


    </main>


    <footer class="site-footer">
        <p>&copy; 2026 Elite Venue</p>
    </footer>


    <!-- End Member 1: Lorena Zeneli -->
</body>

</html>
