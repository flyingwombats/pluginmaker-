<?php

define('_JEXEC', 1);

require_once '../libraries/import.php';

jimport('joomla.application.cli');
jimport('joomla.database.database');
jimport('joomla.database.table');
jimport('joomla.filesystem.file');

class SetupModule extends JCli
{
    public function execute()
    {
//	require_once '../../joomla17beta1/configuration.php';
	//	$config = new JConfig;


        $this->out( 'What is the name of your module?' );
        $name = $this->in( );

        $this->out( 'What version?' );
        $version = $this->in( );

        $date = JFactory::getDate();
        $xmlData = '<?xml version="1.0" encoding="utf-8"?>
<extension
type="module"
version="' . $version . '"
client="site"
method="upgrade">
<name>'.$name.'</name>
<author></author>
<creationDate>'.$date.'</creationDate>
<copyright>Copyright (C) 2008 - 2011 JoomlaDayUK. All rights reserved.</copyright>
<license>GNU General Public License version 2 or later; see LICENSE.txt</license>
<authorEmail> phil@softforge.co.uk</authorEmail>
<authorUrl>www.softforge.co.uk</authorUrl>
<version>1.7.0</version>
<description><![CDATA[
]]></description>
<files>
<filename module="mod_'.$name.'">mod_'.$name.'.php</filename>
<folder>tmpl</folder>
<folder>images</folder>
<filename>helper.php</filename>
<filename>index.html</filename>
<filename>mod_'.$name.'.xml</filename>
</files>
<languages folder="language">
<language tag="en-GB">en-GB.mod_'.$name.'.sys.ini</language>
<language tag="en-GB">en-GB.mod_'.$name.'.ini</language>
</languages>
<config>
<fields name="params">
<fieldset>
<field
type="spacer"
name="myspacer1"
class="text"
label="MODULE_LABEL"
/>
</fieldset>
</fields>
</config>
</extension>';



		JFolder::create('../../joomla17beta1/modules/mod_'.$name);
		JFolder::create('../../joomla17beta1/modules/mod_'.$name.'/mod_'.$name);
		JFolder::create('../../joomla17beta1/modules/mod_'.$name.'/mod_'.$name.'/template');

 		JFile::write('../../joomla17beta1/modules/mod_'.$name.'/mod_'.$name.'/mod_'.$name.'.xml',$xmlData);
 		JFile::write('../../joomla17beta1/modules/mod_'.$name.'/mod_'.$name.'/mod_'.$name.'.php',null);
 		JFile::write('../../joomla17beta1/modules/mod_'.$name.'/mod_'.$name.'/helper.php',null);
 		JFile::write('../../joomla17beta1/modules/mod_'.$name.'/mod_'.$name.'/index.html',null);
 		JFile::write('../../joomla17beta1/modules/mod_'.$name.'/mod_'.$name.'/template/default.php',null);
    }

}

JCli::getInstance('SetupModule')->execute();