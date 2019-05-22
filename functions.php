<?php
session_start();
include 'config.php';

if($_POST['security'] != $_SESSION['security']){
	exit;
}

function validaEmail($email) {
$conta = "^[a-zA-Z0-9\._-]+@";
$domino = "[a-zA-Z0-9\._-]+.";
$extensao = "([a-zA-Z]{2,4})$";
$pattern = $conta.$domino.$extensao;
if (ereg($pattern, $email))
return true;
else
return false;
}


if($_POST['method'] == "Registro"){
	$nome = cleanMe($_POST['nome']);
	$email = cleanMe($_POST['email']);
	$senha = cleanMe($_POST['senha']);
	$senha1 = cleanMe($_POST['senha1']);

	if($nome == ''){
		echo "Preencha o seu nome!";
		exit;
	}
	if($email == ''){
		echo "Preencha o seu email!";
		exit;
	}
	if (validaEmail($email)) {} else {
    echo "Insira um email válido!";
    exit;
 	}
	if($senha == ''){
		echo "Preencha a sua senha!";
		exit;
	}
	if($senha1 != $senha){
		echo "Senhas não conferem!";
		exit;
	}

	$url = urlencode(tirarAcentos($nome));
	$url = str_replace("+", "-", $url);

	$url_existe = mysql_query("SELECT * FROM usuarios WHERE url='".$url."'");
	if(mysql_num_rows($url_existe) == 0){}else{
		$url = $email;
	}

	$ins = mysql_query("INSERT INTO usuarios (nome, email, senha, rapid, blitz, bullet, correspondence, data_ins, url) VALUE ('".$nome."','".$email."', '".$senha."', '1200', '1200', '1200', '1200', '".date('Y-m-d')."', '".$url."')");
	$_SESSION['PLAYER'] = mysql_insert_id();

}

if($_POST['method'] == 'Login'){
	$email = cleanMe($_POST['email']);
	$senha = cleanMe($_POST['senha']);

	if($email == ''){
		echo "Insira seu email!";
		exit;
	}
	if($senha == ''){
		echo "Insira sua senha!";
		exit;
	}

	$q = mysql_query("SELECT * FROM usuarios WHERE email='".$email."' AND senha='".$senha."'");
	if(mysql_num_rows($q) == 0){
		echo "Dados de Login incorretos!";
	}else{
		$Q = mysql_fetch_array($q);
		$_SESSION['PLAYER'] = $Q['id'];
	}

}

if($_POST['method'] == 'Busca_Jogos'){
	$q = mysql_query("SELECT * FROM jogos WHERE id_branco='' OR id_preto='' ORDER BY minutos DESC");
	while($Q = mysql_fetch_array($q)){
		if($Q['tipo'] == 'Amigavel'){
			$tipo = "Amigável";
		}else{
			$tipo = "Valendo Pontos";
		}

		$tempo = $Q['minutos'].'|'.$Q['segundos'];

		if($Q['id_branco'] == ''){
			$cor = "Jogar de Brancas";
			$rtg = $Q['rating_preto'];
			$id_palyer = $Q['id_preto'];
		}else{
			$cor = "Jogar de Pretas";
			$rtg = $Q['rating_branco'];
			$id_palyer = $Q['id_branco'];
		}

		$user = mysql_query("SELECT * FROM usuarios WHERE id='".$id_palyer."'");
		$USER = mysql_fetch_array($user);

		$nome = explode(' ', $USER['nome']);

	echo '
			<tr>
			<th>'.$tempo.'</th>
			<th>'.$nome[0].'</th>
			<th>'.$rtg.'</th>
			<th>'.$tipo.' - '.$cor.'</th> 
			<th><a href="#" onclick="JOGAR_AOVIVO(\''.$Q['id'].'\')">Jogar</a></th>                   
		    </tr>';
		}
}

