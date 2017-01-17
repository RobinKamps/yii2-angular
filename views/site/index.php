<?php

/* @var $this \yii\web\View */
/* @var $content string */

$appName = Yii::$app->name;

$date = !empty($date) ? $date : null;
$assetPath = $date ? "/compiled-$date" : "/compiled";
$min = $date ? ".min" : "";

?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $appName ?></title>
    <?php $this->head() ?>

    <link rel="stylesheet" type="text/css" href="<?= "$assetPath/vendor{$min}.css" ?>">
    <link rel="stylesheet" type="text/css" href="<?= "$assetPath/app{$min}.css" ?>">
</head>
<body>
<?php $this->beginBody() ?>

<div id="app">
    <div class="wrap">
        <nav class="navbar-inverse navbar-fixed-top navbar">
            <div class="container">
                <navbar></navbar>
            </div>
        </nav>

        <div class="container">
            <router-view></router-view>
        </div>
    </div>

    <footer class="footer">
        <div class="container">
            <p class="pull-left">&copy; <?= $appName ?> <?= date('Y') ?></p>
            <p class="pull-right"><?= Yii::powered() ?></p>
        </div>
    </footer>
</div>

<script type="text/javascript">
    window.AppConfig = {
        apiUrl: '<?= env("API_URL") ?>',
        recaptchaSitekey: '<?= env("RECAPTCHA_SITEKEY") ?>',
    };
</script>

<script type="text/javascript">
if (/MSIE \d|Trident.*rv:/.test(navigator.userAgent)) {
    document.write('<script src="/include/es6-promise<?= $min ?>.js"><\/script>');
}
</script>
<script src="<?= "$assetPath/vendor{$min}.js" ?>"></script>
<script src="<?= "$assetPath/app{$min}.js" ?>"></script>
<?php if (getenv("RECAPTCHA_SITEKEY")): ?>
<script src="https://www.google.com/recaptcha/api.js?onload=recaptchaLoaded&render=explicit" async defer></script>
<?php endif; ?>

<?php $this->endBody() ?>
</body>
</html>