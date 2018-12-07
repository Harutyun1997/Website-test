<?php
require_once "../include/database.php";


class Login extends database
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

$user = new Login();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $arr = json_decode($_POST["name"]);
    foreach ($arr as $value) {
        $value = $user->clear_value($value);
    }

    $email = $arr[0];
    $password = $arr[1];


    $persons = $user->get_table();
    foreach ($persons as $person) {
        if ($person[email] === $email) {
            if ($person[password] === $password) {
                echo "Yes to men";
                exit();
            } else {
                echo "password or login is not correct";
                exit();
            }
        }
    }
    echo "password or login is not correct";
    exit();
}