if($_POST['method'] == 'Cria_Jogo'){
	$minutos = cleanMe($_POST['minutos']);
	$segundos = cleanMe($_POST['segundos']);
	$cor = cleanMe($_POST['cor']);
	$tipo = cleanMe($_POST['tipo']);
	$mode = '';

	if($cor == ''){
		$r = rand(1,2);
		if($r == 1){
			$cor = 'Brancas';
		}else{
			$cor = 'Pretas';
		}
	}

	$user = mysql_query("SELECT * FROM usuarios WHERE id='".$_SESSION['PLAYER']."'");
	$USER = mysql_fetch_array($user);

	if($minutos > 5){
		$mode = 'rapid';
	}

	if($minutos < 6 && $minutos >= 3){
		$mode = 'blitz';
	}

	if($minutos < 3){
		$mode = 'bullet';
	}

	if($cor == 'Brancas'){
		$ins = mysql_query("INSERT INTO jogos (id_branco, minutos, segundos, tipo, data, rating_branco) VALUES ('".$_SESSION['PLAYER']."', '".$minutos."', '".$segundos."', '".$tipo."', '".date('Y-m-d H:i:s')."', '".$USER[$mode]."')");
	}else{
		$ins = mysql_query("INSERT INTO jogos (id_preto, minutos, segundos, tipo, data, rating_preto) VALUES ('".$_SESSION['PLAYER']."', '".$minutos."', '".$segundos."', '".$tipo."', '".date('Y-m-d H:i:s')."', '".$USER[$mode]."')");
	}
	echo mysql_insert_id();
}

if($_POST['method'] == 'Cancela_Jogo'){
	$del = mysql_query("DELETE FROM jogos WHERE id_branco='".$_SESSION['PLAYER']."' AND id_preto='' OR id_preto='".$_SESSION['PLAYER']."' AND id_branco=''");
}


if($_POST['method'] == 'Aguarda_Oponente'){
	$jogo = cleanMe($_POST['jogo']);
	$q = mysql_query("SELECT * FROM jogos WHERE id='".$jogo."'");
	$Q = mysql_fetch_array($q);

	if(mysql_num_rows($q) == 0){
		echo "Error";
	}

	if($Q['id_branco'] !='' && $Q['id_preto'] != ''){
		echo '/'.$Q['id_branco'].'x'.$Q['id_preto'].'/'.$Q['id'];
	}

}
if($_POST['method'] == 'Jogar_Aovivo'){
	$jogo = cleanMe($_POST['jogo']);
	$q = mysql_query("SELECT * FROM jogos WHERE id='".$jogo."'");
	$Q = mysql_fetch_array($q);

	$user = mysql_query("SELECT * FROM usuarios WHERE id='".$_SESSION['PLAYER']."'");
	$USER = mysql_fetch_array($user);

	$minutos = $Q['minutos'];

	if($minutos > 5){
		$mode = 'rapid';
	}

	if($minutos < 6 && $minutos >= 3){
		$mode = 'blitz';
	}

	if($minutos < 3){
		$mode = 'bullet';
	}

	if($Q['id_branco'] == ''){
		$upd = mysql_query("UPDATE jogos SET id_branco='".$_SESSION['PLAYER']."', rating_branco='".$USER[$mode]."' WHERE id='".$jogo."'");
	}else if($Q['id_preto'] == ''){
		$upd = mysql_query("UPDATE jogos SET id_preto='".$_SESSION['PLAYER']."', rating_preto='".$USER[$mode]."' WHERE id='".$jogo."'");
	}

	if($Q['id_branco'] =='' || $Q['id_preto'] == ''){
		if($Q['id_branco'] != ''){
			echo '/'.$Q['id_branco'].'x'.$_SESSION['PLAYER'].'/'.$Q['id'];
		}else if($Q['id_preto'] != ''){
			echo '/'.$_SESSION['PLAYER'].'x'.$Q['id_preto'].'/'.$Q['id'];
		}
		
	}

}

if($_POST['method'] == 'Envia_Jogada'){
	$ins = mysql_query("INSERT INTO jogo_movimentos (id_jogo, movimento, ".$_POST['player'].", fen) VALUES ('".$_POST['id_jogo']."', '".$_POST['source']."<move>".$_POST['target']."', '1', '".$_POST['fen']."')");
}
if($_POST['method'] == 'Busca_Jogadas'){
	$q = mysql_query("SELECT * FROM jogo_movimentos WHERE ".$_POST['player']."='' AND id_jogo='".$_POST['id_jogo']."'");
	if(mysql_num_rows($q) != 0){
		$Q = mysql_fetch_array($q);
		$upd = mysql_query("UPDATE jogo_movimentos SET ".$_POST['player']."='2' WHERE id='".$Q['id']."'");
		echo $Q['movimento'];
	}
}

