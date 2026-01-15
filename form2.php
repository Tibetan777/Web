<html lang="en">
    <head>
        <title>regispage</title>
    </head>
    <body>
        <?php
        if(isset($_POST['save'])){
        $user = $_POST['user'];
        $pwd = $_POST['pwd'];
        echo "$user <br>";
        echo "$pwd <br>";
        }
        else{
        echo "You didn't press save.";
        }
        ?>
    </body>
</html>