<!DOCTYPE html>
<html lang="ja-JP">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MCJPPvPのkill数取得するやつ</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        @font-face {
            font-family: 'Noto Sans Japanese Regular';
            font-style: normal;
            font-weight: 400;
            src: local('Noto Sans CJK JP Regular'),
            url(//fonts.gstatic.com/ea/notosansjp/v5/NotoSansJP-Regular.woff2) format('woff2'),
            url(//fonts.gstatic.com/ea/notosansjp/v5/NotoSansJP-Regular.woff) format('woff'),
            url(//fonts.gstatic.com/ea/notosansjp/v5/NotoSansJP-Regular.otf) format('opentype');
        }
        body {
            font-family: 'Noto Sans Japanese Regular';
        }
        .center {
            padding-top: 30px;
            text-align: center;
        }
    </style>
</head>
<body>
<?php if($_GET["user"] != null) : ?>
    <?php
    $json = file_get_contents("https://pvp.minecraft.jp/{$_GET["user"]}.json");
    $json = mb_convert_encoding($json, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
    $arr = json_decode($json,true);
    ?>
    <div class="center">
    <?php if($arr["player"]["Player"]["teampvp"]["kill_count"] == null) : ?>
    <div class="container">
        <div class="row">
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="閉じる"><span aria-hidden="true">×</span></button>
                <b>このMinecraftIDは存在しないか、一度もJPMCPvPにログインしていません。</b>
            </div>
        </div>
    </div>
        <?php endif; ?>
    <a href="https://pvp.minecraft.jp/<?php echo $arr["player"]["Player"]["name"]; ?>" target="_blank"> <?php echo $arr["player"]["Player"]["name"]; ?></a>さんのkill数ランク:<br>
        <span class="text-danger" style="font-size: 50px;"><?php echo $arr["player"]["Player"]["teampvp"]["kill_count_rank"]; ?></span><b style="font-size: 30px;">位</b><br>
        (<?php echo $arr["player"]["Player"]["teampvp"]["kill_count"]; ?>キル)
    </div>
<?php else : ?>
    <div class="container">
        <div class="row">
            <h2>MCJPPvPのkill数取得するやつ</h2>
            ソースコードは<a href="https://github.com/yuzulabo/JPMCPvP-Get-KillRank" target="_blank">こちら</a><br>
            <form action="" method="get">
                <div class="form-group">
                    <label>MinecraftID:</label>
                    <input type="text" name="user" class="form-control">
                </div>
                <button type="submit" class="btn btn-default">kill数取得</button>
            </form>
            <hr>
            (c) 2016 yuzulabo.<br>
            このソースコードは<a href="https://osdn.jp/magazine/07/09/05/017211" target="_blank">LGPLv3</a>を適用しています。<br>
            kill数取得は<a href="https://pvp.minecraft.jp/" target="_blank">Japan Minecraft PvP</a>様の公式APIを使用しています。(https://pvp.minecraft.jp/(username).json)<br>
            Minecraft は MojangABの著作物です。 Minecraft copyrights of Mojang AB.<br>
        </div>
    </div>
<?php endif; ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</body>
</html>