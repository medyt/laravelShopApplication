<?php

namespace App;

class Cart
{
    public $ids = array();
    public $titles = array();
    public $descriptions = array();
    public $prices = array();   

    public function __construct($oldCart)
    {
        if($oldCart) {
            $this->ids = $oldCart ->ids;
            $this->titles = $oldCart ->titles;
            $this->descriptions = $oldCart ->descriptions;
            $this->prices = $oldCart ->prices;
        }
    }
    public function add($item)
    {
        if (!array_key_exists($item->id, $this->ids)) {
            $this->ids[] = $item ->id;
            $this->titles[] = $item ->title;
            $this->descriptions[] = $item ->description;
            $this->prices[] = $item ->price;
        }       
    }
    public function remove($item)
    {
        if (!is_null(array_key_exists($item->id, $this->ids))) {
            $key = array_search($item->id, $this->ids);
            array_splice($this->ids, $key, 1);
            array_splice($this->titles, $key, 1);
            array_splice($this->descriptions, $key, 1);
            array_splice($this->prices, $key, 1);
        }
    }
}
