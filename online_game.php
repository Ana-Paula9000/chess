<?php
include 'header.php';

$id = cleanMe($_GET['id']);
$jogo = mysql_query("SELECT * FROM jogos WHERE id='".$id."'");
$JOGO = mysql_fetch_array($jogo);

if($JOGO['id_branco'] == $_SESSION['PLAYER']){
	$oponente = mysql_query("SELECT * FROM usuarios WHERE id='".$JOGO['id_preto']."'");
	$op_rtg = $JOGO['rating_preto'];
	$my_rtg = $JOGO['rating_branco'];
	$me = "branco";
	$op = "preto";
}else{
	$oponente = mysql_query("SELECT * FROM usuarios WHERE id='".$JOGO['id_branco']."'");
	$op_rtg = $JOGO['rating_branco'];
	$my_rtg = $JOGO['rating_preto'];
	$me = "preto";
	$op = "branco";
}

$OPONENTE = mysql_fetch_array($oponente);
?>
<link rel="stylesheet" href="/chessboardjs/css/chessboard.css" />
<style type="text/css">
.avoid-clicks {
  pointer-events: none;
}
</style>

<section id="section_game" class="bg-grey-50 padding-top-30">
			<div style="padding:0px 20px 20px 20px">
				<div class="row">
					<div class="col-md-5 padding-right-20" style="margin-top: -20px;">

						

						<div id="board" style="width: 100%;"></div>

						

					</div>
					<div class="col-md-4 padding-right-20" style="margin-top:-30px;">

						<div class="widget widget-list">
							<ul>
								<li>
									<a href="#" class="thumb"><?php if($OPONENTE['foto'] == ''){echo'<img src="/img/users.png" alt="">'; }?></a>
									<div class="widget-list-meta">
										<h4 class="widget-list-title"><a href="#"><?php echo $OPONENTE['nome']; ?></a></h4>
										<p><i class="fa fa-hashtag"></i> <?php echo $op_rtg; ?></p>
									</div>
									<div id="cron_op" align="right" style="float: right; font-weight: 700; font-size: 15px;"><?php echo $JOGO['minutos']; ?>:00</div>
								</li>
								
							</ul>
						</div>

						
						<div class="panel panel-default panel-post">
							<div class="panel-body">
								<div class="post">
									<p><b>PGN:</b><br><span style="max-height:250px; min-height: 250px; overflow: auto; display: list-item;" align="justify" id="pgn"></span></p>
									<p><b>FEN:</b><br><span id="fen"></span></p>
								</div>
							</div>
							
						</div>


						<div class="widget widget-list" style="margin-top: -30px;">
							<ul>
								<li>
									<a href="#" class="thumb"><?php if($USER['foto'] == ''){echo'<img src="/img/users.png" alt="">'; }?></a>
									<div class="widget-list-meta">
										<h4 class="widget-list-title"><a href="#"><?php echo $USER['nome']; ?></a></h4>
										<p><i class="fa fa-hashtag"></i> <?php echo $my_rtg; ?></p>
									</div>
								</li>
							</ul>
						</div>
						<div id="cron_me" align="right" style="float: right; font-weight: 700; font-size: 15px; margin-top: -45px;"><?php echo $JOGO['minutos']; ?>:00</div>

					</div>
					
					<div class="col-md-3 padding-left-20">
						<div class="widget widget-game" style="background: transparent;">
							
						<iframe src="https://apprtc.appspot.com/r/chessmaster<?php echo $JOGO['id']; ?>" style="width:100%; max-height:500px; min-height: 500px; overflow: hide;"></iframe>

						</div>
						
						
					</div>
				</div>
			</div>
		</section>



</div>
<?php
include 'footer.php';
?>



<script type="text/javascript">
	//document.getElementById('section_game').style.minHeight = $(window).height()+'px';
	//document.getElementById('board').style.maxHeight = ($(window).height() - 250)+'px';
</script>


