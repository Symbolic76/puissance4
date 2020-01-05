<?php 
function playerTurnCounter(){

    require 'turnCount.php';
    
    if($fileContent%2==0){
        // Display which player has to play this turn
        echo "<p id=player1>","Joueur 1","</p>";     
    }
    else if($fileContent%2==1){
        // Display which player has to play this turn
        echo "<p id=player2>","Joueur 2","</p>";    
    }
    
    // Display actual turn
    echo "<p id=turn>","Tour ".$fileContent."</p>"; 

    echo "<p>Les colonnes vont de 0 à 6</p>";
}

//--------------------------------------------------------\\

function playerInc(){
    // Increment player turn counter each turn
    if(isset($_POST['submit'])){
    
     require 'turnCount.php';

        if ($file==NULL) {
            $file    = fopen( "./text_files/player.txt", "w" );
     
            file_put_contents($file, $fileContent);
            fclose($file);
        }
      
        $fillContent    = fopen( "./text_files/player.txt", "w" );
    
        fwrite($fillContent,$fileContent+1);
    }  
}

//--------------------------------------------------------\\

// get the value of the col from the form named colNum
function inputCol($col = NULL ){ 
    if (isset($_POST['colNum']))  {
        $col=$_POST['colNum'];
    }

    return $col;
}


//--------------------------------------------------------\\

$row=6;

require 'turnCount.php';

if($fileContent%2==0){
    $pion='A';
}

else if($fileContent%2==1){
    $pion='B';
}

$lines = file('./text_files/matrix.txt');

foreach ($lines as $lineNumber => $lineContent)
{
   for ($i=0; $i < 6; $i++) { 
     if($i==$lineNumber){
      $matrix[$i]=$lineContent;
     }
   }
}

if(isset($_POST['submit'])){
    //calcul la ligne à laquel le pion doit atterrir;
    for ($i=0; $i < 6; $i++) { 
        if ($matrix[$i][inputCol()]=="O") {
            $row=$i;
            if($matrix[$i][inputCol()]=="A" || $matrix[$i][inputCol()]=="B"){
                $row=$row-2;
                $i=100;
            }
        }
    }
}


if(inputCol()!=NULL){
    if ($matrix[0][inputCol()]=="A" || $matrix[0][inputCol()]=="B") {
        echo '<p class="errormsg">Erreur colonne pleine rejouez</p>';

        require 'turnCount.php';
        $fillContent    = fopen( "./text_files/player.txt", "w" );

        fwrite($fillContent,$fileContent-1);

      $row=6;   
    }
    $matrix[$row][inputCol()]=$pion;//met la valeur du pion aux coordonnée de la matrice ;
}


$fop = fopen ("./text_files/matrix.txt", "w");// écrit le resultat dans le fichier pour le garder en memoire ;

fwrite($fop,"$matrix[0]");
fwrite($fop,"$matrix[1]");
fwrite($fop,"$matrix[2]");
fwrite($fop,"$matrix[3]");
fwrite($fop,"$matrix[4]");
fwrite($fop,"$matrix[5]");

//--------------------------------------------------------\\

function resetgame(){
    // Copy the content of reset.txt to the base grid file
    if (isset($_POST['reset'])) {

    $rfile="./text_files/reset.txt";
    $newFile="./text_files/matrix.txt";

    $playerFile="./text_files/reset_game.txt";
    $newPlayerFile="./text_files/player.txt";

    copy($playerFile,$newPlayerFile);
    copy($rfile,$newFile);
    }
}

//--------------------------------------------------------\\

function board(){
    $play = @fopen("./text_files/matrix.txt", "r");

    if ($play) {
        echo "<section id=plateau>";
        while (($readFile = fgetc($play)) !== false) {
            if ($readFile=="A") {
                echo "<span class=bluemark>".$readFile."</span>";    
            }
            if ($readFile=="B") {
                echo "<span class=redmark>".$readFile."</span>";

            }
            if ($readFile=="A") {
            $readFile="";
            }
            if ($readFile=="B") {
                $readFile="";
            }
            echo "<span class=vide>".$readFile."</span>";
            if ($readFile==';') {
                echo "<br/>";
            }
        }

        fclose($play);
    }
}

//--------------------------------------------------------\\
