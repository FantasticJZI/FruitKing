<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>訂單取消結果</title>
</head>
<body>
    <header>
        <h1>水果王</h1><h6>取消訂單</h6>
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
        date_default_timezone_set('Asia/Taipei');
        header("Content-Type:text/html; charset=utf-8");

        $serverName = "TABLET-21HIBIQT\MSSQLSERVER01";
        $connectionOptions = array("Database" => "FruitKing","Uid" => "Dora","PWD" => "Dora93827");
        $conn = sqlsrv_connect($serverName, $connectionOptions);
        if ($conn === false) {
            die(print_r(sqlsrv_errors(), true));
        }

        $ID=$_POST['id'];

        $sql="DELETE FROM Orders WHERE OrderID = ?";
        $params = array($ID);
        $stmt = sqlsrv_query($conn, $sql, $params);
        if ($stmt === false) {
            die(print_r(sqlsrv_errors(), true));
        }
        else{
            echo "<center>"."<main>"."<p1>"."訂單已刪除！"."</p1>"."</main>"."</center>";
        }
    ?>
    <footer>
        <h3>Copyright @ 2024 水果王 All Right Reserve.</h3>
    </footer>
</body>
</html>