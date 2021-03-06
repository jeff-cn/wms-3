<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\CompanyType */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Company Types');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="company-type-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Company Type'), ['create'], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'name',
            'createdAt',
            'updatedAt',
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view}{update}{delete}',
                'header' => 'Action',
                'buttons' => [
                    'delete' => function($url, $model){
                            if ($model->canDelete()) {
                                return Html::a('', $url, ['class' => 'glyphicon glyphicon-trash']);
                            } else {
                                return '';
                            }
                    },
                ]
            ],
        ],
    ]); ?>
</div>
