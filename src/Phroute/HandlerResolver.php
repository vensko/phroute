<?php namespace Phroute\Phroute;

class HandlerResolver implements HandlerResolverInterface
{
	/**
	 * Create an instance of the given handler.
	 *
	 * @param $handler
	 * @param $handler
	 * @return array
	 */
	public function execute($handler, array $vars = [])
	{
		if (is_array($handler) && is_string($handler[0])) {
			$handler[0] = new $handler[0];
		}

		return call_user_func_array($handler, $vars);
	}
}
