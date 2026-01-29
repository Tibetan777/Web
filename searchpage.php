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
    <title>ค้นหาข้อมูลสมาชิก</title>
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
            padding: 30px 20px;
        }

        .container {
            max-width: 1000px;
            margin: 0 auto;
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15);
            padding: 40px;
        }

        .header {
            margin-bottom: 40px;
            border-bottom: 3px solid #7FFFD4;
            padding-bottom: 20px;
        }

        h1 {
            color: #20B2AA;
            margin-bottom: 10px;
            font-size: 28px;
            font-weight: 600;
        }

        .welcome {
            color: #2C7873;
            font-size: 16px;
            font-weight: 500;
        }

        .search-section {
            margin-bottom: 30px;
        }

        .search-form {
            display: flex;
            gap: 10px;
            margin-bottom: 20px;
        }

        .search-form input {
            flex: 1;
            padding: 12px 15px;
            border: 2px solid #E0F2F1;
            border-radius: 8px;
            font-size: 14px;
            transition: all 0.3s ease;
        }

        .search-form input:focus {
            outline: none;
            border-color: #7FFFD4;
            box-shadow: 0 0 0 3px rgba(127, 255, 212, 0.2);
        }

        .search-form button {
            padding: 12px 25px;
            background: linear-gradient(135deg, #7FFFD4 0%, #20B2AA 100%);
            color: white;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            white-space: nowrap;
            box-shadow: 0 8px 20px rgba(127, 255, 212, 0.3);
        }

        .search-form button:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 30px rgba(127, 255, 212, 0.4);
        }

        .search-form button:active {
            transform: translateY(0);
        }

        .action-buttons {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .btn {
            padding: 12px 20px;
            border: none;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            text-align: center;
            white-space: nowrap;
        }

        .btn-primary {
            background: linear-gradient(135deg, #7FFFD4 0%, #20B2AA 100%);
            color: white;
            box-shadow: 0 8px 20px rgba(127, 255, 212, 0.3);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 30px rgba(127, 255, 212, 0.4);
        }

        .btn-danger {
            background: #FF6B6B;
            color: white;
            box-shadow: 0 8px 20px rgba(255, 107, 107, 0.3);
        }

        .btn-danger:hover {
            background: #FF5252;
            transform: translateY(-2px);
            box-shadow: 0 12px 30px rgba(255, 107, 107, 0.4);
        }

        .table-section {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        thead {
            background: linear-gradient(135deg, #7FFFD4 0%, #20B2AA 100%);
        }

        th {
            color: white;
            padding: 16px 12px;
            text-align: left;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 13px;
            letter-spacing: 0.5px;
        }

        td {
            padding: 14px 12px;
            border-bottom: 1px solid #E0F2F1;
            color: #2C7873;
            font-size: 14px;
        }

        tbody tr:hover {
            background: #F0FFFE;
        }

        tbody tr:last-child td {
            border-bottom: none;
        }

        .edit-link {
            display: inline-block;
            padding: 8px 12px;
            background: #7FFFD4;
            color: #2C7873;
            text-decoration: none;
            border-radius: 6px;
            font-weight: 600;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
            font-size: 13px;
        }

        .edit-link:hover {
            background: #20B2AA;
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(32, 178, 170, 0.3);
        }

        .no-data {
            text-align: center;
            color: #999;
            padding: 40px 20px;
            font-size: 16px;
        }

        @media (max-width: 768px) {
            .container {
                padding: 20px;
            }

            h1 {
                font-size: 24px;
            }

            .search-form {
                flex-direction: column;
            }

            .search-form button {
                width: 100%;
            }

            .action-buttons {
                flex-direction: column;
            }

            .action-buttons .btn {
                width: 100%;
            }

            table {
                font-size: 12px;
            }

            th, td {
                padding: 10px 8px;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>ค้นหาข้อมูลสมาชิก</h1>
            <div class="welcome">ยินดีต้อนรับ: <strong><?php echo htmlspecialchars($_SESSION['name_mem']) ?></strong></div>
            <div class="welcome">Email: <strong><?php echo htmlspecialchars($_SESSION['email_mem']) ?></strong></div>
        </div>

        <div class="search-section">
            <form name="frmsearch" action="searchpage.php" method="post" class="search-form">
                <input type="text" name="search" placeholder="ค้นหาจากชื่อ-นามสกุล" autocomplete="off">
                <button type="submit">🔍 ค้นหา</button>
            </form>
            <div class="action-buttons">
                <button type="button" class="btn btn-primary" onclick="location.href='insertpage.php'">➕ เพิ่มข้อมูล</button>
                <button type="button" class="btn btn-danger" onclick="location.href='logout.php'">🚪 ออกจากระบบ</button>
            </div>
        </div>

        <div class="table-section">
            <table>
                <thead>
                    <tr>
                        <th>ID ผู้ใช้</th>
                        <th>ชื่อ-นามสกุล</th>
                        <th>เพศ</th>
                        <th>เบอร์โทร</th>
                        <th>E-mail</th>
                        <th>การจัดการ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include 'dbconnect.php';
                    if (isset($_POST['search'])) {
                        $search = $_POST['search'];
                        $stmt = $con->prepare("SELECT * from members WHERE name_mem LIKE ?");
                        $wordlike = '%' . $search . '%';
                        $stmt->execute([$wordlike]);
                    } else {
                        $stmt = $con->prepare("SELECT * FROM members ORDER BY name_mem ASC");
                        $stmt->execute();
                    }
                    $hasData = false;
                    while ($row = $stmt->fetch()) {
                        $hasData = true;
                    ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['id_mem']); ?></td>
                            <td><?php echo htmlspecialchars($row['name_mem']); ?></td>
                            <td>
                                <?php
                                if ($row['sex_mem'] == 1) {
                                    echo "ชาย";
                                } else {
                                    echo "หญิง";
                                }
                                ?>
                            </td>
                            <td><?php echo htmlspecialchars($row['phone_mem']); ?></td>
                            <td><?php echo htmlspecialchars($row['email_mem']); ?></td>
                            <td><a href="editpage.php?id=<?php echo $row['id_mem'] ?>" class="edit-link">✏️ แกไข้</a></td>
                        </tr>
                    <?php
                    }
                    if (!$hasData) {
                    ?>
                        <tr>
                            <td colspan="6" class="no-data">ไม่พบข้อมูลสมาชิก</td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
