<?php
include("../config/koneksi.php");
$db = DBConnection();

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $NIP = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $level = "user";
    $query = "SELECT * FROM user WHERE username = '$NIP'";
    $result = $db->query($query)->fetchAll();
    if ($result == true) {
      $response = array('success' => '0');
      echo json_encode($response);
    }
    else {
      $query = "INSERT INTO user(username,password,email,level)VALUES('$username','$password','$email','$level')";
      $db->exec($query);
      $response = array('success' => '1');
      echo json_encode($response);
    }
  }

  else if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
    $input = file_get_contents("php://input");
    $result=json_decode($input);
    foreach($result->user as $row){
      $query = "UPDATE user SET username='$row->username',password='$row->password',email='$row->email' WHERE id_user = '$row->id_user'";
      $result = $db->exec($query);
      if ($result == false) {
        $response = array('success' => '0');
      }
      else {
        $response = array('success' => '1');
      }
      echo json_encode($response);
    }
  }

  else if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
    $input = file_get_contents("php://input");
    $result=json_decode($input);
    foreach($result->user as $row){
      $query = "DELETE FROM user WHERE id_user = '$row->id_user'";
      $result = $db->exec($query);
      if ($result == true) {
        $response = array('success' => '1');
      }
      else {
        $response = array('success' => '0');
      }
      echo json_encode($response);
    }
  }

  else if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (!empty($_GET['email']) AND !empty($_GET['password'])) {
      $email    = $_GET["email"];
      $password = $_GET["password"];
      $query = "SELECT * FROM user WHERE email = '$email' AND password = '$password'";
      $result = $db->query($query)->fetchAll();
      if ($result == true) {
        echo json_encode(array('login'=>$result,'success'=>'1'));
      }
      else {
        echo json_encode(array('success' => '0'));
      }
    }
    else if (!empty($_GET['id_user'])) {
      $id_user = $_GET['id_user'];
      $query = "SELECT * FROM user INNER JOIN pemesanan ON user.id_user = pemesanan.id_user WHERE user.id_user = '$id_user'";
      $result = $db->query($query)->fetchAll();
      if ($result == false) {
        $query = "SELECT * FROM user WHERE id_user = '$id_user'";
        $result = $db->query($query)->fetchAll();
        $count = count($result);
      }
      $count = count($result);
      echo json_encode(array('user'=>$result, 'jumlah'=>$count));
    }
    else {
      $query = "SELECT * FROM user ORDER BY id_user DESC";
      $result = $db->query($query)->fetchAll();
      echo json_encode(array('user'=>$result));
    }
  }
 ?>