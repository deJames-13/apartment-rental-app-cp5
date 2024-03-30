<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Str;
use Livewire\Component;
use App\Mail\RegisterMail;
use Illuminate\Support\Facades\Mail;

class VerifyEmail extends Component
{
    public function resendEmail()
    {
        $user = User::find(auth()->id());
        $token = Str::random(40);
        $user->update([
            'email_verified_at' => null,
            'remember_token' => $token,
        ]);
        Mail::to($user->email)->send(new RegisterMail($user));
    }
    public function render()
    {
        return view('auth.verify-email');
    }
}
