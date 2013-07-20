<?php
include_once 'php/ILibrary.php';

class MovieLibrary implements ILibrary
{
    private $_version;
    private $_name;
    private $_movies;
    private $_filters;
    
    // Constructors
    function __construct($_version, $_name, $_movies) {
        $this->_version = ($_version?$_version:"1.0");
        $this->_name = ($_name?$_name:"My Movie Library");
        $this->_movies = array ();
        $this->_filters = array ();
    }
    
    /** 
     * Refresh library by
     */
    public function refresh() {
        
    }    
    
    /**
     * Searches the library for items corresponding to the search criteria
     * @param type $criteria Array of search criteria
     */
    public function search($criteria) {
        
    }  
    
    /**
     * Adds a filtering criteria to library researches.
     * Maintains a list of unique filters
     * @param type $filter_name
     * @param type $criteria
     */
    public function add_filter($filter_name, $criteria) {
        // Adds filters when not already existing
        if (!array_key_exists($filter_name, $this->_filters)) {
            $this->_filters[$filter_name] = $criteria;
        }
    }
    
    public function show_filters () {
        print_r($this->_filters);
    }
    
    // Getters, Setters
    public function get_version() {
        return $this->_version;
    }

    public function get_name() {
        return $this->_name;
    }

    public function get_movies() {
        return $this->_movies;
    }    
    

}
?>