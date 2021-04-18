<?php
/*
 * Файл components/views/brands.php
 */
use yii\helpers\Html;
use yii\helpers\Url;
?>


<?php foreach ($brands as $category): ?>
    <li>
        <a href="<?= Url::to(['category/view', 'id' => $category['id']]); ?>">
            <span class="badge pull-right"><?= $category['count']; ?></span>
            <?= Html::encode($category['name']); ?>
        </a>
    </li>
<?php endforeach; ?>

