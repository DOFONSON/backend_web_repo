<?php
    
    $sql = 'SELECT * FROM `nodes`';
    $res_count = mysqli_query($connect,$sql);
    $count = mysqli_num_rows($res_count);
    $count_read = 5; 
    $pages = ceil($count / $count_read);
    $page = 0;
    $page = $_GET['page']*$count_read;

    $sql = 'SELECT * FROM `nodes` ORDER BY '.$_GET['o'].' LIMIT '.$page.', '.$count_read;
    $res = mysqli_query($connect, $sql);
    if (mysqli_errno($connect)) echo 'Ошибка запроса: '.mysqli_error($connect)
?>

<div class="btn-group" role="group" aria-label="Basic example">
  <a href='index.php?&o=id'  class="btn btn-primary <?php if ($_GET['o']=='id') echo 'active';?>">ID</a>
  <a href='index.php?&o=firstname'   class="btn btn-primary <?php if ($_GET['o']=='firstname') echo 'active';?>">Firstname</a>
  <a href='index.php?&0=date'   class="btn btn-primary <?php if ($_GET['o']=='date') echo 'active';?>">Date</a>
</div>

<?php if (isset($s)):?>
<div class="alert alert-success" role="alert">
  <p><?=$s;?></p>
</div>
<?php endif;?>

<table class="table">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">FirstName</th>
      <th scope="col">Name</th>
      <th scope="col">LastName</th>
      <th scope="col">Gender</th>
      <th scope="col">Date</th>
      <th scope="col">phone</th>
      <th scope="col">Email</th>
      <th scope="col">Phone</th>
      <th scope="col">Addres</th>
      <th scope="col">Comment</th>
    </tr>
  </thead>
  <tbody>
    <?php
      while ($row = mysqli_fetch_assoc($res)): 
    ?>
    <tr>
      <th scope="row"><?=$row['id'];?></th>
      <td><?=$row['firstname']?></td>
      <td><?=$row['name']?></td>
      <td><?=$row['lastname']?></td>
      <td><?=$row['gender']?></td>
      <td><?=$row['date']?></td>
      <td><?=$row['telephone']?></td>
      <td><?=$row['email']?></td>
      <td><?=$row['addres']?></td>
      <td><?=$row['comment']?></td>

    </tr>
    <?php 
      endwhile;
    ?>
  </tbody>
</table>

<nav aria-label="Page navigation example">
  <ul class="pagination">
    <?php for ($i=0; $i<$pages; $i++):?>
    <li class="page-item <?php if ($_GET['page']==$i) echo 'active';?>" ><a class="page-link" href="index.php?page=<?=$i;?>&0=<?=$_GET['o'];?>"><?=$i+1?></a></li>
      <?php endfor;?>
  </ul>
</nav>