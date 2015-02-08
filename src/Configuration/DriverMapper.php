<?php namespace Mitch\LaravelDoctrine\Configuration;

use Exception;

class DriverMapper {

    /**
     * @var array
     */
    private $mappers = [];

    /**
     * @param Mapper $mapper
     */
    public function registerMapper(Mapper $mapper)
    {
        $this->mappers[] = $mapper;
    }

    /**
     * @param $configuration
     * @return mixed
     * @throws Exception
     */
    public function map($configuration)
    {
        foreach ($this->mappers as $mapper)
            if ( $mapper->isAppropriateFor($configuration) )
                return $mapper->map($configuration);

        throw new Exception("Driver {$configuration['driver']} unsupported by package at this time.");
    }
}
