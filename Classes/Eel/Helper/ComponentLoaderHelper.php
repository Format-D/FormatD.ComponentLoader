<?php

namespace FormatD\ComponentLoader\Eel\Helper;

use Neos\Eel\ProtectedContextAwareInterface;

/**
 * Helper with utilities
 */
class ComponentLoaderHelper implements ProtectedContextAwareInterface
{

	/**
	 * @throws \ReflectionException
	 */
	public function getFusionObjectName(mixed $prototypeName): ?string
	{
		if (!is_string($prototypeName)) {
			return null;
		}

		$reflection = new \ReflectionClass($prototypeName);
		$property = $reflection->getProperty('fusionObjectName');
		$property->setAccessible(true);
		return $property->getValue($reflection);
	}

	public function replaceMethodMarker(string $value, string $markerName, string $rawMethod, $markerIndicator = '###'): string
	{
		$search = '"' . $markerIndicator . $markerName . $markerIndicator . '"';

		return str_replace($search, $rawMethod, $value);
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