<?php

const player1 = 1;
const player2 = 2;

class Prepare
{
    function Prepare()
    {
        try{
	        global $ban, $ban_ura, $ban_narikin;
    	    $ban = array(
    	        0 => array(0,0,0,0,0,0,0,0,0,0,0)
	            ,1 => array(0,10,11,12,13,14,13,12,11,10,0)
	            ,9 => array(0,2,3,4,5,6,5,4,3,2,0)
	            ,10=> array(0,0,0,0,0,0,0,0,0,0,0)
	        );
    	    $ban_ura = array(
	            1 => array(0,2,2,2,2,2,2,2,2,2)
	            ,9 => array(0,1,1,1,1,1,1,1,1,1)
	        );
    	    $ban_narikin = array(
	            1 => array(0,10,11,12,13,14,13,12,11,10)
	            ,9 =>array(0,2,3,4,5,6,5,4,3,2)
	        );

            for($x = 2;$x < 9;$x++){
                for($y = 0;$y < 11;$y++){
                    if($x == 7){
                        $ban[$x][$y] = 1;
                        $ban_ura[$x][$y] = 1;
                        $ban_narikin[$x][$y] = 1;
                    }elseif($x == 8 && $y == 2){
                        $ban[$x][$y] = 7;
                        $ban_ura[$x][$y] = 1;
                        $ban_narikin[$x][$y] = 7;
                    }elseif($x == 8 && $y == 8){
                        $ban[$x][$y] = 8;
                        $ban_ura[$x][$y] = 1;
                        $ban_narikin[$x][$y] = 8;
                    }elseif($x == 3)	   {
                        $ban[$x][$y] = 9;
                        $ban_ura[$x][$y] = 2;
                        $ban_narikin[$x][$y] = 9;
                    }elseif($x == 2 && $y == 8){
                        $ban[$x][$y] = 15;
                        $ban_ura[$x][$y] = 2;
                        $ban_narikin[$x][$y] = 15;
                    }elseif($x == 2 && $y == 2){
                        $ban[$x][$y] = 16;
                        $ban_ura[$x][$y] = 2;
                        $ban_narikin[$x][$y] = 16;
                    }else{
	    	            $ban[$x][$y] = 0;
		                $ban_ura[$x][$y] = 0;
		                $ban_narikin[$x][$y] = 0;
                    }
                }
            }
        }catch(Exception $e){
            echo 'ใจใฉใผ';
        }
    }
    
	function Show($ban)
    {
        try{
            global $okiba1, $okiba2;
            $k = new Koma();
            echo 'player2ใ';
            for($i = 1; $i < count($okiba2); $i++)
                echo $k -> show_koma($okiba2[$i]);
            echo "\n";
            echo '๏ผๆ๏ฝผๆต๏ฝผ้ฃ๏ฝผ่ฒป๏ฝผๅ๏ฝผๅ๏ฝผๆฆ๏ฝผๅ๏ฝผ'."\n";
            echo '__________________'. "\n";
            for($x = 1;$x < 10;$x++){
                for($y = 1;$y < 10;$y++){
                    $k -> show_koma($ban[$x][$y]);
                }
                echo ('|');
                echo ($x + 0);
                echo ("\n");
            }
            echo ('๏ฟ๏ฝฃ๏ฟ๏ฝฃ๏ฟ๏ฝฃ๏ฟ๏ฝฃ๏ฟ๏ฝฃ๏ฟ๏ฝฃ๏ฟ๏ฝฃ๏ฟ๏ฝฃ๏ฟ๏ฝฃ' . "\n");
            echo 'player1ใ';
            for($j = 1; $j < count($okiba1); $j++)
                echo $k -> show_koma($okiba1[$j]);
            echo "\n";
        }catch(Exception $e){
            echo 'ใจใฉใผ';
        }
    }
}
class Koma
{
    function show_koma($koma)
    {
        try{
            switch($koma){
                case 0:
                    echo ('็น๏ฝป');
                    break;
                case 1:
                    echo ("่ฑ๏ฝฉ");
                    break;
    		    case 2:
                    echo ("้ฌฅ");
                    break;
		        case 3:
                    echo ("ๆก");
                    break;
	    	    case 4:
                    echo ("้");
                    break;
    		    case 5:
                    echo ("้");
                    break;
		        case 6:
                    echo ("็");
                    break;
    		    case 7:
                    echo ("้ฃ");
                    break;
		        case 8:
                    echo ("่ง");
                    break;
    		    case 9:
                    echo ("ใ");
                    break;
		        case 10:
                    echo ("๏ฝท๏ฝฎ");
                    break;
    		    case 11:
                    echo ("๏ฝน๏ฝฒ");
                    break;
		        case 12:
                    echo ("๏ฝท๏พ");
                    break;
    		    case 13:
                    echo ("๏ฝท๏พ");
                    break;
    		    case 14:
                    echo ("๏ฝต๏ฝณ");
                    break;
	    	    case 15:
                    echo ("๏พ๏ฝผ");
                    break;
    		    case 16:
                    echo ("๏ฝถ๏ฝธ");
                    break;
            }
        }catch(Exception $e){
            echo 'ใจใฉใผ';
        }
    }
}
	
class Move
{
    function move_koma()
    {
        global $ban, $l, $teban, $check;
    
        try{
            $a = 0;
            $b = 0;
            $c = 0;
            $d = 0;
            $check = true;
        
            echo '่กใจๅใๅฅๅใใฆใใ ใใใ' ."\n";
            fscanf(STDIN, '%d %d', $a, $b);
            echo '่กใจๅใๅฅๅใใฆใใ ใใใ' ."\n";
            fscanf(STDIN, '%d %d', $c, $d);
            
            if($a > 0 && $b > 0 && $c > 0 && $d > 0){
                $koma = $ban[$a][$b];
      
                if($teban){
                    if($koma > 8 || $koma == 0){
                        echo 'ใใใฏ็งปๅใงใใพใใใ' ."\n";
                        $check = false;
                    }
                }else{
                    if($koma < 9 || $koma == 0){
                        echo 'ใใใฏ็งปๅใงใใพใใใ' ."\n";
                        $check = false;
                    }
                }
        
                if($check == true){
                    if($koma != 2 && $koma != 7 && $koma != 8 && $koma != 10 && $koma != 15 && $koma != 16){
                        $l -> limit1($koma, $a, $b, $c, $d);
                    }else{
                        $l -> limit2($koma, $a, $b, $c, $d);
                    }
                }
            }else{
                echo 'ๅฅๅใใใใพใใใ' ."\n";
                $check = false;
            }
        }catch(Exception $e){
            echo 'ใจใฉใผ๏ผ';
        }
    }
}

class Put
{
    function put_koma()
    {
        try{
            global $okiba1, $okiba2, $ban, $ban_ura, $ban_narikin, $teban, $check;

            $a = 0;
            $c = 0;
            $d = 0;
        
            echo '่กใจๅใๅฅๅใใฆใใ ใใใ' ."\n";
            fscanf(STDIN, '%d %d', $c, $d);
            echo 'ๅใๅฅๅใใฆใใ ใใใ' ."\n";
            fscanf(STDIN, '%d', $a);
        
            if($c > 0 && $d > 0 && $a > 0){
                if($teban){
                    if($ban[$c][$d] != 0){
                        $check = false;
                        echo '็ฝฎใใพใใ' . "\n";
                    }elseif($okiba1[$a] == 1){
                        for($i = 1; $i < 10; $i++){
                            if($ban[$i][$d] == 1){
                                $check = false;
                                echo 'ไบๆญฉใงใใ' . "\n";
                                continue;
                            }
                        }
                        if($c == 1){
                            $check = false;
                            echo '็งปๅใงใใชใใฎใง็ฝฎใใพใใใ' . "\n";
                        }else{
                            $ban[$c][$d] = $okiba1[$a];
                            $ban_narikin[$c][$d] = $okiba1[$a];
                            $okiba1[$a] = 0;
                            $ban_ura[$c][$d] = player1;
                            $check = true;
                        }
                    }elseif($okiba1[$a] == 0){
                        $check = false;
                        echo '้งใใใใพใใใ' . "\n";
                    }elseif($okiba1[$a] == 3){
                        if($c == 1){
                            $check = false;
                            echo '็งปๅใงใใชใใฎใง็ฝฎใใพใใใ' . "\n";
                        }elseif($c == 2){
                            $check = false;
                            echo '็งปๅใงใใชใใฎใง็ฝฎใใพใใใ' . "\n";
                        }else{
                            $ban[$c][$d] = $okiba1[$a];
                            $ban_narikin[$c][$d] = $okiba1[$a];
                            $okiba1[$a] = 0;
                            $ban_ura[$c][$d] = player1;
                            $check = true;
                        }
                    }else{
                        $ban[$c][$d] = $okiba1[$a];
                        $ban_narikin[$c][$d] = $okiba1[$a];
                        $okiba1[$a] = 0;
                        $ban_ura[$c][$d] = player1;
                        $check = true;
                    }
                }else{
                    if($ban[$c][$d] != 0){
                        $check = false;
                        echo '็ฝฎใใพใใ' . "\n";
                    }elseif($okiba2[$a] == 9){
                        for($i = 1; $i < 10; $i++){
                            if($ban[$i][$d] == 9){
                                $check = false;
                                echo 'ไบๆญฉใงใใ' . "\n";
                                continue;
                            }
                        }
                        if($c == 9){
                            $check = false;
                            echo '็งปๅใงใใชใใฎใง็ฝฎใใพใใใ' . "\n";
                        }else{
                            $ban[$c][$d] = $okiba2[$a];
                            $ban_narikin[$c][$d] = $okiba2[$a];
                            $okiba2[$a] = 0;
                            $ban_ura[$c][$d] = player2;
                            $check = true;
                        }
                    }elseif($okiba2[$a] == 0){
                        $check = false;
                        echo '้งใใใใพใใใ' . "\n";
                    }elseif($okiba2[$a] == 11){
                        if($c == 9){
                            $check = false;
                            echo '็งปๅใงใใชใใฎใง็ฝฎใใพใใใ' . "\n";
                        }elseif($c == 8){
                            $check = false;
                            echo '็งปๅใงใใชใใฎใง็ฝฎใใพใใใ' . "\n";
                        }else{
                            $ban[$c][$d] = $okiba2[$a];
                            $ban_narikin[$c][$d] = $okiba2[$a];
                            $okiba2[$a] = 0;
                            $ban_ura[$c][$d] = player2;
                            $check = true;
                        }
                    }else{
                        $ban[$c][$d] = $okiba2[$a];
                        $ban_narikin[$c][$d] = $okiba2[$a];
                        $okiba2[$a] = 0;
                        $ban_ura[$c][$d] = player2;
                        $check = true;
                    }
                }
            }else{
                echo 'ๅฅๅใ้้ใฃใฆใใพใใ' . "\n";
                $check = false;
            }
        }catch(Exception $e){
            echo 'ใจใฉใผ';
        }
    }
}

