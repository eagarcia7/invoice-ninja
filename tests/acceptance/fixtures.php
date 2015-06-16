<?php
use App\Models\Currency;
use App\Models\PaymentTerm;
use App\Models\Size;
use App\Models\Industry;
use App\Models\Country;
use App\Models\Client;

class fixtures {

	function getRandomClient(){

		return Client::all()->random(1);
	}

	function getData(){


		$data['currencies'] = Currency::orderBy('name')->lists('name', 'id');

		$data['paymentTerms'] = PaymentTerm::orderBy('num_days')->lists( 'name','num_days');

		$data['sizes'] = Size::orderBy('id')->lists( 'name','id');

		$data['industries'] = Industry::orderBy('name')->lists( 'name','id');

		$data['countries'] = Country::orderBy('name')->lists( 'name','id');

		return $data;
	}
}
?>