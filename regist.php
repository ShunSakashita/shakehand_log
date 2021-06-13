<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>握手会記録帳</title>
</head>
<body>
    <h3>登録完了！</h3>
    <a href="handlog.php">戻る</a>
    <?php
        $grop = $_POST["grop"];
        $member = $_POST["member"];
        $box = $_POST["box"];
        $date = $_POST["date"];
        $unit = $_POST["unit"];
        $con = $_POST["con"];
        
        echo "以下の内容で登録しました。<br>";
        echo $grop."<br>";
        echo $member."<br>";
        echo $box."<br>";
        echo $date."<br>";
        echo $unit."<br>";
        echo $con."<br>";

        print("<a href=\"javascript:history.back()\"></a>");
        //データベース部分
        $user = 'mogura';
        $pass = 'shun';

        $dbname = 'shakehand';
        $host = 'localhost';

        $dsn = "mysql:host={$host};dbname={$dbname};charset=utf8";
        try{
            $pdo = new PDO($dsn,$user,$pass);
            $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
            $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

            $sql = 'INSERT INTO shakehand (grop,member,dt,kaijo,unit,con) VALUES (:grop,:member,:dt,:kaijo,:unit,:con)';
            $stm = $pdo -> prepare($sql);
            $stm -> bindParam(':grop',$grop,PDO::PARAM_STR);
            $stm -> bindParam(':member',$member,PDO::PARAM_STR);
            $stm -> bindParam(':dt',$date,PDO::PARAM_INT);
            $stm -> bindParam(':kaijo',$box,PDO::PARAM_STR);
            $stm -> bindParam(':unit',$unit,PDO::PARAM_STR);
            $stm -> bindParam(':con',$con,PDO::PARAM_STR);
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