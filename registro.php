<?php
include 'header.php';
?>


<section class="hero hero-panel" style="background-image: url(img/slideshow/<?php echo rand(1,3); ?>.jpg);">
			<div class="hero-bg"></div>
			<div class="container relative">
				<div class="row">
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 pull-none margin-auto">
						<div class="panel panel-default panel-login">
							<div class="panel-heading">
								<h3 class="panel-title"><i class="fa fa-users"></i> Registro no ChessMaster</h3>
							</div>
							<div class="panel-body">
								<div align="center">
								<img src="/img/logo-full.png">
								</div><br>									
								<form>
									<div class="form-group input-icon-left">
										<i class="fa fa-user"></i>
										<input type="text" id="nome" class="form-control" name="username" placeholder="Nome">
									</div>
									<div class="form-group input-icon-left">
										<i class="fa fa-envelope"></i>
										<input type="email" id="email" class="form-control" name="email" placeholder="Email">
									</div>
									<div class="form-group input-icon-left">
										<i class="fa fa-lock"></i>
										<input type="password" id="senha" class="form-control" name="password" placeholder="Senha">
									</div>
									<div class="form-group input-icon-left">
										<i class="fa fa-check"></i>
										<input type="password" id="senha1" class="form-control" name="password" placeholder="Confirme a Senha">
									</div>
									
			
									
									<button type="button" onclick="REGISTRO()" class="btn btn-primary btn-block">Registrar</button>
									
								</form>
							</div>
							<div class="panel-footer">
								Já tem uma conta? <a href="#signin" data-toggle="modal">Efetue o Login!</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>


<?php
include 'footer.php';
?>

<script>
function REGISTRO(){
     var dados = 'method=Registro&email='+document.getElementById('email').value+'&senha='+document.getElementById('senha').value+'&senha1='+document.getElementById('senha1').value+'&nome='+document.getElementById('nome').value+'&security=<?php echo $_SESSION['security']; ?>';
            $.ajax({
                type: 'POST',
                dataType: 'html',
                url: '<?php echo $external_url; ?>',
                async: true,
                data: dados,
        beforeSend: function(){
            $('#loading').show();
        },
                success: function(response) {
                    if(isNaN(response)){
                        swal('Erro!', response, 'error');
                    }else{
                        location.href="/";
                    }
                    $('#loading').hide();
                }
            });
}
</script>