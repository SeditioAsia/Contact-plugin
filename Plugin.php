<?php namespace Seditio\MyContact;

use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    public function registerComponents()
    {
        return[
            'Seditio\Contact\Components\ContactForm' => 'contactform',
        ];
    }

    public function registerSettings()
    {
    }
}
