<?php

const player1 = 1;
const player2 = 2;

class Prepare
{
    function Prepare()
    {
	    global $ban, $ban_ura;
	    $ban = array(
	        array(10,11,12,13,14,13,12,11,10)
	        ,8 =>array(2,3,4,5,6,5,4,3,2)
	    );
	    $ban_ura = array(
	        array(2,2,2,2,2,2,2,2,2)
	        ,8 => array(1,1,1,1,1,1,1,1,1)
	    );

        for($x = 1;$x < 8;$x++){
            for($y = 0;$y < 9;$y++){
                if($x == 6){
                    $ban[$x][$y] = 1;
                    $ban_ura[$x][$y] = 1;
                }elseif($x == 7 && $y == 1){
                    $ban[$x][$y] = 7;
                    $ban_ura[$x][$y] = 1;
                }elseif($x == 7 && $y == 7){
                    $ban[$x][$y] = 8;
                    $ban_ura[$x][$y] = 1;
                }elseif($x == 2)	   {
                    $ban[$x][$y] = 9;
                    $ban_ura[$x][$y] = 2;
                }elseif($x == 1 && $y == 7){
                    $ban[$x][$y] = 15;
                    $ban_ura[$x][$y] = 2;
                }elseif($x == 1 && $y == 1){
                    $ban[$x][$y] = 16;
                    $ban_ura[$x][$y] = 2;
                }else{
		            $ban[$x][$y] = 0;
		            $ban_ura[$x][$y] = 0;
                }
            }
        }
    }
    
	function Show($ban)
    {
        global $okiba1, $okiba2;
        $k = new Koma();
        echo 'player2　';
        for($i = 0; $i < count($okiba2); $i++)
            echo $k -> show_koma($okiba2[$i]);
        echo "\n";
        echo '０１２３４５６７８'."\n";
        echo '__________________'. "\n";
        for($x = 0;$x < 9;$x++){
            for($y = 0;$y < 9;$y++){
                $k -> show_koma($ban[$x][$y]);
            }
            echo ('|');
            echo ($x + 0);
            echo ("\n");
        }
        echo ('￣￣￣￣￣￣￣￣￣' . "\n");
        echo 'player1　';
        for($j = 0; $j < count($okiba1); $j++)
            echo $k -> show_koma($okiba1[$j]);
        echo "\n";
    }
}

