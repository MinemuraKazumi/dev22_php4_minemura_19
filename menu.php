<?php
//最初にSESSIONを開始！！ココ大事！！
session_start();

// 追記
require_once('funcs.php');
loginCheck();
// 追記

// $_SESSION['kanri_flg'] = $val['kanri_flg'];

$_S = $_SESSION['kanri_flg'];
// var_dump($_S);

//1.  DB接続します
require_once('funcs.php');
$pdo = db_conn();

?>

<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <!-- <a class="navbar-brand" href="select.php">アンケート一覧</a>　             -->
            <!-- <a class="navbar-brand" href="user.php">ユーザー登録</a>　 -->

            <?php
            if ($_S == 1) {
                echo "<a href= select.php>"."データ一覧"."</a>";
            } else {
                echo "<a  href= select2.php>"."データ一覧"."</a>";
            }
            ?>
            <!-- <a class="navbar-brand" href="select.php">ユーザー一覧</a>　 -->
            <a class="navbar-brand" href="logout.php">ログアウト</a>
        </div>
    </div>
</nav>