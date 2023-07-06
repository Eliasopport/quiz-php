<?php
function yesNoQuestion(){
    echo "<p>&nbsp;</p>
    <p>$questionText</p>
    <input type='radio' id='r-$qid-0' name='radio-$qid'value='$answers[0]'>
    label for='r-$qid-0'>$answers[0]</label><br>
    <input type='radio' id='r-$qid-1' name='radio-$qid' value='$answers[1]'>
    label for='r-$qid-1'>$answers[1]</label><br>";

}
$qid ="01";
$questionText = "Ist die Schweiz in der EU?";
$answers = array ("ja","nein");
$correctAnswerIndex = 1;
//$points = 1;

//id aus 'r' für radio


?>