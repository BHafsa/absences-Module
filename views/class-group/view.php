<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model humhub\modules\absences_module\models\ClassGroup */

$this->title = $model->class_group_id;
$this->params['breadcrumbs'][] = ['label' => 'Class Groups', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="class-group-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->class_group_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->class_group_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'class_group_id',
            'number',
            'section_id',
            'level_id',
            'date',
        ],
    ]) ?>

</div>
