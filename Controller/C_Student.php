

<?php
include_once("../Model/M_Student.php");
class Ctrl_Student{
    public function invoke(){
        if(isset($_GET['stid'])){
            $modelStudent = new Model_Student();
            $student = $modelStudent->getStudentDetail($_GET['stid']);
            include_once("../View/StudentDetail.html");
            echo"anh yeu em";
        }
        // kiểm tra nếu ko có stid trong url thì lấy danh sách 
        else{
            $modelStudent = new Model_Student(); 
            $studentList=$modelStudent->getAllStudent();
            include_once("../View/StudentList.html");
            echo "oki ma nhi ";
        }
}};
$C_Student = new Ctrl_Student();
// nó kiểm tra xem có tồn tại tham số stid trong URL hay không. Nếu stid tồn tại, nó sẽ lấy thông tin chi tiết về một sinh viên cụ thể. Nếu không, nó sẽ lấy danh sách của tất cả sinh viên.
$C_Student->invoke();
?>