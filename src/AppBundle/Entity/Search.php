<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AppBundle\Entity;

/**
 * Description of Search
 *
 * @author Администратор
 */
class Search {
    /**
     * Строка поиска
     * @var string
     */
    public $search;

     /**
     * @var integer
     */
    public  $pricemin;
    
    
    /**
     * @var integer
     */
    public  $pricemax;

    /**
     * @var string
     */
    public  $currency;
    
        /**
     * @var string
     */
    public  $town;
  
    /**
     * @var string
     */
    public  $area;
    
     /**
     * @var string
     */
    public  $place;
   

}
