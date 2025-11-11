<?php

namespace App\Infrastructure\Persistence\User;

use App\Domain\User\Entities\User;
use App\Domain\User\Repositories\UserRepository;
use App\Models\User as ModelsUser;

class EloquentUserRepository implements UserRepository
{
    public function criar(User $user): User
    {
        $modelUser = ModelsUser::create([
            'name'       => $user->name,
            'email'      => $user->email->value(),
            'password'   => $user->passwordHash,
            'phone'      => $user->phone->value(),
            'profile_id' => $user->profileId,
            'role_id'    => $user->roleId,
        ]);
        $user->id = $modelUser->id;
        return $user;
    }

    public function update(User $user): User
    {
        $modelUser = ModelsUser::findOrFail($user->id);
        
        $modelUser->update([
            'name'       => $user->name,
            'email'      => $user->email->value(),
            'phone'      => $user->phone->value(),
            'profile_id' => $user->profileId,
            'role_id'    => $user->roleId,
        ]);
        return $user;
    }
}
