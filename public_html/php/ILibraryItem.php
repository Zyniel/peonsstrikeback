<?php
interface LibraryItem {
    /** 
     * Refresh library by
     */
    public function get_name();
    public function to_json();
}
?>