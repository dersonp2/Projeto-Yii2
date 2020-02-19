<?php

/* @var $this yii\web\View */
use \yii\helpers\Html;
$this->title = 'Sistema Financeiro Pessoal';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Sistema Financeiro Pessoal!</h1>
        <p class="lead">Organização de suas financias pessoais.</p>

        <p>
            <?=
            Html::a('<i class="glyphicon glyphicon-plus-sign"></i> Criar um lançamento',
                ['/bills/index'],
                ['title'=>'Criar um lançamento',
                'class'=> 'btn btn-lg btn-success'])
            ?>
        </p>
        <p>
            <?=
            Html::a("Ver Relatorios", ['/reports/index'], ['title'=>'Ver meus relatórios',
                'class'=> 'btn btn-sm btn link'])
            ?>
        </p>
    </div>
</div>
