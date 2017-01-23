<?php
$salt = '!@$#%^$%&*^2&(*(*^m&Y$Y%$^%^^&%$j&$$))';
$pass = md5($salt . $_SERVER['REMOTE_ADDR']);
$t = base64_decode($_COOKIE['t']);
?>
<meta charset="utf-8">
<STYLE type="text/css">
    <!--
    * {
        text-align: center;
        font-size: 20px;
    }

    body {
        background-image: url("back.jpg");
    }

    form {
        padding-top: 40px;
    }

    textarea {
        opacity: 0.9;
        color: white;
        text-align: left;
        width: 40%;
        background-color: black;
        margin-bottom: 40px;
        height: 200px;
        display: inline-block;
        border-radius: 10px;
        padding: 10px;
    }

    textarea:nth-child(1), textarea:nth-child(4) {
        margin-right: 5%;
    }

    input:active {
        background-color: steelblue;
    }

    input:hover {
        background-color: darkcyan;
    }

    input {
        border-radius: 10px;
        height: 50px;
        width: 15%;
        font-size: 24px;
        font-weight: bold;
        color: #E5FFFF;
        background-color: slategrey;
        border: 1px solid grey;
    }

    -->
</STYLE>
<title>Опрос</title>
<form action="send.php" method="POST">
    <textarea name="fir" required placeholder="Первое..."></textarea>
    <textarea name="adv" required placeholder="Второе..."></textarea><br>
    <textarea name="sug" required placeholder="Третье..."></textarea>
    <textarea name="dis" required placeholder="Четвертое..."></textarea><br>
    <?php
    if ($_COOKIE['l'] == $pass) {

    }
    echo '<input class="send" type="submit" value="Отправить">';
    ?>

</form>
