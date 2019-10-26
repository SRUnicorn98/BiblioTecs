<div class="wrapper">

    <header class="main-header">
      <!-- Logo -->
      <a href="index2.html" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>PlS</b></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Plu</b>SIS</span>
      </a>
      <!-- Header Navbar: style can be found in header.less -->
      <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
          <span class="sr-only">Toggle navigation</span>
        </a>
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <!-- Messages: style can be found in dropdown.less-->
          
            <!-- User Account: style can be found in dropdown.less -->
            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="<?=  $usuario->imagenurl;  ?>"  alt="User Image"  style="width:20px;height:20px;">
                <span class="hidden-xs"><?=  $usuario->nombres;  ?></span>
              </a>
              <ul class="dropdown-menu">
                <!-- User image -->
                <li class="user-header">
                    <?php if($usuario->imagenurl==""){ $usuario->imagenurl="imagenes/avatar.jpg"; }  ?>
                    <img src="<?=  $usuario->imagenurl;  ?>"  alt="User Image"  style="width:50px;height:50px;">
                  <p>
                   Usuario Plusis
                    <small>Member since Nov. 2012</small>
                  </p>
                </li>
                <!-- Menu Body -->
                <li class="user-body">
                  <div class="col-xs-4 text-center">
                    <a href="#">Followers</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Sales</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Friends</a>
                  </div>
                </li>
                <!-- Menu Footer-->
                <li class="user-footer">
                  <div class="pull-left">
                    <a href="#" class="btn btn-default btn-flat">Perfil</a>
                  </div>
                  <div class="pull-right">
                    <a href="logout" class="btn btn-default btn-flat">Salir</a>
                  </div>
                </li>
              </ul>
            </li>
            <!-- Control Sidebar Toggle Button -->
            <li>
              <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
            </li>
          </ul>
        </div>
      </nav>


    </header>
    <!-- Left side column. contains the logo and sidebar -->
    
    <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
          <div class="pull-left image">
              <?php if($usuario->imagenurl==""){ $usuario->imagenurl="imagenes/avatar.jpg"; }  ?>
            <img src="<?=  $usuario->imagenurl;  ?>"  alt="User Image"  style="width:50px;height:50px;">
          </div>
          <div class="pull-left info">
            <p>Usuario: <?=  $usuario->nombres;  ?></p>
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
          </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
          <div class="input-group">
            <input type="text" name="q" class="form-control" placeholder="Search...">
            <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
            </span>
          </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
          <li class="header">MENÚ</li>
          <li class="active treeview">
            <a href="#">
              <i class="fa fa-dashboard"></i> <span>Panel de control</span> <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
              <li class="active"><a href="javascript:void(0);" onclick="cargarformulario(1);" ><i class="fa fa-circle-o"></i>Agregar usuario </a></li>
              <li class="active"><a href="javascript:void(0);" onclick="cargarlistado(1,1);" ><i class="fa fa-circle-o"></i>Listado Usuarios</a></li>
            </ul>
          </li>  


          <li class="treeview">
            <a href="#">
              <i class="fa fa-fw fa-user-plus"></i> <span>Datos</span> <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
              <li class="active"><a href="javascript:void(0);" onclick="cargarformulario(2);" ><i class="fa fa-circle-o"></i>Cargar Datos Us. </a></li>
              
            </ul>
          </li>  


        
        </ul>




      </section>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="min-height:2000px !important;">
      <!-- Content Header (Page header) -->
      <section class="content-header"> 
        <h1>
          Escritorio
          <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i>Inicio</a></li>
          <li class="active">Dashboard</li>
        </ol>
      </section>

       <!-- contenido capas modales -->

          <section> 
                   <div id="capa_modal" class="div_modal" ></div>
                   <div id="capa_para_edicion" class="div_contenido" > 
                    <input type="hidden" id="usuario_seleccionado" value="0"  />
                    <input type="hidden" id="seccion_seleccionada" value="0"  />

                    <div class="margin"  id="botones_control" >
                        <button type="button" class="btn btn-success " 
                        onClick="location='retornar_listado_usuarios'">Regresar</button>
                        <button type="button" class="btn btn-primary" onclick="mostrarseccion(1);" >Informacion</button>
                        <button type="button" class="btn btn-primary" onclick="mostrarseccion(2);" >Educación</button>
                                
                               
                    </div>
                  

                    <div  id="contenido_capa_edicion" ></div>
          </section>

     

      <!-- contenido principal -->
      <section class="content"  id="contenido_principal">
      
      </section>
  
    <!-- cargador empresa -->
      <div style="display: none;" id="cargador_empresa" align="center">
          <br>
       

       <label style="color:#FFF; background-color:#ABB6BA; text-align:center">&nbsp;&nbsp;&nbsp;Espere... &nbsp;&nbsp;&nbsp;</label>

       <img src="imagenes/cargando.gif" align="middle" alt="cargador"> &nbsp;<label style="color:#ABB6BA">Realizando tarea solicitada ...</label>

        <br>
       <hr style="color:#003" width="50%">
       <br>
     </div>





    </div><!-- /.content-wrapper -->
   


   
  </div><!-- ./wrapper -->
