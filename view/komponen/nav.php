    <?php 
    if(isset($_GET)){
    ?>
<ul class="nav nav-list">
        <li class="<?php if($_GET['panel'] == 'user'){
            echo"active";
        } ?>">
            <a href="?panel=user">
                <i class="menu-icon fa fa-user"></i>
                <span class="menu-text"> User </span>
            </a>

            <b class="arrow"></b>
        </li>

    <li class="<?php if($_GET['panel'] == 'suplayer'){
            echo"active";
        } ?>">
        <a href="?panel=suplayer">
            <i class="menu-icon fa fa-users"></i>
            <span class="menu-text"> Suplayer </span>
        </a>

        <b class="arrow"></b>
    </li>

    <li class="<?php if($_GET['panel'] == 'kontaktor'){
            echo"active";
        } ?>">
        <a href="?panel=kontaktor">
            <i class="menu-icon fa fa-cog"></i>
            <span class="menu-text"> Kontraktor </span>
        </a>

        <b class="arrow"></b>
    </li>

    <li class="<?php if($_GET['panel'] == 'pekerjaan'){
            echo"active";
        } ?>">
        <a href="?panel=pekerjaan">
            <i class="menu-icon glyphicon fa fa-cogs"></i>
            <span class="menu-text"> Pekerjaan </span>
        </a>

        <b class="arrow"></b>
    </li>
    <!-- lists -->
        <li class="
            <?php if($_GET['panel'] == 'proyek' ||
                    $_GET['panel'] == 'rab'
                    ){
                        echo"active";
            } ?>"
        >
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-tachometer"></i>
                <span class="menu-text"> Proyek </span>

                <b class="arrow fa fa-angle-down"></b>
            </a>

            <b class="arrow"></b>

            <ul class="submenu">
                <li class="<?php if($_GET['panel'] == 'proyek'){
                        echo"active";
                    } ?>">
                    <a href="?panel=proyek">
                        <i class="menu-icon fa fa-hdd-o"></i>
                        <span style="display: block; text-indent: 10px">
                            Data Proyek
                        </span>
                        
                    </a>

                    <b class="arrow"></b>
                </li>

                <li class="<?php if($_GET['panel'] == 'rab'){
                        echo"active";
                    } ?>">
                    <a href="?panel=rab">
                        <i class="menu-icon glyphicon  glyphicon-euro"></i>
                         <span style="display: block; text-indent: 10px">
                             Rancangan Anggaran
                         </span>
                        
                    </a>

                    <b class="arrow"></b>
                </li>

                <li class="<?php if($_GET['panel'] == 'material'){
                        echo"active";
                    } ?>">
                    <a href="?panel=material">
                        <i class="menu-icon fa fa-gavel"></i>
                         <span style="display: block; text-indent: 10px">
                             Material
                         </span>
                    </a>

                    <b class="arrow"></b>
                </li>

            </ul>
        </li>

    </li>
   
</ul>

<?php 
  }
?>