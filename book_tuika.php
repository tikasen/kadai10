<?php
session_start();

//0.外部ファイル読み込み
include("functions.php");

//1.  DB接続します
$pdo = db_con();

?>
<!DOCTYPE html>
<html lang="jp">

<head>
    <meta charset="UTF-8">
    <title>ブックマーク</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script type="text/javascript" src="http://code.jquery.com/jquery-3.1.0.min.js"></script>
    <style>
        div {
            padding: 10px;
            font-size: 16px;
        }

    </style>
</head>

<body>
    <header>
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <div class="navbar-header">
                    <?php if($_SESSION["kanri_flg"] ==1){
                    echo
                                            '<a class="navbar-brand" href="select.php">ブックマーク表示</a>
                                            <a class="navbar-brand" href="user_select.php">ユーザー登録</a>
                                            <a class="navbar-brand" href="user_select.php">ユーザー表示</a>';
                        }else{echo
                                            '<a class="navbar-brand" href="select.php">ブックマーク表示</a>';

                       }
                    ?>
                    </div>
                </div>
            </nav>

    </header>
        <form method="post" action="insert.php" enctype="multipart/form-data">
            <div class="jumbotron">
                <fieldset>
                    <legend>本のブックマーク</legend>
                    <label>書籍名：<input type="text" name="b_name"></label>
                    <BR>
                    <label>書籍URL：<input type="text" name="b_url"></label>
                    <BR>
                    <label>書籍著者：<input type="text" name="b_comment"></label>
                    <BR>
                    <label>書籍IMGURL：<input type="text" name="img_url"></label>
                    <BR>
                    <input type="submit" value="送信">

                </fieldset>
            </div>
        </form>
</body>

</html>
