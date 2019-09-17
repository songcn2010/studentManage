<?php
include_once "./fn.php";
header('content-type:text/html;charset=utf-8');

$sql = "select stu.*,class.classname from stu
				 join class on stu.classid=class.id order by stu.id desc";

$arr= my_query($sql);

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
	<link rel="stylesheet" href="./css/list.css">
	<title>Document</title>
</head>

<body>
	<h4>用户信息列表</h4>
	<a href="./01-add.html">添加信息</a>
	<table>
		<tr>
			<th>用户名</th>
			<th>昵称</th>
			<th>性别</th>
			<th>年龄</th>
			<th>电话</th>
			<th>班级</th>
			<th>头像</th>
			<th>操作</th>
		</tr>
		<?php foreach($arr as $k => $v){ ?>
			<tr>
				<td><?php echo $v['name'] ?></td>
				<td><?php echo $v['nickname'] ?></td>
				<td><?php echo $v['sex']==='m'? '男': '女' ?></td>
				<td><?php echo $v['age'] ?></td>
				<td><?php echo $v['tel'] ?></td>
				<td><?php echo $v['classname'] ?></td>
				<td>
					<img src="<?php echo $v['photo'] ?>">
				</td>
				<td>
					<a href="./delete.php?id=<?php echo $v['id'] ?>">删除</a>
					<a href="./detail.php?id=<?php echo $v['id'] ?>">详情</a>
					<a href="./update.php?id=<?php echo $v['id'] ?>">编辑</a>
				</td>
			</tr>
		<?php } ?>


	</table>
</body>

</html>