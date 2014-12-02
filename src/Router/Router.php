<?php 

namespace Router;
/**
* 
*/
class Router implements \Countable
{
	private $routes =[];

	function __construct()
	{

	}
	public function addRoute(array $routes){
		foreach ($routes as $nameroute => $info) {
			if (isset($this->routes[$nameroute])) {
					throw new \RuntimeException(sprintf('Cannot override route "%s"',$nameroute));
					
			}
			$this->routes[$nameroute]=$info;
		}
		
	}
	public function getRoute($urL){
		$routing=[];
		foreach ($this->route as $route) {
			if(preg_match('/^'.$route['pattern'].'$/', $url, $matches)){

				list($controller, $action) = explode(':',$route['connect']);

				$routing=[
					'controller' => $controller,
					'action' => $action,
					'params' => $this->getParams($route, $matches)
				];
			}	
		}	

	}
	public function count(){

		return count($this->routes);
	}
	 /**
	*
	* @param array $params
	* @param array $matches
	* @return array
	*/
	public function getParams(array $route, array $matches){

		if (empty($route['params'])) {
			return;
		}
		foreach (explode(',', $route['params']) as $p) {
			$p=trim($p);
			$value[$p] = $matches[$p];
		}
		return $values;
	}
}