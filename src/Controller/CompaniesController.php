<?php

namespace App\Controller;

class CompaniesController extends AppController
{

	public function index(){
		$companies = $this->Companies->find('all')->toArray();
		$this->set(compact('companies'));
		// debug($companies);
		// debug($this->Companies->find('all'));
	}

	public function edit($id = null){

		$exists = $this->Companies->exists(['id' => $id]);

        if ( !$exists ){
            $this->render('no_company');
            return;
        }

        $company = $this->Companies->get($id);

        if ( $this->request->is(['patch', 'post', 'put']) ):

        	$company = $this->Companies->patchEntity($company, $this->request->data);
                if ($this->Companies->save($company)) {
                    $this->Flash->success(__('The Company has been updated.'));
                    return $this->redirect('/');
                } else {
                    $this->Flash->error(__('The user could not be saved. Please, try again.'));
                }

        endif;

        $this->set(compact('company'));


	}

}