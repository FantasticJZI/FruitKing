<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>水果下訂</title>
</head>
<body>
    <header>
        <h1>水果王</h1><h6>訂單查詢</h6>
        <hr>
        <center>
            <nav>
                <A href="Menu.html"><button class="c-button c-button--gooey">主頁<div class="c-button__blobs"><div></div><div></div><div></div></div></button></A>
                <A href="Shop.html"><button class="c-button c-button--gooey">商店<div class="c-button__blobs"><div></div><div></div><div></div></div></button></A>
                <A href="Order.html"><button class="c-button c-button--gooey">我要買水果<div class="c-button__blobs"><div></div><div></div><div></div></div></button></A>
                <A href="Search.html"><button class="c-button c-button--gooey">查詢訂單<div class="c-button__blobs"><div></div><div></div><div></div></div></button></A>
                <A href="Modify.html"><button class="c-button c-button--gooey">修改訂單<div class="c-button__blobs"><div></div><div></div><div></div></div></button></A>
                <A href="Delete.html"><button class="c-button c-button--gooey">取消訂單<div class="c-button__blobs"><div></div><div></div><div></div></div></button></A>
                <A href="Introduce.html"><button class="c-button c-button--gooey">果農介紹<div class="c-button__blobs"><div></div><div></div><div></div></div></button></A>
                <A href="AboutUs.html"><button class="c-button c-button--gooey">關於我們<div class="c-button__blobs"><div></div><div></div><div></div></div></button></A>
            </nav>
        </center>
    </header>
    <?php
        header("Content-Type:text/html; charset=utf-8");
        $Phone=$_POST['phone'];

        $serverName = "TABLET-21HIBIQT\MSSQLSERVER01";
        $connectionOptions = array("Database" => "FruitKing","Uid" => "Dora","PWD" => "Dora93827");
        $conn = sqlsrv_connect($serverName, $connectionOptions);
        if ($conn === false) {
            die(print_r(sqlsrv_errors(), true));
        }

        $sql="SELECT * FROM Orders Where Phone = ?";
        $params = array($Phone);
        $stmt = sqlsrv_query($conn, $sql, $params);

		while($row=sqlsrv_fetch_array($stmt))
		{
            echo "<center>"."</br>"."<table border=3px>".
            "<tr>"."<th>"."訂單編碼:"."</th>"."<td>".$row['OrderID']."</td>"."</tr>".
            "<tr>"."<th>"."電話:"."</th>"."<td>".$row['Phone']."</td>"."</tr>".
            "<tr>"."<th>"."訂單內容:"."</th>"."<td>".$row['Items']."</td>"."</tr>".
            "<tr>"."<th>"."備註:"."</th>"."<td>".$row['Note']."</td>"."</tr>".
            "<tr>"."<th>"."訂單日期:"."</th>"."<td>".$row['OrderTime']."</td>"."</tr>".
            "<tr>"."<th>"."運送地址:"."</th>"."<td>".$row['Address']."</td>"."</tr>"."</table>"."</br>"."</center>";
		}
    ?>
    <footer>
        <h3>Copyright @ 2024 水果王 All Right Reserve.</h3>
    </footer>
</body>
</html>