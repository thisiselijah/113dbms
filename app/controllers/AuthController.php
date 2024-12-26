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
            $_SESSION['identity'] = $result['identity'];
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
        $name = $postData['fullname'] ?? '';
        $email = $postData['email'] ?? '';
        $phone_number = $postData['phone_number'] ?? '';

       
        if (empty($account) || strlen($account) > 50) {
            $response = [
                'status' => 'error',
                'message' => '用戶名不能為空且不能超過 50 字'
            ];
            echo json_encode($response);
            return;
        }
        
        if (strlen($password) < 6) {
            $response = [
                'status' => 'error',
                'message' => '密碼需至少 6 個字元'
            ];
            echo json_encode($response);
            return;
        }
        
        if (empty($name) || strlen($name) > 50) {
            $response = [
                'status' => 'error',
                'message' => '名稱不能為空且不能超過 50 字'
            ];
            echo json_encode($response);
            return;
        }
        
        

        // 驗證 Email 格式
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $response = [
                'status' => 'error',
                'message' => 'Email 格式不正確'
            ];
            echo json_encode($response);
            return;
        }

        // 驗證電話號碼格式（僅接受數字，且長度為10）
        if (!preg_match('/^\d{10}$/', $phone_number)) {
            $response = [
                'status' => 'error',
                'message' => '電話號碼格式不正確'
            ];
            echo json_encode($response);
            return;
        }

        /*
        $is_existed =  $this->UsersModel->isAccountExists($account);
        error_log("Test: " . print_r($is_existed, true));
        */
        

        // 檢查帳號是否已存在
        try {
            if($this->UsersModel->isAccountExists($account)){
                // 嘗試新增使用者
                $response = [
                    'status' => 'error',
                    'message' => '帳號已存在'
                ];
            }else{
                $this->UsersModel->addUser($account, $password, $name, $email, $phone_number);
                $response = [
                    'status' => 'success',
                    'message' => '註冊成功'
                ];
            }
            
            echo json_encode($response);
        } catch (Exception $e) {
            error_log("Error: " . $e->getMessage());
            $response = [
                'status' => 'error',
                'message' => '註冊失敗，系統發生異常'
            ];
            echo json_encode($response);
        }
    }
  
}