<div id="target"></div>
<div id="source"></div>
<button id='send-btn' style="display:none;"></button>

<script src="/chess/chess.js"></script>
<script src="/chessboardjs/js/chessboard.js"></script>
<script type="text/javascript">

var timer_me = false;
var timer_op = false;


	var board,
  game = new Chess(),
  statusEl = $('#status'),
  fenEl = $('#fen'),
  pgnEl = $('#pgn');
// do not pick up pieces if the game is over
// only pick up pieces for the side to move
var onDragStart = function(source, piece, position, orientation) {
  if (game.game_over() === true ||
      (game.turn() === 'w' && piece.search(/^b/) !== -1) ||
      (game.turn() === 'b' && piece.search(/^w/) !== -1)) {
    return false;
  }
};

function onDrop(source, target) {
	console.log(source+' '+target);
  // see if the move is legal
  

  document.getElementById('target').innerHTML = target;
  document.getElementById('source').innerHTML = source;
  

  var move = game.move({
    from: source,
    to: target,
    promotion: 'q' // NOTE: always promote to a queen for example simplicity
  });

  // illegal move
  if (move === null) return 'snapback';

  document.getElementById("board").className = "avoid-clicks";
  $('#send-btn').click();
  
  timer_me = '0';
  timer_op = '1';
  startCountdown_op();

  updateStatus();
   $("#pgn").scrollTop($("#pgn")[0].scrollHeight);
  };

function onDrop1(source, target) {
	console.log(source+' '+target);
  // see if the move is legal

  document.getElementById("board").className = "";

  board.move(source+'-'+target);
  var move = game.move({
    from: source,
    to: target,
    promotion: 'q' // NOTE: always promote to a queen for example simplicity
  });

  // illegal move
  if (move === null) return 'snapback';
  
  timer_me = '1';
  timer_op = '0';
  startCountdown_me();
  updateStatus();
  onSnapEnd();
  $("#pgn").scrollTop($("#pgn")[0].scrollHeight);
};

// update the board position after the piece snap 
// for castling, en passant, pawn promotion
var onSnapEnd = function() {
  board.position(game.fen());
};

var updateStatus = function() {
  var status = '';

  var moveColor = 'White';
  if (game.turn() === 'b') {
    moveColor = 'Black';
  }

  var me_color = "<?php echo $me; ?>";
  var op_color = "<?php echo $op; ?>";


  // checkmate?
  if (game.in_checkmate() === true) {
    status = 'Game over, ' + moveColor + ' is in checkmate.';
    if(moveColor == 'Black'){
    	END_GAME('1-0');
    	timer_me = '0';
    	timer_op = '0';
    }else{
    	END_GAME('0-1');
    	timer_me = '0';
    	timer_op = '0';
    }
  }

  // draw?
  else if (game.in_draw() === true) {
    status = 'Game over, drawn position';
    END_GAME('0.5-0.5');
    timer_me = '0';
    timer_op = '0';
  }

  // game still on
  else {
    status = moveColor + ' to move';

    // check?
    if (game.in_check() === true) {
      status += ', ' + moveColor + ' is in check';
    }
  }

  statusEl.html(status);
  fenEl.html(game.fen());
  pgnEl.html(game.pgn());
};

var cfg = {
  draggable: true,
  position: 'start',
  <?php
  if($JOGO['id_preto'] == $_SESSION['PLAYER']){
  	echo "orientation: 'black',";
  }
  ?>
  onDragStart: onDragStart,
  onDrop: onDrop,
  onSnapEnd: onSnapEnd
};
board = ChessBoard('board', cfg);

updateStatus();
</script>

<?php
  if($JOGO['id_preto'] == $_SESSION['PLAYER']){
?>

<script>
document.getElementById("board").className = "avoid-clicks";
</script>

<?php
}
?>


