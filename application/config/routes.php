<?php

return [
    "" => [
        "controller" => "main",
        "action" => "index"
    ],

    "test" => [
        "controller" => "test",
        "action" => "test"
    ],

//-----------------------------------ADMIN------------------------------------------------------/
    "admin_panel" => [
        "controller" => "admin",
        "action" => "admin_panel"
    ],

    "ajax_add_item" => [
        "controller" => "admin",
        "action" => "add_item"
    ],
    

    "admin_panel/add_item" => [
        "controller" => "admin",
        "action" => "add_item_home"
    ],

    "admin_panel/add_item/cloth" => [
        "controller" => "admin",
        "action" => "view_panel_add",
        "type" => "cloth"
    ],

    "admin_panel/add_item/shoes" => [
        "controller" => "admin",
        "action" => "view_panel_add",
        "type" => "shoes"
    ],

    "admin_panel/upgrade_item" => [
        "controller" => "admin",
        "action" => "upgrade_itemViev"
    ],
    
    "admin_panel/upgrade_itemSearch" => [
        "controller" => "admin",
        "action" => "upgrade_itemSearch"
    ],
    
    "admin_panel/upgrade_itemUpgrade" => [
        "controller" => "admin",
        "action" => "upgrade_itemUpgrade"
    ],

    "admin_panel/delete_item" => [
        "controller" => "admin",
        "action" => "delete_item"
    ],

    "admin_login" => [
        "controller" => "admin",
        "action" => "login"
    ],

    "out_admin_panel" => [
        "controller" => "admin",
        "action" => "out_admin_panel"
    ],

    //--------------------------------------Acconut_controller----------------------------------------------------//

    "account/login" => [
        "controller" => "account",
        "action" => "login"
    ],

    "account/login_ajax" => [
        "controller" => "account",
        "action" => "login_ajax"
    ],

    "account/register" => [
        "controller" => "account",
        "action" => "register"
    ],

    "account/register_ajax" => [
        "controller" => "account",
        "action" => "register_ajax"
    ],

    "account/out" => [
        "controller" => "account",
        "action" => "out"
    ],

    "account/check_mail" => [
        "controller" => "account",
        "action" => "check_mail"
    ],

    "account/forgot_password" => [
        "controller" => "account",
        "action" => "forgot_password"
    ],

    "account/forgot_password_edit" => [
        "controller" => "account",
        "action" => "forgot_password_edit"
    ],

    "account/edit_password" => [
        "controller" => "account",
        "action" => "edit_password"
    ],

    "account/edit_password_ajax" => [
        "controller" => "account",
        "action" => "edit_password_ajax"
    ],

    "item_details" => [
        "controller" => "item",
        "action" => "details"
    ],

    "cart" => [
        "controller" => "cart",
        "action" => "view_item_to_cart"
    ],

    "add_item_to_cart" => [
        "controller" => "cart",
        "action" => "add_item_to_cart"
    ],

    "delete_item_to_cart" => [
        "controller" => "cart",
        "action" => "delete_item_to_cart"
    ],


    "upgrade_number_item_cart" => [
        "controller" => "cart",
        "action" => "upgrade_number_item_cart"
    ],
    //--------------------------------------FILTER_CONTROLLER----------------------------------------------------//
   
    "filter" => [
        "controller" => "filter",
        "action" => "filter"
    ],

    "filter_ajax" => [
        "controller" => "filter",
        "action" => "filter_ajax"
    ],

    "items_ajax" => [
        "controller" => "item",
        "action" => "items_ajax"
    ],

    //--------------------------------------SEARCH_CONTROLLER----------------------------------------------------//

    "search_ajax" => [
        "controller" => "search",
        "action" => "search_ajax"
    ],
    
    //--------------------------------------ITEM_CONTROLLER----------------------------------------------------//


    //--------------------------------------MAN----------------------------------------------------//

    "man_home" => [
        "controller" => "item",
        "gender" => "man",
        "action" => "home"
    ],

    //--------------------------------------SHOES----------------------------------------------------//

    "man/shoes" => [
        "controller" => "item",
        "gender" => "man",
        "articl" => "shoes",
        "action" => "items"
    ],

    "man/shoes/winter_boots" => ["controller" => "item", "gender" => "man", "articl" => "shoes", "action" => "items", "type" => "winter_boots"],
    "man/shoes/lace-up_shoes" => ["controller" => "item", "gender" => "man", "articl" => "shoes", "action" => "items", "type" => "lace-up_shoes"],
    "man/shoes/sneakers_and_sneakers" => ["controller" => "item", "gender" => "man", "articl" => "shoes", "action" => "items", "type" => "sneakers_and_sneakers"],
    "man/shoes/shoes" => ["controller" => "item", "gender" => "man", "articl" => "shoes", "action" => "items", "type" => "shoes"],
    "man/shoes/oksfordy" => ["controller" => "item", "gender" => "man", "articl" => "shoes", "action" => "items", "type" => "oksfordy"],
    "man/shoes/moccasins" => ["controller" => "item", "gender" => "man", "articl" => "shoes", "action" => "items", "type" => "moccasins"],
    "man/shoes/boots" => ["controller" => "item", "gender" => "man", "articl" => "shoes", "action" => "items", "type" => "boots"],
    "man/shoes/business_footwear" => ["controller" => "item", "gender" => "man", "articl" => "shoes", "action" => "items", "type" => "business_footwear"],
    "man/shoes/sports_shoes" => ["controller" => "item", "gender" => "man", "articl" => "shoes", "action" => "items", "type" => "sports_shoes"],
    "man/shoes/outdoor_footwear" => ["controller" => "item", "gender" => "man", "articl" => "shoes", "action" => "items", "type" => "outdoor_footwear"],



    //--------------------------------------CLOTH----------------------------------------------------//

    "man/cloth" => [
        "controller" => "item",
        "gender" => "man",
        "articl" => "cloth",
        "action" => "items"
    ],

    "man/cloth/coats" => ["controller" => "item", "gender" => "man", "articl" => "cloth", "action" => "items", "type" => "coats"],
    "man/cloth/sweatshirts_and_sweaters" => ["controller" => "item", "gender" => "man", "articl" => "cloth", "action" => "items", "type" => "sweatshirts_and_sweaters"],
    "man/cloth/winter_coats" => ["controller" => "item", "gender" => "man", "articl" => "cloth", "action" => "items", "type" => "winter_coats"],
    "man/cloth/jeans" => ["controller" => "item", "gender" => "man", "articl" => "cloth", "action" => "items", "type" => "jeans"],
    "man/cloth/T-shirts" => ["controller" => "item", "gender" => "man", "articl" => "cloth", "action" => "items", "type" => "T-shirts"],
    "man/cloth/navy" => ["controller" => "item", "gender" => "man", "articl" => "cloth", "action" => "items", "type" => "navy"],
    "man/cloth/shirts" => ["controller" => "item", "gender" => "man", "articl" => "cloth", "action" => "items", "type" => "shirts"],
    "man/cloth/trousers" => ["controller" => "item", "gender" => "man", "articl" => "cloth", "action" => "items", "type" => "trousers"],
    "man/cloth/suits" => ["controller" => "item", "gender" => "man", "articl" => "cloth", "action" => "items", "type" => "suits"],
    "man/cloth/underwear" => ["controller" => "item", "gender" => "man", "articl" => "cloth", "action" => "items", "type" => "underwear"],



    //--------------------------------------WOMAN----------------------------------------------------//

    "woman_home" => [
        "controller" => "item",
        "gender" => "woman",
        "action" => "home"
    ],

    //--------------------------------------SHOES----------------------------------------------------//

    "woman/shoes" => [
        "controller" => "item",
        "gender" => "woman",
        "articl" => "shoes",
        "action" => "items"
    ],

    "woman/shoes/sneakers_and_sneakers" => ["controller" => "item", "gender" => "woman", "articl" => "shoes", "action" => "items", "type" => "sneakers_and_sneakers"],
    "woman/shoes/boots" => ["controller" => "item", "gender" => "woman", "articl" => "shoes", "action" => "items", "type" => "boots"],
    "woman/shoes/shoes" => ["controller" => "item", "gender" => "woman", "articl" => "shoes", "action" => "items", "type" => "shoes"],
    "woman/shoes/boots" => ["controller" => "item", "gender" => "woman", "articl" => "shoes", "action" => "items", "type" => "boots"],
    "woman/shoes/shuttles" => ["controller" => "item", "gender" => "woman", "articl" => "shoes", "action" => "items", "type" => "shuttles"],
    "woman/shoes/high-heeled_shoes" => ["controller" => "item", "gender" => "woman", "articl" => "shoes", "action" => "items", "type" => "high-heeled_shoes"],
    "woman/shoes/ballerina" => ["controller" => "item", "gender" => "woman", "articl" => "shoes", "action" => "items", "type" => "ballerina"],
    "woman/shoes/sports_shoes" => ["controller" => "item", "gender" => "woman", "articl" => "shoes", "action" => "items", "type" => "sports_shoes"],
    "woman/shoes/vegan_footwear" => ["controller" => "item", "gender" => "woman", "articl" => "shoes", "action" => "items", "type" => "vegan_footwear"],
    "woman/shoes/on_a_wide_foot" => ["controller" => "item", "gender" => "woman", "articl" => "shoes", "action" => "items", "type" => "on_a_wide_foot"],


    //--------------------------------------CLOTH----------------------------------------------------//

    "woman/cloth" => [
        "controller" => "item",
        "gender" => "woman",
        "articl" => "cloth",
        "action" => "items"
    ],

    "woman/cloth/coats" => ["controller" => "item", "gender" => "woman", "articl" => "cloth", "action" => "items", "type" => "coats"],
    "woman/cloth/sweaters_and_sweatshirts" => ["controller" => "item", "gender" => "woman", "articl" => "cloth", "action" => "items", "type" => "sweaters_and_sweatshirts"],
    "woman/cloth/jackets_and_blazers" => ["controller" => "item", "gender" => "woman", "articl" => "cloth", "action" => "items", "type" => "jackets_and_blazers"],
    "woman/cloth/dresses" => ["controller" => "item", "gender" => "woman", "articl" => "cloth", "action" => "items", "type" => "dresses"],
    "woman/cloth/shirts_and_tops" => ["controller" => "item", "gender" => "woman", "articl" => "cloth", "action" => "items", "type" => "shirts_and_tops"],
    "woman/cloth/blouses_and_shirts" => ["controller" => "item", "gender" => "woman", "articl" => "cloth", "action" => "items", "type" => "blouses_and_shirts"],
    "woman/cloth/jeans" => ["controller" => "item", "gender" => "woman", "articl" => "cloth", "action" => "items", "type" => "jeans"],
    "woman/cloth/pants" => ["controller" => "item", "gender" => "woman", "articl" => "cloth", "action" => "items", "type" => "pants"],
    "woman/cloth/skirts" => ["controller" => "item", "gender" => "woman", "articl" => "cloth", "action" => "items", "type" => "skirts"],
    "woman/cloth/underwear" => ["controller" => "item", "gender" => "woman", "articl" => "cloth", "action" => "items", "type" => "underwear"]
];
