<?php
session_start();
include ('dbconnect.php');
if (isset($_POST['submit'])) {
    if(isset($_POST['email_mem']) && isset($_POST['password_mem'])){
        $email_mem = trim($_POST['email_mem']);
        $password_mem = trim($_POST['password_mem']);
        try{
            $stmt = $con->prepare("SELECT * FROM members WHERE email_mem = ? AND password_mem = ?");
            $stmt->execute([$email_mem, $password_mem]);
            $em = $stmt->fetch();
            if ($em == true){
                $_SESSION["id_mem"] = $em['id_mem'];
                $_SESSION["name_mem"] = $em['name_mem'];
                $_SESSION["email_mem"] = $em['email_mem'];
                header("Location: searchpage.php");
                exit();
            }
            else {
                $error_msg = "กรุณาใส่ E-mail และ Password ให้ถูกต้อง";
            }
        } catch (Exception $e){
            $error_msg = "เกิดข้อผิดพลาด";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เข้าสู่ระบบ</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #7FFFD4 0%, #98FF98 100%);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .container {
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15);
            padding: 50px;
            max-width: 500px;
            width: 100%;
        }

        h1 {
            color: #20B2AA;
            text-align: center;
            margin-bottom: 40px;
            font-size: 28px;
            font-weight: 600;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        input[type="email"],
        input[type="password"],
        input[type="submit"] {
            padding: 12px 15px;
            border-radius: 8px;
            border: none;
            font-size: 14px;
            font-family: inherit;
            transition: all 0.3s ease;
        }

        input[type="email"],
        input[type="password"] {
            border: 2px solid #E0F2F1;
            color: #2C7873;
        }

        input[type="email"]:focus,
        input[type="password"]:focus {
            outline: none;
            border-color: #7FFFD4;
            box-shadow: 0 0 0 3px rgba(127, 255, 212, 0.2);
        }

        input[type="email"]::placeholder,
        input[type="password"]::placeholder {
            color: #999;
        }

        input[type="submit"] {
            background: linear-gradient(135deg, #7FFFD4 0%, #20B2AA 100%);
            color: white;
            font-weight: 600;
            cursor: pointer;
            text-transform: uppercase;
            letter-spacing: 1px;
            box-shadow: 0 8px 20px rgba(127, 255, 212, 0.3);
            padding: 14px 25px;
        }

        input[type="submit"]:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 30px rgba(127, 255, 212, 0.4);
        }

        input[type="submit"]:active {
            transform: translateY(0);
        }

        .alert {
            background: #FFE8E8;
            border-left: 5px solid #FF6B6B;
            color: #C92A2A;
            padding: 15px;
            border-radius: 8px;
            text-align: center;
            font-weight: 500;
            margin-bottom: 20px;
        }

        @media (max-width: 600px) {
            .container {
                padding: 30px 20px;
            }

            h1 {
                font-size: 24px;
                margin-bottom: 30px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>เข้าสู่ระบบ</h1>
        <?php if (!empty($error_msg)): ?>
            <div class="alert"><?php echo $error_msg; ?></div>
        <?php endif; ?>
        <form name="frmpage" action="loginpage.php" method="POST">
            <input type="email" name="email_mem" placeholder="อีเมล์" required>
            <input type="password" name="password_mem" placeholder="รหัสผ่าน" required>
            <input type="submit" name="submit" value="เข้าสู่ระบบ">
        </form>
    </div>
</body>
</html>