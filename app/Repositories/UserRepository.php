<?php

namespace App\Repositories;

use App\Repositories\AbstactRepository;
use App\User;

class UserRepository extends AbstactRepository
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function showData($model = NULL)
  	{
  		return $model = Auth::user();

  	}

    // public function getDataByUserId($model = NULL, $id= NULL)
    // {
    //     return $model::where('user_id', $id)->get();
    // }
}
