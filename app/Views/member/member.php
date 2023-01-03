<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>member</title>
</head>
<body>

<h2>嗨<?= esc($name)?></h2>
<a href="<?=base_url('Member/DoLogout')?>">登出</a>

</body>
</html>