<?php
use App\Models\Currency;
use App\Models\PaymentTerm;
use App\Models\Size;
use App\Models\Industry;
use App\Models\Country;
use App\Models\Client;
use App\Models\Language;
use App\Models\Timezone;
use App\Models\DateFormat;
use App\Models\DatetimeFormat;
use App\Models\GateWay;

class fixtures {

	function getRandomClient(){

		return Client::all()->random(1);
	}

	function getCurrency(){

		$data = Currency::orderBy('name')->lists('name', 'id')->toArray();

		return $data;
	}

	function getLanguage(){
		
		$data = Language::orderBy('name')->lists('name', 'id')->toArray();

		return $data;
	}

	function getPaymentTerms(){

		$data = PaymentTerm::orderBy('num_days')->lists( 'name','num_days')->toArray();

		return $data;
	}

	function getSizes(){

		$data = Size::orderBy('id')->lists( 'name','id')->toArray();

		return $data;
	}

	function getIndustry(){

		$data = Industry::orderBy('name')->lists( 'name','id')->toArray();

		return $data;
	}

	function getCountries(){

		$data = Country::orderBy('name')->lists( 'name','id')->toArray();

		return $data;
	}

	function getTimezones(){

		$data = Timezone::orderBy('name')->lists( 'name','id')->toArray();

		return $data;
	}

	function getDateFormat(){

		$data = DateFormat::orderBy('label')->lists( 'label','id')->toArray();

		return $data;
	}

	function getDatetimeFormat(){

		$data = DatetimeFormat::orderBy('label')->lists( 'label','id')->toArray();

		return $data;
	}

	function getGateways(){

		$data = GateWay::orderBy('label')->lists( 'name','id')->toArray();

		return $data;
	}
}
?>