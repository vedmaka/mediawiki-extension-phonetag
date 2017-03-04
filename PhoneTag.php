<?php
if ( function_exists( 'wfLoadExtension' ) ) {
	
	wfLoadExtension( 'PhoneTag' );
	// Keep i18n globals so mergeMessageFileList.php doesn't break
	$wgMessagesDirs['PhoneTag'] = __DIR__ . '/i18n';
	wfWarn(
		'Deprecated PHP entry point used for FooBar extension. ' .
		'Please use wfLoadExtension instead, ' .
		'see https://www.mediawiki.org/wiki/Extension_registration for more details.'
	);
	return;
	
} else {
	
	if ( !defined( 'MEDIAWIKI' ) ) {
	    die( 'This file is a MediaWiki extension, it is not a valid entry point' );
    }
    
    $wgExtensionCredits['parserhook'][] = array(
	    'path' => __FILE__,
	    'name' => 'PhoneTag',
	    'version' => '1.0',
	    'url' => 'http://www.mediawiki.org/wiki/Extension:PhoneTag',
	    'author' => array('Jon'),
	    'description' => 'Phone tags support',
	    'descriptionmsg' => 'phonetag-desc',
    );
    
    $wgAutoloadClasses['PhoneTag'] = dirname(__FILE__).'/PhoneTag.class.php';
    $wgAutoloadClasses['PhoneTagHooks'] = dirname(__FILE__).'/PhoneTag.hooks.php';
    $wgExtensionMessagesFiles['PhoneTagMagic'] = dirname(__FILE__) . '/PhoneTag.i18n.magic.php';
    
    $wgHooks['ParserFirstCallInit'][] = 'PhoneTagHooks::onParserFirstCallInit';
    
    $wgResourceModules['ext.phonetag.foo'] = array(
	    'position' => 'top',
	    'scripts' => 'modules/phonetag.js',
	    'styles' => 'modules/phonetag.css',
	    'messages' => array(),
	    'dependencies' => array(),
	    'localBasePath' => __DIR__,
	    'remoteExtPath' => 'PhoneTag',
    );
	
}