<?php
session_start();
if (!isset($_SESSION['email_mem'])) {
    header("Location: loginpage.php");
}
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>searchpage</title>
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

        label {
            display: block;
            color: #2C7873;
            font-weight: 600;
            font-size: 15px;
            padding: 15px;
            background: #F0FFFE;
            border-left: 5px solid #7FFFD4;
            border-radius: 8px;
        }

        label strong {
            color: #20B2AA;
            font-size: 16px;
            display: block;
            margin-top: 5px;
        }

        button {
            padding: 14px 25px;
            border: none;
            border-radius: 8px;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 1px;
            background: linear-gradient(135deg, #FF6B6B 0%, #FF5252 100%);
            color: white;
            box-shadow: 0 8px 20px rgba(255, 107, 107, 0.3);
        }

        button:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 30px rgba(255, 107, 107, 0.4);
        }

        button:active {
            transform: translateY(0);
        }

        @media (max-width: 600px) {
            .container {
                padding: 30px 20px;
            }

            h1 {
                font-size: 24px;
                margin-bottom: 30px;
            }

            label {
                font-size: 14px;
                padding: 12px;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>ยินดีต้อนรับ</h1>
        <form name="frmmanagemem" method="POST" action="managemem.php">
            <label>E-mail: <strong><?php echo htmlspecialchars($_SESSION['email_mem']) ?></strong></label>
            <label>Name: <strong><?php echo htmlspecialchars($_SESSION['name_mem']) ?></strong></label>
            <button type="button" name="logout" onclick="location.href='logout.php'">LogOut</button>
        </form>
    </div>
</body>

</html>