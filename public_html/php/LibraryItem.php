<?php
class Movie implements LibraryItem
{
    private $_movie_id;
    private $_movie_name;
    
    function __construct($_movie_id, $_movie_name) {
        $this->_movie_id = $_movie_id;
        $this->_movie_name = $_movie_name;
    }

    public function to_json() {
        return "JSON";
    }
}
?>