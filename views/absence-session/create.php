<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model humhub\modules\absences_module\models\AbsenceSession */

$this->title = 'Create Absence Session';
$this->params['breadcrumbs'][] = ['label' => 'Absence Sessions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="absence-session-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
