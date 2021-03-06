<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Bill */

$this->title = $model->description;
$this->params['breadcrumbs'][] = ['label' => 'Contas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="bill-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Atualizar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Deletar', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Tem certeza de que deseja excluir este item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                    'attribute'=> 'category_id',
                    'value' => $model->category->name,
            ],
            [
                'attribute'=> 'type',
                'value' => $model->getTypeText(),
            ],
            'date:date',
            'description',
            'amount:currency',
            [
                'attribute'=> 'status',
                'value' => $model->getStatusText(),
            ],
            'created_at:date',
            'updated_at:date',
        ],
    ]) ?>

</div>
