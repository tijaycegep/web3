<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link href="./css/main.css" rel="stylesheet">
</head>
<body>
    <h1>porjet 2</h1>
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
                ?>
                <div class="container mt-4 mb-4 p-3 d-flex justify-content-center">
                     <div class="card p-4"> 
                        <div class=" image d-flex flex-column justify-content-center align-items-center"> 
                            <button class="btn btn2 btn-secondary"> 
                                <img src="<?php echo $image?>" height="100" width="100" />
                            </button> <span class="name mt-3">
                                <blockquote class="blockquote mb-0">
                                    <p>@<?php echo $name?></p>
                                    <footer class="blockquote-footer"><?php echo $sex?></footer>
                                </blockquote></span> 
                            <span class="idd"><?php echo $email?></span> 
                            <div class="d-flex flex-row justify-content-center align-items-center gap-2"> 
                                <span class="idd1">Password : <?php echo $password?></span> 
                                <span><i class="fa fa-copy"></i></span> 
                            </div> 
                            <div class="text mt-3"> 
                                <span><?php echo $name?> utilise le <?php echo $transport?><br>
                                <?php echo $name?> est né le <?php echo $birthday?></span> 
                            </div> 
                            <div class="px-2 rounded mt-4"> 
                                <button class="btn"><a href="index.php">Quitter</a></button>
                            </div>
                        </div> 
                    </div>
                </div>
                <?php
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