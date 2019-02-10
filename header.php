<div class="page-header mdl-layout__header mdl-layout__header--waterfall">
    <div class="mdl-layout__header-row">
          <span class="page-title mdl-layout-title">
            <img id="imageHome" class="optic-logo-image" src="images/optica-logo.png" alt="">
          </span>
        <!-- Add spacer, to align navigation to the right in desktop -->
        <div class="page-header-spacer mdl-layout-spacer"></div>
        <!-- Navigation -->
        <div class="page-navigation-container">
            <nav class="page-navigation mdl-navigation">
                <a class="mdl-navigation__link mdl-typography--text-uppercase" href="formulas.php">Formulas</a>
                <a class="mdl-navigation__link mdl-typography--text-uppercase" href="#">Examenes</a>
                <a class="mdl-navigation__link mdl-typography--text-uppercase" href="#">Diagnosticos</a>
                <a class="mdl-navigation__link mdl-typography--text-uppercase" href="#">Procedimientos</a>
                <a class="mdl-navigation__link mdl-typography--text-uppercase" href="#">Recetario</a>
                <a class="mdl-navigation__link mdl-typography--text-uppercase" href="#">Garantias</a>
                <?php
                if ($isLogin) {
                    echo '
                        <span class="mdl-chip mdl-chip--contact">
                            <span class="mdl-chip__contact mdl-color--amber mdl-color-text--white">' . $user['name'][0] . '</span>
                            <span class="mdl-chip__text">' . $user['name'] . ' </span>
                            <a onclick="logout()" class="mdl-chip__action"><i class="material-icons">cancel</i></a>
                        </span>';
                }
                ?>
            </nav>
        </div>
        <span class="page-mobile-title mdl-layout-title">
                <img class="optic-logo-image" src="images/optica-logo.png" alt="">
            </span>
        <button class="page-more-button mdl-button mdl-js-button mdl-button--icon mdl-js-ripple-effect"
                id="more-button">
            <i class="material-icons">more_vert</i>
        </button>
        <ul class="mdl-menu mdl-js-menu mdl-menu--bottom-right mdl-js-ripple-effect" for="more-button">
            <?php
            if ($isLogin) {
                ?>
                <li onclick="logout()" class="mdl-menu__item">
                    Cerrar sesion
                </li>
                <?php
            } else {
                ?>
                <li onclick="adminlogin()" class="mdl-menu__item">
                    Acceso Administrativo
                </li>
                <li onclick="userlogin()" class="mdl-menu__item">
                    Acceso Usuarios
                </li>
                <?php
            }
            ?>
        </ul>
    </div>
</div>
<?php
if ($isLogin) {
    ?>
    <div class="page-drawer mdl-layout__drawer">
                    <span class="mdl-layout-title">
                      <img class="optic-logo-image" src="images/optica-logo-white.png" alt="">
                    </span>
        <nav class="mdl-navigation">
            <a class="mdl-navigation__link" href="historiascli.php">
                        <span>
                          <img class="icon-logo-nav" src="images/hclinicasv.png" alt="">
                          Historias Clinicas
                        </span>
            </a>
            <a class="mdl-navigation__link" href="">
                        <span>
                          <img class="icon-logo-nav" src="images/hevoluciones.png" alt="">
                          Hoja de evoluciones
                        </span>
            </a>
            <a class="mdl-navigation__link" href="citas.php">
                        <span>
                          <img class="icon-logo-nav" src="images/citasv.png" alt="">
                          Citas
                        </span>
            </a>
            <a class="mdl-navigation__link" href="">
                        <span>
                          <img class="icon-logo-nav" src="images/fcompra.png" alt="">
                          Facturas de compra
                        </span>
            </a>
            <a class="mdl-navigation__link" href="">
                        <span>
                          <img class="icon-logo-nav" src="images/formulas.png" alt="">
                          Formulas
                        </span>
            </a>
            <a class="mdl-navigation__link" href="">
                        <span>
                          <img class="icon-logo-nav" src="images/citas.png" alt="">
                          Pedidos cliente
                        </span>
            </a>
            <?php
            if ($user['type'] == 2) {
                ?>
                <div class="page-drawer-separator"></div>
                <span class="mdl-navigation__link">Administrativo</span>
                <a class="mdl-navigation__link" href="">Pago nomina</a>
                <a class="mdl-navigation__link" href="">Control de producto</a>
                <a class="mdl-navigation__link" href="">Pedido labroatorio</a>
                <a class="mdl-navigation__link" href="">Consentimiento informado</a>
                <?php
            }
            ?>
            <div class="page-drawer-separator"></div>
            <a class="mdl-navigation__link" href="register.php">Registro de usuario</a>
        </nav>
    </div>
    <?php
}
?>