class Limit
{
    function limit1($koma, $a, $b, $c, $d)
    {
        try{
            global $ban, $ban_ura, $ban_narikin, $ju, $check, $okiba1, $okiba2;
            for($i = 1; $i < 11; $i++){
                if($okiba1[$i] == 0)
                    break;
            }
            for($j = 1; $j < 11; $j++){
                if($okiba2[$j] == 0)
                    break;
            }
            switch($koma){
                case 1:					//ๆญฉ
                    if($c == $a - 1 && $d == $b){
                        if($ban_ura[$c][$d] != player1){
                            if($ban_ura[$c][$d] == player2)
                                $okiba1[$i] = $ban_narikin[$c][$d] - 8;
                            if($c <= 3){
                                $ju -> naruka($a, $b, $c, $d);
                            }else{
                                $ban[$c][$d] = $ban[$a][$b];
                            }
                            $ban_narikin[$c][$d] = $ban_narikin[$a][$b];
                            $ban[$a][$b] = 0;
                            $ban_narikin[$a][$b] = 0;
                            $ban_ura[$c][$d] = player1;
                            $ban_ura[$a][$b] = 0;
                            $check = true;
                        }else{
                            echo '็งปๅใงใใพใใใ' . "\n";
                            $check = false;
                        }
                    }else{
                        echo '็งปๅใงใใพใใใ' . "\n";
                        $check = false;
                    }
                    break;
	    	    case 3:					//ๆก
                    if($c == $a -2 && $d == $b +1){
                        if($ban_ura[$c][$d] != player1){
                            if($ban_ura[$c][$d] == player2)
                                $okiba1[$i] = $ban_narikin[$c][$d] - 8;
                            if($c <= 3){
                                $ju -> naruka($a, $b, $c, $d);
                            }else{
                                $ban[$c][$d] = $ban[$a][$b];
                            }
                            $ban_narikin[$c][$d] = $ban_narikin[$a][$b];
                            $ban[$a][$b] = 0;
                            $ban_narikin[$a][$b] = 0;
                            $ban_ura[$c][$d] = player1;
                            $ban_ura[$a][$b] = 0;
                            $check = true;
                        }else{
                            echo '็งปๅใงใใพใใใ' . "\n";
                            $check = false;
                        }
                    }elseif($c == $a -2 && $d == $b -1){
                        if($ban_ura[$c][$d] != player1){
                            if($ban_ura[$c][$d] == player2)
                                $okiba1[$i] = $ban_narikin[$c][$d] - 8;
                            if($c <= 3){
                                $ju -> naruka($a, $b, $c, $d);
                            }else{
                                $ban[$c][$d] = $ban[$a][$b];
                            }
                            $ban_narikin[$c][$d] = $ban_narikin[$a][$b];
                            $ban[$a][$b] = 0;
                            $ban_narikin[$a][$b] = 0;
                            $ban_ura[$c][$d] = player1;
                            $ban_ura[$a][$b] = 0;
                            $check = true;
                        }else{
                            echo '็งปๅใงใใพใใใ' . "\n";
                            $check = false;
                        }
                    }else{
                        echo '็งปๅใงใใพใใใ' . "\n";
                        $check = false;
                    }
                    break;
    		    case 4:					//้
                    if($c == $a - 1 && $d == $b){
                        if($ban_ura[$c][$d] != player1){
                            if($ban_ura[$c][$d] == player2)
                                $okiba1[$i] = $ban_narikin[$c][$d] - 8;
                            if($c <= 3){
                                $ju -> naruka($a, $b, $c, $d);
                            }else{
                                $ban[$c][$d] = $ban[$a][$b];
                            }
                            $ban_narikin[$c][$d] = $ban_narikin[$a][$b];
                            $ban[$a][$b] = 0;
                            $ban_narikin[$a][$b] = 0;
                            $ban_ura[$c][$d] = player1;
                            $ban_ura[$a][$b] = 0;
                            $check = true;
                        }else{
                            echo '็งปๅใงใใพใใใ' . "\n";
                            $check = false;
                        }
                    }elseif($c == $a -1 && $d == $b +1){
	    	            if($ban_ura[$c][$d] != player1){
                            if($ban_ura[$c][$d] == player2)
                                $okiba1[$i] = $ban_narikin[$c][$d] - 8;
                            if($c <= 3){
                                $ju -> naruka($a, $b, $c, $d);
                            }else{
                                $ban[$c][$d] = $ban[$a][$b];
                            }
                            $ban_narikin[$c][$d] = $ban_narikin[$a][$b];
                            $ban[$a][$b] = 0;
                            $ban_narikin[$a][$b] = 0;
                            $ban_ura[$c][$d] = player1;
                            $ban_ura[$a][$b] = 0;
                            $check = true;
                        }else{
                            echo '็งปๅใงใใพใใใ' . "\n";
                            $check = false;
                        }
                    }elseif($c == $a -1 && $d == $b -1){
	    	            if($ban_ura[$c][$d] != player1){
                            if($ban_ura[$c][$d] == player2)
                                $okiba1[$i] = $ban_narikin[$c][$d] - 8;
                            if($c <= 3){
                                $ju -> naruka($a, $b, $c, $d);
                            }else{
                                $ban[$c][$d] = $ban[$a][$b];
                            }
                            $ban_narikin[$c][$d] = $ban_narikin[$a][$b];
                            $ban[$a][$b] = 0;
                            $ban_narikin[$a][$b] = 0;
                            $ban_ura[$c][$d] = player1;
                            $ban_ura[$a][$b] = 0;
                            $check = true;
                        }else{
                            echo '็งปๅใงใใพใใใ' . "\n";
                            $check = false;
                        }
                    }elseif($c == $a +1 && $d == $b +1){
	    	            if($ban_ura[$c][$d] != player1){
                            if($ban_ura[$c][$d] == player2)
                                $okiba1[$i] = $ban_narikin[$c][$d] - 8;
                            if($c <= 3){
                                $ju -> naruka($a, $b, $c, $d);
                            }else{
                                $ban[$c][$d] = $ban[$a][$b];
                            }
                            $ban_narikin[$c][$d] = $ban_narikin[$a][$b];
                            $ban[$a][$b] = 0;
                            $ban_narikin[$a][$b] = 0;
                            $ban_ura[$c][$d] = player1;
                            $ban_ura[$a][$b] = 0;
                            $check = true;
                        }else{
                            echo '็งปๅใงใใพใใใ' . "\n";
                            $check = false;
                        }
                    }elseif($c == $a +1 && $d == $b -1){
	    	            if($ban_ura[$c][$d] != player1){
                            if($ban_ura[$c][$d] == player2)
                                $okiba1[$i] = $ban_narikin[$c][$d] - 8;
                            if($c <= 3){
                                $ju -> naruka($a, $b, $c, $d);
                            }else{
                                $ban[$c][$d] = $ban[$a][$b];
                            }
                            $ban_narikin[$c][$d] = $ban_narikin[$a][$b];
                            $ban[$a][$b] = 0;
                            $ban_narikin[$a][$b] = 0;
                            $ban_ura[$c][$d] = player1;
                            $ban_ura[$a][$b] = 0;
                            $check = true;
                        }else{
                            echo '็งปๅใงใใพใใใ' . "\n";
                            $check = false;
                        }
                    }else{
                        echo '็งปๅใงใใพใใใ' . "\n";
                        $check = false;
                    }
                    break;
    		    case 5:					//้
                    if($c == $a - 1 && $d == $b){
                        if($ban_ura[$c][$d] != player1){
                            if($ban_ura[$c][$d] == player2)
                                $okiba1[$i] = $ban_narikin[$c][$d] - 8;
                            $ban[$c][$d] = $ban[$a][$b];
                            $ban_narikin[$c][$d] = $ban_narikin[$a][$b];
                            $ban[$a][$b] = 0;
                            $ban_narikin[$a][$b] = 0;
                            $ban_ura[$c][$d] = player1;
                            $ban_ura[$a][$b] = 0;
                            $check = true;
                        }else{
                            echo '็งปๅใงใใพใใใ' . "\n";
                            $check = false;
                        }
                    }elseif($c == $a  && $d == $b +1){
	    	            if($ban_ura[$c][$d] != player1){
                            if($ban_ura[$c][$d] == player2)
                                $okiba1[$i] = $ban_narikin[$c][$d] - 8;
                            $ban[$c][$d] = $ban[$a][$b];
                            $ban_narikin[$c][$d] = $ban_narikin[$a][$b];
                            $ban[$a][$b] = 0;
                            $ban_narikin[$a][$b] = 0;
                            $ban_ura[$c][$d] = player1;
                            $ban_ura[$a][$b] = 0;
                            $check = true;
                        }else{
                            echo '็งปๅใงใใพใใใ' . "\n";
                            $check = false;
                        }
                    }elseif($c == $a  && $d == $b -1){
	    	            if($ban_ura[$c][$d] != player1){
                            if($ban_ura[$c][$d] == player2)
                                $okiba1[$i] = $ban_narikin[$c][$d] - 8;
                            $ban[$c][$d] = $ban[$a][$b];
                            $ban_narikin[$c][$d] = $ban_narikin[$a][$b];
                            $ban[$a][$b] = 0;
                            $ban_narikin[$a][$b] = 0;
                            $ban_ura[$c][$d] = player1;
                            $ban_ura[$a][$b] = 0;
                            $check = true;
                        }else{
                            echo '็งปๅใงใใพใใใ' . "\n";
                            $check = false;
                        }
                    }elseif($c == $a -1 && $d == $b +1){
	    	            if($ban_ura[$c][$d] != player1){
                            if($ban_ura[$c][$d] == player2)
                                $okiba1[$i] = $ban_narikin[$c][$d] - 8;
                            $ban[$c][$d] = $ban[$a][$b];
                            $ban_narikin[$c][$d] = $ban_narikin[$a][$b];
                            $ban[$a][$b] = 0;
                            $ban_narikin[$a][$b] = 0;
                            $ban_ura[$c][$d] = player1;
                            $ban_ura[$a][$b] = 0;
                            $check = true;
                        }else{
                            echo '็งปๅใงใใพใใใ' . "\n";
                            $check = false;
                        }
                    }elseif($c == $a -1 && $d == $b -1){
	    	            if($ban_ura[$c][$d] != player1){
                            if($ban_ura[$c][$d] == player2)
                                $okiba1[$i] = $ban_narikin[$c][$d] - 8;
                            $ban[$c][$d] = $ban[$a][$b];
                            $ban_narikin[$c][$d] = $ban_narikin[$a][$b];
                            $ban[$a][$b] = 0;
                            $ban_narikin[$a][$b] = 0;
                            $ban_ura[$c][$d] = player1;
                            $ban_ura[$a][$b] = 0;
                            $check = true;
                        }else{
                            echo '็งปๅใงใใพใใใ' . "\n";
                            $check = false;
                        }
                    }elseif($c == $a +1 && $d == $b ){
	    	            if($ban_ura[$c][$d] != player1){
                            if($ban_ura[$c][$d] == player2)
                                $okiba1[$i] = $ban_narikin[$c][$d] - 8;
                            $ban[$c][$d] = $ban[$a][$b];
                            $ban_narikin[$c][$d] = $ban_narikin[$a][$b];
                            $ban[$a][$b] = 0;
                            $ban_narikin[$a][$b] = 0;
                            $ban_ura[$c][$d] = player1;
                            $ban_ura[$a][$b] = 0;
                            $check = true;
                        }else{
                            echo '็งปๅใงใใพใใใ' . "\n";
                            $check = false;
                        }
                    }else{
                        echo '็งปๅใงใใพใใใ' . "\n";
                        $check = false;
                    }
                    break;
    		    case 6:					//็
                    if($c == $a - 1 && $d == $b){
                        if($ban_ura[$c][$d] != player1){
                            if($ban_ura[$c][$d] == player2)
                                $okiba1[$i] = $ban_narikin[$c][$d] - 8;
                            $ban[$c][$d] = $ban[$a][$b];
                            $ban_narikin[$c][$d] = $ban_narikin[$a][$b];
                            $ban[$a][$b] = 0;
                            $ban_narikin[$a][$b] = 0;
                            $ban_ura[$c][$d] = player1;
                            $ban_ura[$a][$b] = 0;
                            $check = true;
                        }else{
                            echo '็งปๅใงใใพใใใ' . "\n";
                            $check = false;
                        }
                    }elseif($c == $a  && $d == $b +1){
	    	            if($ban_ura[$c][$d] != player1){
                            if($ban_ura[$c][$d] == player2)
                                $okiba1[$i] = $ban_narikin[$c][$d] - 8;
                            $ban[$c][$d] = $ban[$a][$b];
                            $ban_narikin[$c][$d] = $ban_narikin[$a][$b];
                            $ban[$a][$b] = 0;
                            $ban_narikin[$a][$b] = 0;
                            $ban_ura[$c][$d] = player1;
                            $ban_ura[$a][$b] = 0;
                            $check = true;
                        }else{
                            echo '็งปๅใงใใพใใใ' . "\n";
                            $check = false;
                        }
                    }elseif($c == $a  && $d == $b -1){
	    	            if($ban_ura[$c][$d] != player1){
                            if($ban_ura[$c][$d] == player2)
                                $okiba1[$i] = $ban_narikin[$c][$d] - 8;
                            $ban[$c][$d] = $ban[$a][$b];
                            $ban_narikin[$c][$d] = $ban_narikin[$a][$b];
                            $ban[$a][$b] = 0;
                            $ban_narikin[$a][$b] = 0;
                            $ban_ura[$c][$d] = player1;
                            $ban_ura[$a][$b] = 0;
                            $check = true;
                        }else{
                            echo '็งปๅใงใใพใใใ' . "\n";
                            $check = false;
                        }
                    }elseif($c == $a -1 && $d == $b +1){
	    	            if($ban_ura[$c][$d] != player1){
                            if($ban_ura[$c][$d] == player2)
                                $okiba1[$i] = $ban_narikin[$c][$d] - 8;
                            $ban[$c][$d] = $ban[$a][$b];
                            $ban_narikin[$c][$d] = $ban_narikin[$a][$b];
                            $ban[$a][$b] = 0;
                            $ban_narikin[$a][$b] = 0;
                            $ban_ura[$c][$d] = player1;
                            $ban_ura[$a][$b] = 0;
                            $check = true;
                        }else{
                            echo '็งปๅใงใใพใใใ' . "\n";
                            $check = false;
                        }
                    }elseif($c == $a -1 && $d == $b -1){
	    	            if($ban_ura[$c][$d] != player1){
                            if($ban_ura[$c][$d] == player2)
                                $okiba1[$i] = $ban_narikin[$c][$d] - 8;
                            $ban[$c][$d] = $ban[$a][$b];
                            $ban_narikin[$c][$d] = $ban_narikin[$a][$b];
                            $ban[$a][$b] = 0;
                            $ban_narikin[$a][$b] = 0;
                            $ban_ura[$c][$d] = player1;
                            $ban_ura[$a][$b] = 0;
                            $check = true;
                        }else{
                            echo '็งปๅใงใใพใใใ' . "\n";
                            $check = false;
                        }
                    }elseif($c == $a +1 && $d == $b +1){
	    	            if($ban_ura[$c][$d] != player1){
                            if($ban_ura[$c][$d] == player2)
                                $okiba1[$i] = $ban_narikin[$c][$d] - 8;
                            $ban[$c][$d] = $ban[$a][$b];
                            $ban_narikin[$c][$d] = $ban_narikin[$a][$b];
                            $ban[$a][$b] = 0;
                            $ban_narikin[$a][$b] = 0;
                            $ban_ura[$c][$d] = player1;
                            $ban_ura[$a][$b] = 0;
                            $check = true;
                        }else{
                            echo '็งปๅใงใใพใใใ' . "\n";
                            $check = false;
                        }
                    }elseif($c == $a +1 && $d == $b -1){
	    	            if($ban_ura[$c][$d] != player1){
                            if($ban_ura[$c][$d] == player2)
                                $okiba1[$i] = $ban_narikin[$c][$d] - 8;
                            $ban[$c][$d] = $ban[$a][$b];
                            $ban_narikin[$c][$d] = $ban_narikin[$a][$b];
                            $ban[$a][$b] = 0;
                            $ban_narikin[$a][$b] = 0;
                            $ban_ura[$c][$d] = player1;
                            $ban_ura[$a][$b] = 0;
                            $check = true;
                        }else{
                            echo '็งปๅใงใใพใใใ' . "\n";
                            $check = false;
                        }
                    }elseif($c == $a +1 && $d == $b ){
	    	            if($ban_ura[$c][$d] != player1){
                            if($ban_ura[$c][$d] == player2)
                                $okiba1[$i] = $ban_narikin[$c][$d] - 8;
                            $ban[$c][$d] = $ban[$a][$b];
                            $ban_narikin[$c][$d] = $ban_narikin[$a][$b];
                            $ban[$a][$b] = 0;
                            $ban_narikin[$a][$b] = 0;
                            $ban_ura[$c][$d] = player1;
                            $ban_ura[$a][$b] = 0;
                            $check = true;
                        }else{
                            echo '็งปๅใงใใพใใใ' . "\n";
                            $check = false;
                        }
                    }else{
                        echo '็งปๅใงใใพใใใ' . "\n";
                        $check = false;
                    }
                    break;

    		    case 9:					//ใต
                    if($c == $a + 1 && $d == $b){
                        if($ban_ura[$c][$d] != player2){
                            if($ban_ura[$c][$d] == player1)
                                $okiba2[$j] = $ban_narikin[$c][$d] + 8;
                            if($c >= 7){
                                $ju -> naruka($a, $b, $c, $d);
                            }else{
                                $ban[$c][$d] = $ban[$a][$b];
                            }
                            $ban_narikin[$c][$d] = $ban_narikin[$a][$b];
                            $ban[$a][$b] = 0;
                            $ban_narikin[$a][$b] = 0;
                            $ban_ura[$c][$d] = player2;
                            $ban_ura[$a][$b] = 0;
                            $check = true;
                        }else{
                            echo '็งปๅใงใใพใใใ' . "\n";
                            $check = false;
                        }
                    }else{
                        echo '็งปๅใงใใพใใใ' . "\n";
                        $check = false;
                    }
                    break;
    		    case 14:					//๏ฝต๏ฝณ
                    if($c == $a + 1 && $d == $b){
                        if($ban_ura[$c][$d] != player2){
                            if($ban_ura[$c][$d] == player1)
                                $okiba2[$j] = $ban_narikin[$c][$d] + 8;
                            $ban[$c][$d] = $ban[$a][$b];
                            $ban_narikin[$c][$d] = $ban_narikin[$a][$b];
                            $ban[$a][$b] = 0;
                            $ban_narikin[$a][$b] = 0;
                            $ban_ura[$c][$d] = player2;
                            $ban_ura[$a][$b] = 0;
                            $check = true;
                        }else{
                            echo '็งปๅใงใใพใใใ' . "\n";
                            $check = false;
                        }
                    }elseif($c == $a +1 && $d == $b -1){
		                if($ban_ura[$c][$d] != player2){
                            if($ban_ura[$c][$d] == player1)
                                $okiba2[$j] = $ban_narikin[$c][$d] + 8;
                            $ban[$c][$d] = $ban[$a][$b];
                            $ban_narikin[$c][$d] = $ban_narikin[$a][$b];
                            $ban[$a][$b] = 0;
                            $ban_narikin[$a][$b] = 0;
                            $ban_ura[$c][$d] = player2;
                            $ban_ura[$a][$b] = 0;
                            $check = true;
                        }else{
                            echo '็งปๅใงใใพใใใ' . "\n";
                            $check = false;
                        }
                    }elseif($c == $a +1 && $d == $b +1){
		                if($ban_ura[$c][$d] != player2){
                            if($ban_ura[$c][$d] == player1)
                                $okiba2[$j] = $ban_narikin[$c][$d] + 8;
                            $ban[$c][$d] = $ban[$a][$b];
                            $ban_narikin[$c][$d] = $ban_narikin[$a][$b];
                            $ban[$a][$b] = 0;
                            $ban_narikin[$a][$b] = 0;
                            $ban_ura[$c][$d] = player2;
                            $ban_ura[$a][$b] = 0;
                            $check = true;
                        }else{
                            echo '็งปๅใงใใพใใใ' . "\n";
                            $check = false;
                        }
                    }elseif($c == $a  && $d == $b +1){
		                if($ban_ura[$c][$d] != player2){
                            if($ban_ura[$c][$d] == player1)
                                $okiba2[$j] = $ban_narikin[$c][$d] + 8;
                            $ban[$c][$d] = $ban[$a][$b];
                            $ban_narikin[$c][$d] = $ban_narikin[$a][$b];
                            $ban[$a][$b] = 0;
                            $ban_narikin[$a][$b] = 0;
                            $ban_ura[$c][$d] = player2;
                            $ban_ura[$a][$b] = 0;
                            $check = true;
                        }else{
                            echo '็งปๅใงใใพใใใ' . "\n";
                            $check = false;
                        }
                    }elseif($c == $a  && $d == $b -1){
		                if($ban_ura[$c][$d] != player2){
                            if($ban_ura[$c][$d] == player1)
                                $okiba2[$j] = $ban_narikin[$c][$d] + 8;
                            $ban[$c][$d] = $ban[$a][$b];
                            $ban_narikin[$c][$d] = $ban_narikin[$a][$b];
                            $ban[$a][$b] = 0;
                            $ban_narikin[$a][$b] = 0;
                            $ban_ura[$c][$d] = player2;
                            $ban_ura[$a][$b] = 0;
                            $check = true;
                        }else{
                            echo '็งปๅใงใใพใใใ' . "\n";
                            $check = false;
                        }
                    }elseif($c == $a -1 && $d == $b +1){
		                if($ban_ura[$c][$d] != player2){
                            if($ban_ura[$c][$d] == player1)
                                $okiba2[$j] = $ban_narikin[$c][$d] + 8;
                            $ban[$c][$d] = $ban[$a][$b];
                            $ban_narikin[$c][$d] = $ban_narikin[$a][$b];
                            $ban[$a][$b] = 0;
                            $ban_narikin[$a][$b] = 0;
                            $ban_ura[$c][$d] = player2;
                            $ban_ura[$a][$b] = 0;
                            $check = true;
                        }else{
                           echo '็งปๅใงใใพใใใ' . "\n";
                           $check = false;
                        }
                    }elseif($c == $a -1 && $d == $b -1){
		                if($ban_ura[$c][$d] != player2){
                            if($ban_ura[$c][$d] == player1)
                                $okiba2[$j] = $ban_narikin[$c][$d] + 8;
                            $ban[$c][$d] = $ban[$a][$b];
                            $ban_narikin[$c][$d] = $ban_narikin[$a][$b];
                            $ban[$a][$b] = 0;
                            $ban_narikin[$a][$b] = 0;
                            $ban_ura[$c][$d] = player2;
                            $ban_ura[$a][$b] = 0;
                            $check = true;
                        }else{
                            echo '็งปๅใงใใพใใใ' . "\n";
                            $check = false;
                        }
                    }elseif($c == $a -1 && $d == $b ){
		                if($ban_ura[$c][$d] != player2){
                            if($ban_ura[$c][$d] == player1)
                                $okiba2[$j] = $ban_narikin[$c][$d] + 8;
                            $ban[$c][$d] = $ban[$a][$b];
                            $ban_narikin[$c][$d] = $ban_narikin[$a][$b];
                            $ban[$a][$b] = 0;
                            $ban_narikin[$a][$b] = 0;
                            $ban_ura[$c][$d] = player2;
                            $ban_ura[$a][$b] = 0;
                            $check = true;
                        }else{
                            echo '็งปๅใงใใพใใใ' . "\n";
                            $check = false;
                        }
                    }else{
                        echo '็งปๅใงใใพใใใ' . "\n";
                        $check = false;
                    }
                    break;
    		    case 13:					//๏ฝท๏พ
                    if($c == $a + 1 && $d == $b){
                        if($ban_ura[$c][$d] != player2){
                            if($ban_ura[$c][$d] == player1)
                                $okiba2[$j] = $ban_narikin[$c][$d] + 8;
                            $ban[$c][$d] = $ban[$a][$b];
                            $ban_narikin[$c][$d] = $ban_narikin[$a][$b];
                            $ban[$a][$b] = 0;
                            $ban_narikin[$a][$b] = 0;
                            $ban_ura[$c][$d] = player2;
                            $ban_ura[$a][$b] = 0;
                            $check = true;
                        }else{
                            echo '็งปๅใงใใพใใใ' . "\n";
                            $check = false;
                        }
                    }elseif($c == $a  && $d == $b -1){
	    	            if($ban_ura[$c][$d] != player2){
                            if($ban_ura[$c][$d] == player1)
                                $okiba2[$j] = $ban_narikin[$c][$d] + 8;
                            $ban[$c][$d] = $ban[$a][$b];
                            $ban_narikin[$c][$d] = $ban_narikin[$a][$b];
                            $ban[$a][$b] = 0;
                            $ban_narikin[$a][$b] = 0;
                            $ban_ura[$c][$d] = player2;
                            $ban_ura[$a][$b] = 0;
                            $check = true;
                        }else{
                            echo '็งปๅใงใใพใใใ' . "\n";
                            $check = false;
                        }
                    }elseif($c == $a  && $d == $b +1){
	    	            if($ban_ura[$c][$d] != player2){
                            if($ban_ura[$c][$d] == player1)
                                $okiba2[$j] = $ban_narikin[$c][$d] + 8;
                            $ban[$c][$d] = $ban[$a][$b];
                            $ban_narikin[$c][$d] = $ban_narikin[$a][$b];
                            $ban[$a][$b] = 0;
                            $ban_narikin[$a][$b] = 0;
                            $ban_ura[$c][$d] = player2;
                            $ban_ura[$a][$b] = 0;
                            $check = true;
                        }else{
                            echo '็งปๅใงใใพใใใ' . "\n";
                            $check = false;
                        }
                    }elseif($c == $a +1 && $d == $b +1){
	    	            if($ban_ura[$c][$d] != player2){
                            if($ban_ura[$c][$d] == player1)
                                $okiba2[$j] = $ban_narikin[$c][$d] + 8;
                            $ban[$c][$d] = $ban[$a][$b];
                            $ban_narikin[$c][$d] = $ban_narikin[$a][$b];
                            $ban[$a][$b] = 0;
                            $ban_narikin[$a][$b] = 0;
                            $ban_ura[$c][$d] = player2;
                            $ban_ura[$a][$b] = 0;
                            $check = true;
                        }else{
                            echo '็งปๅใงใใพใใใ' . "\n";
                            $check = false;
                        }
                    }elseif($c == $a +1 && $d == $b -1){
    		            if($ban_ura[$c][$d] != player2){
                            if($ban_ura[$c][$d] == player1)
                               $okiba2[$j] = $ban_narikin[$c][$d] + 8;
                            $ban[$c][$d] = $ban[$a][$b];
                            $ban_narikin[$c][$d] = $ban_narikin[$a][$b];
                            $ban[$a][$b] = 0;
                            $ban_narikin[$a][$b] = 0;
                            $ban_ura[$c][$d] = player2;
                            $ban_ura[$a][$b] = 0;
                            $check = true;
                        }else{
                            echo '็งปๅใงใใพใใใ' . "\n";
                            $check = false;
                        }
                    }elseif($c == $a -1 && $d == $b ){
		                if($ban_ura[$c][$d] != player2){
                            if($ban_ura[$c][$d] == player1)
                                $okiba2[$j] = $ban_narikin[$c][$d] + 8;
                            $ban[$c][$d] = $ban[$a][$b];
                            $ban_narikin[$c][$d] = $ban_narikin[$a][$b];
                            $ban[$a][$b] = 0;
                            $ban_narikin[$a][$b] = 0;
                            $ban_ura[$c][$d] = player2;
                            $ban_ura[$a][$b] = 0;
                            $check = true;
                        }else{
                            echo '็งปๅใงใใพใใใ' . "\n";
                            $check = false;
                        }
                    }else{
                        echo '็งปๅใงใใพใใใ' . "\n";
                        $check = false;
                    }
                    break;
	    	    case 12:					//๏ฝท๏พ๏พ
                    if($c == $a + 1 && $d == $b){
                        if($ban_ura[$c][$d] != player2){
                            if($ban_ura[$c][$d] == player1)
                                $okiba2[$j] = $ban_narikin[$c][$d] + 8;
                            if($c >= 7){
                                $ju -> naruka($a, $b, $c, $d);
                            }else{
                                $ban[$c][$d] = $ban[$a][$b];
                            }
                            $ban_narikin[$c][$d] = $ban_narikin[$a][$b];
                            $ban[$a][$b] = 0;
                            $ban_narikin[$a][$b] = 0;
                            $ban_ura[$c][$d] = player2;
                            $ban_ura[$a][$b] = 0;
                            $check = true;
                        }else{
                            echo '็งปๅใงใใพใใใ' . "\n";
                            $check = false;
                        }
                    }elseif($c == $a +1 && $d == $b +1){
		                if($ban_ura[$c][$d] != player2){
                            if($ban_ura[$c][$d] == player1)
                                $okiba2[$j] = $ban_narikin[$c][$d] + 8;
                            if($c >= 7){
                                $ju -> naruka($a, $b, $c, $d);;
                            }else{
                                $ban[$c][$d] = $ban[$a][$b];
                            }
                            $ban_narikin[$c][$d] = $ban_narikin[$a][$b];
                            $ban[$a][$b] = 0;
                            $ban_narikin[$a][$b] = 0;
                            $ban_ura[$c][$d] = player2;
                            $ban_ura[$a][$b] = 0;
                            $check = true;
                        }else{
                            echo '็งปๅใงใใพใใใ' . "\n";
                            $check = false;
                        }
                    }elseif($c == $a +1 && $d == $b -1){
	    	            if($ban_ura[$c][$d] != player2){
                            if($ban_ura[$c][$d] == player1)
                                $okiba2[$j] = $ban_narikin[$c][$d] + 8;
                            if($c >= 7){
                                $ju -> naruka($a, $b, $c, $d);
                            }else{
                                $ban[$c][$d] = $ban[$a][$b];
                            }
                            $ban_narikin[$c][$d] = $ban_narikin[$a][$b];
                            $ban[$a][$b] = 0;
                            $ban_narikin[$a][$b] = 0;
                            $ban_ura[$c][$d] = player2;
                            $ban_ura[$a][$b] = 0;
                            $check = true;
                        }else{
                            echo '็งปๅใงใใพใใใ' . "\n";
                            $check = false;
                        }
                    }elseif($c == $a -1 && $d == $b +1){
	    	            if($ban_ura[$c][$d] != player2){
                            if($ban_ura[$c][$d] == player1)
                                $okiba2[$j] = $ban_narikin[$c][$d] + 8;
                            if($c >= 7){
                                $ju -> naruka($a, $b, $c, $d);
                            }else{
                                $ban[$c][$d] = $ban[$a][$b];
                            }
                            $ban_narikin[$c][$d] = $ban_narikin[$a][$b];
                            $ban[$a][$b] = 0;
                            $ban_narikin[$a][$b] = 0;
                            $ban_ura[$c][$d] = player2;
                            $ban_ura[$a][$b] = 0;
                            $check = true;
                        }else{
                            echo '็งปๅใงใใพใใใ' . "\n";
                            $check = false;
                        }
                    }elseif($c == $a -1 && $d == $b -1){
		                if($ban_ura[$c][$d] != player2){
                            if($ban_ura[$c][$d] == player1)
                                $okiba2[$j] = $ban_narikin[$c][$d] + 8;
                            if($c >= 7){
                                $ju -> naruka($a, $b, $c, $d);
                            }else{
                                $ban[$c][$d] = $ban[$a][$b];
                            }
                            $ban_narikin[$c][$d] = $ban_narikin[$a][$b];
                            $ban[$a][$b] = 0;
                            $ban_narikin[$a][$b] = 0;
                            $ban_ura[$c][$d] = player2;
                            $ban_ura[$a][$b] = 0;
                            $check = true;
                        }else{
                            echo '็งปๅใงใใพใใใ' . "\n";
                            $check = false;
                        }
                    }else{
                        echo '็งปๅใงใใพใใใ' . "\n";
                        $check = false;
                    }
                    break;
    		    case 11:					//๏ฝน๏ฝฒ
                    if($c == $a +2 && $d == $b +1){
                        if($ban_ura[$c][$d] != player2){
                            if($ban_ura[$c][$d] == player1)
                                $okiba2[$j] = $ban_narikin[$c][$d] + 8;
                            if($c >= 7){
                                $ju -> naruka($a, $b, $c, $d);
                            }else{
                                $ban[$c][$d] = $ban[$a][$b];
                            }
                            $ban_narikin[$c][$d] = $ban_narikin[$a][$b];
                            $ban[$a][$b] = 0;
                            $ban_narikin[$a][$b] = 0;
                            $ban_ura[$c][$d] = player2;
                            $ban_ura[$a][$b] = 0;
                            $check = true;
                        }else{
                            echo '็งปๅใงใใพใใใ' . "\n";
                            $check = false;
                        }
                    }elseif($c == $a +2 && $d == $b -1){
                        if($ban_ura[$c][$d] != player2){
                            if($ban_ura[$c][$d] == player1)
                                $okiba2[$j] = $ban_narikin[$c][$d] + 8;
                            if($c >= 7){
                                $ju -> naruka($a, $b, $c, $d);
                            }else{
                                $ban[$c][$d] = $ban[$a][$b];
                            }
                            $ban_narikin[$c][$d] = $ban_narikin[$a][$b];
                            $ban[$a][$b] = 0;
                            $ban_narikin[$a][$b] = 0;
                            $ban_ura[$c][$d] = player2;
                            $ban_ura[$a][$b] = 0;
                            $check = true;
                        }else{
                            echo '็งปๅใงใใพใใใ' . "\n";
                            $check = false;
                        }
                    }else{
                        echo '็งปๅใงใใพใใใ' . "\n";
                        $check = false;
                    }
                    break;
            }
        }catch(Exception $e){
            echo 'ใจใฉใผ3';
        }
    }
    
