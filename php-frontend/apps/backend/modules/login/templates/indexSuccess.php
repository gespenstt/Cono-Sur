	<div class="content clearfix">
            <?php if(!is_null($msgout)){ ?>
            <div class="alert alert-danger alert-dismissable">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <?=$msgout;?>
            </div>
            <?php } ?>
		
		<form action="<?=url_for("login/index");?>" method="post">
		
			<h1>Inicio de sesión</h1>		
			
			<div class="login-fields">
				
				
				<div class="field">
					<label for="username">Usuario</label>
					<input type="text" id="username" name="usuario" value="" placeholder="Usuario" class="form-control input-lg username-field" />
				</div> <!-- /field -->
				
				<div class="field">
					<label for="password">Contraseña</label>
					<input type="password" id="password" name="pass" value="" placeholder="Contraseña" class="form-control input-lg password-field"/>
				</div> <!-- /password -->
				
			</div> <!-- /login-fields -->
			
			<div class="login-actions">
									
				<button class="login-action btn btn-primary">Entrar</button>
				
			</div> <!-- .actions -->
			
		</form>
		
	</div> <!-- /content -->