<?php
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Account;

class UserTableSeeder extends Seeder
{

	public function run()
	{

		//DB::table('users')->delete();
		$account_id = 1;
		
		$account = Account::get()->first();

		 if (! $account ) {

	 		    $account = Account::create(array(
		            'id' => '',
		            'invoice_taxes' => 1,
		            'invoice_item_taxes' => 0,
		            'invoice_design_id' => 1,
		            'language_id' => 1,
		            'invoice_number_counter' => 1,
		            'share_counter' => 1,
		            'token_billing_type_id' => 2,
		            'font_size' => 9
				));
				
				$account_id = $account['id'];
		 } else {
		 	$account_id = $account['id'];
		 }

		 $cachedTables = [
            'currencies' => 'App\Models\Currency',
            'sizes' => 'App\Models\Size',
            'industries' => 'App\Models\Industry',
            'timezones' => 'App\Models\Timezone',
            'dateFormats' => 'App\Models\DateFormat',
            'datetimeFormats' => 'App\Models\DatetimeFormat',
            'languages' => 'App\Models\Language',
            'paymentTerms' => 'App\Models\PaymentTerm',
            'paymentTypes' => 'App\Models\PaymentType',
            'countries' => 'App\Models\Country',
        ];
        
        foreach ($cachedTables as $name => $class) {
            if (!Cache::has($name)) {
                if ($name == 'paymentTerms') {
                    $orderBy = 'num_days';
                } elseif (in_array($name, ['currencies', 'sizes', 'industries', 'languages', 'countries'])) {
                    $orderBy = 'name';
                } else {
                    $orderBy = 'id';
                }
                Cache::forever($name, $class::orderBy($orderBy)->get());
            }
        }

        $email = 'webmaster@email.com';
        $password = '2Werty4';

         $user = User::where('email', $email)->get()->first();

        if (!$user) {

            $user = User::create(array(
            'id' => '',
            'email' => $email,
            'username' => rand(0,16545154545845),
            'account_id' => $account_id,
            'password' => Hash::make($password),
            'created_at' => date('Y-m-d'),
            'updated_at' => date('Y-m-d')
            ));
          
        } 

        

	}

}