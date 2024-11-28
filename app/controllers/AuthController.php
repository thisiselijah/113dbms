<?php
class AuthController extends Controller
{
    private $UsersModel;

    public function __construct()
    {
        $UsersModel = $this->model('UsersModel');
    }

    public function login()
    {
        $username = $this->retrievePostData()['username'];
        $password = $this->retrievePostData()['password'];
        // js user input validation
        // session 
    

        if ($this->UsersModel->getUsersByUsername($username, $password)) {
            session_start();
            $_SESSION['username'] = $username;
            $data = [
                'username' => $username,
                'login' => true
            ];
            extract($data);
            $this->view('/home', $data);
        } else {    
            // js alert
        }

        
    }

    public function logout()
    {
        session_unset();
        session_destroy();
        $this->redirect('/home');
    }

    // 登出改
}
?>