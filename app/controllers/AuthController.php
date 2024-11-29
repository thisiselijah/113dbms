<?php
class AuthController extends Controller
{
    private $UsersModel;

    public function __construct()
    {
        $this->UsersModel = $this->model('UsersModel');
    }

    public function login()
    {
        
        //session_unset();
        // session_destroy();

        header('Content-Type: application/json');
        $postData = $this->retrievePostData();
        $account = $postData['username'] ?? '';
        $password = $postData['password'] ?? '';
        
        error_log("Received POST data: " . print_r($postData, true));

        if ($this->UsersModel->getUsersByUsername($account, $password)) {
            session_start();
            $_SESSION['username'] = $account;
            $_SESSION['login'] = true;

            $this->redirect('../?url=home');
            
        } else {    
            $response = [
                'status' => 'error',
                'message' => 'Invalid username or password'
            ];
            echo json_encode($response);
            return;
        }

        
    }

    public function logout()
    {
        session_unset();
        session_destroy();
        $this->redirect('?url=home');
    }

    // 登出後回到首頁
}
