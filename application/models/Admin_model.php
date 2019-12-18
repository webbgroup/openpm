<?php if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}
/*

    Copyright (C) 2019 Joel Webb

    This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU Affero General Public License as
    published by the Free Software Foundation, either version 3 of the
    License, or (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU Affero General Public License for more details.

    You should have received a copy of the GNU Affero General Public License
    along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/

class admin_model extends CI_Model {
	public function __construct() {
		parent::__construct();
		$this->load->database('database_properties', TRUE);
		$this->load->database('database_files', TRUE);

	}

	public function adminLogin($username, $password) {
		$this->db->where('username', $username);
		$this->db->where('password', md5($password));
		$query = $this->db->get("users");
		if ($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
				$newdata = array(
					'id' => $row->id,
					'username' => $row->username,
					'email' => $row->email,
					'number' => $row->number,
					'fullname' => $row->fullname,
					'logged_in' => true,
				);
			}
			$this->session->set_userdata($newdata);
			return true;
		}
		return false;
	}
	public function addResProperty($form_data, $forsale_val, $img_ext, $rnd_id) {
		$this->legacy_db = $this->load->database('database_properties', true);
		if ($forsale_val == 1) {
			$insert_data = array(
				'title' => $form_data['title'],
				'uniqueId' => $form_data['uniqid'],
				'address' => $form_data['street1'],
				'address2' => $form_data['street2'],
				'localityId' => '',
				'city' => $form_data['city'],
				'provinceId' => '',
				'state' => $form_data['state'],
				'postalcodeId' => '',
				'zip' => $form_data['zip'],
				'loc_match' => '',
				'longitude' => $form_data['longitude'],
				'latitude' => $form_data['latitude'],
				'price' => $form_data['price'],
				'description' => $form_data['description'],
				'typeId' => $form_data['typeId'], //$form_data['typeId'],
				'datePosted' => date("Y-m-d"),
				'neighborhood' => $form_data['neighborhood'],
				'waterfront' => $form_data['waterfront'],
				'yearbuilt' => $form_data['yearBuilt'],
				'lotsize' => $form_data['lotSize'],
				'garagesize' => $form_data['garageSize'],
				'tax' => $form_data['tax'],
				'avail' => $form_data['available'],
				'elemSchool' => $form_data['elemSchool'],
				'midSchool' => $form_data['midSchool'],
				'midSchool' => $form_data['midSchool'],
				'highSchool' => $form_data['highSchool'],
				'pool' => $form_data['pool'],
				'assocFee' => $form_data['associationFee'],
				'uId' => $this->session->userdata('id'),
				'uSite' => '',
				'useAcreage' => $form_data['useAcreage'],
				'financingDetails' => $form_data['financingDetails'],
				'forSale' => $form_data['forSale'],
				'commPool' => $form_data['commPool'],
				'fmv' => $form_data['fmv'],
				'mls' => $form_data['mls'],
				'parkingSpaces' => $form_data['parkingSpaces'],
				'lawnSprinklers' => $form_data['lawnSprinklers'],
				'zoning' => $form_data['zoning'],
				'available' => $form_data['available'],
				'contactPhone' => $this->session->userdata('number'),
				'contactEmail' => $this->session->userdata('email'),
				'contactName' => $this->session->userdata('fullname'),

			);
			$ins_res = $this->legacy_db->insert('residential', $insert_data);
		} else if ($forsale_val == 2) {

			$insert_data = array(
				'title' => $form_data['title_rent'],
				'uniqueId' => $form_data['uniqid'],
				'address' => $form_data['street1_rent'],
				'address2' => $form_data['street2_rent'],
				'localityId' => '',
				'city' => $form_data['city_rent'],
				'provinceId' => '',
				'state' => $form_data['state_rent'],
				'postalcodeId' => '',
				'zip' => $form_data['zip_rent'],
				'loc_match' => '',
				'longitude' => $form_data['longitude'],
				'latitude' => $form_data['latitude'],
				//'price'=>$form_data['price'],
				'description' => $form_data['description_rent'],
				'typeId' => $form_data['typeId'], //$form_data['typeId'],
				'datePosted' => date("Y-m-d"),
				'neighborhood' => $form_data['neighborhood_rent'],
				'waterfront' => $form_data['waterfront_rent'],
				'yearbuilt' => $form_data['yearBuilt_rent'],
				'lotsize' => $form_data['lotSize_rent'],
				'garagesize' => $form_data['garageSize_rent'],
				'tpgas' => $form_data['tpGas_rent'],
				'tpelectricity' => $form_data['tpElectricity_rent'],
				'tpwater' => $form_data['tpWater_rent'],
				'tpcable' => $form_data['tpCable_rent'],
				'tptrash' => $form_data['tpTrash_rent'],
				'leaseOp' => $form_data['leaseOp_rent'],
				'sec8' => $form_data['section8_rent'],
				'secdep' => $form_data['deposit_rent'],
				'avail' => $form_data['available_rent'],
				'pets' => $form_data['pets_rent'],
				'petPolicy' => $form_data['petPolicy_rent'],
				'appFee' => $form_data['appFee_rent'],
				'elemSchool' => $form_data['elemSchool_rent'],
				'midSchool' => $form_data['midSchool_rent'],
				'highSchool' => $form_data['highSchool_rent'],
				'fitness' => $form_data['fitness_rent'],
				'golf' => $form_data['golfCourse_rent'],
				'pool' => $form_data['pool_rent'],
				'spa' => $form_data['spa_rent'],
				'sports' => $form_data['sports_rent'],
				'tennis' => $form_data['tennis_rent'],
				'bikePath' => $form_data['bikePath_rent'],
				'boating' => $form_data['boating_rent'],
				'courtyard' => $form_data['courtyard_rent'],
				'playground' => $form_data['playground_rent'],
				'clubhouse' => $form_data['clubhouse_rent'],
				'publicTrans' => $form_data['publicTrans_rent'],
				'assocFee' => $form_data['associationFee_rent'],
				'uId' => $this->session->userdata('id'),
				'uSite' => '',
				'useAcreage' => $form_data['useAcreage_rent'],
				'financingDetails' => '',
				'groundLease' => $form_data['groundLease_rent'],
				'forSale' => $form_data['forSale'],
				'commPool' => $form_data['commPool_rent'],
				'sqFeet' => $form_data['sqFeet_rent'],
				'occupancy' => '',
				'parkingSpaces' => $form_data['parkingSpaces_rent'],
				'lawnSprinklers' => $form_data['lawnSprinklers_rent'],
				'fenced' => $form_data['fenced_rent'],
				'zoning' => $form_data['zoning_rent'],
				'available' => $form_data['available_rent'],
				'contactPhone' => $this->session->userdata('number'),
				'contactEmail' => $this->session->userdata('email'),
				'contactName' => $this->session->userdata('fullname'),
			);

			$ins_res = $this->legacy_db->insert('residential', $insert_data);

		}
		if ($ins_res) {
			$this->addResExtPic($img_ext, $rnd_id);
		}
		$this->legacy_db->close();
		return $ins_res;
	}

	public function addPropInterior($form_data, $forsale_val, $img_int, $rnd_id) {
		$this->legacy_db = $this->load->database('database_properties', true);
		$this->legacy_db->select('resId');
		$this->legacy_db->from('residential');
		$this->legacy_db->where('uniqueId', $rnd_id);
		$query = $this->legacy_db->get();
		foreach ($query->result_array() as $row) {
			$prop_id = $row['resId'];

		}

		if ($forsale_val == 1) {
			$data_insert = array(
				'title' => $form_data['floortitle'],
				'description' => $form_data['intedescription'],
				'beds' => $form_data['beds'],
				'baths' => $form_data['beds'],
				'air' => $form_data['centralAir'],
				'alarm' => $form_data['alarm'],
				'balcony' => $form_data['balcony'],
				'cable' => $form_data['cable'],
				'carpeted' => $form_data['carpeted'],
				'dishwasher' => $form_data['dishwasher'],
				'disposal' => $form_data['disposal'],
				'fireplace' => $form_data['fireplace'],
				'gasstove' => $form_data['gasStove'],
				'hardwood' => $form_data['hardwood'],
				'microwave' => $form_data['microwave'],
				'waterfront' => $form_data['waterfront'],
				'patio' => $form_data['patio'],
				'wheelchair' => $form_data['wheelchair'],
				'refrig' => $form_data['refrig'],
				'numfloors' => $form_data['numFloors'],
				'available' => $form_data['inteavailable'],
				'sqfeet' => $form_data['sqFeet'],
				'price' => $form_data['price'],
				'vaulted' => $form_data['vaulted'],
				'internet' => $form_data['internet'],
				'heating' => $form_data['heating'],
				'forSale' => $form_data['forSale'],
				'parentId' => $prop_id,

			);
		} else if ($forsale_val == 2) {
			$data_insert = array(
				'title' => $form_data['floortitle'],
				'description' => $form_data['intedescription'],
				'beds' => $form_data['beds'],
				'baths' => $form_data['beds'],
				'air' => $form_data['centralAir'],
				'alarm' => $form_data['alarm'],
				'balcony' => $form_data['balcony'],
				'cable' => $form_data['cable'],
				'carpeted' => $form_data['carpeted'],
				'dishwasher' => $form_data['dishwasher'],
				'disposal' => $form_data['disposal'],
				'fireplace' => $form_data['fireplace'],
				'gasstove' => $form_data['gasStove'],
				'hardwood' => $form_data['hardwood'],
				'microwave' => $form_data['microwave'],
				'waterfront' => $form_data['waterfront'],
				'patio' => $form_data['patio'],
				'wdIncluded' => $form_data['wdIncluded_rent'],
				'wdConnections' => $form_data['wdConnections_rent'],
				'secDep' => $form_data['intedeposit_rent'],
				'windowUnits' => $form_data['intewindowUnits_rent'],
				'wheelchair' => $form_data['wheelchair'],
				'refrig' => $form_data['refrig'],
				'internet' => $form_data['internet'],
				'numfloors' => $form_data['numFloors'],
				'available' => $form_data['available'],
				'sqfeet' => $form_data['sqFeet'],
				'price' => $form_data['price'],
				'vaulted' => $form_data['vaulted'],
				'heating' => $form_data['heating'],
				'forSale' => $form_data['forSale'],
				'parentId' => $prop_id,
			);

		}
		$ins_res = $this->legacy_db->insert('res_interior', $data_insert);
		if ($ins_res) {
			$this->addResIntPic($img_int, $rnd_id);
		}
		$this->legacy_db->close();
		return $ins_res;
	}
	public function addResExtPic($data_val, $rnd_id) {
		$this->legacy_db = $this->load->database('database_properties', true);
		$this->legacy_db->select('resId,typeId');
		$this->legacy_db->from('residential');
		$this->legacy_db->where('uniqueId', $rnd_id);
		$query = $this->legacy_db->get();
		foreach ($query->result_array() as $row) {
			$prop_id = $row['resId'];

		}
		$this->legacy_db->close();
		$this->legacy_db = $this->load->database('database_files', true);
		$data_ar = array('uniqueId' => $rnd_id, 'uname' => $this->session->userdata('username'), 'uid' => $this->session->userdata('id'), 'uSite' => '', 'filename' => $data_val, 'projId' => $prop_id);
		$this->legacy_db->insert('pictures', $data_ar);
		$this->legacy_db->close();

	}
	public function updateResExtPic($id, $data_val, $rnd_id) {
		if ($data_val != "") {
			$this->legacy_db = $this->load->database('database_files', true);
			$data_ar = array('filename' => $data_val);
			$this->legacy_db->where('projId', $id);
			$this->legacy_db->where('uniqueId', $rnd_id);
			$this->legacy_db->like('filename', 'ext_', 'after');
			$this->legacy_db->update('pictures', $data_ar);
			$this->legacy_db->close();
		} else {
			return true;
		}

	}
	public function addResIntPic($data_val, $rnd_id) {
		$this->legacy_db = $this->load->database('database_properties', true);
		$this->legacy_db->select('resId');
		$this->legacy_db->from('residential');
		$this->legacy_db->where('uniqueId', $rnd_id);
		$query = $this->legacy_db->get();
		foreach ($query->result_array() as $row) {
			$prop_id = $row['resId'];

		}
		$this->legacy_db->close();
		$this->legacy_db = $this->load->database('database_files', true);
		$data_ar = array('uniqueId' => $rnd_id, 'uname' => $this->session->userdata('username'), 'uid' => $this->session->userdata('id'), 'uSite' => '', 'filename' => $data_val, 'projId' => $prop_id);
		//$data_ar=array('uSite'=>'','filename'=>$data_val,'projId'=>$prop_id);
		/*		echo"<pre>";
		print_r($data_ar);*/
		$this->legacy_db->insert('pictures', $data_ar);
		$this->legacy_db->close();

	}
	public function addComPropertyCommon($form_data, $forsale_val, $com_sale_ext, $rnd_id) {
		$this->legacy_db = $this->load->database('database_properties', true);
		if ($forsale_val == 1) {
			$insert_data = array(
				'title' => $form_data['title_common'],
				'uniqueId' => $form_data['uniqid'],
				'address' => $form_data['street1_common'],
				'address2' => $form_data['street2_common'],
				'localityId' => '',
				'city' => $form_data['city_common'],
				'provinceId' => '',
				'state' => $form_data['state_common'],
				'postalcodeId' => '',
				'zip' => $form_data['zip_common'],
				'loc_match' => '',
				'longitude' => $form_data['longitude'],
				'latitude' => $form_data['latitude'],
				'price' => $form_data['price_common'],
				'description' => $form_data['description_common'],
				'typeId' => $form_data['typeId'],
				'typeId2' => $form_data['typeId_common2'],
				'typeId3' => $form_data['typeId_common3'],
				'status' => $form_data['status_common'],
				'datePosted' => date("Y-m-d"),
				'sqFeet' => $form_data['sqFeet_common'],
				'lotsize' => $form_data['lotSize_common'],
				'useAcreage' => $form_data['useAcreage_common'],
				'trafficcount' => $form_data['trafficCount_common'],
				'parkingratio' => $form_data['parkingRatio_common'],
				'zoning' => $form_data['zoning_common'],
				'yearbuilt' => $form_data['yearBuilt_common'],
				'available' => $form_data['available_common'],
				'uId' => $this->session->userdata('id'),
				'uSite' => '',
				'forSale' => $forsale_val,
				'tax' => $form_data['tax_common'],
				'noi' => $form_data['noi_common'],
				'goi' => $form_data['goi_common'],
				'mls' => $form_data['mls_common'],
				'fmv' => $form_data['fmv_common'],
				'numUnits' => $form_data['numUnits_common'],
				'contactPhone' => $this->session->userdata('number'),
				'contactEmail' => $this->session->userdata('email'),
				'contactName' => $this->session->userdata('fullname'),
				'occupancy' => $form_data['occupancy_common'],
				'parkingSpaces' => $form_data['parkingSpaces_common'],
				'lawnSprinklers' => $form_data['lawnSprinklers_common'],
				'class' => $form_data['class_common'],
				'courtyard' => $form_data['courtyard_common'],
				'fenced' => $form_data['fenced_common'],
				'opExpenses' => $form_data['opExpenses_common'],
				'cranes' => $form_data['cranes_common'],
				'dockDoors' => $form_data['dockDoors_common'],
				'gradeDoors' => $form_data['gradeDoors_common'],
				'rail' => $form_data['railYard_common'],
			);
			$ins_res = $this->legacy_db->insert('commercial', $insert_data);
		} else {

			$ins_res = $this->legacy_db->insert('commercial', $form_data);
		}
		$this->legacy_db->close();
		if ($ins_res) {
			$this->addComExtPic($com_sale_ext, $rnd_id);
		}
		return $ins_res;

	}
	public function addResComplex($insert_data, $forsale_val, $diff_sale_ext, $rnd_id) {
		$this->legacy_db = $this->load->database('database_properties', true);
		if ($forsale_val == 1) {
			$ins_res = $this->legacy_db->insert('residential', $insert_data);
		} else {
			$ins_res = $this->legacy_db->insert('residential', $insert_data);
		}
		$this->legacy_db->close();
		if ($ins_res) {
			$this->addResExtPic($diff_sale_ext, $rnd_id);
		}
		return $ins_res;

	}
	public function addResComplexInterior($data_insert, $forsale_val, $diff_sale_ext, $rnd_id) {
		$this->legacy_db = $this->load->database('database_properties', true);
		$this->legacy_db->select('resId');
		$this->legacy_db->from('residential');
		$this->legacy_db->where('uniqueId', $rnd_id);
		$query = $this->legacy_db->get();
		foreach ($query->result_array() as $row) {
			$prop_id = $row['resId'];

		}

		if ($forsale_val == 1) {
			//$last_id=$this->legacy_db->insert_id();
			$data_insert['parentId'] = $prop_id;
			$ins_res = $this->legacy_db->insert('res_interior', $data_insert);
		} else {
			//$last_id=$this->legacy_db->insert_id();
			$data_insert['parentId'] = $prop_id;

			$ins_res = $this->legacy_db->insert('res_interior', $data_insert);
		}
		$this->legacy_db->close();
		if ($ins_res) {
			$this->addResIntPic($diff_sale_ext, $rnd_id);
		}
		return $ins_res;

	}
	public function addComSaleInterior($data_insert, $forsale_val, $com_sale_int, $rnd_id) {
		$this->legacy_db = $this->load->database('database_properties', true);
		$this->legacy_db->select('commId');
		$this->legacy_db->from('commercial');
		$this->legacy_db->where('uniqueId', $rnd_id);
		$query = $this->legacy_db->get();
		foreach ($query->result_array() as $row) {
			$prop_id = $row['commId'];

		}

		if ($forsale_val == 1) {
			//$last_id=$this->legacy_db->insert_id();
			$data_insert['parentId'] = $prop_id;
			$ins_res = $this->legacy_db->insert('comm_interior', $data_insert);
		} else {
			//$last_id=$this->legacy_db->insert_id();
			$data_insert['parentId'] = $prop_id;

			$ins_res = $this->legacy_db->insert('comm_interior', $data_insert);
		}
		$this->legacy_db->close();
		if ($ins_res) {
			$this->addComIntPic($com_sale_int, $rnd_id);
		}
		return $ins_res;

	}
	public function addComExtPic($data_val, $rnd_id) {
		$this->legacy_db = $this->load->database('database_properties', true);
		$this->legacy_db->select('commId');
		$this->legacy_db->from('commercial');
		$this->legacy_db->where('uniqueId', $rnd_id);
		$query = $this->legacy_db->get();
		foreach ($query->result_array() as $row) {
			$prop_id = $row['commId'];

		}
		$this->legacy_db->close();
		$this->legacy_db = $this->load->database('database_files', true);
		$data_ar = array('uniqueId' => $rnd_id, 'uname' => $this->session->userdata('username'), 'uid' => $this->session->userdata('id'), 'uSite' => '', 'filename' => $data_val, 'projId' => $prop_id);
		//$data_ar=array('uSite'=>'','filename'=>$data_val,'projId'=>$prop_id);
		$this->legacy_db->insert('pictures', $data_ar);
		$this->legacy_db->close();

	}
	public function addComIntPic($data_val, $rnd_id) {
		$this->legacy_db = $this->load->database('database_properties', true);
		$this->legacy_db->select('commId');
		$this->legacy_db->from('commercial');
		$this->legacy_db->where('uniqueId', $rnd_id);
		$query = $this->legacy_db->get();
		foreach ($query->result_array() as $row) {
			$prop_id = $row['commId'];

		}
		$this->legacy_db->close();
		$this->legacy_db = $this->load->database('database_files', true);
		$data_ar = array('uniqueId' => $rnd_id, 'uname' => $this->session->userdata('username'), 'uid' => $this->session->userdata('id'), 'uSite' => '', 'filename' => $data_val, 'projId' => $prop_id);
		$this->legacy_db->insert('pictures', $data_ar);
		$this->legacy_db->close();

	}

	public function propertySaleListCom() {

		$this->legacy_db = $this->load->database('database_properties', true);
		$query = $this->legacy_db->query("SELECT *  FROM commercial WHERE forSale=1 ORDER BY commId DESC");
		if ($query->num_rows() > 0) {
			foreach ($query->result_array() as $row) {
				$data_ar[] = $row;
				$prop_id[] = $row['commId'];
				$prop_rand[] = $row['uniqueId'];
			}
			$this->legacy_db->close();
			//print_r($prop_rand);
			$this->legacy_db = $this->load->database('database_files', true);
			$this->legacy_db->select('filename,uniqueId');
			$this->legacy_db->like('filename', 'ext_', 'after');
			$this->legacy_db->from('pictures');
			$this->legacy_db->where_in('uniqueId', $prop_rand);
			$this->legacy_db->where_in('projId', $prop_id);
			$this->legacy_db->order_by('projId', "desc");
			$query = $this->legacy_db->get();

			$i = 0;

			foreach ($query->result_array() as $row) {
				$data_ar[$i]['filename'] = $row['filename'];
				$i++;
			}

			//echo $this->legacy_db->last_query();

			$i = 0;

			foreach ($query->result_array() as $row) {
				$data_ar[$i]['filename'] = $row['filename'];
				$i++;
			}
			/*echo "<pre>" . $i ;print_r($data_ar);echo "</pre>";
			exit;*/

			return $data_ar;
		}

	}
	public function propertySaleListRes() {
		$this->legacy_db = $this->load->database('database_properties', true);
		$query = $this->legacy_db->query("SELECT *  FROM residential WHERE forSale=1 ORDER BY resId DESC");
		if ($query->num_rows() > 0) {

			foreach ($query->result_array() as $row) {
				$data_ar[] = $row;
				$prop_id[] = $row['resId'];
				$prop_rand[] = $row['uniqueId'];

			}

			$this->legacy_db->close();
			$this->legacy_db = $this->load->database('database_files', true);
			$this->legacy_db->select('filename');
			$this->legacy_db->like('filename', 'ext_', 'after');
			$this->legacy_db->from('pictures');
			$this->legacy_db->where_in('uniqueId', $prop_rand);
			$this->legacy_db->where_in('projId', $prop_id);
			$this->legacy_db->order_by('projId', "desc");
			$query = $this->legacy_db->get();
			$i = 0;
			foreach ($query->result_array() as $row) {
				$data_ar[$i]['filename'] = $row['filename'];
				$i++;
			}
			return $data_ar;
		}

	}
	public function propertyRentListCom() {

		$this->legacy_db = $this->load->database('database_properties', true);
		$query = $this->legacy_db->query("SELECT *  FROM commercial WHERE forSale=2 ORDER BY commId DESC");
		if ($query->num_rows() > 0) {

			foreach ($query->result_array() as $row) {
				$data_ar[] = $row;
				$prop_id[] = $row['commId'];
				$prop_rand[] = $row['uniqueId'];
			}
			$this->legacy_db->close();
			$this->legacy_db = $this->load->database('database_files', true);
			$this->legacy_db->select('filename');
			$this->legacy_db->like('filename', 'ext_', 'after');
			$this->legacy_db->from('pictures');
			$this->legacy_db->where_in('uniqueId', $prop_rand);
			$this->legacy_db->where_in('projId', $prop_id);
			$this->legacy_db->order_by('projId', "desc");
			$query = $this->legacy_db->get();

			$i = 0;
			foreach ($query->result_array() as $row) {
				$data_ar[$i]['filename'] = $row['filename'];
				$i++;
			}

			/*echo "<pre>";
			print_r($data_ar);exit;*/
			return $data_ar;
		}

	}
	public function propertyRentListRes() {
		$this->legacy_db = $this->load->database('database_properties', true);
		$query = $this->legacy_db->query("SELECT *  FROM residential WHERE forSale=2 ORDER BY resId DESC");
		if ($query->num_rows() > 0) {

			foreach ($query->result_array() as $row) {
				$data_ar[] = $row;
				$prop_id[] = $row['resId'];
				$prop_rand[] = $row['uniqueId'];
			}
			$this->legacy_db->close();
			$this->legacy_db = $this->load->database('database_files', true);
			$this->legacy_db->select('filename');
			$this->legacy_db->like('filename', 'ext_', 'after');
			$this->legacy_db->from('pictures');
			$this->legacy_db->where_in('uniqueId', $prop_rand);
			$this->legacy_db->where_in('projId', $prop_id);
			$this->legacy_db->order_by('projId', "desc");
			$query = $this->legacy_db->get();
			$i = 0;
			foreach ($query->result_array() as $row) {
				$data_ar[$i]['filename'] = $row['filename'];
				$i++;
			}
			return $data_ar;
		}

	}
	public function propertyEdit($resId, $forSale, $typeId) {
		$this->legacy_db = $this->load->database('database_properties', true);
		if ($this->session->userdata('id') == 1) {
			$this->legacy_db->select('*');
			$this->legacy_db->from('residential');
			$this->legacy_db->where('resID', $resId);
			$this->legacy_db->where('forSale', $forSale);
			$this->legacy_db->where('typeId', $typeId);
			$query = $this->legacy_db->get();
			return $query->result_array();
		} else {
			$this->legacy_db->select('*');
			$this->legacy_db->from('residential');
			$this->legacy_db->where('resID', $resId);
			$this->legacy_db->where('uId', $this->session->userdata('id'));
			$this->legacy_db->where('forSale', $forSale);
			$this->legacy_db->where('typeId', $typeId);
			$query = $this->legacy_db->get();
			return $query->result_array();
		}
	}
	public function propertyComEdit($commId, $forSale, $typeId) {
		$this->legacy_db = $this->load->database('database_properties', true);
		if ($this->session->userdata('id') == 1) {
			$this->legacy_db->select('*');
			$this->legacy_db->from('commercial');
			$this->legacy_db->where('commId', $commId);
			$this->legacy_db->where('forSale', $forSale);
			$this->legacy_db->where('typeId', $typeId);
			$query = $this->legacy_db->get();
			return $query->result_array();
		} else {
			$this->legacy_db->select('*');
			$this->legacy_db->from('commercial');
			$this->legacy_db->where('commId', $commId);
			$this->legacy_db->where('uId', $this->session->userdata('id'));
			$this->legacy_db->where('forSale', $forSale);
			$this->legacy_db->where('typeId', $typeId);
			$query = $this->legacy_db->get();
			return $query->result_array();
		}
	}
	public function addResPropertyEdit($form_data, $forsale_val, $resId, $img_ext, $rnd_id) {
		$this->legacy_db = $this->load->database('database_properties', true);
		if ($forsale_val == 1) {
			$update_data = array(
				'title' => $form_data['title'],
				'address' => $form_data['street1'],
				'address2' => $form_data['street2'],
				'localityId' => '',
				'city' => $form_data['city'],
				'provinceId' => '',
				'state' => $form_data['state'],
				'postalcodeId' => '',
				'zip' => $form_data['zip'],
				'loc_match' => '',
				'longitude' => $form_data['longitude'],
				'latitude' => $form_data['latitude'],
				'price' => $form_data['price'],
				'description' => $form_data['description'],
				'typeId' => $form_data['typeId'], //$form_data['typeId'],
				/*	'typeId2'=>'',//$form_data['typeId2'],
				'typeId3'=>'',//$form_data['typeId3'],
				'beds'=>'',//$form_data['beds'],
				'baths'=>'',//$form_data['baths'],*/
				'status' => $form_data['status'],
				'dateUpdated' => date("Y-m-d"),
				'neighborhood' => $form_data['neighborhood'],
				'waterfront' => $form_data['waterfront'],
				'yearbuilt' => $form_data['yearBuilt'],
				'lotsize' => $form_data['lotSize'],
				'garagesize' => $form_data['garageSize'],
				'tax' => $form_data['tax'],
				'avail' => $form_data['available'],
				'elemSchool' => $form_data['elemSchool'],
				'midSchool' => $form_data['midSchool'],
				'midSchool' => $form_data['midSchool'],
				'highSchool' => $form_data['highSchool'],
				'golf' => $form_data['golfCourse'],
				'pool' => $form_data['pool'],
				'assocFee' => $form_data['associationFee'],
				/*'uId'=>$this->session->userdata('id'),*/
				'uSite' => '',
				'useAcreage' => $form_data['useAcreage'],
				'financingDetails' => $form_data['financingDetails'],
				'commPool' => $form_data['commPool'],
				'fmv' => $form_data['fmv'],
				'mls' => $form_data['mls'],
				'parkingSpaces' => $form_data['parkingSpaces'],
				'lawnSprinklers' => $form_data['lawnSprinklers'],
				'zoning' => $form_data['zoning'],
				'available' => $form_data['available'],
				/*	'contactPhone'=>$this->session->userdata('number'),
					'contactEmail'=>$this->session->userdata('email'),
				*/

			);
			$this->legacy_db->where('resId', $resId);
			$ins_res = $this->legacy_db->update('residential', $update_data);
		} else if ($forsale_val == 2) {

			$update_data = array(
				'title' => $form_data['title_rent'],
				'address' => $form_data['street1_rent'],
				'address2' => $form_data['street2_rent'],
				'localityId' => '',
				'city' => $form_data['city_rent'],
				'provinceId' => '',
				'state' => $form_data['state_rent'],
				'postalcodeId' => '',
				'zip' => $form_data['zip_rent'],
				'loc_match' => '',
				'longitude' => $form_data['longitude'],
				'latitude' => $form_data['latitude'],
				//'price'=>$form_data['price'],
				'description' => $form_data['description_rent'],
				'typeId' => $form_data['typeId'], //$form_data['typeId'],
				'dateUpdated' => date("Y-m-d"),
				'neighborhood' => $form_data['neighborhood_rent'],
				'waterfront' => $form_data['waterfront_rent'],
				'yearbuilt' => $form_data['yearBuilt_rent'],
				'lotsize' => $form_data['lotSize_rent'],
				'garagesize' => $form_data['garageSize_rent'],
				'tpgas' => $form_data['tpGas_rent'],
				'tpelectricity' => $form_data['tpElectricity_rent'],
				'tpwater' => $form_data['tpWater_rent'],
				'tpcable' => $form_data['tpCable_rent'],
				'tptrash' => $form_data['tpTrash_rent'],
				'leaseOp' => $form_data['leaseOp_rent'],
				'sec8' => $form_data['section8_rent'],
				'secdep' => $form_data['deposit_rent'],
				'avail' => $form_data['available_rent'],
				'pets' => $form_data['pets_rent'],
				'petPolicy' => $form_data['petPolicy_rent'],
				'appFee' => $form_data['appFee_rent'],
				'elemSchool' => $form_data['elemSchool_rent'],
				'midSchool' => $form_data['midSchool_rent'],
				'highSchool' => $form_data['highSchool_rent'],
				'fitness' => $form_data['fitness_rent'],
				'golf' => $form_data['golfCourse_rent'],
				'pool' => $form_data['pool_rent'],
				'spa' => $form_data['spa_rent'],
				'sports' => $form_data['sports_rent'],
				'tennis' => $form_data['tennis_rent'],
				'bikePath' => $form_data['bikePath_rent'],
				'boating' => $form_data['boating_rent'],
				'courtyard' => $form_data['courtyard_rent'],
				'playground' => $form_data['playground_rent'],
				'clubhouse' => $form_data['clubhouse_rent'],
				'publicTrans' => $form_data['publicTrans_rent'],
				'assocFee' => $form_data['associationFee_rent'],
				/*'uId'=>$this->session->userdata('id'),*/
				'uSite' => '',
				'useAcreage' => $form_data['useAcreage_rent'],
				'financingDetails' => '',
				'groundLease' => $form_data['groundLease_rent'],
				'forSale' => $form_data['forSale'],
				'commPool' => $form_data['commPool_rent'],
				'sqFeet' => $form_data['sqFeet_rent'],
				'parkingSpaces' => $form_data['parkingSpaces_rent'],
				'lawnSprinklers' => $form_data['lawnSprinklers_rent'],
				'fenced' => $form_data['fenced_rent'],
				'zoning' => $form_data['zoning_rent'],
				'available' => $form_data['available_rent'], /*,
			'contactPhone'=>$this->session->userdata('number'),
			'contactEmail'=>$this->session->userdata('email'),
			'contactName'=>$this->session->userdata('fullname'),*/
			);
			$this->legacy_db->where('resId', $resId);
			$ins_res = $this->legacy_db->update('residential', $update_data);
		}
		if ($ins_res) {
			$this->updateResExtPic($resId, $img_ext, $rnd_id);
			return $ins_res;
		}
	}
	public function addComPropertyEditCommon($form_data, $forsale_val, $commId, $img_ext, $rnd_id) {
		$this->legacy_db = $this->load->database('database_properties', true);
		if ($forsale_val == 1) {
			$insert_data = array(
				'title' => $form_data['title_common'],
				'address' => $form_data['street1_common'],
				'address2' => $form_data['street2_common'],
				'localityId' => '',
				'city' => $form_data['city_common'],
				'provinceId' => '',
				'state' => $form_data['state_common'],
				'postalcodeId' => '',
				'zip' => $form_data['zip_common'],
				'loc_match' => '',
				'longitude' => $form_data['longitude'],
				'latitude' => $form_data['latitude'],
				'price' => $form_data['price_common'],
				'description' => $form_data['description_common'],
				'typeId' => $form_data['typeId'],
				'typeId2' => $form_data['typeId_common2'],
				'typeId3' => $form_data['typeId_common3'],
				'status' => $form_data['status_common'],
				'dateUpdated' => date("Y-m-d"),
				'sqFeet' => $form_data['sqFeet_common'],
				'lotsize' => $form_data['lotSize_common'],
				'useAcreage' => $form_data['useAcreage_common'],
				'trafficcount' => $form_data['trafficCount_common'],
				'parkingratio' => $form_data['parkingRatio_common'],
				'zoning' => $form_data['zoning_common'],
				'yearbuilt' => $form_data['yearBuilt_common'],
				'available' => $form_data['available_common'],
				/*'uId'=>$this->session->userdata('id'),*/
				'uSite' => '',
				'forSale' => $forsale_val,
				'tax' => $form_data['tax_common'],
				'noi' => $form_data['noi_common'],
				'goi' => $form_data['goi_common'],
				'mls' => $form_data['mls_common'],
				'fmv' => $form_data['fmv_common'],
				'numUnits' => $form_data['numUnits_common'],
				/*'contactPhone'=>$this->session->userdata('number'),
					'contactEmail'=>$this->session->userdata('email'),
				*/
				'occupancy' => $form_data['occupancy_common'],
				'parkingSpaces' => $form_data['parkingSpaces_common'],
				'lawnSprinklers' => $form_data['lawnSprinklers_common'],
				'courtyard' => $form_data['courtyard_common'],
				'class' => $form_data['class_common'],
				'fenced' => $form_data['fenced_common'],
				'opExpenses' => $form_data['opExpenses_common'],
				'cranes' => $form_data['cranes_common'],
				'dockDoors' => $form_data['dockDoors_common'],
				'gradeDoors' => $form_data['gradeDoors_common'],
				'rail' => $form_data['railYard_common'],
			);
			$this->legacy_db->where('commId', $commId);
			$ins_res = $this->legacy_db->update('commercial', $insert_data);
		} else {
			$this->legacy_db->where('commId', $commId);
			$ins_res = $this->legacy_db->update('commercial', $form_data);

		}
		if ($ins_res) {
			$this->updateResExtPic($commId, $img_ext, $rnd_id);
			return $ins_res;
		}
	}
	public function addResComplexEdit($insert_data, $forsale_val, $resId, $img_ext, $rnd_id) {
		$this->legacy_db = $this->load->database('database_properties', true);
		if ($forsale_val == 1) {
			$this->legacy_db->where('resId', $resId);
			$ins_res = $this->legacy_db->update('residential', $insert_data);
		} else {
			$this->legacy_db->where('resId', $resId);
			$ins_res = $this->legacy_db->update('residential', $insert_data);
		}
		if ($ins_res) {
			//echo $img_ext;exit();
			$this->updateResExtPic($resId, $img_ext, $rnd_id);
			return $ins_res;
		}

	}
	public function propertyResDel($resId) {
		$this->legacy_db = $this->load->database('database_properties', true);
		$query = $this->legacy_db->query("SELECT resId,uniqueId  FROM residential WHERE resId='" . $resId . "'");
		if ($query->num_rows() > 0) {

			foreach ($query->result_array() as $row) {

				$prop_id[] = $row['resId'];
				$prop_rand[] = $row['uniqueId'];
			}
		}
		$this->legacy_db->where('resId', $resId);
		$ins_res = $this->legacy_db->delete('residential');
		$this->legacy_db->where('parentId', $resId);
		$ins_res .= $this->legacy_db->delete('res_interior');

		$this->legacy_db = $this->load->database('database_files', true);
		$this->legacy_db->select('filename');
		$this->legacy_db->where_in('uniqueId', $prop_rand);
		$query = $this->legacy_db->get('pictures');
		$result = $query->result_array();
		$data = array();
		foreach ($result as $value) {
			$data[] = $value['filename'];
		}

		$this->legacy_db->where_in('uniqueId', $prop_rand);
		$ins_res .= $this->legacy_db->delete('pictures');
		return $data;

	}
	public function propertyComDel($commId) {
		$this->legacy_db = $this->load->database('database_properties', true);
		$query = $this->legacy_db->query("SELECT commId,uniqueId  FROM commercial WHERE commId='" . $commId . "'");
		if ($query->num_rows() > 0) {

			foreach ($query->result_array() as $row) {
				$prop_id[] = $row['commId'];
				$prop_rand[] = $row['uniqueId'];
			}
		}
		$this->legacy_db->where('commId', $commId);
		$ins_res = $this->legacy_db->delete('commercial');
		$this->legacy_db->close();
		$this->legacy_db = $this->load->database('database_files', true);
		$this->legacy_db->select('filename');
		$this->legacy_db->where_in('uniqueId', $prop_rand);
		$query = $this->legacy_db->get('pictures');
		$result = $query->result_array();
		$data = array();
		foreach ($result as $value) {
			$data[] = $value['filename'];
		}
		$this->legacy_db->where_in('uniqueId', $prop_rand);
		$this->legacy_db->where('projId', $commId);
		$ins_res .= $this->legacy_db->delete('pictures');
		return $data;
	}
	public function validateUsername($username) {
		$this->db->select('*');
		$this->db->where('username', $username);
		$query = $this->db->get('users');
		if ($query->num_rows() > 0) {
			return true;
		} else {
			return false;
		}

	}
	public function saveAgents($insert_data) {
		$ins_res = $this->db->insert('users', $insert_data);
		return $ins_res;
	}
	public function agentDetails($id) {
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('id', $id);
		$query = $this->db->get();
		return $query->result();
	}
	public function updateAgents($db_data, $id) {
		$this->db->where('id', $id);
		$ins_res = $this->db->update('users', $db_data);
		$this->legacy_db = $this->load->database('database_properties', true);
		$this->legacy_db->where('uId', $id);
		$insert_data = array('contactphone' => $db_data['number'], 'ContactEmail' => $db_data['email'], 'contactName' => $db_data['fullname']);
		$this->legacy_db->update('residential', $insert_data);
		$this->legacy_db->where('uId', $id);
		$this->legacy_db->update('commercial', $insert_data);
		return $ins_res;
	}
	public function adminDetails() {
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('id', 1);
		$query = $this->db->get();
		return $query->result();
	}
	public function updateAdmin($db_data) {
		$this->db->where('id', 1);
		$ins_res = $this->db->update('users', $db_data);
		$this->legacy_db = $this->load->database('database_properties', true);
		$this->legacy_db->where('uId', 1);
		$insert_data = array('contactphone' => $db_data['number'], 'contactName' => $db_data['fullname']);
		$this->legacy_db->update('residential', $insert_data);
		$this->legacy_db->where('uId', 1);
		$this->legacy_db->update('commercial', $insert_data);
		return $ins_res;
	}
	public function manageAgents() {
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('id!=', $this->session->userdata('id'));
		$query = $this->db->get();
		return $query->result();
	}
	public function validateOldPassword($password) {
		$this->db->select('password');
		$this->db->from('users');
		$this->db->where('password', md5($password));
		$this->db->where('id', $this->session->userdata('id'));
		$query = $this->db->get();
		return $query->result();
	}
	public function updatePwd($password) {
		$this->db->where('id', $this->session->userdata('id'));
		$db_data = array('password' => md5($password));
		$ins_res = $this->db->update('users', $db_data);
		return $ins_res;
	}
	public function deleteAgents($id) {
		$this->legacy_db = $this->load->database('database_properties', true);
		$query = $this->legacy_db->query("SELECT resId,uniqueId  FROM residential WHERE uId='" . $id . "'");
		if ($query->num_rows() > 0) {

			foreach ($query->result_array() as $row) {

				$prop_id[] = $row['resId'];
				$prop_rand[] = $row['uniqueId'];
			}

			$this->legacy_db->where('uId', $id);
			$ins_res = $this->legacy_db->delete('residential');
			$this->legacy_db->where_in('parentId', $prop_id);
			$ins_res .= $this->legacy_db->delete('res_interior');
			$this->legacy_db->close();
			$this->legacy_db = $this->load->database('database_files', true);
			$this->legacy_db->select('filename');
			$this->legacy_db->where_in('uniqueId', $prop_rand);
			$query = $this->legacy_db->get('pictures');
			$result = $query->result();
			$data_ar['filename'] = $result[0]->filename;
			$pic_arr = explode(",", $data_ar['filename']);
			foreach ($pic_arr as $pic) {
				$file_dir = 'uploads/' . $pic;
				if (is_file($file_dir)) {
					$deleted_file = unlink($file_dir);
					//$deleted_file = delete_file($file_dir);

				}

			}
			$this->legacy_db->where_in('uniqueId', $prop_rand);
			$ins_res .= $this->legacy_db->delete('pictures');
			$this->legacy_db->close();
		}
		$this->legacy_db = $this->load->database('database_properties', true);
		$query = $this->legacy_db->query("SELECT commId,uniqueId FROM commercial WHERE uId=" . $id);
		if ($query->num_rows() > 0) {

			foreach ($query->result_array() as $row) {
				$prop_id2[] = $row['commId'];
				$prop_rand2[] = $row['uniqueId'];
			}

			$this->legacy_db->where('uId', $id);
			$this->legacy_db->delete('commercial');
			$this->legacy_db->close();
			$this->legacy_db = $this->load->database('database_files', true);
			$this->legacy_db->select('filename');
			$this->legacy_db->where_in('uniqueId', $prop_rand2);
			$query = $this->legacy_db->get('pictures');
			$result2 = $query->result();
			$this->legacy_db->where_in('uniqueId', $prop_rand);
			$this->legacy_db->where_in('projId', $prop_id2);
			$ins_res .= $this->legacy_db->delete('pictures');
			$data_arr['filename'] = $result2[0]->filename;
			$pic_arr2 = explode(",", $data_arr['filename']);
			foreach ($pic_arr2 as $pic) {
				$file_dir2 = 'uploads/' . $pic;
				if (is_file($file_dir2)) {
					$deleted_file = unlink($file_dir);

				}

			}

		}
		$this->db->where('id', $id);
		$ins_res = $this->db->delete('users');
		//echo $this->legacy_db->last_query();exit();
		$this->db->close();
		return $ins_res;
	}
	public function getOptionGroup() {
		$this->legacy_db = $this->load->database('database_properties', true);
		$query = $this->legacy_db->query("SELECT typeId,description  FROM types WHERE parentId=0 ORDER BY description");
		if ($query->num_rows() > 0) {

			foreach ($query->result_array() as $row) {

				$this->legacy_db->select('typeId,description');
				$this->legacy_db->from('types');
				$this->legacy_db->where('parentId', $row['typeId']);
				$this->legacy_db->where('exterior', 1);
				$this->legacy_db->where('typeId!=', 98);
				$this->legacy_db->order_by('parentId', "desc");
				$this->legacy_db->order_by('description', "asc");
				$query = $this->legacy_db->get();

				if ($query->num_rows() > 0) {

					foreach ($query->result_array() as $row2) {
						$option[$row['description']][] = $row2;

					}
				}
				/**/
			}
		}
		$this->legacy_db->close();
		/*echo '<pre>'; print_r($option);	exit();*/
		return $option;

	}
	public function getStates($state_id) {
		$this->db->select('city');
		$this->db->where('statecode', $state_id);
		/* $this->db->where('zipcode',$zip_id);*/
		$this->db->order_by('city', 'asc');
		$this->db->distinct();
		$query = $this->db->get('locations');
		return $query;
	}
	public function getStateVal() {
		$this->db->select('state,statecode');
		/*  $this->db->where('zipcode',$zip_code);*/
		$this->db->order_by('state', 'asc');
		$this->db->group_by('state');
		$query = $this->db->get('locations');

		$state = array();
		foreach ($query->result_array() as $row2) {
			//$state[]= $row2;
			$state[$row2["statecode"]] = $row2['state'];

		}

		return $state;
	}
	public function getZipVal() {
		$this->db->select('zipcode');
		$this->db->order_by('zipcode', 'asc');
		$this->db->group_by('zipcode');
		$query = $this->db->get('locations');
		// $zipval = array();
		if ($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
				$zipval[] = $row;
			}
			/*echo"<pre>";
			print_r($zipval);*/

			return $zipval;
		}
	}
	public function getzip($city_id, $state_id) {
		$this->db->select('zipcode');
		$this->db->where('statecode', $state_id);
		$this->db->where('city', $city_id);
		$query = $this->db->get('locations');
		return $query;
	}
	public function getLatLog($zip) {
		$this->db->select('longitude,latitude');
		//$this->db->where('statecode',$state_id);
		$this->db->where('zipcode', $zip);
		$query = $this->db->get('locations');
		if ($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
				$data['loc'] = $row;
			}
			return $data;
		}

	}
	public function pageData() {
		$this->db->where('page_key', 'aboutus');
		$query = $this->db->get("pages");
		if ($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
				$data['contents'] = $row;
			}
			return $data;
		}
		/*print_r($data);exit();*/

	}
	public function addPageContent($db_data) {
		/*$this->legacy_db->where('id',1);*/
		$ins_res = $this->db->insert('pages', $db_data);
		return $ins_res;
	}
	public function updatePageContent($db_data) {
		$this->db->where('page_key', 'aboutus');
		$ins_res = $this->db->update('pages', $db_data);
		return $ins_res;
	}
	public function footerPageData() {
		$this->db->where('page_key', 'footer');
		$query = $this->db->get("pages");
		if ($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
				$data['contents'] = $row;
			}
			return $data;
		}
		/*print_r($data);exit();*/

	}
	public function addFooterPageContent($db_data) {
		/*$this->legacy_db->where('id',1);*/
		$ins_res = $this->db->insert('pages', $db_data);
		$this->db->close();
		return $ins_res;
	}
	public function updateFooterPageContent($db_data) {
		$this->db->where('page_key', 'footer');
		$ins_res = $this->db->update('pages', $db_data);
		return $ins_res;
	}
	public function customizationFooter() {
		$this->db->where('ckey', 'footer_color');
		$query = $this->db->get("configuration");
		if ($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
				$data['contents'] = $row;
			}
			return $data;
		}

	}
	public function customizationHeader() {
		$this->db->where('ckey', 'header_color');
		$query = $this->db->get("configuration");
		if ($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
				$data['contents'] = $row;
			}
			return $data;
		}

	}
	public function saveColor($db_data) {
		$ins_res = $this->db->insert('configuration', $db_data);
		$this->db->close();
		return $ins_res;
	}
	public function updateColor($db_data) {
		$this->db->where('ckey', $db_data['ckey']);
		$ins_res = $this->db->update('configuration', $db_data);
		$this->db->close();
		return $ins_res;
	}
	public function geSiteTitle() {
		$this->db->where('ckey', 'site_title');
		$query = $this->db->get("configuration");
		if ($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
				$data['contents'] = $row;
			}
			return $data;
		}

	}
	public function saveTitle($db_data) {
		$ins_res = $this->db->insert('configuration', $db_data);
		$this->db->close();
		return $ins_res;
	}
	public function updateTitle($db_data) {
		$this->db->where('ckey', $db_data['ckey']);
		$ins_res = $this->db->update('configuration', $db_data);
		$this->db->close();
		return $ins_res;
	}
	public function saveLogo($db_data) {
		$this->db->where('ckey', 'site_logo');
		$query = $this->db->get("configuration");
		if ($query->num_rows() > 0) {
			$this->db->where('ckey', $db_data['ckey']);
			$ins_res = $this->db->update('configuration', $db_data);
		} else {
			$ins_res = $this->db->insert('configuration', $db_data);
		}
		return $ins_res;
		$this->db->close();
	}
	public function gethyperLinkColor() {
		$this->db->where('ckey', 'hylinkcolor');
		$query = $this->db->get("configuration");
		if ($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
				$data['contents'] = $row;
			}
			return $data;
		}

	}
	public function saveHyColor($db_data) {
		$ins_res = $this->db->insert('configuration', $db_data);
		$this->db->close();
		return $ins_res;
	}
	public function updateHycolor($db_data) {
		$this->db->where('ckey', $db_data['ckey']);
		$ins_res = $this->db->update('configuration', $db_data);
		$this->db->close();
		return $ins_res;
	}
	public function getbtncolor() {
		$this->db->where('ckey', 'btn_color');
		$query = $this->db->get("configuration");
		if ($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
				$data['contents'] = $row;
			}
			return $data;
		}

	}
	public function savebtncolor($db_data) {
		$ins_res = $this->db->insert('configuration', $db_data);
		$this->db->close();
		return $ins_res;
	}
	public function updatebtncolor($db_data) {
		$this->db->where('ckey', $db_data['ckey']);
		$ins_res = $this->db->update('configuration', $db_data);
		$this->db->close();
		return $ins_res;
	}
	public function adminSCEmail($db_data) {
		$this->db->where('ckey', 'admin_email');
		$query = $this->db->get("configuration");
		if ($query->num_rows() > 0) {
			$this->db->where('ckey', $db_data['ckey']);
			$ins_res = $this->db->update('configuration', $db_data);
			//$this->legacy_db = $this->load->database('database_properties', true);
			//                        print_r($db_data['cvalue']);exit();
			$this->db->where('id', 1);
			$db_ar = array('email' => $db_data['cvalue']);
			$ins_res = $this->db->update('users', $db_ar);
			$this->legacy_db = $this->load->database('database_properties', true);
			$this->legacy_db->where('uId', 1);
			$insert_data = array('ContactEmail' => $db_data['cvalue']);
			$ins_res .= $this->legacy_db->update('residential', $insert_data);
			$this->legacy_db->where('uId', 1);
			$ins_res .= $this->legacy_db->update('commercial', $insert_data);

			return $ins_res;
		} else {
			$ins_res = $this->db->insert('configuration', $db_data);
			$this->db->where('id', 1);
			$db_ar = array('email' => $db_data['cvalue']);
			$ins_res = $this->db->update('users', $db_ar);
			$this->legacy_db = $this->load->database('database_properties', true);
			$this->legacy_db->where('uId', 1);
			$insert_data = array('ContactEmail' => $db_data['cvalue']);
			$ins_res .= $this->legacy_db->update('residential', $insert_data);
			$this->legacy_db->where('uId', 1);
			$ins_res .= $this->legacy_db->update('commercial', $insert_data);
			$this->db->close();
			return $ins_res;
		}
	}
	public function adminGetCEmail() {
		$this->db->where('ckey', 'admin_email');
		$query = $this->db->get("configuration");
		if ($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
				$data['contents'] = $row;
			}
			return $data;
		}
	}
	public function officeLoc($db_data) {
		$this->db->where('ckey', 'map_location');
		$query = $this->db->get("configuration");
		if ($query->num_rows() > 0) {
			$this->db->where('ckey', $db_data['ckey']);
			$ins_res = $this->db->update('configuration', $db_data);
			return $ins_res;
		} else {
			$ins_res = $this->db->insert('configuration', $db_data);
			$this->db->close();
			return $ins_res;
		}
	}
	public function officeLocUp() {
		$this->db->where('ckey', 'map_location');
		$query = $this->db->get("configuration");
		if ($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
				$data['contents'] = $row;
			}
			return $data;
		}
	}
	public function getnewletter($rnd_id, $typeId_val) {
		if ($typeId_val == 53 || $typeId_val == 55 || $typeId_val == 54 || $typeId_val == 60 || $typeId_val == 63 || $typeId_val == 62 || $typeId_val == 61 || $typeId_val == 77 || $typeId_val == 76 || $typeId_val == 78 || $typeId_val == 57 || $typeId_val == 56 || $typeId_val == 67) {
			$this->legacy_db = $this->load->database('database_properties', true);
			$this->legacy_db->select('residential.*,res_interior.beds,res_interior.baths');
			$this->legacy_db->from('residential');
			$this->legacy_db->join('res_interior', 'res_interior.parentId = residential.resId');
			$this->legacy_db->limit(1);
			$this->legacy_db->order_by("residential.resId", "desc");
			$query = $this->legacy_db->get();
			if ($query->num_rows() > 0) {

				foreach ($query->result_array() as $row) {
					$data_ar[] = $row;
					$prop_id[] = $row['resId'];
					$prop_rand[] = $row['uniqueId'];

				}
				$this->legacy_db->close();
				$this->legacy_db = $this->load->database('database_files', true);
				$this->legacy_db->select('filename');
				$this->legacy_db->like('filename', 'ext_', 'after');
				$this->legacy_db->from('pictures');
				$this->legacy_db->where_in('uniqueId', $prop_rand);
				$this->legacy_db->where_in('projId', $prop_id);
				$this->legacy_db->order_by('projId', "desc");
				$query = $this->legacy_db->get();

				//echo $this->legacy_db->last_query();
				$i = 0;
				foreach ($query->result_array() as $row) {
					$data_ar[$i]['filename'] = $row['filename'];
					$i++;
				}

				/*echo "<pre>";
				print_r($data_ar);exit;*/
				return $data_ar;

			}return false;
		} else {
			$this->legacy_db = $this->load->database('database_properties', true);
			$this->legacy_db->select('*');
			$this->legacy_db->from('commercial');
			$this->legacy_db->limit(1);
			$this->legacy_db->order_by("commId", "desc");
			$query = $this->legacy_db->get();
			if ($query->num_rows() > 0) {

				foreach ($query->result_array() as $row) {
					$data_ar[] = $row;
					$prop_id[] = $row['commId'];
					$prop_rand[] = $row['uniqueId'];

				}
				$this->legacy_db->close();
				$this->legacy_db = $this->load->database('database_files', true);
				$this->legacy_db->select('filename');
				$this->legacy_db->like('filename', 'ext_', 'after');
				$this->legacy_db->from('pictures');
				$this->legacy_db->where_in('uniqueId', $prop_rand);
				$this->legacy_db->where_in('projId', $prop_id);
				$this->legacy_db->order_by('projId', "desc");
				$query = $this->legacy_db->get();

				//echo $this->legacy_db->last_query();
				$i = 0;
				foreach ($query->result_array() as $row) {
					$data_ar[$i]['filename'] = $row['filename'];
					$i++;
				}

				/*echo "<pre>";
				print_r($data_ar);exit;*/
				return $data_ar;

			}
		}

	}
	public function getnewletterEmailId() {
		$this->db->select('*');
		$this->db->where('status', 1);
		$query = $this->db->get("newsletter");
		if ($query->num_rows() > 0) {

			return $query->result();
		}
	}
	public function getBannorColor() {
		$this->db->where('ckey', 'banner_color');
		$query = $this->db->get("configuration");
		if ($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
				$data['contents'] = $row;
			}
			return $data;
		}

	}
	public function saveBannor($db_data) {
		$this->db->where('ckey', $db_data['ckey']);
		$query = $this->db->get("configuration");
		if ($query->num_rows() > 0) {
			$this->db->where('ckey', $db_data['ckey']);
			$ins_res = $this->db->update('configuration', $db_data);
		} else {
			$ins_res = $this->db->insert('configuration', $db_data);
		}
		$this->db->close();
		return $ins_res;
	}
	public function adminGetCEmailPass() {
		$this->db->where('ckey', 'admin_smtp_pass');
		$query = $this->db->get("configuration");
		if ($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
				$data['contents'] = $row;
			}
			return $data;
		}
	}
	public function adminSCEmailPass($db_data) {
		$this->db->where('ckey', 'admin_smtp_pass');
		$query = $this->db->get("configuration");
		if ($query->num_rows() > 0) {
			$this->db->where('ckey', $db_data['ckey']);
			$ins_res = $this->db->update('configuration', $db_data);
			return $ins_res;
		} else {
			$ins_res = $this->db->insert('configuration', $db_data);
			return $ins_res;
		}
	}
	public function getSiteLogo() {
		$this->db->where('ckey', 'site_logo');
		$query = $this->db->get("configuration");
		if ($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
				$data['contents'] = $row;
			}
			return $data;
		}
	}

}
