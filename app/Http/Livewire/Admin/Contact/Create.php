<?php

namespace App\Http\Livewire\Admin\Contact;

use App\Models\Contact;
use Illuminate\Http\Request;
use Livewire\Component;
use Illuminate\Support\Facades\RateLimiter;

class Create extends Component
{
    public $name, $email, $subject, $message;

    protected $rules = [
        'name' => 'required|min:2|max:255',
        'email' => 'required|email',
        'subject' => 'required|min:2',
        'message' => 'required|min:15',
    ];

    public function store(Request  $r)
    {
        $this->validate();

        if (RateLimiter::remaining('send-message:' . $r->ip(), 1)) {
            RateLimiter::hit('send-message:' . $r->ip());

            Contact::create([
                'name' => $this->name,
                'email' => $this->email,
                'subject' => $this->subject,
                'message' => $this->message,
            ]);
            session()->flash('success', 'Message Sent Successfully. Thank you!');
            $this->reset('name', 'email', 'subject', 'message');
        } elseif (RateLimiter::tooManyAttempts('send-message:' . $r->ip(), 1)) {
            $seconds = RateLimiter::availableIn('send-message:' . $r->ip());

            session()->flash('error', 'You have exceeded the maximum number of attempts. Please try again in ' . $seconds . ' seconds.');
        } else {
            session()->flash('error', 'Something go wrong. Plz try again.');
        }
    }

    public function render()
    {
        return view('livewire.admin.contact.create');
    }
}
