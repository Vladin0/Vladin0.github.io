<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Document</title>
</head>
<?php 
require_once("kod.php");
?>
<style>
    *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        position: relative;
    }
    .flex{
        display: flex;
        align-items: center;
        justify-content: center;
    }
    body{
        width: 100vw;
        height: 100vh;
        background: #222;
        color: #00a8ff;
        font-family: sans-serif;
    }
    .numPan{
        border-radius: 10px;
        background: #111;
        border: 2px solid #00a8ff;
    }
    .numPan .disp{
        border-bottom: 2px solid #00a8ff;
    }
    .numPan .disp input{
        padding: 20px;
        outline: none;
        border-radius: none;
        background: none;
        text-align: center;
        color: #00a8ff;
        font-size: 3em;
    }
    .numPan .nums > .r div{
        width: 100px;
        height: 100px;
        margin: 20px;
        border: 2px solid #666;
        display: flex;
        justify-content: center;
        align-items: center;
        border-radius: 50%;
        cursor: pointer;
        font-size: 2em;
    }     
    .icon {
            padding: 5px; 
            color: #00a8ff; 
            background-color: #111;
            border-radius: 100%;
            transition-duration: 0.4s;
    }
    .btn{
        border: none;
        background-color: #111;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        
    }
    .icon:hover {
        background-color: #00a8ff; /* Green */
    }

    .vypis{
        padding: 15px;
        border-top: 2px solid #00a8ff; 
        text-align: center;
        font-size: 24px;
    }
</style>
<?php
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
?>
<body class="flex">
<form method="get" action="numpad.php">
    <div class="numPan">
        <div class="disp">
            <input type="text" name="text">
        </div>
        <div class="nums">
            <div class="flex r r1">
                <div><span>1</span></div>
                <div><span>2</span></div>
                <div><span>3</span></div>
            </div>
            <div class="flex r r2">
                <div><span>4</span></div>
                <div><span>5</span></div>
                <div><span>6</span></div>
            </div>
            <div class="flex r r3">
                <div><span>7</span></div>
                <div><span>8</span></div>
                <div><span>9</span></div>
            </div>
            <div class="flex r r4">
                <div><span>0</span></div>
                <div>
                <button class="btn" type="submit" name="submit"><i class="fa fa-envelope icon"></i></button>
                </div>
            </div>
        </div>
        
        <div class="vypis">
            <?php
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
        </div>
    </div>
</form>
</body>
</html>
<script>
    var btn=document.querySelectorAll(".r > div");
    var inp=document.querySelector("input");
    btn.forEach(val=>{
        val.addEventListener("click",()=>{
            inp.value+=val.innerText;
        })
    })
</script>