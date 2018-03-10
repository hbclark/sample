<?php
function get_db_config()
{
	if (getenv('IS_IN_HEROKU')) {
		$url = parse_url(getenv("DATABASE_URL"));

		return $db_config = [
			'connection' => 'pgsql',
			'host' => 'ec2-50-16-217-122.compute-1.amazonaws.com',
            'database'  => 'd8jh74sk66i8dq',
            'port'=>'5432',
			'username'  => 'dfiyakmpmfefth',
			'password'  => '0d66a80d50ded0df5d41d57183347a544f9996a44e8d5e5d889dfc57c9040019',
		];
	} else {
		return $db_config = [
			'connection' => env('DB_CONNECTION', 'mysql'),
			'host' => env('DB_HOST', 'localhost'),
			'database'  => env('DB_DATABASE', 'forge'),
			'username'  => env('DB_USERNAME', 'forge'),
			'password'  => env('DB_PASSWORD', ''),
		];
	}
}