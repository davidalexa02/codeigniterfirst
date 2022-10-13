<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users extends CI_Controller
{

    /**
     * Get All Data from this method.
     *
     * @return Response
     */
    public function __construct()
    {
        //load database in autoload libraries 
        parent::__construct();
        $this->load->model('User_model');
    }
    public function index()
    {

        $blog = new User_model;
        $data['data'] = $blog->getuser();
        // $this->load->view('includes/header');
        $this->load->view('list', $data);
        // $this->load->view('includes/footer');
    }

    public function create()
    {
        // $this->load->view('includes/header');
        $this->load->view('create');
        // $this->load->view('includes/footer');
    }

    /**
     * Store Data from this method.
     *
     * @return Response
     */
    public function store()
    {
        $blog = new User_model;
        $blog->insertuser2();
        redirect(base_url('users'));
    }

    /**
     * Edit Data from this method.
     *
     * @return Response
     */
    public function edit($id)
    {
        $blog = $this->db->get_where('blog', array('id' => $id))->row();
        // $this->load->view('includes/header');
        $this->load->view('edit', array('blog' => $blog));
        // $this->load->view('includes/footer');
    }

    /**
     * Update Data from this method.
     *
     * @return Response
     */
    public function update($id)
    {
        $blog = new User_model;
        $blog->updateuser($id);
        redirect(base_url('users'));
    }

    /**
     * Delete Data from this method.
     *
     * @return Response
     */
    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('blog');
        redirect(base_url('users'));
    }
}
