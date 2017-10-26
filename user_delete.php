<?php
session_start();

$id = $_GET["id"];
//echo $id;

//0.外部ファイル読み込み
include("functions.php");

//1.  DB接続します
$pdo = db_con();

//データ登録SQL作成
$stmt = $pdo->prepare("DELETE FROM gs_user_table WHERE id=:id");
$stmt->bindValue(':id',$id, PDO::PARAM_INT);

//SQL実行
$status = $stmt->execute();

//４．データ登録処理後
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit("QueryError:".$error[2]);
}else{
  //５．index.phpへリダイレクト
  header("Location: user_select.php");
  exit;
}

?>