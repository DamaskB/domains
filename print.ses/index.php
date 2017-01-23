<?php
?>
<form enctype="multipart/form-data" action="send.php" method="POST">
    <input type="hidden" name="MAX_FILE_SIZE" value="44623620"/>
    Отправить этот файл: <input name="userfile" type="file"/>
    <input type="submit" value="Отправить файл"/>
</form>
<form action="login.php" method="POST">
    <input type="text" name="login"/>
    <input type="text" name="pass"/>
    <input type="submit" value="Войти"/>
</form>