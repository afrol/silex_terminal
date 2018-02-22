<?php

namespace App\Config;

use App\Config\ConfigException;
use App\Traits\Singleton;

class Config
{
    use Singleton;

    /**
     * @var array
     */
    private $settings;

    public function create(array $config)
    {
        $this->settings = $config;
        return $this;
    }

    public function getConfig(string $key = null): array
    {
        if (!$this->settings) {
            throw new ConfigException('No config provided');
        }

        if ($key) {
            if (empty($this->settings[$key])) {

            }

            return $this->settings[$key];
        }

        return $this->settings;
    }
}
