<?php

declare(strict_types=1);

namespace DanHariton\DataBoxes\DependencyInjection;

use Exception;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

class DataBoxesExtension extends Extension
{
    /**
     * @throws Exception
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configDir = new FileLocator(__DIR__ . '/../Resources/config');

        $loader = new YamlFileLoader($container, $configDir);
        $loader->load('services.yaml');

        $schema = new Configuration();
        $this->processConfiguration($schema, $configs);
    }
}