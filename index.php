<?php
 
require_once("kod.php");

$numpad = array(
   array(),                    // 0
   array(),                    // 1
   array("A","B","C"),         // 2
   array("D","E","F"),         // 3
   array("G","H","I"),         // 4
   array("J","K","L"),         // 5
   array("M","N","O"),         // 6            
   array("P","Q","R","S"),     // 7    
   array("T","U","V"),         // 8
   array("W","X","Y","Z")      // 9    
);
     $cisla = str_split($_GET["text"]); // [2,3]
        if (isset($_GET["submit"])) {
            if (($cisla[0] == 0) || ($cisla[0] == 1 ) || ($cisla[1] == 0) || ($cisla[1] == 1 )) {
            
            }
            else {
                for ($i=0; $i < 2; $i++) { 
                    if ($cisla[$i] != 7 && $cisla[$i] != 9) {
                        $maxPocetFirst = 3;
                    }
                    else {
                        $maxPocetFirst = 4;
                    }
                    for ($prvePismeno=0; $prvePismeno < $maxPocetFirst; $prvePismeno++) 
                    { 
                        if ($cisla[0] == $cisla[1]) {
                            $rovnakaHodnota = $cisla[0];
                            $randomOpakovanie = 1;
                            if ($rovnakaHodnota != 7 && $rovnakaHodnota != 9) {
                                $maxPocetSecond = 3;
                            }
                            else {
                                $maxPocetSecond = 4;
                            }
                            $one = $numpad[$rovnakaHodnota][$prvePismeno];
                            for ($druhePismeno=0; $druhePismeno < $maxPocetSecond; $druhePismeno++) 
                            { 
                                echo $one . $numpad[$rovnakaHodnota][$druhePismeno]." ";
                            } 
                        }
                        elseif ($cisla[$i] != $cisla[1])
                        {
                            $randomOpakovanie = 0;
                            if ($cisla[$i+1] != 7 && $cisla[$i+1] != 9) {
                                $maxPocetSecond = 3;
                            }
                            else {
                                $maxPocetSecond = 4;
                            }
                            $one = $numpad[$cisla[$i]][$prvePismeno];
                            for ($druhePismeno=0; $druhePismeno < $maxPocetSecond; $druhePismeno++) 
                            { 
                                echo $one . $numpad[$cisla[$i+1]][$druhePismeno]." ";
                            };       
                        }
                    }
                    if ($randomOpakovanie == 1) {
                        break;
                    }
                }    
            }
        }
        ?>