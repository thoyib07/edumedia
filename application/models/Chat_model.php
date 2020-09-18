<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Chat_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    public function add_user($data){
        $this->db->insert('chat_users',$data);
    }

    public function add_chat($data){
        $this->db->insert('chat_message',$data);
    }

    public function get_all_online($status){
        $this->db->where('status',$status);
        return $this->db->get('chat_users')->result();
    }

    public function get_all_chat(){
        $this->db->select('m.*, u.username');
        $this->db->from('chat_message as m');
        $this->db->join('chat_users as u','u.id = m.id_user', 'left');
        $this->db->where('m.channel',$_GET['channel']);
        $this->db->where('m.event',$_GET['event']);
        $this->db->order_by('m.date','ASC');
        return $this->db->get()->result();
    }

    public function get_all_chat2(){
        $this->db->select('c.*, g.nama_guru , m.nama_murid, concat(IFNULL(g.nama_guru,"") , "" , IFNULL(m.nama_murid,"")) as username');
        $this->db->from('chat_message as c');
        $this->db->join('m_user as u','u.id_user = c.id_user');
        $this->db->join('m_guru as g','g.id_guru = u.id_guru', 'left');
        $this->db->join('m_murid as m','m.id_murid = u.id_murid', 'left');
        $this->db->where('c.channel',$_GET['channel']);
        $this->db->where('c.event',$_GET['event']);
        $this->db->order_by('c.date','ASC');
        return $this->db->get()->result();
    }

    public function get_by_id($id){
        $this->db->where('id',$id);
        return $this->db->get('chat_users')->row();
    }

    public function update($id,$data){
        $this->db->where('id', $id);
        $this->db->update('chat_users', $data);
    }

    public function login(){
        $query = $this->db->get_where('chat_users', 
            array('email' => $this->input->post('email'),)
        );

        $row = $query->result();
        $num_rows = $query->num_rows();

        if( $num_rows == 1 && password_verify($this->input->post('password'), $row[0]->password) ){


            $newdata = array(
              'id'        => $row[0]->id,
              'user_name' => $row[0]->username,
              'email'     => $row[0]->email, 
            );

            $this->session->set_userdata($newdata);
                
            
            return $num_rows;
        }
    }
}
