<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>編集完了！</title>
</head>
<body>
    <h3>編集が完了しました。</h3>
    <a href="handlog.php">トップページへ</a>
    <?php
        $id = $_GET["id"];
        $grop = $_GET["grop"];
        $kaijo = $_GET["kaijo"];
        $member = $_GET["member"];
        $dt = $_GET["dt"];
        $unit = $_GET["unit"];
        $con = $_GET["con"];
        
        

        //データベース情報
        $user = 'mogura';
        $pass = 'shun';

        $dbname = 'shakehand';
        $host = 'localhost';

        $dsn = "mysql:host={$host};dbname={$dbname};charset=utf8";
        try{
            $pdo = new PDO($dsn,$user,$pass);
            $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
            $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

            $sql = "UPDATE shakehand SET grop = :grop, kaijo = :kaijo, member = :member, dt = :dt, unit = :unit, con = :con WHERE id = '$id'";
            $stm = $pdo -> prepare($sql);
            $param = array(':grop' => $grop,':kaijo' => $kaijo,':member' => $member,':dt' => $dt,':unit' => $unit,':con' => $con);
            $stm -> execute($param);
        }catch(Exception $e){
            echo("エラーがありました。");
            echo $e->getMessage();
            exit();
        }
    ?>
</body>
</html>