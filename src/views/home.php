<?php
require "src/includes/header.inc.php";

use Andres\MyNotes\Models\Note;
use Andres\MyNotes\Models\User;

if (session_status() == PHP_SESSION_NONE) {
    session_start();
   }

$uuid = $_SESSION["uuid"];
?>

<div class="outerCircle">
<div class="addBtn">
    <a href="?view=create"><p>new <br>IDEA</p></a>
</div>
</div>


<h1 class="section-title" id="home-title"><?php echo strtoupper($_SESSION["username"])?>´S IDEAS</h1>

<?php
$notes = Note::getAll($uuid);

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



