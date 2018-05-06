<?php

namespace App\Console\Commands;

use GuzzleHttp\Client;
use Illuminate\Console\Command;

class ESinit extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'es:init';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'init laravel elasticsearch for shopTitle';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     * 向ES中发送reset风格的请求
     * @return mixed
     */
    public function handle()
    {
        //创建template
        $client = new Client();
        $url = config('scout.elasticsearch.hosts')[0] . '/_template/tmp';
        //保证这个URL不存在
//        if (!is_null($url)){
//            $client->delete($url);
//        }
        $params = [
            'json' => [
                'template' => config('scout.elasticsearch.index'),
                'mappings' => [
                    '_default_' => [
                        'dynamic_templates' => [
                            [
                                'strings' => [
                                    'match_mapping_type' => 'string',
                                    'mapping' => [
                                        'type' => 'text',
                                        'analyzer' => 'ik_smart',
                                        'fields' => [
                                            'keyword' => [
                                                'type' => 'keyword'
                                            ],
                                        ],
                                    ],
                                ],
                            ]
                        ],
                    ],
                ],
            ],
        ];
        //想URL发送参数创建template
        $client->put($url, $params);
        //做记录 显示在命令行
        $this->info('============ 创建模板成功 ==============');

        //创建index
        $url = config('scout.elasticsearch.hosts')[0] . '/' . config('scout.elasticsearch.index');
//        if (!is_null($ulr)){
//            $client->delete($url);
//        }
        $params = [
            'json' => [
                'settings' => [
                    'refresh_interval' => '5s',
                    'number_of_shards' => 1,
                    'number_of_replicas' => 0,
                ],
                'mappings' => [
                    '_default_' => [
                        '_all' => [
                            'enabled' => false
                        ],
                    ],
                ],
            ],
        ];
        $client->put($url, $params);
        $this->info('============ 创建索引成功 ==============');
    }
}
