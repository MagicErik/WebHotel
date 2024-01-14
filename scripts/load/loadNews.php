

<?php

function loadNews(){
    require("../scripts/data/db_connection.php");

    $sql = 'SELECT * FROM news';
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();

    //erstellung eines arrays $row mit den datenbank einträgen von News beiträgen.
    $row = mysqli_fetch_array($result);

    $return ="";

    $style = '<style>
    body {
        font-family: Arial, sans-serif;
        margin: 20px;
    }
    .news-container {
        max-width: 800px;
        margin: auto;
    }
    .news-post {
        border: 1px solid #ddd;
        margin-bottom: 20px;
        padding: 15px;
        border-radius: 8px;
    }
    .post-title {
        font-size: 24px;
        font-weight: bold;
        margin-bottom: 10px;
    }
    .post-date {
        color: #666;
        margin-bottom: 10px;
    }
    .post-image {
        max-width: 100%;
        height: auto;
        margin-bottom: 10px;
        border-radius: 8px;
    }
    .post-text {
        line-height: 1.6;
    }
    </style>';

    if ($result->num_rows >= 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            //Schleife nimmt daten aus $row und füngt sie in den HTML text hinein.
            $return .= '<div class="news-container">
            <div class="news-post">
                <div class="post-title">'. $row["titel"].'</div>
                <div class="post-date">'.$row["datum"].'</div>
                <img class="post-image" src="../res/pictures/'. $row["image"].' alt="Bildbeschreibung">
                <div class="post-text">
                    <p>'. $row["content"].'</p>
                </div>
            </div>
            
        </div>';
        
        }
    } 
    else {
        
        echo "0 results";
    }
    return '<div class="row">' . $style . $return . '</div>';

   }
?>   