class Koma
{
    function show_koma($koma)
    {
        switch($koma){
            case 0:
                echo ('・');
                break;
            case 1:
                echo ("歩");
                break;
		    case 2:
                echo ("香");
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
    }
}
	
class Move
{
    function move_koma()
    {
        global $ban, $l;
        $a = 0;
        $b = 0;
        $c = 0;
        $d = 0;
    
        try{
        echo '行と列を入力してください。' ."\n";
        fscanf(STDIN, '%d %d', $a, $b);
        echo '行と列を入力してください。' ."\n";
        fscanf(STDIN, '%d %d', $c, $d);
        
        $koma = $ban[$a][$b];
        
        if($koma != 2 && $koma != 7 && $koma != 8 && $koma != 10 && $koma != 15 && $koma != 16){
            $l -> limit1($koma, $a, $b, $c, $d);
        }else{
            $l -> limit2($koma, $a, $b, $c, $d);
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
        global $okiba1, $okiba2, $ban, $ban_ura, $teban, $check;
        
        echo '行と列を入力してください。' ."\n";
        fscanf(STDIN, '%d %d', $c, $d);
        
        if($teban){
            echo '列を入力してください。' ."\n";
            fscanf(STDIN, '%d', $a);
            if($ban[$c][$d] != 0){
                $check = false;
                echo '置けません' . "\n";
            }elseif($okiba1[$a] == 1){
                for($i = 0; $i < 9; $i++){
                    if($ban[$i][$d] == 1){
                        $check = false;
                        echo '二歩です。' . "\n";
                        continue;
                    }
                }
            }else{
                $ban[$c][$d] = $okiba1[$a];
                $okiba1[$a] = 0;
                $ban_ura[$c][$d] = player1;
                $check = true;
            }
        }else{
            echo '列を入力してください。' ."\n";
            fscanf(STDIN, '%d', $a);
            if($ban[$c][$d] != 0){
                $check = false;
                echo '置けません' . "\n";
            }elseif($okiba[$a] == 9){
                for($i = 0; $i < 9; $i++){
                    if($ban[$i][$d] == 9){
                        $check = false;
                        echo '二歩です。' . "\n";
                        continue;
                    }
                }
            }else{
                $ban[$c][$d] = $okiba2[$a];
                $okiba2[$a] = 0;
                $ban_ura[$c][$d] = player2;
                $check = true;
            }
        }
    }
}

class Limit
{
    function limit1($koma, $a, $b, $c, $d)
    {
        try{
        global $ban, $ban_ura, $m, $check, $okiba1, $okiba2;
        for($i = 0; $i < 10; $i++){
            if($okiba1[$i] == 0)
                break;
        }
        for($j = 0; $j < 10; $j++){
            if($okiba2[$j] == 0)
                break;
        }
        switch($koma){
            case 1:					//歩
                if($c == $a - 1 && $d == $b){
                    if($ban_ura[$c][$d] != player1){
                        if($ban_ura[$c][$d] == player2)
                            $okiba1[$i] = $ban[$c][$d] - 8;
                        if($c <= 2){
                            $ban[$c][$d] = 5;
                        }else{
                            $ban[$c][$d] = $ban[$a][$b];
                        }
                        $ban[$a][$b] = 0;
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
                            $okiba1[$i] = $ban[$c][$d] - 8;
                        if($c <= 2){
                        $ban[$c][$d] = 5;
                        }else{
                        $ban[$c][$d] = $ban[$a][$b];
                        }
                        $ban[$a][$b] = 0;
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
                            $okiba1[$i] = $ban[$c][$d] - 8;
                             if($c <= 2){
                        $ban[$c][$d] = 5;
                        }else{
                        $ban[$c][$d] = $ban[$a][$b];
                        }
                        $ban[$a][$b] = 0;
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
                            $okiba1[$i] = $ban[$c][$d] - 8;
                        if($c <= 2){
                        $ban[$c][$d] = 5;
                        }else{
                        $ban[$c][$d] = $ban[$a][$b];
                        }
                        $ban[$a][$b] = 0;
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
                            $okiba1[$i] = $ban[$c][$d] - 8;
                             if($c <= 2){
                        $ban[$c][$d] = 5;
                        }else{
                        $ban[$c][$d] = $ban[$a][$b];
                        }
                        $ban[$a][$b] = 0;
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
                            $okiba1[$i] = $ban[$c][$d] - 8;
                             if($c <= 2){
                        $ban[$c][$d] = 5;
                        }else{
                        $ban[$c][$d] = $ban[$a][$b];
                        }
                        $ban[$a][$b] = 0;
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
                            $okiba1[$i] = $ban[$c][$d] - 8;
                             if($c <= 2){
                        $ban[$c][$d] = 5;
                        }else{
                        $ban[$c][$d] = $ban[$a][$b];
                        }
                        $ban[$a][$b] = 0;
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
                            $okiba1[$i] = $ban[$c][$d] - 8;
                             if($c <= 2){
                        $ban[$c][$d] = 5;
                        }else{
                        $ban[$c][$d] = $ban[$a][$b];
                        }
                        $ban[$a][$b] = 0;
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
                            $okiba1[$i] = $ban[$c][$d] - 8;
                        $ban[$c][$d] = $ban[$a][$b];
                        $ban[$a][$b] = 0;
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
                            $okiba1[$i] = $ban[$c][$d] - 8;
                        $ban[$c][$d] = $ban[$a][$b];
                        $ban[$a][$b] = 0;
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
                            $okiba1[$i] = $ban[$c][$d] - 8;
                        $ban[$c][$d] = $ban[$a][$b];
                        $ban[$a][$b] = 0;
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
                            $okiba1[$i] = $ban[$c][$d] - 8;
                        $ban[$c][$d] = $ban[$a][$b];
                        $ban[$a][$b] = 0;
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
                            $okiba1[$i] = $ban[$c][$d] - 8;
                        $ban[$c][$d] = $ban[$a][$b];
                        $ban[$a][$b] = 0;
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
                            $okiba1[$i] = $ban[$c][$d] - 8;
                        $ban[$c][$d] = $ban[$a][$b];
                        $ban[$a][$b] = 0;
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
		    case 6:					//大
                if($c == $a - 1 && $d == $b){
                    if($ban_ura[$c][$d] != player1){
                        if($ban_ura[$c][$d] == player2)
                            $okiba1[$i] = $ban[$c][$d] - 8;
                        $ban[$c][$d] = $ban[$a][$b];
                        $ban[$a][$b] = 0;
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
                            $okiba1[$i] = $ban[$c][$d] - 8;
                        $ban[$c][$d] = $ban[$a][$b];
                        $ban[$a][$b] = 0;
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
                            $okiba1[$i] = $ban[$c][$d] - 8;
                        $ban[$c][$d] = $ban[$a][$b];
                        $ban[$a][$b] = 0;
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
                            $okiba1[$i] = $ban[$c][$d] - 8;
                        $ban[$c][$d] = $ban[$a][$b];
                        $ban[$a][$b] = 0;
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
                            $okiba1[$i] = $ban[$c][$d] - 8;
                        $ban[$c][$d] = $ban[$a][$b];
                        $ban[$a][$b] = 0;
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
                            $okiba1[$i] = $ban[$c][$d] - 8;
                        $ban[$c][$d] = $ban[$a][$b];
                        $ban[$a][$b] = 0;
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
                            $okiba1[$i] = $ban[$c][$d] - 8;
                        $ban[$c][$d] = $ban[$a][$b];
                        $ban[$a][$b] = 0;
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
                            $okiba1[$i] = $ban[$c][$d] - 8;
                        $ban[$c][$d] = $ban[$a][$b];
                        $ban[$a][$b] = 0;
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
                            $okiba2[$j] = $ban[$c][$d] + 8;
                        if($c >= 6){
                            $ban[$c][$d] = 13;
                        }else{
                            $ban[$c][$d] = $ban[$a][$b];
                        }
                        $ban[$a][$b] = 0;
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
                            $okiba2[$j] = $ban[$c][$d] + 8;
                        $ban[$c][$d] = $ban[$a][$b];
                        $ban[$a][$b] = 0;
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
                            $okiba2[$j] = $ban[$c][$d] + 8;
                        $ban[$c][$d] = $ban[$a][$b];
                        $ban[$a][$b] = 0;
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
                            $okiba2[$j] = $ban[$c][$d] + 8;
                        $ban[$c][$d] = $ban[$a][$b];
                        $ban[$a][$b] = 0;
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
                            $okiba2[$j] = $ban[$c][$d] + 8;
                        $ban[$c][$d] = $ban[$a][$b];
                        $ban[$a][$b] = 0;
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
                            $okiba2[$j] = $ban[$c][$d] + 8;
                        $ban[$c][$d] = $ban[$a][$b];
                        $ban[$a][$b] = 0;
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
                            $okiba2[$j] = $ban[$c][$d] + 8;
                        $ban[$c][$d] = $ban[$a][$b];
                        $ban[$a][$b] = 0;
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
                            $okiba2[$j] = $ban[$c][$d] + 8;
                        $ban[$c][$d] = $ban[$a][$b];
                        $ban[$a][$b] = 0;
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
                            $okiba2[$j] = $ban[$c][$d] + 8;
                        $ban[$c][$d] = $ban[$a][$b];
                        $ban[$a][$b] = 0;
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
                            $okiba2[$j] = $ban[$c][$d] + 8;
                        $ban[$c][$d] = $ban[$a][$b];
                        $ban[$a][$b] = 0;
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
                            $okiba2[$j] = $ban[$c][$d] + 8;
                        $ban[$c][$d] = $ban[$a][$b];
                        $ban[$a][$b] = 0;
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
                            $okiba2[$j] = $ban[$c][$d] + 8;
                        $ban[$c][$d] = $ban[$a][$b];
                        $ban[$a][$b] = 0;
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
                            $okiba2[$j] = $ban[$c][$d] + 8;
                        $ban[$c][$d] = $ban[$a][$b];
                        $ban[$a][$b] = 0;
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
                            $okiba2[$j] = $ban[$c][$d] + 8;
                        $ban[$c][$d] = $ban[$a][$b];
                        $ban[$a][$b] = 0;
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
                            $okiba2[$j] = $ban[$c][$d] + 8;
                        $ban[$c][$d] = $ban[$a][$b];
                        $ban[$a][$b] = 0;
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
                            $okiba2[$j] = $ban[$c][$d] + 8;
                        if($c >= 6){
                        $ban[$c][$d] = 13;
                        }else{
                            $ban[$c][$d] = $ban[$a][$b];
                        }
                        $ban[$a][$b] = 0;
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
                            $okiba2[$j] = $ban[$c][$d] + 8;
                            if($c >= 6){
                        $ban[$c][$d] = 13;
                        }else{
                            $ban[$c][$d] = $ban[$a][$b];
                        }
                        $ban[$a][$b] = 0;
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
                            $okiba2[$j] = $ban[$c][$d] + 8;
                            if($c >= 6){
                        $ban[$c][$d] = 13;
                        }else{
                            $ban[$c][$d] = $ban[$a][$b];
                        }
                        $ban[$a][$b] = 0;
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
                            $okiba2[$j] = $ban[$c][$d] + 8;
                            if($c >= 6){
                        $ban[$c][$d] = 13;
                        }else{
                            $ban[$c][$d] = $ban[$a][$b];
                        }
                        $ban[$a][$b] = 0;
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
                            $okiba2[$j] = $ban[$c][$d] + 8;
                            if($c >= 6){
                        $ban[$c][$d] = 13;
                        }else{
                            $ban[$c][$d] = $ban[$a][$b];
                        }
                        $ban[$a][$b] = 0;
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
                            $okiba2[$j] = $ban[$c][$d] + 8;
                        if($c >= 6){
                            $ban[$c][$d] = 13;
                        }else{
                            $ban[$c][$d] = $ban[$a][$b];
                        }
                        $ban[$a][$b] = 0;
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
                            $okiba2[$j] = $ban[$c][$d] + 8;
                            if($c >= 6){
                        $ban[$c][$d] = 13;
                        }else{
                            $ban[$c][$d] = $ban[$a][$b];
                        }
                        $ban[$a][$b] = 0;
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
        global $ban, $ban_ura, $m, $check, $okiba1, $okiba2;
        $count = 0;
        
        for($i = 0; $i < 10; $i++){
            if($okiba1[$i] == 0)
                break;
        }
        for($j = 0; $j < 10; $j++){
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
                            $okiba1[$i] = $ban[$c][$d] - 8;
                     if($c <= 2){
                            $ban[$c][$d] = 5;
                        }else{
                            $ban[$c][$d] = $ban[$a][$b];
                        }
                    $ban[$a][$b] = 0;
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
                            $okiba1[$i] = $ban[$c][$d] - 8;
                    $ban[$c][$d] = $ban[$a][$b];
                    $ban[$a][$b] = 0;
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
                            $okiba1[$i] = $ban[$c][$d] - 8;
                    $ban[$c][$d] = $ban[$a][$b];
                    $ban[$a][$b] = 0;
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
                            $okiba1[$i] = $ban[$c][$d] - 8;
                    $ban[$c][$d] = $ban[$a][$b];
                    $ban[$a][$b] = 0;
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
                            $okiba1[$i] = $ban[$c][$d] - 8;
                    $ban[$c][$d] = $ban[$a][$b];
                    $ban[$a][$b] = 0;
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
                            $okiba1[$i] = $ban[$c][$d] - 8;
                    $ban[$c][$d] = $ban[$a][$b];
                    $ban[$a][$b] = 0;
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
                            $okiba1[$i] = $ban[$c][$d] - 8;
                    $ban[$c][$d] = $ban[$a][$b];
                    $ban[$a][$b] = 0;
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
                            $okiba1[$i] = $ban[$c][$d] - 8;
                    $ban[$c][$d] = $ban[$a][$b];
                    $ban[$a][$b] = 0;
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
                            $okiba1[$i] = $ban[$c][$d] - 8;
                    $ban[$c][$d] = $ban[$a][$b];
                    $ban[$a][$b] = 0;
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
                            $okiba2[$j] = $ban[$c][$d] + 8;
                    $ban[$c][$d] = $ban[$a][$b];
                    $ban[$a][$b] = 0;
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
                            $okiba2[$j] = $ban[$c][$d] + 8;
                    $ban[$c][$d] = $ban[$a][$b];
                    $ban[$a][$b] = 0;
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
                            $okiba2[$j] = $ban[$c][$d] + 8;
                    $ban[$c][$d] = $ban[$a][$b];
                    $ban[$a][$b] = 0;
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
                            $okiba2[$j] = $ban[$c][$d] + 8;
                    $ban[$c][$d] = $ban[$a][$b];
                    $ban[$a][$b] = 0;
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
                            $okiba2[$j] = $ban[$c][$d] + 8;
                    $ban[$c][$d] = $ban[$a][$b];
                    $ban[$a][$b] = 0;
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
                            $okiba2[$j] = $ban[$c][$d] + 8;
                    $ban[$c][$d] = $ban[$a][$b];
                    $ban[$a][$b] = 0;
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
                            $okiba2[$j] = $ban[$c][$d] + 8;
                    $ban[$c][$d] = $ban[$a][$b];
                    $ban[$a][$b] = 0;
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
                            $okiba2[$j] = $ban[$c][$d] + 8;
                    $ban[$c][$d] = $ban[$a][$b];
                    $ban[$a][$b] = 0;
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
                    if($ban_ura[$c][$d] == player1)
                            $okiba2[$j] = $ban[$c][$d] + 8;
                    if($c >= 6){
                     $ban[$c][$d] = 13;
                    }else{
                    $ban[$c][$d] = $ban[$a][$b];
                    }
                    $ban[$a][$b] = 0;
                    $ban_ura[$c][$d] = player2;
                    $ban_ura[$a][$b] = 0;
                    $check = true;
                }else{
                    echo '移動できません。' . "\n";
                    $check = false;
                }
                break;
        }
    }
    
}

class Judge
{
    function hantei($ban)
    {
        global $teban;
        $ou_count = 0;
        
        for($x = 0; $x < 9; $x++){
            for($y = 0; $y < 9; $y++){
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
    }
}

try{
    $ban;
    $ban_ura;
    $okiba1 = array(0,0,0,0,0,0,0,0,0,0);
    $okiba2 = array(0,0,0,0,0,0,0,0,0,0);
    $teban = true;
    
    $pr = new Prepare();
    $pr -> Show($ban);
    $l = new Limit();
    $m = new Move();
    $j = new Judge();
    $pu = new Put();
    
    while(1){
        do{
            if($teban){
                echo 'player1　';
            }else{
                echo 'player2　';
            }
            echo '1動かす　2置く' . "\n";
            fscanf(STDIN, '%d', $a);
            if($a == 1){
                $m -> move_koma();
            }else{
                $pu -> put_koma();
            }
        }while($check == false);
        $pr -> Show($ban);
        if($j -> hantei($ban)){
            $teban = !($teban);
        }else{
            break; 
        }
    }
}catch(Exception $e){
    echo 'エラー'; 
}
?>