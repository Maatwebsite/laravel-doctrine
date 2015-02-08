<?php  namespace Mitch\LaravelDoctrine\Console;

use Doctrine\Common\Util\Debug;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;

class DqlCommand extends Command {

    protected $name = 'doctrine:dql';
    protected $description = 'Run a DQL query.';

    /**
     * @param EntityManagerInterface $entityManager
     */
    public function fire(EntityManagerInterface $entityManager) {
    }

    /**
     * @return array
     */
    protected function getArguments()
    {
        return [
            ['dql', null, InputArgument::REQUIRED, 'DQL query.']
        ];
    }

    /**
     * @return array
     */
    protected function getOptions()
    {
        return [
            ['hydrate', null, InputOption::VALUE_OPTIONAL, 'Hydrate type. Available: object, array, scalar, single_scalar, simpleobject']
        ];
    }
} 
