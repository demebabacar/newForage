<?php

/**
 * generated by dev
*using Reliese Model
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Compteur
 * 
 * @property int $id
 * @property string $uuid
 * @property string $numero_serie
 * @property int $administrateurs_id
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Administrateur $administrateur
 * @property \Illuminate\Database\Eloquent\Collection $abonnements
 * @property \Illuminate\Database\Eloquent\Collection $consommations
 *
 * @package App
 */
class Compteur extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;use \App\Helpers\UuidForKey;

	protected $casts = [
		'administrateurs_id' => 'int'
	];

	protected $fillable = [
		'uuid',
		'numero_serie',
		'administrateurs_id'
	];

	public function administrateur()
	{
		return $this->belongsTo(\App\Administrateur::class, 'administrateurs_id');
	}

	public function abonnement()
	{
		return $this->hasOne(\App\Abonnement::class, 'compteurs_id');
	}

	public function consommations()
	{
		return $this->hasMany(\App\Consommation::class, 'compteurs_id');
	}

	public function getNewConsommationAttribute(){
		return $this->consommations->where('facture','=',null);
	}

	public function generateFacture(){
		$nouvelles_conso=$this->getNewConsommationAttribute()
		if($nouvelles_conso->count()>0){
			$facture=new \App\Facture;
			// $facture->details="generee auto..";
			$facture->save();
			$valeur=0;
			foreach($nouvelles_conso as $conso){
				$valeur+=$conso->valeur;
			}

			$facture->valeur_totale_consommee=$valeur;
			$facture->montant=$valeur*3;
			$facture->save();
			$facture->consommations()->saveMany($nouvelles_conso);
			return $facture;


		}
		return null;
		
	}
}
