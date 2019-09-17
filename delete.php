<?php

include_once "./fn.php";

header('content-type:text/html;charset=utf-8');

echo '<pre>';
print_r($_GET);
echo '</pre>';

$id = $_GET['id'];

//准备删除sql语句

$sql = "delete from stu where id=$id";

//执行sql语句

$res = my_exec($sql);
if($res){
  echo "删除成功";
  header("location: ./01-list.php");
}else{
  echo "删除失败";
}

?>