
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php

    $records = json_decode(file_get_contents('./records.json'), true);

?>

<ul>
    <?php

        foreach($records as $record) {

            echo "<li>" . $record["title"] . "</li>";

        }

    ?>
</ul>


    
    
</body>
</html>