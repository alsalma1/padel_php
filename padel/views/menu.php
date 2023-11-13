<div class="divMenu">
    <h4 class="rol"><?php echo "Hola ".$_SESSION['nombreUsuario'] ?></h4>
    <p class="Gp"><a href="index.php?controller=app&action=mostrarPerfilUsuario">Mi perfil</a></p>
    <p  class="Gc"><a href="index.php?controller=app&action=reservasUsuario">Mis reservas</a></p>
    <p  class="Gc"><a href="index.php?controller=app&action=reservarPista">Reservar pista</a></p>
    <p class="salir"><a href="index.php?controller=app&action=salir">Cerrar sesión</a></p>
</div>
