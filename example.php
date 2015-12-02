<?php

/* this example creates a list box from our database.
 * Four step process

  Create your database object using the appropriate database username
  Define your query. In this example we open the file that contains the query.
  Execute the query
  Prepare output and loop through array

 */
//initialize value
$pokemon = "Pokemon";

// Step one: generally code is in top.php
require_once('../bin/Database.php');

$dbUserName = get_current_user() . '_reader';
$whichPass = "r"; //flag for which one to use.
$dbName = strtoupper(get_current_user()) . '_UVM_Courses';

$thisDatabase = new Database($dbUserName, $whichPass, $dbName);

// Step Two: code can be in initialize variables or where step four needs to be
$query  = "SELECT DISTINCT pmkName";
$query .= "FROM tblPokemon ";
$query .= "ORDER BY pmkIdNo";


// Step Three: code can be in initialize variables or where step four needs to be
// $buildings is an associative array
$pokemon = $thisDatabase->select($query, "", 0, 1, 0, 0, false, false);

// Step Four: prepare output two methods, only do one of them
/* html looks like this if we were to do this manually (shortened to three 
  buildings

  <label for="lstBuildings">Building
  <select id="lstBuildings"
  name="lstBuildings"
  tabindex="300" >

  <option value="AIKEN">AIKEN</option>
  <option value="KALKIN">KALKIN</option>
  <option value="VOTEY" selected>VOTEY</option>

  </select></label>


  Here is how to code it */

// coded to store output in a variable, this example i use an array
// in the form i build a message to be mailed so the variable is
// $message, in both cases output is stored before printing
/* same thing just not in an array

  $message  = '<label for="lstBuildings">Building"';
  $message .= '<select id="lstBuildings" ';
  $message .= '        name="lstBuildings"';
  $message .= '        tabindex="300" >';

 */
print "<h2>List box built from Database</h2>";
// or you can print it out
print '<label for="lstPokemon">Pokemon ';
print '<select id="lstPokemon" ';
print '        name="lstPokemon"';
print '        tabindex="300" >';


foreach ($buildings as $row) {

    print '<option ';
    if ($building == $row["pmkName"])
        print " selected='selected' ";

    print 'value="' . $row["pmkName"] . '">' . $row["pmkName"];

    print '</option>';
}

print '</select></label>';

print '</form>';