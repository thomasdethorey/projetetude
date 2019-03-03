<?php
session_start();
    ?>
<p><?= $_SESSION['pseudo'] ?></p>
<p><?= $_SESSION['firstname'] ?></p>
<p><?= $_SESSION['id'] ?></p>
<p><?= $_SESSION['mail'] ?></p>
<p><?= $_SESSION['lastname'] ?></p>
<p><?= $_SESSION['birthdate'] ?></p>
<p><?= $_SESSION['phone']?></p>
<p><?= $_SESSION['bankroll']?></p>

<?php
