<div class="user_information">
	<div class="avatar">
		<span class="aside-avatar" style="background:url(img/avatar100.jpg) center;"></span>
	</div>
	<div class="information">
		<h1 id="user_nick"><?php echo $_SESSION['usuario']; ?></h1>
		<h1 id="user_name"><?php echo $_SESSION['nombre']." ".$_SESSION['ape_pat']." ".$_SESSION['ape_mat']; ?></h1>
		<div class="stats">
			<span class="rating">3K</span>
			<span class="rating_text">veces leído</span>
		</div>
	</div>
	<div style="clear:both;"></div>
</div>
<div class="user_information">
	<h1>Tus Escritores</h1>
	<p>Esta es alguna información relevante</p>
</div>
<footer>
	FGB &copy; 2018.
</footer>