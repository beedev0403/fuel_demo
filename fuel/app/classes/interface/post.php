<?php

/**
 * The Post Interface.
 * Defines the contract for data access operations for Posts.
 * @author Vương Kỳ Binh <v_kybinh@thk-hd.vn>
 */
interface Interface_Post
{
    /**
     * Find all posts, ordered by creation date
     * @return Model_Post[]
     */
    public function find_all(): array;

    /**
     * Find a post by its ID
     * @param  integer    $id
     * @return Model_Post
     */
    public function find_by_id(int $id): Model_Post;

    /**
     * Persist a post to the database (handles both create and update)
     * @param  Model_Post $post
     * @return Model_Post
     * @throws Exception
     */
    public function save_post(Model_Post $post): Model_Post;

    /**
     * Delete a post from the database
     * @param  Model_Post $post The post model instance to delete
     * @return Model_Post
     * @throws Exception
     */
    public function delete_post(Model_Post $post): Model_Post;
}