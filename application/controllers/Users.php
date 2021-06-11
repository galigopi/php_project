<?php
class Users extends CI_Controller
{
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


    function check_username_exists($username)
    {
        $this->form_validation->set_message('check_username_exists', 'the username is taken. please choose different one');
        if ($this->user_model->check_username_exists($username)) {
            return true;
        } else {
            return false;
        }
    }

    function check_email_exists($email)
    {
        $this->form_validation->set_message('check_email_exists', 'the email is taken. please choose different one');
        if ($this->user_model->check_email_exists($email)) {
            return true;
        } else {
            return false;
        }
    }
}

