<?php namespace Seditio\contactform;

use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    public function registerComponents()
    {
        return[
            'Seditio\contactform\Components\ContactForm' => 'contactform',
        ];
    }

    public function registerSettings()
    {
    }
}
