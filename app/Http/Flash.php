<?php


namespace App\Http;


class Flash
{
    public function message($title, $message)
    {
        session()->flash('flash_message', [
            'title'     => $title,
            'message'   => $message,
            'level'     => 'info'
        ]);
    }
    public function success($title, $message)
    {
        session()->flash('flash_message', [
            'title'     => $title,
            'message'   => $message,
            'level'     => 'success'
        ]);
    }
    public function warning($title, $message)
    {
        session()->flash('flash_message', [
            'title'     => $title,
            'message'   => $message,
            'level'     => 'warning'
        ]);
    }
    public function error($title, $message)
    {
        session()->flash('flash_message', [
            'title'     => $title,
            'message'   => $message,
            'level'     => 'error'
        ]);
    }

}