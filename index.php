<?php

session_start();
// GLOBAL variables are stored in PHP's
// $GLOBALS array.
$GLOBALS['pageTitle'] = 'Home';

// Show our header.
include './templates/header.php';
?>

<p>
  Welcome to our
  <?php echo $GLOBALS['pageTitle']; ?>
  page!
</p>


<?php if (isset ($_SESSION['calcHistory'])) : ?>

<h2> Calculator History From Session </h2>
<ul>

<?php foreach ($_SESSION['calcHistory'] as $calculation) : ?>
<li>
<?php echo $calculation;
?>
</li>
<?php endforeach; ?>
</ul>
<?php endif; ?>

<?php // Show our footer.
include './templates/footer.php';
