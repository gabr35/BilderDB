<?php
require_once '../repository/LoginRepository.php';
require_once '../repository/GalleryRepository.php';
/**
 * Controller für das Login und die Registration, siehe Dokumentation im DefaultController.
 */
  class LoginController
  {
    
    /**
     * Default-Seite für das Login: Zeigt das Login-Formular an
	 * Dispatcher: /login
     */
    public function index()
    {
      $loginRepository = new LoginRepository();
      $view = new View('login_index_form');
      $view->title = 'Bilder-DB';
      $view->heading = 'Login';
      $view->display();
    }
    /**
     * Zeigt das Registrations-Formular an
	 * Dispatcher: /login/registration
     */
    public function registration()
    {
      $view = new View('login_regristration_form');
      $view->title = 'Bilder-DB';
      $view->heading = 'Registration';
      $view->display();
    }

    public function login()
    {
      $view = new View('login_registration');
      $view->title = 'Bilder-DB';
      $view->heading = 'Registration';
      $view->display();
    }

    public function doLogin() {

      $email = $_POST['email'];
      $password = sha1($_POST['password']);
      
      $loginRepository = new LoginRepository();
      if ($email !== "" && $password !== "") {
        $user = $loginRepository->checkLogin($email, $password);
        
        if ($user != null) {
          $_SESSION['uid'] = $user->id;
          $_SESSION['name'] = $user->name;
          header('Location: '.$GLOBALS['appurl'].'/landing');
        } else {
          header('Location: '.$GLOBALS['appurl'].'/login?error='.'Login ist falsch');
        }
      } else {
        switch ("") {
          case $email:
            header('Location: '.$GLOBALS['appurl'].'/login?error='.'E-mail ist leer');
            break;
          case $password:
            header('Location: '.$GLOBALS['appurl'].'/login?error='.'Password ist leer');
            break;
        }
      }
    }
    
    public function doRegistration()
    {
      $emailRegex = "/^(?!(?:(?:\x22?\x5C[\x00-\x7E]\x22?)|(?:\x22?[^\x5C\x22]\x22?)){255,})(?!(?:(?:\x22?\x5C[\x00-\x7E]\x22?)|(?:\x22?[^\x5C\x22]\x22?)){65,}@)(?:(?:[\x21\x23-\x27\x2A\x2B\x2D\x2F-\x39\x3D\x3F\x5E-\x7E]+)|(?:\x22(?:[\x01-\x08\x0B\x0C\x0E-\x1F\x21\x23-\x5B\x5D-\x7F]|(?:\x5C[\x00-\x7F]))*\x22))(?:\.(?:(?:[\x21\x23-\x27\x2A\x2B\x2D\x2F-\x39\x3D\x3F\x5E-\x7E]+)|(?:\x22(?:[\x01-\x08\x0B\x0C\x0E-\x1F\x21\x23-\x5B\x5D-\x7F]|(?:\x5C[\x00-\x7F]))*\x22)))*@(?:(?:(?!.*[^.]{64,})(?:(?:(?:xn--)?[a-z0-9]+(?:-[a-z0-9]+)*\.){1,126}){1,}(?:(?:[a-z][a-z0-9]*)|(?:(?:xn--)[a-z0-9]+))(?:-[a-z0-9]+)*)|(?:\[(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){7})|(?:(?!(?:.*[a-f0-9][:\]]){7,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?)))|(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){5}:)|(?:(?!(?:.*[a-f0-9]:){5,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3}:)?)))?(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))(?:\.(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))){3}))\]))$/iD";
      $regex = "^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&])[A-Za-z\d$@$!%*?&]{8,}";
      $name = $_POST['name'];
      $email = $_POST['email'];
      $password = $_POST['password'];
      $passwordBestätigen = $_POST['password_bestätigen'];

      $loginRepository = new LoginRepository();

      if ($name !== ""  && $email !== "" && $password !== "" && $passwordBestätigen !== "") {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
          if ($password === $passwordBestätigen) {
            $uppercase = preg_match('@[A-Z]@', $password);
            $lowercase = preg_match('@[a-z]@', $password);
            $number    = preg_match('@[0-9]@', $password);
            if ($loginRepository->chekcEmail($email) || isset($_GET['update'])) {
              if($uppercase && $lowercase && $number && strlen($password) >= 8) {
                
                $password = sha1($password);
                if (isset($_GET['update'])) {
                  $loginRepository->updateUser( $_SESSION['uid'], $name, $email, $password);
                  $_SESSION['name'] = $name;
                  header('Location: '.$GLOBALS['appurl'].'/landing');
                } else {
                  $loginRepository->registerUser($name, $email, $password);
                
                
                sleep(3);
                $user = $loginRepository->checkLogin($email, $password);
                //var_dump($user);
                //die();
                $_SESSION['uid'] = $user->id;
                $_SESSION['name'] = $user->name;
                header('Location: '.$GLOBALS['appurl'].'/landing');
                }
                
              } else {
                header('Location: '.$GLOBALS['appurl'].'/login/registration?error='.'Passwort entspricth nicht der Vorgabe');
              }
            } else {
              header('Location: '.$GLOBALS['appurl'].'/login/registration?error='.'Email ist schon vergeben');
            }
          } else {
            header('Location: '.$GLOBALS['appurl'].'/login/registration?error='.'Passwörter stimmen nicht überein');
          }
        } else {
          header('Location: '.$GLOBALS['appurl'].'/login/registration?error='.'Email ist nicht gültig');
        }
      } else {
        switch ("") {
          case $name:
            header('Location: '.$GLOBALS['appurl'].'/login/registration?error='.'Name ist leer');
            break;
          case $email:
            header('Location: '.$GLOBALS['appurl'].'/login/registration?error='.'E-mail ist leer');
            break;
          case $password:
            header('Location: '.$GLOBALS['appurl'].'/login/registration?error='.'Password ist leer');
            break;
          case $password:
            header('Location: '.$GLOBALS['appurl'].'/login/registration?error='.'Password ist leer');
            break;
        }
      }
    }

    public function editUser() {
      $uid = $_SESSION['uid'];
      $loginRepository = new LoginRepository();
      $view = new View('edit_user');
      $view->title = 'Bilder-DB';
      $view->heading = 'Edit User';
      $user = $loginRepository->getUser($uid);
      $view->user = $user;
      
      $view->display();
      
    }

    public function deleteUser() {
      $loginRepository = new LoginRepository();
      $galleryRepository = new GalleryRepository();
      $galleries = $galleryRepository->getGalleriesByUid($_SESSION['uid']);
      foreach ($galleries as $gallerie) {
        header('Location: '.$GLOBALS['appurl'].'/gallerie/delete?id='.$gallerie->id);
      }
      $loginRepository->deleteUserById($_SESSION['uid']);
      
      session_destroy();
      
      header('Location: '.$GLOBALS['appurl'].'/login/registration');
      
    }

    public function logout() {
      session_destroy();
      var_dump($_SESSION['name']);
      //die();ss
      header('Location: '.$GLOBALS['appurl'].'/login');
    }
    
}
?>