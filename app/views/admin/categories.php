<div style="margin: 3% 5%">
    <a href="/admin/categoryCreate">
        <button class="btn">Создать категорию</button></a><br><br>
    <table style="border-collapse: collapse; border: 2px solid white;">
        <tr>
            <th>Имя</th>
            <th>Картинка</th>
            <th>Опции</th>
        </tr>

        <?php foreach($categories as $category){?>
            <tr style="border-bottom: 2px solid silver">
                <td> <h3><?= $category->name ?> </h3></td>
                <td> <img height="150"  src="<?=\models\Category::getImage($category->id)?>" alt="" /> </td>
                <td>
                    <a href="/admin/categoryEdit?id=<?= $category->id ?>">Изменить</a><br>
                    <a href="/admin/categoryDelete?id=<?= $category->id ?>">Удалить</a>
                </td>
            </tr>
        <?php }?>

    </table>
</div>