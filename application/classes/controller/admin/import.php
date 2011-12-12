<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Admin_Import extends Controller_Admin_SuperController {

	public function sort_company($a, $b)
	{
		if (ord($a[20][0]) == ord($b[20][0])) {
			return 0;
		}
		return (ord($a[20][0]) < ord($b[20][0])) ? -1 : 1;
	}
	public function action_index()
	{
		$this->content = View::factory('/admin/import/uploadform');
	}
	public function action_stage2(){
		$import = utf8_encode(file_get_contents($_FILES['file']['tmp_name'])); //Import into utf-8
		$import = str_replace(chr(0), '', $import); // Get rid of all the useless NULLS that exist EVERYWHERE in these exports
		$filename = 'upload/import/'.date('Ymd_His').'.csv';
		file_put_contents($filename, $import);
		$lines = explode("\"\n", trim($import));

		array_shift($lines); //remove empty line
		array_shift($lines); //remove empty line
		$index = explode(chr(9), array_shift($lines)); //get the index

		$this->content = View::factory('/admin/import/stage2');
		$this->content->index = $index;
		$this->content->filename = $filename;
	}
	public function action_stage3(){
		$filename = $_POST['filename'];
		$import = file_get_contents($filename);
		$lines = explode("\"\n", trim($import));
		array_shift($lines); //remove empty line
		array_shift($lines); //remove empty line
		$index = explode(chr(9), array_shift($lines)); //get the index

		$branches = array();
		foreach($_POST['isBranch'] as $branch){
			$branches[] = $branch;
		}

		$programs = array();
		foreach($_POST['isProgram'] as $program){
			$programs[] = $program;
		}

		$offers = array();
		foreach($_POST['offers'] as $offer){
			$offers[] = $offer;
		}
		$ignores = array();
		if(!empty($_POST['ignore']))
			foreach($_POST['ignore'] as $ignore){
				$ignores[] = $ignore;
			}
		$this->content = View::factory('/admin/import/stage3');
		$this->content->filename = $filename;
		$this->content->programs = $programs;
		$this->content->index = $index;
		$this->content->carryOn = serialize(
		array(
										'branches' => $branches,
										'programs' => $programs, 
										'offers'   => $offers,
										'ignore'   => $ignores
		));
	}
	
	
	
	public function action_stage4(){
		$carryOn = unserialize($_POST['carryOn']);
		$ignore = array_merge($carryOn['branches'], $carryOn['programs'], $carryOn['offers'], $carryOn['ignore']);
		$filename = $_POST['filename'];
		$carryOn['programTranslation'] = $_POST['program'];
		
		$filename = $_POST['filename'];
		$import = file_get_contents($filename);
		$lines = explode("\"\n", trim($import));
		array_shift($lines); //remove empty line
		array_shift($lines); //remove empty line
		$index = explode(chr(9), array_shift($lines)); //get the index
		
		$this->content = View::factory('/admin/import/stage4');
		$this->content->index = $index;
		$this->content->ignore = $ignore;
		$this->content->filename = $filename;
		$this->content->carryOn = serialize($carryOn);
	}
	
	
	public function action_stage5(){
		$filename = $_POST['filename'];
		$carryOn = unserialize($_POST['carryOn']);
		$import = file_get_contents($filename);
		$lines = explode("\"\n", trim($import));
		array_shift($lines); //remove empty line
		array_shift($lines); //remove empty line
		$index = explode(chr(9), array_shift($lines)); //get the index
		foreach($lines as &$line){
			$line = explode('"'.chr(9).'"', $line);
		}
		
		$carryOn['keys'] = $_POST['key'];
		
		usort($lines, array($this, 'sort_company'));
		$this->content = View::factory('/admin/import/stage5');
		$this->content->lines = $lines;
		$this->content->filename = $filename;
		$this->content->carryOn = serialize($carryOn);
	}
	
	public function action_stage6(){
		$filename = $_POST['filename'];
		$carryOn = unserialize($_POST['carryOn']);
		
		$filename = $_POST['filename'];
		$carryOn = unserialize($_POST['carryOn']);
		$import = file_get_contents($filename);
		$lines = explode("\"\n", trim($import));
		array_shift($lines); //remove empty line
		array_shift($lines); //remove empty line
		$index = explode(chr(9), array_shift($lines)); //get the index
		
		$carryOn['import'] = $_POST['import'];
		$this->content = View::factory('/admin/import/stage6');
		$this->content->filename = $filename;
		$this->content->index = $index;
		$this->content->carryOn = serialize($carryOn);
	}
	
	
	public function action_stage7(){
		$filename = $_POST['filename'];
		$carryOn = unserialize($_POST['carryOn']);
		$import = file_get_contents($filename);
		$lines = explode("\"\n", trim($import));
		array_shift($lines); //remove empty line
		array_shift($lines); //remove empty line
		$index = explode(chr(9), array_shift($lines)); //get the index
		foreach($lines as &$line){
			$line = explode('"'.chr(9).'"', $line);
		}
		$translationTable = array(
			81 => 'El', 
			82 => 'Vatten',
			83 => 'Energi och Kraft',
			84 => 'Miljö',
			85 => 'Bank',
			86 => 'Finans',
			87 => 'Investering',
			88 => 'Försäkring',
			89 => 'Bemanning och arbetsförmedling',
			90 => 'Bygg',
			91 => 'Grafisk Design',
			92 => 'Industri- och Produktdesign',
			93 => 'Arkitektverksamhet',
			94 => 'Data och IT',
			95 => 'Webbutveckling',
			96 => 'Telekommunikation',
			97 => 'Ekonomi och konsultverksamhet',
			98 => 'Management',
			99 => 'Media',
			100 => 'Teknisk Konsultverksamhet',
			101 => 'Industri',
			102 => 'Tillverkningsindustri',
			103 => 'Kärnkraft',
			104 => 'Medicinteknik',
			105 => 'Forskning',
			106 => 'Fastigheter och Infrastruktur',
			107 => 'Flyg- och Rymdindustri',
			108 => 'Intresseorganisation',
			109 => 'Fackförbund',
			110 => 'Exjobb',
			111 => 'Traineeplatser',
			112 => 'Praktikplatser',
			113 => 'Sommarjobb',
			114 => 'Utlandsmöjligheter',
			115 => 'Uppsatshandledning',
			116 => 'Industridoktorandplatser',
			117 => 'Lönestatistik',
			118 => 'Medlemsskap',
			119 => 'CV-Granskning'		
		);
		extract($carryOn);
		$programArgLarv = array();
		$companyModel = Model::factory('company');
		$offerArgLarv = array();
		$branchArgLarv = array();
		$fieldLarv = array();
		$ignoreAll = array_merge($ignore, $programs, $branches, $offers);
		
		foreach($programTranslation as $key => $value){
			$programArgLarv[$programs[$key]] = $value;
		}
		foreach($offers as $o){ 
			$offerArgLarv[$o] = $companyModel->create_offer($translationTable[$o]); 	
		}
		foreach($branches as $b){
			$branchArgLarv[$b] = $companyModel->create_branch($translationTable[$b]);
		}
		foreach($index as $key => $field){
			if(array_search($key, $ignoreAll) === FALSE)
				$fieldLarv[$key] = $companyModel->create_field($field);
		} 
		
		usort($lines, array($this, 'sort_company'));
		
		
		foreach($import as $i){
			$companyBranches = array();
			$companyPrograms = array();
			$companyOffers = array();
			$companyData = array();
			foreach($offers as $o)
				if(!empty($lines[$i][$o]))
					$companyOffers[] = $offerArgLarv[$o];
					
			foreach($branches as $b)
				if(!empty($lines[$i][$b]))
					$companyBranches[] = $branchArgLarv[$b];
					
			foreach($programs as $p)
				if(!empty($lines[$i][$p])){
					$companyPrograms[] = $programArgLarv[$p];
				}
			
			foreach($lines[$i] as $key => $data){
				if(array_search($key, $ignoreAll) === FALSE)
					$companyData[$keys[$key]] = $data;
			}
			$companyId = $companyModel->create_company($lines[$i][20]);
			if(!empty($companyPrograms))
				$companyModel->set_programs($companyId, array_unique($companyPrograms));
			if(!empty($companyOffers))
				$companyModel->set_offers($companyId, $companyOffers);
			if(!empty($companyBranches))
				$companyModel->set_branches($companyId, $companyBranches);
				
			$companyModel->set_data($companyId, $companyData);
			
		}
		
		
		
		$this->content = View::factory('/admin/import/stage7');
	}
} // End Welcome
