<?= $this->extend('login/layout/login_layout') ?>

<?= $this->section('content') ?>

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-form-title" style="background-image: url(<?php echo base_url('_img/administrator2.jpg') ?>);">
					<span class="login100-form-title-1">
						Login
					</span>
				</div>

				<form class="login">
					<div class="login100-form validate-form" style="padding-bottom:0 !important;"> 
						<div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
							<span class="label-input100">Username</span>
							<input id="username" name="username" class="input100" type="text" placeholder="Masukkan Username">
							<span class="focus-input100"></span>
						</div>

						<div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
							<span class="label-input100">Password</span>
							<input id="password" name="password" class="input100" type="password" placeholder="Masukkan Password">
							<span class="focus-input100"></span>
						</div>

						<div class="flex-sb-m w-full p-b-20" style="justify-content: flex-end;">
							<div>
								<a href="<?php echo base_url('login/lupa_password') ?>" class="txt1">
									Lupa Password?
								</a>
							</div>
						</div>    
					</div>

					<div class="container-login100-form-btn p-b-100" style="justify-content: center;">
						<button class="login100-form-btn">
							Login
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
            
<?= $this->endSection() ?>


<?= $this->section('javascript') ?>

	<script>
		$('.login').submit(function(e){
			e.preventDefault();
		
			var username = $('#username').val();
			var password = $('#password').val();
			
			if (username != "") {
				if (password != "") {
					$.ajax({
						type : 'POST',
						url : '<?=base_url('login/auth')?>',
						data: new FormData(this),
						processData:false,
						contentType:false,
						cache:false,
						async:false,
						success: function (data) {
							if (data == "sukses") {
								Swal.fire({
									icon: 'success',
									title: 'Halo :)',
									text: "Selamat datang, anda berhasil login.",
									showConfirmButton: false,
									timer: 2000
								})

								window.location.assign('<?=base_url('administrator')?>');
							} else if (data == "username_password_tidak_terdaftar") {
								$('#username').focus();	

								Swal.fire({
									icon: 'error',
									title: 'Oops...',
									text: "Username & Password tidak terdaftar.", 
									showConfirmButton: false,
									timer: 2000
								})
							} else if (data == "username_tidak_terdaftar") {
								$('#username').focus();	

								Swal.fire({
									icon: 'error',
									title: 'Oops...',
									text: "Username tidak terdaftar.", 
									showConfirmButton: false,
									timer: 2000
								})
							} else if (data == "password_salah") {
								$('#password').focus();

								Swal.fire({
									icon: 'error',
									title: 'Oops...',
									text: "Password yang anda masukkan salah.",
									showConfirmButton: false,
									timer: 2000 
								})
							} else {
								Swal.fire({
									icon: 'error',
									title: 'Oops...',
									text: 'Kesalahan tidak diketahui. Halaman akan dimuat ulang.',
								}).then((result) => {
									if (result.value) {
										window.location.assign('<?=base_url('login')?>');
									}
								}) 
							}   
						},
						error: function() {
							Swal.fire({
								icon: 'error',
								title: 'Oops...',
								text: 'Kesalahan tidak diketahui. Halaman akan dimuat ulang.',
							}).then((result) => {
								if (result.value) {
									window.location.assign('<?=base_url('login')?>');
								}
							}) 
						}
					}); 
				} else {
					$('#password').focus();

					Swal.fire({
						icon: 'error',
						title: 'Oops...',
						text: "Password tidak boleh kosong.", 
						showConfirmButton: false,
						timer: 2000
					})
				}   	 
			} else {
				if (password != "") {
					$('#username').focus();
		
					Swal.fire({
						icon: 'error',
						title: 'Oops...',
						text: "Username tidak boleh kosong.", 
						showConfirmButton: false,
						timer: 2000
					})
				} else {
					$('#username').focus();

					Swal.fire({
						icon: 'error',
						title: 'Oops...',
						text: "Username & Password tidak boleh kosong.",
						showConfirmButton: false,
						timer: 2000
					})
				}
			} 
			
			return false; 
		});
	</script>

<?= $this->endSection() ?>