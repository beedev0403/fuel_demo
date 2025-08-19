<?php

/**
 * Class Service Post
 * @author Vương Kỳ Binh <v_kybinh@thk-hd.vn>
 */
class Service_Post
{
    /**
     * @var  Interface_Post  The post repository instance
     */
    protected $post_repository;

    /**
     * The constructor, which injects the repository dependency
     * @param  Interface_Post  $post_repository
     */
    public function __construct(Interface_Post $post_repository)
    {
        $this->post_repository = $post_repository;
    }

    /**
     * Get all posts for display
     * @return Model_Post[]
     */
    public function get_all_posts(): array
    {
        return $this->post_repository->find_all();
    }

    /**
     * Get a single post by its ID
     * @param   integer  $id  The ID of the post
     * @return  Model_Post
     * @throws  Exception If the post is not found
     */
    public function get_post(int $id): Model_Post
    {
        $post = $this->post_repository->find_by_id($id);
        if (!$post)
        {
            throw new \Exception("Post with ID {$id} not found.");
        }
        return $post;
    }

    /**
     * Create a new post from raw input data
     * @param array $data
     * @return Model_Post
     * @throws Exception If validation fails
     */
    public function create_post(array $data): Model_Post
    {
        $val = Validation_Post_Create::forge();
        if ($val->run($data))
        {
            $post = Model_Post::forge($val->validated());
            $post = $this->post_repository->save_post($post);
            return $post;
        }
        throw new Exception('Validation error: ' . implode(', ', $val->error_message()));
    }

    /**
     * Update an existing post
     * @param integer $id
     * @param array $data
     * @return Model_Post
     * @throws Exception If validation fails or the post is not found
     */
    public function update_post(int $id, array $data): Model_Post
    {
        $post = $this->post_repository->find_by_id($id);
        if (!$post)
        {
            throw new Exception("Post with ID {$id} not found.");
        }
        $val = Validation_Post_Edit::forge();
        if ($val->run($data))
        {
            $post->set($val->validated());
            $post = $this->post_repository->save_post($post);
            return $post;
        }
        throw new Exception('Validation error: ' . implode(', ', $val->error_message()));
    }

    /**
     * Delete a post by its ID
     * @param   integer  $id  The ID of the post to delete
     * @return  Model_Post
     * @throws  Exception If the post is not found
     */
    public function delete_post(int $id): Model_Post
    {
        $post = $this->post_repository->find_by_id($id);
        if (!$post)
        {
            throw new Exception('Post not found');
        }
        return $post->delete();
    }
}