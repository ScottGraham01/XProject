<?php
include "app/repositories/PostRepository.php";
class HomeController
{

    public function index(){
        //Lấy dữ liệu từ Model: ko lấy ra gì hết

        //Gọi ra View
        include("app/views/index.php");
    }

    public function admin(){
        //Lấy dữ liệu từ Model: ko lấy ra gì hết
        //PostRepository trả về Danh sách Bài viết
        $postRepoObj = new PostRepository();
        $posts = $postRepoObj->getAllPosts();
        //Gọi ra View
        include("app/views/feed.php");
    }

    public function error(){
        include("app/views/error.php");
    }


}