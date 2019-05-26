<?php
use app\models\tables\TaskStatuses;
use app\models\tables\Tasks;
use app\models\User;
?>

<h2>Список задач</h2>

<table class="table">
    <thead class="thead-light table-sm">
    <tr>
        <th class="px-6">id</th>
        <th>Название</th>
        <th>Описание</th>
        <th>Кто создал</th>
        <th>Кто ответственный</th>
        <th>Дедлайн</th>
        <th>Статус</th>
    </tr>
    </thead>
    <tbody>
    <? foreach ($result as $item):?>
        <tr>
            <td class="align-middle">
                <span class="h5"><?=$item['id']?></span>
            </td>
            <td>
                <span class="h5"><?=$item['name']?></span>
            </td>
            <td>
                <span class="h5"><?=$item['description']?></span>
            </td>
            <td>
                <span class="h5"><?=User::findIdentity(($item['creator_id']))->username?></span>
            </td>
            <td>
                <span class="h5"><?=User::findIdentity(($item['responsible_id']))->username?></span>

            </td>
            <td>
                <span class="h5"><?=$item['deadline']?></span>
            </td>
            <td>
                <span class="h5"><?=Tasks::findOne($item['status_id'])->status->name?></span>
            </td>
        </tr>
    <? endforeach; ?>
    </tbody>
</table>
