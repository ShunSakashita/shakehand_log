<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>削除画面</title>
</head>
<body>
    <h3>以下を削除しますか？</h3>
    <?php
        $id = $_GET["id"];
        $grop = $_GET["grop"];
        $kaijo = $_GET["kaijo"];
        $member = $_GET["member"];
        $dt = $_GET["dt"];
        $unit = $_GET["unit"];
        $con = $_GET["con"];

        echo $id."　";
        echo $grop."<br>";
        echo $kaijo."<br>";
        echo $member."<br>";
        echo $dt."<br>";
        echo $unit."<br>";
        echo $con."<br>";
        
        print("<a href=\"handlog.php\">戻る</a>");
        print("<a href=\"complete.php?id={$id}\">削除</a>");
    ?>
</body>
</html>