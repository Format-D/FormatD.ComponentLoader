<?php

namespace FormatD\ComponentLoader\Eel\Helper;

use Neos\Eel\ProtectedContextAwareInterface;
use Neos\Flow\Core\Bootstrap;
use Neos\Flow\Annotations as Flow;

/**
 * Helper with utilities
 */
class ComponentLoaderHelper implements ProtectedContextAwareInterface
{

	/**
	 * @Flow\Inject
	 * @var Bootstrap
	 */
	protected $bootstrap;

	/**
	 * @throws \ReflectionException
	 */
	public function getFusionObjectName(mixed $fusionObject): string
	{ 
		$reflection = new \ReflectionClass($fusionObject);
		$property = $reflection->getProperty('fusionObjectName');
		$property->setAccessible(true);
		return $property->getValue($fusionObject);
	}

	public function replaceMethodMarker(string $value, string $markerName, string $rawMethod, $markerIndicator = '###'): string
	{
		$search = '"' . $markerIndicator . $markerName . $markerIndicator . '"';

		return str_replace($search, $rawMethod, $value);
	}

	public function isProduction(): bool {
		return $this->bootstrap->getContext()->isProduction();
	}

	public function isDevelopment(): bool {
		return $this->bootstrap->getContext()->isDevelopment();
	}

	/**
	 * All methods are considered safe
	 *
	 * @param string $methodName
	 * @return boolean
	 */
	public function allowsCallOfMethod($methodName)
	{
		return true;
	}
}