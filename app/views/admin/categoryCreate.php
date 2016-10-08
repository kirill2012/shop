<div style="margin: 3% 5%">
    <form action="<?=URL?>/admin/categoryStore" method="post" enctype="multipart/form-data">
        <label for="name">Имя</label>
        <input type="text" name="name" size="40"> <br><br>
        <label for="text">Изображение</label> <input type=file name=uploadfile>
        <img src="">
        <br><br>
        <input class="btn" type="submit" value="Create">
    </form>
</div>