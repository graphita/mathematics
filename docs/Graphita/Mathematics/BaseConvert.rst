.. rst-class:: phpdoctorst

.. role:: php(code)
	:language: php


BaseConvert
===========


.. php:namespace:: Graphita\Mathematics

.. php:class:: BaseConvert


	:Source:
		`src/BaseConvert.php#5 <https://github.com/graphita/mathematics/blob/master/src/BaseConvert.php#L5>`_
	


Summary
-------

Methods
~~~~~~~

* :php:meth:`public static convert\($sourceNumber, $sourceBase, $sourceCharactersMap\)<Graphita\\Mathematics\\BaseConvert::convert\(\)>`
* :php:meth:`public from\($sourceNumber, $sourceBase, $sourceCharactersMap\)<Graphita\\Mathematics\\BaseConvert::from\(\)>`
* :php:meth:`public fromCharacters\($sourceCharactersMap\)<Graphita\\Mathematics\\BaseConvert::fromCharacters\(\)>`
* :php:meth:`public to\($destinationBase, $destinationCharactersMap\)<Graphita\\Mathematics\\BaseConvert::to\(\)>`
* :php:meth:`public toCharacters\($destinationCharactersMap\)<Graphita\\Mathematics\\BaseConvert::toCharacters\(\)>`
* :php:meth:`public getSourceNumber\(\)<Graphita\\Mathematics\\BaseConvert::getSourceNumber\(\)>`
* :php:meth:`public getSourceBase\(\)<Graphita\\Mathematics\\BaseConvert::getSourceBase\(\)>`
* :php:meth:`public getSourceCharactersMap\(\)<Graphita\\Mathematics\\BaseConvert::getSourceCharactersMap\(\)>`
* :php:meth:`public getDestinationBase\(\)<Graphita\\Mathematics\\BaseConvert::getDestinationBase\(\)>`
* :php:meth:`public getDestinationCharactersMap\(\)<Graphita\\Mathematics\\BaseConvert::getDestinationCharactersMap\(\)>`
* :php:meth:`public getMinDigits\(\)<Graphita\\Mathematics\\BaseConvert::getMinDigits\(\)>`
* :php:meth:`public setMinDigits\($minDigits\)<Graphita\\Mathematics\\BaseConvert::setMinDigits\(\)>`
* :php:meth:`public getResultArray\(\)<Graphita\\Mathematics\\BaseConvert::getResultArray\(\)>`
* :php:meth:`public getResult\(\)<Graphita\\Mathematics\\BaseConvert::getResult\(\)>`
* :php:meth:`public calculate\(\)<Graphita\\Mathematics\\BaseConvert::calculate\(\)>`


Constants
---------

.. php:const:: DEFAULT_BASE = 10

	.. rst-class:: phpdoc-description
	
		| Default Base for Source & Destination Base
		
	
	:Source:
		`src/BaseConvert.php#10 <https://github.com/graphita/mathematics/blob/master/src/BaseConvert.php#L10>`_
	


Methods
-------

.. rst-class:: public static

	.. php:method:: public static convert(int|string $sourceNumber, $sourceBase=self::DEFAULT\_BASE, array|string $sourceCharactersMap=\[\])
	
		:Source:
			`src/BaseConvert.php#54 <https://github.com/graphita/mathematics/blob/master/src/BaseConvert.php#L54>`_
		
		
		:Parameters:
			* **$sourceNumber** (int | string)  
			* **$sourceBase** (int)  
			* **$sourceCharactersMap** (array | string)  

		
		:Returns: :any:`\\Graphita\\Mathematics\\BaseConvert <Graphita\\Mathematics\\BaseConvert>` 
	
	

.. rst-class:: public

	.. php:method:: public from(int|string $sourceNumber, $sourceBase=self::DEFAULT\_BASE, array|string $sourceCharactersMap=\[\])
	
		:Source:
			`src/BaseConvert.php#65 <https://github.com/graphita/mathematics/blob/master/src/BaseConvert.php#L65>`_
		
		
		:Parameters:
			* **$sourceNumber** (int | string)  
			* **$sourceBase** (int)  
			* **$sourceCharactersMap** (array | string)  

		
		:Returns: $this 
	
	

