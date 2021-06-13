<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>握手会記録帳</title>
</head>
<body>
    <h3>削除が完了しました。</h3>
    <a href="handlog.php">トップページへ</a>

    <?php
        $id = $_GET["id"];
        //データベース（削除機能）部分
        $user = 'mogura';
        $pass = 'shun';

        $dbname = 'shakehand';
        $host = 'localhost';

        $dsn = "mysql:host={$host};dbname={$dbname};charset=utf8";
        try{
            $pdo = new PDO($dsn,$user,$pass);
            $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
            $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

            $sql = "DELETE FROM shakehand WHERE id= '$id'";
            $stm = $pdo -> prepare($sql);
            //$stm -> bindParam(':id',$id,PDO::PARAM_INT);
            $stm -> execute();
        }catch(Exception $e){
            echo("エラーがありました。");
            echo $e->getMessage();
            exit();
        }
        //データベース部分おわり
        ?>
</body>
</html>