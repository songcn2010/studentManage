<?php

include_once "./fn.php";

header('content-type:text/html;charset=utf-8');

echo '<pre>';
print_r($_POST);
echo '</pre>';

$id = $_POST['id'];
$userName = $_POST['username'];
$nickName = $_POST['nickname'];
$age = $_POST['age'];
$tel = $_POST['tel'];
$sex = $_POST['sex'];
$class = $_POST['class'];

echo '<pre>';
print_r($_FILES);
echo '</pre>';

$file = $_FILES['photo'];

if($file['error']===0){
//获取后缀名
$ext = strrchr($file['name'],'.');

//随机重命名
$newName = time().rand(1000,9999).$ext;

//获取临时地址
$temp = $file['tmp_name'];

//新的存放路径
$newFileUrl = "./upload/".$newName;

//转存
move_uploaded_file($temp,$newFileUrl);

//收集新的存放路径
$photo = $newFileUrl;

}

//准备sql语句，对数据库对应id数据进行修改
//两种情况，是否更改图片
if($file['error'] != 0){
  $sql = "update stu set name='$userName',nickname='$nickName',age=$age,tel='$tel',
          sex='$sex',classid=$class where id=$id";
}else{
  $sql = "update stu set name='$userName',nickname='$nickName',age=$age,tel='$tel',
          sex='$sex',photo='$photo',classid=$class where id=$id";
}

//运行sql语句
$res = my_exec($sql);
if($res){
  echo "修改成功";
  header("location:./01-list.php");
}else{
  echo "修改失败";
}

?>