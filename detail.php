<?php

//0.外部ファイル読み込み
include("functions.php");

//1.GETでidを取得
$id = $_GET["id"];

//1.  DB接続します
$pdo = db_con();

//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_bm_table WHERE id=:id");
$stmt->bindValue(":id",$id,PDO::PARAM_INT);
$status = $stmt->execute();

//３．データ表示
$view="";
if($status==false){
  queryError($stmt);
}else{
  //Selectデータの数だけ自動でループしてくれる
  while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
    $view .= '<p>';
    $view .= '<a target="_blank"
 href='.h($result["b_url"]).'>';
    $view .= h($result["b_name"]).
        '<br>'.'<img src="'.h($result["img_url"]).'" style="width:100px;height:150px;">'.'<br>'.h($result["b_comment"]).'<br>'.h($result["t_time"]);
    $view .= '</a>　';
    $view .= '</p>';
  }
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>POSTデータ登録</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header"><a class="navbar-brand" href="index.php">TOP</a></div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<form method="post" action="update.php">
  <div class="jumbotron">
   <fieldset>
    <legend>本の詳細</legend>
    <div class="container jumbotron"><?=$view?></div>
  </div>
    </fieldset>
  </div>
</form>
<!-- Main[End] -->


</body>
</html>






