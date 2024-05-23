<?php

class UserController extends Controlador
{

    private $usuari;

    private $passwd;

    public function show()
    {
        $fitxerDeTraduccions = $this->queIdioma();
        if (!isset($_SESSION['id'])) {
            $loginVista = new LoginVista();
            $loginVista->show($fitxerDeTraduccions, false);
        } else {
        }
    }



    public function config()
    {
        $fitxerDeTraduccions = $this->queIdioma();
        if ($_SESSION['admin'] == 1) {
            $userModel = new UsuariModel;
            $userVista = new UserVista();
            $users = $userModel->read();
            $html = $this->configUser($users);
            $userVista->show($fitxerDeTraduccions, $html);
        } else {
            $errorVista = new ErrorVista();
            $texto = new Exception('No tienes el permiso de CONFIGURAR LOS USUARIOS');;
            $errorVista->show($texto);
        }
    }


    public function loginOut()
    {
        unset($_SESSION['user_info']);
        unset($_SESSION['access_token']);
        session_destroy();
        $home = new HomeController();
        $home->show();
    }

    // public function regist()
    // {
    //     $fitxerDeTraduccions = $this->queIdioma();
    //     $registrar = new LoginVista();
    //     $registrar->registrar($fitxerDeTraduccions, null, null);
    // }



    public function loginGoogle()
    {
        $clientID = '241965399440-59ek83pl2u1scemevj8pbf868ctlgm2v.apps.googleusercontent.com';
        $clientSecret = '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';
        $redirectUrl = 'https://www.qceproba.com/';

        $client = new Google_Client();
        $client->setClientId($clientID);
        $client->setClientSecret($clientSecret);
        $client->setRedirectUri($redirectUrl);
        $client->addScope('profile');
        $client->addScope('email');
        $client->addScope('https://www.googleapis.com/auth/drive');
        if (isset($_GET['code'])) {
            $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
            $client->setAccessToken($token);

            $gauth = new Google_Service_Oauth2($client);
            $google_info = $gauth->userinfo->get();
            $email = $google_info->email;
            $name = $google_info->name;
            $picture = $google_info->picture;
        } else {
            $loginUrl = $client->createAuthUrl();
            header('Location: ' . $loginUrl);
            exit();
        }
    }

    // public function proba()
    // {
    //     $email = "2002duguxiu@gmail.com";