.. rst-class:: public

	.. php:method:: public fromCharacters(array|string $sourceCharactersMap=\[\])
	
		:Source:
			`src/BaseConvert.php#77 <https://github.com/graphita/mathematics/blob/master/src/BaseConvert.php#L77>`_
		
		
		:Parameters:
			* **$sourceCharactersMap** (array | string)  

		
		:Returns: $this 
	
	

.. rst-class:: public

	.. php:method:: public to( $destinationBase, array|string $destinationCharactersMap=\[\])
	
		:Source:
			`src/BaseConvert.php#92 <https://github.com/graphita/mathematics/blob/master/src/BaseConvert.php#L92>`_
		
		
		:Parameters:
			* **$destinationBase** (int)  
			* **$destinationCharactersMap** (array | string)  

		
		:Returns: $this 
	
	

.. rst-class:: public

	.. php:method:: public toCharacters(array|string $destinationCharactersMap=\[\])
	
		:Source:
			`src/BaseConvert.php#103 <https://github.com/graphita/mathematics/blob/master/src/BaseConvert.php#L103>`_
		
		
		:Parameters:
			* **$destinationCharactersMap** (array | string)  

		
		:Returns: $this 
	
	

.. rst-class:: public

	.. php:method:: public getSourceNumber()
	
		:Source:
			`src/BaseConvert.php#116 <https://github.com/graphita/mathematics/blob/master/src/BaseConvert.php#L116>`_
		
		
		:Returns: int | string | null 
	
	

.. rst-class:: public

	.. php:method:: public getSourceBase()
	
		:Source:
			`src/BaseConvert.php#124 <https://github.com/graphita/mathematics/blob/master/src/BaseConvert.php#L124>`_
		
		
		:Returns: int 
	
	

.. rst-class:: public

	.. php:method:: public getSourceCharactersMap()
	
		:Source:
			`src/BaseConvert.php#132 <https://github.com/graphita/mathematics/blob/master/src/BaseConvert.php#L132>`_
		
		
		:Returns: array 
	
	

.. rst-class:: public

	.. php:method:: public getDestinationBase()
	
		:Source:
			`src/BaseConvert.php#140 <https://github.com/graphita/mathematics/blob/master/src/BaseConvert.php#L140>`_
		
		
		:Returns: int 
	
	

.. rst-class:: public

	.. php:method:: public getDestinationCharactersMap()
	
		:Source:
			`src/BaseConvert.php#148 <https://github.com/graphita/mathematics/blob/master/src/BaseConvert.php#L148>`_
		
		
		:Returns: array 
	
	

.. rst-class:: public

	.. php:method:: public getMinDigits()
	
		:Source:
			`src/BaseConvert.php#182 <https://github.com/graphita/mathematics/blob/master/src/BaseConvert.php#L182>`_
		
		
		:Returns: int | null 
	
	

.. rst-class:: public

	.. php:method:: public setMinDigits( $minDigits)
	
		:Source:
			`src/BaseConvert.php#191 <https://github.com/graphita/mathematics/blob/master/src/BaseConvert.php#L191>`_
		
		
		:Parameters:
			* **$minDigits** (int)  

		
		:Returns: :any:`\\Graphita\\Mathematics\\BaseConvert <Graphita\\Mathematics\\BaseConvert>` 
	
	

.. rst-class:: public

	.. php:method:: public getResultArray()
	
		:Source:
			`src/BaseConvert.php#200 <https://github.com/graphita/mathematics/blob/master/src/BaseConvert.php#L200>`_
		
		
		:Returns: array 
	
	

.. rst-class:: public

	.. php:method:: public getResult()
	
		:Source:
			`src/BaseConvert.php#208 <https://github.com/graphita/mathematics/blob/master/src/BaseConvert.php#L208>`_
		
		
		:Returns: int | string | null 
	
	

.. rst-class:: public

	.. php:method:: public calculate()
	
		:Source:
			`src/BaseConvert.php#218 <https://github.com/graphita/mathematics/blob/master/src/BaseConvert.php#L218>`_
		
		
		:Returns: $this 
	
	

