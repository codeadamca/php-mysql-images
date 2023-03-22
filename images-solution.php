<?php

// Connect to the MySQL database
$connect = mysqli_connect('<DB_HOST>', '<DB_USER>', '<DB_PASSWORD>', '<DB_BATABASE>');

// If the connection did not work, display an error message
if (!$connect) 
{
    echo 'Error Code: ' . mysqli_connect_errno() . '<br>';
    echo 'Error Message: ' . mysqli_connect_error() . '<br>';
    exit;
}

?>
<!doctype html>
<html>
    <head>
        <title>PHP, MySQL, and Images</title>
    </head>
    <body>

        <h1>PHP, MySQL, and Images</h1>

        <?php

        // Create a query
        $query = 'SELECT id,name,filename
            FROM images
            ORDER BY name';

        // Execute the query
        $result = mysqli_query($connect, $query);

        // If there is no result, display an error message
        if (!$result)
        {
            echo 'Error Message: ' . mysqli_error($connect) . '<br>';
            exit;
        }

        // Display the number of recirds found
        echo '<p>The query found ' . mysqli_num_rows($result) . ' rows:</p>';

        // Loop through the records found
        while ($record = mysqli_fetch_assoc($result))
        {

            // Output the record using if statements and echo
            echo '<hr>';

            echo '<h2>'.$record['name'].'</h2>';

            echo '<img src="'.$record['filename'].'" width="300">';

        }

        ?>        

    </body>
</html>
