<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <!--div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p><?=Yii::$app->user->identity->username?></p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div-->


        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu'],
                'items' => [
                    ['label' => 'Меню', 'options' => ['class' => 'header']],
                    ['label'=>'Пользователи', 'icon' => 'glyphicon glyphicon-th-list', 'url'=>['/users/index']],
                    ['label'=>'Меню', 'icon' => 'glyphicon glyphicon-th-list', 'url'=>['/menu/index']],
                    ['label'=>'Текстовые страницы', 'icon' => 'glyphicon glyphicon-file', 'url'=>['/text/index']],
                    ['label'=>'Новости', 'icon' => 'glyphicon glyphicon-list-alt', 'url'=>['/news/index']],
                    //['label'=>'<span class="glyphicon glyphicon-list-alt"></span> Статьи', 'url'=>['/admin/articles/index']],
                    ['label'=>'Галерея', 'icon' => 'glyphicon glyphicon-repeat', 'url'=>['/fotos-cat/index']],


                ],
            ]
        ) ?>

    </section>

</aside>
