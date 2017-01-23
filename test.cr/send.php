<?php
$salt = '!@$#%^$%&*^2&(*(*^m&Y$Y%$^%^^&%$j&$$))';
$pass = md5($salt . $_SERVER['REMOTE_ADDR']);
setcookie('l', $pass, time() + 30);
setcookie('t', base64_encode(time() + 30), time() + 30);
include "db_conn.php";

class input
{
    var $text;

    function __construct($arr)
    {
        $this->text[] = $arr[0];
        $this->text[] = $arr[1];
        $this->text[] = $arr[2];
        $this->text[] = $arr[3];
    }

    function send()
    {
        global $connection;
        $connection->query("INSERT INTO survey (fir,adv,sug,dis) VALUES ('{$this->text[0]}','{$this->text[1]}','{$this->text[2]}','{$this->text[3]}')");
    }
}
$arr =array(htmlspecialchars($_POST['fir']), htmlspecialchars($_POST['adv']), htmlspecialchars($_POST['sug']), htmlspecialchars($_POST['dis']));
if ($arr[0]==null) {
} else {
    $fir = new input($arr);
    $fir->send();
}
$connection->close();
?>
<META HTTP-EQUIV="Refresh" CONTENT="0; URL=index.php">
