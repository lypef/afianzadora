<!-- Menu -->
<nav data-role="ribbonmenu">
  <ul class="tabs-holder">
      <li class="static"><a href="<?php echo base_url(); ?>all/login_close"><span class="mif-cross"></span> SALIR</a></li>
      <li class="static"><a href="<?php echo base_url(); ?>all/dashboard"><span class="mif-home"></span> <?php echo $this->session->userdata('session_name'); ?></a></li>
      <li><a href="#section-usuarios">opciones</a></li>
  </ul>

  <div class="content-holder">
      <div class="section" id="section-usuarios">
        <!-- Inicia modulo Reportes-->
        <? if (true)
        {?>

        <div class="group">
          <div class="ribbon-split-button">
              <button class="ribbon-main">
                  <span class="icon ribbon-main">
                      <span class="mif-file-pdf"></span>
                  </span>
              </button>
              <span class="ribbon-split dropdown-toggle">pdf</span>
              <ul class="ribbon-dropdown" data-role="dropdown" data-duration="100">
                  <li><a href="reports/reporte_titulares.php">Reportes titulares</a></li>
                  <li><a href="reports/reporte_vehicles.php">Reportes vehiculos</a></li>
                  <li><a href="reports/reporte_adicionales.php">Reportes adicionales</a></li>
                  <li><a href="reports/reporte_vehicles_vencidos.php">Engomados vencidos</a></li>
              </ul>
            </div>
            <div class="ribbon-split-button">
              <button class="ribbon-main">
                  <span class="icon ribbon-main">
                      <span class="mif-file-excel"></span>
                  </span>
              </button>
              <span class="ribbon-split dropdown-toggle">xls</span>
              <ul class="ribbon-dropdown" data-role="dropdown" data-duration="100">
                  <li><a href="reports/reporte_titulares_xls.php">Reportes titulares</a></li>
                  <li><a href="reports/reporte_vehicles_xls.php">Reportes vehiculos</a></li>
                  <li><a href="reports/reporte_adicionales_xls.php">Reportes adicionales</a></li>
                  <li><a href="reports/reporte_vehicles_vencidos_xls.php">Engomados vencidos</a></li>
              </ul>
            </div>
            <span class="title">REPORTES</span>
        </div>
        <?}?>

        <!-- Finaliza modulo Reportes-->

        <!-- Inicia modulo titulaes-->
        <div class="group">
            <button onclick="Metro.dialog.open('#add_fiador')" class="ribbon-button">
                    <span class="icon">
                        <span class="mif-plus"></span>
                    </span>
                <span class="caption">Agregar</span>
            </button>

            <a href="<?php echo base_url(); ?>all/fiadores_gestionar">
            <button class="ribbon-button">
                    <span class="icon">
                        <span class="mif-database"></span>
                    </span>
                <span class="caption">Gestionar</span>
            </button>
            </a>

            <button onclick="Metro.dialog.open('#search_fiador')" class="ribbon-button">
                    <span class="icon">
                        <span class="mif-search"></span>
                    </span>
                <span class="caption">Buscar</span>
            </button>
            <span class="title">Fiadores</span>

        </div>
        <!-- Finaliza modulo titulaes-->

        <!-- Inicia modulo vehiculos-->
        <div class="group">
            
            <button onclick="Metro.dialog.open('#add_afianzadora')" class="ribbon-button">
                    <span class="icon">
                        <span class="mif-plus"></span>
                    </span>
                <span class="caption">Agregar</span>
            </button>
            

            <a href="<?php echo base_url(); ?>all/afianzadoras">
            <button class="ribbon-button">
                    <span class="icon">
                        <span class="mif-database"></span>
                    </span>
                <span class="caption">Gestionar</span>
            </button>
            </a>

            
            <button onclick="Metro.dialog.open('#search_afianzadora')" class="ribbon-button">
                    <span class="icon">
                        <span class="mif-search"></span>
                    </span>
                <span class="caption">Buscar</span>
            </button>
            
            <a href="<?php echo base_url(); ?>all/afianzadores_tipos">
            <button class="ribbon-button">
                    <span class="icon">
                        <span class="mif-file-text"></span>
                    </span>
                <span class="caption">Tipos</span>
            </button>
            </a>

            <button onclick="Metro.dialog.open('#add_afianzadora_tipo')" class="ribbon-button">
                    <span class="icon">
                        <span class="mif-note-add"></span>
                    </span>
                <span class="caption">Agregar Tipo</span>
            </button>

            <span class="title">Afianzadoras</span>
        </div>
        <!-- Finaliza modulo vehiculos-->

        <!-- Finaliza modulo Reportes-->

        <!-- Inicia modulo titulaes-->
        <div class="group">
            <button onclick="Metro.dialog.open('#add_fianza')" class="ribbon-button">
                    <span class="icon">
                        <span class="mif-plus"></span>
                    </span>
                <span class="caption">Agregar</span>
            </button>

            <a href="<?php echo base_url(); ?>all/fianzas_gestionar">
            <button class="ribbon-button">
                    <span class="icon">
                        <span class="mif-database"></span>
                    </span>
                <span class="caption">Gestionar</span>
            </button>
            </a>
            
            <a href="<?php echo base_url(); ?>all/fianzas_gestionar_cancelaciones">
            <button onclick="search_adicionales()" class="ribbon-button">
                    <span class="icon">
                        <span class="mif-cross"></span>
                    </span>
                <span class="caption">Cancelaciones</span>
            </button>
            </a>
            
            <button onclick="Metro.dialog.open('#search_fianza');" class="ribbon-button">
                    <span class="icon">
                        <span class="mif-search"></span>
                    </span>
                <span class="caption">Buscar</span>
            </button>

            <span class="title">Fianzas</span>
            
        </div>
        <!-- Finaliza modulo titulaes-->

        <!-- Inicia modulo Adicionales-->
        <div class="group">
            <a href="gest_adicionales.php?pagina=1">
            <button class="ribbon-button">
                    <span class="icon">
                        <span class="mif-visa"></span>
                    </span>
                <span class="caption">Cobranza</span>
            </button></a>

            <a href="gest_adicionales.php?pagina=1">
            <button class="ribbon-button">
                    <span class="icon">
                        <span class="mif-credit-card"></span>
                    </span>
                <span class="caption">Pagos</span>
            </button></a>

            <a href="gest_adicionales.php?pagina=1">
            <button class="ribbon-button">
                    <span class="icon">
                        <span class="mif-compass"></span>
                    </span>
                <span class="caption">Emisiones</span>
            </button></a>

            <a href="gest_adicionales.php?pagina=1">
            <button class="ribbon-button">
                    <span class="icon">
                        <span class="mif-dollar"></span>
                    </span>
                <span class="caption">Pago de comisiones</span>
            </button></a>

            <span class="title">Gestion</span>
        </div>
        <!-- Finaliza modulo Adicionales-->
        <!-- Inicia modulo usuarios-->
        <div class="group">
            
            <button onclick="Metro.dialog.open('#add_user_sistem');"  class="ribbon-button">
                    <span class="icon">
                        <span class="mif-user-plus"></span>
                    </span>
                <span class="caption">Agregar usuario</span>
            </button>
            

            <a href="<?php echo base_url(); ?>all/manager_users">
            <button class="ribbon-button">
                    <span class="icon">
                        <span class="mif-users"></span>
                    </span>
                <span class="caption">Gestionar usuarios</span>
            </button>
            </a>

            <span class="title">Usuarios</span>
        </div>
        <!-- Finaliza modulo usuarios-->
      </div>
  </div>
</nav>
<!-- Finaliza Menu -->
<div  style="background-color: #dcdcdc; width:100%;">
<div class="container">