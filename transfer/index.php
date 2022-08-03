<?php 
/**
 * $col_compare = ['cms2_colum' => 'cms3_colum']
 */
require __DIR__.'/class/Tranfers.php';
require __DIR__.'/class/ProductCateTranser.php';
require __DIR__.'/class/ProductDataTranser.php';
require __DIR__.'/class/ProductHtmlTranser.php';
require __DIR__.'/class/ProductFileTranser.php';
require __DIR__.'/class/ProductImgTranser.php';
require __DIR__.'/class/ProductSpecTranser.php';
require __DIR__.'/class/db.php';

$cms2_db = new db("124.150.130.228", "rubbers", "l4qp5qcwSU", "amg_rubbers");//cms2
$cms3_db = new db("124.150.130.228", "rubbers", "l4qp5qcwSU", "amg_rubbers2");//cms3


//產品類別
$cms2_tb = 'neweng_products_cate';
$cms3_tb = 'eng_product_cate';

$col_compare = [
    'pc_id' => 'pc_id',
    'pc_parent' => 'pc_parent',
    'pc_layer' => 'pc_layer',
    'pc_status' => 'pc_status',
    'pc_sort' => 'pc_sort',
    'pc_name' => 'pc_name',
    'pc_level' => 'pc_level',
    'pc_custom_status' => 'pc_custom_status',
    'pc_show_style' => 'pc_show_style',
    'pc_cate_img' => 'pc_s_pic',
    'pc_modifydate' => 'pc_modify',
    'pc_seo_filename' => 'pc_seo_filename',
    'pc_locked' => 'pc_locked',
    'pc_modifyaccount' => 'pc_modifyaccount',
    'pc_up_sort ' => 'pc_up_sort',
];
$col_fix_upload_files_path = [
    'pc_cate_img',
];

//產品
// $cms2_tb = 'neweng_products';
// $cms3_tb = 'eng_product';

// $col_compare = [
//     'pc_id' => 'pc_id',
//     'p_id' => 'p_id',
//     'p_status' => 'p_status',
//     'p_sort' => 'p_sort',
//     'p_new_sort' => 'p_new_sort',
//     'p_hot_sort' => 'p_hot_sort',
//     'p_name' => 'p_name',
//     'p_custom_status' => 'p_custom_status',
//     'p_show_style' => 'p_show_style',
//     'p_type' => 'p_type',
//     'p_show_price' => 'p_show_price',
//     'p_list_price' => 'p_list_price',
//     'p_special_price' => 'p_special_price',
//     'p_serial' => 'p_serial',
//     'p_small_img' => 'p_s_pic',
//     'p_desc_strip' => 'p_desc_strip',
//     'p_modifydate' => 'p_modify',
//     'p_locked' => 'p_locked',
//     'p_modifyaccount' => 'p_modifyaccount',
//     'p_up_sort' => 'p_up_sort',
// ];
// $col_fix_upload_files_path = [
//     'p_small_img',
// ];

//產品頁籤
// $cms2_tb = 'neweng_products';
// $cms3_tb = 'eng_product_html';

// $col_compare = [
//     'p_id' => 'p_id',
//     'p_desc' => 'p_content_html1',
//     'p_character' => 'p_content_html2',
//     'p_spec' => 'p_content_html3',
// ];
// $col_fix_upload_files_path = [
//     'p_desc',
//     'p_character',
//     'p_spec'
// ];

// //產品附件
// $cms2_tb = 'newcht_products';
// $cms3_tb = 'cht_product_file';

// $col_compare = [
//     'p_id' => 'p_id',
//     'p_attach_file1' => 'p_attach_file1'
// ];
// $col_fix_upload_files_path = [
//     'p_attach_file1'
// ];

//產品輪播圖
// $cms2_tb = 'neweng_products_img';
// $cms3_tb = 'eng_product_img';

// $col_compare= [
//     'p_id' => 'p_id',
//     'p_big_img1' => 'p_b_pic1',
//     'p_big_img2' => 'p_b_pic2',
//     'p_big_img3' => 'p_b_pic3',
//     'p_big_img4' => 'p_b_pic4'
// ];
// $col_fix_upload_files_path = [
//     'p_big_img1',
//     'p_big_img2',
//     'p_big_img3',
//     'p_big_img4',
// ];

//產品規格
// $cms2_tb = 'neweng_products';
// $cms3_tb = 'eng_product_spec';

// $col_compare = [
//     'p_id' => 'p_id',
// ];
// $col_fix_upload_files_path = [

// ];

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

//產品類別
$prod_cate = new ProductCateTranser($cms2_db, $cms3_db, $cms2_tb, $cms3_tb, $col_compare, $col_fix_upload_files_path);
$prod_cate->transStart();

//產品
// $prod_data = new ProductDataTranser($cms2_db, $cms3_db, $cms2_tb, $cms3_tb, $col_compare, $col_fix_upload_files_path);
// $prod_data->transStart();

//產品頁籤
// $prod_html = new ProductHtmlTranser($cms2_db, $cms3_db, $cms2_tb, $cms3_tb, $col_compare, $col_fix_upload_files_path);
// $prod_html->transStart();

//產品附件
// $prod_file = new ProductFileTranser($cms2_db, $cms3_db, $cms2_tb, $cms3_tb, $col_compare, $col_fix_upload_files_path);
// $prod_file->transStart();

//產品輪播圖
// $prod_img = new ProductImgTranser($cms2_db, $cms3_db, $cms2_tb, $cms3_tb, $col_compare, $col_fix_upload_files_path);
// $prod_img->transStart();

//產品規格
// $prod_spec = new ProductSpecTranser($cms2_db, $cms3_db, $cms2_tb, $cms3_tb, $col_compare, $col_fix_upload_files_path);
// $prod_spec->transStart();