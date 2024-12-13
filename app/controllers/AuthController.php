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
        header('Content-Type: application/json');
        ob_clean();
        $postData = $this->retrievePostData();
        $account = $postData['username'] ?? '';
        $password = $postData['password'] ?? '';

        error_log("Session data: " . print_r($postData, true));

        $result = $this->UsersModel->getUsersByUsername($account, $password);


        if ($result) {
            // session_start();
            $id = $result['id'];
            $_SESSION['id'] = $id;
            $response = [
                'status' => 'success',
                'message' => 'Login successful'
            ];
            echo json_encode($response);
            // $this->redirect('?url=home');
        } else {
            $response = [
                'status' => 'error',
                'message' => 'Invalid username or password'
            ];
            echo json_encode($response);
            return;
        }

        // error_log("Session data: " . print_r($_SESSION['username'], true));
    }

    public function logout()
    {
        session_start();
        session_unset();
        session_destroy();
        $this->redirect('./?url=home');
    }
    // Register function
    public function register()
    {
        header('Content-Type: application/json');
        ob_clean();
        $postData = $this->retrievePostData();
        error_log("Post data: " . print_r($postData, true));
        $account = $postData['username'] ?? '';
        $password = $postData['password'] ?? '';
        $name = $postData['name'] ?? '';
        $email = $postData['email'] ?? '';
        $phone_number = $postData['phone_number'] ?? '';
        // 嘗試新增使用者，若失敗則回傳錯誤訊息格式為JSON
        try {
            $this->UsersModel->addUser($account, $password, $name, $email, $phone_number);
            $response = [
                'status' => 'success',
                'message' => 'Register successful'
            ];
            echo json_encode($response);
        } catch (Exception $e) {
            $response = [
                'status' => 'error',
                'message' => 'Register failed'
            ];
            echo json_encode($response);
        }
        
    }   
}
