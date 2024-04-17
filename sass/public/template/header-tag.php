<header class="p-3 bg-dark text-white fixed-top">
	<div class="container">
		<div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
			<a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
				<svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap">
					<use xlink:href="#bootstrap"></use>
				</svg>
			</a>

			<ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
				<li><a href="/" class="nav-link px-2 text-secondary">Inicio</a></li>
				<li><a href="#" class="nav-link px-2 text-white">Menu</a></li>
				<?php
				if ($_SESSION['user_info']) {
					echo "<li><a class='nav-link px-2 text-white' href='?proces/show'>Proceso</a></li>";
				}
				if ($_SESSION["admin"] === 1) {
					echo "<li><a class='nav-link px-2 text-white' href='?config/show'>Configuracion</a></li>";
				}
				?>
			</ul>


			<form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
				<input type="search" class="form-control form-control-dark" placeholder="Search..." aria-label="Search">
			</form>

			<div class="dropdown text-end">
				<a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
					<?php
					if (isset($_SESSION['user_info'])) {
						echo "<img alt='userLogo' width='32' height='32' class='rounded-circle' src='{$_SESSION["user_info"]["picture"]}'>";
						//<a href='?user/loginOut'></a>
					}else {
						echo "<a href='?user/show'>Iniciar</a>";
					}
					?>
				</a>
				<ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1">
					<li><a class="dropdown-item" href="#">New project...</a></li>
					<li><a class="dropdown-item" href="#">Settings</a></li>
					<li><a class="dropdown-item" href="#">Profile</a></li>
					<li>
						<hr class="dropdown-divider">
					</li>
					<li><a class="dropdown-item" href="?user/loginOut">Sign out</a></li>
				</ul>
			</div>
		</div>
	</div>
</header>
<main>