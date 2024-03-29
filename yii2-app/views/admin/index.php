<?php
/* @var $this yii\web\View */
/* @var $images array */

use yii\helpers\Html;
use yii\bootstrap5\Button;
use app\models\Image;

$this->registerJsFile('@web/js/admin.js');
$this->title = Yii::t('app', 'Admin page');
?>
<div class="admin-index">
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th><?= Yii::t('app', 'ID') ?></th>
                    <th><?= Yii::t('app', 'Decision') ?></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($images as $image): ?>
                    <tr>
                        <td><?= Html::a($image->image_id, ["https://picsum.photos/id/{$image->image_id}/600/500"]) ?></td>
                        <td>
                            <span class="badge <?= $image->status === Image::STATUS_APPROVED ? 'text-bg-success' : 'text-bg-danger' ?>">
                                <?= $image->status === Image::STATUS_APPROVED ? Yii::t('app', 'Approved') : Yii::t('app', 'Rejected') ?>
                            </span>
                        </td>
                        <td>
                            <?= Button::widget([
                                'label' => Yii::t('app', 'Cancel decision'),
                                'options' => [
                                    'id' => 'btn-' . $image->image_id,
                                    'data-id' => $image->image_id,
                                    'class' => 'btn-cancel btn-primary',
                                ]
                            ]) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
