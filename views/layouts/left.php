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
                        'url' => '#',
                        'items'=>[
                            [
                                'label' => '参与活动产品预览',
                                'url' => Yii::$app->urlManager->createUrl('activity'),
                            ],
                            [
                                'label' => '参与活动产品预览列表',
                                'url' => Yii::$app->urlManager->createUrl('activity/active-products'),
                            ],
                            [
                                'label' => '活动产品列表',
                                'url' => Yii::$app->urlManager->createUrl('activity/products'),
                            ],
                            [
                                'label' => '活动门市供应列表',
                                'url' => Yii::$app->urlManager->createUrl('activity/supply'),
                            ],
                        ],
                    ],
                    [
                        'label' => '产品管理',
                        'icon' => 'fa fa-share',
                        'url' => '#',
                        'items'=>[
                            [
                                'label' => '产品列表',
                                'url' => Yii::$app->urlManager->createUrl('products/products'),
                            ],
                        ],
                    ]
                ],
            ]
        ) ?>

    </section>

</aside>
