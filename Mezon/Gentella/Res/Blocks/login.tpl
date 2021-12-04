	<div>
		<a class="hiddenanchor" id="signup"></a> <a class="hiddenanchor"
			id="signin"></a>

		<div class="login_wrapper">
			<div class="animate form login_form">
				<section class="login_content">
					<form id="login-form" action="" method="post">
						<h1>Вход в систему</h1>
						{action-message}
						<div>
							<input type="text" class="form-control" placeholder="Логин"
								value="{login}" name="login" />
						</div>
						<div>
							<input type="password" class="form-control" placeholder="Пароль"
								name="password" />
						</div>
						<div>
							<a class="btn btn-default submit" href="javascript:void(0);"
								onclick="jQuery( '#login-form' ).submit();"
								style="margin-right: 0px;">Вход</a>
						</div>

						<div class="clearfix"></div>

						<div class="separator">
							{switch:{show-registration-link}}{case:1}<p class="change_link">
								<a href="../registration/" class="to_register">
									Зарегистрироваться </a>
							</p>{~case}{~switch}
							{switch:{show-restore-password-link}}{case:1}<p class="change_link">
								<a href="../restore-password/" class="to_register">
									Восстановить пароль </a>
							</p>{~case}{~switch}

							<div class="clearfix"></div>
							<br />

							<div>{complex-logo}</div>
						</div>
					</form>
				</section>
			</div>
		</div>
	</div>