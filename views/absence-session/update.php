<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model humhub\modules\absences_module\models\AbsenceSession */

$this->title = 'Update Absence Session: ' . $model->student_id;
$this->params['breadcrumbs'][] = ['label' => 'Absence Sessions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->student_id, 'url' => ['view', 'student_id' => $model->student_id, 'session_id' => $model->session_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="absence-session-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
