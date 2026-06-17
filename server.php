<?php

    // leggo json e salvo in variabile
    $data_json = file_get_contents('./records.json');

    //converto json in array associativo
    $records = json_decode($data_json, true);

    if(
        isset($_POST["title"]) && !empty($_POST["title"]) &&
        isset($_POST["artist"]) && !empty($_POST["artist"]) &&
        isset($_POST["cover_url"]) && !empty($_POST["cover_url"]) &&
        isset($_POST["release_year"]) && !empty($_POST["release_year"]) &&
        isset($_POST["genre"]) && !empty($_POST["genre"])
        ) {
        $records[] = [
            "title" => $_POST["title"],
            "artist" => $_POST["artist"],
            "cover_url" => $_POST["cover_url"],
            "release_year" => (int) $_POST["release_year"],
            "genre" => $_POST["genre"]
        ];
    }

    $records_json = json_encode($records, JSON_PRETTY_PRINT);

    file_put_contents('./records.json', $records_json);

    header("Location: ./index.php");

?>