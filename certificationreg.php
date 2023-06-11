 	
<!DOCTYPE html>
<head>
   <title>Запись на аттестацию</title>
   <meta charset="utf-8">
   <meta name='viewport' content='width=device-width,initial-scale=1'/>
   <link rel="stylesheet" href="style.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> 
   <script src="script.js"></script>
</head>

<body>
<?php

session_start();
 
$login=$_SESSION['login'];
if (!$login)
{
	echo '<style>.authoris-check { display:block;}</style>';

}
else
{
	echo '<style>.formregistration { display:block;}</style>';
}
?>

 <header>
    <a href="index.html"><img src="images\logo.png" alt="Логотип"></a>
	<h1>Программные технологии Интернета</h1>
 </header>


 <div class="navig-container">
	<div class="navig"><a href="index.html">О себе</a> </div>
    <div class="navig"><a href="resume.html">Резюме</a> </div>
    <div class="navig"><a href="certificationreg.php">Запись на аттестацию</a> </div>
	<div class="navig"><a href="login.html">Войти или зарегистрироваться</a> </div>
 </div>

<div class="div-3">
<div class="div-1">

<div class="authoris-check">
<form action="login.html">
 <p>Для продолжения необходимо <input type=submit value="зарегистрироваться или войти" id="registrationbtn"> </p>
</form>
</div>

<form method="post" action="certifreg.php" >
<div class="formregistration"> 
   <label for="surname">Фамилия</label>
  <input type="text" id="surname" name="surname" required><Br>
   <label for="name">Имя</label>
  <input type="text" id="name" name="name" required><Br>

  <p><b>Выбреите предмет:</b><Br>
  <select id="subject" name="subject">
  <option value="Математикe">Математика</option>
  <option value="Физикe">Физика</option>
  <option value="Литературe">Литература</option>
  </select>

  <p><b>Выбреите время:</b><Br>
   <input type="radio" name="time" value=" 9.00-10.00" checked> 9.00-10.00<Br>
   <input type="radio" name="time" value="10.30-11.30"> 10.30-11.30<Br>
   <input type="radio" name="time" value="12.00-13.00"> 12.00-13.00<Br>
   <input type="radio" name="time" value="13.30-14.30"> 13.30-14.30<Br>
  </p>
  
  <fieldset>
    <legend>Выберите форму контроля</legend>
    <div>
      <input type="checkbox" id="test" name="from[]" value="Тест" checked>
      <label for="test">Тест</label>
    </div>
    <div>
      <input type="checkbox" id="interview" name="form[]" value="Собеседование">
      <label for="interview">Собеседование</label>
    </div>
    <div>
      <input type="checkbox" id="report" name="form[]" value="Доклад">
      <label for="report">Доклад</label>
    </div>
	<div>
      <input type="checkbox" id="verifwork" name="form[]" value="Контрольная работа">
      <label for="verifwork">Контрольная работа</label>
    </div>
  </fieldset>
  
   <p>Дополнительная информация<Br>
   <textarea name="comment" id="comment" cols="70" rows="3"></textarea></p>
   
   <button onclick="registration()" type="button" id="registerbtn">Отправить</button><Br>
</div>   
<div class="form-success" id="form-success-text">
  <Br><input type=submit value="Подтвердить"><Br>
 </form>
 

   <Br>Нажмите <button onclick="show_members()" type="button">здесь</button>, чтобы открыть список всех участников.
<div class="members-table">
<?php

session_start();

$dbconn = pg_connect("host=localhost port=5431 dbname=postgres user=postgres password=admin");

$query = "SELECT * FROM members";
$sqlQuery = pg_query($query);


echo "<table>\n";
for($lt = 0; $lt < pg_num_rows($sqlQuery); $lt++) {
    echo "<tr>\n";
    echo "<td>" . pg_result($sqlQuery, $lt, 0) . "</td>\n";
    echo "<td>" . pg_result($sqlQuery, $lt, 2) . "</td>\n";
    echo "</tr>\n";
}
echo "</table>\n";

exit;
?>
  </div> 
</div>
  
</form>
 </div> </div>


 <footer> 
    <p>Сайт разработан ФИ, Copyright ©2023</p> 
	<img src="images\socialmedia1.png" 
	    width="60"
        height="60"
	    alt="СоцМедиа1">   
   	<img src="images\socialmedia2.png"
	    width="60"
        height="60"
		alt="СоцМедиа2">
	
	<img src="images\socialmedia3.png"
	    width="60"
        height="60"
    	alt="СоцМедиа3">
 </footer>

</body>