    //     $userModel = new UsuariModel();
    //     $result = $userModel->read();
    //     var_dump($result);
    // }
    public function userGoogle($params)
    {
        try {
            //Coprobacio sobre el URL, si no hay CODE pues retorna NULL
            $code = isset($params['code']) ? $params['code'] : null;
            //Si no equentra el CODE pues sale un exception
            if (!$code) {
                throw new Exception("Authorization code not found.");
            }
            //Sobre el tocken y URL
            $clientID = '241965399440-59ek83pl2u1scemevj8pbf868ctlgm2v.apps.googleusercontent.com';
            $clientSecret = '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';
            $redirectUrl = 'https://www.qceproba.com/';

            $tokenEndpoint = 'https://oauth2.googleapis.com/token';
            $tokenParams = [
                'code' => $code,
                'client_id' => $clientID,
                'client_secret' => $clientSecret,
                'redirect_uri' => $redirectUrl,
                'grant_type' => 'authorization_code',
            ];

            $ch = curl_init($tokenEndpoint);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $tokenParams);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($ch);

            if ($response === false) {
                throw new Exception("Failed to retrieve access token. cURL error: " . curl_error($ch));
            }

            $tokenData = json_decode($response, true);
            if (!isset($tokenData['access_token'])) {
                throw new Exception("Access token not found in response.");
            }

            $accessToken = $tokenData['access_token'];

            $userInfo = $this->getUserInfo($accessToken);

            $userModel = new UsuariModel();
            $result = $userModel->read();
            $esta = false;
            for ($i = 0; $i < count($result); $i++) {
                if ($result[$i]["email"] === $userInfo["email"]) {
                    $esta = true;
                    $_SESSION['admin'] = (int)$result[$i]['es_administrador'];
                }
            }

            if ($esta == true) {
                //Guardar los datos de usuario en una session
                $_SESSION['user_info'] = $userInfo;
                //Guardar el token de usuario en la session
                $_SESSION['access_token'] = $accessToken;

                /****************************************************
                // // Prova：Retornar los datos de usuario -->Consegido tener los datos de usuario y permiso de Google Drive√
                // if($userInfo == null){
                //     echo "1";
                // }
                // echo "<pre>";
                // var_dump($userInfo);
                // echo "</pre>";
                 ******************************************************/
                header("Location: https://www.qceproba.com/");
                // return $userInfo;
            } else {

                echo "<script>alert('No esta unido en la WEP, pide el administrador que añade tu usuario'); window.location.href = 'https://www.qceproba.com/';</script>";
            }
        } catch (Exception $e) {
            // Exception
            return ['error' => true, 'message' => $e->getMessage()];
        }
    }
    public function getUserInfo($accessToken)
    {
        $userInfoEndpoint = 'https://www.googleapis.com/oauth2/v2/userinfo';

        $ch = curl_init($userInfoEndpoint);
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Authorization: Bearer ' . $accessToken]);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $userInfoResponse = curl_exec($ch);
        if ($userInfoResponse === false) {
            throw new Exception("Failed to retrieve user info. cURL error: " . curl_error($ch));
        }

        return json_decode($userInfoResponse, true);
    }

    public function addUser()
    {
        // 检查请求方法是否为 POST
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_SESSION['admin'] === 1) {

            $username = $_POST['username'];
            $email = $_POST['email'];
            if ($_POST['isAdmin'] === "on") {
                $admin = 1;
            } else {
                $admin = 0;
            }

            $newUser = new Usuari($email, $username, $admin);

            $result = $this->create($newUser);
            header("Location: https://www.qceproba.com/?user/config");
        } else {
            throw new Exception("No tienes el permiso de confiugrar los usuarios");
        }
    }


    // La function para guardar un nuevo usuario en la base de datos.
    private function create($user)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_SESSION['admin'] === 1) {
            $userModel = new UsuariModel;
            $creado = $userModel->create($user);
            if ($creado) {
                return true;
            } else {
                return false;
            }
        } else {
            throw new Exception("No tienes el permiso de confiugrar los usuarios");
        }
    }
    public function delete()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_SESSION['admin'] === 1) {
            $uModel = new UsuariModel();
            $uModel->delete($_POST["user_id"]);
            header("Location: https://www.qceproba.com/?user/config");
        } else {
            throw new Exception("No tienes el permiso de confiugrar los usuarios");
        }
    }
    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_SESSION['admin'] === 1) {
            $uId = $_POST["user_id"];
            $username = $_POST["username"];
            $email = $_POST["email"];
            if ($_POST['admin'] === "on") {
                $admin = 1;
            } else {
                $admin = 0;
            }
            $usuari = new Usuari($email, $username, $admin);
            $usuari->setId($uId);
            $uModel = new UsuariModel();
            $uModel->update($usuari);
            header("Location: https://www.qceproba.com/?user/config");
        } else {
            throw new Exception("No tienes el permiso de confiugrar los usuarios");
        }
    }


    public function configUser($obj)
    {
        $html = "";
        foreach ($obj as $key => $user) {
            $admin = "<span style='color:red;font-size:30px'>&#10539;</span>";
            if ($user['es_administrador'] === "1") {
                $admin = "<span style='color:green;font-size:30px'>&#10003;</span>";
            }
            $html .=
                "<tr>
            <td class='dtr-control'>
                <div class='form-check font-size-16'> <input class='form-check-input' type='checkbox' id='orderlistIdCheck-12'> <label class='form-check-label' for='orderlistIdCheck-12'></label> </div>
            </td>
            <td>
                <div class='customerlist-name'>{$user['id']}</div>
            </td>
            <td>{$user['email']}</td>
            <td>{$user['username']}</td>
            <td>{$admin}</td>
            <td>No hay</td>
            <td><i class='fa-solid fa-pencil' data-bs-toggle='modal' data-bs-target='#editUserModal' data-id='{$user['id']}' data-email='{$user['email']}' data-username='{$user['username']}' data-admin='{$user['es_administrador']}'></i></td>
            <td><i class='fa-solid fa-trash' data-bs-toggle='modal' data-bs-target='#deleteUserModal' data-id='{$user['id']}'></i></td>
        </tr>";
        }
        $html .= "
        <!-- Delete User Modal -->
        <div class='modal fade' id='deleteUserModal' tabindex='-1' aria-labelledby='deleteUserModalLabel' aria-hidden='true'>
            <div class='modal-dialog'>
                <div class='modal-content'>
                    <div class='modal-header'>
                        <h5 class='modal-title' id='deleteUserModalLabel'>Confirm Delete</h5>
                        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                    </div>
                    <div class='modal-body'>
                        Are you sure you want to delete this user?
                    </div>
                    <div class='modal-footer'>
                        <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Cancel</button>
                        <form id='deleteUserForm' action='https://www.qceproba.com/?user/delete' method='post'>
                            <input type='hidden' name='user_id' id='deleteUserId'>
                            <button type='submit' class='btn btn-danger'>Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Edit User Modal -->
        <div class='modal fade' id='editUserModal' tabindex='-1' aria-labelledby='editUserModalLabel' aria-hidden='true'>
            <div class='modal-dialog'>
                <div class='modal-content'>
                    <div class='modal-header'>
                        <h5 class='modal-title' id='editUserModalLabel'>Edit User</h5>
                        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                    </div>
                    <div class='modal-body'>
                        <form id='editUserForm' action='https://www.qceproba.com/?user/update' method='post'>
                            <input type='hidden' name='user_id' id='editUserId'>
                            <div class='mb-3'>
                                <label for='editEmail' class='form-label'>Email</label>
                                <input type='email' class='form-control' id='editEmail' name='email' required>
                            </div>
                            <div class='mb-3'>
                                <label for='editUsername' class='form-label'>Username</label>
                                <input type='text' class='form-control' id='editUsername' name='username' required>
                            </div>
                            <div class='mb-3 form-check'>
                                <input type='checkbox' class='form-check-input' id='editAdmin' name='admin'>
                                <label class='form-check-label' for='editAdmin'>Administrator</label>
                            </div>
                            <div class='modal-footer'>
                                <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Cancel</button>
                                <button type='submit' class='btn btn-success'>Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        ";

        return $html;
    }
}
