<?php
$ip = isset($_SERVER['X_FORWARDED_FOR']) ? $_SERVER['X_FORWARDED_FOR'] : $_SERVER['REMOTE_ADDR'];	// ip address of user

//if ($_SERVER[HTTP_ORIGIN] == 'https://deadlyarena.4kgames.studio'){
	if (isset($_SERVER['HTTP_ORIGIN']) && $_SERVER['HTTP_ORIGIN'] != '') {
		header('Access-Control-Allow-Origin: *');// . $_SERVER['HTTP_ORIGIN']
		header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
		header('Access-Control-Max-Age: 1000');
		header('Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With');
	}
//} else {
	//exit;
//}

$action = $_GET[a];
$pn = $_GET[p_n];
$pdn = $_GET[p_dn];
$pe = $_GET[p_e];
$pp = $_GET[p_p];
$pc = $_GET[p_c];
$pdob = $_GET[p_dob];
$ps = $_GET[p_s];
$pgg = $_GET[p_gg];
$pfb = $_GET[p_fb];
$psn = $_GET[p_sn];
$pid = $_GET[p_id];
$pde = $_GET[p_de];
$pState = $_GET[p_st];

$d_bot = $_GET[p_d_bot];
$a_bot = $_GET[p_a_bot];
$d_weapon = $_GET[p_d_weapon];
$a_weapon = $_GET[p_a_weapon];
$d_halmet = $_GET[p_d_halmet];
$a_halmet = $_GET[p_a_halmet];
$d_vest = $_GET[p_d_vest];
$a_vest = $_GET[p_a_vest];

$s_ip = $_GET[s_ip];
$s_port = $_GET[s_port];
$s_state = $_GET[s_state];

$gs_ip = '';
$gs_error = '';

include('database.php');

