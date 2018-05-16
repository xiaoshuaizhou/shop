<?php

namespace App\Jobs;

use Mail;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Naux\Mail\SendCloudTemplate;

class SendRegisterEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $user;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $user = $this->user;
        $data = [
            'url' => route('email.verify', ['token' => $this->user->token]),
            'name' => $this->user->name
        ];
        $template = new SendCloudTemplate('zhihu_app_register', $data);

        Mail::raw($template, function ($message) use ($user) {
            $message->from(env('SEND_EMAIL_FROM'), env('APP_NAME'));

            $message->to($this->user->email);
        });
        \Log::info("send email to " . $this->user->email);
    }
}
