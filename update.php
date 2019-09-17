<?php

include_once "./fn.php";

// echo '<pre>';
// print_r($_GET);
// echo '</pre>';

$id = $_GET['id'];

//准备sql语句从数据库获取对应数据
$sql = "select stu.*,class.classname from stu 
join class on stu.classid=class.id
where stu.id=$id";

//执行sql语句
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
    <!-- 引入样式 -->
    <link rel="stylesheet" href="./css/form.css">
</head>
<body>   
    <form action="./updateSave.php" method="POST" enctype="multipart/form-data">
              <input type="hidden" name="id" value=<?php echo $id ?>>
        姓名：<input type="text" name="username" value=<?php echo $arr['name'] ?>>
        昵称：<input type="text" name="nickname" value=<?php echo $arr['nickname'] ?>>
        年龄：<input type="text" name="age" value=<?php echo $arr['age'] ?>>
        电话：<input type="text" name="tel" value=<?php echo $arr['tel'] ?>>
        性别：<input type="radio" name="sex" value="m" <?php echo $arr['sex']==='m'?'checked':'' ?>>男
             <input type="radio" name="sex" value="f" <?php echo $arr['sex']==='f'?'checked':'' ?>>女
             <br>
        班级：<select name="class" >                
                <option value="1" <?php echo $arr['classid']==='1'?'selected':'' ?>>24期</option>
                <option value="2" <?php echo $arr['classid']==='2'?'selected':'' ?>>25期</option>
                <option value="3" <?php echo $arr['classid']==='3'?'selected':'' ?>>26期</option>
                <option value="4" <?php echo $arr['classid']==='4'?'selected':'' ?>>27期</option>
                <option value="5" <?php echo $arr['classid']==='5'?'selected':'' ?>>28期</option>
             </select>

        头像： <input type="file" name="photo" >

        <input type="submit" value="保存">
        
    </form>
</body>
</html>