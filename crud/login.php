<?php
    session_start();
    include "../pages/user/koneksi.php";

    $data = json_decode(file_get_contents("php://input"));

    $sql = "SELECT * FROM user WHERE email = '$data->email'";
    $result = $koneksi->query($sql);
    if($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            if($row['password'] == $data->pass) {
                $_SESSION['isLogin'] = true;
                echo json_encode(["status" => "success","message"=> "Login berhasil"]);
            }
        }
    } else {
        echo json_encode(["status" => "error","message"=> "Terjadi error"]);
    }