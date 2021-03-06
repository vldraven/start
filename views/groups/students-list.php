<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\data\ActiveDataProvider;
use app\models\Students;
use rmrevin\yii\fontawesome\FA;
use yii\bootstrap\Modal;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Groups */

$query = Students::find()->where('id > 0');
 $dataProvider = new ActiveDataProvider([
     'query' => $query
 ]);
 echo Html::beginForm(['add-students', 'post', [
     'groupId' => $groupId
 ]]);


 echo GridView::widget([
     
        'dataProvider' => $dataProvider,
        'summary' => '',
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'userFullName',
            ['class' => 'yii\grid\CheckboxColumn',
             'checkboxOptions' => function($model)  {
                return ['value' => $model->id];
             }
             ],
        ],
    ]);
         echo Html::submitButton('Добавить выбранные', [
             'class' => 'btn btn-primary'
         ]);    
    echo Html::endForm();
       



//<button onclick="var keys = $('#w0').yiiGridView('getSelectedRows'); alert(keys)">Добавить</button>
?>


