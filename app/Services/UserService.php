<?php

namespace App\Services;

use App\Models\Users;
use App\Models\Usertypes;

use Carbon\Carbon;

class UserService
{

    public function insertUser(): bool
    {

        if (Users::get()->count() === 0) {

            $usertype = new Usertypes;

            $usertype->name = 'Felhasználó';
            $usertype->created_at = Carbon::now();

            $usertype->save();

            $usertype = new Usertypes;

            $usertype->name = 'Rendszergazda';
            $usertype->created_at = Carbon::now();

            $usertype->save();

            $usertype = new Usertypes;

            $usertype->name = 'Fejlesztő';
            $usertype->created_at = Carbon::now();

            $usertype->save();

            $user = new Users;

            $user->name = 'Cseszneki Gyula';
            $user->email = 'cgyulas@gmail.com';
            $user->password = md5('A1234567');
            $user->image_url = 'img/Gyula_cv.png';
            $user->usertypes_id = 3;
            $user->created_at = Carbon::now();

            $user->save();
        }

        return true;
    }
}
