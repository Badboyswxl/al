<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="Content-Language" content="zh-CN">
  <title>欢迎使用 NGINX</title>
  <style>
    body {
      font-family: "微软雅黑", Arial, sans-serif;
      background-color: #f2f2f2;
      text-align: center;
    }

    h1 {
      color: #333333;
      font-size: 36px;
      margin: 50px 0;
    }

    p {
      color: #666666;
      font-size: 18px;
      margin: 20px 0;
    }

    .logo {
      margin: 50px auto;
      width: 200px;
    }
  </style>
</head>
<body>
  <img class="logo" src="https://nginx.org/nginx.png" alt="NGINX Logo">
  <h1>欢迎使用 NGINX</h1>
  <p>这是您的 NGINX 欢迎页面。</p>
  <p>通过修改 NGINX 配置文件，您可以自定义此页面。</p>
  <p>本次访问的Nginx通过Ansible部署。</p>
  <hr>
<?php
// Check if PHP is installed
if (function_exists('phpversion')) {
    echo 'PHP installed successfully. Version: ' . phpversion() . '<br>';
} else {
    echo 'PHP not installed.<br>';
}

// Check if MySQL extension is installed
if (extension_loaded('mysqli')) {
    // Attempt to connect to MySQL
    $mysqli = new mysqli('localhost', 'root', '123456');
    
    // Check the connection
    if ($mysqli->connect_error) {
        echo 'MySQL connection failed: ' . $mysqli->connect_error . '<br>';
    } else {
        echo 'MySQL installed and connected successfully.<br>';
        // Close the MySQL connection
        $mysqli->close();
    }
} else {
    echo 'MySQL extension not installed.<br>';
}

// Check if Nginx is installed
$nginxPortStatus = @fsockopen('localhost', 80, $errno, $errstr, 5);
if ($nginxPortStatus) {
    echo 'Nginx installed and running on port 80 successfully.<br>';
    fclose($nginxPortStatus);
} else {
    echo 'Nginx not installed or not running on port 80.<br>';
}
?>

</body>
</html>
