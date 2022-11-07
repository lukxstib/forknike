<?php
    include_once "util.php";   
    if (!empty($_POST) && !empty($_POST["name"]) && $_POST["score"] != "0")
    {
        var_dump($_POST);
        execute_query("INSERT INTO forknight_score (id, name, score, time)
        VALUES (NULL, :NAME, :SCORE, CURRENT_TIMESTAMP);", [":NAME" => $_POST["name"], ":SCORE" => $_POST["score"]]);
    }

    else if (isset($_GET))
    {
        top_5_score();
    }
?>