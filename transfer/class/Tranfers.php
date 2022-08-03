<?php

abstract class Transfers
{
    private $db1;
    private $db2;
    private $tb1;
    private $tb2;
    private $col_compare;
    private $col_fix_upload_file;
    public $message = '轉換完成';

    function __construct(db $db1, db $db2, $tb1, $tb2, array $col_compare, array $col_fix_upload_file)
    {
        $this->db1 = $db1;
        $this->db2 = $db2;
        $this->tb1 = $tb1;
        $this->tb2 = $tb2;
        $this->col_compare = $col_compare;
        $this->col_fix_upload_file = $col_fix_upload_file;
    }

    public function transStart()
    {
        $col_compare = $this->getCol_compare();
        $cms2_db = $this->getDb1();
        $cms2_tb = $this->getTb1();
        $cms3_db = $this->getDb2();
        $cms3_tb = $this->getTb2();
        
        if (is_array($col_compare) && $col_compare) {
            $cms2_col = array_keys($col_compare);
            $cms2_str = implode(',', $cms2_col);
            $cms3_col = array_values($col_compare);
            $cms3_str = implode(',', $cms3_col);
            $col_fix_upload_file = $this->getCol_fix_upload_file();

            $cms2_db->query("SELECT " . $cms2_str . " FROM " . $cms2_tb);
            while ($row = $cms2_db->fetch_assoc()) {
                $values = [];
                foreach ($cms2_col as $col) {
                    if (!preg_match('/^[0-9]+$/', $row[$col])) {

                        if(!empty($col_fix_upload_file) && in_array($col, $col_fix_upload_file)){ //upload-files 路徑處理
                            $values[] = "'" . self::fix_upload_files_path(addslashes(trim($row[$col]))) . "'";
                        }else{
                            $values[] = "'" . addslashes(trim($row[$col])) . "'";
                        }

                    } else {
                        if (in_array($col, ['pc_parent', 'pc_id']) && ($row[$col] == 0 || $row[$col] == null)) { //例外處理pc_id,pc_parent不得為0;
                            $values[] = 'null';
                        } else {
                            $values[] = $row[$col];
                        }
                    }
                }

                $values_str = implode(', ', $values);
                if(!$cms3_db->query("INSERT INTO `". $cms3_tb ."` (" . $cms3_str . ") VALUES (" . $values_str . ")")){
                    echo "<br> INSERT INTO " . $cms3_tb . " (" . $cms3_str . ")<br> VALUES (" . $values_str . ")<br><br>";
                }
            }
            echo $this->message;
        } else {
            echo "請放入欄位比較陣列";
        }
    }

    static public function fix_upload_files_path($data)
    {
            return preg_replace('/upload_files\//', 'upload-files/', $data);
    }

    /**
     * Set the value of db1
     *
     * @return  self
     */
    public function setDb1($db1)
    {
        $this->db1 = $db1;

        return $this;
    }

    /**
     * Get the value of db1
     */
    public function getDb1()
    {
        return $this->db1;
    }

    /**
     * Get the value of db2
     */
    public function getDb2()
    {
        return $this->db2;
    }

    /**
     * Get the value of col_compare
     */
    public function getCol_compare()
    {
        return $this->col_compare;
    }

    /**
     * Get the value of tb1
     */
    public function getTb1()
    {
        return $this->tb1;
    }

    /**
     * Get the value of tb2
     */
    public function getTb2()
    {
        return $this->tb2;
    }

    /**
     * Get the value of col_fix_upload_file
     */ 
    public function getCol_fix_upload_file()
    {
        return $this->col_fix_upload_file;
    }
}
