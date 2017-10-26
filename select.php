<?php
session_start();

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
    $view .='<a href ="book_delete.php?id='.$result["id"].'">';
    $view .='[削除]';
    $view .='</a>　';
    $view .= '</p>';
  }
}
?>
<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <title>ブックマーク一覧</title>
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
                    <?php if($_SESSION["kanri_flg"] ==1){
                    echo
                                            '<a class="navbar-brand" href="book_tuika.php">ブックマーク登録</a>
                                            <a class="navbar-brand" href="user_index.php">ユーザー登録</a>
                                            <a class="navbar-brand" href="user_select.php">ユーザー表示</a>
                                            <a class="navbar-brand" href="logout.php">ログアウト</a>';
                        }else{echo
                                            '<a class="navbar-brand" href="book_tuika.php">ブックマーク登録</a>
                                            <a class="navbar-brand" href="logout.php">ログアウト</a>';
                       }
                    ?>
                    </div>
                </div>
            </nav>
   </header>
<div>
    <div class="container jumbotron"><?=$view?></div>
  </div>


</body>
</html>