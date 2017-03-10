<?php
namespace App\Model\Table;

// use App\Model\Entity\User;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 * @property \Cake\ORM\Association\HasMany $Articles
 */
class TransfersTable extends Table
{

    public function initialize(array $config)
    {
        parent::initialize($config);
        $this->addBehavior('Timestamp');
    }


	public function makeTransferEntry($user){

		$monthly = rand(8,80);
		for ($m=0; $m<6; $m++):							//monthly loop

			for ($i=0; $i < $monthly; $i++) { 				//dayly records
				$data = rand(100,10000000000)/1000000000;
				$year = date("Y", mktime(0, 0, 0, date("m")-$m, 1, date("Y")));
				$month = date("m", mktime(0, 0, 0, date("m")-$m, 1, date("Y")));
				$days = cal_days_in_month(CAL_GREGORIAN, $month, $year);
				$date  = mktime(0, 0, 0, date("m")-$m  , rand(1,$days), date("Y"));	
				$resources = [
				'http://cake.dev/transfers/generate',
				'https://book.cakephp.org/3.0/en/views/helpers/html.html',
				'https://book.cakephp.org/3.0/en/orm/database-basics.html',
				'http://stackoverflow.com/questions/25065005/check-if-record-exists-in-cakephp3',
				'http://stackoverflow.com/questions/22855026/fields-created-and-modified-are-not-set-automatically-in-cakephp3-0-0dev-pr'
				];
				$resource = $resources[rand(0,4)];
		        $transfer = $this->newEntity();
	            $transfer = $this->patchEntity($transfer, 
	            	['id'=>null,'user_id'=>$user->id,'resource'=>$resource,'date'=>$date,'amount'=>$data,'company_id'=>$user->company_id]);
	            if (!$this->save($transfer)) {
	                $this->Flash->error(__('The user could not be saved. Please, try again.'));
	            }
			}

		endfor;
		
	}

	public function getSearchDate($pos,$data){

		if ( $pos=="min" ){
			$min_date_string = $data['year']."-".$data['Month']['month']."-01";
			return date('Y-m-d H:i:s', strtotime($min_date_string));
		}else{
			$max_day = cal_days_in_month(CAL_GREGORIAN, $data['Month']['month'], $data['year']);
			$max_date_string = $data['year']."-".$data['Month']['month']."-".$max_day;
			return date('Y-m-d H:i:s', strtotime($max_date_string));
		}

	}

}

