<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
     
        }

         h3 {
            text-align: center;
            margin: 10px;
            font-size: 21px;
         
        }

        a {
            text-decoration: none;
            color: #333; /* You can customize the color */
          
        }

        a:hover {
            color: green; /* You can customize the color for hover state */
        }
    </style>
    <title>Ví Dụ mô hình MVC</title>
</head>
<body>
    <h1 style="color:red">Ví Dụ mô hình MVC</h1>
    <h2 style="color:pink">Chức Năng</h2>
    <h3><a href="CONTROLLER/C_Student.php">Xem sinh viên</a></h3>
    <h3><a href="CONTROLLER/C_Student.php?mod1='1'">Thêm sinh viên</a></h3>
    <h3><a href="CONTROLLER/C_Student.php?mod2='1'">Cập nhật sinh viên</a></h3>
    <h3><a href="CONTROLLER/C_Student.php?mod3='1'">Xóa sinh viên</a></h3>
    <h3><a href="CONTROLLER/C_Student.php?mod4='1'">Tìm kiếm sinh viên</a></h3>
</body>
</html>
