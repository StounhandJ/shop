<?php

return [
    "santehnik" => [
        "https://santehnika-online.ru/climate/",
        "https://santehnika-online.ru/santehnika/",
        "https://santehnika-online.ru/mebel_dlja_vannoj_komnaty/"
    ],
    "setting"=>
    [
        "santehnik"=>
        [
            /*
             * The original host for verification
             */
            "host"=>'santehnika-online.ru',

            /*
             * Number of products per request
             */
            "item_on_page"=>1000,

            /*
             * Interval between requests
             */
            "interval"=>5
        ]
    ]
];
