<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',],
        'authManager' => [
	        'class' => 'yii\rbac\PhpManager',
	        'defaultRoles' => ['user','moder','admin'], //здесь прописываем роли
	        //зададим куда будут сохраняться наши файлы конфигураций RBAC
	        'itemFile' => '@common/components/rbac/items.php',
	        'assignmentFile' => '@common/components/rbac/assignments.php',
	        'ruleFile' => '@common/components/rbac/rules.php'
    ],

        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName'  => false,
            'rules' => [
                ['pattern' => 'post/<slug:(.*?)>', 'route' => 'site/show'],
                ['pattern' => '<controller>/<action>', 'route' => '<controller>/<action>'],
                ['pattern' => '<module>/<controller>/<action>', 'route' => '<module>/<controller>/<action>'],

            ]
        ],


            

]];
