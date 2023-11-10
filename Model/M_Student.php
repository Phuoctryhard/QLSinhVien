
<?php
include_once("../Model/E_Student.php");


class Model_Student {
  
    public function __construct() {}
    public function getAllStudent () {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "dulieu";
        $conn = mysqli_connect($servername, $username, $password) or die("Connection failed: " );
        mysqli_select_db($conn, $dbname);
        $sql = "SELECT * from sinhvien";
        $rs = mysqli_query($conn, $sql);
        $i=0;
        while($row = mysqli_fetch_array($rs)) {
        $id = $row['id'];
        $name = $row['name'];
        $age = $row['age'];
        $university = $row['university'];
        // while ($i!=$id) $i++;
       
        $students[$id] = new Entity_Student($id, $name, $age, $university);
        }
        // foreach($students as $student ) {
        //    echo ''.$student->name.'          '.$student->age.'';
        // }
       
    return $students;
}
public function getStudentDetail ($stid) {
// Load du lieu tu CSDL
    $allStudent = $this->getAllStudent();
     return $allStudent [$stid];
}
public function AddStudent($id, $name, $age, $university) {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "dulieu";
    // Establish a database connection
    $conn = mysqli_connect($servername, $username, $password, $dbname) or die("Connection failed: " . mysqli_connect_error());

    // Use prepared statement to prevent SQL injection
    $sql = "INSERT INTO sinhvien (id, name, age, university) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {
        // Bind parameters to the prepared statement
        mysqli_stmt_bind_param($stmt, "ssss", $id, $name, $age, $university);

        // Execute the prepared statement
        if (mysqli_stmt_execute($stmt)) {
            // Thêm sinh viên thành công
    
        } else {
            // Lỗi khi thêm sinh viên
            die("Lỗi khi thêm sinh viên: " . mysqli_error($conn));
        }

        // Close the prepared statement
        mysqli_stmt_close($stmt);
    } else {
        die("Lỗi trong quá trình chuẩn bị truy vấn: " . mysqli_error($conn));
    }

    // Close the database connection
    mysqli_close($conn);
}
    function UpdateStudent($id,$name,$age,$university) {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "dulieu";
        // Establish a database connection
        $conn = mysqli_connect($servername, $username, $password, $dbname) or die("Connection failed: " . mysqli_connect_error());
        $sql = "UPDATE  sinhvien SET id = '$id' , name ='$name',age = '$age',university = '$university' Where id ='$id' ";
        mysqli_query($conn, $sql);
        mysqli_close($conn);
    }
    function DeleteStudent($id) {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "dulieu";
        // Establish a database connection
        $conn = mysqli_connect($servername, $username, $password, $dbname) or die("Connection failed: " . mysqli_connect_error());
        $delete_query = "DELETE FROM sinhvien WHERE id = '$id'";
        mysqli_query($conn, $delete_query);
        mysqli_close($conn);
    }
    function SearchStudent($search , $input) {   
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "dulieu";
        // Establish a database connection
        $conn = mysqli_connect($servername, $username, $password, $dbname) or die("Connection failed: " . mysqli_connect_error());
        $sql = "SELECT * FROM sinhvien WHERE $search= '$input'";
        $rs = mysqli_query($conn,$sql);
         // Check if there are any rows returned
         $data = [];

         if (mysqli_num_rows($rs) > 0) {
             // Process and store the data
             while ($row = mysqli_fetch_assoc($rs)) {
                 // Process each row as needed
                 // For example, you can store each row in an array
                 // có phần tử là thêm vào 
                 $data[] = $row;
             }
         }
 
         // Close the database connection
         mysqli_close($conn);
 
         // Return the data to the controller
         return $data;
     }
 }
?>