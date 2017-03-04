<?php

class PhoneTag {
    
    public static function render( $parser, $phone = null )
    {
        
        $phone = preg_replace( '/[^0-9\(\)\-\+\s]+/', '', $phone );
        
        if( !$phone ) {
            return '';
        }
        
        $parser->getOutput()->addModules('ext.phonetag.foo');
        
        $html = '<a href="tel:'.$phone.'" class="phone-tag-link">';
        $html .= $phone;
        $html .= '</a>';
        return array(
            $parser->insertStripItem($html),
            'markerType' => 'nowiki'
        );
    }
    
}