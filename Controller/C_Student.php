

<?php
include_once("../Model/M_Student.php");
include_once("../Model/E_Student.php");

class Ctrl_Student{
    public function invoke(){
        $action = isset($_GET['action']) ? $_GET['action'] : 'default';
          // else if($action=='insert'){
        //     if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if(isset($_GET['stid'])){
            if(isset($_GET['action'])){
                
                $modelStudent = new Model_Student();
                $student = $modelStudent->getStudentDetail($_GET['stid']);
               
                // include_once("../View/StudentDetail.html");
                include_once("../View/EditStudent.html");
            }
            //xóa 
            else if(isset($_GET["delete"])){
                $modelStudent = new Model_Student();
                $modelStudent->DeleteStudent($_GET["stid"]);
                $students = $modelStudent->getAllStudent();
                include_once("../View/StudentListDelete.html");
            }
            else{
                $modelStudent = new Model_Student();
                $student = $modelStudent->getStudentDetail($_GET['stid']);
               
                include_once("../View/StudentDetail.html");
            }
            // Khi không có tham số 'stid' trong URL, nó sẽ tạo một đối tượng Model_Student, sau đó gọi phương thức getAllStudent() từ model để lấy danh sách tất cả sinh viên. 
            //Kết quả trả về sẽ được gán vào biến $studentList. Sau đó, file HTML StudentList.html sẽ được include và hiển thị cho người dùng.
        }
        else if(isset($_POST["insert"])){
            $id = $_POST['id'];
            $name = $_POST['name'];
            $age = $_POST['age'];
            $university = $_POST['university'];
            $studentModel = new Model_Student();
            $studentModel->AddStudent($id, $name, $age, $university);
            $studenList = $studentModel->getAllStudent();
            include_once('../View/StudentList.html');
        }
        else if(isset($_POST['edit'])){
            $id = $_POST['id'];
            $name = $_POST['name'];
            $age = $_POST['age'];
            $university = $_POST['university'];
            $studentModel = new Model_Student();
            $studentModel->UpdateStudent($id, $name, $age, $university);
            $students = $studentModel->getAllStudent();
   
            include_once("../View/StudentListUpdate.html");
            
        }
        else if(isset($_POST["search"])){
            $studentModel = new Model_Student();
            $students =$studentModel->SearchStudent($_POST['search_by'],$_POST['timkiem']);
      
            include_once("../View/FindDataSearch.html");
        }
        else if(isset($_GET["mod1"])){
            include_once("../View/insertForm.html");
        }
        //cập nhật 
        else if(isset($_GET["mod2"])){
            $modelStudent = new Model_Student();
            $students = $modelStudent->getAllStudent();
            include_once("../View/StudentListUpdate.html");
        }

        // Xóa 
        else if(isset($_GET["mod3"])){
            $modelStudent = new Model_Student();
            $students = $modelStudent->getAllStudent();
            include_once("../View/StudentListDelete.html");
        }
        // tìm kiếm 
        else if(isset($_GET["mod4"])){
            include_once("../View/SearchStudent.html");
        }
        // kiểm tra nếu ko có stid trong url thì lấy danh sách 
        else{
            $modelStudent = new Model_Student(); 
            $studentList=$modelStudent->getAllStudent();
            include_once("../View/StudentList.html");
        }
}};
$C_Student = new Ctrl_Student();
// nó kiểm tra xem có tồn tại tham số stid trong URL hay không. Nếu stid tồn tại, nó sẽ lấy thông tin chi tiết về một sinh viên cụ thể. Nếu không, nó sẽ lấy danh sách của tất cả sinh viên.
$C_Student->invoke();
?>