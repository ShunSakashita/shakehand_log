<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>握手会記録帳</title>
</head>
<body>
    <h3>ようこそ。</h3>
    <!--登録フォーム-->
    <form action="regist.php" method="POST">
        <ul>
            <li>アイドルグループ <input type="text" name="grop"></li>
            <li>メンバー名 <input type="text" name="member"></li>
            <li>会場 <input type="text" name="box"></li>
            <li>開催日 <input type="date" name="date"></li>
            <li>部(’部なし’または１部〜６部から選択)
                <select name="unit">
                    <option value="部なし" selected>部なし</option>
                    <option value="1部">1部</option>
                    <option value="2部">2部</option>
                    <option value="3部">3部</option>
                    <option value="4部">4部</option>
                    <option value="5部">5部</option>
                    <option value="6部">6部</option>
                </select>
            </li>
            <li>会話内容<br><textarea name="con" id="" cols="30" rows="10"></textarea></li>
            <li><label><input type="submit" value="登録"></label></li>
        </ul>
    </form>
    <!--登録フォームおわり-->

    <!--すでに登録されている内容を表示-->
    <h3>過去の登録内容</h3>
    <!--以下データベース部分-->
    <?php
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

            $sql = 'SELECT * FROM shakehand';
            $stm = $pdo -> prepare($sql);
            $stm -> execute();
            $result = $stm -> fetchAll(PDO::FETCH_ASSOC);
            
            foreach($result as $row){
                $id = htmlspecialchars($row["id"],ENT_QUOTES,'UTF-8');
                $grop = $row["grop"];
                $kaijo = $row["kaijo"];
                $member = $row["member"];
                $dt = $row["dt"];
                $unit = $row["unit"];
                $con= $row["con"];   
                
                echo "　";
                echo $id;
                echo "　";
                echo $row["grop"];
                echo "<br>";
                echo "　";
                echo $row["kaijo"];
                echo "　";
                echo $row["member"]; 
                echo "　";
                echo $row["dt"];
                echo "　";
                
                echo "　";
                echo $row["unit"];
                echo "<br>";
                echo "　";
                echo $row["con"];
                echo "<br>";
                print("<a href=\"edit.php?id={$id}&grop={$grop}&kaijo={$kaijo}&member={$member}&dt={$dt}&unit={$unit}&con={$con}\">編集</a>");
                echo "　";
                print("<a href=\"delete.php?id={$id}&grop={$grop}&kaijo={$kaijo}&member={$member}&dt={$dt}&unit={$unit}&con={$con}\">削除</a><br>"); 
            }
        }catch(Exception $e){
            echo("エラーがありました。");
            echo $e->getMessage();
            exit();
        }
    ?>
</body>
</html>