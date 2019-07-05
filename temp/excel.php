<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Магазин</title>
  
</head>
<body>
	<header>
		
	</header>
	
	<div style="display: flex; flex-wrap: wrap">
		<div style="width: 300px; padding: 20px">
			<a href=""><img src="img/1.jpg" alt="изображение товара" width="260px"></a>
		</div>
		
		
		
		
	</div>
	
</body>
</html>
<?php

$dataProvider = new ActiveDataProvider([
                'query' => Goods::find()->andWhere("MONTH(deadline) = {$month}") //на уроке преподователь так сделал
            ]);
//или скопитровать TaskFilter.php из сгенерированной админки
//надо еще почитать про gridview и провайдер для него
//или так:			
			
			
use yii\data\SqlDataProvider;

$count = Yii::$app->db->createCommand('
    SELECT COUNT(*) FROM post WHERE status=:status
', [':status' => 1])->queryScalar();

$provider = new SqlDataProvider([
    'sql' => 'SELECT * FROM post WHERE status=:status',
    'params' => [':status' => 1],
    'totalCount' => $count,
    'pagination' => [
        'pageSize' => 10,
    ],
    'sort' => [
        'attributes' => [
            'title',
            'view_count',
            'created_at',
        ],
    ],
]);

// возвращает массив данных
$models = $provider->getModels();

//Совет: Свойство totalCount обязательно только тогда, когда вам нужна разбивка на страницы. Всё потому, что запрос SQL sql 
//будет изменяться провайдером данных для возврата только текущей запрошенной страницы. 
//Провайдеру необходимо знать общее количество данных в запросе для корректного вычисления разбивки на доступные страницы.
//взято: https://yiiframework.com.ua/ru/doc/guide/2/output-data-providers/

//сделать самый простой датапровайдер, а сортировку делать через запросы
$connection=Yii::app()->db;
    $sql="SELECT (*) FROM `Goods`;"; //добавить лимит и ордер бай
    $dataReader=$connection->createCommand($sql)->query();
	
	
	
	