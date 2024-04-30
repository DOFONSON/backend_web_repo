<?php
    $db = require('db.php');
    $connect = mysqli_connect($db['host'], $db['user'], $db['password'], $db['database']);
    if (mysqli_connect_errno()) echo mysqli_connect_error();


    if(isset($_POST['save'])) {
        $sql = "INSERT INTO `nodes`(`firstname`, `name`, `lastname`, `gender`, `date`, `telephone`, `email`, `addres`, `comment`) 
        VALUES ('".htmlspecialchars($_POST['firstname'])."',
        '".htmlspecialchars($_POST['name'])."',
        '".htmlspecialchars($_POST['lastname'])."',
        '".($_POST['gender'])."',
        '".($_POST['date'])."',
        '".($_POST['telephone'])."',
        '".htmlspecialchars($_POST['email'])."',
        '".htmlspecialchars($_POST['addres'])."',
        '".htmlspecialchars($_POST['comment'])."'
        )";

        mysqli_query($connect, $sql);
        if (mysqli_errno($connect)) echo 'Ошибка запроса: '.mysli_error($connect);
        else $s = 'Запись успешна добавлена';
    }
    
    if(isset($_POST['update'])) {
        $sql = "UPDATE `nodes` SET `firstname`='".htmlspecialchars($_POST['firstname'])."',
        `name`='".htmlspecialchars($_POST['name'])."',
        `lastname`='".htmlspecialchars($_POST['lastname'])."',
        `gender`='".($_POST['gender'])."',
        `date`='".($_POST['date'])."',
        `telephone`='".($_POST['telephone'])."',
        `email`='".htmlspecialchars($_POST['email'])."',
        `addres`='".htmlspecialchars($_POST['addres'])."',
        `comment`='".htmlspecialchars($_POST['comment'])."' 
        WHERE `id`=".$_POST['id'];

        mysqli_query($connect, $sql);
        if (mysqli_errno($connect)) echo 'Ошибка запроса: '.mysli_error($connect);
        else $s = 'Запись с id '.$_POST['id'].' успешна добавлена';
    }

    if(isset($_GET['del'])) {
        $id = $_GET['del'];
        $sql = "DELETE FROM `nodes` WHERE `id` = $id";

        mysqli_query($connect, $sql);
        if (mysqli_errno($connect)) echo 'Ошибка запроса: '.mysli_error($connect);
        else $s = 'Запись с id '.$_GET['del'].' успешна удалена';
    }
    
    if (!isset($_GET['p'])) $_GET['p'] = 'view';
    if (!isset($_GET['o'])) $_GET['o'] = 'id';
    if (!isset($_GET['page'])) $_GET['page'] = '0';
    
    require('header.php');
    if ($_GET['p'] == 'view' || $_GET['p'] == 'add' ||  $_GET['p'] == 'update' ||  $_GET['p'] == 'delete') require($_GET['p'].'.php');



    require('footer.html');