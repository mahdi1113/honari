<?php

namespace App\Service\User;

use App\Models\User;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

class UserService
{
    use AuthorizesRequests;
    public function __construct(
        readonly UserRepositoryInterface $userRepositoryInterface,
        readonly Request $request
    ){}

    public function getUsers()
    {
        return $this->userRepositoryInterface->index();
    }

    public function getUser( int $id )
    {
        return $this->userRepositoryInterface->show( $id );
    }

    public function getUserOnline()
    {
        return $this->userRepositoryInterface->showOnline();
    }

    public function createUser()
    {
        return $this->userRepositoryInterface->store( $this->data() );
    }


    public function updateUser( int $id )
    {
        return $this->userRepositoryInterface->update( $this->data(), $id );
    }

    public function updateUserOnline( int $id )
    {
        $user = $this->getUser( $id );
        $this->authorize('update', $user);

        return $this->userRepositoryInterface->updateOnline( $this->data(), $id );
    }

    public function destroyUser(int $id)
    {
        return $this->userRepositoryInterface->destroy($id);
    }


    public function data()
    {
        $data = [
            'user_name' => $this->request->get('user_name'),
            'password' => $this->request->get('password'),
            'email' => $this->request->get('email'),
            'phone' => $this->request->get('cell_number'),
            'verified' => $this->request->get('verified'),
        ];

        return $data;
    }
}
