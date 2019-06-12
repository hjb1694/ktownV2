<!DOCTYPE html>
<html lang="en">
    <?php require 'inc/head.view.php'; //HEAD ?>
    <body>
        <?php include 'inc/navbar.view.php'; //NAVBAR ?>
        
        <div class="container">
            <div class="container__mod--1">
                <?php include 'inc/sidenav.view.php'; //SIDENAV ?>
            </div>
            <div class="container__mod--2">
                <?php include 'inc/userarea.view.php'; //USERAREA ?>
            </div>
            <div class="container__mod--3">
                <main class="p-rem1">
                    <div style="font-family:LatoReg;border-radius:10px;box-shadow:0 0 1.5rem rgba(0,0,0,.3);padding:1rem;color:#686868;">
                        <p style="font-size:40px;"><i class="fa fa-info-circle"></i> Oh No!</p>
                        <p style="font-size:20px;">The page you are looking for does not exist.</p>
                    </div>








                </main>
            </div>
            <div class="container__mod--4">...</div>
        </div>

        <!-- Scripts -->
        <script src="assets/scripts/toggleNav.js"></script>
        <script src="assets/scripts/toggleSidenav.js"></script>
        <script src="assets/scripts/toggleUserArea.js"></script>
    </body>
</html>