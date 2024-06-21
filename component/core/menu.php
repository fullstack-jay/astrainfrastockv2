<?php
include "configuration/config_connect.php";

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
if ($_SESSION["jabatan"] == "admin"|| $_SESSION['jabatan'] == 'pic') { ?>


<?php } else {}

if ($_SESSION["jabatan"] == "admin"|| $_SESSION['jabatan'] == 'pic') { ?>

<?php } else {}

if ($_SESSION["jabatan"] == "admin"|| $_SESSION['jabatan'] == 'pic') { ?>

    <?php } else {}

if ($_SESSION["jabatan"] == "admin"|| $_SESSION['jabatan'] == 'pic') { ?>

<?php } else {}
if ($_SESSION["jabatan"] == "admin" || $_SESSION['jabatan'] == 'pic' || $_SESSION['jabatan'] == 'user') { ?>

    <li>
    <a href="stok_sesuai"><i class="glyphicon glyphicon-inbox"></i>Penyesuaian Stok Aset</a>
</li>
 <li>
        <a href="histori"><i class="fa fa-history"></i>Histori Transaksi Aset</a>
    </li>
  <?php } else {}

if ($_SESSION["jabatan"] == "admin") { ?>


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
