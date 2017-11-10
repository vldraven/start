<?php

use yii\helpers\Html;
use yii\grid\GridView;
use rmrevin\yii\fontawesome\FA;
rmrevin\yii\fontawesome\AssetBundle::register($this);
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $searchModel app\models\StudentsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ученики';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="students-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); 

    ?>

    <p>
        <?= Html::a('Добавить ученика', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
      <div class="table-responsive">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'summary' => "Показано с <strong>{begin}</strong> по <strong>{end}</strong> из <strong>{totalCount}</strong>",
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'userFullName',
                'userName',
                'phone_number',
                'parents_name',
                'parents_number',
                'parents_email:email',
                'birth:date',

                 ['class' => 'yii\grid\ActionColumn',
                 'template' => '{view} {update} {delete} {show-groups}',
                 'header' => 'Действия',   
                 'buttons' => [
                    'view' => function ($url,$model) {
                        return Html::a(
                        FA::icon('eye')->size(FA::SIZE_LARGE),     
                        $url,
                        ['title' => 'Просмотр']
                                );
                    },
                    'update' => function ($url,$model) {
                        return Html::a(
                        FA::icon('pencil')->size(FA::SIZE_LARGE),     
                        $url,
                        ['title' => 'Редактировать']
                                );
                    },
                    'delete' => function($url, $model){
                        return Html::a(
                       FA::icon('trash')->size(FA::SIZE_LARGE), 
                       ['delete', 'id' => $model->id],
                       [
                        'class' => '',
                        'title' => 'Удалить',   
                        'data' => [
                        'confirm' => 'Вы действительно хотите удалить ученика?',
                        'method' => 'post',
                             ],
                        ]);
                   },
                 
                ],   
              ],
            ],
        ]);
 
         ?>
     </div>     
</div>
