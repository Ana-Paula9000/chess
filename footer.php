<section class="bg-primary promo">
			<div class="container">
				<h2>Gosta do ChessMaster? Faça uma doação e ajude na manutenção dos servidores!</h2>
				<a href="http://themeforest.net/item/gameforest-responsive-gaming-html-theme/5007730" target="_blank" class="btn btn-white btn-outline">Fazer doação!<i class="fa fa-shopping-cart margin-left-10"></i></a>
			</div>
		</section>
	</div>
	<!-- /#wrapper -->
	
	<!-- footer -->
	<footer>
		<div class="container">
			<div class="widget row">
				<div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
					<h4 class="title">About GameForest</h4>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec pharetra mattis arcu, a congue leo malesuada eu. Nam nec mauris ut odio tristique varius et eu metus. Quisque massa purus, aliquet quis blandit et, <br /> <br />mollis sed lorem. Sed vel tincidunt elit. Phasellus at varius odio, sit amet fermentum mauris.</p>
				</div>
					
				<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
					<h4 class="title">Categories</h4>
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">	
							<ul class="nav">
								<li><a href="#">Playstation 4</a></li>
								<li><a href="#">XBOX ONE</a></li>
								<li><a href="#">PC</a></li>
								<li><a href="#">PS3</a></li>
							</ul>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<ul class="nav">
								<li><a href="#">Gaming</a></li>
								<li><a href="#">Portfolio</a></li>
								<li><a href="#">Videos</a></li>
								<li><a href="#">Reviews</a></li>
							</ul>
						</div>
					</div>
				</div>
		
				<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
					<h4 class="title">Email Newsletters</h4>
					<p>Subscribe to our newsletter and get notification when new games are available.</p>
					<form method="post" class="btn-inline form-inverse">
						<input type="text" class="form-control" placeholder="Email..." />
						<button type="submit" class="btn btn-link"><i class="fa fa-envelope"></i></button>
					</form>
				</div>
			</div>
		</div>
		
		<div class="footer-bottom">
			<div class="container">	
				<ul class="list-inline">
					<li><a href="#" class="btn btn-circle btn-social-icon" data-toggle="tooltip" title="Follow us on Twitter"><i class="fa fa-twitter"></i></a></li>
					<li><a href="#" class="btn btn-circle btn-social-icon" data-toggle="tooltip" title="Follow us on Facebook"><i class="fa fa-facebook"></i></a></li>
					<li><a href="#" class="btn btn-circle btn-social-icon" data-toggle="tooltip" title="Follow us on Google"><i class="fa fa-google-plus"></i></a></li>
					<li><a href="#" class="btn btn-circle btn-social-icon" data-toggle="tooltip" title="Follow us on Steam"><i class="fa fa-steam"></i></a></li>
				</ul>
				&copy; 2016 Gameforest. All rights reserved.
			</div>
		</div>
	</footer>	
	<!-- /.footer -->
	
	<div id="signin" class="modal fade" tabindex="-1">
		<div class="modal-dialog modal-sm">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h3 class="modal-title"><i class="fa fa-user"></i> Efetue o Login no ChessMaster!</h3>
				</div>
				<div class="modal-body">
				<div align="center">
				<img src="/img/logo-full.png">
				</div><br>						
					<form>
						<div class="form-group input-icon-left">
							<i class="fa fa-user"></i>
							<input type="text" id='email_login' class="form-control" name="username" placeholder="Email">
						</div>
						<div class="form-group input-icon-left">
							<i class="fa fa-lock"></i>
							<input type="password" id='senha_login' class="form-control" name="password" placeholder="Senha">
						</div>
						<button type="button" class="btn btn-primary btn-block" onclick="LOGIN();">Login</button>
									
					</form>
				</div>
				<div class="modal-footer text-left">
					Não tem uma conta? <a href="/Registro">Registre-se</a>
				</div>
			</div>
		</div>
	</div><!-- /.modal --> 





	<div class="modal fade bs-modal-sm no-padding-right" id="create_game" tabindex="-1" role="dialog" style="padding-right:0px;">
					<div class="modal-dialog modal-sm">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
								<h4 class="modal-title"><i class="fa fa-check-square-o"></i> Criar Novo Jogo</h4>
							</div>

							<div class="modal-body">
							<div>
								<h3>Minutos</h3><br>
								<input type="range" min="1" max="90" id='minutos' step="1" value="10" data-orientation="horizontal" data-rangeslider>
								<output>10</output></div>
								<div>
								<h3>Segundos de Acréscimos</h3><br>
								<input type="range" min="0" max="90" id='segundos' step="1" value="0" data-orientation="horizontal" data-rangeslider>
								<output>0</output></div><br>

								<select class="form-control" id="cor">
									<option value="">Cor aleatória</option>
									<option value="Brancas">Jogar de Brancas</option>	
									<option value="Pretas">Jogar de Pretas</option>	
								</select>
								<select class="form-control" id="tipo">
									<option value="Pontos">Valendo Pontos</option>
									<option value="Amigavel">Amigável</option>	
								</select>
							</div>

							<div class="modal-footer">
								<button id="close_modal_create" type="button" class="btn btn-warning" data-dismiss="modal">Fechar</button>
								<button type="button" class="btn btn-primary" onclick="CRIA_JOGO();">Criar Jogo</button>
							</div>
						 </div><!-- /.modal-content -->
					</div><!-- /.modal-dialog -->
				</div>

				<div class="modal fade bs-modal-sm no-padding-right" id="loader_game" tabindex="-1" role="dialog" style="padding-right:0px;">
					<div class="modal-dialog modal-sm">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" onclick="CANCELA_JOGO();"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
								<h4 class="modal-title"><i class="fa fa-check-square-o"></i> Criar Novo Jogo</h4>
							</div>

							<div class="modal-body" align="center">
								<img src="/img/loader.gif" /><br>
								Aguardando oponente...
							</div>

							<div class="modal-footer">
								<button type="button" class="btn btn-danger" data-dismiss="modal" onclick="CANCELA_JOGO();">Cancelar Jogo</button>
							</div>
						 </div><!-- /.modal-content -->
					</div><!-- /.modal-dialog -->
				</div>








	
	<!-- Javascript -->
	<script src="/plugins/jquery/jquery-3.1.0.min.js"></script>
	<script src="/plugins/bootstrap/js/bootstrap.min.js"></script>
	<script src="/js/core.min.js"></script>
	<script src="/plugins/owl-carousel/owl.carousel.min.js"></script>

	<script src="/sweetalert/dist/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="/sweetalert/dist/sweetalert.css">

	<script>
	(function($) {
	"use strict";
		var owl = $(".owl-carousel");
			 
		owl.owlCarousel({
			items : 4, //4 items above 1000px browser width
			itemsDesktop : [1000,3], //3 items between 1000px and 0
			itemsTablet: [600,1], //1 items between 600 and 0
			itemsMobile : false // itemsMobile disabled - inherit from itemsTablet option
		});
			 
		$(".next").click(function(){
			owl.trigger('owl.next');
			return false;
		})
		$(".prev").click(function(){
			owl.trigger('owl.prev');
			return false;
		})
	})(jQuery);
	</script>
