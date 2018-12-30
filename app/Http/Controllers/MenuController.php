<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class MenuController extends Controller
{
    public function index(){
        $menuItems = DB::table('menu_items')
        ->join('categories', 'categories.id', '=', 'menu_items.categoryId')
        ->select('menu_items.value', 'categories.name')
        ->get();

        $cats = DB::table('categories')
        ->distinct()
        ->select('categories.name')
        ->join('menu_items', 'categories.id', '=', 'menu_items.categoryId')
        ->get();
        
        $jsonFormat = array();

        foreach($cats as $cat) {
            $obj = new \stdClass();
            $obj -> cat = $cat->name;
            $temp = array();
            foreach($menuItems as $menuItem) {
                if (strcmp($cat->name, $menuItem->name) == 0) {
                    array_push($temp, $menuItem->value);
                }
            }
            $obj -> items = $temp;
            array_push($jsonFormat, $obj);
        }

        return $jsonFormat;
    }
}
