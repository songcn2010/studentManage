<?php

include_once "./fn.php";

echo '<pre>';
print_r($_POST);
echo '</pre>';

echo '<pre>';
print_r($_FILES);
echo '</pre>';

$username = $_POST['username'];
$nickname = $_POST['nickname'];
$age = $_POST['age'];
$tel = $_POST['tel'];
$sex = $_POST['sex'];
$class = $_POST['class'];

$file = $_FILES['photo'];

if( $file['error'] === 0 ){

  //获取后缀名
  $ext = strrchr($file['name'],'.');

  //生成新的文件名
  $newName = time().rand(1000,9999).$ext;

  //获取临时文件路径
  $temp = $file['tmp_name'];

  //转存文件路径
  $newFileUrl = "./upload/".$newName;

  //转存文件
  move_uploaded_file($temp,$newFileUrl);

  //将新的文件路径收集
  $photo = $newFileUrl;
}


//准备sql语句
$sql = "insert into stu (name,nickname,age,tel,sex,photo,classid) value('$username','$nickname','$age','$tel','$sex','$photo','$class')";

//调用执行sql语句的方法
$res = my_exec($sql);

if($res){
  echo "添加成功";
  header("location:./01-list.php");
}else{
  echo "添加失败";
}


?>