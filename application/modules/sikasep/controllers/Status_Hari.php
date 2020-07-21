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
		    // $this->load->library('TanggalMerah');
  }


  /*Home page Calendar view  */
  Public function index()
  {
    // $array = json_decode(file_get_contents("https://raw.githubusercontent.com/guangrei/Json-Indonesia-holidays/master/calendar.json"),true);
    // $count = count($array);
    // $param = $this->input->post();

    // echo date_format(strtotime($array),"Y-m-d H:i:s");

    // foreach ($array as $key => $val) {
    //     if(isset($array)):
    //      $data2 = array(
    //         'title' => $val["deskripsi"],
    //         'description' => $val["deskripsi"], 
    //         'start_date' => date_format( date_create($key), 'Y-m-d'),
    //         'end_date'   => date_format( date_create($key), 'Y-m-d'),
    //         'color' => '#DB4040',
    //         'create_at'     => date('Y-m-d H:i:s')

    //       );

    //   $this->m_status_hari->insert($this->table, $data2);
        
    //     else:
    //       echo "gagal";
    //     endif;

    //   // echo date_format( date_create($key), 'Y-m-d') . "</br>";

    // }

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
    $data['title'] = 'Status Hari';

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

// function tanggalMerah($value) {
//   $array = json_decode(file_get_contents("https://raw.githubusercontent.com/guangrei/Json-Indonesia-holidays/master/calendar.json"),true);

//   //check tanggal merah berdasarkan libur nasional
// // :   echo"tanggal merah ".$array[$value]["deskripsi"];
  
//   $data_calendar = $this->m_status_hari->get_list($this->table);
  
//   $data2 = array();

//   if(isset($array[$value]))
// //    : $data2[] = array(
// //               'id'  => '', 
// //       'title' => $array[$value]["deskripsi"], 
// //       'description' => $array[$value]["deskripsi"], 
// //       'start' => date("Y-m-d H:i:s"),
// //       'end'   => date("Y-m-d H:i:s"),
// //       'color' => '#ff0000',
// //     );
// // $this->m_status_hari->insert($this->table, $data2);

//     : echo "berhasil";

//   //check tanggal merah berdasarkan hari minggu
// // elseif(
// //   date("D",strtotime($value))==="Sun")
// //   :   echo"tanggal merah hari minggu";

//   //bukan tanggal merah
//   else
//     :echo"bukan tanggal merah";
// endif;
// }


}
