<h1>Edit Comment</h1>
<form action="comment/update/<?= $comment->getId() ?>" method="post">
    <label for="text">Comment:</label><br>
    <textarea name="text" id="text" rows="4" cols="50"><?= htmlspecialchars($comment->getText()) ?></textarea><br>
    <input type="submit" value="Update">
</form>