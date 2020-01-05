<?php
// fopen Open the file that define which player has the right to play
// fgets get the value of the opened file
// close the file previously opened
$file = fopen( "./text_files/player.txt", "r" );
$fileContent = fgets($file, 4096); 
fclose($file);