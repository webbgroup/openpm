<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class home_model extends CI_Model
{
    public $res_count = 0;

    public function __construct()
    {
        parent::__construct();
        $this->load->database('database_files', true);
        $this->load->database('database_properties', true);
    }

    public function propertySlider()
    {
        $this->legacy_db = $this->load->database('database_properties', true);
        $this->legacy_db->select('r.resId,r.uniqueId,r.forSale,r.title,r.description,r.price,r.address,r.city,r.state,r.zip,ri.beds,ri.baths,ri.price as rent');
        $this->legacy_db->from('residential r');
        $this->legacy_db->join('res_interior ri', 'ri.parentId = r.resId');
        $this->legacy_db->order_by('r.resId', 'desc');
        $this->legacy_db->limit(3);
        $query = $this->legacy_db->get();
        //echo $this->legacy_db->last_query();
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
            $this->legacy_db->order_by('projId', 'desc');
            $query = $this->legacy_db->get();

            //echo $this->legacy_db->last_query();
            $i = 0;
            foreach ($query->result_array() as $row) {
                $data_ar[$i]['filename'] = $row['filename'];
                ++$i;
            }

            /*	echo "<pre>";
            print_r($data_ar);exit;*/
            return $data_ar;
        }

        return false;
    }

    public function propertyComSlider()
    {
        $this->legacy_db = $this->load->database('database_properties', true);
        $this->legacy_db->select('commId,uniqueId as uniq,forSale fs,title as ti,description as descr,price as pr,address as adr,city as ct,state as st,zip as zp');
        $this->legacy_db->limit(3);
        $this->legacy_db->order_by('commId', 'desc');
        // $this->legacy_db->where('forSale', 2);
        $query = $this->legacy_db->get('commercial');
        // echo $this->legacy_db->last_query();exit();
        if ($query->num_rows() > 0) {
            $i = 0;
            foreach ($query->result_array() as $row) {
                $data_ar[] = $row;
                $prop_id[] = $row['commId'];
                $prop_rand[] = $row['uniq'];

                $this->legacy_db->select('price as rent, rentType as type');
                $this->legacy_db->from('comm_interior');
                $this->legacy_db->where('parentId', $row['commId']);

                $query = $this->legacy_db->get();
                if ($query->num_rows() > 0) {
                    $rows = $query->result_array();
                    $data_ar[$i]['rent'] = $rows[0]['rent'];
                    $data_ar[$i]['type'] = $rows[0]['type'];
                } else {
                    $data_ar[$i]['rent'] = 0;
                    $data_ar[$i]['type'] = 0;
                }
                ++$i;
            }

            // echo $this->legacy_db->last_query();
            $this->legacy_db->close();
            $this->legacy_db = $this->load->database('database_files', true);
            $this->legacy_db->select('filename as comfile');
            $this->legacy_db->like('filename', 'ext_', 'after');
            $this->legacy_db->from('pictures');
            $this->legacy_db->where_in('uniqueId', $prop_rand);
            $this->legacy_db->where_in('projId', $prop_id);
            $this->legacy_db->order_by('projId', 'desc');
            $query = $this->legacy_db->get();

            //echo $this->legacy_db->last_query();
            $i = 0;
            foreach ($query->result_array() as $row) {
                $data_ar[$i]['comfile'] = $row['comfile'];
                ++$i;
            }

            /*echo "<pre>";
            print_r($data_ar);exit;*/
            return $data_ar;
        }

        return false;
    }

    public function propertySaleListCom()
    {
        $this->legacy_db = $this->load->database('database_properties', true);

        $query = $this->legacy_db->query('SELECT * FROM commercial WHERE forSale=1');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
    }

    public function recommendedList()
    {
        $this->legacy_db = $this->load->database('database_properties', true);
        $this->legacy_db->select('residential.*,res_interior.beds,res_interior.baths');
        $this->legacy_db->from('residential');
        $this->legacy_db->join('res_interior', 'res_interior.parentId = residential.resId');
        $this->legacy_db->where('residential.forSale', 1);
        $this->legacy_db->limit(4);
        $this->legacy_db->order_by('residential.resId', 'desc');
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
            $this->legacy_db->order_by('projId', 'desc');
            $query = $this->legacy_db->get();

            //echo $this->legacy_db->last_query();
            $i = 0;
            foreach ($query->result_array() as $row) {
                $data_ar[$i]['filename'] = $row['filename'];
                ++$i;
            }

            /*echo "<pre>";
            print_r($data_ar);exit;*/
            return $data_ar;
        }

        return false;
    }

    public function propertySaleListRes()
    {
        $this->legacy_db = $this->load->database('database_properties', true);
        $this->legacy_db->select('residential.*,res_interior.beds,res_interior.baths');
        $this->legacy_db->from('residential');
        $this->legacy_db->join('res_interior', 'res_interior.parentId = residential.resId');
        // $this->legacy_db->where('residential.forSale', 1);
        // $this->legacy_db->limit($limit,$start);
        $this->legacy_db->order_by('residential.resId', 'desc');
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
            $this->legacy_db->order_by('projId', 'desc');
            $query = $this->legacy_db->get();

            //echo $this->legacy_db->last_query();
            $i = 0;
            foreach ($query->result_array() as $row) {
                $data_ar[$i]['filename'] = $row['filename'];
                ++$i;
            }

            /*echo "<pre>";
            print_r($data_ar);exit;*/
            return $data_ar;
        }

        return false;
    }

    public function record_count()
    {
        /*$this->db->where('forSale',1);
        $this->db->from('residential');
        return $this->db->count_all_results();*/
        $this->legacy_db = $this->load->database('database_properties', true);
        $this->legacy_db->where('forSale', 1);
        $this->legacy_db->from('residential');
        $count1 = $this->legacy_db->count_all_results();
        $this->res_count = $count1;
        $this->legacy_db->where('forSale', 1);
        $this->legacy_db->from('commercial');
        $count2 = $this->legacy_db->count_all_results();
        $total_count = $count1 + $count2;
        $this->legacy_db->close();

        return $total_count;
    }

    public function record_count_com_sale()
    {
        $this->legacy_db = $this->load->database('database_properties', true);
        $this->legacy_db->where('forSale', 1);
        $this->legacy_db->from('commercial');

        return $this->legacy_db->count_all_results();
    }

    public function propertySaleListCom1($limit, $start)
    {
        $this->legacy_db = $this->load->database('database_properties', true);
        $this->legacy_db->limit($limit, $start);
        $this->legacy_db->order_by('commId', 'desc');
        $this->legacy_db->where('forSale', 1);
        $query = $this->legacy_db->get('commercial');
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
            $this->legacy_db->order_by('projId', 'desc');
            $query = $this->legacy_db->get();

            //echo $this->legacy_db->last_query();
            $i = 0;
            foreach ($query->result_array() as $row) {
                $data_ar[$i]['filename'] = $row['filename'];
                ++$i;
            }

            /*echo "<pre>";
            print_r($data_ar);exit;*/
            return $data_ar;
        }
    }

    public function propertySaleListRes1($limit, $start)
    {
        $this->legacy_db = $this->load->database('database_properties', true);
        $this->legacy_db->select('residential.*,res_interior.beds,res_interior.baths');
        $this->legacy_db->from('residential');
        $this->legacy_db->join('res_interior', 'res_interior.parentId = residential.resId');
        $this->legacy_db->where('residential.forSale', 1);
        $this->legacy_db->limit($limit, $start);
        $this->legacy_db->order_by('residential.resId', 'desc');
        $query = $this->legacy_db->get();

        //echo $this->legacy_db->last_query();
        /*$qry = "SELECT * FROM commercial";
        $res = $this->db->query($qry); print_r($res->result_array());exit();
        $query= $this->db->query('SELECT r.resId,r.uniqueId,r.title,r.description,r.price FROM residential as r WHERE forSale=1 LIMIT '.$limit.','.$start.' UNION ALL SELECT c.commId,c.uniqueId,c.title,c.description,c.price FROM commercial as c WHERE forSale=1 LIMIT '.$limit.','.$start.'');
        echo $this->db->last_query();
        print_r($query);*/
        // exit();
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
            $this->legacy_db->order_by('projId', 'desc');
            $query = $this->legacy_db->get();
            // echo $this->legacy_db->last_query();exit();

            $i = 0;
            foreach ($query->result_array() as $row) {
                $data_ar[$i]['filename'] = $row['filename'];
                ++$i;
            }

            return $data_ar;
        }
    }

    public function record_count_rent()
    {
        $this->legacy_db = $this->load->database('database_properties', true);
        $this->legacy_db->where('forSale', 2);
        $this->legacy_db->from('residential');
        $count1 = $this->legacy_db->count_all_results();
        $this->legacy_db->where('forSale', 2);
        $this->legacy_db->from('commercial');
        $count2 = $this->legacy_db->count_all_results();
        $total_count = $count1 + $count2;
        $this->legacy_db->close();

        return $total_count;
    }

    public function record_count_com_rent()
    {
        $this->legacy_db = $this->load->database('database_properties', true);
        $this->legacy_db->where('forSale', 2);
        $this->legacy_db->from('commercial');

        return $this->legacy_db->count_all_results();
    }

    public function propertyRentListResd($limit, $start)
    {
        $this->legacy_db = $this->load->database('database_properties', true);
        $this->legacy_db->select('residential.*,res_interior.beds,res_interior.baths,res_interior.price as rent');
        $this->legacy_db->from('residential');
        $this->legacy_db->join('res_interior', 'res_interior.parentId = residential.resId');
        $this->legacy_db->where('residential.forSale', 2);
        $this->legacy_db->limit($limit, $start);
        $this->legacy_db->order_by('residential.resID', 'desc');
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
            $this->legacy_db->order_by('projId', 'desc');
            $query = $this->legacy_db->get();

            //echo $this->legacy_db->last_query();
            $i = 0;
            foreach ($query->result_array() as $row) {
                $data_ar[$i]['filename'] = $row['filename'];
                ++$i;
            }

            /*echo "<pre>";
            print_r($data_ar);exit;*/
            return $data_ar;
        }

        return false;
    }

    public function propertyRentListCommercial($limit, $start)
    {
        $this->legacy_db = $this->load->database('database_properties', true);
        $this->legacy_db->limit($limit, $start);
        $this->legacy_db->order_by('commId', 'desc');
        $this->legacy_db->where('forSale', 2);
        $query = $this->legacy_db->get('commercial');
        // echo $this->legacy_db->last_query();exit();
        if ($query->num_rows() > 0) {
            $i = 0;
            foreach ($query->result_array() as $row) {
                $data_ar[] = $row;
                $prop_id[] = $row['commId'];
                $prop_rand[] = $row['uniqueId'];

                $this->legacy_db->select('price as rent, rentType as type');
                $this->legacy_db->from('comm_interior');
                $this->legacy_db->where('parentId', $row['commId']);

                $query = $this->legacy_db->get();
                if ($query->num_rows() > 0) {
                    $rows = $query->result_array();
                    $data_ar[$i]['rent'] = $rows[0]['rent'];
                    $data_ar[$i]['type'] = $rows[0]['type'];
                } else {
                    $data_ar[$i]['rent'] = 0;
                    $data_ar[$i]['type'] = 0;
                }
                ++$i;
            }

            // echo $this->legacy_db->last_query();
            $this->legacy_db->close();
            $this->legacy_db = $this->load->database('database_files', true);
            $this->legacy_db->select('filename');
            $this->legacy_db->like('filename', 'ext_', 'after');
            $this->legacy_db->from('pictures');
            $this->legacy_db->where_in('uniqueId', $prop_rand);
            $this->legacy_db->where_in('projId', $prop_id);
            $this->legacy_db->order_by('projId', 'desc');
            $query = $this->legacy_db->get();

            //echo $this->legacy_db->last_query();
            $i = 0;
            foreach ($query->result_array() as $row) {
                $data_ar[$i]['filename'] = $row['filename'];
                ++$i;
            }

            /*echo "<pre>";
            print_r($data_ar);exit;*/
            return $data_ar;
        }

        return false;
    }

    public function propertyRentListCom()
    {
        $this->legacy_db = $this->load->database('database_properties', true);
        $query = $this->legacy_db->query('SELECT * FROM commercial WHERE forSale=2');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
    }

    public function propertyRentListRes()
    {
        $this->legacy_db = $this->load->database('database_properties', true);
        $query = $this->legacy_db->query('SELECT * FROM residential WHERE forSale=2  ORDER BY resid DESC LIMIT 9 ');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
    }

    public function propertySaleDetailed($resId)
    {
        $this->legacy_db = $this->load->database('database_properties', true);
        $this->legacy_db->select('r.*,r.title as tt,r.description as desc,ri.*,ri.title as tit');
        $this->legacy_db->from('residential as r');
        $this->legacy_db->join('res_interior as ri', 'ri.parentId = r.resId');
        $this->legacy_db->where('r.resID', $resId);
        $this->legacy_db->where('r.forSale', 1);
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
            $query = $this->legacy_db->get();

            //echo $this->legacy_db->last_query();
            $i = 0;
            foreach ($query->result_array() as $row) {
                $data_ar[$i]['filename'] = $row['filename'];
                ++$i;
            }

            /*	echo "<pre>";
            print_r($data_ar);exit;*/
            return $data_ar;
        }
    }

    public function postAgentData($resId)
    {
        $this->legacy_db = $this->load->database('database_properties', true);
        $this->legacy_db->select('uId');
        $this->legacy_db->from('residential');
        $this->legacy_db->where('resID', $resId);
        $query = $this->legacy_db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $uId = $row['uId'];
            }
            $this->legacy_db->close();
            $this->legacy_db = $this->load->database('database_properties', true);
        }
    }

    public function propertyComSaleDetailed($commId)
    {
        $this->legacy_db = $this->load->database('database_properties', true);
        $this->legacy_db->select('*');
        $this->legacy_db->from('commercial');
        $this->legacy_db->where('commId', $commId);
        $this->legacy_db->where('forSale', 1);
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
            $this->legacy_db->where_in('projId', $prop_id);
            $this->legacy_db->where_in('uniqueId', $prop_rand);
            $query = $this->legacy_db->get();

            //echo $this->legacy_db->last_query();
            $i = 0;
            foreach ($query->result_array() as $row) {
                $data_ar[$i]['filename'] = $row['filename'];
                ++$i;
            }

            /*echo "<pre>";
            print_r($data_ar);exit;*/
            return $data_ar;
        }
    }

    public function propertySaleDetailedInte($resId)
    {
        $this->legacy_db = $this->load->database('database_properties', true);
        $this->legacy_db->select('uniqueId');
        $this->legacy_db->from('residential');
        $this->legacy_db->where('resId', $resId);
        $this->legacy_db->where('forSale', 1);
        $query = $this->legacy_db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                //$data_ar[]=$row;
                //$prop_id[]=$row['parentId'];
                $prop_rand[] = $row['uniqueId'];
            }
        }
        $this->legacy_db->select('*');
        $this->legacy_db->from('res_interior');
        $this->legacy_db->where('parentId', $resId);
        $this->legacy_db->where('forSale', 1);
        $query = $this->legacy_db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $data_ar[] = $row;
            }
            $this->legacy_db->close();
            $this->legacy_db = $this->load->database('database_files', true);
            $this->legacy_db->select('filename');
            $this->legacy_db->like('filename', 'int_', 'after');
            $this->legacy_db->from('pictures');
            $this->legacy_db->where_in('uniqueId', $prop_rand);
            $query = $this->legacy_db->get();

            //echo $this->legacy_db->last_query();
            $i = 0;
            foreach ($query->result_array() as $row) {
                $data_ar[$i]['filename'] = $row['filename'];
                ++$i;
            }

            /*echo "<pre>";
            print_r($data_ar);exit;*/
            return $data_ar;
        }
    }

    public function propertyComSaleDetailedInte($commId)
    {
        $this->legacy_db = $this->load->database('database_properties', true);
        $this->legacy_db->select('uniqueId');
        $this->legacy_db->from('commercial');
        $this->legacy_db->where('commId', $commId);
        $this->legacy_db->where('forSale', 1);
        $query = $this->legacy_db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                /*	$data_ar[]=$row;
                $prop_id[]=$row['parentId'];*/
                $prop_rand[] = $row['uniqueId'];
            }
        }

        $this->legacy_db->select('*');
        $this->legacy_db->from('comm_interior');
        $this->legacy_db->where('parentId', $commId);
        $this->legacy_db->where('forSale', 1);
        $query = $this->legacy_db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $data_ar[] = $row;
                /*$prop_id[]=$row['parentId'];
            $prop_rand[]=$row['uniqueId'];*/
            }
            $this->legacy_db->close();
            $this->legacy_db = $this->load->database('database_files', true);
            $this->legacy_db->select('filename');
            $this->legacy_db->like('filename', 'int_', 'after');
            $this->legacy_db->from('pictures');
            $this->legacy_db->where_in('uniqueId', $prop_rand);
            $query = $this->legacy_db->get();

            //echo $this->legacy_db->last_query();
            $i = 0;
            foreach ($query->result_array() as $row) {
                $data_ar[$i]['filename'] = $row['filename'];
                ++$i;
            }

            /*echo "<pre>";
            print_r($data_ar);exit;*/
            return $data_ar;
        }
    }

    public function propertyRentDetailed($resId)
    {
        $this->legacy_db = $this->load->database('database_properties', true);
        $this->legacy_db->select('r.*,r.title as tt,r.description as desc,ri.*,ri.title as tit');
        $this->legacy_db->from('residential r');
        $this->legacy_db->join('res_interior as ri', 'ri.parentId = r.resId');
        $this->legacy_db->where('r.resID', $resId);
        $this->legacy_db->where('r.forSale', 2);
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
            $query = $this->legacy_db->get();

            //echo $this->legacy_db->last_query();
            $i = 0;
            foreach ($query->result_array() as $row) {
                $data_ar[$i]['filename'] = $row['filename'];
                ++$i;
            }

            /*echo "<pre>";
            print_r($data_ar);exit;*/
            return $data_ar;
        }
    }

    public function propertyComRentDetailed($commId)
    {
        $this->legacy_db = $this->load->database('database_properties', true);
        $this->legacy_db->select('*');
        $this->legacy_db->from('commercial');
        $this->legacy_db->where('commId', $commId);
        $this->legacy_db->where('forSale', 2);
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
            $query = $this->legacy_db->get();

            //echo $this->legacy_db->last_query();
            $i = 0;
            foreach ($query->result_array() as $row) {
                $data_ar[$i]['filename'] = $row['filename'];
                ++$i;
            }

            /*echo "<pre>";
            print_r($data_ar);exit;*/
            return $data_ar;
        }
    }

    public function propertyRentDetailedInte($resId)
    {
        $this->legacy_db = $this->load->database('database_properties', true);
        $this->legacy_db->select('uniqueId');
        $this->legacy_db->from('residential');
        $this->legacy_db->where('resId', $resId);
        $this->legacy_db->where('forSale', 2);
        $query = $this->legacy_db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                /*$data_ar[]=$row;
                $prop_id[]=$row['parentId'];*/
                $prop_rand[] = $row['uniqueId'];
            }
        }
        $this->legacy_db->select('*');
        $this->legacy_db->from('res_interior');
        $this->legacy_db->where('parentId', $resId);
        $this->legacy_db->where('forSale', 2);
        $query = $this->legacy_db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $data_ar[] = $row;
                /*$prop_id[]=$row['parentId'];
            $prop_rand[]=$row['uniqueId'];
             */
            }
            $this->legacy_db->close();
            $this->legacy_db = $this->load->database('database_files', true);
            $this->legacy_db->select('filename');
            $this->legacy_db->like('filename', 'int_', 'after');
            $this->legacy_db->from('pictures');
            $this->legacy_db->where_in('uniqueId', $prop_rand);
            $query = $this->legacy_db->get();

            //echo $this->legacy_db->last_query();
            $i = 0;
            foreach ($query->result_array() as $row) {
                $data_ar[$i]['filename'] = $row['filename'];
                ++$i;
            }

            /*echo "<pre>";
            print_r($data_ar);exit;*/
            return $data_ar;
        }
    }

    public function propertyComRentDetailedInte($commId)
    {
        $this->legacy_db = $this->load->database('database_properties', true);
        $this->legacy_db->select('uniqueId');
        $this->legacy_db->from('commercial');
        $this->legacy_db->where('commId', $commId);
        $this->legacy_db->where('forSale', 2);
        $query = $this->legacy_db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                /*	$data_ar[]=$row;
                $prop_id[]=$row['parentId'];*/
                $prop_rand[] = $row['uniqueId'];
            }
        }

        $this->legacy_db->select('*');
        $this->legacy_db->from('comm_interior');
        $this->legacy_db->where('parentId', $commId);
        $this->legacy_db->where('forSale', 2);
        $query = $this->legacy_db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $data_ar[] = $row;
                /*$prop_id[]=$row['parentId'];
            $prop_rand[]=$row['uniqueId'];*/
            }
            $this->legacy_db->close();
            $this->legacy_db = $this->load->database('database_files', true);
            $this->legacy_db->select('filename');
            $this->legacy_db->like('filename', 'int_', 'after');
            $this->legacy_db->from('pictures');
            $this->legacy_db->where_in('uniqueId', $prop_rand);
            $query = $this->legacy_db->get();

            //echo $this->legacy_db->last_query();
            $i = 0;
            foreach ($query->result_array() as $row) {
                $data_ar[$i]['filename'] = $row['filename'];
                ++$i;
            }

            /*echo "<pre>";
            print_r($data_ar);exit;*/
            return $data_ar;
        }
    }

    public function hotPropSale()
    {
        $this->legacy_db = $this->load->database('database_properties', true);
        $query = $this->legacy_db->query('SELECT *  FROM residential WHERE forSale=1  ORDER BY resId DESC LIMIT 4');
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
            $this->legacy_db->order_by('projId', 'desc');
            $query = $this->legacy_db->get();

            //echo $this->legacy_db->last_query();
            $i = 0;
            foreach ($query->result_array() as $row) {
                $data_ar[$i]['filename'] = $row['filename'];
                ++$i;
            }

            /*echo "<pre>";
            print_r($data_ar);exit;*/
            return $data_ar;
        }
    }

    public function hotPropRent()
    {
        $this->legacy_db = $this->load->database('database_properties', true);
        $this->legacy_db = $this->load->database('database_properties', true);
        $this->legacy_db->select('r.resId,r.uniqueId,r.forSale,r.title,r.description,r.price,r.address,r.city,r.state,r.zip,ri.beds,ri.baths,ri.price as rent');
        $this->legacy_db->from('residential r');
        $this->legacy_db->join('res_interior ri', 'ri.parentId = r.resId');
        $this->legacy_db->where('r.forSale', 2);
        $this->legacy_db->order_by('r.resId', 'desc');
        $this->legacy_db->limit(4);
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
            $this->legacy_db->order_by('projId', 'desc');
            $query = $this->legacy_db->get();

            //echo $this->legacy_db->last_query();
            $i = 0;
            foreach ($query->result_array() as $row) {
                $data_ar[$i]['filename'] = $row['filename'];
                ++$i;
            }

            /*echo "<pre>";
            print_r($data_ar);exit;*/
            return $data_ar;
        }

        return false;
    }

    public function record_count_search($prop_type, $price, $search_data)
    {
        $this->legacy_db = $this->load->database('database_properties', true);
        if (1 == $prop_type) {
            $sql = ' SELECT  r.resId,r.uniqueId , r.title as exttitle ,r.forSale as extforSale,
					r.description as extdesc, r.sqfeet as extqfeet, r.status as extstatus,  r.typeId as exttypeId,ri.beds,ri.baths,r.garageSize, r.price as myprice,r.table_id as diff   FROM `residential` as r
					LEFT JOIN res_interior as ri ON ri.parentId = r.resId WHERE r.forSale='.$prop_type;
            if ('' != $price && $price < 300000) {
                $newprice = $price + 50000;
                $sql .= ' AND r.price >='.$price.' AND r.price <= '.$newprice;
            }
            if ($price >= 300000) {
                $sql .= ' AND r.price >='.$price;
            }
            if ('' != $search_data) {
                $sql .= "  AND r.title LIKE '%".$search_data."%' ";
            }
            $sql .= '  UNION(SELECT  c.commId,c.uniqueId , c.title as exttitle ,c.forSale as extforSale,
						c.description as extdesc, c.sqfeet as extqfeet, c.status as extstatus,  c.typeId as exttypeId,ci.rentType as features,ci.leaseDuration as features2,c.class as features3,c.price  as myprice ,c.table_id as diff FROM `commercial` as c
						LEFT JOIN comm_interior as ci ON ci.parentId = c.commId WHERE c.forSale='.$prop_type;
            if ('' != $price && $price < 300000) {
                $newprice = $price + 50000;
                $sql .= ' AND c.price >='.$price.' AND c.price <= '.$newprice;
            }
            if ($price >= 300000) {
                $sql .= ' AND c.price >='.$price;
            }
            if ('' != $search_data) {
                $sql .= "  AND c.title LIKE '%".$search_data."%' ";
            }
            $sql .= ')';
        } else {
            $sql = ' SELECT  r.resId,r.uniqueId , r.title as exttitle ,r.forSale as extforSale,
					r.description as extdesc, r.sqfeet as extqfeet, r.status as extstatus,  r.typeId as exttypeId,ri.beds,ri.baths,r.garageSize, ri.price as myprice,r.table_id as diff   FROM `residential` as r
					LEFT JOIN res_interior as ri ON ri.parentId = r.resId WHERE r.forSale='.$prop_type;
            if ('' != $price && $price < 300000) {
                $newprice = $price + 50000;
                $sql .= ' AND ri.price >='.$price.' AND ri.price <= '.$newprice;
            }
            if ($price >= 300000) {
                $sql .= ' AND ri.price >='.$price;
            }
            if ('' != $search_data) {
                $sql .= "  AND r.title LIKE '%".$search_data."%' ";
            }
            $sql .= '  UNION(SELECT  c.commId,c.uniqueId , c.title as exttitle ,c.forSale as extforSale,
						c.description as extdesc, c.sqfeet as extqfeet, c.status as extstatus,  c.typeId as exttypeId,ci.rentType as features,ci.leaseDuration as features2,c.class as features3,IF(ci.price IS NULL, c.price ,ci.price) as myprice ,c.table_id as diff FROM `commercial` as c
						LEFT JOIN comm_interior as ci ON ci.parentId = c.commId WHERE c.forSale='.$prop_type;
            if ('' != $price && $price < 300000) {
                $newprice = $price + 50000;
                $sql .= ' AND ci.price >='.$price.' AND ci.price <= '.$newprice;
            }
            if ($price >= 300000) {
                $sql .= ' AND ci.price >='.$price;
            }
            if ('' != $search_data) {
                $sql .= "  AND c.title LIKE '%".$search_data."%' ";
            }
            $sql .= ')';
        }
        $query = $this->legacy_db->query($sql);
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $data_ar[] = $row;
            }

            return count($data_ar);
        }
    }

    public function propertySearchResult($limit, $start, $prop_type, $price, $search_data)
    {
        $this->legacy_db = $this->load->database('database_properties', true);
        /*$this->legacy_db->select('residential.*,res_interior.beds,res_interior.baths,res_interior.price as rent');
        $this->legacy_db->from('residential');
        $this->legacy_db->join('res_interior', 'res_interior.parentId = residential.resId');
        $this->legacy_db->like('residential.title', $search_data);*/
        if (1 == $prop_type) {
            $sql = ' SELECT  r.resId,r.uniqueId , r.title as exttitle ,r.forSale as extforSale,
					r.description as extdesc, r.sqfeet as extqfeet, r.status as extstatus,  r.typeId as exttypeId,ri.beds,ri.baths,r.garageSize, r.price as myprice,r.table_id as diff   FROM `residential` as r
					LEFT JOIN res_interior as ri ON ri.parentId = r.resId WHERE r.forSale='.$prop_type;
            if ('' != $price && $price < 300000) {
                $newprice = $price + 50000;
                $sql .= ' AND r.price >='.$price.' AND r.price <= '.$newprice;
            }
            if ($price >= 300000) {
                $sql .= ' AND r.price >='.$price;
            }
            if ('' != $search_data) {
                $sql .= "  AND r.title LIKE '%".$search_data."%' ";
            }
            $sql .= '  UNION(SELECT  c.commId,c.uniqueId , c.title as exttitle ,c.forSale as extforSale,
						c.description as extdesc, c.sqfeet as extqfeet, c.status as extstatus,  c.typeId as exttypeId,ci.rentType as features,ci.leaseDuration as features2,c.class as features3,c.price  as myprice ,c.table_id as diff FROM `commercial` as c
						LEFT JOIN comm_interior as ci ON ci.parentId = c.commId WHERE c.forSale='.$prop_type;
            if ('' != $price && $price < 300000) {
                $newprice = $price + 50000;
                $sql .= ' AND c.price >='.$price.' AND c.price <= '.$newprice;
            }
            if ($price >= 300000) {
                $sql .= ' AND c.price >='.$price;
            }
            if ('' != $search_data) {
                $sql .= "  AND c.title LIKE '%".$search_data."%' ";
            }
            $sql .= ')';
        } else {
            $sql = ' SELECT  r.resId,r.uniqueId , r.title as exttitle ,r.forSale as extforSale,
					r.description as extdesc, r.sqfeet as extqfeet, r.status as extstatus,  r.typeId as exttypeId,ri.beds,ri.baths,r.garageSize, ri.price as myprice,r.table_id as diff   FROM `residential` as r
					LEFT JOIN res_interior as ri ON ri.parentId = r.resId WHERE r.forSale='.$prop_type;
            if ('' != $price && $price < 300000) {
                $newprice = $price + 50000;
                $sql .= ' AND ri.price >='.$price.' AND ri.price <= '.$newprice;
            }
            if ($price >= 300000) {
                $sql .= ' AND ri.price >='.$price;
            }
            if ('' != $search_data) {
                $sql .= "  AND r.title LIKE '%".$search_data."%' ";
            }
            $sql .= '  UNION(SELECT  c.commId,c.uniqueId , c.title as exttitle ,c.forSale as extforSale,
						c.description as extdesc, c.sqfeet as extqfeet, c.status as extstatus,  c.typeId as exttypeId,ci.rentType as features,ci.leaseDuration as features2,c.class as features3,IF(ci.price IS NULL, c.price ,ci.price) as myprice ,c.table_id as diff FROM `commercial` as c
						LEFT JOIN comm_interior as ci ON ci.parentId = c.commId WHERE c.forSale='.$prop_type;
            if ('' != $price && $price < 300000) {
                $newprice = $price + 50000;
                $sql .= ' AND ci.price >='.$price.' AND ci.price <= '.$newprice;
            }
            if ($price >= 300000) {
                $sql .= ' AND ci.price >='.$price;
            }
            if ('' != $search_data) {
                $sql .= "  AND c.title LIKE '%".$search_data."%' ";
            }
            $sql .= ')';
        }
        $query = $this->legacy_db->query($sql);
        /*$this->legacy_db->where('residential.forSale', $prop_type);
        $this->legacy_db->limit($limit, $start);
        $this->legacy_db->order_by("residential.resId", "desc");
        $query = $this->legacy_db->get();*/
        //echo $this->legacy_db->last_query();
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
            $this->legacy_db->order_by('projId', 'desc');
            $query = $this->legacy_db->get();
            // echo $this->legacy_db->last_query();exit();

            $i = 0;
            foreach ($query->result_array() as $row) {
                $data_ar[$i]['filename'] = $row['filename'];
                ++$i;
            }

            return $data_ar;
        }
    }

    public function propSearchCom($limit, $start, $prop_type, $price, $search_data)
    {
        $this->legacy_db = $this->load->database('database_properties', true);
        /*$this->legacy_db->select('typeId');
        $this->legacy_db->like('title', $search_data);
        $this->legacy_db->limit($limit, $start);
        $this->legacy_db->order_by("commId", "desc");
        $this->legacy_db->where('forSale', $prop_type);
        $query = $this->legacy_db->get("commercial");
        if ($query->num_rows() > 0) {
        foreach ($query->result_array() as $rowss) {
        echo $rowss['typeId'];*/

        $this->legacy_db->like('title', $search_data);
        $this->legacy_db->limit($limit, $start);
        $this->legacy_db->order_by('commId', 'desc');
        // if ($prop_type == 1) {
        if ('' != $price && $price < 300000) {
            $newprice = $price + 50000;
            $this->legacy_db->where('price >=', $price);
            $this->legacy_db->where('price <=', $newprice);
        }
        if ($price >= 300000) {
            $this->legacy_db->where('price >=', $price);
        }
        // }
        $this->legacy_db->where('forSale', $prop_type);
        $query = $this->legacy_db->get('commercial');
        // echo $this->legacy_db->last_query();
        if ($query->num_rows() > 0) {
            $i = 0;
            foreach ($query->result_array() as $row) {
                $data_ar[] = $row;
                $prop_id[] = $row['commId'];
                $prop_rand[] = $row['uniqueId'];

                $this->legacy_db->select('price as rent, rentType as type');
                $this->legacy_db->from('comm_interior');
                $this->legacy_db->where('parentId', $row['commId']);

                $query = $this->legacy_db->get();
                if ($query->num_rows() > 0) {
                    $rows = $query->result_array();
                    $data_ar[$i]['rent'] = $rows[0]['rent'];
                    $data_ar[$i]['type'] = $rows[0]['type'];
                } else {
                    $data_ar[$i]['rent'] = 0;
                    $data_ar[$i]['type'] = 0;
                }
                ++$i;
            }
            $this->legacy_db->close();
            $this->legacy_db = $this->load->database('database_files', true);
            $this->legacy_db->select('filename');
            $this->legacy_db->like('filename', 'ext_', 'after');
            $this->legacy_db->from('pictures');
            $this->legacy_db->where_in('uniqueId', $prop_rand);
            $this->legacy_db->where_in('projId', $prop_id);
            $this->legacy_db->order_by('projId', 'desc');
            $query = $this->legacy_db->get();

            // echo $this->legacy_db->last_query();
            $i = 0;
            foreach ($query->result_array() as $row) {
                $data_ar[$i]['filename'] = $row['filename'];
                ++$i;
            }

            /*echo "<pre>";
            print_r($data_ar);exit;*/
            return $data_ar;
        }
        /*	}
    }*/
    }

    public function manageAgents()
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('id!=', 1);
        $query = $this->db->get();

        return $query->result();
    }

    public function pageContent()
    {
        $this->db->select('*');
        $this->db->from('pages');
        $this->db->where('page_key', 'aboutus');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $data['page_contents'] = $row;
            }

            return $data;
        }
    }

    public function footerPageData()
    {
        $this->db->where('page_key', 'footer');
        $query = $this->db->get('pages');
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data['contents'] = $row;
            }

            return $data;
        }
        // print_r($data);exit();
    }

    public function newsLetterReg($db_data)
    {
        $this->db->where('email', $db_data['email']);
        $query = $this->db->get('newsletter');
        if ($query->num_rows() > 0) {
            return false;
        }
        $ins_res = $this->db->insert('newsletter', $db_data);
        $this->db->close();

        return $ins_res;
    }

    public function getStyle()
    {
        $this->db->where('ckey', 'footer_color');
        $query = $this->db->get('configuration');
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data['contents'] = $row;
            }

            return $data;
        }
    }

    public function getStyleHead()
    {
        $this->db->where('ckey', 'header_color');
        $query = $this->db->get('configuration');
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data['contents'] = $row;
            }

            return $data;
        }
    }

    public function getSiteTitle()
    {
        $this->db->where('ckey', 'site_title');
        $query = $this->db->get('configuration');
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data['contents'] = $row;
            }

            return $data;
        }
    }

    public function getSiteLogo()
    {
        $this->db->where('ckey', 'site_logo');
        $query = $this->db->get('configuration');
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data['contents'] = $row;
            }

            return $data;
        }
    }

    public function getHycolor()
    {
        $this->db->where('ckey', 'hylinkcolor');
        $query = $this->db->get('configuration');
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $data['contents'] = $row;
            }

            return $data;
        }
    }

    public function getbtncolor()
    {
        $this->db->where('ckey', 'btn_color');
        $query = $this->db->get('configuration');
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $data['contents'] = $row;
            }

            return $data;
        }
    }

    public function getBanner()
    {
        $this->db->where('ckey', 'banner_color');
        $query = $this->db->get('configuration');
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $data['contents'] = $row;
            }

            return $data;
        }
    }

    public function getCEmail()
    {
        $this->db->where('ckey', 'admin_email');
        $query = $this->db->get('configuration');
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data['contents'] = $row;
            }

            return $data;
        }
    }

    public function getCEmailPass()
    {
        $this->db->where('ckey', 'admin_smtp_pass');
        $query = $this->db->get('configuration');
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data['contents'] = $row;
            }

            return $data;
        }
    }

    public function officeLocUp()
    {
        $this->db->where('ckey', 'map_location');
        $query = $this->db->get('configuration');
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data['contents'] = $row;
            }

            return $data;
        }
    }

    public function unSubprocess($key)
    {
        $this->db->where('key', $key);

        return $this->db->delete('newsletter');
    }

    public function testdata()
    {
        echo $sql = 'SELECT  c.commId,c.uniqueId , c.title as exttitle ,c.forSale as extforSale,
	c.description as extdesc, c.sqfeet as extqfeet, c.status as extstatus,  c.typeId as exttypeId,ci.rentType as features,ci.leaseDuration as features2,c.class as features3,IF(ci.price IS NULL, c.price ,ci.price) as myprice   FROM `commercial` as c

LEFT JOIN comm_interior as ci ON ci.parentId = c.commId WHERE c.forSale=2 AND  ci.price > 150000 AND  ci.price <= 300000 UNION(SELECT  r.resId,r.uniqueId , r.title as exttitle ,r.forSale as extforSale,
	r.description as extdesc, r.sqfeet as extqfeet, r.status as extstatus,  r.typeId as exttypeId,ri.beds,ri.baths,r.garageSize, IF(r.price IS NULL, r.price ,ri.price) as myprice   FROM `residential` as r

LEFT JOIN res_interior as ri ON ri.parentId = r.resId WHERE r.forSale=2 AND ri.price >150000 AND ri.price <= 300000)';
        /*echo $sql = "SELECT  x.commId as keyId, x.uniqueId , x.title as exttitle ,x.forSale as extforSale,
    x.description as extdesc, x.price as extprice,  x.sqfeet as extqfeet, x.status as extstatus,  x.typeId as exttypeId,
    y.price as rent, y.commIntId as intId, y.parentId as parentId
    FROM			commercial as  x, comm_interior y WHERE y.parentId = x.commId
    UNION
    (SELECT  x.resId as keyId, x.uniqueId , x.title as exttitle ,x.forSale as extforSale,
    x.description as extdesc, x.price as extprice,  x.sqfeet as extqfeet, x.status as extstatus,  x.typeId as exttypeId,
    y.price as rent,y.resIntId as intId,y.parentId as parentId
    FROM			residential as x , res_interior y WHERE y.parentId = x.resId)";*/
    }
}
