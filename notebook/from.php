<?php
    $sql = 'SELECT * FROM `nodes` WHERE `id`='.$_GET['id'];
    $res = mysqli_query($connect, $sql);
    if (mysqli_errno($connect)) echo mysqli_error($connect);

    $row = mysqli_fetch_assoc($res)
?>
<h3 class='text-center'>Update</h3>
<form method="POST" action="index.php">
    <input type="hidden" name="update">
    <input type="hidden" name="id" value='<?=$row['id'];?>'>
<div class="mb-3">
    <label for="firstname" class="form-label">Firstname</label>
    <input type="text" class="form-control" id="firstname" name='firstname' aria-describedby="emailHelp" required value='<?=$row['firstname'];?>'>
  </div>    

<div class="mb-3">
    <label for="name" class="form-label">Name</label>
    <input type="text" class="form-control" id="name" name='name' aria-describedby="emailHelp" required value='<?=$row['name'];?>'>
  </div>    

<div class="mb-3">
    <label for="lastname" class="form-label">Lastname</label>
    <input type="text" class="form-control" id="lastname" name='lastname' aria-describedby="emailHelp" required value='<?=$row['lastname'];?>'>
  </div>

  <div class="mb-3">
    <label for="gender" class="form-label">Gender</label>
    <select class="form-control" id="gender" name='gender' aria-describedby="emailHelp">
        <option <?php if($row['gender']=='mail') echo 'selected';?>>mail</option>
        <option <?php if($row['gender']=='femail') echo 'selected';?>>femail</option>
    </select>
  </div>  

<div class="mb-3">
    <label for="date" class="form-label">Date</label>
    <input type="date" class="form-control" id="date" name='date' aria-describedby="emailHelp" value='<?=$row['firstname'];?>' required>
  </div>  

  <div class="mb-3">
    <label for="telephone" class="form-label">Phone</label>
    <input type="tel" class="form-control" id="telephone" name='telephone' aria-describedby="emailHelp" required value='<?=$row['telephone'];?>'>
  </div>   
  
  <div class="mb-3">
    <label for="email" class="form-label">Email address</label>
    <input type="email" class="form-control" id="email" name='email' aria-describedby="emailHelp" placeholder='example@mail.ru' required value='<?=$row['email'];?>'>
  </div>  
  
  <div class="mb-3">
    <label for="addres" class="form-label">Addres</label>
    <input type="text" class="form-control" id="addres" name='addres' aria-describedby="emailHelp" required value='<?=$row['addres'];?>'>
  </div>

  <div class="mb-3">
    <label for="addres" class="form-label">Comment</label>
    <input type="text" class="form-control" id="comment" name='comment' aria-describedby="emailHelp" value='<?=$row['comment'];?>'>
  </div>

  <button type="submit" class="btn btn-primary mt-3">Update</button>
</form>