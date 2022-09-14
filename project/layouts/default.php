<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="/project/webroot/style.css">
    <link rel="stylesheet" href="/project/webroot/bootstrap-5.2.0-dist/css/bootstrap.min.css">
    <title><?= $title ?></title>
</head>
<body>
<div class="wrapper">
    <header class="header">
        <div class="header_container container">
            <div class="header_logo">
                <picture>
                    <source srcset="/project/webroot/img/keepcodeLogo.svg" type="image/webp"><img src="/project/webroot/img/keepcodeLogo.svg" alt="logo">
                </picture>
            </div>
            <div class="header_master">
                Башкатов Александр
            </div>
        </div>
    </header>



    <main>
        <div class="container">
            <?= $content ?>
        </div>
    </main>


    <footer class="footer">
        <div class="container">
            футер сайта
        </div>
    </footer>
</div>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.2.1/dist/jquery.min.js" type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery.maskedinput@1.4.1/src/jquery.maskedinput.min.js" type="text/javascript"></script>
<script src="/project/webroot/bootstrap-5.2.0-dist/js/bootstrap.js"></script>
<script src ="/project/webroot/js/script.js"></script>
<script src ="/project/webroot/js/jq.js"></script>
</body>
</html>