<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>編集画面</title>
</head>
<body>
<?php     
    $id = $_GET["id"];
    $grop = $_GET["grop"];
    $kaijo = $_GET["kaijo"];
    $member = $_GET["member"];
    $dt = $_GET["dt"];
    $unit = $_GET["unit"];
    $con = $_GET["con"];

    print("<form action=\"edeit_com.php?id={$id}\" method=\"GET\">
          <ul>
            <li>$id</li>
            <li>アイドルグループ <input type=\"text\" name=\"grop\" value=\"$grop\"></li>
            <li>メンバー名 <input type=\"text\" name=\"member\" value=\"$member\"></li>
            <li>会場 <input type=\"text\" name=\"box\" value=\"$kaijo\"></li>
            <li>開催日 <input type=\"date\" name=\"date\" value=\"$dt\"></li>
            <li>部(’部なし’または１部〜６部から選択)
            <select name=\"unit\" value=\"$unit\">
                    <option value=\"部なし\">部なし</option>
                    <option value=\"1部\">1部</option>
                    <option value=\"2部\">2部</option>
                    <option value=\"3部\">3部</option>
                    <option value=\"4部\">4部</option>
                    <option value=\"5部\">5部</option>
                    <option value=\"6部\">6部</option>
                </select>
            </li>
            <li>会話内容<br><textarea name=\"con\" id=\"\" cols=\"30\" rows=\"10\">$con</textarea></li>
            <li><label><input type=\"submit\" value=\"変更\"></label></li>
          </ul>
         </form>
        ");
?>
<a href="handlog.php">トップページへ戻る</a>
</body>
</html>