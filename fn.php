<?php
header('content-type:text/html;charset=utf-8');
//通过php操作SQL数据库

define( 'HOST', '127.0.0.1' );  // ip 地址
define( 'UNAME', 'root' );   // 用户名
define( 'PWD', 'root' );   // 密码
define( 'DB', 'z_studentmanage' );  // 数据库名称
define( 'PORT', 3306 );

//1.通过php对数据库中数据进行非查询操作

function my_exec($sql){
    //1.1 链接数据库
  $link = mysqli_connect(HOST,UNAME,PWD,DB,PORT);
  if(!$link){
    echo "连接失败";
    return false;
  }

    //1.2 准备sql语句   通过参数上传
    //1.3 执行sql语句
    $res = mysqli_query($link,$sql);

    //1.3 处理结果
  if($res){
    mysqli_close($link);
    return true;
  }else{
    echo mysqli_error($link);
    mysqli_close($link);
    return false;
  }

}


//2 php操作sql数据库查询
function my_query($sql){

  $link = mysqli_connect(HOST,UNAME,PWD,DB,PORT);
  if(!$link){
    echo "连接失败";
    return false;
  }

  $res = mysqli_query($link,$sql);

  if(!$res){
    echo mysqli_error($link);
    mysqli_close($link);
    return false;
  }

  $arr = [];

  while($leng = mysqli_fetch_assoc($res)){

    $arr[] = $leng;
  }

  mysqli_close($link);
  return $arr; //这里不能返回true，因为是查询，所以要返回查询结果
}

?>