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
                  <li><a href="reports/reporte_titulares.php">Reportes fiadores</a></li>
                  <li><a href="reports/reporte_vehicles.php">Reportes afianzadoras</a></li>
                  <li><a href="reports/reporte_adicionales.php">Reportes fianzas</a></li>
                  <li><a href="reports/reporte_adicionales.php">Reportes fianzas canceladas</a></li>
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
                  <li><a href="reports/reporte_titulares.php">Reportes fiadores</a></li>
                  <li><a href="reports/reporte_vehicles.php">Reportes afianzadoras</a></li>
                  <li><a href="reports/reporte_adicionales.php">Reportes fianzas</a></li>
                  <li><a href="reports/reporte_adicionales.php">Reportes fianzas canceladas</a></li>
              </ul>
            </div>
            <span class="title">REPORTES</span>
        </div>
        <?}?>

        <!-- Finaliza modulo Reportes-->

        <!-- Inicia modulo titulaes-->
        <div class="group">

            <div class="ribbon-split-button">
            <a href="<?php echo base_url(); ?>all/fiadores_gestionar">
                    <button class="ribbon-main">
                        <span class="icon ribbon-main">
                            <span class="mif-database"></span>
                        </span>
                    </button>
                </a>
                    <span class="ribbon-split dropdown-toggle">Gestionar</span>
                    <ul class="ribbon-dropdown" data-role="dropdown" data-duration="100">
                        <li><a href="<?php echo base_url(); ?>all/fiadores_gestionar"><span class="mif-database"></span> Gestionar</a></li>
                        <li><a href="#" onclick="document.getElementById('add_fiador').style.display='block'"><span class="mif-plus"></span> Agregar</a></li>
                        <li><a href="#" onclick="document.getElementById('search_fiador').style.display='block'; document.getElementById('1search').focus();"><span class="mif-search"></span> Buscar</a></li>
                    </ul>
            </div>


            <span class="title">Fiadores</span>

        </div>
        <!-- Finaliza modulo titulaes-->

        <!-- Inicia modulo vehiculos-->
        <div class="group">
        
            <div class="ribbon-split-button">
                <a href="<?php echo base_url(); ?>all/afianzadoras">
                        <button class="ribbon-main">
                            <span class="icon ribbon-main">
                                <span class="mif-database"></span>
                            </span>
                        </button>
                    </a>
                    <span class="ribbon-split dropdown-toggle">Gestionar</span>
                    <ul class="ribbon-dropdown" data-role="dropdown" data-duration="100">
                        <li><a href="<?php echo base_url(); ?>all/afianzadoras"><span class="mif-database"></span> Gestionar</a></li>
                        <li><a href="#" onclick="document.getElementById('add_afianzadora').style.display='block'"><span class="mif-plus"></span> Agregar</a></li>
                        <li><a href="#" onclick="document.getElementById('search_afianzadora').style.display='block'; document.getElementById('2search').focus();"><span class="mif-search"></span> Buscar</a></li>
                    </ul>
            </div>
            
            <div class="ribbon-split-button">
                <a href="<?php echo base_url(); ?>all/afianzadores_tipos">
                        <button class="ribbon-main">
                            <span class="icon ribbon-main">
                                <span class="mif-file-text"></span>
                            </span>
                        </button>
                    </a>
                    <span class="ribbon-split dropdown-toggle">Tipos</span>
                    <ul class="ribbon-dropdown" data-role="dropdown" data-duration="100">
                        <li><a href="<?php echo base_url(); ?>all/afianzadores_tipos"><span class="mif-database"></span> Vizualizar</a></li>
                        <li><a href="#" onclick="document.getElementById('add_afianzadora_tipo').style.display='block';"><span class="mif-plus"></span> Agregar</a></li>    
                    </ul>
            </div>
            

            <span class="title">Afianzadoras</span>
        </div>
        <!-- Finaliza modulo vehiculos-->

        <!-- Finaliza modulo Reportes-->

        <!-- Inicia modulo titulaes-->
        <div class="group">
            <button onclick="document.getElementById('add_fianza').style.display='block'" class="ribbon-button">
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
            
            <button onclick="document.getElementById('search_fianza').style.display='block'; document.getElementById('3search').focus();" class="ribbon-button">
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


            <div class="ribbon-split-button">
            <a href="<?php echo base_url(); ?>all/comisiones">
                <button class="ribbon-main">
                    <span class="icon ribbon-main">
                        <span class="mif-dollar"></span>
                    </span>
                </button>
            </a>
                <span class="ribbon-split dropdown-toggle">Comisiones</span>
                <ul class="ribbon-dropdown" data-role="dropdown" data-duration="100">
                    <li><a href="comisiones" ><span class="mif-dollar"></span> Gestionar</a></li>
                    <li><a href="add_comisiones" ><span class="mif-plus"></span> Agregar</a></li>
                    <li><a href="#" onclick="document.getElementById('search_comisiones').style.display='block'; document.getElementById('search_comisiones_input').focus();" ><span class="mif-search"></span> Buscar</a></li>
                </ul>
            </div>

            <span class="title">Gestion</span>
        </div>
        <!-- Finaliza modulo Adicionales-->
        <!-- Inicia modulo usuarios-->
        <div class="group">
            
            <div class="ribbon-split-button">
                <a href="<?php echo base_url(); ?>all/manager_users">
                        <button class="ribbon-main">
                            <span class="icon ribbon-main">
                                <span class="mif-users"></span>
                            </span>
                        </button>
                    </a>
                    <span class="ribbon-split dropdown-toggle">Gestionar</span>
                    <ul class="ribbon-dropdown" data-role="dropdown" data-duration="100">
                        <li><a href="#" onclick="document.getElementById('add_user_sistem').style.display='block';"><span class="mif-user-plus"></span> Nuevo usuario</a></li>
                        <li><a href="<?php echo base_url(); ?>all/manager_users" ><span class="mif-user-plus"></span> Gestionar</a></li>
                    </ul>
            </div>

            
            <span class="title">Usuarios</span>
        </div>
        <!-- Finaliza modulo usuarios-->
      </div>
  </div>
</nav>
<!-- Finaliza Menu -->
<div  style="background-color: #dcdcdc; width:100%;">
<div class="container">