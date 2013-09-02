<?php
$con = mysql_connect("localhost","root","chinaman");//连接数据库,mysql_connect的三个参数分别为数据库地址(一般为localhost)，帐户、和密码
if (!$con)
    {
        die('Could not connect: ' . mysql_error());
    }//如果连接失败则报错
mysql_select_db("toefl", $con);
function getdata($list,$num)
{
    $temp=mysql_query("SELECT * FROM $list WHERE num='$num' ");
    $row=mysql_fetch_array($temp);
    $result=$row[$column];
    return $result;
}
function updata($list,$word,$column,$data)
{
    mysql_query("UPDATE $type SET $column = '$data' WHERE filename = '$filename'");
    return 1;
}
echo "TOEFL Words Test<br/>";
$list="list1";
$temp=mysql_query("SELECT * FROM $list");
//$list=$_POST['list'];

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
?>
