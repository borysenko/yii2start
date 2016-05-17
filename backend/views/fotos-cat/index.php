<?
use yii\helpers\Html;
use yii\grid\GridView;

$this->title = 'Категории Фотос';
$this->params['breadcrumbs'][] = $this->title;
?>
<h1>Категории Фотос</h1>
<p>

<?= Html::a('Создать', ['/fotos-cat/save','productID'=>$_GET['productID'],'type'=>$_GET['type']], ['class'=>'btn btn-success']) ?>
</p>
<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
		[
		'attribute' => 'id',
		'value'=>'id',
		'contentOptions'=>['style'=>'width: 70px;']
		],
		[
		'attribute' => 'name_ru',
		//'value'=>'name_ru',
		'format' => 'raw',
		'value'=>function($data) { return Html::a($data->name_ru,['fotos/index','catID'=>$data->id]); },
		//'contentOptions'=>['style'=>'max-width: 300px;']
		],
		[
		'attribute' => 'image',
                'format' => 'image',    
		'value'=>function($data) { return '/upload/fotos_cat/ico/'.$data->image; },
		'contentOptions'=>['style'=>'width: 100px;']
		],         
        
        [
            'class'    => 'yii\grid\ActionColumn',
            'template' => '{update}&nbsp;&nbsp;{delete}',
			        'buttons' => [
                        'update' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-pencil"></span>', ['/fotos-cat/save','id'=>$model->id],
                        [
                            'title' => "Редактировать",
                        ]);
                    },
                'delete' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-trash"></span>', ['/fotos-cat/delete','id'=>$model->id],
                        [
                            'title' => "Удалить",
                            'data-confirm' => 'Желаете удалить запись?',
                        ]);
                    },
                           
                ],
			'contentOptions'=>['style'=>'width: 70px;']
        ],		
    ],
]) ?>
