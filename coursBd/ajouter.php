<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>mallo type beat part 2</title>
</head>
<body>
<h1>ajoutage type beat</h1>
    <?php
        $name = $password = $passwordconf = $email = $image = $birthday = $sex = $transport = "";
        $nomErreur = $passwordErreur = $emailErreur = $imageErreur = $sexError = $birthError = $transportError = "";
        $erreur = false;

        if ($_SERVER['REQUEST_METHOD'] == "POST"){
            //CAS #2
            //On vient de recevoir le formulaire
            
            if(empty($_POST['name'])){
                $nomErreur = "Le nom ne peut pas être vide";
                $erreur  = true;
            }
            else{
                if ($_POST['name'] == "SlAY") {
                    $nomErreur = "Le nom est déjà utilisé";
                    $erreur  = true;
                }
                else {
                    $name = trojan($_POST['name']);
                }
            }

            if(empty($_POST['password']) ||empty($_POST['passwordconf']) ){
                $passwordErreur = "Le mot de passe ne peut pas être vide";
                $erreur  = true;
            }
            else{
                if ($_POST['password'] != $_POST['passwordconf']) {
                    $erreur  = true;
                    $passwordErreur = "Les mot de passe doivent être identique";
                }
                else {
                    $password = trojan($_POST['password']);
                    $passwordconf = trojan($_POST['passwordconf']); 
                }
            }

            if(empty($_POST['email'])){
                $emailErreur = "L'email ne peut pas être vide";
                $erreur  = true;
            }
            else{
                $email = trojan($_POST['email']);
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $emailErreur = "Format invalide";
                $erreur  = true;
                }
                else {
                    $email = trojan($_POST['email']);
                }
            }

            if(!isset($_POST['sex'])){
                $sexError = "Selectionnez un genre";
                $erreur  = true;   
            }
            else {
                $sex = trojan($_POST['sex']);
            }

            if(empty($_POST['image'])){
                $imageErreur = "L'image ne peut pas être vide";
                $erreur  = true;
            }
            else {
                $image = trojan($_POST['image']);
            }

            if(empty($_POST['birthday'])){
                $birthError = "Selectionnez une date de naissance";
                $erreur  = true;
            }
            else {
                $birthday = trojan($_POST['birthday']);
            }

            if(!isset($_POST['transport'])){
                $transportError = "Selectionnez un moyen de transport";
                $erreur  = true;
            }
            else {
                $transport = trojan($_POST['transport']);
            }

            if (!$erreur) {
                $servername = "localhost";
                $username = "root";
                $passwordSQL = "root";
                $db = "identifiant";
                $conn = new mysqli($servername,$username,$passwordSQL,$db);
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }   
                echo "Connected succesfully";

                $sql = "INSERT INTO wanted (name,password,email,image,birthday,sex,transport)
                VALUES ('$name','$password','$email','$image','$birthday','$sex','$transport')";

                if (mysqli_query($conn, $sql)) {
                    echo "<br>Enregistrement réussi";
                    header("Location: index.php");
                } else {
                    echo "Error: " . $sql . "<br>" , mysqli_error($conn);
                }

                mysqli_close($conn);
            }
        }
        if ($_SERVER['REQUEST_METHOD'] != "POST" || $erreur == true){
            // Cas #1 On veut afficher le formulaire
            echo "<h1>On affiche le formulaire </h1>";
        ?>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                Nom : <input type="text" name="name" maxLength="15" value="<?php echo $name;?>"><br>
                <p style="color:red;"><?php echo $nomErreur; ?></p>
                Mot de passe : <input type="password" name="password" value="<?php echo $password;?>"> <br>
                <p style="color:red;"><?php echo $passwordErreur; ?></p>
                Confirmation mot de passe : <input type="password" name="passwordconf" value="<?php echo $passwordconf;?>"><br>
                Adresse couriel : <input type="email" name="email" value="<?php echo $email;?>"><br>
                <p style="color:red;"><?php echo $emailErreur; ?></p>
                Image : <input type="text" name="image" value="<?php echo $image;?>"><br>
                <p style="color:red;"><?php echo $imageErreur; ?></p>
                <input type="radio" id="man" name="sex" value="Man">
                <label for="Homme">Masculin</label><br>
                <input type="radio" id="woman" name="sex" value="Woman">
                <label for="Femme">Féminin</label><br>
                <input type="radio" id="other" name="sex" value="Other">
                <label for="Autre">Non genré</label>
                <p style="color:red;"><?php echo $sexError; ?></p>
                <label for="birthday">Date de naissance :</label>
                <input type="date" id="birthday" name="birthday" value="<?php echo $birthday;?>"><br>
                <p style="color:red;"><?php echo $birthError; ?></p>
                <label for="transport">Choisir un mode de transport :</label>
                <select id="transport" name="transport" required>
                    <option value="Auto">Auto</option>
                    <option value="Autobus">Autobus</option>
                    <option value="Marche">Marche</option>
                    <option value="Velo">Velo</option>
                </select><br>
                <input type="submit">
            </form>
            <button class="btn"><a href="index.php">j'veux partir papa</a></button>
        <?php
        }

        function trojan($data){
            $data = trim($data); //Enleve les caractères invisibles
            $data = addslashes($data); //Mets des backslashs devant les ' et les  "
            $data = htmlspecialchars($data); // Remplace les caractères spéciaux par leurs symboles comme ­< devient &lt;
            
            return $data;
        }

    ?>
</body>
</html>