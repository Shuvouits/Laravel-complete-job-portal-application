<?php
namespace App\Services;

class Notify{
    static function createdNotification(){
        return notify()->success('New Data Inserted', 'Success!');
    }

    static function updateNotification(){
        return notify()->success('Data Updated Successfully', 'Success!');
    }

}
