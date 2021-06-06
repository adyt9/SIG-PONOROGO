<!DOCTYPE html>
<html>

<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>Sig Wisata | Login</title>

	<link href="<?= base_url('asset/inspina/') ?>css/bootstrap.min.css" rel="stylesheet">
	<link href="<?= base_url('asset/inspina/') ?>font-awesome/css/font-awesome.css" rel="stylesheet">

	<link href="<?= base_url('asset/inspina/') ?>css/animate.css" rel="stylesheet">
	<link href="<?= base_url('asset/inspina/') ?>css/style.css" rel="stylesheet">

</head>

<body class="gray-bg">
	</br></br></br></br>
	<div class="middle-box text-center login-register animated fadeInDown">
		<div class="ibox-content">
			<h2 class="font-bold">Welcome</h2></br>
			<p>Silahkan login terlebih dahulu</p></br>
			<form class="m-t" role="form" id="formSignIn">
				<div class="form-group">
					<input type="text" class="form-control" placeholder="Username" id="username" name="username" required="">
				</div>
				<div class="form-group">
					<input type="password" class="form-control" placeholder="Password" id="password" name="password" required="">
				</div>
				<button type="submit" class="on-default btn btn-success block full-width m-b" id="btnSignin">Login</button>
			</form>

			<hr />
			<div class="row">
				<div class="col-md-6 text-left">
					<small>Copyright Dispar Kab.Ponorogo</small>
				</div>
				<div class="col-md-6 text-right">
					<small>© 2021</small>
				</div>
			</div>
		</div>
	</div>
	<script src="<?= base_url('asset/inspina/') ?>js/jquery-3.1.1.min.js"></script>
	<script src="<?= base_url('asset/inspina/') ?>js/bootstrap.min.js"></script>
	<script>
		let username = document.getElementById('username');
		let password = document.getElementById('password');
		let formSignIn = document.getElementById("formSignIn");
		formSignIn.onsubmit = function(e) {
			e.preventDefault();
			let xhr = new XMLHttpRequest();
			xhr.open('POST', '<?= site_url('Auth/login'); ?>', true);
			xhr.onreadystatechange = function() {
				if (xhr.readyState === 4 && xhr.status == 200) {
					if (xhr.responseText == '1') {
						location = '<?= site_url('Dashboard') ?>'
					} else {
						alert('Login gagal, Username atau password salah')
					}
				}
			}
			xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xhr.send(`username=${username.value}&password=${password.value}`);
		}
	</script>
</body>

</html>
