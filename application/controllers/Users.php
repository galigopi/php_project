<?php
class Users extends CI_Controller
{
    // register
    public function register()
    {
        $data['title'] = 'Sign up';

        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|callback_check_email_exists');
        $this->form_validation->set_rules('username', 'UserName', 'required|callback_check_username_exists');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('password2', 'Confirm Password', 'matches[password]');
        $this->form_validation->set_rules('zipcode', 'ZIPCODE', 'required');


        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header');
            $this->load->view('users/register', $data);
            $this->load->view('templates/footer');
        } else {
            // encrypt password
            $enc_password = md5($this->input->post('password'));

            $this->user_model->register($enc_password);

            #sent message
            $this->session->set_flashdata('user_registered', 'You are now register and can login');
            redirect('posts');
        }
    }

    // login

    public function login()
    {
        $data['title'] = 'Login';

        $this->form_validation->set_rules('username', 'UserName', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');


        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header');
            $this->load->view('users/login', $data);
            $this->load->view('templates/footer');
        } else {

            $username = $this->input->post('username');
            $password = md5($this->input->post('password'));

            $user_id = $this->user_model->login($username, $password);
            if ($user_id) {
                $user_data = array(
                    'user_id' => $user_id,
                    'username' => $username,
                    'logged_in' => true
                );
                $this->session->set_userdata($user_data);
                $this->session->set_flashdata('user_loggedin', 'You are now logged in');
                redirect('posts');
            } else {
                $this->session->set_flashdata('user_failed', 'Login inValid');
                redirect('users/login');
            }
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('logged_in');
        $this->session->unset_userdata('user_id');
        $this->session->unset_userdata('username');

        $this->session->set_flashdata('user_loggedout', 'Your now loged out');

        redirect('users/login');
    }


    public function check_username_exists($username)
    {
        $this->form_validation->set_message('check_username_exists', 'the username is taken. please choose different one');
        if ($this->user_model->check_username_exists($username)) {
            return true;
        } else {
            return false;
        }
    }

    public  function check_email_exists($email)
    {
        $this->form_validation->set_message('check_email_exists', 'the email is taken. please choose different one');
        if ($this->user_model->check_email_exists($email)) {
            return true;
        } else {
            return false;
        }
    }
}
