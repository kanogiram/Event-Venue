<?php
// BEGIN Member 2: Delfina Kukaj
// Include this at the top of index.php (and any other page) to show the nav with profile
if (session_status() === PHP_SESSION_NONE) session_start();
?>

<header class="site-header">
    <div class="logo">
        <span class="logo-icon">V</span>
        <span class="logo-text">VenueBook</span>
    </div>

    <nav class="main-nav">
        <a href="index.php" class="active">Home</a>
        <a href="services.php">Services</a>
        <a href="about.php">About</a>
        <a href="contact.php">Contact</a>
    </nav>

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
<!-- END Member 2: Delfina Kukaj -->
