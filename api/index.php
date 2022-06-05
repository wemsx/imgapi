<?php
/*
* Oneword Open source project
* Version: 1.0
* Url:https://github.com/VikACG/oneword
* filename: index.php
* function: OneWord Main file
* Author @Zuoyi Chang
* Copyright © 2019 Vikasu Inc.
*/
$path = dirname(__FILE__);
$file = file($path."/wl.txt");

//Randomly read a line
$arr  = mt_rand( 0, count( $file ) - 1 );
$content  = trim($file[$arr]);

//Encoding judgment for outputting the corresponding response header code
if (isset($_GET['charset']) && !empty($_GET['charset'])) {
    $charset = $_GET['charset'];
    if (strcasecmp($charset,"gbk") == 0 ) {
        $content = mb_convert_encoding($content,'gbk', 'utf-8');
    }
} else {
    $charset = 'utf-8';
}

//Response header output,support cross-domain
header("Content-Type: text/html; charset=$charset");
header("Access-Control-Allow-Origin: *");

//Formatted judgment,output js or plain text
if ($_GET['format'] === 'js') {
    echo "function oneword(){document.write('" . $content ."');}";
} elseif ($_GET['format'] === 'img'){
    echo "document.write("<img src="" . $content .""height='' weight='' alt='' />");";
}else {
    echo $content;
}
