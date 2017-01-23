<?php
$salt = '!@$#%^$%&*^2&(*(*^m&Y$Y%$^%^^&%$j&$$))';
$pass = md5($salt . 'good');
$login = 'login';
echo $pass . '<br>';
echo $cook = base64_encode($login . '@@@' . $pass);
echo '<br>' . $uncook = base64_decode('dXNlckBAQDBjMTE2YTgzMzY1NGIzYWJiM2ZiMDc3OGU5NWZkZTA3');
$pos = stripos($uncook, '@@@');
echo '<br>' . substr($uncook, 0, $pos);
echo '<br>' . substr($uncook, $pos + 3);
?>