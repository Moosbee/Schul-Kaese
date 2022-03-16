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
    <script src="./js/index.js"></script>
    <script src="./js/slider.js"></script>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/menuestyle.css">
    <link rel="stylesheet" href="./css/sliderstyle.css">
    <link rel="stylesheet" href="./css/cardstyle.css">

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
    <header>
        <div class="slider">
            <div id="slideimg">

                <?php





                ?>
                <img width="600" height="300" src="./img/sliderchees1.jpg" alt="Chees" class="SliderItems">
                <img width="600" height="300" src="./img/sliderchees2.jpg" alt="Chees" class="SliderItems">
                <img width="600" height="300" src="./img/sliderchees3.jpg" alt="Chees" class="SliderItems">
                <img width="600" height="300" src="./img/sliderchees4.jpg" alt="Chees" class="SliderItems">
                <img width="600" height="300" src="./img/sliderchees5.jpg" alt="Chees" class="SliderItems">
                <img width="600" height="300" src="./img/sliderchees6.jpg" alt="Chees" class="SliderItems">
                <img width="600" height="300" src="./img/sliderchees7.jpg" alt="Chees" class="SliderItems">
                <img width="600" height="300" src="./img/sliderchees8.jpg" alt="Chees" class="SliderItems">
                <img width="600" height="300" src="./img/sliderchees9.jpg" alt="Chees" class="SliderItems">
                <img width="600" height="300" src="./img/sliderchees10.jpg" alt="Chees" class="SliderItems">
            </div>
            <div class="Sliderbuttons">
                <button id="Sliderprev" class="Sliderbutton"><i class="fas fa-chevron-left"></i></button>
                <button id="Slidernext" class="Sliderbutton"><i class="fas fa-chevron-right"></i></button>
            </div>
        </div>
    </header>
    <section>
        <?php

        include "./controler.php";

        $snipets=new snipets();

        $Database = new DataCtrl();

        $kaese = $Database->GetAllKas();

        if (is_null($kaese)) {
            echo "Wie es scheint sind keine Einträge vorhanden";
        }

        foreach ($kaese as $kas) {
            $tmpor = $snipets->getCardView($kas->Titel, $kas->imageLink, $kas->Text, $kas->CardID);
            echo $tmpor;
        }


        ?>
    </section>
    <footer>
        <h6>© Bernhard Rieder</h6>
        <h6>Fuck You</h6>
    </footer>

</body>

</html>