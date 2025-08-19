<?php

/**
 * The Post Repository.
 * Implements the IPost interface and handles all data access logic for Posts.
 * @author Vương Kỳ Binh <v_kybinh@thk-hd.vn>
 */
class Repository_Post implements Interface_Post
{
    /**
     * Find all posts, ordered by creation date
     * @return Model_Post[]
     */
    public function find_all(): array
    {
        $posts = Model_Post::find('all', [
            'order_by' => ['created_at' => 'desc'],
        ]);
        return $posts === null ? [] : $posts;
    }

    /**
     * Find a post by its ID
     * @param  integer    $id
     * @return Model_Post
     */
    public function find_by_id(int $id): Model_Post
    {
        return Model_Post::find($id);
    }

    /**
     * Persist a post to the database (handles both create and update)
     * @param  Model_Post $post
     * @return Model_Post
     * @throws Exception
     */
    public function save_post(Model_Post $post): Model_Post
    {
        try
        {
            DB::start_transaction();
            if ($post->save())
            {
                DB::commit_transaction();
                return $post;
            }
            throw new Exception('Failed to save post');
        }
        catch (Exception $e)
        {
            DB::rollback_transaction();
            \Fuel\Core\Log::error($e->getMessage());
            throw $e;
        }
    }

    /**
     * Delete a post from the database
     * @param  Model_Post $post The post model instance to delete
     * @return Model_Post
     * @throws Exception
     */
    public function delete_post(Model_Post $post): Model_Post
    {
        return $post->delete();
    }
}
