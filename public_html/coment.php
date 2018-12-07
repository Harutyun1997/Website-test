<?php
require_once "../include/database.php";?>

<?php

class Comment_name extends database
{
    public static $table_name = 'comment';
    public static $db_fields = [
        'id',
        'name',
        'comment',
        'data'
    ];
    public $id;
    public $name;
    public $comment;
    public $data;
}

$com = new Comment_name();

//  variables and set to empty values
$name = $comment = "";
$nameErr = $commentErr = "";
$i = 0;
$arr = [];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $arr = json_decode($_POST["name"]);
    foreach ($arr as $value) {
        $value = $com->clear_value($value);
    }
    $name = $arr[0];
    $comment = $arr[1];

    $data = date("Y-m-d H:i:s");


    $com->name = $name;
    $com->comment = $comment;
    $com->data = $data;
    $com->set_comment();


    echo json_encode($com->get_table());
} else {
    exit();
}













