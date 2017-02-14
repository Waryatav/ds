<?php
namespace backend\widgets;
use Yii;
use yii\base\Widget;
use yii\helpers\Url;

class MainMenuAdmin extends Widget
{
    public function run(){
        echo \yii\widgets\Menu::widget(
            [
                'items' => [
                    [
                        'label' => 'Пользователи',
                        'url' => Url::to(['/user/admin']),
                        'template' => '<a href="{url}"><i class="fa fa-users"></i> <span>{label}</span></a>',
                        'active' => Yii::$app->controller->module->id == 'user' || Yii::$app->controller->module->id == 'rbac',

                    ],
//                    [
//                        'label' => 'Ссылка 2',
//                        'url' => '#'
//                    ],
//                    [
//                        'label' => 'Новости',
//                        /*'active' => Yii::$app->controller->id == 'site',*/
//                        'items' => [
//                            [
//                                'label' => '123',
//                                'url' => Url::to(['/site/index']),
//                                'active' => Yii::$app->requestedRoute == 'site/index',
//                            ],
//                            [
//                                'label' => '345',
//                                'url' => '#',
//                            ],
//                        ],
//                        'options' => [
//                            'class' => 'treeview',
//                        ],
//                        'template' => '<a href="#"><i class="fa fa-newspaper-o"></i> <span>{label}</span> <i class="fa fa-angle-left pull-right"></i></a>',
//                    ],
//                    [
//                        'label' => 'Доска',
//                        'items' => [
//                            [
//                                'label' => '123',
//                                'url' => '#'
//                            ],
//                            [
//                                'label' => '345',
//                                'url' => '#',
//                            ],
//                        ],
//                        'options' => [
//                            'class' => 'treeview',
//                        ],
//                        'template' => '<a href="#"><i class="fa fa-dashboard"></i> <span>{label}</span> <i class="fa fa-angle-left pull-right"></i></a>',
//                    ],
                    [
                        'label' => 'Страницы',
                        'url' => Url::to(['/pages/pages']),
                        'template' => '<a href="{url}"><i class="fa fa-file-text"></i> <span>{label}</span></a>',
                        'active' => Yii::$app->controller->module->id == 'pages',

                    ],
                    [
                        'label' => 'Заявки',
                        'url' => Url::to(['/request/request']),
                        'template' => '<a href="{url}"><i class="fa fa-paper-plane"></i> <span>{label}</span></a>',
                        'active' => Yii::$app->controller->module->id == 'request',

                    ],
                    [
                        'label' => 'Подтвержденные заявки',
                        'url' => Url::to(['/confirmed_request/confirmed_request']),
                        'template' => '<a href="{url}"><i class="fa fa-check-square-o"></i> <span>{label}</span></a>',
                        'active' => Yii::$app->controller->module->id == 'confirmed_request',

                    ],
                    [
                        'label'    => 'Настройки',
                        'url'      => Url::to( [ '/settings' ] ),
                        'template' => '<a href="{url}"><i class="fa fa-cogs"></i> <span>{label}</span></a>',
                        'active'   => Yii::$app->controller->module->id == 'settings',
                    ],
                    [
                        'label' => 'Переменные',
                        'url' => Url::to(['/key_value/key_value']),
                        'template' => '<a href="{url}"><i class="fa fa-ellipsis-h"></i> <span>{label}</span></a>',
                        'active' => Yii::$app->controller->module->id == 'key_value',

                    ],
                ],
                'activateItems' => true,
                'activateParents' => true,
                'activeCssClass'=>'active',
                'encodeLabels' => false,
                /*'dropDownCaret' => false,*/
                'submenuTemplate' => "\n<ul class='treeview-menu' role='menu'>\n{items}\n</ul>\n",
                'options' => [
                    'class' => 'sidebar-menu',
                ]
            ]
        );
    }
}