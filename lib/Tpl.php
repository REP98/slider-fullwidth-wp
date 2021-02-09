<?php
namespace Bin;

use Windwalker\Edge\Edge;
use Windwalker\Edge\Cache\EdgeFileCache;
use Windwalker\Edge\Loader\EdgeFileLoader;
use Windwalker\Edge\Compiler\EdgeCompiler;


/**
 * TPL 
 * Use Blade Template from load view
 */

class Tpl
{
	public static $instance;
	private $edge, $edgeFL, $edgeFC, $edgeC;

	function __construct()
	{
		$this->edgeFL = new EdgeFileLoader([SPFP_DIR_ASSET_VIEW]);
		$this->edgeFC = new EdgeFileCache(SPFP_DIR_ASSET_VIEWCACHE);
		$this->edgeC = new EdgeCompiler();
		$this->edge = new Edge(
			$this->edgeFL, 
			$this->edgeC,
			$this->edgeFC
		);
		
		$this->loadDirective();

		return $this;
	}

	public function loadDirective(){
		$compiler = $this->edge->getCompiler();
		$compiler->directive('assets',function($exp){
			return "<?php echo SPFP_PLUGIN_URL.'assets/'.$exp; ?>";
		});
	}

	public  function view($layout, $data=[])
	{
		return $this->edge->render($layout, $data);
	}

	public static function get_instance() {
        $caller = get_called_class();
        if ( !isset( self::$instance[$caller] ) ) {
            self::$instance[$caller] = new $caller();
            self::$instance[$caller]->__construct();
        }

        return( self::$instance[$caller] );
    }
}

?>