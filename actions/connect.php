<?php

$con = mysqli_connect("localhost", "root", "", "voting_db");

if (!$con) {
    die(mysql_connect_error($con));
}
