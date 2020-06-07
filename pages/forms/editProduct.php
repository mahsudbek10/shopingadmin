<?php
if(session_status()!=PHP_SESSION_ACTIVE){ session_start();}
include './head.php';
require '../../db/db.php';
$typee = R::getAll("SELECT id, name FROM typee ORDER BY name ASC");
$typee2 = R::getAll("SELECT id, name FROM typee2 ORDER BY name ASC");
$madein = R::getAll("SELECT id, name FROM madein ORDER BY name ASC");
$brand = R::getAll("SELECT id, name FROM brand ORDER BY name ASC");
?>

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
            <?php if(isset($_SESSION['mess'])){ echo $_SESSION['mess']; unset($_SESSION['mess']);} ?>
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
                                <!--typee-->
                                <div class="form-group">
                                    <label>Тип (М/Ж)</label>
                                    <select class="form-control select2" name="typee" style="width: 100%;" required>
                                        <?php foreach ($typee as $value): ?>
                                            <option value="<?= $value['id']; ?>"><?= $value['name']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <!--typee2-->
                                <div class="form-group">
                                    <label>Тип 2</label>
                                    <select class="form-control select2" name="typee2" style="width: 100%;" required>
                                        <?php foreach ($typee2 as $value): ?>
                                            <option value="<?= $value['id']; ?>"><?= $value['name']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card card-purple">
                    <div class="card-header">
                        <h3 class="card-title">Шаг 3</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <!--madein-->
                                <div class="form-group">
                                    <label>Страна</label>
                                    <select class="form-control select2" name="madein" style="width: 100%;" required>
                                        <?php foreach ($madein as $value): ?>
                                            <option value="<?= $value['id']; ?>"><?= $value['name']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <!--brend-->
                                <div class="form-group">
                                    <label>Брэнд</label>
                                    <select class="form-control select2" name="brand" style="width: 100%;" required>
                                        <?php foreach ($brand as $value): ?>
                                            <option value="<?= $value['id']; ?>"><?= $value['name']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Шаг 4</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <!--isnew-->
                                <div class="form-group clearfix">
                                    <div class="icheck-success d-inline">
                                        <input type="radio" name="isnew" checked id="radioSuccess1" required>
                                        <label for="radioSuccess1"> Новый
                                        </label>
                                    </div>
                                    <div class="icheck-success d-inline">
                                        <input type="radio" name="isnew" id="radioSuccess2" required>
                                        <label for="radioSuccess2"> Старый
                                        </label>
                                    </div>
                                </div>
                                <input type="checkbox" name="my-checkbox" checked data-bootstrap-switch>
                                <input type="checkbox" name="my-checkbox" checked data-bootstrap-switch data-off-color="danger" data-on-color="success">
                            </div>
                            <!--price-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Цена</label>
                                    <input type="number" class="form-control" name="price" style="width: 100%;" required>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-outline-success" name="add" >Добавить</button>
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
if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['add'])) {
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";
    if (isset($_POST['name'], $_POST['description'], $_POST['typee'], $_POST['typee2'], $_POST['madein'], $_POST['brand'], $_POST['price'], $_POST['isnew'])) {
        echo "asdasdf311321";
        $_POST['name'] = Validation::input($_POST['name']);
        $_POST['description'] = Validation::input($_POST['description']);
        $_POST['typee'] = Validation::input($_POST['typee']);
        $_POST['typee2'] = Validation::input($_POST['typee2']);
        $_POST['madein'] = Validation::input($_POST['madein']);
        $_POST['brand'] = Validation::input($_POST['brand']);
        $_POST['price'] = Validation::input($_POST['price']);
        $_POST['isnew'] = Validation::input($_POST['isnew']);
        $ok = R::exec("INSERT INTO shop_table (name, description, typee_id, typee2_id, madein_id, "
                        . "brand_id, price, is_new) VALUES (?,?,?,?,?,?,?,?);", [$_POST['name'], $_POST['description'],
                    $_POST['typee'], $_POST['typee2'], $_POST['madein'], $_POST['brand'], $_POST['price'], $_POST['isnew']]);
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
        echo '<script>location.href = ("addProduct.php")</script>';
    }
}
?>

