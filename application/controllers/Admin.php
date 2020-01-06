<?php

if (!defined('BASEPATH')) {
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

class Admin extends CI_Controller
{
    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     *
     * @see http://codeigniter.com/user_guide/general/urls.html
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin_model');
        $this->load->library(['session', 'form_validation', 'pagination']);
        $this->load->helper('url');
    }

    public function index()
    {
        if ($this->session->userdata('id')) {
            redirect('admin/propertySaleList', 'refresh');
        } else {
            $data['error'] = '';
            $this->load->view('admin/login', $data);
        }
    }

    public function login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $session_set_value = $this->session->all_userdata();
        if (isset($session_set_value['remember_me']) && '1' == $session_set_value['remember_me']) {
            redirect('admin/propertySaleList', 'refresh');
        } else {
            // $newdata = array('user_email'    => $this->input->post('email'));
            $data['error'] = 'Invalid Username or Password';
            $result = $this->admin_model->adminLogin($username, $password);
            if (!$this->session->userdata('logged_in') || !$result) {
                //redirect('admin','refresh');
                $data['error'] = 'Invalid Username or Password';
                $this->load->view('admin/login', $data);
            } else {
                $remember = $this->input->post('remember');
                if ($remember) {
                    // Set remember me value in session
                    $this->session->set_userdata('remember_me', true);
                    //echo $this->session;exit();
                }
                //echo $this->session;exit();
                redirect('admin/propertySaleList', 'refresh');
            }
        }
    }

    public function propAdd()
    {
        if ($this->session->userdata('id')) {
            $data['option'] = $this->admin_model->getOptionGroup();
            $data['state_val'] = $this->admin_model->getStateVal();
            //$data['zip_val'] = ''; //$this->admin_model->getZipVal();
            $this->load->view('admin/index', $data);
        } else {
            redirect('admin', 'refresh');
        }
    }

    public function getZip()
    {
        $html = '';
        $state_id = $this->input->post('state_id');
        $city_id = $this->input->post('city_id');
        $data['zipcode'] = $this->admin_model->getzip($city_id, $state_id);
        if ($data['zipcode']) {
            foreach ($data['zipcode']->result_array() as $r) {
                if ($r['zipcode'] == $this->session->userdata('zipcode')) {
                    $selected = 'selected=selected';
                } else {
                    $selected = '';
                }

                if (!$this->session->userdata('id')) {
                    $html .= '<option value="'.$r['zipcode'].'">'.$r['zipcode'].'</option>';
                } else {
                    $html .= '<option value="'.$r['zipcode'].'" '.$selected.'>'.$r['zipcode'].'</option>';
                }
            }
            $val = ['success' => 'yes', 'html' => $html];
            $output = json_encode($val);
            echo $output;
        } else {
            $val = ['success' => 'no'];
            $output = json_encode($val);
            echo $output;
        }
    }

    public function getZipCodes()
    {
        $data['zip_val'] = $this->admin_model->getZipVal();
        echo json_encode($data);
        exit();
    }

    public function logout()
    {
        $newdata = [
            'id' => '',
            'username' => '',
            'email' => '',
            'number' => '',
            'fullname' => '',
            'logged_in' => false,
        ];
        $this->session->unset_userdata($newdata);
        $this->session->sess_destroy();
        redirect('admin', 'refresh');
    }

    public function addResProperty()
    {
        $random_id_length = 7;

        //generate a random id encrypt it and store it in $rnd_id
        $rnd_id = crypt(uniqid(rand(), 1));

        //to remove any slashes that might have come
        $rnd_id = strip_tags(stripslashes($rnd_id));

        //Removing any . or / and reversing the string
        $rnd_id = str_replace('.', '', $rnd_id);
        $rnd_id = strrev(str_replace('/', '', $rnd_id));

        //finally I take the first 7 characters from the $rnd_id
        $rnd_id = substr($rnd_id, 0, $random_id_length);
        $rnd_id = strtoupper($rnd_id);

        $forsale_val = $this->input->post('forSale');
        $typeId_val = $this->input->post('typeId');

        if ('1' == $forsale_val) {
            if (53 == $typeId_val || 55 == $typeId_val || 54 == $typeId_val || 60 == $typeId_val || 63 == $typeId_val || 62 == $typeId_val || 61 == $typeId_val || 77 == $typeId_val || 76 == $typeId_val || 78 == $typeId_val) {
                $result['loc'] = $this->admin_model->getLatLog($this->input->post('zip'));
                foreach ($result['loc'] as $lo) {
                    $log = $lo->longitude;
                    $lat = $lo->latitude;
                }
                //$new_name = time().$_FILES["filetoupload_sale"]['name'];
                if ($_FILES['filetoupload_sale']['name']) {
                    $c = 0;
                    foreach ($_FILES['filetoupload_sale']['name'] as $f_names) {
                        $new_name[] = 'ext_'.$rnd_id.'-'.$c.'-'.preg_replace('/\s+/', '', $f_names);
                        ++$c;
                    }
                    $sale_ext = implode(',', $new_name);
                    $config['upload_path'] = './uploads/';

                    $config['allowed_types'] = 'gif|jpg|png|jpeg';
                    // 		/*$config['max_size']	= '1000';
                    // 		$config['max_width']  = '1024';
                    // 		$config['max_height']  = '768';
                    $this->load->library('upload', $config);

                    $files = $_FILES;
                    $cpt = count($new_name);
                    for ($i = 0; $i < $cpt; ++$i) {
                        $_FILES['filetoupload_sale']['name'] = $new_name[$i];
                        $_FILES['filetoupload_sale']['type'] = $files['filetoupload_sale']['type'][$i];
                        $_FILES['filetoupload_sale']['tmp_name'] = $files['filetoupload_sale']['tmp_name'][$i];
                        $_FILES['filetoupload_sale']['error'] = $files['filetoupload_sale']['error'][$i];
                        $_FILES['filetoupload_sale']['size'] = $files['filetoupload_sale']['size'][$i];

                        $this->upload->initialize($config);
                        //$this->upload->do_upload();
                        if (!$this->upload->do_upload('filetoupload_sale')) {
                            $error = ['error' => $this->upload->display_errors()];

                            echo "<script language='javascript'>alert('upload failed');</script>";
                            //redirect('admin/propAdd');
                        }
                    }
                }
                $form_data = [
                    'uniqid' => $rnd_id,
                    'forSale' => $forsale_val,
                    'typeId' => $typeId_val,
                    'street1' => $this->input->post('street1'),
                    'elemSchool' => $this->input->post('elemSchool'),
                    'street2' => $this->input->post('street2'),
                    'midSchool' => $this->input->post('midSchool'),
                    'city' => $this->input->post('city'),
                    'highSchool' => $this->input->post('highSchool'),
                    'state' => $this->input->post('state'),
                    'zip' => $this->input->post('zip'),
                    'longitude' => $log,
                    'latitude' => $lat,
                    'useAcreage' => $this->input->post('useAcreage'),
                    'neighborhood' => $this->input->post('neighborhood'),
                    'waterfront' => @$this->input->post('waterfront'),
                    'golfCourse' => @$this->input->post('golfCourse'),
                    'commPool' => @$this->input->post('commPool'),
                    'pool' => @$this->input->post('pool'),
                    'lawnSprinklers' => @$this->input->post('lawnSprinklers'),
                    'associationFee' => @$this->input->post('associationFee'),
                    'available' => $this->input->post('available'),
                    'price' => $this->input->post('price'),
                    'fmv' => $this->input->post('fmv'),
                    'mls' => $this->input->post('mls'),
                    'tax' => $this->input->post('tax'),
                    'status' => $this->input->post('status'),
                    'lotSize' => $this->input->post('lotSize'),
                    'zoning' => $this->input->post('zoning'),
                    'yearBuilt' => $this->input->post('yearBuilt'),
                    'parkingSpaces' => $this->input->post('parkingSpaces'),
                    'garageSize' => $this->input->post('garageSize'),
                    'financingDetails' => $this->input->post('financingDetails'),
                    'title' => $this->input->post('title'),
                    'description' => $this->input->post('description'),
                ];
                $res1 = $this->admin_model->addResProperty($form_data, $forsale_val, $sale_ext, $rnd_id);
                $k = 1;
                if ($_FILES['filetoupload_sale_inte']['name']) {
                    foreach ($_FILES['filetoupload_sale_inte']['name'] as $sale_inte_name) {
                        $new_sale_inte[] = 'int_'.$rnd_id.'-'.$k.'-'.preg_replace('/\s+/', '', $sale_inte_name);
                        ++$k;
                    }
                    $sale_inte = implode(',', $new_sale_inte);
                    $inte_files = $_FILES;
                    $cpt = count($new_sale_inte);
                    for ($i = 0; $i < $cpt; ++$i) {
                        $_FILES['filetoupload_sale_inte']['name'] = $new_sale_inte[$i];
                        $_FILES['filetoupload_sale_inte']['type'] = $inte_files['filetoupload_sale_inte']['type'][$i];
                        $_FILES['filetoupload_sale_inte']['tmp_name'] = $inte_files['filetoupload_sale_inte']['tmp_name'][$i];
                        $_FILES['filetoupload_sale_inte']['error'] = $inte_files['filetoupload_sale_inte']['error'][$i];
                        $_FILES['filetoupload_sale_inte']['size'] = $inte_files['filetoupload_sale_inte']['size'][$i];

                        $this->upload->initialize($config);
                        //$this->upload->do_upload();
                        if (!$this->upload->do_upload('filetoupload_sale_inte')) {
                            echo "<script language='javascript'>alert('upload failed');</script>";
                            //redirect('admin/propAdd');
                        }
                    }
                }
                $form_data2 = [
                    'floortitle' => $this->input->post('intefloortitle'),
                    'intetype' => $this->input->post('intetype'),
                    'intedescription' => $this->input->post('intedescription'),
                    'carpeted' => $this->input->post('intecarpeted'),
                    'disposal' => $this->input->post('intedisposal'),
                    'gasStove' => $this->input->post('integasStove'),
                    'hardwood' => $this->input->post('intehardwood'),
                    'patio' => $this->input->post('intepatio'),
                    'alarm' => $this->input->post('intealarm'),
                    'cable' => $this->input->post('intecable'),
                    'dishwasher' => $this->input->post('intedishwasher'),
                    'fireplace' => $this->input->post('intefireplace'),
                    'balcony' => $this->input->post('intebalcony'),
                    'waterfront' => $this->input->post('intewaterfront'),
                    'wheelchair' => $this->input->post('intewheelchair'),
                    'microwave' => $this->input->post('intemicrowave'),
                    'refrig' => $this->input->post('interefrig'),
                    'centralAir' => $this->input->post('intecentralAir'),
                    'vaulted' => $this->input->post('intevaulted'),
                    'internet' => $this->input->post('inteinternet'),
                    'inteavailable' => $this->input->post('inteavailable'),
                    'sqFeet' => $this->input->post('intesqFeet'),
                    'beds' => $this->input->post('intebeds'),
                    'baths' => $this->input->post('intebaths'),
                    'numFloors' => $this->input->post('intenumFloors'),
                    'heating' => $this->input->post('inteheating'),
                    'price' => $this->input->post('price'),
                    'forSale' => $forsale_val,
                ];
                $res2 = $this->admin_model->addPropInterior($form_data2, $forsale_val, $sale_inte, $rnd_id);
            } elseif (57 == $typeId_val || 56 == $typeId_val || 67 == $typeId_val) {
                $result['loc'] = $this->admin_model->getLatLog($this->input->post('zip_diff'));
                foreach ($result['loc'] as $lo) {
                    $log = $lo->longitude;
                    $lat = $lo->latitude;
                }
                if ($_FILES['filetoupload_diff']['name']) {
                    $c = 0;
                    foreach ($_FILES['filetoupload_diff']['name'] as $f_names) {
                        $new_name[] = 'ext_'.$rnd_id.'-'.$c.'-'.preg_replace('/\s+/', '', $f_names);
                        ++$c;
                    }
                    $diff_sale_ext = implode(',', $new_name);
                    $config['upload_path'] = './uploads/';
                    $config['allowed_types'] = 'gif|jpg|png|jpeg';
                    /*	$config['max_size']	= '1000';
                        $config['max_width']  = '1024';
                    */

                    $this->load->library('upload');

                    $files = $_FILES;
                    $cpt = count($new_name);
                    for ($i = 0; $i < $cpt; ++$i) {
                        $_FILES['filetoupload_diff']['name'] = $new_name[$i];
                        $_FILES['filetoupload_diff']['type'] = $files['filetoupload_diff']['type'][$i];
                        $_FILES['filetoupload_diff']['tmp_name'] = $files['filetoupload_diff']['tmp_name'][$i];
                        $_FILES['filetoupload_diff']['error'] = $files['filetoupload_diff']['error'][$i];
                        $_FILES['filetoupload_diff']['size'] = $files['filetoupload_diff']['size'][$i];

                        $this->upload->initialize($config);
                        //$this->upload->do_upload();
                        if (!$this->upload->do_upload('filetoupload_diff')) {
                            $error = ['error' => $this->upload->display_errors()];
                            // print_r($error);exit;
                            echo "<script language='javascript'>alert('upload failed');</script>";
                            // 				redirect('admin/propAdd');
                        }
                    }
                }
                $insert_data = [
                    'title' => $this->input->post('title_diff'),
                    'uniqueId' => $rnd_id,
                    'address' => $this->input->post('street1_diff'),
                    'address2' => $this->input->post('street2_diff'),
                    'localityId' => '',
                    'city' => $this->input->post('city_diff'),
                    'provinceId' => '',
                    'state' => $this->input->post('state_diff'),
                    'postalcodeId' => '',
                    'zip' => $this->input->post('zip_diff'),
                    'loc_match' => '',
                    'longitude' => $log,
                    'latitude' => $lat,
                    'price' => $this->input->post('price_diff'),
                    'description' => $this->input->post('description_diff'),
                    'typeId' => $typeId_val, //$form_data['typeId'],
                    /*'typeId2'=>'',//$form_data['typeId2'],
                    'typeId3'=>'',//$form_data['typeId3'],
                    'beds'=>'',//$form_data['beds'],
                    'baths'=>'',//$form_data['baths'],*/
                    'status' => $this->input->post('status_diff'),
                    'datePosted' => date('Y-m-d'),
                    'neighborhood' => $this->input->post('neighborhood_diff'),
                    'waterfront' => $this->input->post('waterfront_diff'),
                    'yearbuilt' => $this->input->post('yearBuilt_diff'),
                    'garagesize' => $this->input->post('garageSize_diff'),
                    'elemSchool' => $this->input->post('elemSchool_diff'),
                    'midSchool' => $this->input->post('midSchool__diff'),
                    'highSchool' => $this->input->post('highSchool_diff'),
                    'golf' => $this->input->post('golfCourse_diff'),
                    'gated' => $this->input->post('gated_diff'),
                    'uId' => $this->session->userdata('id'),
                    'uSite' => '',
                    'noi' => $this->input->post('noi_diff'),
                    'goi' => $this->input->post('goi_diff'),
                    'forSale' => $forsale_val,
                    'onSiteLaundry' => $this->input->post('laundry_diff'),
                    'email' => $this->input->post('email_diff'),
                    'phone' => $this->input->post('phone_diff'),
                    'fax' => $this->input->post('fax_diff'),
                    'commPool' => $this->input->post('commPool_diff'),
                    'fmv' => $this->input->post('fmv_diff'),
                    'mls' => $this->input->post('mls_diff'),
                    'occupancy' => $this->input->post('occupancy_diff'),
                    'parkingSpaces' => $this->input->post('parkingSpaces_diff'),
                    'lawnSprinklers' => $this->input->post('lawnSprinklers_diff'),
                    'opExpenses' => $this->input->post('opExpenses_diff'),
                    'available' => $this->input->post('available_diff'),
                    'numUnits' => $this->input->post('numUnits_diff'),
                    'contactPhone' => $this->session->userdata('number'),
                    'contactEmail' => $this->session->userdata('email'),
                    'contactName' => $this->session->userdata('fullname'),
                ];
                $res1 = $this->admin_model->addResComplex($insert_data, $forsale_val, $diff_sale_ext, $rnd_id);
                if ($_FILES['filetoupload_diffsale_inte']['name']) {
                    $k = 1;
                    foreach ($_FILES['filetoupload_diffsale_inte']['name'] as $sale_inte_name) {
                        $new_sale_inte[] = 'int_'.$rnd_id.'-'.$k.'-'.preg_replace('/\s+/', '', $sale_inte_name);
                        ++$k;
                    }
                    $diff_sale__inte = implode(',', $new_sale_inte);
                    $this->load->library('upload');

                    $files_diff_sale = $_FILES;
                    $cpt = count($new_sale_inte);
                    for ($i = 0; $i < $cpt; ++$i) {
                        $_FILES['filetoupload_diffsale_inte']['name'] = $new_sale_inte[$i];
                        $_FILES['filetoupload_diffsale_inte']['type'] = $files_diff_sale['filetoupload_diffsale_inte']['type'][$i];
                        $_FILES['filetoupload_diffsale_inte']['tmp_name'] = $files_diff_sale['filetoupload_diffsale_inte']['tmp_name'][$i];
                        $_FILES['filetoupload_diffsale_inte']['error'] = $files_diff_sale['filetoupload_diffsale_inte']['error'][$i];
                        $_FILES['filetoupload_diffsale_inte']['size'] = $files_diff_sale['filetoupload_diffsale_inte']['size'][$i];

                        $this->upload->initialize($config);
                        //$this->upload->do_upload();
                        if (!$this->upload->do_upload('filetoupload_diffsale_inte')) {
                            $error = ['error' => $this->upload->display_errors()];
                            //print_r($error);exit;
                            echo "<script language='javascript'>alert('upload failed. Please try again');</script>";
                            //redirect('admin/propAdd');
                        }
                    }
                }
                $data_insert = [
                    'title' => $this->input->post('intefloortitle_diff_sale'),
                    'description' => $this->input->post('intedescription_diff_sale'),
                    'typeId' => $this->input->post('intetype_diff_sale'),
                    'beds' => $this->input->post('intebeds_diff_sale'),
                    'baths' => $this->input->post('intebaths_diff_sale'),
                    'air' => $this->input->post('intecentralAir_diff_sale'),
                    'alarm' => $this->input->post('intealarm_diff_sale'),
                    'balcony' => $this->input->post('intebalcony_diff_sale'),
                    'cable' => $this->input->post('intecarpeted_diff_sale'),
                    'carpeted' => $this->input->post('carpeted'),
                    'dishwasher' => $this->input->post('intedishwasher_diff_sale'),
                    'disposal' => $this->input->post('intedisposal_diff_sale'),
                    'fireplace' => $this->input->post('intefireplace_diff_sale'),
                    'gasstove' => $this->input->post('integasStove_diff_sale'),
                    'hardwood' => $this->input->post('intehardwood_diff_sale'),
                    'microwave' => $this->input->post('intemicrowave_diff_sale'),
                    'internet' => $this->input->post('inteinternet_diff_sale'),
                    'vaulted' => $this->input->post('intevaulted_diff_sale'),
                    'patio' => $this->input->post('intepatio_diff_sale'),
                    'wheelchair' => $this->input->post('intewheelchair_diff_sale'),
                    'refrig' => $this->input->post('interefrig_diff_sale'),
                    'numfloors' => $this->input->post('intenumFloors_diff_sale'),
                    'available' => $this->input->post('inteavailable_diff_sale'),
                    'sqfeet' => $this->input->post('intesqFeet_diff_sale'),
                    'price' => $this->input->post('price_diff'),
                    'forSale' => $this->input->post('forSale'),
                    'heating' => $this->input->post('inteheating_diff_sale'),
                    'datePosted' => date('Y-m-d'),
                ];
                $res2 = $this->admin_model->addResComplexInterior($data_insert, $forsale_val, $diff_sale__inte, $rnd_id);
            } else {
                $result['loc'] = $this->admin_model->getLatLog($this->input->post('zip_common'));
                foreach ($result['loc'] as $lo) {
                    $log = $lo->longitude;
                    $lat = $lo->latitude;
                }

                if (15 == $typeId_val || 16 == $typeId_val || 12 == $typeId_val || 17 == $typeId_val || 18 == $typeId_val || 64 == $typeId_val || 13 == $typeId_val || 14 == $typeId_val ||
                    22 == $typeId_val || 23 == $typeId_val || 21 == $typeId_val || 24 == $typeId_val || 30 == $typeId_val || 93 == $typeId_val || 65 == $typeId_val || 32 == $typeId_val ||
                    32 == $typeId_val || 29 == $typeId_val || 31 == $typeId_val || 28 == $typeId_val || 27 == $typeId_val || 25 == $typeId_val || 26 == $typeId_val || 66 == $typeId_val ||
                    33 == $typeId_val || 96 == $typeId_val || 95 == $typeId_val || 94 == $typeId_val || 34 == $typeId_val || 97 == $typeId_val || 35 == $typeId_val ||
                    80 == $typeId_val || 20 == $typeId_val || 19 == $typeId_val || 81 == $typeId_val || 79 == $typeId_val || 41 == $typeId_val || 39 == $typeId_val || 36 == $typeId_val ||
                    43 == $typeId_val || 38 == $typeId_val || 40 == $typeId_val || 44 == $typeId_val || 42 == $typeId_val || 37 == $typeId_val) {
                    if ($_FILES['filetoupload_common']['name']) {
                        $c = 0;
                        foreach ($_FILES['filetoupload_common']['name'] as $f_names) {
                            $new_name[] = 'ext_'.$rnd_id.'-'.$c.'-'.preg_replace('/\s+/', '', $f_names);
                            ++$c;
                        }
                        $com_sale_ext = implode(',', $new_name);

                        $config['upload_path'] = './uploads/';
                        $config['allowed_types'] = 'gif|jpg|png|jpeg';
                        $this->load->library('upload');

                        $files = $_FILES;
                        $cpt = count($new_name);
                        for ($i = 0; $i < $cpt; ++$i) {
                            $_FILES['filetoupload_common']['name'] = $new_name[$i];
                            $_FILES['filetoupload_common']['type'] = $files['filetoupload_common']['type'][$i];
                            $_FILES['filetoupload_common']['tmp_name'] = $files['filetoupload_common']['tmp_name'][$i];
                            $_FILES['filetoupload_common']['error'] = $files['filetoupload_common']['error'][$i];
                            $_FILES['filetoupload_common']['size'] = $files['filetoupload_common']['size'][$i];

                            $this->upload->initialize($config);
                            //$this->upload->do_upload();
                            if (!$this->upload->do_upload('filetoupload_common')) {
                                $error = ['error' => $this->upload->display_errors()];
                                //print_r($error);exit;
                                echo "<script language='javascript'>alert('upload failed');</script>";
                                // 				redirect('admin/propAdd');
                            }
                        }
                    }
                    $form_data = [
                        'uniqid' => $rnd_id,
                        'forSale' => $forsale_val,
                        'typeId' => $this->input->post('typeId'),
                        'street1_common' => $this->input->post('street1_common'),
                        'street2_common' => $this->input->post('street2_common'),
                        'city_common' => $this->input->post('city_common'),
                        'state_common' => $this->input->post('state_common'),
                        'zip_common' => $this->input->post('zip_common'),
                        'longitude' => $log,
                        'latitude' => $lat,
                        'typeId' => $typeId_val,
                        'typeId_common2' => $this->input->post('typeId_common2'),
                        'typeId_common3' => $this->input->post('typeId_common3'),
                        'available_common' => $this->input->post('available_common'),
                        'price_common' => $this->input->post('price_common'),
                        'fmv_common' => $this->input->post('fmv_common'),
                        'mls_common' => $this->input->post('mls_common'),
                        'status_common' => $this->input->post('status_common'),
                        'tax_common' => $this->input->post('tax_common'),
                        'noi_common' => $this->input->post('noi_common'),
                        'goi_common' => $this->input->post('goi_common'),
                        'occupancy_common' => $this->input->post('occupancy_common'),
                        'opExpenses_common' => $this->input->post('opExpenses_common'),
                        'sqFeet_common' => $this->input->post('sqFeet_common'),
                        'numFloors_common' => $this->input->post('numFloors_common'),
                        'trafficCount_common' => $this->input->post('trafficCount_common'),
                        'yearBuilt_common' => $this->input->post('yearBuilt_common'),
                        'parkingRatio_common' => $this->input->post('parkingRatio_common'),
                        'parkingSpaces_common' => $this->input->post('parkingSpaces_common'),
                        'numUnits_common' => $this->input->post('numUnits_common'),
                        'dockDoors_common' => $this->input->post('dockDoors_common'),
                        'gradeDoors_common' => $this->input->post('gradeDoors_common'),
                        'tax_common' => $this->input->post('tax_common'),
                        'lotSize_common' => $this->input->post('lotSize_common'),
                        'useAcreage_common' => $this->input->post('useAcreage_common'),
                        'zoning_common' => $this->input->post('zoning_common'),
                        'class_common' => $this->input->post('class_common'),
                        'lawnSprinklers_common' => $this->input->post('lawnSprinklers_common'),
                        'courtyard_common' => $this->input->post('courtyard_common'),
                        'fenced_common' => $this->input->post('fenced_common'),
                        'cranes_common' => $this->input->post('cranes_common'),
                        'railYard_common' => $this->input->post('railYard_common'),
                        'title_common' => $this->input->post('title_common'),
                        'description_common' => $this->input->post('description_common'),
                    ];
                    $res1 = $this->admin_model->addComPropertyCommon($form_data, $forsale_val, $com_sale_ext, $rnd_id);

                    if ($_FILES['filetoupload_com_sale_inte']['name']) {
                        $k = 0;
                        foreach ($_FILES['filetoupload_com_sale_inte']['name'] as $f_names) {
                            $new_name_int[] = 'int_'.$rnd_id.'-'.$k.'-'.preg_replace('/\s+/', '', $f_names);
                            ++$k;
                        }
                        $com_sale_int = implode(',', $new_name_int);

                        $config['upload_path'] = './uploads/';
                        $config['allowed_types'] = 'gif|jpg|png|jpeg';
                        $this->load->library('upload');

                        $files = $_FILES;
                        $cpt = count($new_name_int);
                        for ($i = 0; $i < $cpt; ++$i) {
                            $_FILES['filetoupload_com_sale_inte']['name'] = $new_name_int[$i];
                            $_FILES['filetoupload_com_sale_inte']['type'] = $files['filetoupload_com_sale_inte']['type'][$i];
                            $_FILES['filetoupload_com_sale_inte']['tmp_name'] = $files['filetoupload_com_sale_inte']['tmp_name'][$i];
                            $_FILES['filetoupload_com_sale_inte']['error'] = $files['filetoupload_com_sale_inte']['error'][$i];
                            $_FILES['filetoupload_com_sale_inte']['size'] = $files['filetoupload_com_sale_inte']['size'][$i];

                            $this->upload->initialize($config);
                            //$this->upload->do_upload();
                            if (!$this->upload->do_upload('filetoupload_com_sale_inte')) {
                                $error = ['error' => $this->upload->display_errors()];
                                //print_r($error);exit;
                                echo "<script language='javascript'>alert('upload failed');</script>";
                                // 				redirect('admin/propAdd');
                            }
                        }
                    }
                    $to_db_arr = ['title' => $this->input->post('intefloortitle_com_sale'),
                        'description' => $this->input->post('intedescription_com_sale'),
                        'typeId' => $typeId_val,
                        'typeId2' => $this->input->post('typeId2_com_sale_inte'),
                        'typeId3' => $this->input->post('typeId3_com_sale_inte'),
                        'available' => $this->input->post('available_com_sale_inte'),
                        'leasetype' => $this->input->post('leaseType_com_sale_inte'),
                        'leaseTerm' => $this->input->post('leaseTerm_com_sale_inte'),
                        'leaseDuration' => $this->input->post('leaseDuration_com_sale_inte'),
                        'subleasedate' => $this->input->post('subleaseDate_com_sale_inte'),
                        'sqfeet' => $this->input->post('sqFeet_com_sale_inte'),
                        'suite' => $this->input->post('suite_com_sale_inte'),
                        'numfloors' => $this->input->post('numFloors_com_sale_inte'),
                        'mindivisible' => $this->input->post('minDivisible_com_sale_inte'),
                        'maxcontiguous' => $this->input->post('maxContiguous_com_sale_inte'),
                        'procurement' => $this->input->post('procurementFee_com_sale_inte'),
                        'power' => $this->input->post('power_com_sale_inte'),
                        'ceilingheight' => $this->input->post('ceilingHeight_com_sale_inte'),
                        'officespace' => $this->input->post('officeSpace_com_sale_inte'),
                        'heating' => $this->input->post('inteheating_com_sale_inte'),
                        'lighting' => $this->input->post('lighting_com_sale_inte'),
                        'internet' => $this->input->post('internet_com_sale_inte'),
                        'wheelchair' => $this->input->post('wheelchair_com_sale_inte'),
                        'sprinklers' => $this->input->post('fireSprinklers_com_sale_inte'),
                        'forSale' => $forsale_val,
                        'datePosted' => date('Y-m-d'),
                    ];
                    $res2 = $this->admin_model->addComSaleInterior($to_db_arr, $forsale_val, $com_sale_int, $rnd_id);
                } else {
                    if ($_FILES['filetoupload_common']['name']) {
                        $c = 0;
                        foreach ($_FILES['filetoupload_common']['name'] as $f_names) {
                            $new_name[] = 'ext_'.$rnd_id.'-'.$c.'-'.preg_replace('/\s+/', '', $f_names);
                            ++$c;
                        }
                        $com_sale_ext = implode(',', $new_name);

                        $config['upload_path'] = './uploads/';
                        $config['allowed_types'] = 'gif|jpg|png|jpeg';
                        $this->load->library('upload');

                        $files = $_FILES;
                        $cpt = count($new_name);
                        for ($i = 0; $i < $cpt; ++$i) {
                            $_FILES['filetoupload_common']['name'] = $new_name[$i];
                            $_FILES['filetoupload_common']['type'] = $files['filetoupload_common']['type'][$i];
                            $_FILES['filetoupload_common']['tmp_name'] = $files['filetoupload_common']['tmp_name'][$i];
                            $_FILES['filetoupload_common']['error'] = $files['filetoupload_common']['error'][$i];
                            $_FILES['filetoupload_common']['size'] = $files['filetoupload_common']['size'][$i];

                            $this->upload->initialize($config);
                            //$this->upload->do_upload();
                            if (!$this->upload->do_upload('filetoupload_common')) {
                                $error = ['error' => $this->upload->display_errors()];
                                //print_r($error);exit;
                                echo "<script language='javascript'>alert('upload failed');</script>";
                                // 				redirect('admin/propAdd');
                            }
                        }
                    }
                    $form_data = [
                        'uniqid' => $rnd_id,
                        'forSale' => $forsale_val,
                        'typeId' => $this->input->post('typeId'),
                        'street1_common' => $this->input->post('street1_common'),
                        'street2_common' => $this->input->post('street2_common'),
                        'city_common' => $this->input->post('city_common'),
                        'state_common' => $this->input->post('state_common'),
                        'zip_common' => $this->input->post('zip_common'),
                        'longitude' => $log,
                        'latitude' => $lat,
                        'typeId' => $typeId_val,
                        'typeId_common2' => $this->input->post('typeId_common2'),
                        'typeId_common3' => $this->input->post('typeId_common3'),
                        'available_common' => $this->input->post('available_common'),
                        'price_common' => $this->input->post('price_common'),
                        'fmv_common' => $this->input->post('fmv_common'),
                        'mls_common' => $this->input->post('mls_common'),
                        'status_common' => $this->input->post('status_common'),
                        'tax_common' => $this->input->post('tax_common'),
                        'noi_common' => $this->input->post('noi_common'),
                        'goi_common' => $this->input->post('goi_common'),
                        'occupancy_common' => $this->input->post('occupancy_common'),
                        'opExpenses_common' => $this->input->post('opExpenses_common'),
                        'sqFeet_common' => $this->input->post('sqFeet_common'),
                        'numFloors_common' => $this->input->post('numFloors_common'),
                        'trafficCount_common' => $this->input->post('trafficCount_common'),
                        'yearBuilt_common' => $this->input->post('yearBuilt_common'),
                        'parkingRatio_common' => $this->input->post('parkingRatio_common'),
                        'parkingSpaces_common' => $this->input->post('parkingSpaces_common'),
                        'numUnits_common' => $this->input->post('numUnits_common'),
                        'dockDoors_common' => $this->input->post('dockDoors_common'),
                        'gradeDoors_common' => $this->input->post('gradeDoors_common'),
                        'tax_common' => $this->input->post('tax_common'),
                        'lotSize_common' => $this->input->post('lotSize_common'),
                        'useAcreage_common' => $this->input->post('useAcreage_common'),
                        'zoning_common' => $this->input->post('zoning_common'),
                        'class_common' => $this->input->post('class_common'),
                        'lawnSprinklers_common' => $this->input->post('lawnSprinklers_common'),
                        'courtyard_common' => $this->input->post('courtyard_common'),
                        'fenced_common' => $this->input->post('fenced_common'),
                        'cranes_common' => $this->input->post('cranes_common'),
                        'railYard_common' => $this->input->post('railYard_common'),
                        'title_common' => $this->input->post('title_common'),
                        'description_common' => $this->input->post('description_common'),
                    ];
                    $res1 = $this->admin_model->addComPropertyCommon($form_data, $forsale_val, $com_sale_ext, $rnd_id);
                    $res2 = 1;
                }
            }
        } elseif ('2' == $forsale_val) {
            if (53 == $typeId_val || 55 == $typeId_val || 54 == $typeId_val || 60 == $typeId_val || 63 == $typeId_val || 62 == $typeId_val || 61 == $typeId_val || 77 == $typeId_val || 76 == $typeId_val || 78 == $typeId_val) {
                $result['loc'] = $this->admin_model->getLatLog($this->input->post('zip_rent'));
                foreach ($result['loc'] as $lo) {
                    $log = $lo->longitude;
                    $lat = $lo->latitude;
                }
                $config['upload_path'] = './uploads/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                if ($_FILES['filetoupload_rent']['name']) {
                    $c = 0;
                    foreach ($_FILES['filetoupload_rent']['name'] as $f_names) {
                        $new_name[] = 'ext_'.$rnd_id.'-'.$c.'-'.preg_replace('/\s+/', '', $f_names);
                        ++$c;
                    }
                    $rent_ext = implode(',', $new_name);
                    $this->load->library('upload');

                    $files = $_FILES;
                    $cpt = count($new_name);
                    for ($i = 0; $i < $cpt; ++$i) {
                        $_FILES['filetoupload_rent']['name'] = $new_name[$i];
                        $_FILES['filetoupload_rent']['type'] = $files['filetoupload_rent']['type'][$i];
                        $_FILES['filetoupload_rent']['tmp_name'] = $files['filetoupload_rent']['tmp_name'][$i];
                        $_FILES['filetoupload_rent']['error'] = $files['filetoupload_rent']['error'][$i];
                        $_FILES['filetoupload_rent']['size'] = $files['filetoupload_rent']['size'][$i];
                        $this->upload->initialize($config);
                        //$this->upload->do_upload();
                        if (!$this->upload->do_upload('filetoupload_rent')) {
                            $error = ['error' => $this->upload->display_errors()];
                            // print_r($error);exit;
                            echo "<script language='javascript'>alert('upload failed');</script>";
                            // 				redirect('admin/propAdd');
                        }
                    }
                }
                $form_data = [
                    'uniqid' => $rnd_id,
                    'forSale' => $forsale_val,
                    'typeId' => $typeId_val,
                    'street1_rent' => $this->input->post('street1_rent'),
                    'elemSchool_rent' => $this->input->post('elemSchool_rent'),
                    'street2_rent' => $this->input->post('street2_rent'),
                    'midSchool_rent' => $this->input->post('midSchool_rent'),
                    'city_rent' => $this->input->post('city_rent'),
                    'highSchool_rent' => $this->input->post('highSchool_rent'),
                    'state_rent' => $this->input->post('state_rent'),
                    'zip_rent' => $this->input->post('zip_rent'),
                    'longitude' => $log,
                    'latitude' => $lat,
                    'neighborhood_rent' => $this->input->post('neighborhood_rent'),
                    'tpGas_rent' => $this->input->post('tpGas_rent'),
                    'tpElectricity_rent' => $this->input->post('tpElectricity_rent'),
                    'tpWater_rent' => $this->input->post('tpWater_rent'),
                    'tpCable_rent' => $this->input->post('tpCable_rent'),
                    'tpTrash_rent' => $this->input->post('tpTrash_rent'),
                    'pets_rent' => $this->input->post('pets_rent'),
                    'section8_rent' => $this->input->post('section8_rent'),
                    'fitness_rent' => $this->input->post('fitness_rent'),
                    'spa_rent' => $this->input->post('spa_rent'),
                    'sports_rent' => $this->input->post('sports_rent'),
                    'tennis_rent' => $this->input->post('tennis_rent'),
                    'bikePath_rent' => $this->input->post('bikePath_rent'),
                    'boating_rent' => $this->input->post('boating_rent'),
                    'courtyard_rent' => $this->input->post('courtyard_rent'),
                    'playground_rent' => $this->input->post('playground_rent'),
                    'clubhouse_rent' => $this->input->post('clubhouse_rent'),
                    'publicTrans_rent' => $this->input->post('publicTrans_rent'),
                    'waterfront_rent' => $this->input->post('waterfront_rent'),
                    'golfCourse_rent' => $this->input->post('golfCourse_rent'),
                    'commPool_rent' => $this->input->post('commPool_rent'),
                    'lawnSprinklers_rent' => $this->input->post('lawnSprinklers_rent'),
                    'fenced_rent' => $this->input->post('fenced_rent'),
                    'pool_rent' => $this->input->post('pool_rent'),
                    'associationFee_rent' => $this->input->post('associationFee_rent'),
                    'groundLease_rent' => $this->input->post('groundLease_rent'),
                    'leaseOp_rent' => $this->input->post('leaseOp_rent'),
                    'available_rent' => $this->input->post('available_rent'),
                    'sqFeet_rent' => $this->input->post('sqFeet_rent'),
                    'appFee_rent' => $this->input->post('appFee_rent'),
                    'deposit_rent' => $this->input->post('deposit_rent'),
                    'lotSize_rent' => $this->input->post('lotSize_rent'),
                    'useAcreage_rent' => $this->input->post('useAcreage_rent'),
                    'zoning_rent' => $this->input->post('zoning_rent'),
                    'yearBuilt_rent' => $this->input->post('yearBuilt_rent'),
                    'parkingSpaces_rent' => $this->input->post('parkingSpaces_rent'),
                    'garageSize_rent' => $this->input->post('garageSize_rent'),
                    'petPolicy_rent' => $this->input->post('petPolicy_rent'),
                    'title_rent' => $this->input->post('title_rent'),
                    'description_rent' => $this->input->post('description_rent'),
                ];
                $res1 = $this->admin_model->addResProperty($form_data, $forsale_val, $rent_ext, $rnd_id);

                if ($_FILES['filetoupload_rent_inte']['name']) {
                    $k = 1;
                    foreach ($_FILES['filetoupload_rent_inte']['name'] as $rent_inte_name) {
                        $new_rent_inte[] = 'int_'.$rnd_id.'-'.$k.'-'.preg_replace('/\s+/', '', $rent_inte_name);
                        ++$k;
                    }
                    $rent_inte = implode(',', $new_rent_inte);
                    $this->load->library('upload');
                    $files_inte_rent = $_FILES;
                    $cpt = count($new_rent_inte);
                    for ($i = 0; $i < $cpt; ++$i) {
                        $_FILES['filetoupload_rent_inte']['name'] = $new_rent_inte[$i];
                        $_FILES['filetoupload_rent_inte']['type'] = $files_inte_rent['filetoupload_rent_inte']['type'][$i];
                        $_FILES['filetoupload_rent_inte']['tmp_name'] = $files_inte_rent['filetoupload_rent_inte']['tmp_name'][$i];
                        $_FILES['filetoupload_rent_inte']['error'] = $files_inte_rent['filetoupload_rent_inte']['error'][$i];
                        $_FILES['filetoupload_rent_inte']['size'] = $files_inte_rent['filetoupload_rent_inte']['size'][$i];

                        $this->upload->initialize($config);
                        //$this->upload->do_upload();
                        if (!$this->upload->do_upload('filetoupload_rent_inte')) {
                            $error = ['error' => $this->upload->display_errors()];
                            // print_r($error);exit;
                            echo "<script language='javascript'>alert('upload failed');</script>";
                            //redirect('admin/propAdd');
                        }
                    }
                }
                $form_data2 = [
                    'floortitle' => $this->input->post('intefloortitle_rent'),
                    'intetype' => $this->input->post('intetype_rent'),
                    'intedescription' => $this->input->post('intedescription_rent'),
                    'wdIncluded_rent' => $this->input->post('wdIncluded_rent'),
                    'wdConnections_rent' => $this->input->post('wdConnections_rent'),
                    'carpeted' => $this->input->post('intecarpeted_rent'),
                    'disposal' => $this->input->post('intedisposal_rent'),
                    'gasStove' => $this->input->post('integasStove_rent'),
                    'hardwood' => $this->input->post('intehardwood_rent'),
                    'patio' => $this->input->post('intepatio_rent'),
                    'alarm' => $this->input->post('intealarm_rent'),
                    'cable' => $this->input->post('intecable_rent'),
                    'dishwasher' => $this->input->post('intedishwasher_rent'),
                    'fireplace' => $this->input->post('intefireplace_rent'),
                    'balcony' => $this->input->post('intebalcony_rent'),
                    'waterfront' => $this->input->post('intewaterfront_rent'),
                    'wheelchair' => $this->input->post('intewheelchair_rent'),
                    'microwave' => $this->input->post('intemicrowave_rent'),
                    'refrig' => $this->input->post('interefrig_rent'),
                    'centralAir' => $this->input->post('intecentralAir_rent'),
                    'vaulted' => $this->input->post('intevaulted_rent'),
                    'internet' => $this->input->post('inteinternet_rent'),
                    'available' => $this->input->post('inteavailable_rent'),
                    'sqFeet' => $this->input->post('intesqFeet_rent'),
                    'intewindowUnits_rent' => $this->input->post('intewindowUnits_rent'),
                    'intedeposit_rent' => $this->input->post('intedeposit_rent'),
                    'beds' => $this->input->post('intebeds_rent'),
                    'baths' => $this->input->post('intebaths_rent'),
                    'numFloors' => $this->input->post('intenumFloors_rent'),
                    'heating' => $this->input->post('inteheating_rent'),
                    'price' => $this->input->post('inteprice_rent'),
                    'forSale' => $forsale_val,
                ];
                $res2 = $this->admin_model->addPropInterior($form_data2, $forsale_val, $rent_inte, $rnd_id);
            } elseif (57 == $typeId_val || 56 == $typeId_val || 67 == $typeId_val) {
                $result['loc'] = $this->admin_model->getLatLog($this->input->post('zip_rent_diff'));
                foreach ($result['loc'] as $lo) {
                    $log = $lo->longitude;
                    $lat = $lo->latitude;
                }
                if ($_FILES['filetoupload_rent_diff']['name']) {
                    $config['upload_path'] = './uploads/';
                    $config['allowed_types'] = 'gif|jpg|png|jpeg';
                    $c = 0;
                    foreach ($_FILES['filetoupload_rent_diff']['name'] as $f_names) {
                        $new_name[] = 'ext_'.$rnd_id.'-'.$c.'-'.preg_replace('/\s+/', '', $f_names);
                        ++$c;
                    }
                    $diff_rent_ext = implode(',', $new_name);
                    $this->load->library('upload');

                    $files = $_FILES;
                    $cpt = count($new_name);
                    for ($i = 0; $i < $cpt; ++$i) {
                        $_FILES['filetoupload_rent_diff']['name'] = $new_name[$i];
                        $_FILES['filetoupload_rent_diff']['type'] = $files['filetoupload_rent_diff']['type'][$i];
                        $_FILES['filetoupload_rent_diff']['tmp_name'] = $files['filetoupload_rent_diff']['tmp_name'][$i];
                        $_FILES['filetoupload_rent_diff']['error'] = $files['filetoupload_rent_diff']['error'][$i];
                        $_FILES['filetoupload_rent_diff']['size'] = $files['filetoupload_rent_diff']['size'][$i];

                        $this->upload->initialize($config);
                        //$this->upload->do_upload();
                        if (!$this->upload->do_upload('filetoupload_rent_diff')) {
                            $error = ['error' => $this->upload->display_errors()];
                            //print_r($error);exit;
                            echo "<script language='javascript'>alert('upload failed');</script>";
                            //redirect('admin/propAdd');
                        }
                    }
                }
                $insert_data = [
                    'title' => $this->input->post('title_rent_diff'),
                    'uniqueId' => $rnd_id,
                    'address' => $this->input->post('street1_rent_diff'),
                    'address2' => $this->input->post('street2_rent_diff'),
                    'localityId' => '',
                    'city' => $this->input->post('city_rent_diff'),
                    'provinceId' => '',
                    'state' => $this->input->post('state_rent_diff'),
                    'postalcodeId' => '',
                    'zip' => $this->input->post('zip_rent_diff'),
                    'loc_match' => '',
                    'longitude' => $log,
                    'latitude' => $lat,
                    //'price'=>$form_data['price'],
                    'description' => $this->input->post('description_rent_diff'),
                    'typeId' => $typeId_val, //$form_data['typeId'],
                    /*'typeId2'=>'',//$form_data['typeId2'],
                    'typeId3'=>'',//$form_data['typeId3'],
                    'beds'=>'',//$form_data['beds'],
                    'baths'=>'',//$form_data['baths'],*/
                    'datePosted' => date('Y-m-d'),
                    'neighborhood' => $this->input->post('neighborhood_rent_diff'),
                    'waterfront' => $this->input->post('waterfront_rent_diff'),
                    'yearbuilt' => $this->input->post('yearBuilt_rent_diff'),
                    'garagesize' => $this->input->post('garageSize_rent_diff'),
                    'tpgas' => $this->input->post('tpGas_rent_diff'),
                    'tpelectricity' => $this->input->post('tpElectricity_rent_diff'),
                    'tpwater' => $this->input->post('tpWater_rent_diff'),
                    'tpcable' => $this->input->post('tpCable_rent_diff'),
                    'tptrash' => $this->input->post('tpTrash_rent_diff'),
                    'sec8' => $this->input->post('section8_rent_diff'),
                    'secdep' => $this->input->post('deposit_rent_diff'),
                    'pets' => $this->input->post('pets_rent_diff'),
                    'appFee' => $this->input->post['appFee_rent_diff'],
                    'elemSchool' => $this->input->post('elemSchool_rent_diff'),
                    'midSchool' => $this->input->post('midSchool_rent_diff'),
                    'highSchool' => $this->input->post('highSchool_rent'),
                    'fitness' => $this->input->post('fitness_rent_diff'),
                    'golf' => $this->input->post('golfCourse_rent_diff'),
                    'spa' => $this->input->post('spa_rent_diff'),
                    'sports' => $this->input->post('sports_rent_diff'),
                    'tennis' => $this->input->post('tennis_rent_diff'),
                    'bikePath' => $this->input->post('bikePath_rent_diff'),
                    'boating' => $this->input->post('boating_rent_diff'),
                    'courtyard' => $this->input->post('courtyard_rent_diff'),
                    'playground' => $this->input->post('playground_rent_diff'),
                    'clubhouse' => $this->input->post('clubhouse_rent_diff'),
                    'gated' => $this->input->post('gated_rent_diff'),
                    'publicTrans' => $this->input->post('publicTrans_rent_diff'),
                    'uId' => $this->session->userdata('id'),
                    'uSite' => '',
                    'forSale' => $forsale_val,
                    'onSiteLaundry' => $this->input->post('laundry_rent_diff'),
                    'slogan' => $this->input->post('aptSlogan_rent_diff'),
                    'email' => $this->input->post('email_rent_diff'),
                    'phone' => $this->input->post('phone_rent_diff'),
                    'fax' => $this->input->post('fax_rent_diff'),
                    'commPool' => $this->input->post('commPool_rent_diff'),
                    'parkingSpaces' => $this->input->post('parkingSpaces_rent_diff'),
                    'lawnSprinklers' => $this->input->post('lawnSprinklers_rent_diff'),
                    'fenced' => $this->input->post('fenced_rent_diff'),
                    'available' => $this->input->post('available_rent_diff'),
                    'numUnits' => $this->input->post('numUnits_rent_diff'),
                    'contactPhone' => $this->session->userdata('number'),
                    'contactEmail' => $this->session->userdata('email'),
                    'contactName' => $this->session->userdata('fullname'),
                ];
                $res1 = $this->admin_model->addResComplex($insert_data, $forsale_val, $diff_rent_ext, $rnd_id);
                if ($_FILES['filetoupload_diffrent_inte']['name']) {
                    $k = 1;
                    foreach ($_FILES['filetoupload_diffrent_inte']['name'] as $diff_rent_inte_name) {
                        $new_rent_inte[] = 'int_'.$rnd_id.'-'.$k.'-'.preg_replace('/\s+/', '', $diff_rent_inte_name);
                        ++$k;
                    }
                    $diff_rent__inte = implode(',', $new_rent_inte);
                    $this->load->library('upload');

                    $files_diff_rent = $_FILES;
                    $cpt = count($new_rent_inte);
                    for ($i = 0; $i < $cpt; ++$i) {
                        $_FILES['filetoupload_diffrent_inte']['name'] = $new_rent_inte[$i];
                        $_FILES['filetoupload_diffrent_inte']['type'] = $files_diff_rent['filetoupload_diffrent_inte']['type'][$i];
                        $_FILES['filetoupload_diffrent_inte']['tmp_name'] = $files_diff_rent['filetoupload_diffrent_inte']['tmp_name'][$i];
                        $_FILES['filetoupload_diffrent_inte']['error'] = $files_diff_rent['filetoupload_diffrent_inte']['error'][$i];
                        $_FILES['filetoupload_diffrent_inte']['size'] = $files_diff_rent['filetoupload_diffrent_inte']['size'][$i];

                        $this->upload->initialize($config);
                        //$this->upload->do_upload();
                        if (!$this->upload->do_upload('filetoupload_diffrent_inte')) {
                            $error = ['error' => $this->upload->display_errors()];
                            //print_r($error);exit;
                            echo "<script language='javascript'>alert('upload failed');</script>";
                            //redirect('admin/propAdd');
                        }
                    }
                }
                $data_insert = [
                    'title' => $this->input->post('intefloortitle_rent_dff'),
                    'description' => $this->input->post('intedescription_rent_dff'),
                    'beds' => $this->input->post('intebeds_rent_dff'),
                    'typeId' => $this->input->post('intetype_rent_dff'),
                    'baths' => $this->input->post('intebaths_rent_dff'),
                    'air' => $this->input->post('intecentralAir_rent'),
                    'alarm' => $this->input->post('intealarm_rent_dff'),
                    'balcony' => $this->input->post('intebalcony_rent'),
                    'cable' => $this->input->post('intecable_rent_dff'),
                    'carpeted' => $this->input->post('intecarpeted_rent_dff'),
                    'dishwasher' => $this->input->post('intedishwasher_rent_dff'),
                    'disposal' => $this->input->post('intedisposal_rent_dff'),
                    'fireplace' => $this->input->post('intefireplace_rent_dff'),
                    'gasstove' => $this->input->post('integasStove_rent_dff'),
                    'hardwood' => $this->input->post('intehardwood_rent_dff'),
                    'microwave' => $this->input->post('intemicrowave_rent_dff'),
                    'patio' => $this->input->post('intepatio_rent_dff'),
                    'wdIncluded' => $this->input->post('wdIncluded_rent_dff'),
                    'wdConnections' => $this->input->post('wdConnections_rent_dff'),
                    'secDep' => $this->input->post('intedeposit_rent_dff'),
                    'windowUnits' => $this->input->post('intewindowUnits_rent_dff'),
                    'wheelchair' => $this->input->post('intewheelchair_rent_dff'),
                    'refrig' => $this->input->post('interefrig_rent_dff'),
                    'internet' => $this->input->post('inteinternet_rent_dff'),
                    'numfloors' => $this->input->post('intenumFloors_rent_dff'),
                    'available' => $this->input->post('inteavailable_rent_dff'),
                    'sqfeet' => $this->input->post('intesqFeet_rent_dff'),
                    'price' => $this->input->post('inteprice_rent_dff'),
                    'vaulted' => $this->input->post('intevaulted_rent_dff'),
                    'heating' => $this->input->post('inteheating_rent_dff'),
                    'forSale' => $forsale_val,
                    'datePosted' => date('Y-m-d'),
                ];

                $res2 = $this->admin_model->addResComplexInterior($data_insert, $forsale_val, $diff_rent__inte, $rnd_id);
            } else {
                $result['loc'] = $this->admin_model->getLatLog($this->input->post('zip_rent_common'));
                foreach ($result['loc'] as $lo) {
                    $log = $lo->longitude;
                    $lat = $lo->latitude;
                }

                if (15 == $typeId_val || 16 == $typeId_val || 12 == $typeId_val || 17 == $typeId_val || 18 == $typeId_val || 64 == $typeId_val || 13 == $typeId_val || 14 == $typeId_val ||
                    22 == $typeId_val || 23 == $typeId_val || 21 == $typeId_val || 24 == $typeId_val || 30 == $typeId_val || 93 == $typeId_val || 65 == $typeId_val || 32 == $typeId_val ||
                    32 == $typeId_val || 29 == $typeId_val || 31 == $typeId_val || 28 == $typeId_val || 27 == $typeId_val || 25 == $typeId_val || 26 == $typeId_val || 66 == $typeId_val ||
                    33 == $typeId_val || 96 == $typeId_val || 95 == $typeId_val || 94 == $typeId_val || 34 == $typeId_val || 97 == $typeId_val || 35 == $typeId_val ||
                    80 == $typeId_val || 20 == $typeId_val || 19 == $typeId_val || 81 == $typeId_val || 79 == $typeId_val || 41 == $typeId_val || 39 == $typeId_val || 36 == $typeId_val ||
                    43 == $typeId_val || 38 == $typeId_val || 40 == $typeId_val || 44 == $typeId_val || 42 == $typeId_val || 37 == $typeId_val) {
                    if ($_FILES['filetoupload_rent_common']['name']) {
                        $config['upload_path'] = './uploads/';
                        $config['allowed_types'] = 'gif|jpg|png|jpeg';
                        /*$config['max_size']	= '1000';
                            $config['max_width']  = '1024';
                        */

                        $c = 0;
                        foreach ($_FILES['filetoupload_rent_common']['name'] as $f_names) {
                            $new_name[] = 'ext_'.$rnd_id.'-'.$c.'-'.preg_replace('/\s+/', '', $f_names);
                            ++$c;
                        }
                        $com_rent_ext = implode(',', $new_name);
                        $this->load->library('upload');

                        $files = $_FILES;
                        $cpt = count($new_name);
                        for ($i = 0; $i < $cpt; ++$i) {
                            $_FILES['filetoupload_rent_common']['name'] = $new_name[$i];
                            $_FILES['filetoupload_rent_common']['type'] = $files['filetoupload_rent_common']['type'][$i];
                            $_FILES['filetoupload_rent_common']['tmp_name'] = $files['filetoupload_rent_common']['tmp_name'][$i];
                            $_FILES['filetoupload_rent_common']['error'] = $files['filetoupload_rent_common']['error'][$i];
                            $_FILES['filetoupload_rent_common']['size'] = $files['filetoupload_rent_common']['size'][$i];

                            $this->upload->initialize($config);
                            //$this->upload->do_upload();
                            if (!$this->upload->do_upload('filetoupload_rent_common')) {
                                $error = ['error' => $this->upload->display_errors()];
                                //print_r($error);exit;
                                echo "<script language='javascript'>alert('upload failed');</script>";
                                // 				redirect('admin/propAdd');
                            }
                        }
                    }
                    $insert_data = [
                        'title' => $this->input->post('title_rent_common'),
                        'uniqueId' => $rnd_id,
                        'address' => $this->input->post('street1_rent_common'),
                        'address2' => $this->input->post('street2_rent_common'),
                        'localityId' => '',
                        'city' => $this->input->post('city_rent_common'),
                        'provinceId' => '',
                        'state' => $this->input->post('state_rent_common'),
                        'postalcodeId' => '',
                        'zip' => $this->input->post('zip_rent_common'),
                        'loc_match' => '',
                        'longitude' => $log,
                        'latitude' => $lat,
                        'price' => $this->input->post('price_rent_common'),
                        'rentType' => $this->input->post('rentType_rent_common'),
                        'leaseType' => $this->input->post('leaseType_rent_common'),
                        'leaseTerm' => $this->input->post('leaseTerm_rent_common'),
                        'procurement' => $this->input->post('procurementFee_rent_common'),
                        'leaseDuration' => $this->input->post('leaseDuration_rent_common'),
                        'description' => $this->input->post('description_rent_common'),
                        'typeId' => $typeId_val,
                        'typeId2' => $this->input->post('typeId2_rent_common'),
                        'typeId3' => $this->input->post('typeId3_rent_common'),
                        'datePosted' => date('Y-m-d'),
                        'lotsize' => $this->input->post('lotSize_rent_common'),
                        'useAcreage' => $this->input->post('useAcreage_rent_common'),
                        'trafficcount' => $this->input->post('trafficCount_rent_common'),
                        'zoning' => $this->input->post('zoning_rent_common'),
                        'available' => $this->input->post('available_rent_common'),
                        'uId' => $this->session->userdata('id'),
                        'uSite' => '',
                        'forSale' => $forsale_val,
                        'tax' => $this->input->post('tax_rent_common'),
                        'contactPhone' => $this->session->userdata('number'),
                        'contactEmail' => $this->session->userdata('email'),
                        'contactName' => $this->session->userdata('fullname'),
                        'lawnSprinklers' => $this->input->post('lawnSprinklers_rent_common'),
                        'courtyard' => $this->input->post('courtyard_rent_common'),
                        'fenced' => $this->input->post('fenced_rent_common'),
                        'opExpenses' => $this->input->post('opExpenses_rent_common'),
                        'cranes' => $this->input->post('cranes_rent_common'),
                        'rail' => $this->input->post('railYard_rent_common'),
                    ];
                    $res1 = $this->admin_model->addComPropertyCommon($insert_data, $forsale_val, $com_rent_ext, $rnd_id);

                    if ($_FILES['filetoupload_com_rent_inte']['name']) {
                        $k = 0;
                        foreach ($_FILES['filetoupload_com_rent_inte']['name'] as $f_names) {
                            $new_name_intes[] = 'int_'.$rnd_id.'-'.$k.'-'.preg_replace('/\s+/', '', $f_names);
                            ++$k;
                        }
                        $com_rent_inte = implode(',', $new_name_intes);

                        $conf['upload_path'] = './uploads/';
                        $conf['allowed_types'] = 'gif|jpg|png|jpeg';
                        $this->load->library('upload');

                        $filess = $_FILES;
                        $cpt = count($new_name_intes);
                        for ($i = 0; $i < $cpt; ++$i) {
                            $_FILES['filetoupload_com_rent_inte']['name'] = $new_name_intes[$i];
                            $_FILES['filetoupload_com_rent_inte']['type'] = $filess['filetoupload_com_rent_inte']['type'][$i];
                            $_FILES['filetoupload_com_rent_inte']['tmp_name'] = $filess['filetoupload_com_rent_inte']['tmp_name'][$i];
                            $_FILES['filetoupload_com_rent_inte']['error'] = $filess['filetoupload_com_rent_inte']['error'][$i];
                            $_FILES['filetoupload_com_rent_inte']['size'] = $filess['filetoupload_com_rent_inte']['size'][$i];

                            $this->upload->initialize($conf);
                            //$this->upload->do_upload();
                            if (!$this->upload->do_upload('filetoupload_com_rent_inte')) {
                                $error = ['error' => $this->upload->display_errors()];
                                //print_r($error);exit;
                                echo "<script language='javascript'>alert('upload failed');</script>";
                                // 				redirect('admin/propAdd');
                            }
                        }
                    }
                    $to_db_arr = ['title' => $this->input->post('intefloortitle_com_sale'),
                        'description' => $this->input->post('intedescription_com_sale'),
                        'typeId' => $typeId_val,
                        'typeId2' => $this->input->post('typeId2_com_rent_inte'),
                        'typeId3' => $this->input->post('typeId3_com_rent_inte'),
                        'available' => $this->input->post('available_com_rent_inte'),
                        'leasetype' => $this->input->post('leaseType_com_rent_inte'),
                        'leaseTerm' => $this->input->post('leaseTerm_com_rent_inte'),
                        'leaseDuration' => $this->input->post('leaseDuration_com_rent_inte'),
                        'subleasedate' => $this->input->post('subleaseDate_com_rent_inte'),
                        'sqfeet' => $this->input->post('sqFeet_com_rent_inte'),
                        'suite' => $this->input->post('suite_com_rent_inte'),
                        'numfloors' => $this->input->post('numFloors_com_rent_inte'),
                        'mindivisible' => $this->input->post('minDivisible_com_rent_inte'),
                        'maxcontiguous' => $this->input->post('maxContiguous_com_rent_inte'),
                        'procurement' => $this->input->post('procurementFee_com_rent_inte'),
                        'power' => $this->input->post('power_com_rent_inte'),
                        'ceilingheight' => $this->input->post('ceilingHeight_com_rent_inte'),
                        'officespace' => $this->input->post('officeSpace_com_rent_inte'),
                        'heating' => $this->input->post('inteheating_com_rent_inte'),
                        'lighting' => $this->input->post('lighting_com_rent_inte'),
                        'internet' => $this->input->post('internet_com_rent_inte'),
                        'wheelchair' => $this->input->post('wheelchair_com_rent_inte'),
                        'sprinklers' => $this->input->post('fireSprinklers_com_rent_inte'),
                        'forSale' => $forsale_val,
                        'price' => $this->input->post('price_com_rent_inte'),
                        'rentType' => $this->input->post('rentType_com_rent_inte'),
                        'datePosted' => date('Y-m-d'),
                    ];
                    /*echo "<pre>";
                    print_r($to_db_arr);exit();*/
                    $res2 = $this->admin_model->addComSaleInterior($to_db_arr, $forsale_val, $com_rent_inte, $rnd_id);
                } else {
                    $config['upload_path'] = './uploads/';
                    $config['allowed_types'] = 'gif|jpg|png|jpeg';
                    /*$config['max_size']	= '1000';
                        $config['max_width']  = '1024';
                    */
                    if ($_FILES['filetoupload_rent_common']['name']) {
                        $c = 0;
                        foreach ($_FILES['filetoupload_rent_common']['name'] as $f_names) {
                            $new_name[] = 'ext_'.$rnd_id.'-'.$c.'-'.preg_replace('/\s+/', '', $f_names);
                            ++$c;
                        }
                        $com_rent_ext = implode(',', $new_name);
                        $this->load->library('upload');

                        $files = $_FILES;
                        $cpt = count($new_name);
                        for ($i = 0; $i < $cpt; ++$i) {
                            $_FILES['filetoupload_rent_common']['name'] = $new_name[$i];
                            $_FILES['filetoupload_rent_common']['type'] = $files['filetoupload_rent_common']['type'][$i];
                            $_FILES['filetoupload_rent_common']['tmp_name'] = $files['filetoupload_rent_common']['tmp_name'][$i];
                            $_FILES['filetoupload_rent_common']['error'] = $files['filetoupload_rent_common']['error'][$i];
                            $_FILES['filetoupload_rent_common']['size'] = $files['filetoupload_rent_common']['size'][$i];

                            $this->upload->initialize($config);
                            //$this->upload->do_upload();
                            if (!$this->upload->do_upload('filetoupload_rent_common')) {
                                $error = ['error' => $this->upload->display_errors()];
                                //print_r($error);exit;
                                echo "<script language='javascript'>alert('upload failed');</script>";
                                // 				redirect('admin/propAdd');
                            }
                        }
                    }
                    $insert_data = [
                        'title' => $this->input->post('title_rent_common'),
                        'uniqueId' => $rnd_id,
                        'address' => $this->input->post('street1_rent_common'),
                        'address2' => $this->input->post('street2_rent_common'),
                        'localityId' => '',
                        'city' => $this->input->post('city_rent_common'),
                        'provinceId' => '',
                        'state' => $this->input->post('state_rent_common'),
                        'postalcodeId' => '',
                        'zip' => $this->input->post('zip_rent_common'),
                        'loc_match' => '',
                        'longitude' => $log,
                        'latitude' => $lat,
                        'price' => $this->input->post('price_rent_common'),
                        'rentType' => $this->input->post('rentType_rent_common'),
                        'leaseType' => $this->input->post('leaseType_rent_common'),
                        'leaseTerm' => $this->input->post('leaseTerm_rent_common'),
                        'procurement' => $this->input->post('procurementFee_rent_common'),
                        'leaseDuration' => $this->input->post('leaseDuration_rent_common'),
                        'description' => $this->input->post('description_rent_common'),
                        'typeId' => $typeId_val,
                        'typeId2' => $this->input->post('typeId2_rent_common'),
                        'typeId3' => $this->input->post('typeId3_rent_common'),
                        'datePosted' => date('Y-m-d'),
                        'lotsize' => $this->input->post('lotSize_rent_common'),
                        'useAcreage' => $this->input->post('useAcreage_rent_common'),
                        'trafficcount' => $this->input->post('trafficCount_rent_common'),
                        'zoning' => $this->input->post('zoning_rent_common'),
                        'available' => $this->input->post('available_rent_common'),
                        'uId' => $this->session->userdata('id'),
                        'forSale' => $forsale_val,
                        'tax' => $this->input->post('tax_rent_common'),
                        'contactPhone' => $this->session->userdata('number'),
                        'contactEmail' => $this->session->userdata('email'),
                        'contactName' => $this->session->userdata('fullname'),
                        'lawnSprinklers' => $this->input->post('lawnSprinklers_rent_common'),
                        'courtyard' => $this->input->post('courtyard_rent_common'),
                        'fenced' => $this->input->post('fenced_rent_common'),
                        'opExpenses' => $this->input->post('opExpenses_rent_common'),
                        'cranes' => $this->input->post('cranes_rent_common'),
                        'rail' => $this->input->post('railYard_rent_common'),
                    ];
                    $res1 = $this->admin_model->addComPropertyCommon($insert_data, $forsale_val, $com_rent_ext, $rnd_id);
                    $res2 = 1;
                }
            }
        }

        if ($res1 && $res2) {
            $this->sentNewsletter($rnd_id, $typeId_val);
            if (1 == $forsale_val) {
                $url = 'admin/propertySaleList';
            } else {
                $url = 'admin/propertyRentList';
            }

            /*echo '<script ="text/javascript">alert("Property added successfully")</script>';
            $url = 'admin/propAdd';*/
            echo '<script>
				window.location.href = "'.base_url().$url.'";
			</script>';
        }
    }

    public function propertySaleList()
    {
        if ($this->session->userdata('id')) {
            $data['com_property'] = $this->admin_model->propertySaleListCom();

            $data['res_property'] = $this->admin_model->propertySaleListRes();

            $this->load->view('admin/prop_list', $data);
        } else {
            $this->load->view('admin/login');
        }
    }

    public function propertyRentList()
    {
        if ($this->session->userdata('id')) {
            $data['com_property'] = $this->admin_model->propertyRentListCom();
            /*echo"<pre>";
            print_r($data['com_property']);exit();*/

            $data['res_property'] = $this->admin_model->propertyRentListRes();

            $this->load->view('admin/prop_rent_list', $data);
        } else {
            $this->load->view('admin/login');
        }
    }

    public function propertyEdit()
    {
        if ($this->session->userdata('id')) {
            $resId = $this->input->get('id');
            $forSale = $this->input->get('forSale');
            $typeId = $this->input->get('type');
            // $data['zip_val'] = $this->admin_model->getZipVal();
            $data['state_val'] = $this->admin_model->getStateVal();
            $data['results'] = $this->admin_model->propertyEdit($resId, $forSale, $typeId);
            if ($data['results']) {
                $this->load->view('admin/prop_edit', $data);
            }
        } else {
            $this->load->view('admin/login');
        }
    }

    public function propertyComEdit()
    {
        if ($this->session->userdata('id')) {
            $commId = $this->input->get('id');
            $forSale = $this->input->get('forSale');
            $typeId = $this->input->get('type');
            // $data['zip_val'] = $this->admin_model->getZipVal();
            $data['state_val'] = $this->admin_model->getStateVal();
            $data['results'] = $this->admin_model->propertyComEdit($commId, $forSale, $typeId);
            $data['option'] = $this->admin_model->getOptionGroup();
            if ($data['results']) {
                $this->load->view('admin/prop_edit_com', $data);
            }
        } else {
            $this->load->view('admin/login');
        }
    }

    public function updateChanges()
    {
        if ($this->session->userdata('id')) {
            $forsale_val = $this->input->post('forSale');
            $typeId_val = $this->input->post('typeId');
            $rnd_id = $this->input->post('uniq');
            $id = $this->input->post('id');
            if ('1' == $forsale_val) {
                if (53 == $typeId_val || 55 == $typeId_val || 54 == $typeId_val || 60 == $typeId_val || 63 == $typeId_val || 62 == $typeId_val || 61 == $typeId_val || 77 == $typeId_val || 76 == $typeId_val || 78 == $typeId_val) {
                    $result['loc'] = $this->admin_model->getLatLog($this->input->post('zip'));
                    foreach ($result['loc'] as $lo) {
                        $log = $lo->longitude;
                        $lat = $lo->latitude;
                    }

                    if ($_FILES['filetoupload_sale']['name']) {
                        $c = 0;
                        foreach ($_FILES['filetoupload_sale']['name'] as $f_names) {
                            $new_name[] = 'ext_'.$rnd_id.'-'.$c.'-'.preg_replace('/\s+/', '', $f_names);
                            ++$c;
                        }
                        $sale_ext = implode(',', $new_name);
                        $config['upload_path'] = './uploads/';
                        $config['allowed_types'] = 'gif|jpg|png|jpeg';
                        // 		/*$config['max_size']	= '1000';
                        // 		$config['max_width']  = '1024';
                        // 		$config['max_height']  = '768';
                        $this->load->library('upload', $config);

                        $files = $_FILES;
                        $cpt = count($new_name);
                        for ($i = 0; $i < $cpt; ++$i) {
                            $_FILES['filetoupload_sale']['name'] = $new_name[$i];
                            $_FILES['filetoupload_sale']['type'] = $files['filetoupload_sale']['type'][$i];
                            $_FILES['filetoupload_sale']['tmp_name'] = $files['filetoupload_sale']['tmp_name'][$i];
                            $_FILES['filetoupload_sale']['error'] = $files['filetoupload_sale']['error'][$i];
                            $_FILES['filetoupload_sale']['size'] = $files['filetoupload_sale']['size'][$i];

                            $this->upload->initialize($config);
                            //$this->upload->do_upload();
                            if (!$this->upload->do_upload('filetoupload_sale')) {
                                $sale_ext = '';
                            }
                        }
                    }
                    $form_data = [
                        'forSale' => $forsale_val,
                        'typeId' => $typeId_val,
                        'street1' => $this->input->post('street1'),
                        'elemSchool' => $this->input->post('elemSchool'),
                        'street2' => $this->input->post('street2'),
                        'midSchool' => $this->input->post('midSchool'),
                        'city' => $this->input->post('city'),
                        'highSchool' => $this->input->post('highSchool'),
                        'state' => $this->input->post('state'),
                        'zip' => $this->input->post('zip'),
                        'longitude' => $log,
                        'latitude' => $lat,
                        'useAcreage' => $this->input->post('useAcreage'),
                        'neighborhood' => $this->input->post('neighborhood'),
                        'waterfront' => $this->input->post('waterfront'),
                        'golfCourse' => $this->input->post('golfCourse'),
                        'commPool' => $this->input->post('commPool'),
                        'pool' => $this->input->post('pool'),
                        'lawnSprinklers' => $this->input->post('lawnSprinklers'),
                        'associationFee' => $this->input->post('associationFee'),
                        'available' => $this->input->post('available'),
                        'price' => $this->input->post('price'),
                        'fmv' => $this->input->post('fmv'),
                        'mls' => $this->input->post('mls'),
                        'tax' => $this->input->post('tax'),
                        'status' => $this->input->post('status'),
                        'lotSize' => $this->input->post('lotSize'),
                        'zoning' => $this->input->post('zoning'),
                        'yearBuilt' => $this->input->post('yearBuilt'),
                        'parkingSpaces' => $this->input->post('parkingSpaces'),
                        'garageSize' => $this->input->post('garageSize'),
                        'financingDetails' => $this->input->post('financingDetails'),
                        'title' => $this->input->post('title'),
                        'description' => $this->input->post('description'),
                    ];
                    $res1 = $this->admin_model->addResPropertyEdit($form_data, $forsale_val, $id, $sale_ext, $rnd_id);
                } elseif (57 == $typeId_val || 56 == $typeId_val || 67 == $typeId_val) {
                    $result['loc'] = $this->admin_model->getLatLog($this->input->post('zip_diff'));
                    foreach ($result['loc'] as $lo) {
                        $log = $lo->longitude;
                        $lat = $lo->latitude;
                    }
                    if ($_FILES['filetoupload_diff']['name']) {
                        $c = 0;
                        foreach ($_FILES['filetoupload_diff']['name'] as $f_names) {
                            $new_name[] = 'ext_'.$rnd_id.'-'.$c.'-'.preg_replace('/\s+/', '', $f_names);
                            ++$c;
                        }
                        $diff_sale_ext = implode(',', $new_name);
                        $config['upload_path'] = './uploads/';
                        $config['allowed_types'] = 'gif|jpg|png|jpeg';
                        /*	$config['max_size']	= '1000';
                            $config['max_width']  = '1024';
                        */

                        $this->load->library('upload');

                        $files = $_FILES;
                        $cpt = count($new_name);
                        for ($i = 0; $i < $cpt; ++$i) {
                            $_FILES['filetoupload_diff']['name'] = $new_name[$i];
                            $_FILES['filetoupload_diff']['type'] = $files['filetoupload_diff']['type'][$i];
                            $_FILES['filetoupload_diff']['tmp_name'] = $files['filetoupload_diff']['tmp_name'][$i];
                            $_FILES['filetoupload_diff']['error'] = $files['filetoupload_diff']['error'][$i];
                            $_FILES['filetoupload_diff']['size'] = $files['filetoupload_diff']['size'][$i];

                            $this->upload->initialize($config);
                            //$this->upload->do_upload();
                            if (!$this->upload->do_upload('filetoupload_diff')) {
                                $diff_sale_ext = '';
                            }
                        }
                    }
                    $insert_data = [
                        'title' => $this->input->post('title_diff'),
                        'address' => $this->input->post('street1_diff'),
                        'address2' => $this->input->post('street2_diff'),
                        'localityId' => '',
                        'city' => $this->input->post('city_diff'),
                        'provinceId' => '',
                        'state' => $this->input->post('state_diff'),
                        'postalcodeId' => '',
                        'zip' => $this->input->post('zip_diff'),
                        'loc_match' => '',
                        'longitude' => $log,
                        'latitude' => $lat,
                        'price' => $this->input->post('price_diff'),
                        'description' => $this->input->post('description_diff'),
                        'typeId' => $typeId_val, //$form_data['typeId'],
                        'typeId2' => '', //$form_data['typeId2'],
                        'typeId3' => '', //$form_data['typeId3'],
                        /*					 		'beds'=>'',//$form_data['beds'],
                        'baths'=>'',//$form_data['baths'],*/
                        'status' => $this->input->post('status_diff'),
                        'dateUpdated' => date('Y-m-d'),
                        'neighborhood' => $this->input->post('neighborhood_diff'),
                        'waterfront' => $this->input->post('waterfront_diff'),
                        'yearbuilt' => $this->input->post('yearBuilt_diff'),
                        'garagesize' => $this->input->post('garageSize_diff'),
                        'elemSchool' => $this->input->post('elemSchool_diff'),
                        'midSchool' => $this->input->post('midSchool__diff'),
                        'highSchool' => $this->input->post('highSchool_diff'),
                        'golf' => $this->input->post('golfCourse_diff'),
                        'gated' => $this->input->post('gated_diff'),
                        // 'uId'=>$this->session->userdata('id'),
                        'noi' => $this->input->post('noi_diff'),
                        'goi' => $this->input->post('goi_diff'),
                        'forSale' => $forsale_val,
                        'onSiteLaundry' => $this->input->post('laundry_diff'),
                        'email' => $this->input->post('email_diff'),
                        'phone' => $this->input->post('phone_diff'),
                        'fax' => $this->input->post('fax_diff'),
                        'commPool' => $this->input->post('commPool_diff'),
                        'fmv' => $this->input->post('fmv_diff'),
                        'mls' => $this->input->post('mls_diff'),
                        'occupancy' => $this->input->post('occupancy_diff'),
                        'parkingSpaces' => $this->input->post('parkingSpaces_diff'),
                        'lawnSprinklers' => $this->input->post('lawnSprinklers_diff'),
                        'opExpenses' => $this->input->post('opExpenses_diff'),
                        'available' => $this->input->post('available_diff'),
                        'numUnits' => $this->input->post('numUnits_diff'), /*,
                    'contactPhone'=>$this->session->userdata('number'),
                    'contactEmail'=>$this->session->userdata('email'),
                    'contactName'=>$this->session->userdata('fullname')*/
                    ];
                    $res1 = $this->admin_model->addResComplexEdit($insert_data, $forsale_val, $id, $diff_sale_ext, $rnd_id);
                } else {
                    $result['loc'] = $this->admin_model->getLatLog($this->input->post('zip_common'));
                    foreach ($result['loc'] as $lo) {
                        $log = $lo->longitude;
                        $lat = $lo->latitude;
                    }
                    if ($_FILES['filetoupload_common']['name']) {
                        $c = 0;
                        foreach ($_FILES['filetoupload_common']['name'] as $f_names) {
                            $new_name[] = 'ext_'.$rnd_id.'-'.$c.'-'.preg_replace('/\s+/', '', $f_names);
                            ++$c;
                        }
                        $com_sale_ext = implode(',', $new_name);

                        $config['upload_path'] = './uploads/';
                        $config['allowed_types'] = 'gif|jpg|png|jpeg';
                        $this->load->library('upload');

                        $files = $_FILES;
                        $cpt = count($new_name);
                        for ($i = 0; $i < $cpt; ++$i) {
                            $_FILES['filetoupload_common']['name'] = $new_name[$i];
                            $_FILES['filetoupload_common']['type'] = $files['filetoupload_common']['type'][$i];
                            $_FILES['filetoupload_common']['tmp_name'] = $files['filetoupload_common']['tmp_name'][$i];
                            $_FILES['filetoupload_common']['error'] = $files['filetoupload_common']['error'][$i];
                            $_FILES['filetoupload_common']['size'] = $files['filetoupload_common']['size'][$i];

                            $this->upload->initialize($config);
                            //$this->upload->do_upload();
                            if (!$this->upload->do_upload('filetoupload_common')) {
                                $com_sale_ext = '';
                            }
                        }
                    }
                    $form_data = [
                        'forSale' => $forsale_val,
                        'typeId' => $this->input->post('typeId'),
                        'street1_common' => $this->input->post('street1_common'),
                        'street2_common' => $this->input->post('street2_common'),
                        'city_common' => $this->input->post('city_common'),
                        'state_common' => $this->input->post('state_common'),
                        'zip_common' => $this->input->post('zip_common'),
                        'longitude' => $log,
                        'latitude' => $lat,
                        'typeId' => $typeId_val,
                        'typeId_common2' => $this->input->post('typeId_common2'),
                        'typeId_common3' => $this->input->post('typeId_common3'),
                        'available_common' => $this->input->post('available_common'),
                        'price_common' => $this->input->post('price_common'),
                        'fmv_common' => $this->input->post('fmv_common'),
                        'mls_common' => $this->input->post('mls_common'),
                        'status_common' => $this->input->post('status_common'),
                        'tax_common' => $this->input->post('tax_common'),
                        'noi_common' => $this->input->post('noi_common'),
                        'goi_common' => $this->input->post('goi_common'),
                        'occupancy_common' => $this->input->post('occupancy_common'),
                        'opExpenses_common' => $this->input->post('opExpenses_common'),
                        'sqFeet_common' => $this->input->post('sqFeet_common'),
                        'numFloors_common' => $this->input->post('numFloors_common'),
                        'trafficCount_common' => $this->input->post('trafficCount_common'),
                        'yearBuilt_common' => $this->input->post('yearBuilt_common'),
                        'parkingRatio_common' => $this->input->post('parkingRatio_common'),
                        'parkingSpaces_common' => $this->input->post('parkingSpaces_common'),
                        'numUnits_common' => $this->input->post('numUnits_common'),
                        'dockDoors_common' => $this->input->post('dockDoors_common'),
                        'gradeDoors_common' => $this->input->post('gradeDoors_common'),
                        'tax_common' => $this->input->post('tax_common'),
                        'lotSize_common' => $this->input->post('lotSize_common'),
                        'useAcreage_common' => $this->input->post('useAcreage_common'),
                        'zoning_common' => $this->input->post('zoning_common'),
                        'class_common' => $this->input->post('class_common'),
                        'lawnSprinklers_common' => $this->input->post('lawnSprinklers_common'),
                        'courtyard_common' => $this->input->post('courtyard_common'),
                        'fenced_common' => $this->input->post('fenced_common'),
                        'cranes_common' => $this->input->post('cranes_common'),
                        'railYard_common' => $this->input->post('railYard_common'),
                        'title_common' => $this->input->post('title_common'),
                        'description_common' => $this->input->post('description_common'),
                    ];
                    //echo "<pre>";
                    //print_r($form_data);
                    $res1 = $this->admin_model->addComPropertyEditCommon($form_data, $forsale_val, $id, $com_sale_ext, $rnd_id);
                }
            } elseif ('2' == $forsale_val) {
                if (53 == $typeId_val || 55 == $typeId_val || 54 == $typeId_val || 60 == $typeId_val || 63 == $typeId_val || 62 == $typeId_val || 61 == $typeId_val || 77 == $typeId_val || 76 == $typeId_val || 78 == $typeId_val) {
                    $result['loc'] = $this->admin_model->getLatLog($this->input->post('zip_rent'));
                    foreach ($result['loc'] as $lo) {
                        $log = $lo->longitude;
                        $lat = $lo->latitude;
                    }
                    $config['upload_path'] = './uploads/';
                    $config['allowed_types'] = 'gif|jpg|png|jpeg';
                    if ($_FILES['filetoupload_rent']['name']) {
                        $c = 0;
                        foreach ($_FILES['filetoupload_rent']['name'] as $f_names) {
                            $new_name[] = 'ext_'.$rnd_id.'-'.$c.'-'.preg_replace('/\s+/', '', $f_names);
                            ++$c;
                        }
                        $rent_ext = implode(',', $new_name);
                        $this->load->library('upload');

                        $files = $_FILES;
                        $cpt = count($new_name);
                        for ($i = 0; $i < $cpt; ++$i) {
                            $_FILES['filetoupload_rent']['name'] = $new_name[$i];
                            $_FILES['filetoupload_rent']['type'] = $files['filetoupload_rent']['type'][$i];
                            $_FILES['filetoupload_rent']['tmp_name'] = $files['filetoupload_rent']['tmp_name'][$i];
                            $_FILES['filetoupload_rent']['error'] = $files['filetoupload_rent']['error'][$i];
                            $_FILES['filetoupload_rent']['size'] = $files['filetoupload_rent']['size'][$i];
                            $this->upload->initialize($config);
                            //$this->upload->do_upload();
                            if (!$this->upload->do_upload('filetoupload_rent')) {
                                $rent_ext = '';
                            }
                        }
                    }
                    $form_data = [
                        'forSale' => $forsale_val,
                        'typeId' => $typeId_val,
                        'street1_rent' => $this->input->post('street1_rent'),
                        'elemSchool_rent' => $this->input->post('elemSchool_rent'),
                        'street2_rent' => $this->input->post('street2_rent'),
                        'midSchool_rent' => $this->input->post('midSchool_rent'),
                        'city_rent' => $this->input->post('city_rent'),
                        'highSchool_rent' => $this->input->post('highSchool_rent'),
                        'state_rent' => $this->input->post('state_rent'),
                        'zip_rent' => $this->input->post('zip_rent'),
                        'longitude' => $log,
                        'latitude' => $lat,
                        'neighborhood_rent' => $this->input->post('neighborhood_rent'),
                        'tpGas_rent' => @$this->input->post('tpGas_rent'),

                        'tpElectricity_rent' => @$this->input->post('tpElectricity_rent'),
                        'tpWater_rent' => @$this->input->post('tpWater_rent'),
                        'tpCable_rent' => @$this->input->post('tpCable_rent'),
                        'tpTrash_rent' => @$this->input->post('tpTrash_rent'),
                        'pets_rent' => @$this->input->post('pets_rent'),
                        'section8_rent' => @$this->input->post('section8_rent'),

                        'fitness_rent' => @$this->input->post('fitness_rent'),
                        'spa_rent' => @$this->input->post('spa_rent'),
                        'sports_rent' => @$this->input->post('sports_rent'),
                        'tennis_rent' => @$this->input->post('tennis_rent'),
                        'bikePath_rent' => @$this->input->post('bikePath_rent'),
                        'boating_rent' => @$this->input->post('boating_rent'),

                        'courtyard_rent' => @$this->input->post('courtyard_rent'),
                        'playground_rent' => @$this->input->post('playground_rent'),
                        'clubhouse_rent' => @$this->input->post('clubhouse_rent'),
                        'publicTrans_rent' => @$this->input->post('publicTrans_rent'),
                        'waterfront_rent' => @$this->input->post('waterfront_rent'),
                        'golfCourse_rent' => @$this->input->post('golfCourse_rent'),

                        'commPool_rent' => @$this->input->post('commPool_rent'),
                        'lawnSprinklers_rent' => @$this->input->post('lawnSprinklers_rent'),
                        'fenced_rent' => @$this->input->post('fenced_rent'),
                        'pool_rent' => @$this->input->post('pool_rent'),
                        'associationFee_rent' => @$this->input->post('associationFee_rent'),
                        'groundLease_rent' => @$this->input->post('groundLease_rent'),

                        'leaseOp_rent' => @$this->input->post('leaseOp_rent'),
                        'available_rent' => $this->input->post('available_rent'),
                        'sqFeet_rent' => $this->input->post('sqFeet_rent'),
                        'appFee_rent' => $this->input->post('appFee_rent'),
                        'deposit_rent' => $this->input->post('deposit_rent'),
                        'lotSize_rent' => $this->input->post('lotSize_rent'),
                        'useAcreage_rent' => $this->input->post('useAcreage_rent'),
                        'zoning_rent' => $this->input->post('zoning_rent'),
                        'yearBuilt_rent' => $this->input->post('yearBuilt_rent'),
                        'parkingSpaces_rent' => $this->input->post('parkingSpaces_rent'),
                        'garageSize_rent' => $this->input->post('garageSize_rent'),
                        'petPolicy_rent' => $this->input->post('petPolicy_rent'),
                        'title_rent' => $this->input->post('title_rent'),
                        'description_rent' => $this->input->post('description_rent'),

                        /*'title'=>$this->input->post('title'],
                    'description'=>$this->input->post('description']*/
                    ];
                    $res1 = $this->admin_model->addResPropertyEdit($form_data, $forsale_val, $id, $rent_ext, $rnd_id);
                } elseif (57 == $typeId_val || 56 == $typeId_val || 67 == $typeId_val) {
                    $result['loc'] = $this->admin_model->getLatLog($this->input->post('zip_rent_diff'));
                    foreach ($result['loc'] as $lo) {
                        $log = $lo->longitude;
                        $lat = $lo->latitude;
                    }
                    if ($_FILES['filetoupload_rent_diff']['name']) {
                        $config['upload_path'] = './uploads/';
                        $config['allowed_types'] = 'gif|jpg|png|jpeg';
                        $c = 0;
                        foreach ($_FILES['filetoupload_rent_diff']['name'] as $f_names) {
                            $new_name[] = 'ext_'.$rnd_id.'-'.$c.'-'.preg_replace('/\s+/', '', $f_names);
                            ++$c;
                        }
                        $diff_rent_ext = implode(',', $new_name);
                        $this->load->library('upload');

                        $files = $_FILES;
                        $cpt = count($new_name);
                        for ($i = 0; $i < $cpt; ++$i) {
                            $_FILES['filetoupload_rent_diff']['name'] = $new_name[$i];
                            $_FILES['filetoupload_rent_diff']['type'] = $files['filetoupload_rent_diff']['type'][$i];
                            $_FILES['filetoupload_rent_diff']['tmp_name'] = $files['filetoupload_rent_diff']['tmp_name'][$i];
                            $_FILES['filetoupload_rent_diff']['error'] = $files['filetoupload_rent_diff']['error'][$i];
                            $_FILES['filetoupload_rent_diff']['size'] = $files['filetoupload_rent_diff']['size'][$i];

                            $this->upload->initialize($config);
                            //$this->upload->do_upload();
                            if (!$this->upload->do_upload('filetoupload_rent_diff')) {
                                $diff_rent_ext = '';
                            }
                        }
                    }
                    $insert_data = [
                        'title' => $this->input->post('title_rent_diff'),
                        'address' => $this->input->post('street1_rent_diff'),
                        'address2' => $this->input->post('street2_rent_diff'),
                        'localityId' => '',
                        'city' => $this->input->post('city_rent_diff'),
                        'provinceId' => '',
                        'state' => $this->input->post('state_rent_diff'),
                        'postalcodeId' => '',
                        'zip' => $this->input->post('zip_rent_diff'),
                        'loc_match' => '',
                        'longitude' => $log,
                        'latitude' => $lat,
                        //'price'=>$form_data['price'],
                        'description' => $this->input->post('description_rent_diff'),
                        'typeId' => $typeId_val, //$form_data['typeId'],
                        /*'typeId2'=>'',//$form_data['typeId2'],
                        'typeId3'=>'',//$form_data['typeId3'],
                        'beds'=>'',//$form_data['beds'],
                        'baths'=>'',//$form_data['baths'],*/
                        'dateUpdated' => date('Y-m-d'),
                        'neighborhood' => $this->input->post('neighborhood_rent_diff'),
                        'waterfront' => $this->input->post('waterfront_rent_diff'),
                        'yearbuilt' => $this->input->post('yearBuilt_rent_diff'),
                        'garagesize' => $this->input->post('garageSize_rent_diff'),
                        'tpgas' => $this->input->post('tpGas_rent_diff'),
                        'tpelectricity' => $this->input->post('tpElectricity_rent_diff'),
                        'tpwater' => $this->input->post('tpWater_rent_diff'),
                        'tpcable' => $this->input->post('tpCable_rent_diff'),
                        'tptrash' => $this->input->post('tpTrash_rent_diff'),
                        'sec8' => $this->input->post('section8_rent_diff'),
                        'secdep' => $this->input->post('deposit_rent_diff'),
                        'pets' => $this->input->post('pets_rent_diff'),
                        'appFee' => $this->input->post['appFee_rent_diff'],
                        'elemSchool' => $this->input->post('elemSchool_rent_diff'),
                        'midSchool' => $this->input->post('midSchool_rent_diff'),
                        'highSchool' => $this->input->post('highSchool_rent'),
                        'fitness' => $this->input->post('fitness_rent_diff'),
                        'golf' => $this->input->post('golfCourse_rent_diff'),
                        'pool' => '',
                        'spa' => $this->input->post('spa_rent_diff'),
                        'sports' => $this->input->post('sports_rent_diff'),
                        'tennis' => $this->input->post('tennis_rent_diff'),
                        'bikePath' => $this->input->post('bikePath_rent_diff'),
                        'boating' => $this->input->post('boating_rent_diff'),
                        'courtyard' => $this->input->post('courtyard_rent_diff'),
                        'playground' => $this->input->post('playground_rent_diff'),
                        'clubhouse' => $this->input->post('clubhouse_rent_diff'),
                        'gated' => $this->input->post('gated_rent_diff'),
                        'publicTrans' => $this->input->post('publicTrans_rent_diff'),
                        // 'uId'=>$this->session->userdata('id'),
                        'uSite' => '',
                        'forSale' => $forsale_val,
                        'onSiteLaundry' => $this->input->post('laundry_rent_diff'),
                        'slogan' => $this->input->post('aptSlogan_rent_diff'),
                        'email' => $this->input->post('email_rent_diff'),
                        'phone' => $this->input->post('phone_rent_diff'),
                        'fax' => $this->input->post('fax_rent_diff'),
                        'commPool' => $this->input->post('commPool_rent_diff'),
                        'parkingSpaces' => $this->input->post('parkingSpaces_rent_diff'),
                        'lawnSprinklers' => $this->input->post('lawnSprinklers_rent_diff'),
                        'fenced' => $this->input->post('fenced_rent_diff'),
                        'available' => $this->input->post('available_rent_diff'),
                        'numUnits' => $this->input->post('numUnits_rent_diff'), /*,
                    'contactPhone'=>$this->session->userdata('number'),
                    'contactEmail'=>$this->session->userdata('email'),
                    'contactName'=>$this->session->userdata('fullname')*/
                    ];
                    $res1 = $this->admin_model->addResComplexEdit($insert_data, $forsale_val, $id, $diff_rent_ext, $rnd_id);
                } else {
                    $result['loc'] = $this->admin_model->getLatLog($this->input->post('zip_rent_common'));
                    foreach ($result['loc'] as $lo) {
                        $log = $lo->longitude;
                        $lat = $lo->latitude;
                    }
                    if ($_FILES['filetoupload_rent_common']['name']) {
                        $config['upload_path'] = './uploads/';
                        $config['allowed_types'] = 'gif|jpg|png|jpeg';
                        /*$config['max_size']	= '1000';
                            $config['max_width']  = '1024';
                        */

                        $c = 0;
                        foreach ($_FILES['filetoupload_rent_common']['name'] as $f_names) {
                            $new_name[] = 'ext_'.$rnd_id.'-'.$c.'-'.preg_replace('/\s+/', '', $f_names);
                            ++$c;
                        }
                        $com_rent_ext = implode(',', $new_name);
                        $this->load->library('upload');

                        $files = $_FILES;
                        $cpt = count($new_name);
                        for ($i = 0; $i < $cpt; ++$i) {
                            $_FILES['filetoupload_rent_common']['name'] = $new_name[$i];
                            $_FILES['filetoupload_rent_common']['type'] = $files['filetoupload_rent_common']['type'][$i];
                            $_FILES['filetoupload_rent_common']['tmp_name'] = $files['filetoupload_rent_common']['tmp_name'][$i];
                            $_FILES['filetoupload_rent_common']['error'] = $files['filetoupload_rent_common']['error'][$i];
                            $_FILES['filetoupload_rent_common']['size'] = $files['filetoupload_rent_common']['size'][$i];

                            $this->upload->initialize($config);
                            //$this->upload->do_upload();
                            if (!$this->upload->do_upload('filetoupload_rent_common')) {
                                $com_rent_ext = '';
                            }
                        }
                    }
                    $insert_data = [
                        'title' => $this->input->post('title_rent_common'),
                        'address' => $this->input->post('street1_rent_common'),
                        'address2' => $this->input->post('street2_rent_common'),
                        'localityId' => '',
                        'city' => $this->input->post('city_rent_common'),
                        'provinceId' => '',
                        'state' => $this->input->post('state_rent_common'),
                        'postalcodeId' => '',
                        'zip' => $this->input->post('zip_rent_common'),
                        'loc_match' => '',
                        'longitude' => $log,
                        'latitude' => $lat,
                        'price' => $this->input->post('price_rent_common'),
                        'rentType' => $this->input->post('rentType_rent_common'),
                        'leaseType' => $this->input->post('leaseType_rent_common'),
                        'leaseTerm' => $this->input->post('leaseTerm_rent_common'),
                        'procurement' => $this->input->post('procurementFee_rent_common'),
                        'leaseDuration' => $this->input->post('leaseDuration_rent_common'),
                        'description' => $this->input->post('description_rent_common'),
                        'typeId' => $typeId_val,
                        'typeId2' => $this->input->post('typeId2_rent_common'),
                        'typeId3' => $this->input->post('typeId3_rent_common'),
                        'dateUpdated' => date('Y-m-d'),
                        'lotsize' => $this->input->post('lotSize_rent_common'),
                        'useAcreage' => $this->input->post('useAcreage_rent_common'),
                        'trafficcount' => $this->input->post('trafficCount_rent_common'),
                        'parkingratio' => '',
                        'zoning' => $this->input->post('zoning_rent_common'),
                        'available' => $this->input->post('available_rent_common'),
                        // 'uId'=>$this->session->userdata('id'),
                        'uSite' => '',
                        'forSale' => $forsale_val,
                        'tax' => $this->input->post('tax_rent_common'),
                        /*'contactPhone'=>$this->session->userdata('number'),
                            'contactEmail'=>$this->session->userdata('email'),
                        */
                        'lawnSprinklers' => $this->input->post('lawnSprinklers_rent_common'),
                        'courtyard' => $this->input->post('courtyard_rent_common'),
                        'fenced' => $this->input->post('fenced_rent_common'),
                        'opExpenses' => $this->input->post('opExpenses_rent_common'),
                        'cranes' => $this->input->post('cranes_rent_common'),
                        'rail' => $this->input->post('railYard_rent_common'),
                    ];
                    $res1 = $this->admin_model->addComPropertyEditCommon($insert_data, $forsale_val, $id, $com_rent_ext, $rnd_id);
                }
            }

            if ($res1) {
                redirect('admin/propertySaleList', 'refresh');
            }
        } else {
            $this->load->view('admin/login');
        }
    }

    public function propertyResDel()
    {
        //echo $path = base_url() . '/uploads/';

        if ($this->session->userdata('id')) {
            $resId = $this->input->get('id');
            $forSale = $this->input->get('forSale');
            if ('' != $resId) {
                $res['filename'] = $this->admin_model->propertyResDel($resId);
                //print_r($res);
                //$pic_arr = explode(",", $res['filename']);

                /*echo "<pre>";
                print_r($pic_arr);*/
                foreach ($res['filename'] as $pic) {
                    $pic_arr = explode(',', $pic);
                    foreach ($pic_arr as $p) {
                        $file_dir = 'uploads/'.$p;

                        if (is_file($file_dir)) {
                            $deleted_file = unlink($file_dir);
                            //$deleted_file = delete_file($file_dir);
                        }
                    }
                }
                if ($res) {
                    if (1 == $forSale) {
                        //redirect('admin/propertySaleList', 'refresh');
                        $url = 'admin/propertySaleList';
                        echo '
					<script>
					window.location.href = "'.base_url().$url.'";
					</script>';
                    } else {
                        $url = 'admin/propertyRentList';
                        echo '
					<script>
					window.location.href = "'.base_url().$url.'";
					</script>';
                        //redirect('admin/propertyRentList', 'refresh');
                    }
                }
            } else {
                $this->load->view('admin/login');
            }
        }
    }

    public function propertyComDel()
    {
        if ($this->session->userdata('id')) {
            $comId = $this->input->get('id');
            $forSale = $this->input->get('forSale');
            if ('' != $comId) {
                $res['filename'] = $this->admin_model->propertyComDel($comId);
                //$pic_arr = explode(",", $res['filename']);

                foreach ($res['filename'] as $pic) {
                    $pic_arr = explode(',', $pic);
                    foreach ($pic_arr as $p) {
                        $file_dir = 'uploads/'.$p;

                        if (is_file($file_dir)) {
                            $deleted_file = unlink($file_dir);
                            //$deleted_file = delete_file($file_dir);
                        }
                    }
                }
                if ($res) {
                    if (1 == $forSale) {
                        $url = 'admin/propertySaleList';
                        echo '
				<script>
				window.location.href = "'.base_url().$url.'";
				</script>';
                    //redirect('admin/propertySaleList', 'refresh');
                    } else {
                        $url = 'admin/propertyRentList';
                        echo '
				<script>
				window.location.href = "'.base_url().$url.'";
				</script>';
                        //redirect('admin/propertyRentList', 'refresh');
                    }
                }
            }
        } else {
            $this->load->view('admin/login');
        }
    }

    public function addAgents()
    {
        if (1 == $this->session->userdata('id')) {
            $this->load->view('admin/add_agents');
        }
    }

    public function validateUsername()
    {
        $username = $this->input->post('username');
        $result = $this->admin_model->validateUsername($username);
        if ($result) {
            $val = ['success' => 'username_exist'];
            $output = json_encode($val);
            echo $output;
        } else {
            $val = ['success' => 'username not exist'];
            $output = json_encode($val);
            echo $output;
        }
    }

    public function saveAgents()
    {
        if (1 == $this->session->userdata('id')) {
            $username = $this->input->post('uname');
            $password = md5($this->input->post('password'));
            $fullname = $this->input->post('fullname');
            $email = $this->input->post('email');
            $number = $this->input->post('number');
            $description = $this->input->post('description');
            //$profile_pic =;$file_data['file_name'];
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            /*$config['max_size']	= '100';
                $config['max_width']  = '1024';
            */
            $this->load->library('upload', $config);
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('pic')) {
                $file_data = $this->upload->data();

                $db_data = [
                    'username' => $username,
                    'password' => $password,
                    'fullname' => $fullname,
                    'email' => $email,
                    'number' => $number,
                    'description' => $description,
                    'profile_pic' => $file_data['file_name'], ];
            } else {
                $db_data = [
                    'username' => $username,
                    'password' => $password,
                    'fullname' => $fullname,
                    'email' => $email,
                    'number' => $number,
                    'description' => $description, ];
            }

            $result = $this->admin_model->saveAgents($db_data);
            if ($result) {
                echo "<script> alert('Agents added');</script>";
                $url = 'admin/addAgents';
                echo '
			<script>
			window.location.href = "'.base_url().$url.'";
			</script>
			';
            } else {
                echo "<script> alert('Failed to add Agents');</script>";
                $url = 'admin/addAgents';
                echo '
			<script>
			window.location.href = "'.base_url().$url.'";
			</script>';
            }
        }
    }

    public function manageAgents()
    {
        if (1 == $this->session->userdata('id')) {
            $data['result'] = $this->admin_model->manageAgents();
            $this->load->view('admin/manageagents', $data);
        } else {
            redirect('admin/propertySaleList', 'refresh');
        }
    }

    public function updateProfile()
    {
        if (1 == $this->session->userdata('id')) {
            $id = $this->input->get('id');
            $data['profile'] = $this->admin_model->agentDetails($id);
            $this->load->view('admin/update_profile', $data);
        } elseif ($this->session->userdata('id')) {
            $id = $this->session->userdata('id');
            $data['profile'] = $this->admin_model->agentDetails($id);
            $this->load->view('admin/update_profile', $data);
        } else {
            $this->load->view('admin/login');
        }
    }

    public function updateAgents()
    {
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        /*$config['max_size']	= '100';
            $config['max_width']  = '1024';
        */
        $this->load->library('upload', $config);
        if (1 == $this->session->userdata('id')) {
            $id = $this->input->post('uid');
            $oldpwd = $this->input->post('pwdold');
            $newpass = $this->input->post('password');
            if ('' == $newpass) {
                $orginalpwd = $oldpwd;
            } else {
                $orginalpwd = md5($newpass);
            }
            if ($this->upload->do_upload('pic')) {
                $file_data = $this->upload->data();

                $db_data = [
                    'fullname' => $this->input->post('fullname'),
                    'email' => $this->input->post('email'),
                    'password' => $orginalpwd,
                    'number' => $this->input->post('number'),
                    'description' => $this->input->post('description'),
                    'profile_pic' => $file_data['file_name'], ];
                $res = $this->admin_model->updateAgents($db_data, $id);
                if ($res) {
                    echo "<script>alert('Updated');</script>";
                    $url = 'admin/manageAgents';
                    echo '
				<script>
				window.location.href = "'.base_url().$url.'";
				</script>';
                }
            } else {
                $db_data = [
                    'fullname' => $this->input->post('fullname'),
                    'email' => $this->input->post('email'),
                    'password' => $orginalpwd,
                    'number' => $this->input->post('number'),
                    'description' => $this->input->post('description'), ];
                $res = $this->admin_model->updateAgents($db_data, $id);
                if ($res) {
                    echo "<script>alert('Updated');</script>";
                    $url = 'admin/manageAgents';
                    echo '
				<script>
				window.location.href = "'.base_url().$url.'";
				</script>';
                }
            }
        } elseif ($this->session->userdata('id')) {
            $id = $this->session->userdata('id');
            if ($this->upload->do_upload('pic')) {
                $file_data = $this->upload->data();

                $db_data = [
                    'fullname' => $this->input->post('fullname'),
                    'email' => $this->input->post('email'),
                    'number' => $this->input->post('number'),
                    'description' => $this->input->post('description'),
                    'profile_pic' => $file_data['file_name'], ];
                $res = $this->admin_model->updateAgents($db_data, $id);
                if ($res) {
                    echo "<script>alert('Updated');</script>";
                    $url = 'admin/updateProfile';
                    echo '
				<script>
				window.location.href = "'.base_url().$url.'";
				</script>';
                }
            } else {
                $db_data = [
                    'fullname' => $this->input->post('fullname'),
                    'email' => $this->input->post('email'),
                    'number' => $this->input->post('number'),
                    'description' => $this->input->post('description'), ];
                $res = $this->admin_model->updateAgents($db_data, $id);
                if ($res) {
                    echo "<script>alert('Updated');</script>";
                    $url = 'admin/updateProfile';
                    echo '
				<script>
				window.location.href = "'.base_url().$url.'";
				</script>';
                }
            }
        }
    }

    public function adminProfile()
    {
        if (1 == $this->session->userdata('id')) {
            $data['profile'] = $this->admin_model->adminDetails();
            $this->load->view('admin/update_admin', $data);
        }
    }

    public function updateAdmin()
    {
        if (1 == $this->session->userdata('id')) {
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            /*$config['max_size']	= '100';
                $config['max_width']  = '1024';
            */
            $this->load->library('upload', $config);

            if ($this->upload->do_upload('pic')) {
                $file_data = $this->upload->data();

                $db_data = [
                    'fullname' => $this->input->post('fullname'),
                    'number' => $this->input->post('number'),
                    'description' => $this->input->post('description'),
                    'profile_pic' => $file_data['file_name'], ];
                $res = $this->admin_model->updateAdmin($db_data);
                if ($res) {
                    echo "<script>alert('Updated');</script>";
                    $url = 'admin/adminProfile';
                    echo '
				<script>
				window.location.href = "'.base_url().$url.'";
				</script>';
                }
            } else {
                $db_data = [
                    'fullname' => $this->input->post('fullname'),
                    'number' => $this->input->post('number'),
                    'description' => $this->input->post('description'), ];
                $res = $this->admin_model->updateAdmin($db_data);
                if ($res) {
                    echo "<script>alert('Updated');</script>";
                    $url = 'admin/adminProfile';
                    echo '
				<script>
				window.location.href = "'.base_url().$url.'";
				</script>';
                }
            }
        }
    }

    public function changePwd()
    {
        if ($this->session->userdata('id')) {
            // $data['password'] = $this->admin_model->changePwd();
            $this->load->view('admin/change_pwd');
        } else {
            $this->load->view('admin/login');
        }
    }

    public function validateOldPassword()
    {
        $password = $this->input->post('password');
        $result = $this->admin_model->validateOldPassword($password);
        if ($result) {
            $val = ['success' => 'password_correct'];
            $output = json_encode($val);
            echo $output;
        } else {
            $val = ['success' => 'password not correct'];
            $output = json_encode($val);
            echo $output;
        }
    }

    public function updatePwd()
    {
        if ($this->session->userdata('id')) {
            $password = $this->input->post('newpwd');
            $result = $this->admin_model->updatePwd($password);
            if ($result) {
                echo "<script>alert('Password Updated');</script>";
                $url = 'admin/changePwd';
                echo '
					<script>
					window.location.href = "'.base_url().$url.'";
					</script>';
            }
        } else {
            $this->load->view('admin/login');
        }
    }

    public function deleteAgents()
    {
        $id = $this->input->get('id');
        if (1 == $this->session->userdata('id')) {
            $res = $this->admin_model->deleteAgents($id);
            if ($res) {
                echo "<script>alert('Agent deleted');</script>";
                $url = 'admin/manageAgents';
                echo '
				<script>
				window.location.href = "'.base_url().$url.'";
				</script>';
            }
        }
    }

    public function getStates()
    {
        $html = '';
        $state_id = $this->input->post('state_id');
        // $zip_id = $this->input->post('zip_id');
        $data['city'] = $this->admin_model->getStates($state_id);
        if ($data['city']) {
            foreach ($data['city']->result_array() as $r) {
                if ($r['city'] == $this->session->userdata('city')) {
                    $selected = 'selected=selected';
                } else {
                    $selected = '';
                }

                if (!$this->session->userdata('id')) {
                    $html .= '<option value="'.$r['city'].'">'.$r['city'].'</option>';
                } else {
                    $html .= '<option value="'.$r['city'].'" '.$selected.'>'.$r['city'].'</option>';
                }
            }
            $val = ['success' => 'yes', 'html' => $html];
            $output = json_encode($val);
            echo $output;
        } else {
            $val = ['success' => 'no'];
            $output = json_encode($val);
            echo $output;
        }
    }

    public function getStatesVal()
    {
        $html = '';
        $zip_code = $this->input->post('zip_id');
        $data['state_val'] = $this->admin_model->getStateVal($zip_code);
        if ($data['state_val']) {
            foreach ($data['state_val'] as $r) {
                if ($r['statecode'] == $this->session->userdata('statecode')) {
                    $selected = 'selected=selected';
                } else {
                    $selected = '';
                }

                if (!$this->session->userdata('id')) {
                    $html .= '<option value="'.$r['statecode'].'">'.$r['state'].'</option>';
                } else {
                    $html .= '<option value="'.$r['statecode'].'" '.$selected.'>'.$r['state'].'</option>';
                }
            }
            $val = ['success' => 'yes', 'html' => $html];
            $output = json_encode($val);
            echo $output;
        } else {
            $val = ['success' => 'no'];
            $output = json_encode($val);
            echo $output;
        }
    }

    public function pages()
    {
        if (1 == $this->session->userdata('id')) {
            $data['contents'] = $this->admin_model->pageData();
            if ('' != $data['contents']) {
                $this->load->view('admin/update_page', $data);
            } else {
                $this->load->view('admin/pages');
            }
        } else {
            redirect('admin', 'refresh');
        }
    }

    public function addPageContent()
    {
        if (1 == $this->session->userdata('id')) {
            $title = $this->input->post('title');
            $content = $this->input->post('content');

            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            /*$config['max_size']	= '100';
                $config['max_width']  = '1024';
            */
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('up_file')) {
                $file_data = $this->upload->data();
                $db_data = [
                    'page_key' => 'aboutus',
                    'title' => $title,
                    'content' => $content,
                    'file_name' => $file_data['file_name'], ];
                $res = $this->admin_model->addPageContent($db_data);
                if ($res) {
                    echo "<script>alert('Content Added');</script>";
                    $url = 'admin/pages';
                    echo '
				<script>
				window.location.href = "'.base_url().$url.'";
				</script>';
                }
            } else {
                $db_data = [
                    'title' => $title,
                    'content' => $content, ];
                $res = $this->admin_model->addPageContent($db_data);
                if ($res) {
                    echo "<script>alert('Content Added');</script>";
                    $url = 'admin/pages';
                    echo '
				<script>
				window.location.href = "'.base_url().$url.'";
				</script>';
                }
            }
        } else {
            redirect('admin', 'refresh');
        }
    }

    public function updatePageContent()
    {
        if (1 == $this->session->userdata('id')) {
            $title = $this->input->post('title');
            $content = $this->input->post('content');

            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            /*$config['max_size']	= '100';
                $config['max_width']  = '1024';
            */
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('up_file')) {
                $file_data = $this->upload->data();
                $db_data = [
                    'page_key' => 'aboutus',
                    'title' => $title,
                    'content' => $content,
                    'file_name' => $file_data['file_name'], ];
                $res = $this->admin_model->updatePageContent($db_data);
                if ($res) {
                    echo "<script>alert('Content Added');</script>";
                    $url = 'admin/pages';
                    echo '
				<script>
				window.location.href = "'.base_url().$url.'";
				</script>';
                }
            } else {
                $db_data = [
                    'page_key' => 'aboutus',
                    'title' => $title,
                    'content' => $content, ];
                $res = $this->admin_model->updatePageContent($db_data);
                if ($res) {
                    echo "<script>alert('Content Added');</script>";
                    $url = 'admin/pages';
                    echo '
				<script>
				window.location.href = "'.base_url().$url.'";
				</script>';
                }
            }
        } else {
            redirect('admin', 'refresh');
        }
    }

    public function footer()
    {
        if (1 == $this->session->userdata('id')) {
            $data['contents'] = $this->admin_model->footerPageData();
            if ('' != $data['contents']) {
                $this->load->view('admin/update_footer', $data);
            } else {
                $this->load->view('admin/footer_page');
            }
        } else {
            redirect('admin', 'refresh');
        }
    }

    public function addfooterContent()
    {
        if (1 == $this->session->userdata('id')) {
            $title = $this->input->post('title');
            $content = $this->input->post('content');

            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            /*$config['max_size']	= '100';
                $config['max_width']  = '1024';
            */
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('up_file')) {
                $file_data = $this->upload->data();
                $db_data = [
                    'page_key' => 'footer',
                    'title' => $title,
                    'content' => $content,
                    'file_name' => $file_data['file_name'], ];
                $res = $this->admin_model->addFooterPageContent($db_data);
                if ($res) {
                    echo "<script>alert('Content Added');</script>";
                    $url = 'admin/footer';
                    echo '
				<script>
				window.location.href = "'.base_url().$url.'";
				</script>';
                }
            } else {
                $db_data = [
                    'page_key' => 'footer',
                    'title' => $title,
                    'content' => $content, ];
                $res = $this->admin_model->addFooterPageContent($db_data);
                if ($res) {
                    echo "<script>alert('Content Added');</script>";
                    $url = 'admin/footer';
                    echo '
				<script>
				window.location.href = "'.base_url().$url.'";
				</script>';
                }
            }
        } else {
            redirect('admin', 'refresh');
        }
    }

    public function updateFooterPageContent()
    {
        if (1 == $this->session->userdata('id')) {
            $title = $this->input->post('title');
            $content = $this->input->post('content');

            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            /*$config['max_size']	= '100';
                $config['max_width']  = '1024';
            */
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('up_file')) {
                $file_data = $this->upload->data();
                $db_data = [
                    'page_key' => 'footer',
                    'title' => $title,
                    'content' => $content,
                    'file_name' => $file_data['file_name'], ];
                $res = $this->admin_model->updateFooterPageContent($db_data);
                if ($res) {
                    echo "<script>alert('Content Added');</script>";
                    $url = 'admin/footer';
                    echo '
				<script>
				window.location.href = "'.base_url().$url.'";
				</script>';
                }
            } else {
                $db_data = [
                    'page_key' => 'footer',
                    'title' => $title,
                    'content' => $content, ];
                $res = $this->admin_model->updateFooterPageContent($db_data);
                if ($res) {
                    echo "<script>alert('Content Added');</script>";
                    $url = 'admin/footer';
                    echo '
				<script>
				window.location.href = "'.base_url().$url.'";
				</script>';
                }
            }
        } else {
            redirect('admin', 'refresh');
        }
    }

    public function pageConfigFooter()
    {
        if (1 == $this->session->userdata('id')) {
            $data['contents'] = $this->admin_model->customizationFooter();
            if ('' != $data['contents']) {
                $this->load->view('admin/up_page_footer_config', $data);
            } else {
                $this->load->view('admin/ad_page_footer_config');
            }
        } else {
            redirect('admin', 'refresh');
        }
    }

    public function pageConfigHeader()
    {
        if (1 == $this->session->userdata('id')) {
            $data['contents'] = $this->admin_model->customizationHeader();
            if ('' != $data['contents']) {
                $this->load->view('admin/up_page_header_config', $data);
            } else {
                $this->load->view('admin/ad_page_header_config');
            }
        } else {
            redirect('admin', 'refresh');
        }
    }

    public function saveColor()
    {
        if (1 == $this->session->userdata('id')) {
            $container = $this->input->post('container');
            if ('footer_color' == $container) {
                $color = $this->input->post('footer_color');
                $db_data = ['ckey' => $container, 'cvalue' => $color];
                $res = $this->admin_model->saveColor($db_data);
            } else {
                $color = $this->input->post('header_color');
                $db_data = ['ckey' => $container, 'cvalue' => $color];
                $res = $this->admin_model->saveColor($db_data);
            }
            if ($res) {
                if ('footer_color' == $container) {
                    $val = ['success' => 'yes'];
                    $output = json_encode($val);
                    echo $output;
                } else {
                    echo "<script>alert('Color Saved');</script>";
                    $url = 'admin/pageConfigHeader';
                    echo '
				<script>
				window.location.href = "'.base_url().$url.'";
				</script>';
                }
            } else {
                if ('footer_color' == $container) {
                    $val = ['success' => 'no'];
                    $output = json_encode($val);
                    echo $output;
                } else {
                    echo "<script>alert('Color Saved');</script>";
                    $url = 'admin/pageConfigHeader';
                    echo '
				<script>
				window.location.href = "'.base_url().$url.'";
				</script>';
                }
            }
        }
    }

    public function updateColor()
    {
        if (1 == $this->session->userdata('id')) {
            $container = $this->input->post('container');
            if ('footer_color' == $container) {
                $color = $this->input->post('footer_color');
                $db_data = ['ckey' => $container, 'cvalue' => $color];
                $res = $this->admin_model->updateColor($db_data);
            } else {
                $color = $this->input->post('header_color');
                $db_data = ['ckey' => $container, 'cvalue' => $color];
                $res = $this->admin_model->updateColor($db_data);
            }
            if ($res) {
                if ('footer_color' == $container) {
                    $val = ['success' => 'yes'];
                    $output = json_encode($val);
                    echo $output;
                } else {
                    echo "<script>alert('Color Saved');</script>";
                    $url = 'admin/pageConfigHeader';
                    echo '
				<script>
				window.location.href = "'.base_url().$url.'";
				</script>';
                }
            } else {
                if ('footer_color' == $container) {
                    $val = ['success' => 'no'];
                    $output = json_encode($val);
                    echo $output;
                } else {
                    echo "<script>alert('Color Saved');</script>";
                    $url = 'admin/pageConfigHeader';
                    echo '
				<script>
				window.location.href = "'.base_url().$url.'";
				</script>';
                }
            }
        }
    }

    public function adTitle()
    {
        if (1 == $this->session->userdata('id')) {
            $data['contents'] = $this->admin_model->geSiteTitle();
            if ('' != $data['contents']) {
                $this->load->view('admin/up_title', $data);
            } else {
                $this->load->view('admin/ad_title');
            }
        } else {
            redirect('admin', 'refresh');
        }
    }

    public function saveTitle()
    {
        if (1 == $this->session->userdata('id')) {
            $title = $this->input->post('title');
            $db_data = ['ckey' => 'site_title', 'cvalue' => $title];
            $res = $this->admin_model->saveTitle($db_data);
            if ($res) {
                $val = ['success' => 'yes'];
                $output = json_encode($val);
                echo $output;
            } else {
                $val = ['success' => 'no'];
                $output = json_encode($val);
                echo $output;
            }
        }
    }

    public function updateTitle()
    {
        if (1 == $this->session->userdata('id')) {
            $title = $this->input->post('title');
            $db_data = ['ckey' => 'site_title', 'cvalue' => $title];
            $res = $this->admin_model->updateTitle($db_data);
            if ($res) {
                $val = ['success' => 'yes'];
                $output = json_encode($val);
                echo $output;
            } else {
                $val = ['success' => 'no'];
                $output = json_encode($val);
                echo $output;
            }
        }
    }

    public function addLogo()
    {
        if (1 == $this->session->userdata('id')) {
            $this->load->view('admin/ad_logo');
        }
    }

    public function saveLogo()
    {
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        // $config['max_size']	= '100';
        $config['max_width'] = '250';
        $config['max_height'] = '115';
        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        //$this->upload->do_upload();
        if (!$this->upload->do_upload('logo')) {
            $error = ['error' => $this->upload->display_errors()];
            foreach ($error as $err) {
            }
            echo "<script language='javascript'>alert('upload failed');</script>";
            redirect('admin/addLogo');
        }
        $file_data = $this->upload->data();
        $db_data = ['ckey' => 'site_logo', 'cvalue' => $file_data['file_name']];
        $res = $this->admin_model->saveLogo($db_data);
        if ($res) {
            echo "<script>alert('Logo Saved');</script>";
            $url = 'admin/addLogo';
            echo '
				<script>
				window.location.href = "'.base_url().$url.'";
				</script>';
        }
    }

    public function hyperLinkColor()
    {
        if (1 == $this->session->userdata('id')) {
            $data['contents'] = $this->admin_model->gethyperLinkColor();
            if ('' != $data['contents']) {
                $this->load->view('admin/up_hyperlink', $data);
            } else {
                $this->load->view('admin/ad_hyperlink');
            }
        } else {
            redirect('admin', 'refresh');
        }
    }

    public function saveHycolor()
    {
        if (1 == $this->session->userdata('id')) {
            $db_data = ['ckey' => 'hylinkcolor', 'cvalue' => $this->input->post('hycolor')];
            $res = $this->admin_model->saveHyColor($db_data);
            if ($res) {
                $val = ['success' => 'yes'];
                $output = json_encode($val);
                echo $output;
            } else {
                $val = ['success' => 'no'];
                $output = json_encode($val);
                echo $output;
            }
        }
    }

    public function updateHycolor()
    {
        if (1 == $this->session->userdata('id')) {
            $db_data = ['ckey' => 'hylinkcolor', 'cvalue' => $this->input->post('hycolor')];
            $res = $this->admin_model->updateHycolor($db_data);
            if ($res) {
                $val = ['success' => 'yes'];
                $output = json_encode($val);
                echo $output;
            } else {
                $val = ['success' => 'no'];
                $output = json_encode($val);
                echo $output;
            }
        }
    }

    public function btnColor()
    {
        if (1 == $this->session->userdata('id')) {
            $data['contents'] = $this->admin_model->getbtncolor();
            if ('' != $data['contents']) {
                $this->load->view('admin/up_btn_color', $data);
            } else {
                $this->load->view('admin/ad_btn_color');
            }
        } else {
            redirect('admin', 'refresh');
        }
    }

    public function savebtncolor()
    {
        if (1 == $this->session->userdata('id')) {
            $db_data = ['ckey' => 'btn_color', 'cvalue' => $this->input->post('color')];
            $res = $this->admin_model->savebtncolor($db_data);
            if ($res) {
                $val = ['success' => 'yes'];
                $output = json_encode($val);
                echo $output;
            } else {
                $val = ['success' => 'no'];
                $output = json_encode($val);
                echo $output;
            }
        }
    }

    public function updatebtncolor()
    {
        if (1 == $this->session->userdata('id')) {
            $db_data = ['ckey' => 'btn_color', 'cvalue' => $this->input->post('color')];
            $res = $this->admin_model->updatebtncolor($db_data);
            if ($res) {
                $val = ['success' => 'yes'];
                $output = json_encode($val);
                echo $output;
            } else {
                $val = ['success' => 'no'];
                $output = json_encode($val);
                echo $output;
            }
        }
    }

    public function adminCEmail()
    {
        if (1 == $this->session->userdata('id')) {
            $data['res'] = $this->admin_model->adminGetCEmail();
            if ($data['res']) {
                $this->load->view('admin/adminupemail', $data);
            } else {
                $this->load->view('admin/adminemail');
            }
        }
    }

    public function adminSCEmail()
    {
        if (1 == $this->session->userdata('id')) {
            $email = $this->input->post('email');
            $db_data = ['ckey' => 'admin_email', 'cvalue' => $email];
            $res = $this->admin_model->adminSCEmail($db_data);
            if ($res) {
                echo "<script> alert('Email Added');</script>";
                $url = 'admin/adminUEmail';
                echo '<script>window.location.href = "'.base_url().$url.'";</script>';
            }
        }
    }

    public function adminUEmail()
    {
        if (1 == $this->session->userdata('id')) {
            $data['res'] = $this->admin_model->adminGetCEmail();
            $this->load->view('admin/adminupemail', $data);
        }
    }

    public function officeAddr()
    {
        if (1 == $this->session->userdata('id')) {
            $data['res'] = $this->admin_model->officeLocUp();
            if ($data['res']) {
                $this->load->view('admin/location_up', $data);
            } else {
                $this->load->view('admin/officeaddrs');
            }
        }
    }

    public function officeLoc()
    {
        if (1 == $this->session->userdata('id')) {
            $location = $this->input->post('location');
            $db_data = ['ckey' => 'map_location', 'cvalue' => $location];
            $res = $this->admin_model->officeLoc($db_data);
            if (1 == $res) {
                echo "<script> alert('Address Added');</script>";
                $url = 'admin/officeLocUp';
                echo '<script>window.location.href = "'.base_url().$url.'";</script>';
            }
        }
    }

    public function officeLocUp()
    {
        if (1 == $this->session->userdata('id')) {
            $data['res'] = $this->admin_model->officeLocUp();
            $this->load->view('admin/location_up', $data);
        }
    }

    public function sentNewsletter($rnd_id, $typeId_val)
    {
        $data['email_ids'] = $this->admin_model->getnewletterEmailId();
        $data['smtpemail'] = $this->admin_model->adminGetCEmail();
        $smtpemailid = $data['smtpemail']['contents']->cvalue;
        $data['smtppass'] = $this->admin_model->adminGetCEmailPass();
        $smtppass = $data['smtppass']['contents']->cvalue;
        $data['res'] = $this->admin_model->getnewletter($rnd_id, $typeId_val);
        $data['site_logo'] = $this->admin_model->getSiteLogo();
        $site_main_logo = $data['site_logo']['contents']->cvalue;
        if ($data['res']) {
            foreach ($data['res'] as $result) {
            }
            $this->load->library('email');

            $from_email = $smtpemailid;
            $data['siteTitle'] = $this->admin_model->geSiteTitle();
            $web = $data['siteTitle']['contents']->cvalue;

            foreach ($data['email_ids'] as $email_is) {
                $this->email->clear();
                $this->email->from($from_email, $web);
                $mymail = $email_is->email;

                $this->email->to($mymail);
                $this->email->subject('Webggroup Property Report News Letter');
                if (53 == $typeId_val || 55 == $typeId_val || 54 == $typeId_val || 60 == $typeId_val || 63 == $typeId_val || 62 == $typeId_val || 61 == $typeId_val || 77 == $typeId_val || 76 == $typeId_val || 78 == $typeId_val || 57 == $typeId_val || 56 == $typeId_val || 67 == $typeId_val) {
                    $ab = explode(',', $result['filename']);
                    $message = '<html><body>';
                    $message .= '<img src="'.base_url().'uploads/'.$site_main_logo.'" alt="WebGroup" />';
                    $message .= '<table rules="all" style="border-color: #666;" cellpadding="20" widhth="700px">';
                    $message .= "<tr style='background: #eee;'><td width='250px'><img src='".base_url().'uploads/'.$ab[0]."' alt='WebGroup' style='width:200px;height:150px;'/></td>
								<td width='200px'><strong><font color='blue'>
								".strip_tags($result['title']).'</font></strong><br/>'
                    .strip_tags($result['address']).'<br/>'
                    .strip_tags($result['city']).'<br/>'
                    .strip_tags($result['zip']).','
                    .strip_tags($result['state'])."
								</td>
								<td><strong>Price :<font color='green'>$".strip_tags($result['price']).'</font></strong></td>
								</tr>';
                    if (1 == $result['forSale']) {
                        $message .= "<tr style='background: #eee;'><td colspan='3'>".$result['description']."<a href='".base_url().'home/propertySaleDetail?id='.$result['resId']."'> Read More>>></a></td>";
                    } else {
                        $message .= "<tr style='background: #eee;'><td colspan='3'>".$result['description']."<a href='".base_url().'propertyRentDetail?id='.$result['resId']."'> Read More>>></a></td>";
                    }
                    $message .= "</table><hr><br><br>If you do not want any of our Property Reports, please use this link to remove yourself:
							<a href='".base_url().'home/unSubscribe?key='.$email_is->key."'>Unsubscribe</a>";
                    $message .= '</body></html>';
                } else {
                    $ab = explode(',', $result['filename']);
                    $message = '<html><body>';
                    $message .= '<img src="'.base_url().'uploads/'.$site_main_logo.'" alt="WebGroup" />';
                    $message .= '<table rules="all" style="border-color: #666;" cellpadding="20" widhth="700px">';
                    $message .= "<tr style='background: #eee;'><td width='250px'><img src='".base_url().'uploads/'.$ab[0]."' alt='WebGroup' style='width:200px;height:150px;'/></td>
								<td width='200px'><strong><font color='blue'>
								".strip_tags($result['title']).'</font></strong><br/>'
                    .strip_tags($result['address']).'<br/>'
                    .strip_tags($result['city']).'<br/>'
                    .strip_tags($result['zip']).','
                    .strip_tags($result['state'])."
								</td>
								<td><strong>Price :<font color='green'>$".strip_tags($result['price']).'</font></strong></td>
								</tr>';
                    if (1 == $result['forSale']) {
                        $message .= "<tr style='background: #eee;'><td colspan='3'>".$result['description']."<a href='".base_url().'home/propertyComSaleDetail?id='.$result['commId']."'> Read More>>></a></td>";
                    } else {
                        $message .= "<tr style='background: #eee;'><td colspan='3'>".$result['description']."<a href='".base_url().'propertyComRentDetail?id='.$result['commId']."'> Read More>>></a></td>";
                    }
                    $message .= "</table><hr><br><br>If you do not want any of our Property Reports, please use this link to remove yourself:
							<a href='".base_url().'home/unSubscribe?key='.$email_is->key."'>Unsubscribe</a>";
                    $message .= '</body></html>';
                }
                $this->email->message($message);
                $this->email->send();
            }
        }
    }

    /*public function test() {
        $data['siteTitle'] = $this->admin_model->geSiteTitle();
        print_r($data['siteTitle']);
        $web = $data['siteTitle']['contents']->cvalue;
        echo $web;

    */
    public function bannerColor()
    {
        if (1 == $this->session->userdata('id')) {
            $data['contents'] = $this->admin_model->getBannorColor();
            if ('' != $data['contents']) {
                $this->load->view('admin/update_bannercolor', $data);
            } else {
                $this->load->view('admin/add_bannerColor');
            }
        } else {
            redirect('admin', 'refresh');
        }
    }

    public function saveBannor()
    {
        if (1 == $this->session->userdata('id')) {
            $db_data = ['ckey' => 'banner_color', 'cvalue' => $this->input->post('color')];
            $res = $this->admin_model->saveBannor($db_data);
            if ($res) {
                $val = ['success' => 'yes'];
                $output = json_encode($val);
                echo $output;
            } else {
                $val = ['success' => 'no'];
                $output = json_encode($val);
                echo $output;
            }
        }
    }

    public function adminCEmailPass()
    {
        if (1 == $this->session->userdata('id')) {
            $data['res'] = $this->admin_model->adminGetCEmailPass();
            if ($data['res']) {
                $this->load->view('admin/adminemailPass', $data);
            } else {
                $this->load->view('admin/adminemailPass');
            }
        }
    }

    public function adminSCEmailPass()
    {
        if (1 == $this->session->userdata('id')) {
            $smtppassword = $this->input->post('smtppassword');
            $db_data = ['ckey' => 'admin_smtp_pass', 'cvalue' => $smtppassword];
            $res = $this->admin_model->adminSCEmailPass($db_data);
            if ($res) {
                echo "<script> alert('Password Added');</script>";
                $url = 'admin/adminCEmailPass';
                echo '<script>window.location.href = "'.base_url().$url.'";</script>';
            }
        }
    }

    /*public function adminUEmailPass(){
        if($this->session->userdata('id')==1){
        $data['res']= $this->admin_model->adminGetCEmailPassword();
        $this->load->view('admin/adminupemailPass',$data);
        }
    */
}