if ($action == 'i'){ //return server ip
	if(strlen($pid) > 0 && strlen($psn) > 0){
		$sql = "select * from players where id_player='$pid'";
		$query = $pdo_conn->query($sql);
		if(($data = $query->fetch(PDO::FETCH_ASSOC)) || $pid == 'GUEST'){
			$new_psn = base64_encode($data[player_agent].$data[player_uptime]);
			if($psn == $new_psn || $pid == 'GUEST'){
				if($pde == 'b')
					$sql = "select * from game_conn where status=0 and state=0";
				else if($pde == 'p')
					$sql = "select * from game_conn where status=1 and state=0";
				else {
					$gs_error = '-4';
					echo $gs_error;	//unknown device
					goto LAST;
				}
				$query = $pdo_conn->query($sql);
				if($data = $query->fetch(PDO::FETCH_ASSOC)){
					$gs_ip = $data[active_ip].':'.$data[gs_port];
					echo $gs_ip;
					goto LAST;
				} else {
					$gs_error = '-106';
					echo $gs_error;	//no server found
					goto LAST;
				}	
			} else {
				$gs_error = '-6';
				echo $gs_error;	//player session invalid
				goto LAST;
			}
				
		} else {
			$gs_error = '-105';
			echo $gs_error;	//player id invalid
			goto LAST;
		}
	} else {
		$gs_error = '-10';
		echo $gs_error;	//player id or session not found
		goto LAST;
	}
} else if($action == 'su'){
	if(strlen($s_ip)>0 && strlen($s_port)>0 && strlen($s_state)>0){
		$sql = "UPDATE game_conn SET state='$s_state' WHERE gs_ip='$s_ip' and gs_port='$s_port'";
		if($query = $pdo_conn->query($sql)){
			$gs_error = '3';
			echo $gs_error;	//successfully updated
			goto LAST;
		} else {
			$gs_error = '-108';
			echo $gs_error;	//Database update issue
			goto LAST;
		}
	} else {
		$gs_error = '-14';
		echo $gs_error;	//server info missing
		goto LAST;
	}
} else if($action == 'u'){
	if(strlen($pid) > 0){	//update info but not player_displayname, player_password, player_status
		$sql = "UPDATE players 
		SET player_name='$pn', 
			player_email='$pe', 
			player_country='$pc', 
			player_dob='$pdob', 
			player_sex='$ps', 
			player_google='$pgg', 
			player_fb='$pfb', 
			player_ip='$ip', 
			player_agent='$_SERVER[HTTP_USER_AGENT]', 
			player_status='$pState',
			d_bot='$d_bot', 
			a_bot='$a_bot', 
			d_weapon='$d_weapon', 
			a_weapon='$a_weapon',
			d_halmet='$d_halmet',
			a_halmet='$a_halmet', 
			d_vest='$d_vest', 
			a_vest='$a_vest'
		WHERE id_player = $pid";
		if($query = $pdo_conn->query($sql)){
			$gs_error = '1';
			echo $gs_error;	//successfully updated
			goto LAST;
		} else {
			$gs_error = '-107';
			echo $gs_error;	//Database update issue
			goto LAST;
		}
	} else {
		$gs_error = '-11';
		echo $gs_error;	//player id not found
		goto LAST;
	}
	
} else if($action == 'a' || $action == 's'){	//Just Auth Test

	if ($action == 's' && $psn == ''){
		$gs_error = '-13';
		echo $gs_error;	//session blank
		goto LAST;
	}		

	if(strlen($pdn) > 0)
		$sql = "select * from players where player_displayname='$pdn' and player_password='$pp'";
	else if(strlen($pgg) > 0)
		$sql = "select * from players where player_google='$pgg'";
	else if(strlen($pfb) > 0)
		$sql = "select * from players where player_fb='$pfb'";
	else {
		$gs_error = '-2';
		echo $gs_error;	//no auth protocol
		goto LAST;
	}
		
	$query = $pdo_conn->query($sql);
	$count = $query->rowCount();
	if($count > 0){	//player found
		if($data = $query->fetch(PDO::FETCH_ASSOC)){
			
			if(strlen($psn)==0){	//Check player current session
				$sql = "update players set player_ip='$ip', player_agent='$_SERVER[HTTP_USER_AGENT]' where id_player=$data[id_player]";
				$query = $pdo_conn->query($sql);
				
				$sql = "select * from players where id_player=$data[id_player]";
				$query = $pdo_conn->query($sql);
				$data = $query->fetch(PDO::FETCH_ASSOC);
			}			
			
			$new_psn = base64_encode($data[player_agent].$data[player_uptime]);
			
			if(strlen($psn)>0 && $psn != $new_psn){
				$gs_error = '-1';
				echo $gs_error;	//session expired
				goto LAST;
			}
			
			$gs_error = 'pid1:'.$data[id_player];
			echo '{"player id":"'.$data[id_player].'","player_name":"'.$data[player_name].'","player_email":"'.$data[player_email].'","player_country":"'.$data[player_country].'","player_dob":"'.$data[player_dob].'","player_sex":"'.$data[player_sex].'","player_status":"'.$data[player_status].'","player_google":"'.$data[player_google].'","player_fb":"'.$data[player_fb].'","session":"'.$new_psn.'","d_bot":"'.$data[d_bot].'","d_weapon":"'.$data[d_weapon].'","a_bot":"'.$data[a_bot].'","a_weapon":"'.$data[a_weapon].'","a_halmet":"'.$data[a_halmet].'","d_halmet":"'.$data[d_halmet].'","d_vest":"'.$data[d_vest].'","a_vest":"'.$data[a_vest].'"}';	//auth success
			goto LAST;
		} else {
			$gs_error = '-102';
			echo $gs_error;	//database fetch error
			goto LAST;
		}
	} else {	
		$gs_error = '0';
		echo $gs_error;	//player not found
		goto LAST;
	}
	
} else if($action == 'dc'){
	
	if(strlen($pdn) > 0){
		$sql = "select id_player from players where player_displayname='$pdn'";
		$query = $pdo_conn->query($sql);
		$count = $query->rowCount();
		if($count > 0){
			$gs_error = '-7';
			echo $gs_error; //display name already exist
			goto LAST;
		} else {
			$gs_error = '2';
			echo $gs_error; //displayname available
			goto LAST;
		}
	} else {
		$gs_error = '-8';
		echo $gs_error; //display name blank
		goto LAST;
	}
	
} else {	//New player Registration
	if(strlen($pdn) > 0){
		if((strlen($pdn) > 0 && strlen($pp) > 0) || strlen($pgg) > 0 || strlen($pfb) > 0){
			$sql = "INSERT INTO players (player_name, player_displayname, player_email, player_password, player_country, player_dob, player_sex, player_google, player_fb, player_ip, player_status, player_agent) VALUES ('$pn', '$pdn', '$pe', '$pp', '$pc', '$pdob', '$ps', '$pgg', '$pfb', '$ip', '1', '$_SERVER[HTTP_USER_AGENT]')";
			if($query = $pdo_conn->query($sql)){
				if(strlen($pdn) > 0 && strlen($pp) > 0)
					$sql = "select id_player from players where player_displayname='$pdn' and player_password='$pp'";
				else if(strlen($pgg) > 0)
					$sql = "select id_player from players where player_google='$pgg'";
				else if(strlen($pfb) > 0)
					$sql = "select id_player from players where player_fb='$pfb'";
				else {
					$gs_error = '-12';
					echo $gs_error; //no auth protocol for registration
					goto LAST;
				}
				$query = $pdo_conn->query($sql);
				if($data = $query->fetch(PDO::FETCH_ASSOC)){
					$gs_error = 'pid3:'.$data[id_player];
					echo '{"player id":"'.$data[id_player].'"}';
					goto LAST;
				} else {
					$gs_error = '-103';
					echo $gs_error;	//player Id not found
					goto LAST;
				}
			} else {
				$gs_error = '-104';
				echo $gs_error;	//Database duplicate entry
				goto LAST;
			}
		} else {
			$gs_error = '-3';
			echo $gs_error; //no auth protocol for registration
			goto LAST;
		}
	} else {
		$gs_error = '-9';
		echo $gs_error;	//display name blank
		goto LAST;
	}
}

LAST:
	exit;