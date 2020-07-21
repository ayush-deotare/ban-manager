<?php

include("./db.php");

$key = get_key();

if (!isset($_POST["key"]) || !isset($_POST["uuid"])) {
    die("Error: Insufficient arguments!");
}

if ($key != $_POST["key"]) {
    die("Error: Invalid API Key.");
}

if (is_banned($_POST["uuid"])) {
    echo "true";
} else {
    echo "false";
}