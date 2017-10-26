<?php
//0.外部ファイル読み込み
include("functions.php");

//1.  DB接続します
$pdo = db_con();

//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_bm_table");
$status = $stmt->execute();

//３．データ表示
$view="";
if($status==false){
  queryError($stmt);
}else{
  //Selectデータの数だけ自動でループしてくれる
  while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
    $view .= '<p>';
    $view .= '<a href="detail.php?id='.$result["id"].'">';
    $view .= h($result["b_name"])."[".h($result["t_time"])."]";
    $view .= '</a>　';
    $view .= '</p>';
  }
}
?>
<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <title>ブックマークアプリ</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script type="text/javascript" src="http://code.jquery.com/jquery-3.1.0.min.js"></script>
    <style>
        div {
            padding: 10px;
            font-size: 16px;
        }
    </style>
</head>
<body id="main">
   <header>
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <a class="navbar-brand" href="login.php">ログイン</a>
                    </div>
                </div>
            </nav>
   </header>
<div>
       <legend>ブックマーク一覧</legend>
    <div class="container jumbotron"><?=$view?></div>
  </div>

<?PHP
    include("calender.php");
    include("tuchi.php");
    ?>
</body>
</html>