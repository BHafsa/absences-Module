<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\data\ActiveDataProvider;
use humhub\modules\absences\models;


/* @var $this yii\web\View */
/* @var $searchModel humhub\modules\absences_module\models\ClassGroupSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Class Groups';
$this->params['breadcrumbs'][] = $this->title;





?>
<div class="class-group-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

<?php echo GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' =>
     [
        'number',
        [
            'attribute'=>'Niveau',
            'format' => 'raw',
            'value'=> function ($model) { return  Html::a($model->getLevelObject()->getLabel() ,['course/index']);},
        ],
          
     ],
]);
?>  
</div>
