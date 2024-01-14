<?php
require "src/includes/header.inc.php";
require "src/controllers/edit_control.php";
?>


<p class="back-btn"><a href="index.php">< back</a></p>
<h1>Edit IDEA</h1>
<form action="src/controllers/edit_control.php" method="post">
    <input type="text" name="title" placeholder="Title..." value=<?php echo $note->getTitle() ?> autofocus>
    <textarea name="content" placeholder="Content..."><?php echo $note->getContent() ?></textarea>
    <input type="hidden" name="uuid" value="<?php  echo $note->getUuid(); ?>">
    <input type="submit" value="update note">
</form>


<?php
require "src/includes/footer.inc.php";
?>