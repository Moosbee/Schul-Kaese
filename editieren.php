<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/18e03e461d.js" crossorigin="anonymous"></script>

    <script src="./js/jquery-3.6.0.min.js"></script>
    <!--     
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
     -->

    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">

    <script>
        <?php
        if ((isset($_POST['Titel']) && isset($_POST['Text'])) || isset($_GET['delete'])) {
            echo '
                $(document).ready(function () {
                $(".formular").hide();
                });';
        }
        ?>
    </script>
    <script src="./js/index.js"></script>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/menuestyle.css">
    <link rel="stylesheet" href="./css/editierenstyle.css">
    <link rel="stylesheet" href="./css/cardstyle.css">
    <script src="./js/editieren.js"></script>
    <?php


    ?>
    <title>Käse Projektarbeit Medientechnik</title>

</head>

<body>
    <nav id="nav">
        <div class="menu">
            <h1><a href="index.php"><i class="fas fa-cheese"></i>Käse</a></h1>
            <button id="openClose">
                <div class="fas fa-align-justify small switchIcon"></div>
                <div class="fas fa-times small switchIcon start"></div>
            </button>
            <div class="menuitemsdesktop">
                <a class="menuboxdesktop" href="./index.php"><i class="fas fa-landmark"></i> Haupseite</a>
                <a class="menuboxdesktop" href="./funktion.php"><i class="fas fa-cogs"></i> Funktion</a>
                <a class="menuboxdesktop" href="./quellen.php"><i class="fas fa-book"></i> Quelle</a>
                <a class="menuboxdesktop" href="./editieren.php"><i class="fas fa-cheese"></i><sup><i class="fas fa-plus"></i></sup> Neuen Eintrag erstellen</a>

            </div>
        </div>
        <div class="menuitemspocket start">
            <a class="menubox" href="./index.php"><i class="fas fa-landmark"></i> Haupseite</a>
            <a class="menubox" href="./funktion.php"><i class="fas fa-cogs"></i> Funktion</a>
            <a class="menubox" href="./quellen.php"><i class="fas fa-book"></i> Quelle</a>
            <a class="menubox" href="./editieren.php"><i class="fas fa-cheese"></i><sup><i class="fas fa-plus"></i></sup> Neuen Eintrag erstellen</a>

        </div>
    </nav>

    <section>
        <?php

        include "./controler.php";

        $snipets=new snipets();

        $Database = new DataCtrl();



        if (isset($_GET['delete'])) {

            //sql to delete a record
            if ($Database->deleteKas($_GET['delete'])) {
                echo '<h1>Käse erfolgreich entfernt</h1><h1 style="font-size: xx-large;"><i class="fas fa-trash-alt"></i></h1>';
            } else {
                echo 'Nothing happend';
            }
        }






        if (!empty($_FILES) && isset($_FILES["imageLink"]) && isset($_POST['Titel']) && isset($_POST['Text'])) {

            $Titel = $_POST['Titel'];
            $Text = $_POST['Text'];

            $target_dir = "./img/eintraege/";
            $uploadOk = 0;
            $image = $_FILES["imageLink"];

            if ($image["error"] == UPLOAD_ERR_OK) {


                $imageFileType = strtolower(pathinfo(basename($image["name"]), PATHINFO_EXTENSION));
                $target_filename = $snipets->normalize($Titel, "_") . "." . $imageFileType;
                $target_file = $target_dir . $target_filename;



                // Check if image file is a actual image or fake image
                $check = getimagesize($image["tmp_name"]);
                if ($check !== false) {
                } else {
                    echo "File is not an image.";
                    $uploadOk = 1;
                }
                // Check if file already exists
                if (file_exists($target_file)) {
                    echo "Sorry, file already exists.";
                    $uploadOk = 2;
                }
                // Check file size
                if ($image["size"] > 500000) {
                    echo "Sorry, your file is too large.";
                    $uploadOk = 3;
                }
                // Check if $uploadOk is set to 0 by an error
                if ($uploadOk == 0) {
                    // if everything is ok, try to upload file
                    if (move_uploaded_file($image["tmp_name"], $target_file)) {

                        $kas = $Database->insertKas($Titel, $target_filename, $Text);



                        if ($kas >= 1) {

                            echo '<h1>Ein neuer Käse erblickt das Licht der Welt <br><i class="fas fa-birthday-cake"></i></h1>';

                            $kaese = $Database->GetKas($kas);


                            if (!is_null($kaese)) {



                                $tmpor = $snipets->getCardView($kaese->Titel, $kaese->imageLink, $kaese->Text, $kaese->CardID);
                                echo $tmpor;
                            } else {
                                echo '<h1 style="font-size: xx-large;">WTF</h1>';
                            }
                        } else {
                            echo "Error";
                        }
                    } else {
                        die("Sorry, there was an error uploading your file.");
                    }
                } else {
                    echo "Sorry, your file was not uploaded.";
                }
            }
        }

        ?>

        <h1 class="formular">Weiten Käse hinzufügen</h1>

        <form action="./editieren.php" method="POST" autocomplete="off" class="forum formular" enctype="multipart/form-data">
            <div class="cardprev">
                <input id="Titel" name="Titel" maxlength="100" placeholder="Name des Käses">
                <div class="image">
                    <!-- Angabe einer maximalen Dateigröße in Bytes (hier: 2 MB). -->
                    <input type="hidden" name="MAX_FILE_SIZE" value="20000000">
                    <label for="imageLink" id="imageClick">Bild hochladen</label>
                    <br>
                    <input id="imageLink" name="imageLink" type="file" accept="image/*">
                    <div class="preview">


                    </div>
                </div>
                <img width="200" height="200" src="" alt="Ausgewähltes Bild" class="cardimage start">
                <textarea name="Text" id="Text" cols="30" rows="10" placeholder="Käsebeschreibung"></textarea>
            </div>

            <button type="submit" name="action" id="Sendebutton"><i class="fas fa-plus"></i>Hinzufügen</button>
        </form>



    </section>
    <footer>
        <h6>© Bernhard Rieder</h6>
        <h6>Fuck You</h6>
    </footer>
</body>

</html>