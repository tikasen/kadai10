<?php
session_start();

//0.外部ファイル読み込み
include("functions.php");

//1.  DB接続します
$pdo = db_con();

//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_user_table ORDER BY 'lid' DESC");
$status = $stmt->execute();


//４．
$view="";
if($status==false){
  //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);
}else{
while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
$view .= '<p>';
    $view .='<a href ="userform.php?id='.$result["id"].'">';
    $view .= $result["name"]."<br>";
    $view .='</a>';
    $view .='<a href ="user_delete.php?id='.$result["id"].'">';
    $view .='[削除]';
    $view .='</a>　';
    $view .='</p>';
 }
}
?>


    <!DOCTYPE html>
    <html lang="ja">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>ユーザ一覧</title>
        <link rel="stylesheet" href="css/range.css">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <style>
            div {
                padding: 10px;
                font-size: 16px;
            }

        </style>
    </head>

    <body id="main">
        <!-- Head[Start] -->
        <header>
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <a class="navbar-brand" href="select.php">ブックマーク一覧</a>
                    </div>
            </nav>
        </header>
        <!-- Head[End] -->

        <!-- Main[Start] -->
        <div>
                <legend>ユーザ一覧</legend>
            <div class="container jumbotron">
                <?=$view?>
            </div>
        </div>
        </div>
        <!-- Main[End] -->

    </body>

    </html>