</body>
</html>

<?php
include 'loading.php';
?>


<style>
      
        output {
            display: block;
            font-size: 25px;
            font-weight: bold;
            text-align: center;
            margin: 00px 0;
            width: 100%;
        }
        .u-left {
            float: left;
        }
        .u-cf:before,
        .u-cf:after {
            content: "";
            display: table;
        }
        .u-cf:after {
            clear: both;
        }
        .u-text-left {
            text-align: left;
        }
    </style>


				


<button type="button" class="btn btn-primary btn-icon-right" data-toggle="modal" data-target="#loader_game" id="loader_game_open" style="display:none"></button>
<script>
function CRIA_JOGO(){
     var dados = 'method=Cria_Jogo&minutos='+document.getElementById('minutos').value+'&segundos='+document.getElementById('segundos').value+'&cor='+document.getElementById('cor').value+'&tipo='+document.getElementById('tipo').value+'&security=<?php echo $_SESSION['security']; ?>';
            $.ajax({
                type: 'POST',
                dataType: 'html',
                url: '<?php echo $external_url; ?>',
                async: true,
                data: dados,
        beforeSend: function(){
            $('#close_modal_create').click();
            $("#loader_game_open").click();
        },
                success: function(response) {
                  	AGUARDA_OPONENTE(response);
                }
            });
}
</script>

