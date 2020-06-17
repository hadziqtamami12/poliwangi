<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Status_Hari extends MY_Controller {

		function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->table    = 'tb_status_hari';

        $this->load->model('m_status_hari');
		    $this->load->library('session');
    }


	/*Home page Calendar view  */
	Public function index()
	{
		$data_calendar = $this->m_status_hari->get_list($this->table);
    $calendar = array();
    foreach ($data_calendar as $key => $val) 
    {
      $calendar[] = array(
              'id'  => intval($val->id_status_hari), 
              'title' => $val->title, 
              'description' => trim($val->description), 
              'start' => date_format( date_create($val->start_date) ,"Y-m-d H:i:s"),
              'end'   => date_format( date_create($val->end_date) ,"Y-m-d H:i:s"),
              'color' => $val->color,
              );
    }

    $data = array();
    $data['get_data']     = json_encode($calendar);
    // $this->load->view('calendar', $data);



        if ($this->session->userdata['logged_in']==true) {
	       	 $this->template->load('layout/template', 'status_hari/index', $data);
        }
        else{
			redirect('Login-User');
        }
	}



 

  public function save()
  {
    $response = array();
    $this->form_validation->set_rules('title', 'Title cant be empty ', 'required');
      if ($this->form_validation->run() == TRUE)
        {
      $param = $this->input->post();
      $id = $param['id'];
      unset($param['id']);

      if($id == 0)
      {
            $param['create_at']     = date('Y-m-d H:i:s');
            $insert = $this->m_status_hari->insert($this->table, $param);

            if ($insert > 0) 
            {
              $response['status'] = TRUE;
            $response['notif']  = 'Success add calendar';
            $response['id']   = $insert;
            }
            else
            {
              $response['status'] = FALSE;
            $response['notif']  = 'Server wrong, please save again';
            }
      }
      else
      { 
        $where    = [ 'id_status_hari'  => $id];
              // $param['modified_at']     = date('Y-m-d H:i:s'); 
              $update = $this->m_status_hari->update($this->table, $param, $where);

              if ($update > 0) 
              {
                $response['status'] = TRUE;
            $response['notif']  = 'Success add calendar';
            $response['id']   = $id;
              }
              else
            {
              $response['status'] = FALSE;
            $response['notif']  = 'Server wrong, please save again';
            }

      }
      }
      else
      {
        $response['status'] = FALSE;
        $response['notif']  = validation_errors();
      }


    echo json_encode($response);
  }

  public function delete_data()
  {
    $response     = array();
    $id  = $this->input->post('id');
    if(!empty($id))
    {
      $where = ['id_status_hari' => $id];
          $delete = $this->m_status_hari->delete($this->table, $where);

          if ($delete > 0) 
          {
            $response['status'] = TRUE;
          $response['notif']  = 'Success delete calendar';
          }
          else
          {
            $response['status'] = FALSE;
          $response['notif']  = 'Server wrong, please save again';
          }
    }
    else
    {
      $response['status'] = FALSE;
        $response['notif']  = 'Data not found';
    }

    echo json_encode($response);
  }



}
