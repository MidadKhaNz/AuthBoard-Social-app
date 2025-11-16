<?php
namespace App\Controllers;
use App\Core\Controller;
use App\Core\Session;
use App\Models\Post;
use App\Models\User;

class PostController extends Controller {
    private $postModel;

    public function __construct() {
        $this->postModel = new Post();
    }

    /**
     * Helper method to construct the full public URL for a post image.
     * * @param string|null $path The stored filename or path from the database.
     * @return string|null The full URL path, or null if the input is empty.
     */
    private function getPostImageUrl($path) {
        if (empty($path)) {
            return null;
        }
        
        if (strpos($path, '/assets/') === 0) {
            return $path;
        }
        
        if (strpos($path, '/') === false) {
            return '/assets/uploads/posts/' . $path;
        }
        
        return '/' . ltrim($path, '/');
    }

    /**
     * Displays all posts. Requires user authentication.
     */
    public function index() {
        $user = Session::get('user');
        if (!$user) {
            header('Location: /login');
            exit;
        }
        
        $posts = $this->postModel->getAllWithUsers();
        
        $enhancedPosts = [];
        foreach ($posts as $post) {
            $postUser = User::findById($post['user_id']); 
            $post['user_profile_picture'] = $postUser['profile_picture'] ?? null;
            
            if (!empty($post['image'])) {
                $post['image'] = $this->getPostImageUrl($post['image']);
            }
            
            $enhancedPosts[] = $post;
        }
        
        $this->view('posts/index.php', [
            'user' => $user,
            'posts' => $enhancedPosts
        ]);
    }

    /**
     * Displays the form to create a new post. Requires user authentication.
     */
    public function create() {
        $user = Session::get('user');
        if (!$user) {
            header('Location: /login');
            exit;
        }
        
        $this->view('posts/create.php', ['user' => $user]);
    }

    /**
     * Handles the submission of a new post form, including image upload. Requires user authentication.
     */
    public function store() {
        $user = Session::get('user');
        if (!$user) {
            header('Location: /login');
            exit;
        }

        $content = $_POST['content'] ?? '';
        $image = null;

        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $uploadDir = $_SERVER['DOCUMENT_ROOT'] . '/assets/uploads/posts/';
            
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0755, true);
            }
            
            $fileName = uniqid() . '_' . preg_replace('/[^a-zA-Z0-9\._-]/', '_', $_FILES['image']['name']);
            $targetPath = $uploadDir . $fileName;
            
            if (move_uploaded_file($_FILES['image']['tmp_name'], $targetPath)) {
                $image = $fileName;
            }
        }

        if (!empty($content) || !empty($image)) {
            $this->postModel->create($user['id'], $content, $image);
        }

        header('Location: /posts');
        exit;
    }

    /**
     * Deletes a post. Requires user authentication and ownership of the post.
     */
    public function delete() {
        $user = Session::get('user');
        if (!$user) {
            header('Location: /login');
            exit;
        }

        $postId = $_POST['post_id'] ?? null;
        
        if ($postId) {
            // Verify the post belongs to the current user before deleting
            $post = $this->postModel->findById($postId);
            
            if ($post && $post['user_id'] == $user['id']) {
                $this->postModel->delete($postId, $user['id']);
                
                // Delete associated image file if exists
                if ($post['image']) {
                    // Get the full system path to the image
                    $imagePath = $_SERVER['DOCUMENT_ROOT'] . '/assets/uploads/posts/' . $post['image'];
                    
                    if (file_exists($imagePath)) {
                        unlink($imagePath);
                    }
                }
            }
        }

        header('Location: /posts');
        exit;
    }
}