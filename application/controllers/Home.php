<?php

defined('BASEPATH') or exit('No direct script access allowed');
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

class Home extends CI_Controller
{
    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     *         http://example.com/index.php/welcome
     *    - or -
     *         http://example.com/index.php/welcome/index
     *    - or -
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
        $this->load->model('home_model');
        $this->load->library(['session', 'form_validation', 'pagination']);
        $this->load->helper('cookie');
    }

    public function index()
    {
        $this->header();
        $data['slider'] = $this->home_model->propertySlider();
        $data['slider_com'] = $this->home_model->propertyComSlider();
        $data['residential'] = $this->home_model->propertySaleListRes();
        $data['aboutus'] = $this->home_model->pageContent();
        $data['recomended'] = $this->home_model->recommendedList();
        $this->load->view('index', $data);
        $this->footer();
        //    $thi
    }

    public function about()
    {
        $this->header();
        $data['page'] = $this->home_model->pageContent();
        $this->load->view('about', $data);
        $this->footer();
    }

    public function footer()
    {
        $data['address'] = $this->home_model->footerPageData();
        $data['style'] = $this->home_model->getStyle();
        $this->load->view('footer', $data);
    }

    public function header()
    {
        $data['style'] = $this->home_model->getStyleHead();
        $data['site_title'] = $this->home_model->getSiteTitle();
        $data['site_logo'] = $this->home_model->getSiteLogo();
        $data['hycolor'] = $this->home_model->getHycolor();
        $data['btncolors'] = $this->home_model->getbtncolor();
        $data['bannercolor'] = $this->home_model->getBanner();
        $this->load->view('header', $data);
    }

    public function agents()
    {
        $this->header();
        $data['result'] = $this->home_model->manageAgents();
        $this->load->view('agents', $data);
        $this->footer();
    }

    public function contact()
    {
        $this->header();
        $data['map_address'] = $this->home_model->officeLocUp();
        $this->load->view('contact', $data);
        $this->footer();
    }

    public function forSale()
    {
        $this->header();
        $config = [];
        $config['base_url'] = base_url().'home/forSale';
        $total_row = $this->home_model->record_count();
        $config['total_rows'] = $total_row;
        $config['per_page'] = 18;
        $config['use_page_numbers'] = true;
        $config['num_links'] = $total_row;
        $config['cur_tag_open'] = '&nbsp;<a class="current">';
        $config['cur_tag_close'] = '</a>';
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';
        $config['uri_segment'] = 3;

        $this->pagination->initialize($config);
        if ($this->uri->segment(3)) {
            $page = ($this->uri->segment(3));
        } else {
            $page = 0;
        }

        //   $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        //   if($page >0){
        //   $page =(($page-1) *3)-($page-1);
        // }
        //echo $page;
        /*
        $limitStart = empty($page) ? $page = 1 : $page;

        $limitStart = ($limitStart - 1) * $config["per_page"];*/
        // Limit start  instead of page;
        $data['residential'] = $this->home_model->propertySaleListRes1($config['per_page'], $page);

        $cpt = count($data['residential']);
        $data['commercial'] = null;
        if ($cpt < $config['per_page']) {
            $config['per_page'] = $config['per_page'] - $cpt;
            //echo $this->home_model->res_count;
            /*$first_total_pages = floor($this->home_model->res_count / $config["per_page"]) + ($this->home_model->res_count % $config["per_page"]);
            //echo $first_total_pages .;
            $limitStart = empty($page) ? $page = 1 : ($page-$first_total_pages);
            $config["per_page1"]= ($config["per_page"] - $cpt);*/
            //$config["per_page"]= $config["per_page"]-$cpt;
            $data['commercial'] = $this->home_model->propertySaleListCom1($config['per_page'], $page);
        }
        $data['hotpop'] = $this->home_model->hotPropSale();
        $str_links = $this->pagination->create_links();
        $data['links'] = explode('&nbsp;', $str_links);

        $this->load->view('forsale', $data);
        $this->footer();

        // $data['residential']=$this->home_model->propertySaleListRes();
        // $this->load->view('forsale',$data);
    }

    public function forRent()
    {
        $this->header();
        $config = [];
        $config['base_url'] = base_url().'home/forRent';
        $total_row = $this->home_model->record_count_rent();
        $config['total_rows'] = $total_row;
        $config['per_page'] = 18;
        $config['use_page_numbers'] = true;
        $config['num_links'] = $total_row;
        $config['cur_tag_open'] = '&nbsp;<a class="current">';
        $config['cur_tag_close'] = '</a>';
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';
        $config['uri_segment'] = 3;

        $this->pagination->initialize($config);
        if ($this->uri->segment(3)) {
            $page = ($this->uri->segment(3));
        } else {
            $page = 0;
        }
        /*$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        if($page >0){
        $page =(($page-1) *10)-($page-1);
        }*/

        $data['residential'] = $this->home_model->propertyRentListResd($config['per_page'], $page);
        $cpt = count($data['residential']);
        $data['commercial'] = null;
        if ($cpt < $config['per_page']) {
            $config['per_page'] = $config['per_page'] - $cpt;
            $data['commercial'] = $this->home_model->propertyRentListCommercial($config['per_page'], $page);
        }
        $data['hotpop'] = $this->home_model->hotPropRent();
        $str_links = $this->pagination->create_links();
        $data['links'] = explode('&nbsp;', $str_links);

        // View data according to array.
        $this->load->view('forrent', $data);
        $this->footer();
    }

    public function propertySaleDetail()
    {
        $this->header();
        $resId = $this->input->get('id');
        $data['result'] = $this->home_model->propertySaleDetailed($resId);
        $data['hotpop'] = $this->home_model->hotPropSale();
        $data['interiors'] = $this->home_model->propertySaleDetailedInte($resId);
        /*    echo"<pre>";
        print_r($data);exit();*/
        // $data['agents']=$this->$this->home_model->postAgentData($resId);
        $this->load->view('prop_detail_sale', $data);
        $this->footer();
    }

    public function propertyComSaleDetail()
    {
        $this->header();
        $commId = $this->input->get('id');
        $data['result'] = $this->home_model->propertyComSaleDetailed($commId);
        $data['hotpop'] = $this->home_model->hotPropSale();
        $data['interiors'] = $this->home_model->propertyComSaleDetailedInte($commId);
        if ($data['result']) {
            $this->load->view('prop_com_sale_detail', $data);
        }

        $this->footer();
    }

    public function propertyRentDetail()
    {
        $this->header();
        $resId = $this->input->get('id');
        $data['result'] = $this->home_model->propertyRentDetailed($resId);
        $data['hotpop'] = $this->home_model->hotPropRent();
        $data['interiors'] = $this->home_model->propertyRentDetailedInte($resId);
        $this->load->view('prop_detail_rent', $data);
        $this->footer();
    }

    public function propertyComRentDetail()
    {
        $this->header();
        $commId = $this->input->get('id');
        $data['result'] = $this->home_model->propertyComRentDetailed($commId);
        $data['hotpop'] = $this->home_model->hotPropRent();
        $data['interiors'] = $this->home_model->propertyComRentDetailedInte($commId);
        $this->load->view('prop_com_rent_detail', $data);
        $this->footer();
    }

    public function register()
    {
        $this->load->view('register');
        $this->footer();
    }

    public function searchProp()
    {
        $this->header();

        $search_data = $this->input->post('search_data');
        $prop_type = $this->input->post('prop_type');
        $price = $this->input->post('price');
        if ('' != $prop_type) {
            /*$newdata = array('type' => $prop_type);
            $this->session->set_userdata($newdata);
            echo $pro_type=$this->session->userdata('type');*/
            // $typeId = $this->input->post('typeId');
            $config = [];
            $config['base_url'] = base_url().'home/searchProp';
            $total_row = $this->home_model->record_count_search($prop_type, $price, $search_data);
            $config['total_rows'] = $total_row;
            $config['per_page'] = 18;
            $config['use_page_numbers'] = true;
            $config['num_links'] = $total_row;
            $config['cur_tag_open'] = '&nbsp;<a class="current">';
            $config['cur_tag_close'] = '</a>';
            $config['next_link'] = 'Next';
            $config['prev_link'] = 'Previous';
            $config['uri_segment'] = 3;

            $this->pagination->initialize($config);
            if ($this->uri->segment(3)) {
                $page = ($this->uri->segment(3));
            } else {
                $page = 0;
            }
            /* $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
            if($page >0){
            $page =(($page-1) *10)-($page-1);
            }*/

            $data['search_result_res'] = $this->home_model->propertySearchResult($config['per_page'], $page, $prop_type, $price, $search_data);
            /*$cpt = count($data["search_result_res"]);
            $config["per_page"];

            $data["search_result_com"] = null;
            if ($cpt < $config["per_page"]) {
            $config["per_page"] = $config["per_page"] - $cpt;

            $data["search_result_com"] = $this->home_model->propSearchCom($config["per_page"], $page, $prop_type, $price, $search_data);
            }*/
            //$data['hotpop'] = $this->home_model->hotPropSale();

            /* $get_vars = $this->input->get();

            if(is_array($get_vars))
            $config['suffix'] = '?'.http_build_query($get_vars, "&");*/

            $str_links = $this->pagination->create_links();
            $data['links'] = explode('&nbsp;', $str_links);
            // print_r($data["links"]);

            // View data according to array.
            $data['search_arry'] = ['prop_type' => $prop_type, 'price' => $price, 'title' => $search_data];
            $this->load->view('search_result', $data);
            $this->footer();
        } else {
            $url = 'home/index';
            echo '<script>window.location.href = "'.base_url().$url.'";</script>';
        }

        // $data['residential']=$this->home_model->propertySaleListRes();
        // $this->load->view('forsale',$data);
    }

    public function postEnquiry()
    {
        $agent_email = $this->input->post('agent_email');
        $name = $this->input->post('fullname');
        $from_email = $this->input->post('email');
        $number = $this->input->post('number');
        $text_message = $this->input->post('message');
        $propid = $this->input->post('propid');
        $proptitle = $this->input->post('proptitle');
        $to_email = $agent_email;
        $data['smtpemail'] = $this->home_model->getCEmail();
        $smtp_email = $data['smtpemail']['contents']->cvalue;
        $data['smtppassword'] = $this->home_model->getCEmailPass();
        $smtppass = $data['smtppassword']['contents']->cvalue;
        $data['site_logo'] = $this->home_model->getSiteLogo();
        $site_main_logo = $data['site_logo']['contents']->cvalue;
        $this->load->library('email');
        $data['site_title'] = $this->home_model->getSiteTitle();
        $web = $data['site_title']['contents']->cvalue;
        $this->email->from($from_email, $web);
        $this->email->to($to_email);
        $this->email->subject('New Enquiry');
        $message = '<html><body>';
        $message .= '<img src='.base_url().'uploads/'.$site_main_logo.'" alt="WebGroup" />';
        $message .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
        $message .= "<tr style='background: #eee;'><td><strong>Name:</strong> </td><td>".strip_tags($name).'</td></tr>';
        $message .= '<tr><td><strong>Email:</strong> </td><td>'.strip_tags($from_email).'</td></tr>';
        $message .= '<tr><td><strong>Number:</strong> </td><td>'.strip_tags($number).'</td></tr>';
        $message .= '<tr><td><strong>Message:</strong> </td><td>'.strip_tags($text_message).'</td></tr>';
        $message .= "<tr style='background: #eee;'><td><strong>Property Title:</strong> </td><td>".strip_tags($propid).'</td></tr>';
        $message .= "<tr style='background: #eee;'><td><strong>Property Title:</strong> </td><td>".strip_tags($proptitle).'</td></tr>';
        $message .= '</table>';
        $message .= '</body></html>';
        $this->email->message($message);
        if ($this->email->send()) {
            // mail sent
            $val = ['success' => 'yes'];
            $output = json_encode($val);
            echo $output;
        } else {
            $val = ['success' => 'no'];
            $output = json_encode($val);
            echo $output;
        }
    }

    public function contactUs()
    {
        $name = $this->input->post('name');
        $from_email = $this->input->post('from_email');
        $number = $this->input->post('number');
        $text_message = $this->input->post('message');
        $data['smtpemail'] = $this->home_model->getCEmail();
        $smtp_email = $data['smtpemail']['contents']->cvalue;
        $data['smtppassword'] = $this->home_model->getCEmailPass();
        $smtppass = $data['smtppassword']['contents']->cvalue;
        $data['site_logo'] = $this->home_model->getSiteLogo();
        $site_main_logo = $data['site_logo']['contents']->cvalue;
        $this->load->library('email');
        $data['site_title'] = $this->home_model->getSiteTitle();
        $web = $data['site_title']['contents']->cvalue;
        $this->email->from($from_email, $web);
        $this->email->to($smtp_email);
        $this->email->subject('New Enquiry');

        $message = '<html><body>';
        $message .= '<img src="'.base_url().'uploads/'.$site_main_logo.'" alt="Website Change Request" />';
        $message .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
        $message .= "<tr style='background: #eee;'><td><strong>Name:</strong> </td><td>".strip_tags($name).'</td></tr>';
        $message .= '<tr><td><strong>Email:</strong> </td><td>'.strip_tags($from_email).'</td></tr>';
        $message .= '<tr><td><strong>Number:</strong> </td><td>'.strip_tags($number).'</td></tr>';
        $message .= '<tr><td><strong>Message:</strong> </td><td>'.strip_tags($text_message).'</td></tr>';
        /*$message .= "<tr><td><strong>URL To Change (main):</strong> </td><td>" . $_POST['URL-main'] . "</td></tr>";
        $addURLS = $_POST['addURLS'];
        if (($addURLS) != '') {
        $message .= "<tr><td><strong>URL To Change (additional):</strong> </td><td>" . strip_tags($addURLS) . "</td></tr>";
        }
        $curText = htmlentities($_POST['curText']);
        if (($curText) != '') {
        $message .= "<tr><td><strong>CURRENT Content:</strong> </td><td>" . $curText . "</td></tr>";
        }
        $message .= "<tr><td><strong>NEW Content:</strong> </td><td>" . htmlentities($_POST['newText']) . "</td></tr>";*/
        $message .= '</table>';
        $message .= '</body></html>';

        $this->email->message($message);
        if ($this->email->send()) {
            // mail sent
            // $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Your mail has been sent successfully!</div>');
            echo "<script> alert('Your mail has been sent successfully');</script>";
            $url = 'home/contact';
            echo '<script>window.location.href = "'.base_url().$url.'";</script>';
        } else {
            echo $this->email->print_debugger();
            exit();
            //error
            echo "<script> alert('Mail count not be sent');</script>";
            $url = 'home/contact';
            echo '<script>window.location.href = "'.base_url().$url.'";</script>';
        }
    }

    public function newsLetterReg()
    {
        $random_id_length = 12;

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
        $email = $this->input->post('email');
        $db_data = ['email' => $email, 'key' => $rnd_id, 'status' => 1];
        $res = $this->home_model->newsLetterReg($db_data);
        if (1 == $res) {
            $val = ['success' => 'yes'];
            $output = json_encode($val);
            echo $output;
        } else {
            $val = ['success' => 'no'];
            $output = json_encode($val);
            echo $output;
        }
    }

    public function unSubscribe()
    {
        $key_id = $this->input->get('key');
        $data['key_res'] = ['key' => $key_id];
        if ($key_id) {
            $this->header();
            $this->load->view('unsubscribe', $data);
            //$res = $this->home_model->unSubscribe($key_id);
            $this->footer();
        } else {
            $url = 'home/index';
            echo '<script>window.location.href = "'.base_url().$url.'";</script>';
        }
    }

    public function unSubprocess()
    {
        $unsubkey = $this->input->post('unsubkey');
        $res = $this->home_model->unSubprocess($unsubkey);
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

    public function testData()
    {
        $res = $this->home_model->testData();
    }
}
