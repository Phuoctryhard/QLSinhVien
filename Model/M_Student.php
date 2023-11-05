
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
        foreach($students as $student ) {
           echo ''.$student->name.'          '.$student->age.'';
        }
       
    return $students;
}
public function getStudentDetail ($stid) {
// Load du lieu tu CSDL
    $allStudent = $this->getAllStudent();
     return $allStudent [$stid];
}
}
?>