<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
     protected $fillable = [
        'menu', 'submenu', 'link','descricao', 'ordem', 'activo','path'
    ];
    

    public static function getMenu()
    {

        $valty = DB::table('menus')
            ->get();

        return $valty;
    }

    public static function getAllMenu(){

    	$menus = Menu::
                 where('submenu', '=', '1')
                 ->orderBy('ordem','asc')->get();

                $cart = array();
                foreach ($menus as $key => $variable) {

                $cart2 = array();

                          $submenus = Menu::
                             where('submenu', '=', $variable['id'])
                             ->orderBy('ordem','asc')->get();


                              if(count($submenus) > 0){
                                    foreach ($submenus as $key => $variabletmp) {
                                    $cart3 = array();
                                        $submenus2 = Menu::
                                         where('submenu', '=', $variabletmp['id'])
                                         ->orderBy('ordem','asc')->get();
                                            
                                            if(count($submenus2) > 0){
                                              //  dd($submenus2);
                                                    foreach ($submenus2 as $key => $variabletmp2) {
                                                            $cart3[] = array('menu' => $variabletmp2['menu'], 'link' => $variabletmp2['link'] ,'path' => $variabletmp2['path'], 'id' => $variabletmp2['id']);

                                                    }
                                            }

                                        $cart2[] = array('menu' => $variabletmp['menu'], 'link' => $variabletmp['link'] ,'path' => $variabletmp['path'], 'id' => $variabletmp['id'],'submenutmp' => $cart3);

                                    }

                              }

                               $cart[] = array('menu' => $variable['menu'], 'link' => $variable['link'] ,'path' => $variable['path'], 'id' => $variable['id'], 'submenutmp' => $cart2);

                            
                }

                return $cart;

    }
        public static function getMenuFooter(){

        $menusf = Menu::
                 where('submenu', '=', '2')
                 ->orderBy('ordem','asc')->get();


   
        return $menusf;

    }
}
