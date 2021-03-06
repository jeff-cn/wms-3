<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\Product */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Products');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Product'), ['create'], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'sku',
            'quantity',
            [
                'attribute' => 'idWarehouse',
                'value' => function($model){
                    return $model->warehouse->name;
                },
            ],
            // 'barcode',
            'remark',
            // 'idType',
            // 'max',
            // 'min',
            // 'createdAt',
            // 'updatedAt',
            // 'deletedAt',
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{Transfer}{view}{update}{delete}',
                'header' => 'Action',
                'buttons' => [
                    'Transfer' => function($url, $model){
                        if ($model->quantity > 0) {
                            return Html::a('Transfer', ['transfer/detail/create', 'idProduct' => $model->id], ['class' => '']);
                        }
                    },
                ]
            ],
        ],
    ]); ?>
</div>
