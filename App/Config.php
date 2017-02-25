<?php
namespace App;

class Config{
    public static function get()
    {
        $json = file_get_contents("../config.json");
		if(json_decode($json, true)){
			return json_decode($json, true);
		}else{
			die('Config error : Error with Json given.');
		}
    }
	
}