<?php 
    $sql = 'SELECT * FROM `nodes` WHERE 1';
    $res = mysqli_query($connect, $sql);
    if (mysqli_errno($connect)) echo mysqli_error($connect);
?>

<?php while($row = mysqli_fetch_assoc($res)):?>
    <span>
        <span><?=$row['id'].' '.$row['firstname'].' '.$row['name'].' '.$row['lastname'].'.';?></span>
        <a href='index.php?del=<?=$row['id'];?>'>Удалить</a>
        <br>
    </span>
<?php endwhile?>