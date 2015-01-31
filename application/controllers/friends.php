<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Friends extends CI_Controller {
	
	public function index()
	{
		$this->load->model('Friend');
		$friends['friends'] = $this->Friend->get_friends($this->session->userdata['record']['id']);
		$friends['others'] = $this->Friend->get_others($this->session->userdata['record']['id']);
		$this->load->view('friend_view', array('friends' => $friends)); 
	}
	public function add_friend($friend_id)
	{	
		$this->load->model('Friend');
		
		$friends = array(
			'user_id' => $this->session->userdata['record']['id'],
			'friend_id' => $friend_id
			);
		$this->Friend->add_friend($friends['user_id'], $friends['friend_id']);
		$this->Friend->add_friend($friends['friend_id'], $friends['user_id']);
		redirect('/friends_page');
	}
	public function remove_friend($friend_id)
	{
		$this->load->model('Friend');
		
		$friends = array(
			'user_id' => $this->session->userdata['record']['id'],
			'friend_id' => $friend_id
			);
		$this->Friend->remove_friend($friends['user_id'], $friends['friend_id']);
		$this->Friend->remove_friend($friends['friend_id'], $friends['user_id']);
		redirect('/friends_page');
	}
	public function view_profile($friend_id)
	{
		$this->load->model('Friend');
		$profile['info'] = $this->Friend->get_profile($friend_id);
		$this->load->view('profile_view', array('profile' => $profile));
	}

}

