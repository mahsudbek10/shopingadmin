<?php
if (session_status() != PHP_SESSION_ACTIVE) {
    session_start();
}
include './head.php';
require '../../db/db.php';

?>
<!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <!-- summernote -->
  <link rel="stylesheet" href="../../plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Добавить товар</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Добавить товар</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <?php
            if (isset($_SESSION['mess'])) {
                echo $_SESSION['mess'];
                unset($_SESSION['mess']);
            }
            ?>
            <form action="" method="post">
                <div class="card card-blue">
                    <div class="card-header">
                        <h3 class="card-title">Шаг 1</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <!--name-->
                                <div class="form-group">
                                    <label>Наименование</label>
                                    <input class="form-control input-group" name="name" style="width: 100%;" required />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <!--description-->
                                <div class="form-group">
                                    <label>Описание</label>
                                    <textarea class="form-control input-group" name="description" style="width: 100%;" required></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card card-danger">
                    <div class="card-header">
                        <h3 class="card-title">Шаг 2</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Картинка</label>
                                <div class="mb-3">
                                    <textarea name="image" class="textarea" placeholder="Place some text here"
                                              style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <!--link-->
                                <div class="form-group">
                                    <label>Ссылка</label>
                                    <input class="form-control" name="link" style="width: 100%;" required />
                                </div>
                                <button type="submit" class="btn btn-outline-success" name="addCaroosel" >Добавить</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
</div>



<?php
include './footer.php';
require '../../csrf/Validation.php';
if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['addCaroosel'])) {
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";
    if (isset($_POST['name'], $_POST['description'], $_POST['image'], $_POST['link'])) {
        $_POST['name'] = Validation::input($_POST['name']);
        $_POST['description'] = Validation::input($_POST['description']);
        $_POST['link'] = Validation::input($_POST['link']);
        $ok = R::exec("INSERT INTO caroosel (name, description, imagee, link) VALUES (?,?,?,?);", 
                [$_POST['name'], $_POST['description'], $_POST['image'], $_POST['link']]);
        if ($ok) {
            $_SESSION['mess'] = '<div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <h5><i class="icon fas fa-check"></i> Успешно добавлено!</h5>
                                Новый товар добавлен.
                              </div>';
        } else {
            $_SESSION['mess'] = '<div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <h5><i class="icon fas fa-ban"></i> Ууупс, ошибка!</h5>
                                Что то пошло не так, свяжитесь с программистом.
                              </div>';
        }
        echo '<script>location.href = ("addCaroosel.php")</script>';
    }
}
?>
  <!-- Summernote -->
<script src="../../plugins/summernote/summernote-bs4.min.js"></script>
<script>
  $(function () {
    // Summernote
    $('.textarea').summernote()
  })
</script>
