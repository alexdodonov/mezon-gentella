	<div>
		<a class="hiddenanchor" id="signup"></a> <a class="hiddenanchor"
			id="signin"></a>

		<div class="login_wrapper">
			<div class="animate form login_form">
				<section class="login_content">
					<form method="post" action="" id="reg-form">
						<h1>Регистрация</h1>
						{message}
						<div>
							<input type="text" class="form-control" placeholder="Логин"
								value="{login}" name="login" />
						</div>
						<div>
							<input type="password" class="form-control" placeholder="Пароль"
								name="password" />
						</div>
						<div>
							<input type="password" class="form-control"
								placeholder="Подтверждение пароля" name="password-confirmation" />
						</div>
						<div>
							<a class="btn btn-default submit" href="javascript:void(0);"
								onclick="jQuery( '#reg-form' ).submit();">Регистрация</a>
						</div>

						<div class="clearfix"></div>

						<div class="separator">
							<p class="change_link">
								Уже зарегистрированы ? <a href="../login/" class="to_login">
									Войти </a>
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
