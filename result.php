<!doctype html>
<html lang="en">

<head>
  <title>Title</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

<!-- HEADER -->
<?php 
    include "./includes/tools.php";
    include "./includes/header.php"; 
?>
<!-- END:HEADER -->

<div class="container my-4 text-start">
  <p class="mt-5">

      <?php 
        /*
          P03: Gib die ge-posteten Key-Value-Paare als Liste aus.
        */
 prettyPrint($_POST);
      ?>

      Willkommen <?php echo $_POST["name"]; ?>!<br>
      Deine Email-Adresse lautet <?php echo $_POST["email"]; ?>.<br>
      Geht es dir heute gut: <?php echo $_POST["radio-mood"]; ?>.<br>

      Du hast folgende Farben gewählt: 
      <?php 
      /*
        P04: Die ausgewählten Farbwerte herausfiltern und als einfache Liste 
        ausgeben. Es werden nur die Werte mit 'color-' im Schlüssel (Key) 
        erkannt. Die Liste wird durch Kommas getrennt.

        In der foreach-Schleife werden jeweils auch Farbwerte geprüft und
        die Variablen 'redSelected', 'whiteSelected', 'otherSelected' und
        'hasSelection' entsprechend auf true gesetzt. Ist die Auswahl falsch,
        dann wird ein kurzes Feedback ausgegeben.

        Für foreach siehe auch https://www.w3schools.com/php/php_looping_foreach.asp
        Wir verwenden die erweiterte Form von foreach ($_POST as $value) {},
        nämlich foreach ($_POST as $key => $value) {}.

        Für str_contains() siehe auch https://www.php.net/manual/en/function.str-contains.php
      */
      $colorCount = 0;
            $redSelected = false;
            $whiteSelected = false;
            $otherSelected = false;

      foreach ($_POST as $key => $value){
        //Liste der gewählten Farben
        if (str_contains($key, 'color-')) {
            if ($colorCount > 0) echo ", ";
            echo "$value ";
            $colorCount++;
        }
        //Die gewählten Farben erkennen(Validierung)
        if ($value == "rot") $redSelected = true;
        elseif ($value == "weiss") $whiteSelected = true;
        else $otherSelected = true;
      }
      
        echo "<br>";

      //Ist die Aussage falsch, dann wird ein kurzes Feedback ausgegeben.
      if ($redSelected == false || $whiteSelected == false || $otherSelected == true) {
        echo "Wo bist denn du in die Schule gegangen?";
      }

     //correct: if ($redSelected == true && $whiteSelected == true && $otherSelected == false)

    //incorrect: if (!($redSelected == true && $whiteSelected == true && $otherSelected == false))

    //incorrect nach De Morgan: if ($redSelected == false || $whiteSelected == false || $otherSelected == true) 





      echo "<br><br>";

      /*
        P05: Zum gewählten Tier 'mammal' wird ein Feedback ausgegeben. Dazu verwenden wir
        switch() Verzweigungen.
      */
      $mammal = $_POST["mammal"];


      switch($mammal) {
        case "Rind":
            echo "<span style='color':green'>Jawohl, du Rindfieh!</span>";
            break;
        case "Pferd":
            echo "<span style='color':red'>hoidu Pferdemeitli</span>";
            break;  
        case "Ziege":
            echo "<span style='color':blue'>Hallo du Ziegen%&/# </span>";
            break;
        case "Kater Munz":
            echo "<span style='color':yellow'>Munzli munz munz munz</span>";
            break;

            default;
      }



      echo "<br><br>";

      /*
        P06: Im "comment"-Feld prüfen wir, ob gewisse Schimpfwörter wie
        "fuck" oder "arschloch" verwendet wurden und überschreiben
        jedes dieser Schimpfwörter mit "#%$@".

        Verwendete PHP Hilfsfunktionen: strlen(), strtolower(), str_replace()
      */
      $comment = $_POST["comment"];
      $blacklist =array("Fuck", "Arschloch","HS");

      foreach ($blacklist as $swearWord ){
       $comment = str_ireplace($swearWord, "@#&%%&",$comment);
        //replace $swearword
      }

      echo "<br><br>$comment";

      // array, foreach, case- insensitive

      ?><br>
      

  </p>
</div>

<!-- FOOTER -->
<?php include "./includes/footer.php"; ?>
<!-- END:FOOTER -->

</body>

</html>