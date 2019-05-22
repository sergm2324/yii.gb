<h2>Карточка задачи</h2>

<p><?=$model->name;?></p>
<p><?=$model->discribe;?></p>
<p><?=$model->autor;?></p>
<p><?=$model->responsible;?></p>
<p><?=$model->datedo;?></p>

<h3>Ошибки валидации:</h3>
<? foreach ($myerrors as $item):?>
<p><?=$item[0];?></p>
<? endforeach; ?>
