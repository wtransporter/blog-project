<?php

namespace App\Services;

use MailchimpMarketing\ApiClient;

class Newsletter
{
    public function subscribe($email, $list = null)
    {
        $list ??= config('services.mailchimp.lists.subscribers');

        try {
            $this->client()->lists->addListMember($list, [
                "email_address" => $email,
                "status" => "subscribed",
            ]);
        } catch (\Exception $e) {
            throw \Illuminate\Validation\ValidationException::withMessages(['Sorry, we cannot add this email to our list.']);
        }
    }

    protected function client()
    {
        return (new ApiClient())->setConfig([
            'apiKey' => config('services.mailchimp.key'),
            'server' => 'us5'
        ]);
    }
}