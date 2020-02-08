<?php
include_once ('classes.php');
$st1=$_GET['string1'];
$st2=$_GET['string2'];
//echo Hamming::hammingCost($st1,$st2);
echo "you need ".Levenshtein::levenshteinCost($st1,$st2)." step to convert st1 to st2";