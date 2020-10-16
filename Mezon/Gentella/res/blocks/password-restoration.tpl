	<div>
		<a class="hiddenanchor" id="signup"></a> <a class="hiddenanchor"
			id="signin"></a>

		<div class="login_wrapper">
			<div class="animate form login_form">
				<section class="login_content">
					<form id="restore-form" action="./" method="post">
						<h1>Восстановление<br>пароля</h1>
						{message}
						<div>
							<input type="text" class="form-control" placeholder="Email"
								value="{login}" name="login" />
						</div>

						<div>
							<a class="btn btn-default submit" href="javascript:void(0);"
								onclick="jQuery( '#restore-form' ).submit();">Восстановить</a>
						</div>

						<div class="clearfix"></div>

						<div class="separator">
							<p class="change_link">
								Сами вспомнили пароль? <a href="../login/" class="to_login">
									Войти </a>
							</p>
							<p class="change_link">
								<a href="../registration/" class="to_register">
									Зарегистрироваться </a>
							</p>

							<div class="clearfix"></div>
							<br />

							<div>{complex-logo}</div>
						</div>
					</form>
				</section>
			</div>
		</div>
	</div>