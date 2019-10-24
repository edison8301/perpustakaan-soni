<?php
    use app\models\User;
?>
<?php if (User::isAdmin()) { ?>
<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/dw.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p>Soni Dwi Susanto</p>
                <p>(Admin)</p>

               <!-- <a href="#"><i class="fa fa-circle text-success"></i> Online</a>-->
            </div>
        </div>

        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

     
        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                    ['label' => 'Menu Yii2', 'options' => ['class' => 'header']],
                    ['label' => 'Dashboard', 'icon' => 'home', 'url' => ['/site']],
                    //['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii']],
                    //['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug']],
                    ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                    [
                    'label' => 'Aplications',
                        'icon' => 'file',
                        'url' => '#',
                        'items' => [
                    ['label' => 'Anggota','icon' => 'group', 'url' => ['/anggota']],
                    ['label' => 'Buku','icon' => 'book', 'url' => ['/buku']],
                    ['label' => 'Peminjaman','icon' => 'shopping-cart', 'url' => ['/peminjaman']],
                    ['label' => 'Kategori','icon' => 'tasks', 'url' => ['/kategori']],
                    ['label' => 'Penulis','icon' => 'user', 'url' => ['/penulis']],
                    ['label' => 'Penerbit','icon' => 'user', 'url' => ['/penerbit']],
                    ['label' => 'Petugas','icon' => 'user', 'url' => ['/petugas']],
                    ['label' => 'Users','icon' => 'user', 'items' => [
                         ['label' => 'Admin','icon' => 'circle-o', 'url' => ['/users/index','id_user_role' => 1]],
                         ['label' => 'Anggota','icon' => 'circle-o', 'url' => ['/users/index','id_user_role' => 2]],
                         ['label' => 'Petugas','icon' => 'circle-o', 'url' => ['/users/index','id_user_role' => 3]],
                    ]], 
                    ['label' => 'UserRole','icon' => 'user', 'url' => ['/user-role']],
                        ],
                    ],
                ],
            ]
        ) ?>
  <?php } ?> 

  <?php if (User::isAnggota()) { ?>
    <aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/photo4.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p>Anggota</p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                    ['label' => 'Menu Yii2', 'options' => ['class' => 'header']],
                    ['label' => 'Dashboard', 'icon' => 'home', 'url' => ['/site']],
                    //['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii']],
                    //['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug']],
                    ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                    [
                    'label' => 'Aplications',
                        'icon' => 'file',
                        'url' => '#',
                        'items' => [
                    ['label' => 'Buku','icon' => 'book', 'url' => ['/buku']],
                    ['label' => 'Peminjaman','icon' => 'shopping-cart', 'url' => ['/peminjaman']],
                        ],
                    ],
                ],
            ]
        ) ?>
  <?php } ?> 

  <?php if (User::isPetugas()) { ?>
    <aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/photo4.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p>Petugas</p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                    ['label' => 'Menu Yii2', 'options' => ['class' => 'header']],
                    ['label' => 'Dashboard', 'icon' => 'home', 'url' => ['/site']],
                    //['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii']],
                    //['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug']],
                    ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                    [
                    'label' => 'Aplications',
                        'icon' => 'file',
                        'url' => '#',
                        'items' => [
                    ['label' => 'Buku','icon' => 'book', 'url' => ['/buku']],
                    ['label' => 'Peminjaman','icon' => 'shopping-cart', 'url' => ['/peminjaman']],
                    ['label' => 'Kategori','icon' => 'tasks', 'url' => ['/kategori']],
                    ['label' => 'Penulis','icon' => 'user', 'url' => ['/penulis']],
                    ['label' => 'Penerbit','icon' => 'user', 'url' => ['/penerbit']],

                        ],
                    ],
                ],
            ]
        ) ?>
  <?php } ?> 

    </section>

</aside>
