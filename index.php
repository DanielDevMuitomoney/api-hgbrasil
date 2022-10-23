<?php
include_once 'app/config/config.php';
include_once 'app/modules/hg-api.php';

$hg = new HG_API(HG_API_KEY);

$dolar = $hg->dolar_quotation();

if($hg->is_error() ===false){
    $variation = $dolar['variation'] <0 ? 'danger' : 'info';

}
var_dump($dolar);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="app/styles/style.css">
    <title>Document</title>
</head>
<body>
    <div>
        <?php if($hg->is_error() == false): ?>
        <p class="<?php echo $variation ?>">USD:<?php echo $dolar['buy'] ?></p>
        <?php else :?>
            <p>error</p>
            <?php endif?>
    </div>
</body>
</html>