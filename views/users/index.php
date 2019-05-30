<h2>Список пользователей</h2>

<table class="table">
    <thead class="thead-light table-sm">
    <tr>
        <th class="px-5">id</th>
        <th>Логин</th>
        <th>Пароль</th>
        <th>authKey</th>
        <th>accessToken</th>
    </tr>
    </thead>
    <tbody>
    <? foreach ($result as $item):?>
        <tr>
            <td class="align-middle">
                <span class="h5"><?=$item['id']?></span>
            </td>
            <td>
                <span class="h5"><?=$item['username']?></span>
            </td>
            <td>
                <span class="h5"><?=$item['password']?></span>
            </td>
            <td>
                <span class="h5"><?=$item['authKey']?></span>
            </td>
            <td>
                <span class="h5"><?=$item['accessToken']?></span>
            </td>
        </tr>
    <? endforeach; ?>
    </tbody>
</table>
