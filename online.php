<?php
include 'header.php';
?>

<section class="padding-top-25 no-padding-bottom border-bottom-1 border-grey-300">
			<div class="container">
				<div class="headline">
					<h1>Xadrez Online</h1>
					<div class="btn-group pull-right">
						
						<button type="button" class="btn btn-primary btn-icon-right" data-toggle="modal" data-target="#create_game">Criar Novo Jogo <i class="fa fa-check-square-o"></i></button>
					</div>
				</div>
			</div>
		</section>

		<br>

		<div class="container">
				<h2>Jogos de Xadrez Online</h2><br>
				<div class="row">
					<div class="col-lg-12">
						<div class="panel panel-default">
							<div class="panel-body">
								<table class="table">
									<thead>
										<tr>
											<th>Tempo</th>
											<th>Jogador</th>
											<th>Rating</th>
											<th>Tipo</th>
											<th></th>
										</tr>
									</thead>
									<tbody id="games_result">
										
										
									</tbody>
								</table>	
							</div>
						</div>
					</div>
				</div>
			</div>


</div>

<?php
include 'footer.php';
?>


<script>
setInterval(function(){BUSCA_JOGOS();}, 5000);
function BUSCA_JOGOS(){
     var dados = 'method=Busca_Jogos&security=<?php echo $_SESSION['security']; ?>';
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
                  	document.getElementById('games_result').innerHTML = response;
                    //$('#loading').hide();
                }
            });
}
</script>