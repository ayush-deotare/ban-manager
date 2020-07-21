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
    die("Error: The player is already banned!");
}

ban($_POST["uuid"], $_POST["by"], $_POST["reason"]);

echo "Success: Player banned!";