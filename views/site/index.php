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
            <a class="btn btn-lg btn-success" href="bills/index">Criar um lançamento</a>
        </p>
        <p>
            <?=
            Html::a("Ver Relatorios")
            ?>
        </p>
    </div>
</div>
