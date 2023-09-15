<nav class="navbar" role="navigation" aria-label="main navigation">
  <div class="navbar-brand">
    <a class="navbar-item" href="http://localhost/contabilidad">
      <img src="https://bulma.io/images/bulma-logo.png" width="112" height="28">
    </a>

    <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
    </a>
  </div>

  <div id="navbarBasicExample" class="navbar-menu">
    <div class="navbar-start">
      <a class="navbar-item">
        Información
      </a>

      <div class="navbar-item has-dropdown is-hoverable" href="http://localhost/contabilidad/index.php?vista=formulario">
        <a class="navbar-link">
          Formulario
        </a>
        <div class="navbar-dropdown">
          <a class="navbar-item" href="http://localhost/contabilidad/index.php?vista=formulario">
            Registro
          </a>
          <a class="navbar-item" href="http://localhost/contabilidad/index.php?vista=eliminar-actualizar_formulario">
            Eliminar-Modificar datos formulario
          </a>
     
        </div>
      </div>

      <div class="navbar-item has-dropdown is-hoverable">
        <a class="navbar-link">
          Conceptos
        </a>

        <div class="navbar-dropdown">
          <a class="navbar-item" href="http://localhost/contabilidad/index.php?vista=crear_concepto">
            Crear concepto
          </a>
          <a class="navbar-item" href="http://localhost/contabilidad/index.php?vista=eliminar-actualizar_concepto">
            Eliminar o Actualizar conceptos
          </a>
     
        </div>
      </div>
    </div>

    <div class="navbar-end">
      <div class="navbar-item">
        <div class="buttons">
          <a class="button is-primary">
            <strong>Sign up</strong>
          </a>
          <a class="button is-light">
            Log in
          </a>
        </div>
      </div>
    </div>
  </div>
</nav>