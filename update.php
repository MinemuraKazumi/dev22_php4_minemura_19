<?php
//1. POSTデータ取得
$name   = $_POST['name'];
$url  = $_POST['url'];
// $naiyou = $_POST['naiyou'];
$comment    = $_POST['comment'];
$id     = $_POST['id'];

//2. DB接続します
require_once('funcs.php');
$pdo = db_conn();

//３．データ登録SQL作成
$stmt = $pdo->prepare('UPDATE gs_bm_table SET name=:name,url=:url,comment=:comment WHERE id=:id;');

// 内容をコメントアウト $stmt = $pdo->prepare('UPDATE gs_bm_table SET name=:name,email=:email,age=:age,naiyou=:naiyou WHERE id=:id;');
$stmt->bindValue(':name',   $name,   PDO::PARAM_STR);
$stmt->bindValue(':url',  $url,  PDO::PARAM_STR);
$stmt->bindValue(':comment',    $comment,    PDO::PARAM_STR);
// $stmt->bindValue(':naiyou', $naiyou, PDO::PARAM_STR);
$stmt->bindValue(':id',     $id,     PDO::PARAM_INT);
$status = $stmt->execute(); //実行

//４．データ登録処理後
if ($status === false) {
    sql_error($stmt);
} else {
    redirect('select.php');
}