if($_POST['method'] == 'END_GAME'){
	$id = cleanMe($_POST['id']);
	$game = mysql_query("SELECT * FROM jogos WHERE id='".$id."'");
	$GAME = mysql_fetch_array($game);

	if($GAME['resultado'] == ''){
		

		$branco = mysql_query("SELECT * FROM usuarios WHERE id='".$GAME['id_branco']."'");
		$BRANCO = mysql_fetch_array($branco);

		$preto = mysql_query("SELECT * FROM usuarios WHERE id='".$GAME['id_preto']."'");
		$PRETO = mysql_fetch_array($preto);

		if($GAME['minutos'] <= 2){
			$tipo = 'bullet';
		}
		if($GAME['minutos'] <= 9){
			$tipo = 'blitz';
		}
		if($GAME['minutos'] >= 10){
			$tipo = 'rapid';
		}

		$dif = $BRANCO[$tipo] - $PRETO[$tipo];
		include 'rating.php';

		if($BRANCO[$tipo] > $PRETO[$tipo]){
	    	$b_val = $pl_sup;
	    	$p_val = $pl_inf;
	    }else{
	    	$p_val = $pl_sup;
	    	$b_val = $pl_inf;
	    }


		if($_POST['resultado'] == '1-0'){
			$branco_rating = $BRANCO[$tipo] + (10 * (1 - ($b_val / 100)));
			$preto_rating = $PRETO[$tipo] + (10 * (0 - ($p_val / 100)));

			$b_var = (10 * (1 - ($b_val / 100)));
			$p_var = (10 * (0 - ($p_val / 100)));


			$q = mysql_query("UPDATE jogos SET resultado='".$_POST['resultado']."', rating_resultado_branco='".$b_var."', rating_resultado_preto='".$p_var."' WHERE id='".$id."'");
			$up_branco = mysql_query("UPDATE usuarios SET ".$tipo."='".$branco_rating."' WHERE id='".$BRANCO['id']."'");
			$up_preto = mysql_query("UPDATE usuarios SET ".$tipo."='".$preto_rating."' WHERE id='".$PRETO['id']."'");

		}
		if($_POST['resultado'] == '0-1'){
			$branco_rating = $BRANCO[$tipo] + (10 * (0 - ($b_val / 100)));
			$preto_rating = $PRETO[$tipo] + (10 * (1 - ($p_val / 100)));

			$b_var = (10 * (0 - ($b_val / 100)));
			$p_var = (10 * (1 - ($p_val / 100)));

			$q = mysql_query("UPDATE jogos SET resultado='".$_POST['resultado']."', rating_resultado_branco='".$b_var."', rating_resultado_preto='".$p_var."' WHERE id='".$id."'");
			$up_branco = mysql_query("UPDATE usuarios SET ".$tipo."='".$branco_rating."' WHERE id='".$BRANCO['id']."'");
			$up_preto = mysql_query("UPDATE usuarios SET ".$tipo."='".$preto_rating."' WHERE id='".$PRETO['id']."'");

			echo "UPDATE usuarios SET ".$tipo."='".$branco_rating."' WHERE id='".$BRANCO['id']."'";

		}
		if($_POST['resultado'] == '0.5-0.5'){
			$branco_rating = $BRANCO[$tipo] + (10 * (0.5 - ($b_val / 100)));
			$preto_rating = $PRETO[$tipo] + (10 * (0.5 - ($p_val / 100)));

			$b_var = (10 * (0.5 - ($b_val / 100)));
			$p_var = (10 * (0.5 - ($p_val / 100)));

			$q = mysql_query("UPDATE jogos SET resultado='".$_POST['resultado']."', rating_resultado_branco='".$b_var."', rating_resultado_preto='".$p_var."' WHERE id='".$id."'");
			$up_branco = mysql_query("UPDATE usuarios SET ".$tipo."='".$branco_rating."' WHERE id='".$BRANCO['id']."'");
			$up_preto = mysql_query("UPDATE usuarios SET ".$tipo."='".$preto_rating."' WHERE id='".$PRETO['id']."'");

		}


	}

}