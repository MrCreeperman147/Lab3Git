<?php

    class UserManager
    {
        public static $logged = false;
        public static $codename;
        public static $userId;

        public static function CreateToken(string $codename, string $pw)
        {
            $tokenValidity = mktime(0, 0, 0, date("m"), date("d") + 10, date("Y"));
            $retour = password_hash($tokenValidity . $codename . $pw . "my_token", PASSWORD_BCRYPT);
            return $retour;
        }

        public static function RegisterUser(string $codename, string $mail, int $tel, string $pw)
        {
            self::$logged = false;

            $acknowledge = false;

            $query = "INSERT INTO user (codename, mail, tel, pw, token, token_validity) VALUES (:codename, :mail, :tel, :pw, :token, :tokenValidity)";

            try
            {
                $result = EntityManager::prepare($query);

                $result->bindParam(":codename",$codename);
                $result->bindParam(":mail",$mail);
                $result->bindParam(":tel","33" . $tel);

                #hacher le pw
                $pwH = password_hash($pw, PASSWORD_BCRYPT);
                $result->bindParam(":pw",$pwH);

                #token validity
                $tokenValidity = mktime(0, 0, 0, date("m"), date("d") + 10, date("Y"));
                $date = date("Y-m-d", $tokenValidity);
                $result->bindParam(":tokenValidity", $date);


                $token = self::CreateToken($codename, $pw);
                $result->bindParam(":token", $token);
                $result->execute();

                #get user
                
                setcookie("token", $token, $tokenValidity);
                setcookie("codename", $codename, $tokenValidity);

                self::$codename = $codename;
                self::$logged = true;

                $acknowledge = true;
            }
            catch(Exception $e)
            {
                
            }
            finally
            {
                return $acknowledge;
            }
        }

        public static function LoginUser($codename, $pw)
        {
            self::$logged = false;

            $query = "SELECT id, pw, token, token_validity FROM user where codename = :codename";

            try 
            {
                $result = EntityManager::prepare($query);

                $result->bindParam(":codename", $codename);

                $result->execute();
                $result->setFetchMode(PDO::FETCH_ASSOC);

                #verifie que le resulta n'est pas vide
                if($result->rowCount() != 0)
                {
                    while($arr = $result->fetch())
                    {
                        #si pw correct
                        if(password_verify($pw, $arr['pw']))
                        {
                            
                            self::$userId = $arr['id'];
                            self::$codename = $codename;

                            $tokenValidity = strtotime($arr['token_validity']); #string to time
                            $token = $arr['token'];
                            $now = mktime(0, 0, 0, date("m"), date("d") + 10, date("Y"));


                            $tokenValidity = $now;
                            $date = date('Y-m-d', $now);

                            self::UpdateToken($token, $tokenValidity, $arr['id']);
                            
                            setcookie("token", $token, $tokenValidity);
                            setcookie("codename", $codename, $tokenValidity);

                            self::$logged = true;
                        }
                    }
                }


            } catch (Exception $e) 
            {
                die("Erreur à l'authentification");
            }

            return self::$logged;
        }


        public static function UpdateUser(string $codename, string $mail, int $tel, string $token)
        {
            $acknowledge = false;

            $query = "UPDATE user SET codename = :codename, mail = :mail, tel = :tel, token = :token";

            try
            {
                $result = EntityManager::prepare($query);

                $result->bindParam(":codename",$codename);
                $result->bindParam(":mail",$mail);
                $result->bindParam(":tel",$tel);
                $result->bindParam(":token",$token);

                $result->execute();

                $acknowledge = true;
            }
            catch(Exception $e)
            {
                die("Erreur à la mise a jour de l'user");
            }
            return $acknowledge;
        }


        public static function UpdateToken($token, $tokenValidity, $id)
        {
            $acknowledge = false;

            $query = 'UPDATE user SET token = :token, token_validity = :token_validity where id = :id';

            try
            {
                $result = EntityManager::prepare($query);

                $result->bindParam(":token",$token);
                $result->bindParam(":token_validity",$tokenValidity);
                $result->bindParam(":id",$id);

                $result->execute();

                $acknowledge = true;
            }
            catch(Exception $e)
            {
                die("Erreur à la mise a jour du token");
            }

            return $acknowledge;
        }

        public static function UpdatePW(string $mail, string $pw)
        {
            $acknowledge = false;

            $query = 'UPDATE user SET pw = :pw where mail = :mail';

            try
            {
                $result = EntityManager::prepare($query);

                $result->bindParam(":mail",$mail);

                $pwH = password_hash($pw, PASSWORD_BCRYPT);
                $result->bindParam(":pw",$pwH);

                $result->execute();

                $acknowledge = true;
            }
            catch(Exception $e)
            {
                die("Erreur à la mise a jour du token");
            }

            return $acknowledge;
        }

        public static function LoginUserWithToken(string $token)
        {
            self::$logged = false;

            $query = "SELECT id, codename, tokenValidity FROM user where token = :token";

            try
            {
                $result = EntityManager::prepare($query);
                $result->bindParam(":token", $token);

                $result->execute();
                $result->setFetchMode(PDO::FETCH_ASSOC);

                if($result->rowCount() != 0)
                {
                    while($arr = $result->fetch())
                    {
                        if($now > $tokenValidity)
                        {
                            $tokenValidity = $now;
                            $date = date('Y-m-d', $now);

                            self::$userId = $arr['id'];
                            self::$codename = $arr['codename'];
                            self::$logged = true;

                            setcookie("codename", $arr['codename'], $tokenValidity);
                        }

                        self::$logged = true;
                    }
                }
            }
            catch(Exception $e)
            {
                die("Erreur à l'authentification (token)");
            }
        }

        public static function GetAdmin(string $token)
        {
            $admin = false;

            $query = "SELECT admin FROM user where token = :token";

            try
            {
                $result = EntityManager::prepare($query);
                $result->bindParam(":token", $token);

                $result->execute();

                $admin = $result->fetch()['admin'];
            }
            catch(Exception $e)
            {
                die("Error code 255");
            }

            return $admin;
        }

        public static function GetMail(string $token)
        {
            $query = "SELECT mail FROM user WHERE token = :token";

            $mail = "";

            try
            {
                $result = EntityManager::prepare($query);
                $result->bindParam(":token", $token);

                $result->execute();

                $mail = $result->fetch()['mail']; 
            }
            catch(Exception $e)
            {
                die("Ne peut pas trouver l'EMail ");
            }
            return $mail;
        }

        public static function GetTel(string $token)
        {
            $query = "SELECT tel FROM user WHERE token = :token";

            $tel = 0;

            try
            {
                $result = EntityManager::prepare($query);
                $result->bindParam(":token", $token);

                $result->execute();

                $tel = $result->fetch()['tel']; 
            }
            catch(Exception $e)
            {
                die("Ne peut pas trouver le tel ");
            }
            return $tel;
        }
    }

?>