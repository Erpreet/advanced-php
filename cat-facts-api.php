
<?php
// GLOBAL variables are stored in PHP's
// $GLOBALS array.
$GLOBALS['pageTitle'] = 'Cat Facts (External API test)';
include './templates/header.php';


$dailyCatFactResponse = file_get_contents( 
    'https://cat-fact.herokuapp.com/facts/random'
  );
  //var_dump( $dailyCatFactResponse );
   // Testing output in var_dump...
  //var_dump( $dailyCatFactResponse );
  // If we got a response...
  if ( $dailyCatFactResponse )
  { // Convert JSON string to PHP object.
    $dailyCatFact = json_decode( $dailyCatFactResponse );
    // Output daily cat fact as HTML for the browser...
    ?>
      <h2>Today's Cat Fact:</h2>
      <p><?php echo $dailyCatFact->text; // Output the text property! ?></p>
    <?php
  }

  ?>
  <h2>Request Animal Facts </h2>
  <form action=# method="POST"> 
  <label for="amount"> Enter the amount of facts:
  <input type="number" id="amount" name="amount"> </label>

  <label for="animal-type"> Enter the type of animal:
    <select id="animal-type" name="type">
    <option value="cat"> Cat </option>
    <option value="dog"> Dog </option>
    <option value="horse"> Horse </option>
    <option value="snail"> snail </option>

    </select>
    </label>

    <input type="submit" value="Get Animal Facts!">

    </form>
  <?php

  if(isset ($_POST['amount']) && isset ($_POST['type']))
  {

  

  $factsListResponse = file_get_contents("https://cat-fact.herokuapp.com/facts/random?amount={$_POST['amount']}&animal_type={$_POST['type']}" 
);


var_dump($factsListResponse);

if ( $factsListResponse )
  { // Convert the JSON string to a PHP Array.
    $factsList = json_decode( $factsListResponse );
    ?>
      <h2>
        List of
        <?php echo ucfirst( $_POST['type'] ); // Show TYPE of facts! ?>
        Facts
      </h2>
      
        <?php if ( is_object( $factsList ) ) : ?>
      <p> <?php echo $factsList->text; ?> </p>
      <?php elseif ( !empty( $factsList ) ) : ?>
      
      <ol>
        <?php foreach ( $factsList as $fact ) : ?>
          <li>
            <?php echo $fact->text; ?>
          </li>
        <?php endforeach; ?>
      </ol>
      
      <?php else : ?>
        <p>No facts found.</p>
      <?php endif; ?>
    <?php
  
}
  }

include './templates/footer.php';
