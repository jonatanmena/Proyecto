<?php
    namespace Controller;

    use Model\User as User;
    use \DateTime as DateTime;
    use Model\Purchase as Purchase;
    use Model\Client as Client;
    use Daos\PDOs\UserDaoPdo as UserDaoPdo;
    use Daos\PDOs\PurchaseDaoPdo as PurchaseDaoPdo;
    use Daos\PDOs\Purchase_LinesDaoPdo as Purchase_LinesDaoPdo;

    class UserController
    {
        private $UserData;

        public function __construct()
        {
            $this->UserData= new UserDaoPdo();
        }

        public function newUser()
        {
            require_once(VIEWS_PATH."nav-bar.php");
            require_once(ADD_PATH."newUser.php");
            require_once(VIEWS_PATH."footerViejo.php");
        }

        public function listUsers()
        {
            require_once(VIEWS_PATH."nav-bar.php");
            require_once(LIST_PATH."listUsers.php");
            require_once(VIEWS_PATH."footerViejo.php");
        }
        public function verifyClient($UserCode){
          $ClientObject=$this->UserData->GetClientByUserCode($UserCode);
          if($ClientObject==NULL){
              echo '
              <script type="text/javascript">
              alert("No tienes un cliente asignado por favor completa los datos.");
              location="'.FRONT_ROOT.'main/makeClient";
              </script>
              ';
          }else {
            $PurchaseData = new PurchaseDaoPdo();
            $Purchase_LinesData = new Purchase_LinesDaoPdo();

            $Date = new DateTime("Now");
            $Date=date_format($Date, 'Y-m-d H:i:s');

            $PurchaseObject = new Purchase($Date,$ClientObject,$Status = "Activo");
            $LastPurchaseID=$PurchaseData->Add($PurchaseObject);

            $PurchaseObject->setID($LastPurchaseID);
            if(count($_SESSION["Purchase_Lines"])==0){
                echo '
                <script type="text/javascript">
                alert("Agrega algo al carrito no me quieras romper el programa.");
                location="'.FRONT_ROOT.'main/purchase";
                </script>
                ';
            }
              foreach ($_SESSION["Purchase_Lines"] as $Lines) {
                $Lines->setPurchase($PurchaseObject);
                $Lines->getPurchase()->setID($LastPurchaseID);
                $Purchase_LinesData->Add($Lines);
              }

            $PurchaseList=$PurchaseData->GetAllPurchaseByClientCode($ClientObject->getID());

            echo '
            <script type="text/javascript">
            alert("Se compro correctamente.");
            location="'.FRONT_ROOT.'main/purchase";
            </script>
            ';

            $i=0;
            foreach ($_SESSION["Purchase_Lines"] as $Lines) {
              unset($_SESSION["Purchase_Lines"][$i]);
              $i++;
            }
            $_SESSION["TotalPurchase"] = 0;
          }
        }
        public function Login($Email, $Password)
        {
            if (isset($Email) && isset($Password)) {
                $user=$this->UserData->getIfLoggedSucces($Email, $Password);
                if ($user!=null) {
                    $_SESSION["userLogged"]=$user;
                    $cliente = new Client($_SESSION["userLogged"]->getUser(),0,0);
                    $fecha = new DateTime("now");
                    $Purchase = new Purchase($fecha,$cliente);
                    $_SESSION["Purchase_Lines"]= array();
                    header("location:/Proyecto/Main/index");
                } else {
                    echo "<script> if(alert('Datos incorrectos!'));</script>";
                    header("location:/Proyecto/Main/index");
                }
            }
        }
        public function addUser($User, $Password, $Privilege)
        {
            $UserObject = new User($User, $Password, $Privilege);
            $this->UserData->add($UserObject);
            $this->listUsers();
        }
    }
