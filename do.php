<?php
$con = mysql_connect("localhost","root","chinaman");
if (!$con)
    {
        die('Could not connect: ' . mysql_error());
    }
mysql_select_db("toefl", $con);
function getdata($sheet,$word,$column)
{
    $temp=mysql_query("SELECT * FROM $sheet WHERE word='$word' ");
    $row=mysql_fetch_array($temp);
    $result=$row[$column];
    return $result;
}
function updata($sheet,$word,$column,$data)
{
    mysql_query("UPDATE $sheet SET $column = '$data' WHERE word = '$word'");
    return 1;
}
$temp=mysql_query("SELECT * FROM list");
while($row=mysql_fetch_array($temp))
{
    $word=$row['word'];
	$type=$row['type'];
	$near=$row['near'];
    $meaningasqueried=getdata("完整版",$word,"meaning");
	$typeasqueried=getdata("完整版",$word,"type");
	$nearasqueried=getdata("完整版",$word,"near");
    updata("list",$word,"meaning",$meaningasqueried);
	updata("list",$word,"type",$typeasqueried);
	updata("list",$word,"near",$nearasqueried);
}

?>