<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use App\Subject;
use App\SubjectItem;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
	
	protected function getCode($n)
	{
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$randomString = '';

		for ($i = 0; $i < $n; $i++) {
			$index = rand(0, strlen($characters) - 1);
			$randomString .= $characters[$index];
		}

		return md5($randomString);
	}
	protected function getAllSubjectByLicense($su_it_arr,$os){
		$subjectModel= new Subject();
		$subjectItemModel = new SubjectItem();
		$listSubject = $subjectModel->GetAllSubject();
		$listSubjectItem = $subjectItemModel->getSubjectByIDArray($su_it_arr,$os);
		$dic=array();
		for($i = 0 ; $i < count($listSubjectItem); $i++){
			$itemSubjecItem=$listSubjectItem[$i];
			if(!array_key_exists("---".$itemSubjecItem->su_id,$dic)){
				$dic["---".$itemSubjecItem->su_id]=array();
			}
			array_push($dic["---".$itemSubjecItem->su_id],$itemSubjecItem);
		}
		for($i = 0 ; $i < count($listSubject); $i++){
			$itemSubject=$listSubject[$i];
			$itemSubject->subject_item=array();
			if(array_key_exists("---".$itemSubject->su_id,$dic)){
				$itemSubject->subject_item=$dic["---".$itemSubject->su_id];
			}
		}
		return $listSubject;
	}
}
