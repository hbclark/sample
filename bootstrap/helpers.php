<?php
function get_db_config(){
    if(getenv('IS_IN_HEROKU')){
        $url=parse_url(getenv("DATABASE_URL"));

        return $db_config=[
            'connection'=>'pgsql',
            'host'=>$url["host"],
            'databse'=>substr($url["path"]),
            'username'=>$url["user"],
            'password'=>$url["pass"],

        ];
    } else {
        return $db_config=[
            'conntection'=>env('DB_CONNECTION','mysql'),
            'host'=>env('DB_HOST','localhost'),
            'database'=>env('DB_DATABASE','homestead'),
            'username'=>env('DB_USERNAME','homestead'),
            'password'=>env('DB_PASSWORD','')
        ];
    }
}