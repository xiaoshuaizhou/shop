<?php

namespace App\Models;

class Kafka
{
    public $borker_list='localhost:9092';
    public $topic = 'asynclog';
    public $partition = 0;
    public $logFile;
    protected $producer = null;
    protected $consumer = null;

    public function __construct()
    {
        $this->logFile  = storage_path('logs/kafka.log');

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
    /**
     * 向kafka中发送消息
     * @param array $messages
     * @return mixed
     */
    public function send($messages = [])
    {
        $topic = $this->producer->newTopic($this->topic);

        return $topic->produce(RD_KAFKA_PARTITION_UA, $this->partition, json_encode($messages));
    }

    public function consumer($object, $callback)
    {
        $conf = new \RdKafka\Conf();
        $conf->set('group.id', 0);
        $conf->set('metadata.broker.list', $this->borker_list);
        $topicConf = new \RdKafka\TopicConf();
        $topicConf->set('auto.offset.reset', 'smallest'); //从开头的消息消费（最小值）

        $conf->setDefaultTopicConf($topicConf); // 将配置信息写入配置中
        $consumer = new \RdKafka\KafkaConsumer($conf);
        $consumer->subcribe([$this->topic]);   // 订阅消息，监听消息队列

        echo "waiting for message ...";

        while (true){
            $message = $consumer->consume(120*1000);
            switch ($message->err){
                case RD_KAFKA_RESP_ERR_NO_ERROR:    //如果没有错就处理消息
                    echo "message payload .....";
                    $object->$callback([$message->payload]);
                    break;
            }
            sleep(1); //休眠,避免CPU消耗越来越大
        }

    }
}