<?php
$s = 'site/index,slug=>about';
print_r(unserialize($s));

//создаем массив
$exz = array();
$exz[]="apple";
$exz[]="red";
// сериализируем массив
print $ser1 = serialize($exz);
//преобразовываем в код php и выводим
print_r(unserialize($ser1));