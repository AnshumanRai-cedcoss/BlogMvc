<?php
// session_start();
class Pages extends Controller
{
  public function __construct()
  {
    $this->userModel = $this->model('User');
    $this->blogModel = $this->model('Blog');
  }

  public function index()
  {
    $data = $this->blogModel->getBlogs();
    array_push($data, "user");
    $this->view('pages/home', $data);
  }
  public function login()
  {
    if (isset($_POST["signIn"])) {
      $email = $_POST["emailId"];
      $password = $_POST["pass"];
      $res = $this->userModel->verifyUser($email, $password);
      if (count($res) > 0) {
        $_SESSION["user"] = $res;
        // print_r($_SESSION["user"]);
        // die();
        foreach ($res as $key => $value) {
          if ($value["role"] == "admin") {
            $this->userDash($value["role"], 1);
          } else {
            if ($value["status"] == "pending") {
              echo "You are not approved";
            } else {
              $role = $value["role"];
              $this->userDash($role, $value["user_id"]);
            }
          }
        }
      } else {
        echo "Wrong id or password";
      }
    } else {
      $this->view('pages/login');
    }
  }

  public function home($role)
  {
    $data = $this->blogModel->getBlogs();
    array_push($data, $role);
    $this->view('pages/home', $data);
  }
  public function userDashboard($id)
  {
   if($id != 1)
   {
     $this->userDash("user", $id);
   }
   else {
    $this->userDash("admin", $id);
   }
  }
  public function userDash($role, $id)
  {
    if (isset($_POST["delBtn"])) {
      $bid = $_POST["delId"];
      $this->blogModel->deleteBlog($bid);
    }
    if ($role == "admin") {
      $result = $this->userModel->getUser($id);
      $this->view('pages/dashboard', $result);
    } else {
      $this->dashboardUser($id);
    }
  }
  public function dashboardUser($id)
  {
    $result = $this->userModel->getUser($id);
    $this->view('pages/dashboardUser', $result);
  }
  public function moreDetails()
  {

    if (isset($_POST["productInfo"])) {
      $id = $_POST["id"];
      $role = $_POST["role"];
      $data = $this->blogModel->oneProduct($id);
      array_push($data, $role);
      $this->view('pages/blogInfo', $data);
    }
  }
  // public function delete($id)
  // {
  //   $this->blogModel->deleteBlog($id);
  // }
  public function edit($id)
  {
    if (isset($_POST["submit2"])) {
      // die("hello");
      $id = $_POST["blogId"];
      $text = $_POST["blogText"];
      $title = $_POST["pname"];
      $oldImg = $_POST["old_img"];
      // die($oldImg);
      // echo "<pre>";
      // print_r($_FILES);
      // echo "</pre>";
      $img = $_FILES['c_image']['name'];
      $c_image_temp = $_FILES['c_image']['tmp_name'];
      $this->blogModel->updateProduct($id, $img, $c_image_temp, $oldImg, $text, $title);
    }
    $data = $this->blogModel->oneProduct($id);
    $this->view('pages/edit', $data);
  }
  public function users()
  {
    if (isset($_POST["chStatus"])) {
      $status = $_POST["status"];
      $id =  $_POST["id"];
      $this->userModel->updateStatus($status, $id);
    }
    if (isset($_POST["delete"])) {
      $id =  $_POST["deleteId"];
      $this->userModel->deleteUser($id);
    }
    $users = $this->userModel->getUsersInfo();
    $this->view('pages/users', $users);
  }
  public function signUp()
  {
    $user = "";
    if (isset($_POST["addUser"])) {
      $userName = $_POST["uName"];
      $email = $_POST["email"];
      $password = $_POST["password"];
      $user = $this->userModel->addNewUser($userName, $email, $password);
      // echo $user;
    }
    $this->view('pages/signUp', $user);
  }
  public function newBlog($id)
  {
    // die($id);
    if (isset($_POST["addButton"])) {
      $text = $_POST["blogText"];
      $title = $_POST["pname"];
      $img = $_FILES['c_image']['name'];
      $c_image_temp = $_FILES['c_image']['tmp_name'];
      $this->blogModel->newBlog($id, $img, $c_image_temp, $text, $title);
      $this->userDash("admin", $id);
    } else {
      $this->view('pages/newBlog');
    }
  }
  public function yourBlogs($id)
  {
    $result = $this->blogModel->userBlogs($id);
    array_push($result, "writer");
    $this->view('pages/home', $result);
  }
}
