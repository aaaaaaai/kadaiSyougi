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
            echo 'エラー';
        }
    }
    
	function Show($ban)
    {
        try{
            global $okiba1, $okiba2;
            $k = new Koma();
            echo 'player2　';
            for($i = 1; $i < count($okiba2); $i++)
                echo $k -> show_koma($okiba2[$i]);
            echo "\n";
            echo '�托ｼ抵ｼ難ｼ費ｼ包ｼ厄ｼ暦ｼ假ｼ�'."\n";
            echo '__________________'. "\n";
            for($x = 1;$x < 10;$x++){
                for($y = 1;$y < 10;$y++){
                    $k -> show_koma($ban[$x][$y]);
                }
                echo ('|');
                echo ($x + 0);
                echo ("\n");
            }
            echo ('�｣�｣�｣�｣�｣�｣�｣�｣�｣' . "\n");
            echo 'player1　';
            for($j = 1; $j < count($okiba1); $j++)
                echo $k -> show_koma($okiba1[$j]);
            echo "\n";
        }catch(Exception $e){
            echo 'エラー';
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
                    echo ('繝ｻ');
                    break;
                case 1:
                    echo ("豁ｩ");
                    break;
    		    case 2:
                    echo ("鬥�");
                    break;
		        case 3:
                    echo ("桂");
                    break;
	    	    case 4:
                    echo ("銀");
                    break;
    		    case 5:
                    echo ("金");
                    break;
		        case 6:
                    echo ("王");
                    break;
    		    case 7:
                    echo ("飛");
                    break;
		        case 8:
                    echo ("角");
                    break;
    		    case 9:
                    echo ("フ");
                    break;
		        case 10:
                    echo ("ｷｮ");
                    break;
    		    case 11:
                    echo ("ｹｲ");
                    break;
		        case 12:
                    echo ("ｷﾞ");
                    break;
    		    case 13:
                    echo ("ｷﾝ");
                    break;
    		    case 14:
                    echo ("ｵｳ");
                    break;
	    	    case 15:
                    echo ("ﾋｼ");
                    break;
    		    case 16:
                    echo ("ｶｸ");
                    break;
            }
        }catch(Exception $e){
            echo 'エラー';
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
        
            echo '行と列を入力してください。' ."\n";
            fscanf(STDIN, '%d %d', $a, $b);
            echo '行と列を入力してください。' ."\n";
            fscanf(STDIN, '%d %d', $c, $d);
            
            if($a > 0 && $b > 0 && $c > 0 && $d > 0){
                $koma = $ban[$a][$b];
      
                if($teban){
                    if($koma > 8 || $koma == 0){
                        echo 'それは移動できません。' ."\n";
                        $check = false;
                    }
                }else{
                    if($koma < 9 || $koma == 0){
                        echo 'それは移動できません。' ."\n";
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
                echo '入力がありません。' ."\n";
                $check = false;
            }
        }catch(Exception $e){
            echo 'エラー２';
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
        
            echo '行と列を入力してください。' ."\n";
            fscanf(STDIN, '%d %d', $c, $d);
            echo '列を入力してください。' ."\n";
            fscanf(STDIN, '%d', $a);
        
            if($c > 0 && $d > 0 && $a > 0){
                if($teban){
                    if($ban[$c][$d] != 0){
                        $check = false;
                        echo '置けません' . "\n";
                    }elseif($okiba1[$a] == 1){
                        for($i = 1; $i < 10; $i++){
                            if($ban[$i][$d] == 1){
                                $check = false;
                                echo '二歩です。' . "\n";
                                continue;
                            }
                        }
                        if($c == 1){
                            $check = false;
                            echo '移動できないので置けません。' . "\n";
                        }else{
                            $ban[$c][$d] = $okiba1[$a];
                            $ban_narikin[$c][$d] = $okiba1[$a];
                            $okiba1[$a] = 0;
                            $ban_ura[$c][$d] = player1;
                            $check = true;
                        }
                    }elseif($okiba1[$a] == 0){
                        $check = false;
                        echo '駒がありません。' . "\n";
                    }elseif($okiba1[$a] == 3){
                        if($c == 1){
                            $check = false;
                            echo '移動できないので置けません。' . "\n";
                        }elseif($c == 2){
                            $check = false;
                            echo '移動できないので置けません。' . "\n";
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
                        echo '置けません' . "\n";
                    }elseif($okiba2[$a] == 9){
                        for($i = 1; $i < 10; $i++){
                            if($ban[$i][$d] == 9){
                                $check = false;
                                echo '二歩です。' . "\n";
                                continue;
                            }
                        }
                        if($c == 9){
                            $check = false;
                            echo '移動できないので置けません。' . "\n";
                        }else{
                            $ban[$c][$d] = $okiba2[$a];
                            $ban_narikin[$c][$d] = $okiba2[$a];
                            $okiba2[$a] = 0;
                            $ban_ura[$c][$d] = player2;
                            $check = true;
                        }
                    }elseif($okiba2[$a] == 0){
                        $check = false;
                        echo '駒がありません。' . "\n";
                    }elseif($okiba2[$a] == 11){
                        if($c == 9){
                            $check = false;
                            echo '移動できないので置けません。' . "\n";
                        }elseif($c == 8){
                            $check = false;
                            echo '移動できないので置けません。' . "\n";
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
                echo '入力が間違っています。' . "\n";
                $check = false;
            }
        }catch(Exception $e){
            echo 'エラー';
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
                case 1:					//歩
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
                            echo '移動できません。' . "\n";
                            $check = false;
                        }
                    }else{
                        echo '移動できません。' . "\n";
                        $check = false;
                    }
                    break;
	    	    case 3:					//桂
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
                            echo '移動できません。' . "\n";
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
                            echo '移動できません。' . "\n";
                            $check = false;
                        }
                    }else{
                        echo '移動できません。' . "\n";
                        $check = false;
                    }
                    break;
    		    case 4:					//銀
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
                            echo '移動できません。' . "\n";
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
                            echo '移動できません。' . "\n";
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
                            echo '移動できません。' . "\n";
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
                            echo '移動できません。' . "\n";
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
                            echo '移動できません。' . "\n";
                            $check = false;
                        }
                    }else{
                        echo '移動できません。' . "\n";
                        $check = false;
                    }
                    break;
    		    case 5:					//金
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
                            echo '移動できません。' . "\n";
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
                            echo '移動できません。' . "\n";
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
                            echo '移動できません。' . "\n";
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
                            echo '移動できません。' . "\n";
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
                            echo '移動できません。' . "\n";
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
                            echo '移動できません。' . "\n";
                            $check = false;
                        }
                    }else{
                        echo '移動できません。' . "\n";
                        $check = false;
                    }
                    break;
    		    case 6:					//王
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
                            echo '移動できません。' . "\n";
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
                            echo '移動できません。' . "\n";
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
                            echo '移動できません。' . "\n";
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
                            echo '移動できません。' . "\n";
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
                            echo '移動できません。' . "\n";
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
                            echo '移動できません。' . "\n";
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
                            echo '移動できません。' . "\n";
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
                            echo '移動できません。' . "\n";
                            $check = false;
                        }
                    }else{
                        echo '移動できません。' . "\n";
                        $check = false;
                    }
                    break;

    		    case 9:					//ふ
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
                            echo '移動できません。' . "\n";
                            $check = false;
                        }
                    }else{
                        echo '移動できません。' . "\n";
                        $check = false;
                    }
                    break;
    		    case 14:					//ｵｳ
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
                            echo '移動できません。' . "\n";
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
                            echo '移動できません。' . "\n";
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
                            echo '移動できません。' . "\n";
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
                            echo '移動できません。' . "\n";
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
                            echo '移動できません。' . "\n";
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
                           echo '移動できません。' . "\n";
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
                            echo '移動できません。' . "\n";
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
                            echo '移動できません。' . "\n";
                            $check = false;
                        }
                    }else{
                        echo '移動できません。' . "\n";
                        $check = false;
                    }
                    break;
    		    case 13:					//ｷﾝ
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
                            echo '移動できません。' . "\n";
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
                            echo '移動できません。' . "\n";
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
                            echo '移動できません。' . "\n";
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
                            echo '移動できません。' . "\n";
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
                            echo '移動できません。' . "\n";
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
                            echo '移動できません。' . "\n";
                            $check = false;
                        }
                    }else{
                        echo '移動できません。' . "\n";
                        $check = false;
                    }
                    break;
	    	    case 12:					//ｷﾞﾝ
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
                            echo '移動できません。' . "\n";
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
                            echo '移動できません。' . "\n";
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
                            echo '移動できません。' . "\n";
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
                            echo '移動できません。' . "\n";
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
                            echo '移動できません。' . "\n";
                            $check = false;
                        }
                    }else{
                        echo '移動できません。' . "\n";
                        $check = false;
                    }
                    break;
    		    case 11:					//ｹｲ
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
                            echo '移動できません。' . "\n";
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
                            echo '移動できません。' . "\n";
                            $check = false;
                        }
                    }else{
                        echo '移動できません。' . "\n";
                        $check = false;
                    }
                    break;
            }
        }catch(Exception $e){
            echo 'エラー3';
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
                                echo '移動できません。' . "\n";
                                $check = false;
                                break;
                            }elseif($count > 1){
                                echo '移動できません。' . "\n";
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
                        echo '移動できません。' . "\n";
                        $check = false;
                    }
                    break;
            
                case 7:
                    if($c < $a && $d == $b){    //上
                        $x = $a - 1;
                        while($x >= $c){
                            if($ban[$x][$d] != 0)
                                $count++;
                            $x--;
                        }
                        if($count != 0){
                            if(($ban_ura[$c][$d] == 0) || ($ban_ura[$c][$d] == player1)){
                                echo '移動できません。' . "\n";
                                $check = false;
                                break;
                            }elseif($count > 1){
                                echo '移動できません。' . "\n";
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
                    }elseif($c > $a && $d == $b){    //下
                        $x = $a + 1;
                        while($x <= $c){
                            if($ban[$x][$d] != 0)
                                $count++;
                            $x++;
                        }
                        if($count != 0){
                            if(($ban_ura[$c][$d] == 0) || ($ban_ura[$c][$d] == player1)){
                                echo '移動できません。' . "\n";
                                $check = false;
                                break;
                            }elseif($count > 1){
                                echo '移動できません。' . "\n";
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
                    }elseif($c == $a && $d > $b){    //右
                        $x = $b + 1;
                        while($x <= $d){
                            if($ban[$c][$x] != 0)
                                $count++;
                            $x++;
                        }
                        if($count != 0){
                            if(($ban_ura[$c][$d] == 0) || ($ban_ura[$c][$d] == player1)){
                                echo '移動できません。' . "\n";
                                $check = false;
                                break;
                            }elseif($count > 1){
                                echo '移動できません。' . "\n";
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
                    }elseif($c == $a && $d < $b){    //左
                        $x = $b - 1;
                        while($x >= $d){
                            if($ban[$c][$x] != 0)
                                $count++;
                            $x--;
                        }
                        if($count != 0){
                            if(($ban_ura[$c][$d] == 0) || ($ban_ura[$c][$d] == player1)){
                                echo '移動できません。' . "\n";
                                $check = false;
                                break;
                            }elseif($count > 1){
                                echo '移動できません。' . "\n";
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
                        echo '移動できません。' . "\n";
                        $check = false;
                    }
                    break;
             
                case 8:
                    if((($c - $a) != ($d - $b)) && (($a - $c) != ($d - $b))){
                        echo '移動できません。' . "\n";
                        $check = false;
                        break;
                    }
            
                    if($c < $a && $d > $b){    //右上
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
                                echo '移動できません。' . "\n";
                                $check = false;
                                break;
                            }elseif($count > 1){
                                echo '移動できません。' . "\n";
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
                    }elseif($c > $a && $d > $b){    //右下
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
                                echo '移動できません。' . "\n";
                                $check = false;
                                break;
                            }elseif($count > 1){
                                echo '移動できません。' . "\n";
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
                    }elseif($c < $a && $d < $b){    //左上
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
                                echo '移動できません。' . "\n";
                                $check = false;
                                break;
                            }elseif($count > 1){
                                echo '移動できません。' . "\n";
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
                    }elseif($c > $a && $d < $b){    //左下
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
                                echo '移動できません。' . "\n";
                                $check = false;
                                break;
                            }elseif($count > 1){
                                echo '移動できません。' . "\n";
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
                        echo '移動できません。' . "\n";
                        $check = false;
                    }
                    break;
            
                case 15:
                    if($c < $a && $d == $b){    //上
                        $x = $a - 1;
                        while($x >= $c){
                            if($ban[$x][$d] != 0)
                                $count++;
                            $x--;
                        }
                        if($count != 0){
                            if(($ban_ura[$c][$d] == 0) || ($ban_ura[$c][$d] == player2)){
                                echo '移動できません。' . "\n";
                                $check = false;
                                break;
                            }elseif($count > 1){
                                echo '移動できません。' . "\n";
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
                    }elseif($c > $a && $d == $b){    //下
                        $x = $a + 1;
                        while($x <= $c){
                            if($ban[$x][$d] != 0)
                                $count++;
                            $x++;
                        }
                        if($count != 0){
                            if(($ban_ura[$c][$d] == 0) || ($ban_ura[$c][$d] == player2)){
                                echo '移動できません。' . "\n";
                                $check = false;
                                break;
                            }elseif($count > 1){
                                echo '移動できません。' . "\n";
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
                    }elseif($c == $a && $d > $b){    //右
                        $x = $b + 1;
                        while($x <= $d){
                            if($ban[$c][$x] != 0)
                                $count++;
                            $x++;
                        }
                        if($count != 0){
                            if(($ban_ura[$c][$d] == 0) || ($ban_ura[$c][$d] == player2)){
                                echo '移動できません。' . "\n";
                                $check = false;
                                break;
                            }elseif($count > 1){
                                echo '移動できません。' . "\n";
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
                    }elseif($c == $a && $d < $b){    //左
                        $x = $b - 1;
                        while($x >= $d){
                            if($ban[$c][$x] != 0)
                                $count++;
                            $x--;
                        }
                        if($count != 0){
                            if(($ban_ura[$c][$d] == 0) || ($ban_ura[$c][$d] == player2)){
                                echo '移動できません。' . "\n";
                                $check = false;
                                break;
                            }elseif($count > 1){
                                echo '移動できません。' . "\n";
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
                        echo '移動できません。' . "\n";
                        $check = false;
                    }
                    break;
                
                case 16:    
                    if((($c - $a) != ($d - $b)) && (($a - $c) != ($d - $b))){
                        echo '移動できません。' . "\n";
                        $check = false;
                        break;
                    }
            
                    if($c < $a && $d > $b){    //右上
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
                                echo '移動できません。' . "\n";
                                $check = false;
                                break;
                            }elseif($count > 1){
                                echo '移動できません。' . "\n";
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
                    }elseif($c > $a && $d > $b){    //右下
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
                                echo '移動できません。' . "\n";
                                $check = false;
                                break;
                            }elseif($count > 1){
                                echo '移動できません。' . "\n";
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
                    }elseif($c < $a && $d < $b){    //左上
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
                                echo '移動できません。' . "\n";
                                $check = false;
                                break;
                            }elseif($count > 1){
                                echo '移動できません。' . "\n";
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
                    }elseif($c > $a && $d < $b){    //左下
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
                                echo '移動できません。' . "\n";
                                $check = false;
                                break;
                            }elseif($count > 1){
                                echo '移動できません。' . "\n";
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
                        echo '移動できません。' . "\n";
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
                                echo '移動できません。' . "\n";
                                $check = false;
                                break;
                            }elseif($count > 1){
                                echo '移動できません。' . "\n";
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
                        echo '移動できません。' . "\n";
                        $check = false;
                    }
                    break;
                }
            }catch(Exception $e){
                echo 'エラー';
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
        echo 'なりますか？　1はい　2いいえ' . "\n";
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
            echo '入力が間違っています。' . "\n";
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
                    echo 'player1の勝利' . "\n";
                }else{
                    echo 'player2の勝利' . "\n";
                }
                return false;
            }
        }catch(Exception $e){
        echo 'エラー';
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
                        case 1:					//歩
                            if($ban[$i - 1][$j] == 14){
                                echo 'player1が王手' . "\n";
                            }
                            break;
	    	            case 3:					//桂
                            if($ban[$i - 2][$j + 1] == 14){
                                echo 'player1が王手' . "\n";
                            }elseif($ban[$i - 2][$j - 1] == 14){
                                echo 'player1が王手' . "\n";
                            }
                            break;
            		    case 4:					//銀
                            if($ban[$i - 1][$j] == 14){
                                echo 'player1が王手' . "\n";
                            }elseif($ban[$i - 1][$j + 1] == 14){
	            	            echo 'player1が王手' . "\n";
                            }elseif($ban[$i - 1][$j - 1] == 14){
	    	                    echo 'player1が王手' . "\n";
                            }elseif($ban[$i + 1][$j + 1] == 14){
	            	            echo 'player1が王手' . "\n";
                            }elseif($ban[$i + 1][$j - 1] == 14){
	    	                    echo 'player1が王手' . "\n";
                            }
                            break;
    	        	    case 5:					//金
                            if($ban[$i - 1][$j] == 14){
                                echo 'player1が王手' . "\n";
                            }elseif($ban[$i][$j + 1] == 14){
	            	            echo 'player1が王手' . "\n";
                            }elseif($ban[$i][$j - 1] == 14){
	    	                    echo 'player1が王手' . "\n";
                            }elseif($ban[$i - 1][$j + 1] == 14){
	            	            echo 'player1が王手' . "\n";
                            }elseif($ban[$i - 1][$j - 1] == 14){
	    	                    echo 'player1が王手' . "\n";
                            }elseif($ban[$i + 1][$j] == 14){
	            	            echo 'player1が王手' . "\n";
                            }
                            break;
    	        	    case 6:					//王
                            if($ban[$i - 1][$j] == 14){
                                echo 'player1が王手' . "\n";
                            }elseif($ban[$i][$j + 1] == 14){
	            	            echo 'player1が王手' . "\n";
                            }elseif($ban[$i][$j - 1] == 14){
	    	                    echo 'player1が王手' . "\n";
                            }elseif($ban[$i - 1][$j + 1] == 14){
	            	            echo 'player1が王手' . "\n";
                            }elseif($ban[$i - 1][$j - 1] == 14){
	    	                    echo 'player1が王手' . "\n";
                            }elseif($ban[$i + 1][$j + 1] == 14){
	            	            echo 'player1が王手' . "\n";
                            }elseif($ban[$i + 1][$j - 1] == 14){
	    	                    echo 'player1が王手' . "\n";
                            }elseif($ban[$i + 1][$j] == 14){
	            	            echo 'player1が王手' . "\n";
                            }
                            break;

            		    case 9:					//ふ
                            if($ban[$i + 1][$j] == 6){
                                echo 'player2が王手' . "\n";
                            }
                            break;
    	        	    case 14:					//ｵｳ
                            if($ban[$i + 1][$j] == 6){
                                echo 'player2が王手' . "\n";
                            }elseif($ban[$i + 1][$j - 1] == 6){
		                        echo 'player2が王手' . "\n";
                            }elseif($ban[$i + 1][$j + 1] == 6){
		                        echo 'player2が王手' . "\n";
                            }elseif($ban[$i][$j + 1] == 6){
		                        echo 'player2が王手' . "\n";
                            }elseif($ban[$i][$j - 1] == 6){
		                        echo 'player2が王手' . "\n";
                            }elseif($ban[$i - 1][$j + 1] == 6){
		                        echo 'player2が王手' . "\n";
                            }elseif($ban[$i - 1][$j - 1] == 6){
		                        echo 'player2が王手' . "\n";
                            }elseif($ban[$i - 1][$j] == 6){
		                        echo 'player2が王手' . "\n";
                            }
                            break;
            		    case 13:					//ｷﾝ
                            if($ban[$i + 1][$j] == 6){
                                echo 'player2が王手' . "\n";
                            }elseif($ban[$i][$j - 1] == 6){
	            	            echo 'player2が王手' . "\n";
                            }elseif($ban[$i][$j + 1] == 6){
	    	                    echo 'player2が王手' . "\n";
                            }elseif($ban[$i + 1][$j + 1] == 6){
	            	            echo 'player2が王手' . "\n";
                            }elseif($ban[$i + 1][$j - 1] == 6){
    		                    echo 'player2が王手' . "\n";
                            }elseif($ban[$i - 1][$j] == 6){
		                        echo 'player2が王手' . "\n";
                            }
                            break;
	            	    case 12:					//ｷﾞﾝ
                            if($ban[$i + 1][$j] == 6){
                                echo 'player2が王手' . "\n";
                            }elseif($ban[$i + 1][$j + 1] == 6){
		                        echo 'player2が王手' . "\n";
                            }elseif($ban[$i + 1][$j - 1] == 6){
	    	                    echo 'player2が王手' . "\n";
                            }elseif($ban[$i - 1][$j + 1] == 6){
	            	            echo 'player2が王手' . "\n";
                            }elseif($ban[$i - 1][$j - 1] == 6){
		                        echo 'player2が王手' . "\n";
                            }
                            break;
    	        	    case 11:					//ｹｲ
                            if($ban[$i + 2][$j + 1] == 6){
                                echo 'player2が王手' . "\n";
                            }elseif($ban[$i + 2][$j - 1] == 6){
                                echo 'player2が王手' . "\n";
                            }
                            break;
                    
                        case 2:
                            $x = $i - 1;
                            while($x > 0){
                                if($ban[$x][$j] != 0){
                                    if($ban[$x][$j] == 14){
                                        echo 'player1が王手' . "\n";
                                    }
                                    break;
                                }
                                $x--;
                            }
                            break;
            
                        case 7:
                        //上
                            $x = $i - 1;
                            while($x > 0){
                                if($ban[$x][$j] != 0){
                                    if($ban[$x][$j] == 14){
                                        echo 'player1が王手' . "\n";
                                    }
                                    break;
                                }
                                $x--;
                            }
                        
                        //下
                            $x = $i + 1;
                            while($x < 10){
                                if($ban[$x][$j] != 0){
                                    if($ban[$x][$j] == 14){
                                        echo 'player1が王手' . "\n";
                                    }
                                    break;
                                }
                                $x++;
                            }
                        
                        //右
                            $x = $j + 1;
                            while($x < 10){
                                if($ban[$i][$x] != 0){
                                    if($ban[$i][$x] == 14){
                                        echo 'player1が王手' . "\n";
                                    }
                                    break;
                                }
                                $x++;
                            }
                        
                          //左
                            $x = $j - 1;
                            while($x > 0){
                                if($ban[$i][$x] != 0){
                                    if($ban[$i][$x] == 14){
                                        echo 'player1が王手' . "\n";
                                    }
                                    break;
                                }
                                $x--;
                            }
                            break;
             
                        case 8:
                       //右上
                            $x = $i - 1;
                            $y = $j + 1;
                            while($x > 0 && $y < 10){
                                if($ban[$x][$y] != 0){
                                    if($ban[$x][$y] == 14){
                                        echo 'player1が王手' . "\n";
                                    }
                                    break;
                                }
                                $x--;
                                $y++;
                            }
                        
                        //右下
                            $x = $i + 1;
                            $y = $j + 1;
                            while($x < 10 && $y < 10){
                                if($ban[$x][$y] != 0){
                                    if($ban[$x][$y] == 14){
                                        echo 'player1が王手' . "\n";
                                    }
                                    break;
                                }
                                $x++;
                                $y++;
                            }
                       
                        //左上
                            $x = $i - 1;
                            $y = $j - 1;
                            while($x > 0 && $y > 0){
                                if($ban[$x][$y] != 0){
                                    if($ban[$x][$y] == 14){
                                        echo 'player1が王手' . "\n";
                                    }
                                    break;
                                }
                                $x--;
                                $y--;
                            }
                        
                       //左下
                            $x = $i + 1;
                            $y = $j - 1;
                            while($x < 10 && $y > 0){
                                if($ban[$x][$y] != 0){
                                    if($ban[$x][$y] == 14){
                                        echo 'player1が王手' . "\n";
                                    }
                                    break;
                                }
                                $x++;
                                $y--;
                            }
                            break;
            
                        case 15:
                    //上
                            $x = $i - 1;
                            while($x > 0){
                                if($ban[$x][$j] != 0){
                                    if($ban[$x][$j] == 6){
                                        echo 'player2が王手' . "\n";
                                    }
                                    break;
                                }
                                $x--;
                            }
                        
                        //下
                            $x = $i + 1;
                            while($x < 10){
                                if($ban[$x][$j] != 0){
                                    if($ban[$x][$j] == 6){
                                        echo 'player2が王手' . "\n";
                                    }
                                    break;
                                }
                                $x++;
                            }
                        
                        //右
                            $x = $j + 1;
                            while($x < 10){
                                if($ban[$i][$x] != 0){
                                    if($ban[$i][$x] == 6){
                                        echo 'player2が王手' . "\n";
                                    }
                                    break;
                                }
                                $x++;
                            }
                        
                          //左
                            $x = $j - 1;
                            while($x > 0){
                                if($ban[$i][$x] != 0){
                                    if($ban[$i][$x] == 6){
                                        echo 'player2が王手' . "\n";
                                    }
                                    break;
                                }
                                $x--;
                            }
                            break;
                
                        case 16:    
                    //右上
                            $x = $i - 1;
                            $y = $j + 1;
                            while($x > 0 && $y < 10){
                                if($ban[$x][$y] != 0){
                                    if($ban[$x][$y] == 6){
                                        echo 'player2が王手' . "\n";
                                    }
                                    break;
                                }
                                $x--;
                                $y++;
                            }
                        
                        //右下
                            $x = $i + 1;
                            $y = $j + 1;
                            while($x < 10 && $y < 10){
                                if($ban[$x][$y] != 0){
                                    if($ban[$x][$y] == 6){
                                        echo 'player2が王手' . "\n";
                                    }
                                    break;
                                }
                                $x++;
                                $y++;
                            }
                        
                        //左上
                            $x = $i - 1;
                            $y = $j - 1;
                            while($x > 0 && $y > 0){
                                if($ban[$x][$y] != 0){
                                    if($ban[$x][$y] == 6){
                                        echo 'player2が王手' . "\n";
                                    }
                                    break;
                                }
                                $x--;
                                $y--;
                            }
                        
                       //左下
                            $x = $i + 1;
                            $y = $j - 1;
                            while($x < 10 && $y > 0){
                                if($ban[$x][$y] != 0){
                                    if($ban[$x][$y] == 6){
                                       echo 'player2が王手' . "\n";
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
                                        echo 'player2が王手' . "\n";
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
                echo 'player1　';
            }else{
                echo 'player2　';
            }
            echo '1動かす　2置く　3盤を表示' . "\n";
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
                    echo("もう一度入力してください。"."\n");
                }
            }else{
                $check = false;
                echo("もう一度入力してください！"."\n");
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
    echo 'エラー';
}
?>