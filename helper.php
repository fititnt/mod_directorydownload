<?php
/*
 * @package         mod_directorydownload
 * @author          Emerson Rocha Luiz ( emerson@webdesign.eng.br - http://fititnt.org )
 * @copyright       Copyright (C) 2005 - 2011 Webdesign Assessoria em Tecnologia da Informacao.
 * @license         GNU General Public License version 3. See license.txt
 */
// no direct access
defined('_JEXEC') or die;

class DirectoryDownload{
    
   /*
    *
    */
    
    function __construct()
    {
        //
    }
    
    /*
     * 
     */
    public function getFiles( $path )
    {
        $folderPath = $this->_getPath($path, JPATH_ROOT );
        
        if ( !$folderPath )
        {
            return FALSE;
        }
        $files = array();
        $dirs = opendir( $folderPath );
        while ( ( $filePointer = readdir( $dirs )) !== FALSE )
        {
            if( $filePointer != '.' && $filePointer != '..' )
            {
                $path = $folderPath .'/'.$filePointer;
                if( is_readable( $path ) )//Be sure if file or path is readable before try parse it
                {
                    if(is_file($path))
                    {
                        $name = end(explode('/',$path));
                        $ext = substr( strrchr( $name ,'.' ),1 );
                        $file = new stdClass;
                        
                        $file->path = $path;
                        $file->ext = $ext;
                        $file->name = $name;
                        $file->edited = date ("Y:m:d H:i:s", filemtime($path));
                        $file->size = filesize($path);

                        $files[] = $file;
                    }
                }
            }
        }//while
        closedir($dirs);
        
        return $files;
        
    }
    
    /*
     * 
     */
    public function getHeader( &$params, $field){
        
        if( $params->get('jtextheading', 0) != 1 ) {
            return $field;
        }
        $field = JTEXT::_(strtoupper( $params->get('jtextheadingtext', 'MOD_SIMPLETABLE_') . $field  ) );
        return $field;
    }
    
    /*
     * 
     */
    public function addLink( &$params, $row, $key, $item)
    {        
        $linkitens = $params->get('linkitens');
        if( $linkitens != '' ){
            $index = array();
            $index = explode(',', $linkitens );
        }
                
        $linkprefix = $params->get('linkprefix', 'index.php?option=com_content&amp;view=article&amp;id=');
        $linkvar = $params->get('linkvar', 'id');
        $linktarget = $params->get('linktarget', '');
        if($linktarget != ''){
            $linktarget = 'target="'.$linktarget.'" ';
        }
        switch ($params->get('linktranslate', 0)) {
            case 2:
                $linkfinal = JURI::base(true) . JRoute::_( $linkprefix . $row->$linkvar) ;
                break;
            case 1:
                $linkfinal = JRoute::_( $linkprefix . $row->$linkvar) ;
                break;
            default:
                $linkfinal = $linkprefix . $row->$linkvar;
                break;
        }
        //@todo: solve one really strange bug that makes the framework change the URL of this one when sef is enabled
        if( $linkitens == '' || in_array($key, $index )){           
            $link = '<a '.$linktarget.'href="'. $linkfinal . '">'.$item.'</a>';
            return $link ;
        }
        return $item;
        
        //return '#';
        
    }
    
    /*
     * Parse $path and try indentify if is absolute. If is not, create it
     */
    private function _getPath ($path , $root = NULL )
     {
        if ( !$path )
        {
            return FALSE;
        }
        
        return $path;
        
     }
   
}
