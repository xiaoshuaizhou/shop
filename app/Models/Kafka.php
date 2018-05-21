<?php

namespace App\Models;

class Kafka
{
    public $borker_list = env('BROKER_LIST');
    public $topic = env('TOPIC');
    public $partition = 0;
    public $logFile = storage_path('logs/kafka.log') ；// 日志地址
    protected $producer = null;
    protected $consumer = null;

    public function __construct()
    {
        if (empty($this->borker_list)){
            throw new \Exception('broker not config',404);
        }
        $rk = new \RdKafka\Producer();
        $rk->setLogLevel(LOG_DEBUG);
        if (!$rk->addBrokers($this->borker_list)){
            throw new \Exception('producer error',404);
        }
        $this->producer = $rk;
    }

    public function send($messages = [])
    {
        $topic = $this->producer->newTopic($this->topic);

        return $topic->producer(RD_KAFKA_PARTITION_UA, $this->partition, json_encode($messages));
    }
}