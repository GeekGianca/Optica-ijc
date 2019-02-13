<header class="demo-header mdl-layout__header mdl-color--grey-100 mdl-color-text--grey-600">
    <div class="mdl-layout__header-row">
        <span class="mdl-layout-title">Inicio</span>
        <div class="mdl-layout-spacer"></div>
        <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon" id="notification">
            <i class="material-icons mdl-badge mdl-badge--overlap" data-badge="0">notification_important</i>
        </button>
        <ul class="mdl-menu mdl-js-menu mdl-js-ripple-effect mdl-menu--bottom-right" id="menunotificacion"
            for="notification">

        </ul>
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable">
            <label class="mdl-button mdl-js-button mdl-button--icon" for="search">
                <i class="material-icons">search</i>
            </label>
            <div class="mdl-textfield__expandable-holder">
                <input class="mdl-textfield__input" type="text" id="search">
                <label class="mdl-textfield__label" for="search">Enter your query...</label>
            </div>
        </div>
        <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon" id="hdrbtn">
            <i class="material-icons">more_vert</i>
        </button>
        <ul class="mdl-menu mdl-js-menu mdl-js-ripple-effect mdl-menu--bottom-right" for="hdrbtn">
            <li onclick="logout()" class="mdl-menu__item">Cerrar sesion</li>
        </ul>
    </div>
</header>
<div class="demo-drawer mdl-layout__drawer mdl-color--blue-grey-900 mdl-color-text--blue-grey-50">
    <header class="demo-drawer-header">
        <img src="images/user.jpg" class="demo-avatar">
        <div class="demo-avatar-dropdown">
            <span id="username_iduser"><?php echo $user['name']; ?></span>
            <div class="mdl-layout-spacer"></div>
            <button id="accbtn" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon">
                <i class="material-icons" role="presentation">arrow_drop_down</i>
                <span class="visuallyhidden">Accounts</span>
            </button>
            <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect" for="accbtn">
                <li class="mdl-menu__item"><i class="material-icons">add</i>Registrar nuevo</li>
            </ul>
        </div>
    </header>
    <nav class="demo-navigation mdl-navigation mdl-color--blue-grey-800">
        <a class="mdl-navigation__link" href="admin.php"><i class="mdl-color-text--blue-grey-400 material-icons"
                                                   role="presentation">home</i>Inicio</a>
        <a class="mdl-navigation__link" href="admincitas.php"><i class="mdl-color-text--blue-grey-400 material-icons"
                                                   role="presentation">inbox</i>Citas</a>
        <a class="mdl-navigation__link" href="proveedores.php"><i class="mdl-color-text--blue-grey-400 material-icons"
                                                   role="presentation">delete</i>Proveedores</a>
        <a class="mdl-navigation__link" href=""><i class="mdl-color-text--blue-grey-400 material-icons"
                                                   role="presentation">report</i>Consultas</a>
        <a class="mdl-navigation__link" href=""><i class="mdl-color-text--blue-grey-400 material-icons"
                                                   role="presentation">forum</i>Formulas</a>
        <a class="mdl-navigation__link" href=""><i class="mdl-color-text--blue-grey-400 material-icons"
                                                   role="presentation">flag</i>Examenes</a>
        <a class="mdl-navigation__link" href=""><i class="mdl-color-text--blue-grey-400 material-icons"
                                                   role="presentation">local_offer</i>Productos</a>
        <a class="mdl-navigation__link" href=""><i class="mdl-color-text--blue-grey-400 material-icons"
                                                   role="presentation">shopping_cart</i>Ventas</a>
        <a class="mdl-navigation__link" href=""><i class="mdl-color-text--blue-grey-400 material-icons"
                                                   role="presentation">people</i>Usuarios</a>
        <div class="mdl-layout-spacer"></div>
        <a class="mdl-navigation__link" href=""><i class="mdl-color-text--blue-grey-400 material-icons"
                                                   role="presentation">help_outline</i><span class="visuallyhidden">Ayuda</span></a>
    </nav>
</div>