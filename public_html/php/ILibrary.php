<?php
interface ILibrary {
    /** 
     * Refresh library by
     */
    public function refresh();
    public function add_filter($filter_name, $criteria);
    public function search($criteria);
}
?>