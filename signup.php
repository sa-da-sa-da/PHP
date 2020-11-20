<?php
	if(!isset($_POST['submit'])){
        exit("错误执行");
    }//判断是否有submit操作
	$name = $_POST['name'];//post获得用户名
	$password = $_POST['password'];//post获得密码
	$Stu_Number = $_POST['Stu_Number']; //post获得学号
	$Stu_class = $_POST['Stu_class'];//post获得班级
	if(!$name && $password && $Stu_Number && $Stu_class)//判断传递数据不为空
		echo "文本信息空白，请重新填入文本信息";
	else{
	$Stu_array = array("$name","$password","$Stu_Number","$Stu_class");//将post所传递的数据打包成数组
	$file=fopen("test.txt","w") or exit("Unable to open file!");//打开test.txt文件或者输出不能打开文件
	fwrite($file, serialize($Stu_array));
	$file = fopen("test.txt", "a") or exit("Unable to open file!");
	fwrite($file,"\r\n第一行为序列化数组中的数据，以下为可读性的数组\r\n");
	fwrite($file, print_r($Stu_array,true));//具有可读性的数组写入test文件中
	}

?>