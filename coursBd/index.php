<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>mallo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link href="./css/main.css" rel="stylesheet">
</head>
<body>
    <?php
        $servername = "localhost";
        $username = "root";
        $password = "root";
        $db = "identifiant";
        $conn = new mysqli($servername,$username,$password,$db);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }   
        echo "Connected succesfully";

        $conn->query('SET NAMES utf8');
        $sql = "SELECT * FROM wanted";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo '<div class="container mt-4 mb-4"><div class="row">';
            while($row = $result->fetch_assoc()) {
                ?>
                     <div class="card col-md-3 mb-4 p-4"> 
                        <div class=" image d-flex flex-column justify-content-center align-items-center"> 
                            <button class="btn btn2 btn-secondary"> 
                                <img src="<?php echo $row["image"]?>" height="100" width="100" />
                            </button> <span class="name mt-3">
                                <blockquote class="blockquote mb-0">
                                    <p>@<?php echo $row["name"]?></p>
                                    <footer class="blockquote-footer"><?php echo $row["sex"]?></footer>
                                </blockquote></span> 
                            <span class="idd"><?php echo $row["email"]?></span> 
                            <div class="d-flex flex-row justify-content-center align-items-center gap-2"> 
                            </div> 
                            <div class="text mt-3"> 
                                <span><?php echo $row["name"]?> utilise le <?php echo $row["transport"]?><br>
                                <?php echo $row["name"]?> est né le <?php echo $row["birthday"]?></span> 
                            </div>
                            <button class="btn"><a href="modification.php?id=<?php echo $row["id"] ?>">modificationne</a></button>
                        </div> 
                    </div>
                <?php
            }
            echo '</div>';
            echo '<button class="btn"><a href="ajouter.php">Ajouter type beat</a></button>';
        }
        else {
            echo "non";
        }
        $conn->close();
    ?>
    
</body>
</html>