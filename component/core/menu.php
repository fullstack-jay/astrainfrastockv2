<?php
include "configuration/config_connect.php";
include "configuration/config_chmod.php";

$queryback = "SELECT * FROM backset";
$resultback = mysqli_query($conn, $queryback);
$rowback = mysqli_fetch_assoc($resultback);
$demo = $rowback["demo"];

?>
 <aside class="main-sidebar">

                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="<?php echo $_SESSION[
                                "avatar"
                            ]; ?>" class="img-circle" alt="User Image">
                        </div>
                        <div class="pull-left info">
                            <p><?php echo $_SESSION["nama"]; ?></p>
                            <a href="#"><i class="fa fa-circle text-online"></i> <?php echo $_SESSION[
                                "jabatan"
                            ]; ?></a>
                        </div>
                    </div>
<br>
                             <ul class="sidebar-menu">
                       <!-- <li class="header">MENU UTAMA</li> -->
                        <li class="treeview">
                            <a href="index"> <i class="fa fa-dashboard"></i> <span>Dashboard</span> </a>

                        </li>



<?php
if ($chmenu4 >= 1 || $_SESSION["jabatan"] == "admin") { ?>


                        <li class="treeview">
          <a href="#"> <i class="glyphicon glyphicon-th-list"></i> <span>Semua Aset Yang Tersedia </span> <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i> </span> </a>
            <ul class="treeview-menu">
                <li>
                    <a href="barang_it"><i class="fa fa-circle-o"></i>Barang IT</a>
                  </li>
                  <li>
                      <a href="barang_me"><i class="fa fa-circle-o"></i>Barang Mechanical Electrical</a>
                    </li>
                     <li>
                      <a href="barang_ws"><i class="fa fa-circle-o"></i>Barang Workshop</a>
                    </li>
                </ul>
              </li>



<?php } else {}

if ($chmenu5 >= 1 || $_SESSION["jabatan"] == "admin") { ?>

<?php } else {}

if ($chmenu6 >= 1 || $_SESSION["jabatan"] == "admin") { ?>

    <?php } else {}

if ($chmenu7 >= 1 || $_SESSION["jabatan"] == "admin") { ?>

<?php } else {}
if ($chmenu8 >= 1 || $_SESSION["jabatan"] == "admin") { ?>

    <li class="treeview">
          <a href="#"> <i class="glyphicon glyphicon-inbox"></i> <span>Stok Persediaan</span> <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i> </span> </a>
            <ul class="treeview-menu">
                <li>
                    <a href="stok_barang"><i class="fa fa-circle-o"></i>Data Stok</a>
                  </li>
                  <li>
                      <a href="stok_sesuai"><i class="fa fa-circle-o"></i>Penyesuaian Stok</a>
                    </li>
                </ul>
              </li>


<?php } else {}
if ($chmenu9 >= 1 || $_SESSION["jabatan"] == "admin") { ?>

<?php } else {}
if ($chmenu2 >= 1 || $_SESSION["jabatan"] == "admin") { ?>

<?php } else {}

if ($chmenu3 >= 1 || $_SESSION["jabatan"] == "admin") { ?>

                        <li class="treeview">
                            <a href="#"> <i class="glyphicon glyphicon-tag"></i> <span>Kategori & Merek</span> <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i> </span> </a>
               <ul class="treeview-menu">
                                <li>
                                    <a href="kategori"><i class="fa fa-circle-o"></i>Kategori</a>
                                </li>
                                 
                                 <li>
                                    <a href="merek"><i class="fa fa-circle-o"></i>Merek</a>
                                 </li>

                                
                            </ul>
                        </li>


  <?php } else {}

if ($chmenu10 >= 1 || $_SESSION["jabatan"] == "admin") { ?>


              <li class="treeview">
                            <a href=""> <i class="glyphicon glyphicon-cog"></i> <span>Pengaturan</span> <span class="pull-right-container"> </span> </a>
                               <ul class="treeview-menu">
                                 <li>
                                    <a href="set_general"><i class="fa fa-circle-o"></i>General Setting</a>
                                </li>
              
                                <li>
                                <a href="admin"><i class="fa fa-circle-o"></i>Manajemen User</a>
                                                                   </li>
                                                                   <li>
                                <a href="add_jabatan"><i class="fa fa-circle-o"></i>Jabatan</a>
                                                                   </li>
                                                    <li>
                <a href="set_themes"><i class="fa fa-circle-o"></i>Theme Setting</a>
                               </li>


                                <?php if ($demo != 0) { ?>
                                                  <li>
                <a href="license"><i class="fa fa-circle-o"></i>LISENSI</a>
                                                  </li>

                                              <?php } ?>
                            </ul>
                        </li>
<?php } else {}
?>


                    </ul>

                </section>
                <!-- /.sidebar -->
            </aside>
