<?php

return [

    /*
     * You may wish for all e-mails sent with Mailgun to be sent from
     * the same address. Here, you may specify a name and address that is
     * used globally for all e-mails that are sent by Mailgun.
     *
     */
    'from' => [
        'address' => env('MAILGUN_FROM_ADDRESS', 'amr.fci2007@gmail.com'),
        'name'    => env('MAILGUN_FROM_NAME', 'AmrFayad'),
    ],

    /*
     * Global reply-to e-mail address
     *
     */
    'reply_to' => env('MAILGUN_REPLY_TO', 'amr.fci2007@gmail.com'),

    /*
     * Mailgun (private) API key
     *
     */
    'api_key' => env('MAILGUN_SECRET', 'key-e2d1bb3857a1b9d4c1c4730ec4e3c072'),

    /*
     * Mailgun public API key
     *
     */
    'public_api_key' => env('MAILGUN_PUBLIC', 'pubkey-df9175037dc432013079282cd82a581d'),

    /*
     * Domain name registered with Mailgun
     *
     */
    'domain' => env('MAILGUN_DOMAIN', 'sandboxd56b81112a5345d1b97a8cfd04200a11.mailgun.org'),

    /*
     * Force the from address
     *
     * When your `from` e-mail address is not from the domain specified some
     * e-mail clients (Outlook) tend to display the from address incorrectly
     * By enabling this setting Mailgun will force the `from` address so the
     * from address will be displayed correctly in all e-mail clients.
     *
     * Warning:
     * This parameter is not documented in the Mailgun documentation
     * because if enabled, Mailgun is not able to handle soft bounces
     *
     */
    'force_from_address' => env('MAILGUN_FORCE_FROM_ADDRESS', false),

    /*
     * Testing
     *
     * Catch All address
     *
     * Specify an email address that receives all emails send with Mailgun
     * This email address will overwrite all email addresses within messages
     */
    'catch_all' => env('MAILGUN_CATCH_ALL', 'amr.fci2007@gmail.com'),

    /*
     * Testing
     *
     * Mailgun's testmode
     *
     * Send messages in test mode by setting this setting to true.
     * When you do this, Mailgun will accept the message but will
     * not send it. This is useful for testing purposes.
     *
     * Note: Mailgun does charge your account for messages sent in test mode.
     */
    'testmode' => env('MAILGUN_TEST_MODE', true),
];