    function limit2($koma, $a, $b, $c, $d)
    {
        try{
            global $ban, $ban_ura, $ban_narikin, $ju, $check, $okiba1, $okiba2;
            $count = 0;
    
            for($i = 1; $i < 11; $i++){
                if($okiba1[$i] == 0)
                    break;
            }
            for($j = 1; $j < 11; $j++){
                if($okiba2[$j] == 0)
                    break;
            }
        
            switch($koma){
                case 2:
                    $x = $a - 1;
                    if($c < $a && $d == $b){
                        while($x >= $c){
                            if($ban[$x][$d] != 0)
                                $count++;
                            $x--;
                        }
                        if($count != 0){
                            if(($ban_ura[$c][$d] == 0) || ($ban_ura[$c][$d] == player1)){
                                echo '็งปๅใงใใพใใใ' . "\n";
                                $check = false;
                                break;
                            }elseif($count > 1){
                                echo '็งปๅใงใใพใใใ' . "\n";
                                $check = false;
                                break;
                            }
                        }
                        if($ban_ura[$c][$d] == player2)
                            $okiba1[$i] = $ban_narikin[$c][$d] - 8;
                        if($c <= 3){
                            $ju -> naruka($a, $b, $c, $d);
                        }else{
                            $ban[$c][$d] = $ban[$a][$b];
                        }
                        $ban_narikin[$c][$d] = $ban_narikin[$a][$b];
                        $ban[$a][$b] = 0;
                        $ban_narikin[$a][$b] = 0;
                        $ban_ura[$c][$d] = player1;
                        $ban_ura[$a][$b] = 0;
                        $check = true;
                    }else{
                        echo '็งปๅใงใใพใใใ' . "\n";
                        $check = false;
                    }
                    break;
            
                case 7:
                    if($c < $a && $d == $b){    //ไธ
                        $x = $a - 1;
                        while($x >= $c){
                            if($ban[$x][$d] != 0)
                                $count++;
                            $x--;
                        }
                        if($count != 0){
                            if(($ban_ura[$c][$d] == 0) || ($ban_ura[$c][$d] == player1)){
                                echo '็งปๅใงใใพใใใ' . "\n";
                                $check = false;
                                break;
                            }elseif($count > 1){
                                echo '็งปๅใงใใพใใใ' . "\n";
                                $check = false;
                                break;
                            }
                        }
                        if($ban_ura[$c][$d] == player2)
                            $okiba1[$i] = $ban_narikin[$c][$d] - 8;
                        $ban[$c][$d] = $ban[$a][$b];
                        $ban_narikin[$c][$d] = $ban_narikin[$a][$b];
                        $ban[$a][$b] = 0;
                        $ban_narikin[$a][$b] = 0;
                        $ban_ura[$c][$d] = player1;
                        $ban_ura[$a][$b] = 0;
                        $check = true;
                    }elseif($c > $a && $d == $b){    //ไธ
                        $x = $a + 1;
                        while($x <= $c){
                            if($ban[$x][$d] != 0)
                                $count++;
                            $x++;
                        }
                        if($count != 0){
                            if(($ban_ura[$c][$d] == 0) || ($ban_ura[$c][$d] == player1)){
                                echo '็งปๅใงใใพใใใ' . "\n";
                                $check = false;
                                break;
                            }elseif($count > 1){
                                echo '็งปๅใงใใพใใใ' . "\n";
                                $check = false;
                                break;
                            }
                        }
                        if($ban_ura[$c][$d] == player2)
                            $okiba1[$i] = $ban_narikin[$c][$d] - 8;
                        $ban[$c][$d] = $ban[$a][$b];
                        $ban_narikin[$c][$d] = $ban_narikin[$a][$b];
                        $ban[$a][$b] = 0;
                        $ban_narikin[$a][$b] = 0;
                        $ban_ura[$c][$d] = player1;
                        $ban_ura[$a][$b] = 0;
                        $check = true;
                    }elseif($c == $a && $d > $b){    //ๅณ
                        $x = $b + 1;
                        while($x <= $d){
                            if($ban[$c][$x] != 0)
                                $count++;
                            $x++;
                        }
                        if($count != 0){
                            if(($ban_ura[$c][$d] == 0) || ($ban_ura[$c][$d] == player1)){
                                echo '็งปๅใงใใพใใใ' . "\n";
                                $check = false;
                                break;
                            }elseif($count > 1){
                                echo '็งปๅใงใใพใใใ' . "\n";
                                $check = false;
                                break;
                            }
                        }
                        if($ban_ura[$c][$d] == player2)
                            $okiba1[$i] = $ban_narikin[$c][$d] - 8;
                        $ban[$c][$d] = $ban[$a][$b];
                        $ban_narikin[$c][$d] = $ban_narikin[$a][$b];
                        $ban[$a][$b] = 0;
                        $ban_narikin[$a][$b] = 0;
                        $ban_ura[$c][$d] = player1;
                        $ban_ura[$a][$b] = 0;
                        $check = true;
                    }elseif($c == $a && $d < $b){    //ๅทฆ
                        $x = $b - 1;
                        while($x >= $d){
                            if($ban[$c][$x] != 0)
                                $count++;
                            $x--;
                        }
                        if($count != 0){
                            if(($ban_ura[$c][$d] == 0) || ($ban_ura[$c][$d] == player1)){
                                echo '็งปๅใงใใพใใใ' . "\n";
                                $check = false;
                                break;
                            }elseif($count > 1){
                                echo '็งปๅใงใใพใใใ' . "\n";
                                $check = false;
                                break;
                            }
                        }
                        if($ban_ura[$c][$d] == player2)
                            $okiba1[$i] = $ban_narikin[$c][$d] - 8;
                        $ban[$c][$d] = $ban[$a][$b];
                        $ban_narikin[$c][$d] = $ban_narikin[$a][$b];
                        $ban[$a][$b] = 0;
                        $ban_narikin[$a][$b] = 0;
                        $ban_ura[$c][$d] = player1;
                        $ban_ura[$a][$b] = 0;
                        $check = true;
                    }else{
                        echo '็งปๅใงใใพใใใ' . "\n";
                        $check = false;
                    }
                    break;
             
                case 8:
                    if((($c - $a) != ($d - $b)) && (($a - $c) != ($d - $b))){
                        echo '็งปๅใงใใพใใใ' . "\n";
                        $check = false;
                        break;
                    }
            
                    if($c < $a && $d > $b){    //ๅณไธ
                        $x = $a - 1;
                        $y = $b + 1;
                        while($x >= $c){
                            if($ban[$x][$y] != 0)
                                $count++;
                            $x--;
                            $y++;
                        }
                        if($count != 0){
                            if(($ban_ura[$c][$d] == 0) || ($ban_ura[$c][$d] == player1)){
                                echo '็งปๅใงใใพใใใ' . "\n";
                                $check = false;
                                break;
                            }elseif($count > 1){
                                echo '็งปๅใงใใพใใใ' . "\n";
                                $check = false;
                                break;
                            }
                        }
                        if($ban_ura[$c][$d] == player2)
                            $okiba1[$i] = $ban_narikin[$c][$d] - 8;
                        $ban[$c][$d] = $ban[$a][$b];
                        $ban_narikin[$c][$d] = $ban_narikin[$a][$b];
                        $ban[$a][$b] = 0;
                        $ban_narikin[$a][$b] = 0;
                        $ban_ura[$c][$d] = player1;
                        $ban_ura[$a][$b] = 0;
                        $check = true;
                    }elseif($c > $a && $d > $b){    //ๅณไธ
                        $x = $a + 1;
                        $y = $b + 1;
                        while($x <= $c){
                            if($ban[$x][$y] != 0)
                                $count++;
                            $x++;
                            $y++;
                        }
                        if($count != 0){
                            if(($ban_ura[$c][$d] == 0) || ($ban_ura[$c][$d] == player1)){
                                echo '็งปๅใงใใพใใใ' . "\n";
                                $check = false;
                                break;
                            }elseif($count > 1){
                                echo '็งปๅใงใใพใใใ' . "\n";
                                $check = false;
                                break;
                            }
                        }
                        if($ban_ura[$c][$d] == player2)
                            $okiba1[$i] = $ban_narikin[$c][$d] - 8;
                        $ban[$c][$d] = $ban[$a][$b];
                        $ban_narikin[$c][$d] = $ban_narikin[$a][$b];
                        $ban[$a][$b] = 0;
                        $ban_narikin[$a][$b] = 0;
                        $ban_ura[$c][$d] = player1;
                        $ban_ura[$a][$b] = 0;
                        $check = true;
                    }elseif($c < $a && $d < $b){    //ๅทฆไธ
                        $x = $a - 1;
                        $y = $b - 1;
                        while($x >= $c){
                            if($ban[$x][$y] != 0)
                                $count++;
                            $x--;
                            $y--;
                        }
                        if($count != 0){
                            if(($ban_ura[$c][$d] == 0) || ($ban_ura[$c][$d] == player1)){
                                echo '็งปๅใงใใพใใใ' . "\n";
                                $check = false;
                                break;
                            }elseif($count > 1){
                                echo '็งปๅใงใใพใใใ' . "\n";
                                $check = false;
                                break;
                            }
                        }
                        if($ban_ura[$c][$d] == player2)
                                $okiba1[$i] = $ban_narikin[$c][$d] - 8;
                        $ban[$c][$d] = $ban[$a][$b];
                        $ban_narikin[$c][$d] = $ban_narikin[$a][$b];
                        $ban[$a][$b] = 0;
                        $ban_narikin[$a][$b] = 0;
                        $ban_ura[$c][$d] = player1;
                        $ban_ura[$a][$b] = 0;
                        $check = true;
                    }elseif($c > $a && $d < $b){    //ๅทฆไธ
                        $x = $a + 1;
                        $y = $b - 1;
                        while($x <= $c){
                            if($ban[$x][$y] != 0)
                                $count++;
                            $x++;
                            $y--;
                        }
                        if($count != 0){
                            if(($ban_ura[$c][$d] == 0) || ($ban_ura[$c][$d] == player1)){
                                echo '็งปๅใงใใพใใใ' . "\n";
                                $check = false;
                                break;
                            }elseif($count > 1){
                                echo '็งปๅใงใใพใใใ' . "\n";
                                $check = false;
                                break;
                            }
                        }
                        if($ban_ura[$c][$d] == player2)
                                $okiba1[$i] = $ban_narikin[$c][$d] - 8;
                        $ban[$c][$d] = $ban[$a][$b];
                        $ban_narikin[$c][$d] = $ban_narikin[$a][$b];
                        $ban[$a][$b] = 0;
                        $ban_narikin[$a][$b] = 0;
                        $ban_ura[$c][$d] = player1;
                        $ban_ura[$a][$b] = 0;
                        $check = true;
                    }else{
                        echo '็งปๅใงใใพใใใ' . "\n";
                        $check = false;
                    }
                    break;
            
                case 15:
                    if($c < $a && $d == $b){    //ไธ
                        $x = $a - 1;
                        while($x >= $c){
                            if($ban[$x][$d] != 0)
                                $count++;
                            $x--;
                        }
                        if($count != 0){
                            if(($ban_ura[$c][$d] == 0) || ($ban_ura[$c][$d] == player2)){
                                echo '็งปๅใงใใพใใใ' . "\n";
                                $check = false;
                                break;
                            }elseif($count > 1){
                                echo '็งปๅใงใใพใใใ' . "\n";
                                $check = false;
                                break;
                            }
                        }
                        if($ban_ura[$c][$d] == player1)
                            $okiba2[$j] = $ban_narikin[$c][$d] + 8;
                        $ban[$c][$d] = $ban[$a][$b];
                        $ban_narikin[$c][$d] = $ban_narikin[$a][$b];
                        $ban[$a][$b] = 0;
                        $ban_narikin[$a][$b] = 0;
                        $ban_ura[$c][$d] = player2;
                        $ban_ura[$a][$b] = 0;
                        $check = true;
                    }elseif($c > $a && $d == $b){    //ไธ
                        $x = $a + 1;
                        while($x <= $c){
                            if($ban[$x][$d] != 0)
                                $count++;
                            $x++;
                        }
                        if($count != 0){
                            if(($ban_ura[$c][$d] == 0) || ($ban_ura[$c][$d] == player2)){
                                echo '็งปๅใงใใพใใใ' . "\n";
                                $check = false;
                                break;
                            }elseif($count > 1){
                                echo '็งปๅใงใใพใใใ' . "\n";
                                $check = false;
                                break;
                            }
                        }
                        if($ban_ura[$c][$d] == player1)
                            $okiba2[$j] = $ban_narikin[$c][$d] + 8;
                        $ban[$c][$d] = $ban[$a][$b];
                        $ban_narikin[$c][$d] = $ban_narikin[$a][$b];
                        $ban[$a][$b] = 0;
                        $ban_narikin[$a][$b] = 0;
                        $ban_ura[$c][$d] = player2;
                        $ban_ura[$a][$b] = 0;
                        $check = true;
                    }elseif($c == $a && $d > $b){    //ๅณ
                        $x = $b + 1;
                        while($x <= $d){
                            if($ban[$c][$x] != 0)
                                $count++;
                            $x++;
                        }
                        if($count != 0){
                            if(($ban_ura[$c][$d] == 0) || ($ban_ura[$c][$d] == player2)){
                                echo '็งปๅใงใใพใใใ' . "\n";
                                $check = false;
                                break;
                            }elseif($count > 1){
                                echo '็งปๅใงใใพใใใ' . "\n";
                                $check = false;
                                break;
                            }
                        }
                        if($ban_ura[$c][$d] == player1)
                            $okiba2[$j] = $ban_narikin[$c][$d] + 8;
                        $ban[$c][$d] = $ban[$a][$b];
                        $ban_narikin[$c][$d] = $ban_narikin[$a][$b];
                        $ban[$a][$b] = 0;
                        $ban_narikin[$a][$b] = 0;
                        $ban_ura[$c][$d] = player2;
                        $ban_ura[$a][$b] = 0;
                        $check = true;
                    }elseif($c == $a && $d < $b){    //ๅทฆ
                        $x = $b - 1;
                        while($x >= $d){
                            if($ban[$c][$x] != 0)
                                $count++;
                            $x--;
                        }
                        if($count != 0){
                            if(($ban_ura[$c][$d] == 0) || ($ban_ura[$c][$d] == player2)){
                                echo '็งปๅใงใใพใใใ' . "\n";
                                $check = false;
                                break;
                            }elseif($count > 1){
                                echo '็งปๅใงใใพใใใ' . "\n";
                                $check = false;
                                break;
                            }
                        }
                        if($ban_ura[$c][$d] == player1)
                            $okiba2[$j] = $ban_narikin[$c][$d] + 8;
                        $ban[$c][$d] = $ban[$a][$b];
                        $ban_narikin[$c][$d] = $ban_narikin[$a][$b];
                        $ban[$a][$b] = 0;
                        $ban_narikin[$a][$b] = 0;
                        $ban_ura[$c][$d] = player2;
                        $ban_ura[$a][$b] = 0;
                        $check = true;
                    }else{
                        echo '็งปๅใงใใพใใใ' . "\n";
                        $check = false;
                    }
                    break;
                
                case 16:    
                    if((($c - $a) != ($d - $b)) && (($a - $c) != ($d - $b))){
                        echo '็งปๅใงใใพใใใ' . "\n";
                        $check = false;
                        break;
                    }
            
                    if($c < $a && $d > $b){    //ๅณไธ
                        $x = $a - 1;
                        $y = $b + 1;
                        while($x >= $c){
                            if($ban[$x][$y] != 0)
                                $count++;
                            $x--;
                            $y++;
                        }
                        if($count != 0){
                            if(($ban_ura[$c][$d] == 0) || ($ban_ura[$c][$d] == player2)){
                                echo '็งปๅใงใใพใใใ' . "\n";
                                $check = false;
                                break;
                            }elseif($count > 1){
                                echo '็งปๅใงใใพใใใ' . "\n";
                                $check = false;
                                break;
                            }
                        }
                        if($ban_ura[$c][$d] == player1)
                            $okiba2[$j] = $ban_narikin[$c][$d] + 8;
                        $ban[$c][$d] = $ban[$a][$b];
                        $ban_narikin[$c][$d] = $ban_narikin[$a][$b];
                        $ban[$a][$b] = 0;
                        $ban_narikin[$a][$b] = 0;
                        $ban_ura[$c][$d] = player2;
                        $ban_ura[$a][$b] = 0;
                        $check = true;
                    }elseif($c > $a && $d > $b){    //ๅณไธ
                        $x = $a + 1;
                        $y = $b + 1;
                        while($x <= $c){
                            if($ban[$x][$y] != 0)
                                $count++;
                            $x++;
                            $y++;
                        }
                        if($count != 0){
                            if(($ban_ura[$c][$d] == 0) || ($ban_ura[$c][$d] == player2)){
                                echo '็งปๅใงใใพใใใ' . "\n";
                                $check = false;
                                break;
                            }elseif($count > 1){
                                echo '็งปๅใงใใพใใใ' . "\n";
                                $check = false;
                                break;
                            }
                        }
                        if($ban_ura[$c][$d] == player1)
                            $okiba2[$j] = $ban_narikin[$c][$d] + 8;
                        $ban[$c][$d] = $ban[$a][$b];
                        $ban_narikin[$c][$d] = $ban_narikin[$a][$b];
                        $ban[$a][$b] = 0;
                        $ban_narikin[$a][$b] = 0;
                        $ban_ura[$c][$d] = player2;
                        $ban_ura[$a][$b] = 0;
                        $check = true;
                    }elseif($c < $a && $d < $b){    //ๅทฆไธ
                        $x = $a - 1;
                        $y = $b - 1;
                        while($x >= $c){
                            if($ban[$x][$y] != 0)
                                $count++;
                            $x--;
                            $y--;
                        }
                        if($count != 0){
                            if(($ban_ura[$c][$d] == 0) || ($ban_ura[$c][$d] == player2)){
                                echo '็งปๅใงใใพใใใ' . "\n";
                                $check = false;
                                break;
                            }elseif($count > 1){
                                echo '็งปๅใงใใพใใใ' . "\n";
                                $check = false;
                                break;
                            }
                        }
                        if($ban_ura[$c][$d] == player1)
                            $okiba2[$j] = $ban_narikin[$c][$d] + 8;
                        $ban[$c][$d] = $ban[$a][$b];
                        $ban_narikin[$c][$d] = $ban_narikin[$a][$b];
                        $ban[$a][$b] = 0;
                        $ban_narikin[$a][$b] = 0;
                        $ban_ura[$c][$d] = player2;
                        $ban_ura[$a][$b] = 0;
                        $check = true;
                    }elseif($c > $a && $d < $b){    //ๅทฆไธ
                        $x = $a + 1;
                        $y = $b - 1;
                        while($x <= $c){
                            if($ban[$x][$y] != 0)
                                $count++;
                            $x++;
                            $y--;
                        }
                        if($count != 0){
                            if(($ban_ura[$c][$d] == 0) || ($ban_ura[$c][$d] == player2)){
                                echo '็งปๅใงใใพใใใ' . "\n";
                                $check = false;
                                break;
                            }elseif($count > 1){
                                echo '็งปๅใงใใพใใใ' . "\n";
                                $check = false;
                                break;
                            }
                        }
                        if($ban_ura[$c][$d] == player1)
                            $okiba2[$j] = $ban_narikin[$c][$d] + 8;
                        $ban[$c][$d] = $ban[$a][$b];
                        $ban_narikin[$c][$d] = $ban_narikin[$a][$b];
                        $ban[$a][$b] = 0;
                        $ban_narikin[$a][$b] = 0;
                        $ban_ura[$c][$d] = player2;
                        $ban_ura[$a][$b] = 0;
                        $check = true;
                    }else{
                        echo '็งปๅใงใใพใใใ' . "\n";
                        $check = false;
                    }
                    break;
           
                case 10:
                    $x = $a + 1;
                    if($c > $a && $d == $b){
                        while($x <= $c){
                            if($ban[$x][$d] != 0)
                                $count++;
                            $x++;
                        }
                        if($count != 0){
                            if(($ban_ura[$c][$d] == 0) || ($ban_ura[$c][$d] == player2)){
                                echo '็งปๅใงใใพใใใ' . "\n";
                                $check = false;
                                break;
                            }elseif($count > 1){
                                echo '็งปๅใงใใพใใใ' . "\n";
                                $check = false;
                                break;
                            }
                        }
                        
                        if($ban_ura[$c][$d] == player1){
                        var_dump($okiba2[$j]);
                            $okiba2[$j] = $ban_narikin[$c][$d] + 8;
                        var_dump($okiba2[$j]);
                        }
                        if($c >= 7){
                            $ju -> naruka($a, $b, $c, $d);
                        }else{
                            $ban[$c][$d] = $ban[$a][$b];
                        }
                        $ban_narikin[$c][$d] = $ban_narikin[$a][$b];
                        $ban[$a][$b] = 0;
                        $ban_narikin[$a][$b] = 0;
                        $ban_ura[$c][$d] = player2;
                        $ban_ura[$a][$b] = 0;
                        $check = true;
                    }else{
                        echo '็งปๅใงใใพใใใ' . "\n";
                        $check = false;
                    }
                    break;
                }
            }catch(Exception $e){
                echo 'ใจใฉใผ';
            }
    }
    
}

