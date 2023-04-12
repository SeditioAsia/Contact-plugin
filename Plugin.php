<?php namespace Seditio\Contact;

use System\Classes\PluginBase;

class ContactPlugin extends PluginBase
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
