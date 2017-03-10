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
class CompaniesTable extends Table
{

	public function getListCompanies(){
		$all =  $this->find()->all();
		foreach ($all as $comp) {
			$companies[$comp->id]=$comp->name;
		}
		return $companies;
	}

}
