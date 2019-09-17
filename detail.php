<?php
include_once "./fn.php";
// echo '<pre>';
// print_r($_GET);
// echo '</pre>';

$id = $_GET['id'];

//准备sql语句从数据库找到对应id的数据
$sql = "select stu.*,class.classname from stu 
join class on stu.classid=class.id
where stu.id=$id";

$arr = my_query($sql)[0];

// echo '<pre>';
// print_r($arr);
// echo '</pre>';

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <link rel="stylesheet" href="./css/table.css">
  <style>
    table {
      margin-top: 100px;
    }
  </style>
</head>
<body>
  <table>
    <tr><th>序号</th><td><?php echo $arr['id'] ?></td></tr>
    <tr><th>姓名</th><td><?php echo $arr['name'] ?></td></tr>
    <tr><th>昵称</th><td><?php echo $arr['nickname'] ?></td></tr>
    <tr><th>性别</th><td><?php echo $arr['sex'] ?></td></tr>
    <tr><th>年龄</th><td><?php echo $arr['age'] ?></td></tr>
    <tr><th>联系方式</th><td><?php echo $arr['tel'] ?></td></tr>
    <tr><th>班级</th><td><?php echo $arr['classname'] ?></td></tr>
    <tr><th>头像</th><td><img src="<?php echo $arr['photo'] ?>" alt=""></td></tr>
    <tr><th colspan='2'><a href="./01-list.php">返回</a></th></tr>
  </table>
  
</body>
</html>