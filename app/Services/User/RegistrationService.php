<?php

namespace App\Services\User;

use App\Models\Company;
use App\Models\Wallet;
use App\Services\BaseServiceInterface;
use App\Notifications\User\ActivateUser;
use DB;
use App\Support\Enum\UserStatus;
use App\Models\User;
use Illuminate\Support\Facades\URL;

class RegistrationService implements BaseServiceInterface
{
    protected $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function run()
    {
        return $this->processInvite();
    }

    private function processInvite()
    {
        return  \DB::transaction(function () {

            $new_user = $this->createConfirmedUser($this->data);
            return $new_user;
        });
    }

    private function createConfirmedUser($data)
    {
        $user = $this->createUser($data);
        $user->assignRole([$data['role']], 'web');
        //$user->notify(new ActivateUser($this->mailData($user)));
        return $user;
    }

    private function createUser($data)
    {
        $user = new User();
        $user->id = uniqid();
        $user->email = $data['email'];
        $user->phone_number = $data['phone_number'];
        $user->first_name = $data['first_name'];
        $user->last_name = $data['last_name'];
        $user->password = $data['password'];
        $user->address = $data['address'];
        $user->status = UserStatus::UNCONFIRMED;
        $user->save();
        return $user;
    }

    private function mailData($invited_user)
    {
            return [
                'companies' => 'Brans',
                'recipient' =>   $invited_user->email,
                'subject' => "Invitation to join Vantage",
                'inviter' =>  "Welcome",
                'valid_duration' => "24 hours",
                'link' =>  URL::temporarySignedRoute('auth.activate', now()->addHour(24), ['id'=>  $invited_user->id])
            ];
    }

}
