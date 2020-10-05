<?php

//Goal: Return a JSON representation of snack
//Parameter: Query parameter string 'search' term

header('Content-type: app/JSON; charset=UTF-8');
header('Access-Control-Allow-Origin: *');
header ('Access-Control-Allow-Methods: GET');

// First, let's make sure there is a search term present.
if ( isset( $_GET['search'] ) && !empty( $_GET['search'] ) )
{ // JSON object response w/the search term.
 // echo "{\"response\":\"Search term: {$_GET['search']}\"}";
 $snacksJSONString = file_get_contents( '../data/snacks.json'

 );
}

if($snacksJSONString !== FALSE)
{
  $snacksList = json_decode ($snacksJSONString);
  if($snacksList !== NULL)
  {
    $matchingSnacks = array();
    foreach ($snacksList as $snack)
    {
      if (stristr($snack [0], $_GET['search'] ))
        {
          array_push ($matchingSnacks, $snack);
        }
    }
 
    
      echo json_encode ($matchingSnacks);
    
  }
  else
  {
    echo"{\"response\":\"ERROR: Unable to convert Snacks list from JSON.\"}";
  }
  }

// If there is no search present, a default / fall-back response.
else
{ // JSON object response w/status info.
  echo "{\"response\":\"ERROR: No search term present.\"}";
}