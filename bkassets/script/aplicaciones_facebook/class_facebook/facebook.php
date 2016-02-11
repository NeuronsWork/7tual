<?php
session_start();
class facebook
{
    //contenedor para nuestra conexión
    private $connect;
    //conectamos con la extensión PDO
    public function __construct()
    {
        $this->connect = new PDO("mysql:host=localhost;dbname=facebook", "root", "");
    }
    //evitamos problemas con carácteres especiales
    private function set_names() {
        return $this->connect->query("SET NAMES 'utf8'");
    }
    //login.php --> hacemos un login de usuarios sencillo
    public function login($email, $password) {
        self::set_names();
        $query = $this->connect->prepare("SELECT * FROM users WHERE email = ? AND password = ?");
        $query->bindParam(1, $email);
        $query->bindParam(2, $password);
        $query->execute();

        if ($query->rowCount() == 1) {
            while($row = $query->fetch())
            {
                $_SESSION["username"]=$row["username"];
                $_SESSION["email"]=$row["email"];
                $_SESSION["id"]=$row["id"];
                header("Location: index.php");
            }
        }else
        {
            echo 'No existe';
        }
    }
    //comprobamos si existen enlaces y si es así los mostramos como tal
    public function link($mensaje) {
        $mensaje = preg_replace('/\b(https?|ftp|file):\/\/[-A-Z0-9+&@#\/%?=~_|!:,.;]*[A-Z0-9+&@#\/%=~_|]/i', '<a href="\0">\0</a>', $mensaje);
        return $mensaje;
    }

    //new_entry.php --> creamos una nueva entrada y mostramos
    //los datos con el uso de prependTo de jQuery y los guardamos en la base de datos
    public function insert_entry($message)
    {
        self::set_names();
        $user = $_SESSION['username'];
        $userid = $_SESSION['id'];
        $ema = $_SESSION['email'];
        $fecha = date('Y-m-d H:i:s');
        $query = $this->connect->prepare("INSERT INTO messages VALUES ('',?,?,?)");
        $query->bindParam(1,$userid);
        $query->bindParam(2,$message);
        $query->bindParam(3,$fecha);
        $query->execute();
        $id=$this->connect->lastInsertId();
        $comment = 'Si te gusta respondeme';

        //insertamos un mensaje en la table comments
        $firstcomment = $this->connect->prepare("INSERT INTO comments (user_comment, messageid, comment,date_comment) VALUES (?,?,?,?)");
        $firstcomment->bindParam(1,$user);
        $firstcomment->bindParam(2,$id);
        $firstcomment->bindParam(3,$comment);
        $firstcomment->bindParam(4,$fecha);
        $firstcomment->execute();

        $comments = $this->connect->prepare("SELECT * FROM comments where messageid = $id order by id desc");
        $comments->execute();
        $result = $comments->fetch();
        ?><<br><br>
        <div class="comments" id="lastmessage">
            <img src="<?=$this->get_gravatar($ema)?>/?d=404&f=y" width="40" height="40" /><br><br>
            <?=$user?><span style="float: right;"><?=$fecha?></span><br><br>
            <?=$this->link($message)?>
        </div>
        <div id="form_messages" class="lastmessage" style="width: 380px; margin-left: 250px; margin-top: 40px">
        <form method="post" action="">
            <textarea name="comment" class="comment" cols="44" rows="2" maxlength="250"  id="comment_textarea"></textarea>
            <br />
            <input type="submit"  value="Comment"  id="" class="send_comment"/>
        </form>
        </div>
        <div class="comments" id="carga_comentarios<?=$result['messageid']?>"style="width: 300px; margin-left: 250px; margin-top: 20px">
        <img src="<?=$this->get_gravatar($ema)?>/?d=404&f=y" width="25" height="25" /><br><br>
        <?=$result['user_comment']?><span style="float: right;"><?=$result['date_comment']?></span><br><br>
        <?=$this->link($result['comment'])?>
        </div>
    <?php
    }

    //index.php --> obtenemos los mensajes del usuario
    public function messages($user_id)
    {
        self::set_names();
        $messages = $this->connect->prepare("SELECT m.id, m.userid, m.message, m.date_message, u.username FROM
        messages m inner join users u on m.userid = u.id where m.userid = $user_id order by id desc");
        $messages->execute();
        if(!empty($messages))
        {
            return $messages;
        }
    }

    //index.php --> obtenemos los comentarios según la id del mensaje
    public function comments($id)
    {
        self::set_names();
        $comments = $this->connect->prepare("SELECT * FROM comments where messageid = $id");
        $comments->execute();
        if(!empty($comments))
        {
            return $comments;
        }
    }
    //función para obtener el gravatar del usuario según su email, si no tiene se le asigna por defecto
    public function get_gravatar( $email, $s = 80, $d = 'wavatar', $r = 'g', $img = false, $atts = array() )
    {
        $email = trim($email);
        $email = strtolower($email);
        $email_hash = md5($email);
        $url = "http://www.gravatar.com/avatar/".$email_hash;
        $url .= md5( strtolower( trim( $email ) ) );
        $url .= "?s=$s&d=$d&r=$r";
        if ( $img ) {
            $url = '<img src="' . $url . '"';
            foreach ( $atts as $key => $val )
                $url .= ' ' . $key . '="' . $val . '"';
            $url .= ' />';
        }
        return $url;
    }

    //load_comments_ajax.php --> hacemos la carga de los mismos utilizando prependTo de jQuery y los guardamos en la base de datos
    public function load_comments_ajax($id_message,$comment)
    {
        self::set_names();
        $ema = $_SESSION['email'];
        $fecha = date('Y-m-d H:i:s');
        $user_comment = $_SESSION['username'];
        $query = $this->connect->prepare("INSERT INTO comments (user_comment, messageid, comment,date_comment) VALUES (?,?,?,?)");
        $query->bindParam(1,$user_comment);
        $query->bindParam(2,$id_message);
        $query->bindParam(3,$comment);
        $query->bindParam(4,$fecha);
        $query->execute();
        ?>
    <div class="comments" id="carga_comentarios<?=$id_message?>"style="width: 300px; margin-left: 250px; margin-top: 20px">
        <img src="<?=$this->get_gravatar($ema)?>" width="25" height="25" /><br><br>
        <?=$user_comment?><span style="float: right;"><?=$fecha?></span><br><br>
        <?=$this->link($comment)?>
    </div>
    <?php
    }
    //logout.php --> destruímos las sesiones y redirigimos al login
    public function logout()
    {
        unset($_SESSION['email'],$_SESSION['email'],$_SESSION['username']);
        session_destroy();
        header('Location: login.php');
    }
}
