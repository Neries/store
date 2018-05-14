<?php


$params = include 'params.php';


//$params = [
//    'host' => '',      //Хост
//    'dbname' => '',      //Имя базы
//    'user' => '',      //Пользователь
//    'password' => '',   //Пароль
//    'charset' => 'utf8',        //Кодировка
//    'table' => '',      //Таблица
//    'column' => '',      //Поле где ищем
//    'num' =>                  //Номер поля что возвращаем(с нуля)
//];


$dsn = "mysql:host={$params['host']};dbname={$params['dbname']};charset={$params['charset']}";
$db = new PDO($dsn, $params['user'], $params['password']);


if(!empty($_POST["referal"])) {

    $referal = trim(strip_tags(stripcslashes(htmlspecialchars($_POST["referal"]))));

    $db_referal = $db->query("SELECT * FROM {$params['table']} search WHERE {$params['column']} LIKE '%$referal%'")
    or die('Ошибка №' . __LINE__ . '<br>Обратитесь к администратору сайта пожалуйста, сообщив номер ошибки.');


    while ($row = $db_referal->fetchColumn($params['num'])) {
        echo "<li class='search_result-list'><a href=''>" . $row . "</a></li>";
    }
}

