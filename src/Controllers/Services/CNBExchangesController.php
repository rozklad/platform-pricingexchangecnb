<?php namespace Sanatorium\Pricingexchangecnb\Controllers\Services;

use Sanatorium\Shoppricing\Models\Currency;
use Sanatorium\Shoppricing\Repositories\Currency\CurrencyRepositoryInterface;
use Sanatorium\Shoppricing\Controllers\Services\ExchangeController;

class CNBExchangesController extends ExchangeController {

	CONST NAME = 'Exchange service - Ceska narodni banka';
	CONST SOURCE = 'https://www.cnb.cz/cs/financni_trhy/devizovy_trh/kurzy_devizoveho_trhu/denni_kurz.txt?date=%s';
	CONST SOURCE_FULL = 'http://www.cnb.cz/cs/financni_trhy/devizovy_trh/kurzy_ostatnich_men/kurzy.txt';

	public static function getUrl()
	{
		return route('admin.sanatorium.pricingexchangecnb.exchange');
	}

	/**
	 * Service specific
	 */

	public static function getSourceData($full = false)
	{
		return self::getSourceDataByDate(date('j.n.Y'), $full);
	}

	public static function getSourceDataByDate($date, $full = false)
	{
		if ( $full == false )
			$source = self::SOURCE;
		else
			$source = self::SOURCE_FULL;

		$raw = file_get_contents( sprintf($source, $date) );
		
		$results = [];

		$lines = explode("\n", $raw);
		foreach( $lines as $i => $line ) {

			if ( $i == 0)	// line 0 contains current date
				continue;

			if ( $i == 1 )
				continue;	// line 1 contains headers

			$parts = explode('|', $line);

			if ( isset($parts[3]) ) {
				$results[strtolower($parts[3])] = [
					'country' => $parts[0],
					'currency' => $parts[1],
					'code' => $parts[3],
					'rate' => str_replace(',', '.', $parts[4]) 
				];
			}
		}

		return $results;
	}

	/**
	 * Admin views
	 */
	
	public function index()
	{
		return view('sanatorium/pricingexchangecnb::index');
	}

}
