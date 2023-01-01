<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Api\Repositories\{
    SentSmsUserRepository,
    SmsLogRepository,
};
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use App\Api\Services\SmsService;

class SentSmsJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Visitors Contact Information
     *
     * @var array
     */
    protected $visitors;

    /**
     * The Sent Sms User Repository Instance.
     *
     * @var App\Api\Repositories\SentSmsUserRepository
     */
    protected $sentSmsUserRepository;

    /**
     * The Sms Log Repository Instance.
     *
     * @var App\Api\Repositories\SmsLogRepository
     */
    protected $smsLogRepository;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($visitors)
    {
        $this->visitors = $visitors->toArray();
        $this->sentSmsUserRepository = resolve(SentSmsUserRepository::class);
        $this->smsLogRepository = resolve(SmsLogRepository::class);
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        DB::beginTransaction();

        $batchNumber = $this->sentSmsUserRepository->getLastBatchNumber();
        dd($this->visitors);
        try {
            $count = 0;

            foreach($this->visitors as $key => $value) {
                if ($count == 115) {
                    $count = 0;
                    sleep(60);
                }

                $message = sprintf(__('sms.contact_tracing'), Arr::get($value, 'visitor_fullname'), Arr::get($value, 'establishment_name'));
                $sms = SmsService::sendMessage(Arr::get($value, 'visitor_contact_number'), $message);

                if (is_array($sms)) {
                    $this->sentSmsUserRepository->create([
                        'batch_no' => $batchNumber,
                        'establishment_id' => Arr::get($value, 'establishment_id'),
                        'visitor_id' => Arr::get($value, 'visitor_id'),
                        'entrance_timestamp' => date('Y-m-d H:i:s', strtotime(Arr::get($value, 'entrance_timestamp'))),
                    ]);

                    $this->smsLogRepository->create([
                        'batch_no' => $batchNumber,
                        'logs' => json_encode($sms),
                    ]);

                    DB::commit();
                }

                $count++;
            }

        } catch (\Exception $e) {
            DB::rollBack();
            logger()->error($e->getMessage());
            logger()->error($e->getTraceAsString());
            throw $e;
        }
    }
}
