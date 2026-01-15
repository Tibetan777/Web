<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>ข้อมูลที่บันทึก</title>
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

            .info-box {
                background: #F0FFFE;
                border-left: 5px solid #7FFFD4;
                padding: 20px;
                margin-bottom: 20px;
                border-radius: 8px;
                display: none;
            }

            .info-box.show {
                display: block;
            }

            .info-box.error {
                background: #FFE8E8;
                border-left-color: #FF6B6B;
                color: #C92A2A;
                text-align: center;
                font-size: 16px;
                padding: 30px;
            }

            .data-row {
                display: flex;
                justify-content: space-between;
                padding: 12px 0;
                border-bottom: 1px solid #E0F2F1;
            }

            .data-row:last-child {
                border-bottom: none;
            }

            .data-label {
                font-weight: 600;
                color: #2C7873;
                text-transform: uppercase;
                font-size: 12px;
                letter-spacing: 0.5px;
            }

            .data-value {
                color: #20B2AA;
                font-size: 14px;
                word-break: break-word;
                text-align: right;
                max-width: 50%;
            }

            .button-group {
                margin-top: 35px;
                display: flex;
                gap: 15px;
            }

            .btn {
                flex: 1;
                padding: 14px 25px;
                border: none;
                border-radius: 8px;
                font-size: 15px;
                font-weight: 600;
                cursor: pointer;
                transition: all 0.3s ease;
                text-transform: uppercase;
                letter-spacing: 1px;
                text-decoration: none;
                text-align: center;
                display: inline-block;
            }

            .btn-back {
                background: linear-gradient(135deg, #7FFFD4 0%, #20B2AA 100%);
                color: white;
                box-shadow: 0 8px 20px rgba(127, 255, 212, 0.3);
            }

            .btn-back:hover {
                transform: translateY(-2px);
                box-shadow: 0 12px 30px rgba(127, 255, 212, 0.4);
            }

            .btn-back:active {
                transform: translateY(0);
            }

            .success-icon {
                text-align: center;
                font-size: 50px;
                margin-bottom: 20px;
            }

            @media (max-width: 600px) {
                .container {
                    padding: 30px 20px;
                }

                h1 {
                    font-size: 24px;
                }

                .data-row {
                    flex-direction: column;
                    gap: 8px;
                }

                .data-value {
                    text-align: left;
                    max-width: 100%;
                }

                .button-group {
                    flex-direction: column;
                }
            }
        </style>
    </head>
    <body>
        <div class="container">
            <?php
                if(isset($_POST['save'])){
                    $user = $_POST['user'];
                    $pwd = $_POST['Pwd'];
                    $address = $_POST['address'];
                    $gender = $_POST['gender'];
                    $beverage = $_POST['beverage'];
            ?>
                <h1>✓ บันทึกสำเร็จ</h1>
                <div class="info-box show">
                    <div class="data-row">
                        <span class="data-label">ชื่อผู้ใช้</span>
                        <span class="data-value"><?php echo htmlspecialchars($user); ?></span>
                    </div>
                    <div class="data-row">
                        <span class="data-label">รหัสผ่าน</span>
                        <span class="data-value">••••••••</span>
                    </div>
                    <div class="data-row">
                        <span class="data-label">ที่อยู่</span>
                        <span class="data-value"><?php echo nl2br(htmlspecialchars($address)); ?></span>
                    </div>
                    <div class="data-row">
                        <span class="data-label">เพศ</span>
                        <span class="data-value"><?php echo htmlspecialchars($gender); ?></span>
                    </div>
                    <div class="data-row">
                        <span class="data-label">เครื่องดื่มโปรด</span>
                        <span class="data-value"><?php echo htmlspecialchars($beverage); ?></span>
                    </div>
                </div>
            <?php
                } else {
            ?>
                <h1>⚠️ ข้อผิดพลาด</h1>
                <div class="info-box show error">
                    <p>คุณไม่ได้กดปุ่มบันทึก</p>
                </div>
            <?php
                }
            ?>
                <div class="button-group">
                    <form name="frmBack" method="post" action="from1.php" style="flex: 1;">
                        <button type="submit" class="btn btn-back">← กลับไป</button>
                    </form>
                </div>
        </div>
    </body>
</html>