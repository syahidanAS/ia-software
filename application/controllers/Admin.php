<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('M_admin');
		$this->load->helper('url');
		$this->load->helper('tgl_indo');
	}

	// DATA MASTER
	public function dashboard()
	{
		$data['employeesCount'] = $this->M_admin->employeesCount();
		$data['positionsCount'] = $this->M_admin->positionsCount();
		$this->load->view('admin/headers/header');
		$this->load->view('admin/navbars/navbar');
		$this->load->view('admin/dashboard', $data);
		$this->load->view('admin/footers/footer');
		$this->load->view('admin/scripts/clock');
	}

	public function employees()
	{
		$data['employees'] = $this->M_admin->employees();
		$data['positions'] = $this->M_admin->positionMaster();
		$data['unregUID'] = $this->M_admin->unregisteredUID();
		$this->load->view('admin/headers/header');
		$this->load->view('admin/navbars/navbar');
		$this->load->view('admin/employees_view', $data);
		$this->load->view('admin/footers/footer');
		$this->load->view('admin/modals/addEmployee', $data);
		$this->load->view('admin/modals/modalDelete', $data);
		$this->load->view('admin/modals/employeeEdit', $data);
		$this->load->view('admin/modals/unregUid', $data);
		$this->load->view('admin/scripts/datatable');
		$this->load->view('admin/scripts/cardScanner');
	}


	public function positions()
	{
		$data['positions'] = $this->M_admin->positionMaster();
		$this->load->view('admin/headers/header');
		$this->load->view('admin/navbars/navbar');
		$this->load->view('admin/positions_view', $data);
		$this->load->view('admin/footers/footer');
		$this->load->view('admin/modals/positionEdit');
		$this->load->view('admin/modals/addPosition');
		$this->load->view('admin/scripts/datatable');
	}

	public function attendances()
	{
		$data['employees'] = $this->M_admin->employees();
		$data['positions'] = $this->M_admin->positionMaster();
		$data['attendances'] = $this->M_admin->attendancesData();
		$data['head'][] = (object) array(
			'title' => 'Semua Absensi',
			'date' => ""
		);
		$data['operationalHour'] = $this->M_admin->operational();
		$this->load->view('admin/headers/header');
		$this->load->view('admin/navbars/navbar');
		$this->load->view('admin/attendances_view', $data);
		$this->load->view('admin/footers/footer');
		$this->load->view('admin/modals/exportToExcel');
		$this->load->view('admin/modals/dispenAttendance', $data);
		$this->load->view('admin/modals/sakitAttendance', $data);
		$this->load->view('admin/modals/izinAttendance', $data);
		$this->load->view('admin/modals/operationalHour', $data);
		$this->load->view('admin/modals/earlyOut', $data);
		$this->load->view('admin/scripts/datatable');
	}

	public function attendancesFilter()
	{
		$data['employees'] = $this->M_admin->employees();
		$data['positions'] = $this->M_admin->positionMaster();
		$data['attendances'] = $this->M_admin->attendancesMasterToday();
		$data['operationalHour'] = $this->M_admin->operational();
		$data['head'][] = (object) array(
			'title' => 'Absensi Hari Ini',
			'date' => date_indo(date('y-m-d'))
		);
		$this->load->view('admin/headers/header');
		$this->load->view('admin/navbars/navbar');
		$this->load->view('admin/attendances_view', $data);
		$this->load->view('admin/footers/footer');
		$this->load->view('admin/modals/exportToExcel');
		$this->load->view('admin/modals/dispenAttendance', $data);
		$this->load->view('admin/modals/sakitAttendance', $data);
		$this->load->view('admin/modals/izinAttendance', $data);
		$this->load->view('admin/modals/operationalHour', $data);
		$this->load->view('admin/modals/earlyOut', $data);
		$this->load->view('admin/scripts/datatable');
	}

	public function specific_operation()
	{
		$data['employees'] = $this->M_admin->employees();
		$data['positions'] = $this->M_admin->positionMaster();
		$data['unregUID'] = $this->M_admin->unregisteredUID();
		$this->load->view('admin/headers/header');
		$this->load->view('admin/navbars/navbar');
		$this->load->view('admin/specific_operational.php', $data);
	}

	public function export()
	{
		$this->load->view('admin/headers/header');
		$data['attendances'] = $this->M_admin->attendancesMaster();
		$this->load->view('admin/export.php', $data);
	}

	public function pushDispen()
	{
		$uid = $this->input->post("uid");
		$tgl = $this->input->post('tgl');
		$time_in = '00:00:00';
		$time_out = '00:00:00';
		$description = 'Dispensasi';
		$foto = $_FILES['foto'];
		$fileExt = pathinfo($_FILES["foto"]["name"], PATHINFO_EXTENSION);
		$new_name = date('ymd') . '-dispen-' . rand(0, 1000);
		if ($foto = '') {
		} else {
			$config['upload_path']      = './assets/files/lampiran';
			$config['allowed_types']    = 'jpg|png|pdf';
			$config['max_size']         = 2048;
			$config['file_name'] 		= $new_name . "." . $fileExt;

			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('foto')) {
			} else {
				$foto = $this->upload->data('file_name');
			}
		}

		$data = array(
			'uid' => $uid,
			'tgl' => $tgl,
			'time_in' => $time_in,
			'time_out' => $time_out,
			'description' => $description,
			'file' => $new_name . "." . $fileExt,
		);


		$this->M_admin->addDispen("attendance", $data);
		$this->session->set_flashdata("fail", '<div class="btn btn-success">Berhasil absen dispen!</div>');

		redirect("admin/attendances");
	}

	public function pushSakit()
	{
		$uid = $this->input->post("uid");
		$tgl = $this->input->post('tgl');
		$time_in = '00:00:00';
		$time_out = '00:00:00';
		$description = 'Sakit';
		$foto = $_FILES['foto'];
		$fileExt = pathinfo($_FILES["foto"]["name"], PATHINFO_EXTENSION);
		$new_name = date('ymd') . '-sakit-' . rand(0, 1000);
		if ($foto = '') {
		} else {
			$config['upload_path']      = './assets/files/lampiran';
			$config['allowed_types']    = 'jpg|png|pdf';
			$config['max_size']         = 2048;
			$config['file_name'] 		= $new_name . "." . $fileExt;

			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('foto')) {
			} else {
				$foto = $this->upload->data('file_name');
			}
		}

		$data = array(
			'uid' => $uid,
			'tgl' => $tgl,
			'time_in' => $time_in,
			'time_out' => $time_out,
			'description' => $description,
			'file' => $new_name . "." . $fileExt,
		);


		$this->M_admin->addDispen("attendance", $data);
		$this->session->set_flashdata("fail", '<div class="btn btn-success">Berhasil absen dispen!</div>');

		redirect("admin/attendances");
	}

	public function pushIzin()
	{
		$uid = $this->input->post("uid");
		$tgl = $this->input->post('tgl');
		$time_in = '00:00:00';
		$time_out = '00:00:00';
		$description = 'Izin';
		$foto = $_FILES['foto'];
		$fileExt = pathinfo($_FILES["foto"]["name"], PATHINFO_EXTENSION);
		$new_name = date('ymd') . '-izin-' . rand(0, 1000);
		if ($foto = '') {
		} else {
			$config['upload_path']      = './assets/files/lampiran';
			$config['allowed_types']    = 'jpg|png|pdf';
			$config['max_size']         = 2048;
			$config['file_name'] 		= $new_name . "." . $fileExt;

			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('foto')) {
			} else {
				$foto = $this->upload->data('file_name');
			}
		}

		$data = array(
			'uid' => $uid,
			'tgl' => $tgl,
			'time_in' => $time_in,
			'time_out' => $time_out,
			'description' => $description,
			'file' => $new_name . "." . $fileExt,
		);


		$this->M_admin->addDispen("attendance", $data);
		$this->session->set_flashdata("fail", '<div class="btn btn-success">Berhasil absen dispen!</div>');

		redirect("admin/attendances");
	}


	public function exportExcel()
	{
		$from = $this->input->post('from');
		$to = $this->input->post('to');

		$rand_color = str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT);
		$data['attendances'] = $this->M_admin->attendancesMaster($from, $to);
		require(APPPATH . 'PHPExcel/Classes/PHPExcel.php');
		require(APPPATH . 'PHPExcel/Classes/PHPExcel/Writer/Excel2007.php');

		$objPHPExcel = new PHPExcel();
		$objPHPExcel->getActiveSheet()->getStyle("A1:E1")->getFont()->setSize(12);
		$objPHPExcel->getActiveSheet()
			->getStyle('A1:F1')
			->getFill()
			->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
			->getStartColor()
			->setRGB('dbdbdb');

		$objPHPExcel->getProperties()->setCreator("interconnect");
		$objPHPExcel->getProperties()->setLastModifiedBy("interconnect");
		$objPHPExcel->getProperties()->setTitle("Rekap Absensi");
		$objPHPExcel->getProperties()->setSubject("");
		$objPHPExcel->getProperties()->setDescription("");
		$objPHPExcel->setActiveSheetIndex(0);
		$objPHPExcel->getActiveSheet()->setCellValue('A1', 'Tanggal');
		$objPHPExcel->getActiveSheet()->setCellValue('B1', 'Nama');
		$objPHPExcel->getActiveSheet()->setCellValue('C1', 'Jam Masuk');
		$objPHPExcel->getActiveSheet()->setCellValue('D1', 'Jam Keluar');
		$objPHPExcel->getActiveSheet()->setCellValue('E1', 'Deskripsi');
		$objPHPExcel->getActiveSheet()->setCellValue('F1', 'Durasi Bekerja');
		$baris = 2;
		foreach ($data['attendances'] as $data) {
			$objPHPExcel->getActiveSheet()->setCellValue('A' . $baris,  longdate_indo($data->tgl));
			$objPHPExcel->getActiveSheet()->setCellValue('B' . $baris, $data->name);
			$objPHPExcel->getActiveSheet()->setCellValue('C' . $baris, $data->time_in);
			$objPHPExcel->getActiveSheet()->setCellValue('D' . $baris, $data->time_out);
			if ($data->time_in != "00:00:00" && $data->time_out != "00:00:00" && $data->description != "") {
				$objPHPExcel->getActiveSheet()->setCellValue('E' . $baris, "Hadir,pulang cepat ($data->description)");
			} else if ($data->time_in != "00:00:00" && $data->time_out != "00:00:00" && $data->description == "") {
				$objPHPExcel->getActiveSheet()->setCellValue('E' . $baris, "HADIR");
			} else if ($data->time_out == "00:00:00" && $data->description == "") {
				$objPHPExcel->getActiveSheet()->setCellValue('E' . $baris, "Belum melakukan absensi keluar");
			} else if ($data->description != "") {
				$objPHPExcel->getActiveSheet()->setCellValue('E' . $baris, $data->description);
			}

			$in_hour = date('H', strtotime($data->time_in));
			$out_hour = date('H', strtotime($data->time_out));
			$in_minute = date('i', strtotime($data->time_in));
			$out_minute = date('i', strtotime($data->time_out));

			$hasil = (intVal($out_hour) - intVal($in_hour)) * 60 + (intVal($out_minute) - intVal($in_minute));
			$hasil = $hasil / 60;
			$hasil = number_format($hasil, 2);

			if ($data->time_in != "00:00:00" && $data->time_out != "00:00:00") {
				$objPHPExcel->getActiveSheet()->setCellValue('F' . $baris, $hasil . " (Jam/Menit)");
			} else if ($data->time_in != "00:00:00" || $data->time_out != "00:00:00") {
				$objPHPExcel->getActiveSheet()->setCellValue('F' . $baris, "-");
			} else if ($data->time_in == "00:00:00" && $data->time_out == "00:00:00") {
				$objPHPExcel->getActiveSheet()->setCellValue('F' . $baris, "-");
			}



			$baris++;
		}

		$filename = "Rekap-Absensi" . date("d-m-Y-H-i-s") . '.xlsx';

		$objPHPExcel->getActiveSheet()->setTitle("Rekap Absensi");

		header('Content-Type: application/vnd.openxxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="' . $filename . '"');
		header('Cache-Control: max-age=0');

		$writer = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
		$writer->save('php://output');

		exit;
	}
	// END OF DATA MASTER

	//DATA DELETE
	public function deleteEmployeeController($id)
	{
		$where = array('e_id' => $id);
		$this->M_admin->deleteEmployee('employee', $where);
		$this->session->set_flashdata("fail", '<div class="btn btn-success">Berhasil menghapus data!</div>');
		redirect("Admin/employees");
	}

	public function deleteAttendance($id)
	{
		$where = array('id' => $id);
		$this->M_admin->deleteEmployee('attendance', $where);
		$this->session->set_flashdata("fail", '<div class="btn btn-success">Berhasil menghapus data!</div>');
		redirect("Admin/attendances");
	}

	public function deletePosition($id)
	{
		$where = array('id' => $id);
		$this->M_admin->deletePosition('position', $where);
		$this->session->set_flashdata("fail", '<div class="btn btn-success">Berhasil menghapus data!</div>');
		redirect("Admin/employees");
	}
	// END OF DATA DELETE


	//DATA SAVING
	public function saveEmployee()
	{
		$uid = $this->input->post("uid");
		$name = $this->input->post("name");
		$gender = $this->input->post("gender");
		$address = $this->input->post("address");
		$position_id = $this->input->post("position_id");

		$data = array(
			'uid' => $uid,
			'name' => $name,
			'address' => $address,
			'gender' => $gender,
			'position_id' => $position_id
		);

		if ($uid == null) {
			// echo "<script>alert('SCAN KARTU TERLEBIH DAHULU!'); window.location='".base_url('Admin/formAddEmployee')."'</script>";
			$this->session->set_flashdata('fail', '<div class="btn btn-danger">Gagal Menyimpan Data, mohon scan kartu!</div>');
			$this->session->set_flashdata('name', $name);
			$this->session->set_flashdata('gender', $gender);
			redirect(base_url('Admin/employees'));
		} else {
			$this->session->set_flashdata('fail', '<div class="btn btn-success">Berhasil Menyimpan Data</div>');
			$this->M_admin->saveEmployee("employee", $data);
			$this->M_admin->deleteUID($uid);
			redirect(base_url('Admin/employees'));
		}
	}


	public function savePosition()
	{
		$position_name = $this->input->post("position_name");

		$data = array(
			'position_name' => $position_name,
			'created_at' => @date('Y-m-d H:i:s')
		);
		$query = $this->M_admin->savePosition("position", $data);
		if ($query) {
			$this->session->set_flashdata('fail', '<div class="btn btn-danger">Gagal Menyimpan Data!</div>');
			redirect(base_url('Admin/position'));
			// echo "<script>alert('SCAN KARTU TERLEBIH DAHULU!'); window.location='".base_url('Admin/formAddEmployee')."'</script>";

		} else {
			$this->session->set_flashdata('fail', '<div class="btn btn-success">Berhasil Menyimpan Data</div>');
			redirect(base_url('Admin/positions'));
		}
	}
	//END OF DATA SAVING

	//DATA UPDATE
	function updateEmployee()
	{
		$id = $this->input->post("id");
		$uid = $this->input->post("uid");
		$name = $this->input->post("name");
		$gender = $this->input->post("gender");
		$position_id = $this->input->post("position_id");
		$address = $this->input->post("address");

		$table = "employee";

		$data = array(
			'name' => $name,
			'uid' => $uid,
			'address' => $address,
			'gender' => $gender,
			'position_id' => $position_id,
		);
		$where = array(
			'e_id' => $id
		);

		$sql = $this->M_admin->updateEmployee($where, $data, $table);
		if ($sql) {
			// echo "<script>alert('SCAN KARTU TERLEBIH DAHULU!'); window.location='".base_url('Admin/formAddEmployee')."'</script>";
			$this->session->set_flashdata('fail', '<div class="btn btn-danger">Gagal mengubah data!</div>');
			$this->session->set_flashdata('name', $name);
			$this->session->set_flashdata('gender', $gender);
			redirect(base_url('Admin/employees'));
		} else {
			$this->session->set_flashdata('fail', '<div class="btn btn-success">Berhasil mengubah data</div>');
			redirect(base_url('Admin/employees'));
		}
		// var_dump($where,$data);
	}

	function updatePosition()
	{
		$id = $this->input->post("id");
		$position_name = $this->input->post("position_name");


		$table = "position";

		$data = array(
			'position_name' => $position_name,
			'updated_at' => @date('Y-m-d H:i:s'),
		);
		$where = array(
			'id' => $id
		);

		$sql = $this->M_admin->updateEmployee($where, $data, $table);
		if ($sql) {
			// echo "<script>alert('SCAN KARTU TERLEBIH DAHULU!'); window.location='".base_url('Admin/formAddEmployee')."'</script>";
			$this->session->set_flashdata('fail', '<div class="btn btn-danger">Gagal mengubah data!</div>');
			redirect(base_url('Admin/position'));
		} else {
			$this->session->set_flashdata('fail', '<div class="btn btn-success">Berhasil mengubah data</div>');
			redirect(base_url('Admin/positions'));
		}
		// var_dump($where,$data);
	}


	function updateOperational()
	{
		$id = $this->input->post("id");
		$attendance_in = $this->input->post("attendance_in");
		$attendance_out = $this->input->post("attendance_out");

		$table = "operation";

		$data = array(
			'attendance_in' => $attendance_in,
			'attendance_out' => $attendance_out
		);
		$where = array(
			'id' => $id
		);

		$sql = $this->M_admin->updateOperational($where, $data, $table);
		if ($sql) {
			// echo "<script>alert('SCAN KARTU TERLEBIH DAHULU!'); window.location='".base_url('Admin/formAddEmployee')."'</script>";
			$this->session->set_flashdata('fail', '<div class="btn btn-danger">Gagal mengubah jam operasional!</div>');
			redirect(base_url('Admin/attendances'));
		} else {
			$this->session->set_flashdata('fail', '<div class="btn btn-success">Jam operasional dirubah </div>');
			redirect(base_url('Admin/attendances'));
		}
		// var_dump($where,$data);
	}

	function earlyOut()
	{
		$id = $this->input->post("id");
		$time_out = $this->input->post("time_out");
		$description = $this->input->post("description");

		$table = "attendance";

		$data = array(
			'time_out' => $time_out,
			'description' => $description
		);
		$where = array(
			'id' => $id
		);

		$sql = $this->M_admin->updateOperational($where, $data, $table);
		if ($sql) {
			// echo "<script>alert('SCAN KARTU TERLEBIH DAHULU!'); window.location='".base_url('Admin/formAddEmployee')."'</script>";
			$this->session->set_flashdata('fail', '<div class="btn btn-danger">Gagal!</div>');
			redirect(base_url('Admin/attendances'));
		} else {
			$this->session->set_flashdata('fail', '<div class="btn btn-success">Berhasil</div>');
			redirect(base_url('Admin/attendances'));
		}
		// var_dump($where,$data);
	}

	//END OF DATA UPDATE
}
