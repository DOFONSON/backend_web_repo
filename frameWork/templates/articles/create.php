<?php require(__DIR__.'/../header.php'); // Подключаем header  ?>
    <form action="<?=dirname($_SERVER['SCRIPT_NAME'])?>/article/store" method='POST'> <!-- Отправляем данные на сервер при сабмите формы -->
    <div class="form-group"> 
        <label for="title">Title arcticle</label>
        <input type="text" class="form-control" id="title" name="title"> <!-- Заголовок статьи -->
    </div>
    <div class="form-group">
        <label for="text">Text arcticle</label>
        <textarea name="text" id="text" class="form-control"></textarea> <!-- Текст статьи -->
    </div>
    <input type="hidden" name="authorId" value='1'> <!-- Скрытое поле с id автора статьи --> 
    <button type="submit" class="btn btn-primary">Save</button> 
    </form>
<?php require(__DIR__.'/../footer.php'); // Подключаем footer?>