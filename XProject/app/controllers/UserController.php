<?php
include "app/repositories/UserRepository.php";
class UserController {
    public function index(){
        //Gọi dữ liệu ra
        $userRepo = new UserRepository();
        $users = $userRepo->getAllUsers();
        include "app/views/admin/users/index.php";
    }

    public function home(){
        echo "home function of UserController";
    }

    public function add(){
        //Lấy các giá trị từ FORM
        if(isset($_POST['txtUsername'])){
            $username  = $_POST['txtUsername'];
        }
        if(isset($_POST['txtEmail'])){
            $email  = $_POST['txtEmail'];
        }
        if(isset($_POST['txtPassword'])){
            $password  = $_POST['txtPassword'];
        }
        //Tạo và thiết lập đối tượng User
        $user = new User();
        $user->setUsername($username);
        $user->setEmail($email);
        $user->setPassword($password);
        //Truyền và gọi tới saveRegister() của UserRepository
        $userRepo = new UserRepository();
//        $userRepo->saveRegister($user);
        if($userRepo->saveRegister($user) == true){
            header("Location:index.php?c=home&a=index&success=true");
        }else{
            header("Location:index.php?c=home&a=error&success=false");
        }
    }

}
