<nav>
	<ul>
		<li>
			<a href="../redsocial/perfil.php"><span class="menu-avatar"></span></a>
		</li>
		<li>
			<form action="#">
				<input type="text" placeholder="Buscar">
					<button>
						<img src="img/glasses.png" height="10" alt="Buscar">
					</button>
			</form>
		</li>
		<li class="menu_option option"><a href="inicio.php">Datos</a></li>
		<li class="option"><a href="perfil.php">Perfil</a></li>		
		<li <?php echo $cadena; ?> class="option"><a href="configuracion.php">Configuración</a></li>
		<li class="option"><a href="controlador/cerrarSesion.php">Cerrar Sesión</a></li>
	</ul>
</nav>