<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Tibetan Webpage</title>
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

            .form-group {
                margin-bottom: 25px;
            }

            label {
                display: block;
                color: #2C7873;
                font-weight: 600;
                margin-bottom: 8px;
                font-size: 14px;
                text-transform: uppercase;
                letter-spacing: 0.5px;
            }

            input[type="text"],
            input[type="password"],
            textarea,
            select {
                width: 100%;
                padding: 12px 15px;
                border: 2px solid #E0F2F1;
                border-radius: 8px;
                font-size: 14px;
                transition: all 0.3s ease;
                font-family: inherit;
            }

            input[type="text"]:focus,
            input[type="password"]:focus,
            textarea:focus,
            select:focus {
                outline: none;
                border-color: #7FFFD4;
                box-shadow: 0 0 0 3px rgba(127, 255, 212, 0.2);
            }

            textarea {
                resize: vertical;
                min-height: 100px;
            }

            .radio-group,
            .checkbox-group {
                display: flex;
                gap: 25px;
                margin-top: 10px;
            }

            .radio-group label,
            .checkbox-group label {
                display: flex;
                align-items: center;
                gap: 8px;
                margin-bottom: 0;
                text-transform: capitalize;
                font-weight: 500;
            }

            input[type="radio"],
            input[type="checkbox"] {
                width: 18px;
                height: 18px;
                cursor: pointer;
                accent-color: #7FFFD4;
            }

            .button-group {
                display: flex;
                gap: 15px;
                margin-top: 35px;
            }

            input[type="submit"],
            input[type="reset"] {
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
            }

            input[type="submit"] {
                background: linear-gradient(135deg, #7FFFD4 0%, #20B2AA 100%);
                color: white;
                box-shadow: 0 8px 20px rgba(127, 255, 212, 0.3);
            }

            input[type="submit"]:hover {
                transform: translateY(-2px);
                box-shadow: 0 12px 30px rgba(127, 255, 212, 0.4);
            }

            input[type="submit"]:active {
                transform: translateY(0);
            }

            input[type="reset"] {
                background: #F0F0F0;
                color: #2C7873;
                border: 2px solid #E0F2F1;
            }

            input[type="reset"]:hover {
                background: #E8F4F3;
                border-color: #7FFFD4;
            }

            @media (max-width: 600px) {
                .container {
                    padding: 30px 20px;
                }

                h1 {
                    font-size: 24px;
                }

                .radio-group,
                .checkbox-group {
                    flex-direction: column;
                    gap: 12px;
                }

                .button-group {
                    flex-direction: column;
                }
            }
        </style>
    </head>
    <body>
        <div class="container">
            <h1>ลงทะเบียน</h1>
            <form name="frmRegis" method="post" action="from2.php">
                <div class="form-group">
                    <label for="user">ชื่อผู้ใช้</label>
                    <input type="text" id="user" name="user" maxlength="25" required>
                </div>

                <div class="form-group">
                    <label for="pwd">รหัสผ่าน</label>
                    <input type="password" id="pwd" name="Pwd" maxlength="8" required>
                </div>

                <div class="form-group">
                    <label for="address">ที่อยู่</label>
                    <textarea id="address" name="address" required></textarea>
                </div>

                <div class="form-group">
                    <label>เพศ</label>
                    <div class="radio-group">
                        <label>
                            <input type="radio" name="gender" value="ชาย" required>
                            ชาย
                        </label>
                        <label>
                            <input type="radio" name="gender" value="หญิง" required>
                            หญิง
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label>งานอดิเรก</label>
                    <div class="checkbox-group">
                        <label>
                            <input type="checkbox" name="Hobby" value="อ่านหนังสือ">
                            อ่านหนังสือ
                        </label>
                        <label>
                            <input type="checkbox" name="Hobby" value="ดูทีวี">
                            ดูทีวี
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label for="beverage">เครื่องดื่มโปรด</label>
                    <select id="beverage" name="beverage" required>
                        <option value="">-- เลือกเครื่องดื่ม --</option>
                        <option value="ชาเย็น">ชาเย็น</option>
                        <option value="ชามะนาว">ชามะนาว</option>
                        <option value="กาแฟ">กาแฟ</option>
                    </select>
                </div>

                <div class="button-group">
                    <input type="submit" name="save" value="บันทึก">
                    <input type="reset" value="ยกเลิก">
                </div>
            </form>
        </div>
    </body>
</html>