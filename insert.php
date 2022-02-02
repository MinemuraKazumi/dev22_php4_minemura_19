<?php
//1. POSTデータ取得
$name   = $_POST['name'];
$url  = $_POST['url'];
// $naiyou = $_POST['naiyou'];
$comment    = $_POST['comment']; //追加されています

//2. DB接続します
require_once('funcs.php');
$pdo = db_conn();

//３．データ登録SQL作成
$stmt = $pdo->prepare('INSERT INTO gs_bm_table(name,url,comment,indate)VALUES(:name,:url,:comment,sysdate());');
// 内容をコメントアウト $stmt = $pdo->prepare('INSERT INTO gs_bm_table(name,email,age,naiyou,indate)VALUES(:name,:email,:age,:naiyou,sysdate());');
$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':url', $url, PDO::PARAM_STR);
$stmt->bindValue(':comment', $comment, PDO::PARAM_STR);
// $stmt->bindValue(':naiyou', $naiyou, PDO::PARAM_STR);
$status = $stmt->execute(); //実行

//４．データ登録処理後
if ($status == false) {
    sql_error($stmt);
} else {
    redirect('index.php');
}
