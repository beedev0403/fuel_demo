<?php

/**
 * Class Controller Post
 * @author Vương Kỳ Binh <v_kybinh@thk-hd.vn>
 */
class Controller_Post extends Controller_Template
{
    /**
     * @var Service_Post The post repository instance
     */
    protected $post_service;

    /**
     * Loads the post service from the container before any action is executed
     */
    public function before()
    {
        parent::before();
        $this->post_service = Container::forge(Service_Post::class);
    }

    /**
     * Displays a list of all posts
     * @return void
     */
    public function action_index()
    {
        $data['posts'] = $this->post_service->get_all_posts();
        $this->template->title = "Posts";
        $this->template->content = View::forge('post/index', $data);
    }

    /**
     * Shows the form for creating a new post and handles the submission
     * @return void
     * @throws Exception If validation fails or post creation fails
     */
    public function action_create()
    {
        if (Input::method() == 'POST')
        {
            try
            {
                $post = $this->post_service->create_post(Input::post());
                Session::set_flash('success', 'Added post #' . $post->id . '.');
                Response::redirect('posts');
            }
            catch (Exception $e)
            {
                Session::set_flash('error', $e->getMessage());
            }
        }
        $this->template->title = "New Post";
        $this->template->content = View::forge('post/modify');
    }

    /**
     * Shows the form for editing a post and handles the submission
     * @param int $id The ID of the Post
     * @return void
     * @throws Exception If the post is not found
     */
    public function action_edit($id = null)
    {
        if (is_null($id))
        {
            Session::set_flash('error', 'Post not found');
            Response::redirect('posts');
        }
        $post = $this->post_service->get_post($id);
        if (!$post)
        {
            Session::set_flash('error', 'Post not found');
            Response::redirect('posts');
        }
        if (Input::method() == 'POST')
        {
            try
            {
                $this->post_service->update_post($id, Input::post());
                Session::set_flash('success', 'Updated post #' . $id);
                Response::redirect('posts');
            }
            catch (Exception $e)
            {
                Session::set_flash('error', $e->getMessage());
            }
        }
        $data['post'] = $post;
        $this->template->title = "Edit Post";
        $this->template->content = View::forge('post/modify', $data);
    }

    /**
     * Deletes a post.
     * @param int $id The ID of the post
     * @return void
     * @throws Exception If the post is not found or deletion fails
     */
    public function action_delete($id = null)
    {
        if (is_null($id))
        {
            Session::set_flash('error', 'Post not found');
            Response::redirect('posts');
        }
        try
        {
            $this->post_service->delete_post($id);
            Session::set_flash('success', 'Deleted post #' . $id);
        }
        catch (Exception $e)
        {
            Session::set_flash('error', $e->getMessage());
        }
        Response::redirect('posts');
    }
}