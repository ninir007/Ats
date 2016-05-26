<?php

namespace App;

use DB;

class Autocomplete
{
    public static function getSuggestion($params)
    {
        if(isset($params['table']) && isset($params['restrict']) && isset($params['keyword']))
        {
            $res = DB::table($params['table'])
                ->where($params['restrict'], 'like', '%'.$params['keyword'].'%')
                ->get();
            $fields=[];

            foreach($res as $item) {
                $name = $item->LastName.' '. $item->FirstName;
                $fields[] = [ 'label' => $name , 'value' => $item->id ];
            }
            return $fields;
        }
        else  return [];
    }



}