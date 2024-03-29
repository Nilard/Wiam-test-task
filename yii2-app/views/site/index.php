<?php
/* @var $this yii\web\View */
/* @var $imageUrl string */

use yii\bootstrap5\Button;

$this->registerJsFile('@web/js/site.js');
$this->title = Yii::t('app', 'Home page');
?>
<div class="site-index">
    <div class="body-content">

        <div class="mb-3">
            <img src="<?= $imageUrl ?>" alt="<?= Yii::t('app', 'Random Image') ?>">
        </div>

        <div class="d-flex gap-3">

            <?= Button::widget([
                'label' => Yii::t('app', 'Approve'),
                'options' => [
                    'id' => 'btn-approve',
                    'data-id' => $imageId,
                    'class' => 'btn-success',
                ]
            ]) ?>

            <?= Button::widget([
                'label' => Yii::t('app', 'Reject'),
                'options' => [
                    'id' => 'btn-reject',
                    'data-id' => $imageId,
                    'class' => 'btn-danger',
                ]
            ]) ?>

        </div>

    </div>
</div>
