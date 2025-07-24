<?php
/*Принимаем данные из формы*/
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

/*Подключаемся к базе даннных*/
$link = mysqli_connect("localhost", "root", "");
mysqli_select_db($link, "feedback");

/* Записываем данные в БД */ 
$sql = "INSERT INTO message(full_name, `e-mail`, message) VALUES ('$name', '$email', '$message')";
$result=mysqli_query($link, $sql);

/* Делаем редирект обратно */
header("Location: ".$_SERVER["HTTP_REFERER"]); 
exit;

/*обратно*/
/* Подключаемся к базе данных */
$link = mysqli_connect("localhost", "root", "");
mysqli_select_db($link, "feedback");

/* Выбираем данные */
$sql="SELECT full_name, 'e-mail', message FROM message";
$result=mysqli_query($link, $sql);

while ($line=mysqli_fetch_row($result)) {
echo "<b>ФИО:</b>".$line[0]."<br>";
echo "<b>Email:</b>".$line[1]."<br>";
echo "<b>Сообщение:</b>".$line[2]."<br>";
}

