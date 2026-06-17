
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

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

        header("Location: ./index.php");
    }

    $records_json = json_encode($records, JSON_PRETTY_PRINT);

    file_put_contents('./records.json', $records_json);

?>


<form method="POST">
    <div><label for="title">Title</label><br><input type="text" id="title" name="title"></div>
    <div><label for="artist">Artist</label><br><input type="text" id="artist" name="artist"></div>
    <div><label for="cover_url">Cover url</label><br><input type="text" id="cover_url" name="cover_url" required></div>
    <div><label for="release_year">Release year</label><br><input type="text" id="release_year" name="release_year" required></div>
    <div><label for="genre">Genre</label><br><input type="text" id="genre" name="genre" required></div>
    <button type="submit">Add record</button>
</form>

<ul>
    <?php

        foreach($records as $record) { ?>

        <li>
            <?php echo $record["title"] ?>
            <ul>
                <li><?php echo $record["artist"] ?></li>
                <li><?php echo $record["cover_url"] ?></li>
                <li><?php echo $record["release_year"] ?></li>
                <li><?php echo $record["genre"] ?></li>
            </ul>
        </li>

    <?php } ?>
</ul>

<?php


?>
    
    
</body>
</html>