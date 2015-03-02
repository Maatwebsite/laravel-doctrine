<?php namespace Mitch\LaravelDoctrine\Cache;

use Doctrine\Common\Cache\RedisCache;

class RedisProvider implements Provider 
{
    public function make($config = null) 
    {
        $redis = app('redis');
        $redis->connect($config['host'], $config['port']);
        if (isset($config['database']))
            $redis->select($config['database']);

        $cache = new RedisCache;
        $cache->setRedis($redis);
        return $cache;
    }

    public function isAppropriate($provider)
    {
        return $provider == 'redis';
    }
}
