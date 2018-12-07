<?php
require_once "../include/database.php";

class Register extends database
{
    public static $table_name = 'users';
    public static $db_fields = [
        'id',
        'name',
        'email',
        'password',
    ];
    public $id;
    public $name;
    public $email;
    public $password;
}

$user = new Register();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $arr = json_decode($_POST["name"]);
    foreach ($arr as $value) {
        $value = $user->clear_value($value);
    }

    $name = $arr[0];
    $email = $arr[1];
    $password = $arr[2];
    $request = [];

    $persons = $user->get_table();
    foreach ($persons as $person) {
        if ($person[email] == $email) {
            echo "Such mail exists";
            exit();
        }
    }


    $user->name = $name;
    $user->email = $email;
    $user->password = $password;
    $user->set_date();

    echo "Good like";
    exit();

} else {
    exit();
}