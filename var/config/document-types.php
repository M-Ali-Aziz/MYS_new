<?php 

return [
    1 => [
        "id" => 1,
        "name" => "Default Mail",
        "group" => NULL,
        "module" => "AppBundle",
        "controller" => "@AppBundle\\Controller\\DefaultController",
        "action" => "genericMail",
        "template" => NULL,
        "type" => "email",
        "priority" => 0,
        "creationDate" => 1612266641,
        "modificationDate" => 1612266709
    ],
    2 => [
        "id" => 2,
        "name" => "Default Page",
        "group" => NULL,
        "module" => "AppBundle",
        "controller" => "@AppBundle\\Controller\\ContentController",
        "action" => "default",
        "template" => NULL,
        "type" => "page",
        "priority" => 0,
        "creationDate" => 1612266853,
        "modificationDate" => 1612266878
    ],
    3 => [
        "id" => 3,
        "name" => "Tools start page",
        "group" => NULL,
        "module" => "AppBundle",
        "controller" => "@AppBundle\\Controller\\ToolsController",
        "action" => "start",
        "template" => NULL,
        "type" => "page",
        "priority" => 0,
        "creationDate" => 1613502323,
        "modificationDate" => 1613502359
    ]
];
