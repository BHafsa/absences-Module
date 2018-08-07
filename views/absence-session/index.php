<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel humhub\modules\absences_module\models\AbsenceSessionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Absence Sessions';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="absence-session-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Absence Session', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'student_id',
            'session_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
