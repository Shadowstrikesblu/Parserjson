<html>
<head>
<title>JSON Parseur</title>
<style>
table {
    margin: 8px;
}

td{
    font-family: Arial, Helvetica, sans-serif;
    font-size: .7em;
    background:white;
    color: #black;
    padding: 2px 6px;
    border-collapse: separate;
    border: 1px solid #000;
}

td {
    font-family: Arial, Helvetica, sans-serif;
    font-size: .7em;
    border: 1px solid #DDD;
}
title{
    font-family: Arial, Helvetica, sans-serif;
    font-size: .7em;
}
</style>
</head>
<body>

<h1> Fichiers JSON parsé</h1>
<?php

$dir = "C:/Users/hmoul/OneDrive/Documents/Alternance/javaparser/ResumeParser/ResumeTransducer/";
$target_file = $dir . basename($_FILES["jsonfile"]["name"]);
if(isset($_POST["submit"])){
    $json = file_get_contents($target_file);
    $list = ["Summary","Education","Skills","Gender","Identity","Experience"];
    $jsonIterator = new RecursiveIteratorIterator(new RecursiveArrayIterator(json_decode(preg_replace('/[\x00-\x1F\x80-\xFF]/', '',$json),true)),RecursiveIteratorIterator::SELF_FIRST);
    echo '<table>';
    echo '<th>'."Information".'</th>';
    echo '<th>'."Parsed".'</th>';
    foreach ($jsonIterator as $key => $val) {
        if(is_array($val)) {
            } else {
                if(strpos($key,"_")!== false){
                    $key = str_replace("_"," ",$key);
                }
                echo '<tr>';
                    echo '<td>'.ucfirst($key).'</td>';
                    echo '<td>'.$val.'</td>';
                echo '</tr>';    
            }
                // print_r($val);
        }
    echo '</table>';
}

?>
</body>
</html>