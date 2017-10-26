<?php
session_start();

//1. POST送信した情報を受信
$name =$_POST["u_name"];
$lid = $_POST["u_lid"];
$lpw = $_POST["u_lpw"];
$kanri_flg = $_POST["kanri_flg"];
$life_flg = $_POST["life_flg"];

//0.外部ファイル読み込み
include("functions.php");

//1.  DB接続します
$pdo = db_con();

//３．SQLを作って送信する。
$stmt = $pdo->prepare("INSERT INTO gs_user_table(id, name, lid, lpw,kanri_flg,life_flg)VALUES(NULL, :name,:lid,:lpw,:kanri_flg,:life_flg)");
$stmt->bindValue(':name',$name, PDO::PARAM_STR);
$stmt->bindValue(':lid', $lid, PDO::PARAM_STR);
$stmt->bindValue(':lpw', $lpw, PDO::PARAM_STR);
$stmt->bindValue(':kanri_flg', $kanri_flg, PDO::PARAM_STR);
$stmt->bindValue(':life_flg', $life_flg, PDO::PARAM_STR);

$status = $stmt->execute();

//４．
if($status==false){
  $error = $stmt->errorInfo();
  exit("QueryError:".$error[2]);
  
    
}else{
  header("Location: ./user_index.php");
  exit;

}
?>
