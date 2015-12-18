<?php include "header.php" ?>
	<ul>
	<li>logged in as<p id="username">
		<script type="text/javascript">
			$.ajax({
				url: '../php/getUser.php',
				type: 'POST',
				data: "username=" + window.sessionStorage.Username
			})
			.done(function(result) {
				$("#username").text(result)
			})
			.fail(function() {
				console.log("error");
			})
			.always(function() {
				console.log("complete");
			});

		</script>
	</p></li>
	<li>
		<div class="newPassword">
			<ul>
				<li class="newP">
					<label>enter your old password</label>
					<p>
						<input type="password" autocomplete="off" id="oldPassword">
					</p>
				</li>
				<li class="newP">
					<label>enter your new password</label>
					<p>
						<input type="password" autocomplete="off" id="newPassword">
					</p>
				</li>
				<li class="newP">
					<label>enter your new password again</label>
					<p>
						<input type="password" autocomplete="off" id="newPasswordAgain">
					</p>
				</li>
			</ul>
			<input type="button" name="changePassword" id="changePassword" value="change password" onclick="changePassword()">
		</div>
		<li class="newP">
			<button onclick="showpassword()" class="newP">view password</button>
		</li>
	</li>
	</ul>

<?php include "footer.php" ?>
