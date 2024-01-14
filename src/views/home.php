<?php
require "src/includes/header.inc.php";

use Andres\MyNotes\Models\Note;
?>


<div class="addBtn">
    <a href="?view=create"><p>+ new IDEA</p></a>
</div>
<h1 class="section-title">My IDEAS</h1>

<?php
$notes = Note::getAll();

foreach ($notes as $note) {
?>

    <div class="note-container"> <a href="<?php echo "?view=edit&uuid=" . $note->getUuid(); ?>">
            <h4 class="note-container-title"><?php echo $note->getTitle(); ?></h4>
        </a>
        <div >
            <form action="src/controllers/delete.php" method="post" onsubmit="return confirm('Are you sure you want to delete this IDEA?')" id="deleteForm">
                <button type="submit" class="emoji-trash"  id="btn-bin">🗑</btn>
                <input type="hidden" value="<?php echo $note->getUuid(); ?>" name="uuid">
            </form>
        </div>
    </div>
<?php }
?>



<?php
require "src/includes/footer.inc.php"
?>



