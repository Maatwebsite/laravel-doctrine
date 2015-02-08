<?php namespace Mitch\LaravelDoctrine;

use Mitch\LaravelDoctrine\Cache\Provider;

class CacheManager {

    /**
     * @var array
     */
    private $providers = [];

    /**
     * @param $config
     */
    public function __construct($config)
    {
        $this->config = $config;
    }

    /**
     * @param $type
     * @return null
     */
    public function getCache($type)
    {
        foreach ($this->providers as $provider)
            if ( $provider->isAppropriate($type) )
                return $provider->make($this->getConfig($type));

        return null;
    }

    /**
     * @param $provider
     * @return null
     */
    private function getConfig($provider)
    {
        return isset($this->config[$provider]) ? $this->config[$provider] : null;
    }

    /**
     * @param Provider $provider
     */
    public function add(Provider $provider)
    {
        $this->providers[] = $provider;
    }
} 
