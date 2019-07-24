<!-- Here you'll have to enter the PIN for the Server you want to control -->

<!DOCTYPE html>
<html>
    <head>
        <?php include '../scripts/head.php' ?>
    </head>
    <body>
        <div class="out_login_bg">
            <div class="out_login_overlay">
                <div class="out_login_toast">
                    <h1>Want to manage A Server?</h1>
                    <hr>
                    <form action="check-pin.php" method="post">
                        <input placeholder="Enter Server Pin" class="serverpin">
                        <button type="submit" class="submit">Check my pin</button>
                    </form>
                    <?php
                        if(isset($_GET['login_error'])) {
                        ?>
                        <div class="error_pin">
                            <?php echo $_GET['login_error'] ?>
                        </div>
                        <?php
                        }
                    ?>
                </div>
            </div>
        </div>
    </body>
</html>