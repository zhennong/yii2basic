<?php

?>

<aside class="main-sidebar">

    <section class="sidebar">

        <?php $items = [
            'options' => ['class' => 'sidebar-menu'],
            'items' => [
                ['label' => 'Menu Yii2', 'options' => ['class' => 'header']],
                [
                    'label' => '系统监控',
                    'icon' => 'fa fa-share',
                    'url' => ['/system'],
                ],
                [
                    'label' => '活动管理',
                    'icon' => 'fa fa-share',
                    'url' => '#',
                    'items' => [
                        [
                            'label' => '参与活动产品预览',
                            'url' => ['/activity'],
                        ],
                        [
                            'label' => '参与活动产品预览列表',
                            'url' => ['/activity/active-products'],
                        ],
                        [
                            'label' => '活动产品列表',
                            'url' => ['/activity/products'],
                        ],
                        [
                            'label' => '活动门市供应列表',
                            'url' => ['/activity/supply'],
                        ],
                    ],
                ],
                [
                    'label' => '产品管理',
                    'icon' => 'fa fa-share',
                    'url' => '#',
                    'items' => [
                        [
                            'label' => '产品列表',
                            'url' => ['/products/products'],
                        ],
                    ],
                ],
                [
                    'label' => '专题管理',
                    'icon' => 'fa fa-share',
                    'url' => '#',
                    'items' => [
                        [
                            'label' => '专题列表',
                            'url' => ['/special/special'],
                        ],
                        [
                            'label' => '专题产品列表',
                            'url' => ['/special/special-products'],
                        ],
                        [
                            'label' => '产品列表',
                            'url' => ['/special/products'],
                        ],
                    ],
                ],
                [
                    'label' => '测试',
                    'icon' => 'fa fa-share',
                    'url' => '#',
                    'items' => [
                        [
                            'label' => '测试产品ajaxcurd',
                            'url' => ['/test/products'],
                        ],
                    ],
                ],
                [
                    'label' => '优惠码管理',
                    'icon' => 'fa fa-share',
                    'url' => '#',
                    'items' => [
                        [
                            'label' => '优惠码列表',
                            'url' => ['/promo/promo'],
                        ],
                    ],
                ],
                [
                    'label' => '会员管理',
                    'icon' => 'fa fa-share',
                    'url' => '#',
                    'items' => [
                        [
                            'label' => '会员列表',
                            'url' => ['/members/members'],
                        ],
                        [
                            'label' => '会员分类',
                            'url' => '#',
                            'items' => [
                                [
                                    'label' => '有交易客户',
                                    'url' => ['/members/members/big-members'],
                                ],
                                [
                                    'label' => '代理商',
                                    'url' => ['/members/members/agent-members'],
                                ],
                                [
                                    'label' => '2016-01-01至今注册的客户(未购买)',
                                    'url' => ['/members/members/new-no-trade-member'],
                                ],
                                [
                                    'label' => '去年818购买过的客户',
                                    'url' => ['/members/members/member-has-buy-last818'],
                                ],
                                [
                                    'label' => '按照注册地区树查询客户',
                                    'url' => ['/members/members/area-tree-index-members'],
                                ],
                            ],
                        ],
                    ],
                ],
                [
                    'label' => '交易管理',
                    'icon' => 'fa fa-share',
                    'url' => '#',
                    'items' => [
                        [
                            'label' => '交易列表',
                            'url' => ['/trades/trades'],
                        ],
                    ],
                ],
                [
                    'label' => '代理商管理',
                    'icon' => 'fa fa-share',
                    'url' => '#',
                    'items' => [
                        [
                            'label' => '招商部管理员地区划分',
                            'url' => ['/agents/area-manage-assign'],
                        ],
                    ],
                ],
            ],
        ]; ?>
        <?=\dmstr\widgets\Menu::widget($items) ?>
    </section>

</aside>
