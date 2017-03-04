<?php

class PhoneTagHooks {

    /**
     * @param Parser $parser
     */
    public static function onParserFirstCallInit( $parser )
    {
        $parser->setFunctionHook('phone', 'PhoneTag::render');
    }
    
}