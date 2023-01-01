<?php

namespace App\Api\Services;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\{
    Http,
};

class SmsService
{
    /**
     * The SMS API Key.
     *
     * @var string
     */
    protected static $apiKey;

    /**
     * The SMS API URL.
     *
     * @var string
     */
    protected static $apiUrl;

    /**
     * Initialize API Key and API Url.
     *
     */
    public static function init()
    {
        self::$apiKey = config('services.sms.api_key');
        self::$apiUrl = config('services.sms.api_url');
    }

    /**
     * Send Bulk Message.
     *
     * @param array $phoneNumbers
     * @param string $message
     * @return
     */
    public static function bulkMessage(array $phoneNumbers, string $message)
    {
        try {
            self::init();

            // $response = Http::post(self::$apiUrl, [
            //     'apikey' => self::$apiKey,
            //     'number' => implode(',', $phoneNumbers),
            //     'message' => $message,
            // ]);

            // if ($response->status() !== 200) throw new \Exception($e);

            // if (str_contains($response->body(), 'invalid')) throw new \Exception($response);

            // $test = '[{"message_id":150540848,"user_id":26521,"user":"escuadrojapp@gmail.com","account_id":26383,"account":"All-In-One-Contact-Tracing","recipient":"639265061415","message":"Ito po ay SMS testing gawa ni Ivan.","sender_name":"Semaphore","network":"Globe","status":"Pending","type":"Single","source":"Api","created_at":"2022-12-24 12:23:13","updated_at":"2022-12-24 12:23:13"}]';

            // $test = json_decode($test, true);

            // dd($test);
            
            return $response->body();

        } catch (\Exception $e) {
            logger()->error($e->getMessage());
            logger()->error($e->getTraceAsString());
            throw $e;
        }
    }

    /**
     * Send Bulk Message.
     *
     * @param string $phoneNumber
     * @param string $message
     * @return
     */
    public static function sendMessage(string $phoneNumber, string $message)
    {
        try {
            self::init();

            $response = Http::post(self::$apiUrl, [
                'apikey' => self::$apiKey,
                'number' => $phoneNumber,
                'message' => $message,
            ]);

            if ($response->status() !== 200) throw new \Exception($e);

            if (str_contains($response->body(), 'invalid')) throw new \Exception($response);
            
            return json_decode($response->body(), true);

        } catch (\Exception $e) {
            logger()->error($e->getMessage());
            logger()->error($e->getTraceAsString());
            throw $e;
        }
    }
}
