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
    private $pricemin;
    
    
    /**
     * @var integer
     */
    private $pricemax;

    /**
     * @var string
     */
    private $currency;
    
        /**
     * @var string
     */
    private $town;
  
    /**
     * @var string
     */
    private $area;
    
     /**
     * @var string
     */
    private $place;
    function getSearch() {
        return $this->search;
    }

    function getPricemin() {
        return $this->pricemin;
    }

    function getPricemax() {
        return $this->pricemax;
    }

    function getCurrency() {
        return $this->currency;
    }

    function getTown() {
        return $this->town;
    }

    function getArea() {
        return $this->area;
    }

    function getPlace() {
        return $this->place;
    }

    function setSearch($search) {
        $this->search = $search;
    }

    function setPricemin($pricemin) {
        $this->pricemin = $pricemin;
    }

    function setPricemax($pricemax) {
        $this->pricemax = $pricemax;
    }

    function setCurrency($currency) {
        $this->currency = $currency;
    }

    function setTown($town) {
        $this->town = $town;
    }

    function setArea($area) {
        $this->area = $area;
    }

    function setPlace($place) {
        $this->place = $place;
    }

}
