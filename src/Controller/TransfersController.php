<?php

namespace App\Controller;

class TransfersController extends AppController
{

	public function index(){

		if ( $this->request->is(['patch', 'post', 'put']) ){
			$data = $this->request->data;

			$A_companies = $this->loadModel('Companies')->find('all');

			foreach ($A_companies as $company) {
				$companies[$company->id]=$company;
				$companies[$company->id]->data=0;
			}
			
			$min_date = $this->Transfers->getSearchDate('min',$data);
			$max_date = $this->Transfers->getSearchDate('max',$data);

			$records = $this->Transfers->find('all')
			->where(['date >' => $min_date,'date <' => $max_date])
			->toArray();
			
			foreach ($records as $record) {
				$companies[$record->company_id]->data += $record->amount;
			}

			$month = date("F", mktime(0, 0, 0, $data['Month']['month'], 10));
			$this->set(compact('companies','month'));
		}

	}

	public function generate(){

	    $m_users = $this->loadModel('Users');
	    $users = $m_users->find('all')->toArray();
  		$this->Transfers->deleteAll('1=1');

	    foreach ($users as $user) {
	    	$this->Transfers->makeTransferEntry($user);
	    }
        $this->Flash->success(__('The Data updated!.'));
		$this->redirect('/transfers');


	}

}