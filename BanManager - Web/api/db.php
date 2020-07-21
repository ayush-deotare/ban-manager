<?php

function get_mysql() {
    $conn = new mysqli("localhost", "root", "", "banmanager", 3308);

    if ($conn->connect_errno) {
        die($conn->connect_error);
    }

    return $conn;
}

function is_banned($uuid) {
    $conn = get_mysql();
    $query = "SELECT * FROM `bans` WHERE `uuid`='$uuid'";

    $result = $conn->query($query);

    if ($result->num_rows > 0) return true;
        return false;
}

function get_ban($uuid) {
    $conn = get_mysql();
    $query = "SELECT * FROM `bans` WHERE `uuid`='$uuid'";

    return $conn->query($query)->fetch_assoc();
}

function ban($uuid, $by=NULL, $reason=NULL) {
    $conn = get_mysql();
    $date = date("d-m-Y, h:i:s A");
    $query = "INSERT INTO `bans` (`uuid`,`by_uuid`, `reason`, `date`) VALUES ('$uuid', '$by', '$reason', '$date')";

    $result = $conn->query($query);
    
    //TODO: Add JSON output.
}

function get_all_bans() {
    $conn = get_mysql();
    $query = "SELECT * FROM `bans`";

    $result = $conn->query($query);

    return $result;
}

function get_key() {
    return "0000-1111-2222";
}
