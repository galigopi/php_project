<?php
class Posts extends CI_Controller
{
    public function index()
    {

        $data['title'] = ucfirst("Latest posts");
        $data['posts'] = $this->post_model->get_posts();

        $this->load->view('templates/header', $data);
        $this->load->view('posts/index', $data);
        $this->load->view('templates/footer', $data);
    }


    public function view($slug = NULL)
    {
        $data['post'] = $this->post_model->get_posts($slug);
        $post_id = $data['post'][0]['id'];
        $data['comments'] = $this->comment_model->get_comments($post_id);
        if (empty($data['post'])) {
            show_404();
        }
        $data['title'] = $data['post'][0]['title'];

        $this->load->view('templates/header', $data);
        $this->load->view('posts/view', $data);
        $this->load->view('templates/footer', $data);
    }

    public function create()
    {
        $data['title'] = 'create Post';
        $data['categories'] = $this->post_model->get_categories();
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('body', 'Body', 'required');
        $this->form_validation->set_rules('slug', 'Slug', 'required');


        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('posts/create', $data);
            $this->load->view('templates/footer', $data);
        } else {
            // upload image
            $config['upload_path'] = './assets/images/posts';
            $config['allowed_types'] = 'gif|jpg|png';
            // $config['max_size'] = '2048';
            // $config['max_width'] = '500';
            // $config['max_height'] = '500';

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload()) {
                $error = array('error' => $this->upload->display_errors());
                $post_image = 'noimages.png';
            } else {
                $data = array('upload_data' => $this->upload->data());
                $post_image = $_FILES['userfile']['name'];
            }

            $this->post_model->create_post($post_image);
            redirect('posts');
        }
    }

    public function delete($id)
    {
        $this->post_model->delete_post($id);
        redirect('posts');
    }

    public function edit($slug)
    {
        $data['post'] = $this->post_model->get_posts($slug);
        $data['categories'] = $this->post_model->get_categories();
        if (empty($data['post'])) {
            show_404();
        }
        $data['title'] = 'Edit Post';

        $this->load->view('templates/header', $data);
        $this->load->view('posts/edit', $data);
        $this->load->view('templates/footer', $data);
    }

    public function update()
    {
        $this->post_model->update_post();
        redirect('posts');
    }
}
