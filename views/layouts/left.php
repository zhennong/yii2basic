<aside class="main-sidebar">

    <section class="sidebar">

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu'],
                'items' => [
                    ['label' => 'Menu Yii2', 'options' => ['class' => 'header']],
                    [
                        'label' => '活动管理',
                        'icon' => 'fa fa-share',
                        'url' => Yii::$app->urlManager->createUrl('activity'),
                    ],
                ],
            ]
        ) ?>

    </section>

</aside>
