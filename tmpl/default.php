<?php
/*
 * @package         mod_directorydownload
 * @author          Emerson Rocha Luiz ( emerson@webdesign.eng.br - http://fititnt.org )
 * @copyright       Copyright (C) 2005 - 2011 Webdesign Assessoria em Tecnologia da Informacao.
 * @license         GNU General Public License version 3. See license.txt
 */
// no direct access
defined('_JEXEC') or die;
?>

<div class="horaexata<?php echo $moduleclass_sfx; ?>">
<?php 
echo $modbefore;
echo '<pre>';
echo print_r($dd); 
echo '</pre>';

echo $modafter; 
?>
</div>
<table>
    <thead>
        <tr>
        <?php $ncols = 0;
        foreach($dd[0] AS $key => $item){
                echo '<th>'. $DirectoryDownload->getHeader( &$params ,$key ) .'</th>';
                $ncols++;
        }
        ?> 
        </tr>
</thead>
    <tbody>
        <?php $i=0; $rowprefix='';
        foreach($dd AS $row){
            if($tablerowprefix != ''){
                $k = $i++ % 2;
                $rowprefix = ' class="'. $tablerowprefix . $k .'"';
            }
            echo '<tr'.$rowprefix.'>';
                    foreach($row AS $key => $item){                        
                        echo '<td>'.$DirectoryDownload->addLink(&$params , $row, $key, $item).'</td>';
                    }
            echo '</tr>';
        }
        ?>        
    </tbody>
    <tfoot>
        <tr><td colspan="<?php echo $ncols; ?>"><?php //echo $nitems; ?></td></tr></tfoot>
</table>