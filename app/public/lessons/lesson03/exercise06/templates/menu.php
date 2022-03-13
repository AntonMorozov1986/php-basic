<?php
$menu = [
    'main'=>[
        'name'=>'Главная',
        'href'=>'/lessons/lesson03/exercise06/index.php'
    ],
    'catalog'=>[
        'name'=>'Каталог',
        'href'=>'?page=catalog'
    ],
    'about'=>[
        'name'=>'О нас',
        'href'=>'?page=about'
    ],
    'test'=>[
        'name'=>'Тест вложенного меню',
        'href'=>'?page=about',
        'nestedMenu'=>[
            'nest1'=>[
                'name'=>'Вложенное 1',
                'href'=>'?page=test_nest_1'
            ],
            'nest2'=>[
                'name'=>'Вложенное 2',
                'href'=>'?page=test_nest_2'
            ],
            'nest3'=>[
                'name'=>'Вложенное 3',
                'href'=>'?page=test_nest_2',
                'nestedMenu'=>[
                    'nest3-1'=>[
                        'name'=>'Вложенное 3-1',
                        'href'=>'?page=test_nest_3-1'
                    ],
                    'nest3-2'=>[
                        'name'=>'Вложенное 3-2',
                        'href'=>'?page=test_nest_3-2'
                    ],
                ]
            ],
        ]
    ]
];

function generateMenu($menu): string
{
    $menuHtml = '<ul>';
    foreach ($menu as $menuItem) {
        $menuHtml .= generateMenuItem($menuItem);
    }
    return $menuHtml . '</ul>';
}

function generateMenuItem($menuItem): string
{
    extract($menuItem);
    $menuItemHtml = "<a href='$href'>$name</a>";
    if (isset($nestedMenu)) {
        $menuItemHtml .= generateMenu($nestedMenu);
    }
    return "<li>$menuItemHtml</li>";
}

echo "<nav>" . generateMenu($menu) . "</nav>";
