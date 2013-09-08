<?php
$con = mysql_connect("localhost","root","chinaman");//连接数据库,mysql_connect的三个参数分别为数据库地址(一般为localhost)，帐户、和密码
if (!$con)
    {
        die('Could not connect: ' . mysql_error());
    }//如果连接失败则报错
mysql_select_db("toefl", $con);
function getdata($word,$column)
{
    $temp=mysql_query("SELECT * FROM list WHERE word'$word');
    $row=mysql_fetch_array($temp);
    $result=$row[$column];
    return $result;
}
function updata($word,$column,$data)
{
    mysql_query("UPDATE $type SET $column = '$data' WHERE word = '$word'");
    return 1;
}
if(!$_POST)
{
echo "<form action='wordstest.php' method='POST'>"
echo "Please enter list number:";
echo "<input type='text' name='list'/>";
echo "<br/>";
echo "<input type='submit' value='进入'/>";
echo "</form>";
}
else
{
$list=$_POST['list'];
echo "TOEFL Words Test List".$list;
$temp=mysql_query("SELECT * FROM list WHERE 'list'='$list'");

echo "<table border='1'>";
echo "<tr>";
echo "<th>序号</th>";
echo "<th>意思</th>";
echo "<th>填写</th>";
echo "<form action='testend.php' method='post'>";
while($row=mysql_fetch_array($temp))
    {
        echo "<tr>";
        echo "<td>" . $row['num'] . "</td>";
        echo "<td>" . $row['meaning'] . "</td>";
        echo "<td><input type='text' name='". $row['num']."' value=''/>";
        echo "</tr>";
    }
echo "</table>";
echo "<input type='submit' value='提交' />";
echo "</form>";
}
?>