class Judge
{
    function naruka($x1, $y1, $x2, $y2)
    {
        global $ban, $teban, $ju;
        $a = -1;
        $b = -1;
        echo 'ใชใใพใใ๏ผใ1ใฏใใ2ใใใ' . "\n";
        fscanf(STDIN, '%d %d' , $a,$b);
        if(($a == 1 || $a == 2) && $b == -1){
            if($a == 1){
                if($teban){
                    $ban[$x2][$y2] = 5;
                }else{
                    $ban[$x2][$y2] = 13;
                }
            }else{
                $ban[$x2][$y2] = $ban[$x1][$y1];
            }
        }else{
            echo 'ๅฅๅใ้้ใฃใฆใใพใใ' . "\n";
            $ju -> naruka($x1, $y1, $x2, $y2);
        }
    }
    
    function hantei($ban)
    {
        try{
            global $teban;
            $ou_count = 0;
        
            for($x = 1; $x < 10; $x++){
                for($y = 1; $y < 10; $y++){
                    if($ban[$x][$y] == 6 || $ban[$x][$y] == 14){
                        $ou_count++;
                    }
                }
            }
        
            if($ou_count == 2){
                return true;
            }else{
                if($teban){
                    echo 'player1ใฎๅๅฉ' . "\n";
                }else{
                    echo 'player2ใฎๅๅฉ' . "\n";
                }
                return false;
            }
        }catch(Exception $e){
        echo 'ใจใฉใผ';
        }
    }
    
