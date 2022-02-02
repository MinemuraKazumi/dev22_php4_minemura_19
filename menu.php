<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="select.php">アンケート一覧</a>　            
            <a class="navbar-brand" href="user.php">ユーザー登録</a>　

            <?php
            if (['kanri_flg'] == 1) {
                "<a href=user_select.php>"."ユーザー一覧"."</a>";
            } else {
                "<a  href=user_select2.php>"."ユーザー一覧"."</a>";
            }
            ?>

            <!-- <a class="navbar-brand" href="user_select.php">ユーザー一覧</a>　 -->
            <a class="navbar-brand" href="logout.php">ログアウト</a>
        </div>
    </div>
</nav>