<?php
    header("Content-Type: text/html; charset=utf8");
    if(!isset($_POST["submit"])){
        exit("错误操作，请返回");
    }//检测是否有submit操作
    $name = $_POST['name'];//post获得用户名
    $password = $_POST['password'];//post获得用户密码
 	if ($name && $password){//如果用户名和密码都不为空
 		$filename="test.txt";
		$file_hwnd=fopen($filename,"r");
		$content = fread($file_hwnd, filesize($filename)); // 读取文件全部内容
		fclose($file_hwnd);
		$content = unserialize($content); // 将文本数据转换回数组
		if ($name==$content[0]&&$password==$content[1]) {
			echo "登录成功!";
		}
 	}
 	else{//如果用户名或密码有空
        echo "表单填写不完整，请返回重新输入账号密码登录"; 
    }
?>