    function oute()
    {
        global $teban, $ban;
        
        $x = 0;
        $y = 0;
        
        for($i = 1; $i < 10; $i++){
            for($j = 1; $j <10; $j++){
                if($ban[$i][$j] != 0){
                    $koma = $ban[$i][$j];
                    
                    switch($koma){
                        case 1:					//ๆญฉ
                            if($ban[$i - 1][$j] == 14){
                                echo 'player1ใ็ๆ' . "\n";
                            }
                            break;
	    	            case 3:					//ๆก
                            if($ban[$i - 2][$j + 1] == 14){
                                echo 'player1ใ็ๆ' . "\n";
                            }elseif($ban[$i - 2][$j - 1] == 14){
                                echo 'player1ใ็ๆ' . "\n";
                            }
                            break;
            		    case 4:					//้
                            if($ban[$i - 1][$j] == 14){
                                echo 'player1ใ็ๆ' . "\n";
                            }elseif($ban[$i - 1][$j + 1] == 14){
	            	            echo 'player1ใ็ๆ' . "\n";
                            }elseif($ban[$i - 1][$j - 1] == 14){
	    	                    echo 'player1ใ็ๆ' . "\n";
                            }elseif($ban[$i + 1][$j + 1] == 14){
	            	            echo 'player1ใ็ๆ' . "\n";
                            }elseif($ban[$i + 1][$j - 1] == 14){
	    	                    echo 'player1ใ็ๆ' . "\n";
                            }
                            break;
    	        	    case 5:					//้
                            if($ban[$i - 1][$j] == 14){
                                echo 'player1ใ็ๆ' . "\n";
                            }elseif($ban[$i][$j + 1] == 14){
	            	            echo 'player1ใ็ๆ' . "\n";
                            }elseif($ban[$i][$j - 1] == 14){
	    	                    echo 'player1ใ็ๆ' . "\n";
                            }elseif($ban[$i - 1][$j + 1] == 14){
	            	            echo 'player1ใ็ๆ' . "\n";
                            }elseif($ban[$i - 1][$j - 1] == 14){
	    	                    echo 'player1ใ็ๆ' . "\n";
                            }elseif($ban[$i + 1][$j] == 14){
	            	            echo 'player1ใ็ๆ' . "\n";
                            }
                            break;
    	        	    case 6:					//็
                            if($ban[$i - 1][$j] == 14){
                                echo 'player1ใ็ๆ' . "\n";
                            }elseif($ban[$i][$j + 1] == 14){
	            	            echo 'player1ใ็ๆ' . "\n";
                            }elseif($ban[$i][$j - 1] == 14){
	    	                    echo 'player1ใ็ๆ' . "\n";
                            }elseif($ban[$i - 1][$j + 1] == 14){
	            	            echo 'player1ใ็ๆ' . "\n";
                            }elseif($ban[$i - 1][$j - 1] == 14){
	    	                    echo 'player1ใ็ๆ' . "\n";
                            }elseif($ban[$i + 1][$j + 1] == 14){
	            	            echo 'player1ใ็ๆ' . "\n";
                            }elseif($ban[$i + 1][$j - 1] == 14){
	    	                    echo 'player1ใ็ๆ' . "\n";
                            }elseif($ban[$i + 1][$j] == 14){
	            	            echo 'player1ใ็ๆ' . "\n";
                            }
                            break;

            		    case 9:					//ใต
                            if($ban[$i + 1][$j] == 6){
                                echo 'player2ใ็ๆ' . "\n";
                            }
                            break;
    	        	    case 14:					//๏ฝต๏ฝณ
                            if($ban[$i + 1][$j] == 6){
                                echo 'player2ใ็ๆ' . "\n";
                            }elseif($ban[$i + 1][$j - 1] == 6){
		                        echo 'player2ใ็ๆ' . "\n";
                            }elseif($ban[$i + 1][$j + 1] == 6){
		                        echo 'player2ใ็ๆ' . "\n";
                            }elseif($ban[$i][$j + 1] == 6){
		                        echo 'player2ใ็ๆ' . "\n";
                            }elseif($ban[$i][$j - 1] == 6){
		                        echo 'player2ใ็ๆ' . "\n";
                            }elseif($ban[$i - 1][$j + 1] == 6){
		                        echo 'player2ใ็ๆ' . "\n";
                            }elseif($ban[$i - 1][$j - 1] == 6){
		                        echo 'player2ใ็ๆ' . "\n";
                            }elseif($ban[$i - 1][$j] == 6){
		                        echo 'player2ใ็ๆ' . "\n";
                            }
                            break;
            		    case 13:					//๏ฝท๏พ
                            if($ban[$i + 1][$j] == 6){
                                echo 'player2ใ็ๆ' . "\n";
                            }elseif($ban[$i][$j - 1] == 6){
	            	            echo 'player2ใ็ๆ' . "\n";
                            }elseif($ban[$i][$j + 1] == 6){
	    	                    echo 'player2ใ็ๆ' . "\n";
                            }elseif($ban[$i + 1][$j + 1] == 6){
	            	            echo 'player2ใ็ๆ' . "\n";
                            }elseif($ban[$i + 1][$j - 1] == 6){
    		                    echo 'player2ใ็ๆ' . "\n";
                            }elseif($ban[$i - 1][$j] == 6){
		                        echo 'player2ใ็ๆ' . "\n";
                            }
                            break;
	            	    case 12:					//๏ฝท๏พ๏พ
                            if($ban[$i + 1][$j] == 6){
                                echo 'player2ใ็ๆ' . "\n";
                            }elseif($ban[$i + 1][$j + 1] == 6){
		                        echo 'player2ใ็ๆ' . "\n";
                            }elseif($ban[$i + 1][$j - 1] == 6){
	    	                    echo 'player2ใ็ๆ' . "\n";
                            }elseif($ban[$i - 1][$j + 1] == 6){
	            	            echo 'player2ใ็ๆ' . "\n";
                            }elseif($ban[$i - 1][$j - 1] == 6){
		                        echo 'player2ใ็ๆ' . "\n";
                            }
                            break;
    	        	    case 11:					//๏ฝน๏ฝฒ
                            if($ban[$i + 2][$j + 1] == 6){
                                echo 'player2ใ็ๆ' . "\n";
                            }elseif($ban[$i + 2][$j - 1] == 6){
                                echo 'player2ใ็ๆ' . "\n";
                            }
                            break;
                    
                        case 2:
                            $x = $i - 1;
                            while($x > 0){
                                if($ban[$x][$j] != 0){
                                    if($ban[$x][$j] == 14){
                                        echo 'player1ใ็ๆ' . "\n";
                                    }
                                    break;
                                }
                                $x--;
                            }
                            break;
            
                        case 7:
                        //ไธ
                            $x = $i - 1;
                            while($x > 0){
                                if($ban[$x][$j] != 0){
                                    if($ban[$x][$j] == 14){
                                        echo 'player1ใ็ๆ' . "\n";
                                    }
                                    break;
                                }
                                $x--;
                            }
                        
                        //ไธ
                            $x = $i + 1;
                            while($x < 10){
                                if($ban[$x][$j] != 0){
                                    if($ban[$x][$j] == 14){
                                        echo 'player1ใ็ๆ' . "\n";
                                    }
                                    break;
                                }
                                $x++;
                            }
                        
                        //ๅณ
                            $x = $j + 1;
                            while($x < 10){
                                if($ban[$i][$x] != 0){
                                    if($ban[$i][$x] == 14){
                                        echo 'player1ใ็ๆ' . "\n";
                                    }
                                    break;
                                }
                                $x++;
                            }
                        
                          //ๅทฆ
                            $x = $j - 1;
                            while($x > 0){
                                if($ban[$i][$x] != 0){
                                    if($ban[$i][$x] == 14){
                                        echo 'player1ใ็ๆ' . "\n";
                                    }
                                    break;
                                }
                                $x--;
                            }
                            break;
             
                        case 8:
                       //ๅณไธ
                            $x = $i - 1;
                            $y = $j + 1;
                            while($x > 0 && $y < 10){
                                if($ban[$x][$y] != 0){
                                    if($ban[$x][$y] == 14){
                                        echo 'player1ใ็ๆ' . "\n";
                                    }
                                    break;
                                }
                                $x--;
                                $y++;
                            }
                        
                        //ๅณไธ
                            $x = $i + 1;
                            $y = $j + 1;
                            while($x < 10 && $y < 10){
                                if($ban[$x][$y] != 0){
                                    if($ban[$x][$y] == 14){
                                        echo 'player1ใ็ๆ' . "\n";
                                    }
                                    break;
                                }
                                $x++;
                                $y++;
                            }
                       
                        //ๅทฆไธ
                            $x = $i - 1;
                            $y = $j - 1;
                            while($x > 0 && $y > 0){
                                if($ban[$x][$y] != 0){
                                    if($ban[$x][$y] == 14){
                                        echo 'player1ใ็ๆ' . "\n";
                                    }
                                    break;
                                }
                                $x--;
                                $y--;
                            }
                        
                       //ๅทฆไธ
                            $x = $i + 1;
                            $y = $j - 1;
                            while($x < 10 && $y > 0){
                                if($ban[$x][$y] != 0){
                                    if($ban[$x][$y] == 14){
                                        echo 'player1ใ็ๆ' . "\n";
                                    }
                                    break;
                                }
                                $x++;
                                $y--;
                            }
                            break;
            
                        case 15:
                    //ไธ
                            $x = $i - 1;
                            while($x > 0){
                                if($ban[$x][$j] != 0){
                                    if($ban[$x][$j] == 6){
                                        echo 'player2ใ็ๆ' . "\n";
                                    }
                                    break;
                                }
                                $x--;
                            }
                        
                        //ไธ
                            $x = $i + 1;
                            while($x < 10){
                                if($ban[$x][$j] != 0){
                                    if($ban[$x][$j] == 6){
                                        echo 'player2ใ็ๆ' . "\n";
                                    }
                                    break;
                                }
                                $x++;
                            }
                        
                        //ๅณ
                            $x = $j + 1;
                            while($x < 10){
                                if($ban[$i][$x] != 0){
                                    if($ban[$i][$x] == 6){
                                        echo 'player2ใ็ๆ' . "\n";
                                    }
                                    break;
                                }
                                $x++;
                            }
                        
                          //ๅทฆ
                            $x = $j - 1;
                            while($x > 0){
                                if($ban[$i][$x] != 0){
                                    if($ban[$i][$x] == 6){
                                        echo 'player2ใ็ๆ' . "\n";
                                    }
                                    break;
                                }
                                $x--;
                            }
                            break;
                
                        case 16:    
                    //ๅณไธ
                            $x = $i - 1;
                            $y = $j + 1;
                            while($x > 0 && $y < 10){
                                if($ban[$x][$y] != 0){
                                    if($ban[$x][$y] == 6){
                                        echo 'player2ใ็ๆ' . "\n";
                                    }
                                    break;
                                }
                                $x--;
                                $y++;
                            }
                        
                        //ๅณไธ
                            $x = $i + 1;
                            $y = $j + 1;
                            while($x < 10 && $y < 10){
                                if($ban[$x][$y] != 0){
                                    if($ban[$x][$y] == 6){
                                        echo 'player2ใ็ๆ' . "\n";
                                    }
                                    break;
                                }
                                $x++;
                                $y++;
                            }
                        
                        //ๅทฆไธ
                            $x = $i - 1;
                            $y = $j - 1;
                            while($x > 0 && $y > 0){
                                if($ban[$x][$y] != 0){
                                    if($ban[$x][$y] == 6){
                                        echo 'player2ใ็ๆ' . "\n";
                                    }
                                    break;
                                }
                                $x--;
                                $y--;
                            }
                        
                       //ๅทฆไธ
                            $x = $i + 1;
                            $y = $j - 1;
                            while($x < 10 && $y > 0){
                                if($ban[$x][$y] != 0){
                                    if($ban[$x][$y] == 6){
                                       echo 'player2ใ็ๆ' . "\n";
                                    }
                                    break;
                                }
                                $x++;
                                $y--;
                            }
                            break;
           
                        case 10:
                            $x = $i + 1;
                            while($x < 10){
                                if($ban[$x][$y] != 0){
                                    if($ban[$x][$y] == 6){
                                        echo 'player2ใ็ๆ' . "\n";
                                    }
                                    break;
                                }
                                $x++;
                            }
                            break;
                    }
                }
            }
        }
    }
}

