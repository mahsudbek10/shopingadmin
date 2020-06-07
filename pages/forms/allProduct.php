<?php
if (session_status() != PHP_SESSION_ACTIVE) {
    session_start();
}
include './head.php';
require '../../db/db.php';
$result = R::getAll("SELECT id, name, madein_name, brand_name, typee_name, typee2_name, price "
        . "FROM view_shopping WHERE is_deleted=0 "
        . "ORDER BY date_register DESC");
?>
<!-- DataTables -->
<link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <?php if(isset($_SESSION['mess'])){ echo $_SESSION['mess']; unset($_SESSION['mess']);} ?>
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Все товары в магазине</h3>
                </div>
                <?php // echo '<pre>'; print_r($result); ?>
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Наименование</th>
                                <th>Производство</th>
                                <th>Брэнд</th>
                                <th>Тип</th>
                                <th>Тип 2</th>
                                <th>Цена</th>
                                <th>Действие</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($result as $r): ?>
                                <tr>
                                    <td><?= $r['name']; ?></td>
                                    <td><?= $r['madein_name']; ?></td>
                                    <td><?= $r['brand_name']; ?></td>
                                    <td><?= $r['typee_name']; ?></td>
                                    <td><?= $r['typee2_name']; ?></td>
                                    <td><?= $r['price']; ?></td>
                                    <td>
                                        <a class="text-blue" href="editProduct.php?id=<?= $r['id']; ?>"><i class="fa fa-edit"></i></a>
                                        <a class="text-danger" href="allProduct.php?id=<?= $r['id']; ?>"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Наименование</th>
                                <th>Производство</th>
                                <th>Брэнд</th>
                                <th>Тип</th>
                                <th>Тип 2</th>
                                <th>Цена</th>
                                <th>Действие</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>
<?php
include './footer.php';
?>
<!-- DataTables -->
<script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script>
    $(function () {
        $("#example1").DataTable({
            "responsive": true,
            "autoWidth": false,
        });
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>
<?php
error_reporting(E_ALL);
if ($_SERVER['REQUEST_METHOD'] == "GET" && isset($_GET['id'])) {
    echo "<pre>";
    print_r($_GET);
    echo "</pre>";
    if (isset($_GET['id'])) {
        
        $ok = R::exec("UPDATE shop_table SET is_deleted='1' WHERE id = ".$_GET['id']." ;");
        if ($ok) {
            $_SESSION['mess'] = '<div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <h5><i class="icon fas fa-check"></i> Успешно удалено!</h5>
                                Товар удален из списка.
                              </div>';
        } else {
            $_SESSION['mess'] = '<div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <h5><i class="icon fas fa-ban"></i> Ууупс, ошибка!</h5>
                                Что то пошло не так, свяжитесь с программистом.
                              </div>';
        }
        unset($_GET['id']);
        echo '<script>location.href = ("allProduct.php")</script>';
    }
}
?>