<?php

    class UserController extends Controller
    {
        public static function registerAction($params)
        {
            extract($params);

            UserManager::RegisterUser($codename, $mail, $tel, $pw);

            header('Location: index.php?');
            exit();

        }

        public static function loginAction($params)
        {
            extract($params);

            UserManager::LoginUser($codename, $pw);

            header('Location: index.php?controller=UserController&action=AccountAction');
            exit();
        }

        public static function disconnectAction($params)
        {
            extract($params);
            if (isset($_COOKIE['token'])) 
            {
                unset($_COOKIE['token']);
                setcookie('token', '', time() - 1655596800); 
            }
            if (isset($_COOKIE['login'])) 
            {
                unset($_COOKIE['login']);
                setcookie('codename', '', time() - 1655596800); 
            }

            header('Location: index.php');
            exit();
        }

        public static function AccountAction($params)
        {
            extract($params);

            $tel = UserManager::GetTel($_COOKIE['token']);

            $params["tel"] ='0' . (string)$tel;

            $params["mail"] = UserManager::GetMail($_COOKIE['token']);

            

            self::render("view/template/Header.php", $params);
            self::render("view/template/account.php", $params);
        }

        public static function updateAction($params)
        {
            extract($params);
            UserManager::UpdateUser($codename, $mail, $tel, $_COOKIE['token']);
            self::AccountAction($params);
        }
    }


?>