try{
    $ban;
    $ban_ura;
    $ban_narikin;
    $check = true;
    $okiba1 = array(0,0,0,0,0,0,0,0,0,0,0);
    $okiba2 = array(0,0,0,0,0,0,0,0,0,0,0);
    $teban = true;
    
    $pr = new Prepare();
    $pr -> Show($ban);
    $l = new Limit();
    $m = new Move();
    $ju = new Judge();
    $pu = new Put();
    
    while(1){
        do{
            $a = 0;
            $b = -1;
            if($teban){
                echo 'player1ใ';
            }else{
                echo 'player2ใ';
            }
            echo '1ๅใใใ2็ฝฎใใ3็คใ่กจ็คบ' . "\n";
            fscanf(STDIN, '%d %d' , $a,$b);
            if($b == -1){
                if($a == 1){
                    $m -> move_koma();
                }elseif($a == 2){
                    $pu -> put_koma();
                }elseif($a == 3){
                    $pr -> Show($ban);
                    $check = false;
                }else{
                    $check = false;
                    echo("ใใไธๅบฆๅฅๅใใฆใใ ใใใ"."\n");
                }
            }else{
                $check = false;
                echo("ใใไธๅบฆๅฅๅใใฆใใ ใใ๏ผ"."\n");
            }
        }while($check == false);
        $pr -> Show($ban);
        if($ju -> hantei($ban)){
            $ju -> oute();
            $teban = !($teban);
        }else{
            break; 
        }
    }
}catch(Exception $e){
    echo 'ใจใฉใผ';
}
?>