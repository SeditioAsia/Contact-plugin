<?php namespace Seditio\MyContact;

use System\Classes\PluginBase;

class MyContactPlugin  extends PluginBase
{
    public function registerComponents()
    {
        return[
            'Seditio\MyContact\Components\ContactForm' => 'contactform',
        ];
    }

    public function registerSettings()
    {
    }
}
