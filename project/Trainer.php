<?php
/* %^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%
 * the purpose of this page is to display a list of poets, admin can edit
 * 
 * Written By: Robert Erickson robert.erickson@uvm.edu
 */
// %^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%
$admin = true;
include "top.php";

print "<article>";
// %^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%
// prepare the sql statement
$orderBy = "ORDER BY fldLastName";

$query  = "SELECT pmkTrainerIdNo, fldFirstName, fldLastName ";
$query .= "FROM tblTrainer " . $orderBy;

if ($debug)
    print "<p>sql " . $query;

$trainers = $thisDatabase->select($query, "", 0, 1, 0, 0, false, false);

if ($debug) {
    print "<pre>";
    print_r($trainers);
    print "</pre>";
}

// %^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%
// print out the results
print "<ol>\n";

foreach ($trainers as $trainers) {

    print "<li>";
    if ($admin) {
        print '<a href="form.php?id=' . $poet["pmkTrainerIdNo"] . '">[Edit]</a> ';
    }
    print $poet['fldFirstName'] . " " . $poet['fldLastName'] . "</li>\n";
}
print "</ol>\n";
print "</article>";
include "footer.php";
?>