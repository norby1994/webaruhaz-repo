<?php

include "connection.php";

$stid = oci_parse($connect, 'INSERT INTO MYTABLE (myid, mydata) VALUES(:myid, :mydata)');

$id = 60;
$data = 'Some data';

oci_bind_by_name($stid, ':myid', $id);
oci_bind_by_name($stid, ':mydata', $data);

$r = oci_execute($stid);  // executes and commits

if ($r) {
    print "One row inserted";
}

?>