<?php

Class ProductHtmlTranser extends Transfers{

    public $message = '產品頁籤轉換完畢';

    function __construct($db1, $db2, $tb1, $tb2, $col_compare, $col_fix_upload_files_path = [])
    {
        parent::__construct($db1, $db2, $tb1, $tb2, $col_compare, $col_fix_upload_files_path);
    }
}