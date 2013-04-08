<?php

const player1 = 1;
const player2 = 2;

class Prepare
{
    function Prepare()
    {
	    global $ban, $ban_ura;
	    $ban = array(
	        array(16,15,14,13,12,13,14,15,16)
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
                    $ban[$x][$y] = 10;
                    $ban_ura[$x][$y] = 2;
                }elseif($x == 1 && $y == 1){
                    $ban[$x][$y] = 11;
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
        echo 'player2' . "\n";
        echo '０１２３４５６７８'."\n";
        echo '__________________'. "\n";
        for($x = 0;$x < 9;$x++){
            for($y = 0;$y < 9;$y++){
                switch($ban[$x][$y]){
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
                        echo ("ﾋｼ");
                        break;
		            case 11:
                        echo ("ｶｸ");
                        break;
		            case 12:
                        echo ("ｵｳ");
                        break;
		            case 13:
                        echo ("ｷﾝ");
                        break;
    		        case 14:
                        echo ("ｷﾞ");
                        break;
		            case 15:
                        echo ("ｹｲ");
                        break;
		            case 16:
                        echo ("ｷｮ");
                        break;
                }
            }
            echo ('|');
            echo ($x + 0);
            echo ("\n");
        }
        echo ('￣￣￣￣￣￣￣￣￣' . "\n");
        echo 'player1' . "\n";
    }
}
	
class Move
{
    function move_koma()
    {
        global $ban;
        $l = new Limit();
    
        echo '行と列を入力してください。' ."\n";
        fscanf(STDIN, '%d %d', $a, $b);
        echo '行と列を入力してください。' ."\n";
        fscanf(STDIN, '%d %d', $c, $d);
        
        $koma = $ban[$a][$b];
        
        if($koma != 2 && $koma != 7 && $koma != 8 && $koma != 10 && $koma != 11 && $koma != 16){
            $l -> limit1($koma, $a, $b, $c, $d);
        }else{
            $l -> limit2($koma, $a, $b, $c, $d);
        }
    }
}

class Put
{
    function put_koma()
    {
        global $okiba1, $okiba2, $ban, $ban_ura, $teban;
        
        echo '行と列を入力してください。' ."\n";
        fscanf(STDIN, '%d %d', $c, $d);
        
        if($teban){
            echo '列を入力してください。' ."\n";
            fscanf(STDIN, '%d', $a);
            $ban[$c][$d] = $okiba1[$a];
            $okiba1[$a] = 0;
            $ban_ura[$c][$d] = player1;
        }else{
            echo '列を入力してください。' ."\n";
            fscanf(STDIN, '%d', $a);
            $ban[$c][$d] = $okiba2[$a];
            $okiba2[$a] = 0;
            $ban_ura[$c][$d] = player2;
        }
    }
}

class Limit
{
    function limit1($koma, $a, $b, $c, $d)
    {
        global $ban, $ban_ura, $m, $check;
        
        switch($koma){
            case 1:					//歩
                if($c == $a - 1 && $d == $b){
                    if($ban_ura[$c][$d] != player1){
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
		    case 3:					//桂
                if($c == $a -2 && $d == $b +1){
                    if($ban[$c][$d] != player1){
                        $ban[$c][$d] = $ban[$a][$b];
                        $ban[$a][$b] = 0;
                        $ban_ura[$c][$d] = player1;
                        $ban_ura[$a][$b] = 0;
                        $check = true;
                    }else{
                        echo '移動できません。' . "\n";
                        $check = false;
                    }
                }elseif($c == $a -2 && $d == $b -1){
                    if($ban[$c][$d] != player1){
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
		    case 4:					//銀
                if($c == $a - 1 && $d == $b){
                    if($ban[$c][$d] != player1){
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
		            if($ban[$c][$d] != player1){
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
		            if($ban[$c][$d] != player1){
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
		            if($ban[$c][$d] != player1){
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
		            if($ban[$c][$d] != player1){
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
		    case 5:					//金
                if($c == $a - 1 && $d == $b){
                    if($ban[$c][$d] != player1){
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
		            if($ban[$c][$d] != player1){
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
		            if($ban[$c][$d] != player1){
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
		            if($ban[$c][$d] != player1){
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
		            if($ban[$c][$d] != player1){
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
		            if($ban[$c][$d] != player1){
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
                    if($ban[$c][$d] != player1){
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
		            if($ban[$c][$d] != player1){
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
		            if($ban[$c][$d] != player1){
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
		            if($ban[$c][$d] != player1){
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
		            if($ban[$c][$d] != player1){
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
		            if($ban[$c][$d] != player1){
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
		            if($ban[$c][$d] != player1){
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
		            if($ban[$c][$d] != player1){
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
                    if($ban[$c][$d] != player2){
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

		    case 12:					//ｵｳ
                if($c == $a + 1 && $d == $b){
                    if($ban[$c][$d] != player2){
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
		            if($ban[$c][$d] != player2){
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
		            if($ban[$c][$d] != player2){
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
		            if($ban[$c][$d] != player2){
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
		            if($ban[$c][$d] != player2){
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
		            if($ban[$c][$d] != player2){
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
		            if($ban[$c][$d] != player2){
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
		            if($ban[$c][$d] != player2){
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
                    if($ban[$c][$d] != player2){
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
		            if($ban[$c][$d] != player2){
                        $ban[$c][$d] = $ban[$a][$b];
                        $ban[$a][$b] = 0;
                        $ban_ura[$c][$d] = playe2;
                        $ban_ura[$a][$b] = 0;
                        $check = true;
                    }else{
                        echo '移動できません。' . "\n";
                        $check = false;
                    }
                }elseif($c == $a  && $d == $b +1){
		            if($ban[$c][$d] != player2){
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
		            if($ban[$c][$d] != player2){
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
		            if($ban[$c][$d] != player2){
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
		            if($ban[$c][$d] != player2){
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
		    case 14:					//ｷﾞﾝ
                if($c == $a + 1 && $d == $b){
                    if($ban[$c][$d] != player2){
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
		            if($ban[$c][$d] != player2){
                        $ban[$c][$d] = $ban[$a][$b];
                        $ban[$a][$b] = 0;
                        $ban_ura[$c][$d] = player;
                        $ban_ura[$a][$b] = 0;
                        $check = true;
                    }else{
                        echo '移動できません。' . "\n";
                        $check = false;
                    }
                }elseif($c == $a +1 && $d == $b -1){
		            if($ban[$c][$d] != player2){
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
		            if($ban[$c][$d] != player2){
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
		            if($ban[$c][$d] != player2){
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
		    case 15:					//ｹｲ
                if($c == $a +2 && $d == $b +1){
                    if($ban[$c][$d] != player2){
                        $ban[$c][$d] = $ban[$a][$b];
                        $ban[$a][$b] = 0;
                        $ban_ura[$c][$d] = player2;
                        $ban_ura[$a][$b] = 0;
                        $check = true;
                    }else{
                        echo '移動できません。' . "\n";
                        $check = false;
                    }
                }elseif($c == $a +2 && $d == $b -1){
                    if($ban[$c][$d] != player2){
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

        }
    }
    
    function limit2($koma, $a, $b, $c, $d)
    {
        global $ban, $ban_ura, $m, $check;
        $count = 0;
        
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
            
            case 10:
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
                
            case 11:
            
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
                if($ban[$x][$y] == 6 || $ban[$x][$y] == 12){
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
	
    $ban;
    $ban_ura;
    $okiba1 = 1;
    $okiba2;
    $teban = true;
    
    $pr = new Prepare();
    $pr -> Show($ban);
    $m = new Move();
    $j = new Judge();
    $pu = new Put();
    
    while(1){
        do{
            echo '1動かす　2置く' . "\n";
            fscanf(STDIN, '%d', $a);
            if($a == 1){
                $m -> move_koma();
            }else{
//                $pu -> put_koma();
            }
        }while($check == false);
        $pr -> Show($ban);
        if($j -> hantei($ban)){
            $teban = !($teban);
        }else{
            break;
        }
    }
?>