<?php
/**
 * @copyright Federico Nicolás Motta
 * @author Federico Nicolás Motta <fedemotta@gmail.com>
 * @license http://opensource.org/licenses/mit-license.php The MIT License (MIT)
 * @package yii2-widget-datatables
 */
namespace rklandesverband\datatables;
use yii\web\AssetBundle;

/**
 * Asset for the DataTables JQuery plugin
 * @author Federico Nicolás Motta <fedemotta@gmail.com>
 */
class DataTablesAsset extends AssetBundle 
{
    const STYLING_DEFAULT = 'default';
    const STYLING_BOOTSTRAP = 'bootstrap';
    const STYLING_JUI = 'jqueryui';
    public $styling = self::STYLING_DEFAULT;
    public $fontAwesome = false;
    public $sourcePath = '@bower';
    public $depends = [
        'yii\web\JqueryAsset',
    ];
    public function init()
    {
        parent::init();
        if (empty($this->js)) {
            $this->js = ['datatables/media/js/jquery.dataTables' . (YII_ENV_DEV ? '' : '.min') . '.js'];
        }
        switch ($this->styling) {
            case self::STYLING_JUI:
                $this->depends[] = 'yii\jui\JuiAsset';
                $this->css[] = 'datatables-plugins/integration/jqueryui/dataTables.jqueryui.css';
                $this->js[] = 'datatables-plugins/integration/jqueryui/dataTables.jqueryui.min.js';
                break;
            case self::STYLING_BOOTSTRAP:
                $this->depends[] = 'yii\bootstrap\BootstrapAsset';
                $this->css[] = 'datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css';
                $this->js[] = 'datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js';
                break;
            case self::STYLING_DEFAULT:
                $this->css[] = 'datatables/media/css/jquery.dataTables' . (YII_ENV_DEV ? '' : '.min') . '.css';
                break;
            default;
        }
        if ($this->fontAwesome) {
            $this->css[] = 'dataTables.fontAwesome.css';
        }
    }
}