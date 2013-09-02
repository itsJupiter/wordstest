<?php
$con = mysql_connect("localhost","root","chinaman");//连接数据库,mysql_connect的三个参数分别为数据库地址(一般为localhost)，帐户、和密码
if (!$con)
    {
        die('Could not connect: ' . mysql_error());
    }//如果连接失败则报错
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
$temp=mysql_query("SELECT word FROM Sheet1");
while($row=mysql_fetch_array($temp))
{
    $word=$row['word'];
    $meaningasqueried=getdata("完整版",$word,"meaning");
    updata("Sheet1",$word,"meaning",$meaningasqueried);
}

?>