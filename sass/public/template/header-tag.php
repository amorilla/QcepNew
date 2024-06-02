<header class="p-3 bg-dark text-white fixed-top">
	<div class="container">
		<div class="d-flex flex-wrap align-items-center justify-content-between">
			<!-- Logo -->
			<a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
				<?php if (isset($_SESSION["logo"])) { echo '<img src='.$_SESSION["logo"][0]["logo"].' alt="Logo" id="logoImg" class="logoImg me-2" style="width: 50px; height: auto;">';}
				?>
			</a>

			<!-- Navigation -->
			<ul class="nav col-12 col-lg-auto mb-2 justify-content-center mb-md-0">
				<li><a href="/" class="nav-link px-2 text-secondary">Inici</a></li>
				<li><a href="#" class="nav-link px-2 text-white">Menú</a></li>
				<?php
				if (isset($_SESSION["user_info"]) && $_SESSION['user_info']) {
					echo "<li><a class='nav-link px-2 text-white' href='?proces/show'>Processos</a></li>";
				}
				if (isset($_SESSION["admin"]) && $_SESSION["admin"] === 1) {
					echo "<li><a class='nav-link px-2 text-white' href='?config/show'>Configuració</a></li>";
				}
				?>
			</ul>

			<!-- Search Form -->
			<!-- <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
				<input type="search" class="form-control form-control-dark" placeholder="Search..." aria-label="Search">
			</form> -->

			<!-- User Dropdown -->
			<div class="dropdown text-end">
				<a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
					<?php
					if (isset($_SESSION['user_info'])) {
						echo "<img alt='userLogo' width='32' height='32' class='rounded-circle' src='{$_SESSION["user_info"]["picture"]}'>";
					}
					?>
				</a>
				<ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1">
					<li><a class="dropdown-item" href="#">New project...</a></li>
					<li><a class="dropdown-item" href="?config/show">Settings</a></li>
					<li><a class="dropdown-item" href="#">Profile</a></li>
					<li>
						<hr class="dropdown-divider">
					</li>
					<li><a class="dropdown-item" href="?user/loginOut">Sign out</a></li>
				</ul>
			</div>

			<!-- Login Button -->
			<?php
			if (!isset($_SESSION['user_info'])) {
				echo "<button id='loginButton' class='btn btn-primary'>Iniciar sesión</button>";
			}
			?>
		</div>
	</div>
</header>

<!-- Google Login Modal -->
<div class="modal fade" id="googleLoginModal" tabindex="-1" aria-labelledby="googleLoginModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="googleLoginModalLabel">Iniciar Usuario</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body d-flex justify-content-center">
				<button id="googleSignInButton" class="btn btn-danger gsi-material-button">
					<div class="gsi-material-button-state"></div>
					<div class="gsi-material-button-content-wrapper d-flex align-items-center">
						<div class="gsi-material-button-icon me-2">
							<svg width="30" height="30" version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" xmlns:xlink="http://www.w3.org/1999/xlink" style="display: block;">
								<path fill="#EA4335" d="M24 9.5c3.54 0 6.71 1.22 9.21 3.6l6.85-6.85C35.9 2.38 30.47 0 24 0 14.62 0 6.51 5.38 2.56 13.22l7.98 6.19C12.43 13.72 17.74 9.5 24 9.5z"></path>
								<path fill="#4285F4" d="M46.98 24.55c0-1.57-.15-3.09-.38-4.55H24v9.02h12.94c-.58 2.96-2.26 5.48-4.78 7.18l7.73 6c4.51-4.18 7.09-10.36 7.09-17.65z"></path>
								<path fill="#FBBC05" d="M10.53 28.59c-.48-1.45-.76-2.99-.76-4.59s.27-3.14.76-4.59l-7.98-6.19C.92 16.46 0 20.12 0 24c0 3.88.92 7.54 2.56 10.78l7.97-6.19z"></path>
								<path fill="#34A853" d="M24 48c6.48 0 11.93-2.13 15.89-5.81l-7.73-6c-2.15 1.45-4.92 2.3-8.16 2.3-6.26 0-11.57-4.22-13.47-9.91l-7.98 6.19C6.51 42.62 14.62 48 24 48z"></path>
								<path fill="none" d="M0 0h48v48H0z"></path>
							</svg>
						</div>
						<span class="gsi-material-button-contents">Sign in with Google</span>
						<span style="display: none;">Sign in with Google</span>
					</div>
				</button>
			</div>
		</div>
	</div>
</div>

<script>
	document.getElementById('googleSignInButton').addEventListener('click', function() {
	<?php
		echo "window.location.href = '".$GLOBALS['CFG']->url."?user/loginGoogle';";
	?>
	});
</script>

<main>