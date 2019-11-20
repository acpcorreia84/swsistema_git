<?php define('TITULO_GERAL', 'SW - GUIAR');?>
<?php include 'header.php'; ?>

   <div class="container-fluid" style="margin-top:40px">
		<div class="row">
			<div class="col-sm-6 col-md-4 col-md-offset-4">
				<div class="panel panel-default">
					<div class="panel-heading" align="center">
						<strong>Vers&atilde;o 3.0 - Ambiente <?=$_SERVER['SERVER_ADDR']?></strong>
					</div>
					<div class="panel-body">
						<form role="form" action="login.php" name="frmLogin" id="frmLogin" method="POST">
							<fieldset>
								<div class="row">
									<div class="center-block">
										<img src="img/logo_serama.gif">
									</div>
								</div>
								<div class="row">
									<div class="col-sm-12 col-md-10  col-md-offset-1 ">
										<div class="form-group">
											<div class="input-group">
												<span class="input-group-addon">
													<i class="glyphicon glyphicon-user"></i>
												</span>
												<input class="form-control" placeholder="E-mail" name="edtLogin"  id="edtLogin" type="text" autofocus>
											</div>
										</div>
										<div class="form-group">
											<div class="input-group">
												<span class="input-group-addon">
													<i class="glyphicon glyphicon-lock"></i>
												</span>
												<input class="form-control" placeholder="Senha" name="edtSenha" id="edtSenha" type="password" value="">
											</div>
										</div>
										<div class="form-group">
											<input type="submit" class="btn btn-lg btn-primary btn-block" value="Logar">
										</div>
									</div>
								</div>
							</fieldset>
						</form>
					</div>
					<div class="panel-footer ">
						Recuperar minha <a href="#">senha</a>
					</div>
                </div>
			</div>
		</div>
	</div>
	
	<!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>