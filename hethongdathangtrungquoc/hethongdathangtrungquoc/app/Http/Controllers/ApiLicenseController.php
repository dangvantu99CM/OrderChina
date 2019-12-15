<?php

namespace App\Http\Controllers;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use DB;
use App\Subject;
use App\LicenseActive;
use App\License;
use App\SubjectItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon; 
use Response;
use SimpleXMLElement;
class ApiLicenseController extends Controller
{
	public function __construct()
	{	
	}

	public function downloadDB($deviceID,$subId,$fileType)
	{
		$licenseActiveModel= new LicenseActive();
		if($licenseActiveModel->checkDeviceIdExistActive($deviceID)){
			$subject = Subject::find($subId);
			$fileName= $subject->su_id."";
			$filePath= "";
			if($fileType=="xml"){
				$fileName= $subject->su_id.".xml";
				$filePath= public_path($subject->su_path_db);
				$headers = array(
				  'Content-Type: application/xml',
				  'Cache-Control:public',
				  'Content-Description:File Transfer',
				  'Content-Transfer-Encoding:binary',
				);
			}else if($fileType=="dat"){
				$fileName= $subject->su_id.".dat";
				$filePath= public_path($subject->su_path_db_data);
				$headers = array(
				  'Content-Type: application/octet-stream',
				  'Cache-Control:public',
				  'Content-Description:File Transfer',
				  'Content-Transfer-Encoding:binary',
				);
			}
			if(file_exists($filePath) && (!is_dir($filePath))){
				return Response::download($filePath, $fileName, $headers);
			}
			
		}
		return null;
	}
	public function downloadAssets($deviceID,$os,$fileType,$subItemId)
	{
		$licenseActiveModel= new LicenseActive();
		$licenseActiveDevice=$licenseActiveModel->findByDeviceId($deviceID);
		if($licenseActiveDevice!=null && $licenseActiveDevice->li_ac_active==1)
		{
			$subjectItem=SubjectItem::find($subItemId);
			if($subjectItem==null){
				echo "error subjectItem==null";
				return null;
			}
			$headers = array('Content-Type: audio/mpeg');
			$fileName=$subjectItem->su_it_key;
			$filePath="";
			if($fileType==="sound"){
				$fileName=$fileName.".mp3";
				$filePath= public_path($subjectItem->su_it_sound);
			}else if($fileType==="soundN"){
				$fileName=$fileName.".mp3";
				$filePath= public_path($subjectItem->su_it_sound_name);
			}else if($fileType==="model"){
				$fileName=$fileName.".unity3d";
				$headers = array( 'Content-Type: application/octet-stream');
				if($os==="android"){
					$filePath= public_path($subjectItem->su_it_path_3d_android);
				}else if($os==="ios") {
					$filePath= public_path($subjectItem->su_it_path_3d_ios);
				}else{
					echo "error Model NotValid";
					return null;
				}
				
			}else{
				echo "error FileType NotValid";
				return null;
			}
			if(file_exists($filePath) && (!is_dir($filePath))){
				
				return Response::download($filePath, $fileName, $headers);
			}else{
				echo "File not exit";
			}
			
		}
		echo "not found devices";
		return null;
	}
	public function actived($li_ac_desc,$deviceID,$licenseKey,$os)
	{
		$licenseModel= new License();
		$licence = $licenseModel->findLicenseByKey($licenseKey);
		if($licence!=null && $licence->li_active==1){
			
			if($licence->li_limit - $licence->li_nr_active>0){
				$licenseActiveModel= new LicenseActive();
				$deviceActive=$licenseActiveModel->findByDeviceId($deviceID);
				if($deviceActive==null){
					$deviceActive=$licenseActiveModel->addDevice($licence->li_id,$deviceID,$licenseKey,$li_ac_desc);
					$licence->li_nr_active=$licence->li_nr_active+1;
				}
				$licenseModel->updateNrActive($licence->li_id,$licence->li_nr_active);
				
				$su_it_arr = json_decode($licence->su_it_arr);
				$listSubject=$this->getAllSubjectByLicense($su_it_arr,$os);
				return $this->_($listSubject);
			}
		}
		return $this->_(null,"Mã Kích Hoạt không đúng. Vui lòng kiểm tra lại");	
	}
	public function deactived($deviceID,$licenseKey){
		$licenseActiveModel= new LicenseActive();
		$licenseActiveDevice=$licenseActiveModel->findByDeviceId($deviceID);
		if($licenseActiveDevice!=null){
			$licenseModel= new License();
			$license=$licenseModel->findLicenseByKey($licenseKey);
			if($license!=null && $license->li_id==$licenseActiveDevice->li_id){
				
				$licenseActiveModel->updateActiveDevice($deviceID,0);
				$license->li_nr_active=$license->li_nr_active-1;
				$licenseModel->updateNrActive($license->li_id,$license->li_nr_active);
			}
		}
		return $this->_(null,"Hủy kích hoạt thành công");	
	}
	public function getAll($deviceID,$os){
		
		$licenseActiveModel= new LicenseActive();
		$licenseActiveDevice=$licenseActiveModel->findByDeviceId($deviceID);
		if($licenseActiveDevice!=null && $licenseActiveDevice->li_id!=null){
			
			$licenseModel= new License();
			$license=$licenseModel->getLicenseByID($licenseActiveDevice->li_id);
			if($license!=null){
				$su_it_arr = json_decode($license->su_it_arr);
				$listSubject=$this->getAllSubjectByLicense($su_it_arr,$os);
				return $this->_($listSubject);	
			}
		}
		return $this->_(null,"Không tìm thấy thiết bị");	
		
	}
	private function _($data,$mes=""){
		return array("data"=>$data,"error"=>($data==null),"mes"=>$mes);
	}
	
}