<script language="javascript" type="text/javascript">  
$(document).ready(function(){
	//create a new WebSocket object.
	var wsUri = "ws://localhost:9000/socket.php"; 	
	websocket = new WebSocket(wsUri); 
	
	websocket.onopen = function(ev) { // connection is open 
		console.log("Connected!"); //notify user
	}

	$('#send-btn').click(function(){ //use clicks message send button	
		var mtarget = $('#target').text(); //get message text
		var msource = $('#source').text(); //get user name
		
		
		//prepare json data
		var msg = {
		target: mtarget,
		source: msource,
		color: '<?php echo $me; ?>'
		};
		//convert and send data to server
		websocket.send(JSON.stringify(msg));
	});
	
	//#### Message received from server?
	websocket.onmessage = function(ev) {
		var msg = JSON.parse(ev.data); //PHP sends Json data
		var target = msg.target; //message text
		var source = msg.source; //user name
		var color = msg.color;

		if(color != '<?php echo $me; ?>'){
			onDrop1(source, target);
		}
		
	};
	
	websocket.onerror	= function(ev){console.log("Error Occurred - "+ev.data);}; 
	websocket.onclose 	= function(ev){console.log("Connection Closed");}; 
});
</script>


<script type="text/javascript">
var tempo = new Number();
// Tempo em segundos
tempo = <?php echo $JOGO['minutos'] * 60; ?>;
tempo1 = <?php echo $JOGO['minutos'] * 60; ?>;

function startCountdown_op(){

	if(timer_op === '1'){
	// Se o tempo não for zerado
	if((tempo - 1) >= 0){

		// Pega a parte inteira dos minutos
		var min = parseInt(tempo/60);
		// Calcula os segundos restantes
		var seg = tempo%60;

		// Formata o número menor que dez, ex: 08, 07, ...
		if(min < 10){
			min = "0"+min;
			min = min.substr(0, 2);
		}
		if(seg <=9){
			seg = "0"+seg;
		}

		// Cria a variável para formatar no estilo hora/cronômetro
		horaImprimivel = min + ':' + seg;
		//JQuery pra setar o valor
		$("#cron_op").html(horaImprimivel);

		// Define que a função será executada novamente em 1000ms = 1 segundo
		setTimeout('startCountdown_op()',1000);

		// diminui o tempo
		tempo--;

	// Quando o contador chegar a zero faz esta ação
	} else {
		//window.open('../controllers/logout.php', '_self');
	}
}

}
function startCountdown_me(){

	if(timer_me === '1'){

	// Se o tempo não for zerado
	if((tempo1 - 1) >= 0){

		// Pega a parte inteira dos minutos
		var min = parseInt(tempo1/60);
		// Calcula os segundos restantes
		var seg = tempo1%60;

		// Formata o número menor que dez, ex: 08, 07, ...
		if(min < 10){
			min = "0"+min;
			min = min.substr(0, 2);
		}
		if(seg <=9){
			seg = "0"+seg;
		}

		// Cria a variável para formatar no estilo hora/cronômetro
		horaImprimivel = min + ':' + seg;
		//JQuery pra setar o valor
		$("#cron_me").html(horaImprimivel);

		// Define que a função será executada novamente em 1000ms = 1 segundo
		setTimeout('startCountdown_me()',1000);

		// diminui o tempo
		tempo1--;

	// Quando o contador chegar a zero faz esta ação
	} else {
		//window.open('../controllers/logout.php', '_self');
	}

}

}
// Chama a função ao carregar a tela
//startCountdown();

startCountdown_op();
startCountdown_me();
</script>


<script type="text/javascript">
function END_GAME(placar){
     var dados = 'method=END_GAME&security=<?php echo $_SESSION['security']; ?>&id=<?php echo $JOGO['id']; ?>&resultado='+placar;
            $.ajax({
                type: 'POST',
                dataType: 'html',
                url: '<?php echo $external_url; ?>',
                async: true,
                data: dados,
        beforeSend: function(){
            //$('#loading').show();
        },
                success: function(response) {
                  	alert(response);
                }
            });
}
</script>