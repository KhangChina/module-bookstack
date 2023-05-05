<?php

/**
 * Ensures that the module init file can't be accessed directly, only within the application.
 */
defined('BASEPATH') or exit('No direct script access allowed');

/*
Module Name: BookStack Module
Description: Module tự động kết nối với document HTGSoft không cần đăng nhập
Version: 1.0.0
Requires at least: 1.0.*
*/

//Đăng kí hook khi admin được khởi tạo
hooks()->add_action('admin_init', 'bookstack_init_menu_items');
//Gọi function đã define
function bookstack_init_menu_items()
{
    $CI = &get_instance();
    if (has_permission('bookstack', '', 'view')) {

        $CI->app_menu->add_sidebar_menu_item('bookstack-menu-unique-id', [
            'name'     => 'Documents', // Tên menu được hiển thị ngoài giao diên menu
            'href'     => admin_url('bookstack/index'), // URL của admin "chuyentrang" là 1 function của controller
            'position' => 10, // Vị trí của menu
            'icon'     => 'fa-sharp fa-solid fa-book', // Font awesome icon
        ]);

    }
    
}

hooks()->add_action('admin_init', 'bookstack_permissions');
function bookstack_permissions(){
    $capabilities = [];

    $capabilities['capabilities'] = [
        'view'   => _l('permission_view') . '(' . _l('permission_global') . ')',
        // 'create' => _l('permission_create'),
        // 'edit'   => _l('permission_edit'),
        // 'delete' => _l('permission_delete'),
    ];
    register_staff_capabilities('bookstack', $capabilities, _l('Bookstack'));
}

register_activation_hook('bookstack', 'bookstack_module_activation_hook');

function bookstack_module_activation_hook()
{
    $CI = &get_instance();
    require_once(__DIR__ . '/install.php');
}