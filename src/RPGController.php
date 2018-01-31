<?php 

namespace TechTailor\RPG;

use App\Http\Controllers\Controller;
use Carbon\Carbon;

class RPGController extends Controller
{
	public function index()
	{
		echo Carbon::now()->toDateTimeString();
	}

	public function new($characters, $size, $dashes)
	{
		$sets = array();

		if(strpos($characters, 'l') !== false)
			$sets[] = 'abcdefghjkmnpqrstuvwxyz';

		if(strpos($characters, 'u') !== false)
			$sets[] = 'ABCDEFGHJKMNPQRSTUVWXYZ';

		if(strpos($characters, 'd') !== false)
			$sets[] = '123456789';

		if(strpos($characters, 's') !== false)
			$sets[] = '!@#$%&*?';

		$all = '';
		$password = '';

		foreach($sets as $set)
		{
			$password .= $set[array_rand(str_split($set))];
			$all .= $set;
		}
			
		$all = str_split($all);
			
		for($i = 0; $i < $size - count($sets); $i++)
			$password .= $all[array_rand($all)];
			
		$password = str_shuffle($password);
			
		if(!$dashes)
			return $password;
			
		$dash_len = floor(sqrt($size));
			
		$dash_str = '';
			
		while(strlen($password) > $dash_len)
		{
			$dash_str .= substr($password, 0, $dash_len) . '-';
			$password = substr($password, $dash_len);
		}
			
		$dash_str .= $password;
			
		return $dash_str;

	}

	public function preset($preset)
	{
		if($preset == 1)
		{
			$size = 8;
			$dashes = 0;
			$characters = 'ld';
		}

		else if($preset == 2)
		{
			$size = 8;
			$dashes = 0;
			$characters = 'lud';
		}

		else if($preset == 3)
		{
			$size = 12;
			$dashes = 0;
			$characters = 'luds';
		}

		else if($preset == 4)
		{
			$size = 16;
			$dashes = 1;
			$characters = 'luds';
		}

		return $this->new($characters, $size, $dashes);
	}
}