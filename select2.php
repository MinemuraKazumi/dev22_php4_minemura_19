<?php

//１．関数群の読み込み
require_once('funcs.php');
// loginCheck();

//２．データ登録SQL作成
$pdo = db_conn();
$stmt = $pdo->prepare('SELECT * FROM gs_bm_table');
$status = $stmt->execute();

//３．データ表示
$view = '';
if ($status == false) {
    sql_error($stmt);
} else {
    while ($r = $stmt->fetch(PDO::FETCH_ASSOC)) {


        $view .= '<table>';

        $view .= '<p>';
        $view .= '<a href="detail2.php?id=' . $r["id"] . '">';
        $view .= '<td>'.h($r['id']) . '</td>'. '<td>'. h($r['name']) . '</td>'. '<td>' . h($r['url']). '</td>' .'<td>' . h($r['comment'] ). '</td>';
        $view .= '</a>';
        $view .= "　";

        // $view .= '<a href="detail.php?id=' . $r["id"] . '">';
        // $view .= h($r['id']) . " " . h($r['name']) . " " . h($r['url']). " " . h($r['comment']);
        // $view .= '</a>';
        // $view .= "　";

        // if ($r['kanri_flg'] === 1){
        //     $view .= '<a class="btn btn-danger" href="delete.php?id=' . $r['id'] . '">';

        // 更新
        // $view .= '<td>'.'<a class="btn btn-danger" href="detail2.php?id=' . $r['id'] . '">';
        // $view .= '<img src="data:image/png;base64,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" alt="" height="50px" width="50px">'.'</td>';
        // // $view .= '[<i class="glyphicon glyphicon-remove"></i>更新]'.'</td>';

        // // 削除
        // $view .= '<td>'.'<a class="btn btn-danger" href="delete.php?id=' . $r['id'] . '">';
        // $view .= '<img src="https://free-icons.net/wp-content/uploads/2021/03/symbol079.png" alt="" height="50px" width="50px">'.'</td>';
        // $view .= '[<i class="glyphicon glyphicon-remove"></i>削除]'.'</td>';
        
        $view .= '</a>';
        $view .= '</p>';
        $view .= '</table>';


    }
}
?>


<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>フリーアンケート表示</title>
    <link rel="stylesheet" href="css/range.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>
        div {
            padding: 10px;
            font-size: 16px;
        }
        table,tr,td,th{
        width: 100%;
        table-layout: fixed;
        border-bottom:1px solid #000000;
        /* collapseは列間空白をとる */
        }

        table {
        width: 100%;
        table-layout: fixed;
        /* 折り返し表示 */
        word-break : break-all;

        }
    </style>
</head>

<body id="main">
    <!-- Head[Start] -->
    <header>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.php">データ登録</a>
                </div>
            </div>
        </nav>
    </header>
    <!-- Head[End] -->

    <!-- Main[Start] -->
    <div>
    
        <div class="container jumbotron">
            <table align="center">
                    <tr>
                        <th>番号</th>
                        <th>書籍名</th>
                        <th>書籍URL</th>
                        <th>書籍コメント</th>
                        <!-- <th>更新</th>
                        <th>削除</th> -->
                    </tr>
            </table>    
                <?= $view ?>
        </div>
    </div>
    <!-- Main[End] -->

</body>

</html>
