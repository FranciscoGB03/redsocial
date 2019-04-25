<?php 
	include("controlador/validarUsuario.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Perfil | Red Social</title>
	<?php 
		include("vistas/scripts.php");
	?>
</head>
<body>
	<header>
		<?php
			include("vistas/menu.php");
		?>
	</header>

	<div class="container banner">
		<div class="user_photo">
			<img src="img/avatar100.jpg" alt="Profile">
			<span class="user_name"><?php echo $_SESSION['nombre']." ".$_SESSION['ape_pat']." ".$_SESSION['ape_mat']; ?></span>
			<span class="user_fullname">Curso</span>
		</div>
		<button class="default"> + Agregar a mi red</button>
	</div>
	<div class="user_menu">
		<a href="#" class="active">Mis Historias</a>
		<a href="#">Información</a>
		<a href="#">Fotos</a>
		<a href="#">Más</a>
	</div>

	<div class="container profile">

		<article>

			<?php 
				for ($i=0; $i < 10; $i++) { 
			?>
			<section>
				<div class="avatar">
					<div class="background_image">
						<img src="img/avatar64.jpg" alt="">
					</div>
					<div class="action">
						<h2><a href="#">comentarios</a></h2>
						<h3> <a href="#">Hace dos horas</a></h3>
					</div>
					<div style="clear:both;"></div>
				</div>
				<div class="status">
					<p>
						Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consectetur exercitationem sit dolores recusandae, reprehenderit atque eos quod excepturi sunt mollitia maxime corrupti, fuga modi vel non architecto quos perspiciatis aperiam? iciatis aperiam
					</p>
				</div>
			</section>
			<?php
			}
			?>

		</article>


		<aside>

			<div class="user_information">
				<h1>Información</h1>
				<p>Hola soy Juna y Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorem, cupiditate!</p>
			</div>
		</aside>

		<div style="clear:both;"></div>
	</div>

	<div class="background_modal" id="openmodal">
		<div class="modal_container">
			<a href="#close" class="close_button"><img src="img/close.png" alt=""></a>
			<div class="modal_content">
				<h1>Aviso</h1>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptates rerum, dolor adipisci molestiae. Fugiat iusto, eos praesentium aut ipsam nam neque tempore dignissimos molestiae commodi eligendi provident reprehenderit ab velit?</p>
			</div>
		</div>
	</div>
	
</body>
</html>