<link href="/rangeslider/rangeslider.css" rel="stylesheet">
<script src="/rangeslider/rangeslider.js"></script>
<script>
    $(function() {
        var $document = $(document);
        var selector = '[data-rangeslider]';
        var $element = $(selector);
        // For ie8 support
        var textContent = ('textContent' in document) ? 'textContent' : 'innerText';
        // Example functionality to demonstrate a value feedback
        function valueOutput(element) {
            var value = element.value;
            var output = element.parentNode.getElementsByTagName('output')[0] || element.parentNode.parentNode.getElementsByTagName('output')[0];
            output[textContent] = value;
        }
        $document.on('input', 'input[type="range"], ' + selector, function(e) {
            valueOutput(e.target);
        });
        // Example functionality to demonstrate disabled functionality
        $document .on('click', '#js-example-disabled button[data-behaviour="toggle"]', function(e) {
            var $inputRange = $(selector, e.target.parentNode);
            if ($inputRange[0].disabled) {
                $inputRange.prop("disabled", false);
            }
            else {
                $inputRange.prop("disabled", true);
            }
            $inputRange.rangeslider('update');
        });
        // Example functionality to demonstrate programmatic value changes
        $document.on('click', '#js-example-change-value button', function(e) {
            var $inputRange = $(selector, e.target.parentNode);
            var value = $('input[type="number"]', e.target.parentNode)[0].value;
            $inputRange.val(value).change();
        });
        // Example functionality to demonstrate programmatic attribute changes
        $document.on('click', '#js-example-change-attributes button', function(e) {
            var $inputRange = $(selector, e.target.parentNode);
            var attributes = {
                    min: $('input[name="min"]', e.target.parentNode)[0].value,
                    max: $('input[name="max"]', e.target.parentNode)[0].value,
                    step: $('input[name="step"]', e.target.parentNode)[0].value
                };
            $inputRange.attr(attributes);
            $inputRange.rangeslider('update', true);
        });
        // Example functionality to demonstrate destroy functionality
        $document
            .on('click', '#js-example-destroy button[data-behaviour="destroy"]', function(e) {
                $(selector, e.target.parentNode).rangeslider('destroy');
            })
            .on('click', '#js-example-destroy button[data-behaviour="initialize"]', function(e) {
                $(selector, e.target.parentNode).rangeslider({ polyfill: false });
            });
        // Example functionality to test initialisation on hidden elements
        $document
            .on('click', '#js-example-hidden button[data-behaviour="toggle"]', function(e) {
                var $container = $(e.target.previousElementSibling);
                $container.toggle();
            });
        // Basic rangeslider initialization
        $element.rangeslider({
            // Deactivate the feature detection
            polyfill: false,
            // Callback function
            onInit: function() {
                valueOutput(this.$element[0]);
            },
            // Callback function
            onSlide: function(position, value) {
                console.log('onSlide');
                console.log('position: ' + position, 'value: ' + value);
            },
            // Callback function
            onSlideEnd: function(position, value) {
                console.log('onSlideEnd');
                console.log('position: ' + position, 'value: ' + value);
            }
        });
    });
    </script>



    
<script>
function CANCELA_JOGO(){
     var dados = 'method=Cancela_Jogo&security=<?php echo $_SESSION['security']; ?>';
            $.ajax({
                type: 'POST',
                dataType: 'html',
                url: '<?php echo $external_url; ?>',
                async: true,
                data: dados,
        beforeSend: function(){

        },
                success: function(response) {
                  	clearInterval(refreshIntervalId);
                }
            });
}
</script>


<script>
function JOGAR_AOVIVO(src){
     var dados = 'method=Jogar_Aovivo&jogo='+src+'&security=<?php echo $_SESSION['security']; ?>';
            $.ajax({
                type: 'POST',
                dataType: 'html',
                url: '<?php echo $external_url; ?>',
                async: true,
                data: dados,
        beforeSend: function(){

        },
                success: function(response) {
                  	if(response != ''){
                  		location.href = '/Xadrez_Aovivo'+response;
                  	}
                }
            });
}
</script>

<script>
function AGUARDA_OPONENTE(src){
     var dados = 'method=Aguarda_Oponente&jogo='+src+'&security=<?php echo $_SESSION['security']; ?>';
            $.ajax({
                type: 'POST',
                dataType: 'html',
                url: '<?php echo $external_url; ?>',
                async: true,
                data: dados,
        beforeSend: function(){

        },
                success: function(response) {
                  	if(response == ''){
                  		AGUARDA_OPONENTE(src);
                  	}else if(response == 'Error'){
                  	}else{
                  		location.href = '/Xadrez_Aovivo'+response;
                  	}
                }
            });
}
</script>

<script>
function LOGIN(){
     var dados = 'method=Login&email='+document.getElementById('email_login').value+'&senha='+document.getElementById('senha_login').value+'&security=<?php echo $_SESSION['security']; ?>';
            $.ajax({
                type: 'POST',
                dataType: 'html',
                url: '<?php echo $external_url; ?>',
                async: true,
                data: dados,
        beforeSend: function(){

        },
                success: function(response) {
                  	if(response != ''){
                  		swal('Erro!', response, 'error');
                  	}else{
                  		location.reload();
                  	}
                }
            });
}
</script>