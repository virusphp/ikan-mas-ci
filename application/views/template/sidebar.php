<div class="left main-sidebar">
    <div class="sidebar-inner leftscroll">
        <div id="sidebar-menu">    
        <ul>
        <?php 
        if($this->session->userdata('usergroup')=='Admin'){
            echo '
                <li class="submenu">
                    <a href="'.base_url('home').'"><i class="fa fa-fw fa-home"></i><span> Home </span> </a>
                </li>
                <li class="submenu">
                <a href="#"><i class="fa fa-fw fa-server"></i> <span>Master</span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled">
                        <li><a href="'.base_url('barang').'">Barang</a></li>
                        <li><a href="'.base_url('supplier').'">Supplier</a></li>
                        <li><a href="'.base_url('kualitas').'">Kualitas</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><i class="fa fa-fw fa-bar-chart"></i> <span>Transaksi</span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled">
                        <li><a href='.site_url('pembelian').'>Pembelian</a></li>
                        <li><a href='.site_url('penjualan').'>Penjualan</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><i class="fa fa-fw fa-database"></i> <span>Stok Barang</span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled">
                        <li><a href="'.base_url('stok-gudang').'">Stok Gudang</a></li>
                        <li><a href="'.base_url('stok-frontline').'">Stok Frontline</a></li>
                        <li><a href="'.base_url('stok-customer').'">Stok Customer</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><i class="fa fa-fw fa-print"></i> <span>Laporan</span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled">
                        <li><a href="'.base_url('laporan-beli').'">Laporan Pembelian</a></li>
                        <li><a href="'.base_url('laporan-jual').'">Laporan Penjualan</a></li>
                        <li><a href="'.base_url('mutasi-stok').'">Mutasi Stok</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><i class="fa fa-fw fa-gears"></i> <span>Seting</span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled">
                        <li><a href="'.base_url('user').'">User Pengguna</a></li>
                        <li><a href="'.base_url('backup').'">Backup Database</a></li>
                    </ul>
                </li>
            ';
        }else if($this->session->userdata('usergroup')=='Gudang'){
            echo '
                <li class="submenu">
                    <a href="'.base_url('home').'"><i class="fa fa-fw fa-home"></i><span> Home </span> </a>
                </li>
                <li class="submenu">
                <a href="#"><i class="fa fa-fw fa-server"></i> <span>Master</span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled">
                        <li><a href="'.base_url('barang').'">Barang</a></li>
                        <li><a href="'.base_url('supplier').'">Supplier</a></li>
                        <li><a href="'.base_url('kualitas').'">Kualitas</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><i class="fa fa-fw fa-bar-chart"></i> <span>Transaksi</span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled">
                        <li><a href="'.base_url('pembelian').'">Pembelian</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><i class="fa fa-fw fa-database"></i> <span>Stok Barang</span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled">
                        <li><a href="'.base_url('stok-gudang').'">Stok Gudang</a></li>
                        <li><a href="'.base_url('stok-frontline').'">Stok Frontline</a></li>
                        <li><a href="'.base_url('stok-customer').'">Stok Customer</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><i class="fa fa-fw fa-print"></i> <span>Laporan</span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled">
                        <li><a href="'.base_url('laporan-beli').'">Laporan Pembelian</a></li>
                        <li><a href="'.base_url('laporan-jual').'">Laporan Penjualan</a></li>
                        <li><a href="'.base_url('mutasi-stok').'">Mutasi Stok</a></li>
                    </ul>
                </li>
            ';
        }else{
            echo '
            <li class="submenu">
                    <a href="'.base_url('home').'"><i class="fa fa-fw fa-home"></i><span> Home </span> </a>
                </li>
                <li class="submenu">
                <a href="#"><i class="fa fa-fw fa-server"></i> <span>Master</span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled">
                        <li><a href="'.base_url('barang').'">Barang</a></li>
                        <li><a href="'.base_url('supplier').'">Supplier</a></li>
                        <li><a href="'.base_url('kualitas').'">Kualitas</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><i class="fa fa-fw fa-bar-chart"></i> <span>Transaksi</span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled">
                        <li><a href="'.base_url('pembelian').'">Penjualan</a></li>
                        <li><a href="'.base_url('penjualan').'">Penjualan</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><i class="fa fa-fw fa-database"></i> <span>Stok Barang</span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled">
                        <li><a href="'.base_url('stok-gudang').'">Stok Gudang</a></li>
                        <li><a href="'.base_url('stok-frontline').'">Stok Frontline</a></li>
                        <li><a href="'.base_url('stok-customer').'">Stok Customer</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><i class="fa fa-fw fa-print"></i> <span>Laporan</span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled">
                        <li><a href="'.base_url('laporan-beli').'">Laporan Pembelian</a></li>
                        <li><a href="'.base_url('laporan-jual').'">Laporan Penjualan</a></li>
                        <li><a href="'.base_url('mutasi-stok').'">Mutasi Stok</a></li>
                    </ul>
                </li>
            ';
        }
        
        ?>           
        </ul>

        <div class="clearfix"></div>

        </div>
    
        <div class="clearfix"></div>

    </div>

</div>