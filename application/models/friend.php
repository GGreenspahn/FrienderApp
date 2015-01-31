<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Friend extends CI_Model {
	
	public function get_profile($id)
	{
		$query = "SELECT * FROM users WHERE id = ?";
		$values = array($id);
		return $this->db->query($query,$values)->row_array();
	}

	public function get_friends ($id)
	{
		$query = "SELECT * FROM users AS friends LEFT JOIN friendships ON friendships.friend_id=friends.id WHERE friendships.user_id = ? ";
		$values = array($id);
		return $this->db->query($query, $values)->result_array();
	}
	
	public function get_others ($id)
	{
		$query = "SELECT * FROM users AS friends WHERE friends.id NOT IN (SELECT friendships.friend_id FROM friendships WHERE friendships.user_id=?) AND friends.id !=?";
		$values = array($id, $id);
		return $this->db->query($query, $values)->result_array();
	}
	
	public function add_friend($user_id, $friend_id)
	{	
		$query = "INSERT INTO friendships(user_id, friend_id) VALUES (?,?)";
		$values = array($user_id, $friend_id);
		return $this->db->query($query, $values);
	}

	public function remove_friend($user_id, $friend_id)
	{
		$query = "DELETE FROM friendships WHERE user_id = {$user_id} AND friend_id = {$friend_id}";
		$values = array($user_id, $friend_id);
		return $this->db->query($query, $values); 
	}

}