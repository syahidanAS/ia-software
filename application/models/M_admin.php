<?php
class M_admin extends CI_Model
{

	//MODEL MASTER
	function employees()
	{
		$this->db->select('*');
		$this->db->from('employee');
		$this->db->join('position', 'employee.position_id=position.id');
		$query = $this->db->get();
		return $query->result();
	}

	function employeesCount()
	{
		$this->db->select('COUNT(name) AS total');
		$this->db->from('employee');
		$this->db->join('position', 'employee.position_id=position.id');
		$query = $this->db->get();
		return $query->result();
	}
	function positionsCount()
	{
		$this->db->select('COUNT(position_name) AS position_total');
		$this->db->from('position');
		$query = $this->db->get();
		return $query->result();
	}

	function positionMaster()
	{
		$this->db->select('*');
		$this->db->from('position');
		$query = $this->db->get();
		return $query->result();
	}

	function unregisteredUID()
	{
		$this->db->select('*');
		$this->db->from('unregistered_uid');
		$this->db->order_by("uid", "desc");
		$this->db->limit('1');
		$query = $this->db->get();
		return $query->result();
	}

	function attendancesMaster($from, $to)
	{
		$this->db->select('employee.e_id,name,attendance.id,tgl,time_in,time_out,description,file, HOUR(time_out) AS jam_keluar, MINUTE(time_out) AS menit_keluar');
		$this->db->from('attendance');
		$this->db->join('employee', 'attendance.uid = employee.uid');
		$this->db->where("attendance.tgl BETWEEN '$from' AND '$to' ");
		// $this->db->group_by('attendance.uid');
		$this->db->limit('1');
		$query = $this->db->get();
		return $query->result();
	}

	function attendancesMasterToday()
	{
		$this->db->select('employee.e_id,name,attendance.id,tgl,time_in,time_out,description,file, HOUR(time_out) AS jam_keluar, MINUTE(time_out) AS menit_keluar');
		$this->db->from('attendance');
		$this->db->join('employee', 'attendance.uid = employee.uid');
		$this->db->where('attendance.tgl', @date('Y-m-d'));
		$this->db->group_by('attendance.uid');

		$query = $this->db->get();
		return $query->result();
	}
	function attendancesData()
	{
		$this->db->select('employee.e_id,name,attendance.id,tgl,time_in,time_out,description,file, HOUR(time_out) AS jam_keluar, MINUTE(time_out) AS menit_keluar');
		$this->db->from('attendance');
		$this->db->join('employee', 'attendance.uid = employee.uid');
		$query = $this->db->get();
		return $query->result();
	}

	function operational()
	{
		$this->db->select('*');
		$this->db->from('operation');
		$query = $this->db->get();
		return $query->result();
	}
	//END OF MODEL MASTER

	//MODEL DELETE
	public function deleteEmployee($table, $where)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}
	public function deleteUID($uid)
	{
		$this->db->where('uid', $uid);
		$this->db->delete('unregistered_uid');
	}

	public function deletePosition($table, $where)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}
	//END OF MODEL DELETE


	//MODEL SAVE
	public function saveEmployee($table, $data)
	{
		$this->db->insert($table, $data);
	}
	public function savePosition($table, $data)
	{
		$this->db->insert($table, $data);
	}
	public function addDispen($table, $data)
	{
		$this->db->insert($table, $data);
	}
	//END OF MODEL SAVE


	//UPDATE MODEL
	function updateEmployee($where, $data, $table)
	{
		$this->db->where($where);
		$this->db->update($table, $data);
	}

	function updateOperational($where, $data, $table)
	{
		$this->db->where($where);
		$this->db->update($table, $data);
	}
	//END OF UPDATE MODEL

	public function checking($table, $where)
	{

		return $this->db->get_where($table, $where);
	}
	function updateAttendance($where, $data, $table)
	{
		$this->db->where($where);
		$this->db->update($table, $data);
	}
}
