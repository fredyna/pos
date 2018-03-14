<aside class="main-sidebar">

  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">

    <!-- Sidebar user panel (optional) -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="<?php echo base_url('assets/img/user.png');?>" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p><?php echo $user->first_name;?></p>
        <!-- Status -->
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">MENU</li>
      
      <?php 
        switch($menu){
         
          case 1: ?>
            <li class="active"><a href="<?php echo base_url('home')?>"><i class="fa fa-home"></i> <span>BERANDA</span></a></li>
            <li><a href="<?php echo base_url('user')?>"><i class="fa fa-users"></i> <span>KELOLA USER</span></a></li>

            <li class="treeview">
              <a href="#"><i class="fa fa-tags"></i> <span>KELOLA KATEGORI</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li>
                  <a href="<?php echo base_url('kategori/kategori');?>"><i class="fa fa-angle-double-right"></i> KATEGORI</a>
                </li>
                <li>
                  <a href="<?php echo base_url('kategori/subkategori');?>"><i class="fa fa-angle-double-right"></i> SUB KATEGORI</a>
                </li>
              </ul>
            </li>

            <li><a href="<?php echo base_url('produk')?>"><i class="fa fa-product-hunt"></i> <span>PRODUK</span></a></li>

            <li class="treeview">
              <a href="#"><i class="fa fa-handshake-o"></i> <span>TRANSAKSI</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li>
                  <a href="<?php echo base_url('transaksi/general');?>"><i class="fa fa-angle-double-right"></i> General</a>
                </li>
                <li>
                  <a href="<?php echo base_url('transaksi/konter');?>"><i class="fa fa-angle-double-right"></i> Konter</a>
                </li>
              </ul>
            </li>

            <li class="treeview">
              <a href="#"><i class="fa fa-file"></i> <span>LAPORAN</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li>
                  <a href="<?php echo base_url('laporan/harian');?>"><i class="fa fa-angle-double-right"></i> Laporan Harian</a>
                </li>
                <li>
                  <a href="<?php echo base_url('laporan/bulanan');?>"><i class="fa fa-angle-double-right"></i> Laporan Bulanan</a>
                </li>
              </ul>
            </li>

            <li><a href="<?php echo base_url('setting')?>"><i class="fa fa-cogs"></i> <span>PENGATURAN</span></a></li>

        <?php break;
          case 2: ?>
            <li><a href="<?php echo base_url('home')?>"><i class="fa fa-home"></i> <span>BERANDA</span></a></li>
            <li class="active"><a href="<?php echo base_url('user')?>"><i class="fa fa-users"></i> <span>KELOLA USER</span></a></li>

            <li class="treeview">
              <a href="#"><i class="fa fa-tags"></i> <span>KELOLA KATEGORI</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li>
                  <a href="<?php echo base_url('kategori/kategori');?>"><i class="fa fa-angle-double-right"></i> KATEGORI</a>
                </li>
                <li>
                  <a href="<?php echo base_url('kategori/subkategori');?>"><i class="fa fa-angle-double-right"></i> SUB KATEGORI</a>
                </li>
              </ul>
            </li>

            <li><a href="<?php echo base_url('produk')?>"><i class="fa fa-product-hunt"></i> <span>PRODUK</span></a></li>

            <li class="treeview">
              <a href="#"><i class="fa fa-handshake-o"></i> <span>TRANSAKSI</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li>
                  <a href="<?php echo base_url('transaksi/general');?>"><i class="fa fa-angle-double-right"></i> General</a>
                </li>
                <li>
                  <a href="<?php echo base_url('transaksi/konter');?>"><i class="fa fa-angle-double-right"></i> Konter</a>
                </li>
              </ul>
            </li>

            <li class="treeview">
              <a href="#"><i class="fa fa-file"></i> <span>LAPORAN</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li>
                  <a href="<?php echo base_url('laporan/harian');?>"><i class="fa fa-angle-double-right"></i> Laporan Harian</a>
                </li>
                <li>
                  <a href="<?php echo base_url('laporan/bulanan');?>"><i class="fa fa-angle-double-right"></i> Laporan Bulanan</a>
                </li>
              </ul>
            </li>

            <li><a href="<?php echo base_url('setting')?>"><i class="fa fa-cogs"></i> <span>PENGATURAN</span></a></li>

        <?php break;
          case 3: ?>
            <li><a href="<?php echo base_url('home')?>"><i class="fa fa-home"></i> <span>BERANDA</span></a></li>
            <li class="active"><a href="<?php echo base_url('user')?>"><i class="fa fa-users"></i> <span>KELOLA USER</span></a></li>

            <li class="treeview active">
              <a href="#"><i class="fa fa-tags"></i> <span>KELOLA KATEGORI</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
              <?php switch($submenu){ 
                case 1: ?>
                  <li class="active">
                    <a href="<?php echo base_url('kategori/kategori');?>"><i class="fa fa-angle-double-right"></i> KATEGORI</a>
                  </li>
                  <li>
                    <a href="<?php echo base_url('kategori/subkategori');?>"><i class="fa fa-angle-double-right"></i> SUB KATEGORI</a>
                  </li>
              <?php
                break;
                case 2: ?>
                  <li>
                    <a href="<?php echo base_url('kategori/kategori');?>"><i class="fa fa-angle-double-right"></i> KATEGORI</a>
                  </li>
                  <li class="active">
                    <a href="<?php echo base_url('kategori/subkategori');?>"><i class="fa fa-angle-double-right"></i> SUB KATEGORI</a>
                  </li>
              <?php 
                break;
              }
              ?>
              </ul>
            </li>

            <li><a href="<?php echo base_url('produk')?>"><i class="fa fa-product-hunt"></i> <span>PRODUK</span></a></li>

            <li class="treeview">
              <a href="#"><i class="fa fa-handshake-o"></i> <span>TRANSAKSI</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li>
                  <a href="<?php echo base_url('transaksi/general');?>"><i class="fa fa-angle-double-right"></i> General</a>
                </li>
                <li>
                  <a href="<?php echo base_url('transaksi/konter');?>"><i class="fa fa-angle-double-right"></i> Konter</a>
                </li>
              </ul>
            </li>

            <li class="treeview">
              <a href="#"><i class="fa fa-file"></i> <span>LAPORAN</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li>
                  <a href="<?php echo base_url('laporan/harian');?>"><i class="fa fa-angle-double-right"></i> Laporan Harian</a>
                </li>
                <li>
                  <a href="<?php echo base_url('laporan/bulanan');?>"><i class="fa fa-angle-double-right"></i> Laporan Bulanan</a>
                </li>
              </ul>
            </li>

            <li><a href="<?php echo base_url('setting')?>"><i class="fa fa-cogs"></i> <span>PENGATURAN</span></a></li>

        <?php break;
          case 4: ?>
            <li><a href="<?php echo base_url('home')?>"><i class="fa fa-home"></i> <span>BERANDA</span></a></li>
            <li><a href="<?php echo base_url('user')?>"><i class="fa fa-users"></i> <span>KELOLA USER</span></a></li>

            <li class="treeview">
              <a href="#"><i class="fa fa-tags"></i> <span>KELOLA KATEGORI</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li>
                  <a href="<?php echo base_url('kategori/kategori');?>"><i class="fa fa-angle-double-right"></i> KATEGORI</a>
                </li>
                <li>
                  <a href="<?php echo base_url('kategori/subkategori');?>"><i class="fa fa-angle-double-right"></i> SUB KATEGORI</a>
                </li>
              </ul>
            </li>

            <li class="active"><a href="<?php echo base_url('produk')?>"><i class="fa fa-product-hunt"></i> <span>PRODUK</span></a></li>

            <li class="treeview">
              <a href="#"><i class="fa fa-handshake-o"></i> <span>TRANSAKSI</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li>
                  <a href="<?php echo base_url('transaksi/general');?>"><i class="fa fa-angle-double-right"></i> General</a>
                </li>
                <li>
                  <a href="<?php echo base_url('transaksi/konter');?>"><i class="fa fa-angle-double-right"></i> Konter</a>
                </li>
              </ul>
            </li>

            <li class="treeview">
              <a href="#"><i class="fa fa-file"></i> <span>LAPORAN</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li>
                  <a href="<?php echo base_url('laporan/harian');?>"><i class="fa fa-angle-double-right"></i> Laporan Harian</a>
                </li>
                <li>
                  <a href="<?php echo base_url('laporan/bulanan');?>"><i class="fa fa-angle-double-right"></i> Laporan Bulanan</a>
                </li>
              </ul>
            </li>

            <li><a href="<?php echo base_url('setting')?>"><i class="fa fa-cogs"></i> <span>PENGATURAN</span></a></li>


        <?php break;
          case 5: ?>
            <li><a href="<?php echo base_url('home')?>"><i class="fa fa-home"></i> <span>BERANDA</span></a></li>
            <li><a href="<?php echo base_url('user')?>"><i class="fa fa-users"></i> <span>KELOLA USER</span></a></li>

            <li class="treeview">
              <a href="#"><i class="fa fa-tags"></i> <span>KELOLA KATEGORI</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li>
                  <a href="<?php echo base_url('kategori/kategori');?>"><i class="fa fa-angle-double-right"></i> KATEGORI</a>
                </li>
                <li>
                  <a href="<?php echo base_url('kategori/subkategori');?>"><i class="fa fa-angle-double-right"></i> SUB KATEGORI</a>
                </li>
              </ul>
            </li>

            <li><a href="<?php echo base_url('produk')?>"><i class="fa fa-product-hunt"></i> <span>PRODUK</span></a></li>

            <li class="treeview active">
              <a href="#"><i class="fa fa-handshake-o"></i> <span>TRANSAKSI</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
              <?php 
                switch($submenu){
                  case 1: ?>
                    <li class="active">
                      <a href="<?php echo base_url('transaksi/general');?>"><i class="fa fa-angle-double-right"></i> General</a>
                    </li>
                    <li>
                      <a href="<?php echo base_url('transaksi/konter');?>"><i class="fa fa-angle-double-right"></i> Konter</a>
                    </li>
              <?php break;
                  case 2: ?>
                    <li>
                      <a href="<?php echo base_url('transaksi/general');?>"><i class="fa fa-angle-double-right"></i> General</a>
                    </li>
                    <li class="active">
                      <a href="<?php echo base_url('transaksi/konter');?>"><i class="fa fa-angle-double-right"></i> Konter</a>
                    </li>
              <?php break;
                }
              ?>
                
              </ul>
            </li>

            <li class="treeview">
              <a href="#"><i class="fa fa-file"></i> <span>LAPORAN</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li>
                  <a href="<?php echo base_url('laporan/harian');?>"><i class="fa fa-angle-double-right"></i> Laporan Harian</a>
                </li>
                <li>
                  <a href="<?php echo base_url('laporan/bulanan');?>"><i class="fa fa-angle-double-right"></i> Laporan Bulanan</a>
                </li>
              </ul>
            </li>

            <li><a href="<?php echo base_url('setting')?>"><i class="fa fa-cogs"></i> <span>PENGATURAN</span></a></li>

        <?php break;
          case 6: ?>
            <li><a href="<?php echo base_url('home')?>"><i class="fa fa-home"></i> <span>BERANDA</span></a></li>
            <li><a href="<?php echo base_url('user')?>"><i class="fa fa-users"></i> <span>KELOLA USER</span></a></li>

            <li class="treeview">
              <a href="#"><i class="fa fa-tags"></i> <span>KELOLA KATEGORI</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li>
                  <a href="<?php echo base_url('kategori/kategori');?>"><i class="fa fa-angle-double-right"></i> KATEGORI</a>
                </li>
                <li>
                  <a href="<?php echo base_url('kategori/subkategori');?>"><i class="fa fa-angle-double-right"></i> SUB KATEGORI</a>
                </li>
              </ul>
            </li>

            <li><a href="<?php echo base_url('produk')?>"><i class="fa fa-product-hunt"></i> <span>PRODUK</span></a></li>

            <li class="treeview">
              <a href="#"><i class="fa fa-handshake-o"></i> <span>TRANSAKSI</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li>
                  <a href="<?php echo base_url('transaksi/general');?>"><i class="fa fa-angle-double-right"></i> General</a>
                </li>
                <li>
                  <a href="<?php echo base_url('transaksi/konter');?>"><i class="fa fa-angle-double-right"></i> Konter</a>
                </li>
              </ul>
            </li>

            <li class="treeview active">
              <a href="#"><i class="fa fa-file"></i> <span>LAPORAN</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
              <?php 
                switch($submenu){
                  case 1: ?>
                    <li class="active">
                      <a href="<?php echo base_url('laporan/harian');?>"><i class="fa fa-angle-double-right"></i> Laporan Harian</a>
                    </li>
                    <li>
                      <a href="<?php echo base_url('laporan/bulanan');?>"><i class="fa fa-angle-double-right"></i> Laporan Bulanan</a>
                    </li>
              <?php  break;
                  case 2: ?>
                    <li>
                      <a href="<?php echo base_url('laporan/harian');?>"><i class="fa fa-angle-double-right"></i> Laporan Harian</a>
                    </li>
                    <li class="active">
                      <a href="<?php echo base_url('laporan/bulanan');?>"><i class="fa fa-angle-double-right"></i> Laporan Bulanan</a>
                    </li>
              <?php  break;
                }
              ?>
              </ul>
            </li>

            <li><a href="<?php echo base_url('setting')?>"><i class="fa fa-cogs"></i> <span>PENGATURAN</span></a></li>
        <?php break;
            case 7: ?>

            <li><a href="<?php echo base_url('home')?>"><i class="fa fa-home"></i> <span>BERANDA</span></a></li>
            <li><a href="<?php echo base_url('user')?>"><i class="fa fa-users"></i> <span>KELOLA USER</span></a></li>

            <li class="treeview">
              <a href="#"><i class="fa fa-tags"></i> <span>KELOLA KATEGORI</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li>
                  <a href="<?php echo base_url('kategori/kategori');?>"><i class="fa fa-angle-double-right"></i> KATEGORI</a>
                </li>
                <li>
                  <a href="<?php echo base_url('kategori/subkategori');?>"><i class="fa fa-angle-double-right"></i> SUB KATEGORI</a>
                </li>
              </ul>
            </li>

            <li><a href="<?php echo base_url('produk')?>"><i class="fa fa-product-hunt"></i> <span>PRODUK</span></a></li>

            <li class="treeview">
              <a href="#"><i class="fa fa-handshake-o"></i> <span>TRANSAKSI</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li>
                  <a href="<?php echo base_url('transaksi/general');?>"><i class="fa fa-angle-double-right"></i> General</a>
                </li>
                <li>
                  <a href="<?php echo base_url('transaksi/konter');?>"><i class="fa fa-angle-double-right"></i> Konter</a>
                </li>
              </ul>
            </li>

            <li class="treeview">
              <a href="#"><i class="fa fa-file"></i> <span>LAPORAN</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li>
                  <a href="<?php echo base_url('laporan/harian');?>"><i class="fa fa-angle-double-right"></i> Laporan Harian</a>
                </li>
                <li>
                  <a href="<?php echo base_url('laporan/bulanan');?>"><i class="fa fa-angle-double-right"></i> Laporan Bulanan</a>
                </li>
              </ul>
            </li>

            <li class="active"><a href="<?php echo base_url('setting')?>"><i class="fa fa-cogs"></i> <span>PENGATURAN</span></a></li>
        <?php break;
        }
      ?>
      
      <li><a href="<?php echo base_url('auth/logout');?>"><i class="fa fa-sign-out"></i> <span>KELUAR</span></a></li>
    </ul>
    <!-- /.sidebar-menu -->
  </section>
  <!-- /.sidebar -->
</aside>