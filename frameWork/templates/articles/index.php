<?php require(__DIR__.'/../header.php'); // добавляем header?>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Title</th>
      <th scope="col">Text</th>
      <th scope="col">Author</th>
      <th scope="col">Date</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach($articles as $article): // Выводим article из массива articles с разметкой как снизу?>
    <tr>
      <th scope="row"><?=$article->getId();?></th>
      <td><a href="<?=dirname(['SCRIPT_NAME'])?>/article/<?=$article->getId();?>"><?=$article->getTitle();?></a></td>
      <td><?=$article->getText();?></td>
      <td><?=$article->getAuthorId()->getNickname();?></td>
      <td><?=$article->getCreatedAt();?></td>
    </tr>
    <?php endforeach;?>
  </tbody>
</table>
<?php require(__DIR__.'/../footer.php'); // добавляем footer?>