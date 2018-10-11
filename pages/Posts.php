<?php
class Posts
{
    public function __construct()
    {
        $uri = Request::uri();

        if ($uri == '/posts') {
            $this->displayPosts();
        } elseif ($uri == '/posts/new') {
            $this->displayNewPostForm();
        } elseif ($uri == '/posts/submit') {
            $this->createNewPostInDatabase();
        } elseif ($uri == '/posts/edit/{id}') {
            list($id) = Request::params();
            $this->editPost($id);
        } elseif ($uri == '/posts/save/{id}') {
            list($id) = Request::params();
            $this->savePost($id);
        } elseif ($uri == '/posts/delete/{id}') {
            list($id) = Request::params();
            $this->deletePost($id);
        }
    }
    public function displayPosts()
    {
        $posts = db();
        $posts = $posts->fetchAll('posts');

        view("Posts/list", [
            'posts' => $posts,
        ]);

    }
    public function displayNewPostForm()
    {
        if (session()->has('user')) {
            view("Posts/CreateNewPost");
        } else {
            echo "Please Login First";
        }
    }
    public function createNewPostInDatabase()
    {
        if (Validation::isEmpty('newPosts')) {
            echo "The Form Can't Be Empty, Please Fill it.";
        } else {
            $database = db();

            $database->insert('posts', [
                'content' => Request::input('newPosts'),
            ]);
            redirect_to('/posts');
        }
    }
    public function editPost($id)
    {
        if (session()->has('user')) {
            $database = db();
            $post = $database->fetch('posts', [
                'id' => $id,
            ]);

            view("Posts/Edit",[
                'post_info' => $post,
            ]);
        } else {
            echo "Please Login First";
        }
    }
    public function savePost($id)
    {
        if (Validation::isEmpty('newPosts')) {
            echo "The Form Can't Be Empty, Please Fill it.";
        } else {
            $database = db();

            $database->update('posts', [
                'content' => Request::input('newPosts'),
            ], [
                'id' => $id,
            ]);
            redirect_to('/posts');
        }
    }
    public function deletePost($id)
    {
        $database = db();

            $database->delete('posts', [
                'id' => $id,
            ]);
           redirect_to('/posts');
        
    }

}
