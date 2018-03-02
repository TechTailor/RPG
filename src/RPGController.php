<?php

namespace TechTailor\RPG;

use App\Http\Controllers\Controller;

class RPGController extends Controller
{
    public function Preset($preset, $encrypt = 0)
    {
        if ($preset == 1) {
            $size = 8;
            $dashes = 0;
            $characters = 'ld';
        } elseif ($preset == 2) {
            $size = 8;
            $dashes = 0;
            $characters = 'lud';
        } elseif ($preset == 3) {
            $size = 12;
            $dashes = 0;
            $characters = 'luds';
        } elseif ($preset == 4) {
            $size = 16;
            $dashes = 1;
            $characters = 'luds';
        } elseif ($preset == 5) {
            $size = 32;
            $dashes = 1;
            $characters = 'luds';
        }

        return $this->Generate($characters, $size, $dashes, $encrypt);
    }

    public function Generate($characters, $size, $dashes, $encrypt = 0)
    {
        $sets = [];

        if (strpos($characters, 'l') !== false) {
            $sets[] = 'abcdefghjkmnpqrstuvwxyz';
        }

        if (strpos($characters, 'u') !== false) {
            $sets[] = 'ABCDEFGHJKMNPQRSTUVWXYZ';
        }

        if (strpos($characters, 'd') !== false) {
            $sets[] = '123456789';
        }

        if (strpos($characters, 's') !== false) {
            $sets[] = '!@#$%&*?';
        }

        $all = '';
        $password = '';

        foreach ($sets as $set) {
            $password .= $set[array_rand(str_split($set))];
            $all .= $set;
        }

        $all = str_split($all);

        for ($i = 0; $i < $size - count($sets); $i++) {
            $password .= $all[array_rand($all)];
        }

        $password = str_shuffle($password);

        if($dashes)
            $password = $this->addDashes($size, $password);

        if($encrypt)
            $password = encrypt($password);

        return $password;
    }

    protected static function addDashes($size, $password)
    {
        $dash_len = floor(sqrt($size));

        $final_str = '';

        while (strlen($password) > $dash_len) {
            $final_str .= substr($password, 0, $dash_len).'-';
            $password = substr($password, $dash_len);
        }

        $final_str .= $password;

        return $final_str;
    }

    public function Decrypt($encrypted)
    {
        $decrypted = decrypt($encrypted);
        
         return $decrypted;
    }
}
