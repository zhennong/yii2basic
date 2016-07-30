<aside class="main-sidebar">

    <section class="sidebar">

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu', 'id'=>'metissidebarmenu'],
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
                    ],
                    [
                        'label' => '专题管理',
                        'icon' => 'fa fa-share',
                        'url' => '#',
                        'items'=>[
                            [
                                'label' => '专题列表',
                                'url' => Yii::$app->urlManager->createUrl('special/special'),
                            ],
                            [
                                'label' => '专题产品列表',
                                'url' => Yii::$app->urlManager->createUrl('special/special-products'),
                            ],
                            [
                                'label' => '产品列表',
                                'url' => Yii::$app->urlManager->createUrl('special/products'),
                            ],
                        ],
                    ],
                    [
                        'label' => '测试',
                        'icon' => 'fa fa-share',
                        'url' => '#',
                        'items'=>[
                            [
                                'label' => '测试产品ajaxcurd',
                                'url' => Yii::$app->urlManager->createUrl('test/products'),
                            ],
                        ],
                    ],
                    [
                        'label' => '优惠码管理',
                        'icon' => 'fa fa-share',
                        'url' => '#',
                        'items'=>[
                            [
                                'label' => '优惠码列表',
                                'url' => Yii::$app->urlManager->createUrl('promo/promo'),
                            ],
                        ],
                    ],
                    [
                        'label' => '会员管理',
                        'icon' => 'fa fa-share',
                        'url' => '#',
                        'items'=>[
                            [
                                'label' => '会员列表',
                                'url' => Yii::$app->urlManager->createUrl('members/members'),
                            ],
                            [
                                'label' => '会员分类',
                                'url' => '#',
                                'items'=>[
                                    [
                                        'label'=>'有交易客户',
                                        'url'=> Yii::$app->urlManager->createUrl('members/members/big-members'),
                                    ],
                                    [
                                        'label'=>'代理商',
                                        'url'=> Yii::$app->urlManager->createUrl('members/members/agent-members'),
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ]
        ) ?>

    </section>

</aside>
