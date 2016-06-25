<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\StatusFile;

class CodeStatus extends Model
{
    protected $table ='codes_status';
    protected $fillable =['label','group_status_id', 'step', 'description'];

    public $timestamps = false;


    public function group()
    {
        return $this->belongsTo('App\GroupStatus', 'group_status_id');
    }

    public function getLabelAttribute($value)
    {
        return mb_strtoupper($value);
    }
    public function getStepAttribute($value)
    {
        return mb_strtoupper($value);
    }

    public function getDescriptionAttribute($value)
    {
        return mb_strtoupper($value);
    }



    public function setLabelAttribute($value)
    {
        $this->attributes['label'] = mb_strtoupper($value);
    }
    public function setStepAttribute($value)
    {
        $this->attributes['step'] = mb_strtoupper($value);
    }

    public function setDescriptionAttribute($value)
    {
        $this->attributes['description'] = mb_strtolower($value);
    }

    public static function filterStatus($list, $filter)
    {
        $awesome = $list;


            foreach($filter as $done) {
                foreach($awesome as $key => $ok) {
                    if($done['code_status_id'] == $ok['id']) {
                        unset($awesome[$key]);
                    }
                }
            }


        return $awesome;
    }

    public static function getLastStatus($list)
    {
        $array = [];

        $key = count($list);
        if($key > 0) {
            $array = $list[$key-1];
        }

        return $array;
    }

    public static function getThemAllLastStatus($files) {
        $xfiles = [];
        $xfiles['aviser'] = [];
        $xfiles['repair_to_do'] = [];
        $xfiles['order_to_do'] = [];

        foreach($files as $key => $file) {

            if(isset($file['laststatus'][0]) ) {

                $last = $file['laststatus'][0]['code'];

                if($last['label'] == 'PE' || $last['label'] == 'PED') {
                    $xfiles['aviser'][] = $files[$key];
                }
                else if($last['label'] == 'I/A' || $last['label'] == 'TDY'|| $last['label'] == 'EC') {

                    $xfiles['repair_to_do'][] = $files[$key];

                }
                else if($last['label'] == 'TW') {
                    $xfiles['order_to_do'][] = $files[$key];

                }
                else {

                }
            }
        }

        return $xfiles;
    }
    public static function getOUT($list) {

            if(! empty($list['device']['history'])) {
                foreach($list['device']['history'] as $key => $history){
                    $history['out'] = StatusFile::where(['file_id'=> $history['file_id'], 'code_status_id'=> '23' ])->first();
                    $list['device']['history'][$key] = $history;
                }
            }

        return $list;
    }

}
