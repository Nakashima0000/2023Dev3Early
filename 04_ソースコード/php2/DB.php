<?php
    class hoge{
        public function  dbConnect(){
            $dsn = 'mysql:host=mysql213.phy.lolipop.lan;dbname=LAA1418125-system5;charset=utf8';
            $user = 'LAA1418125';
            $password = 'dwjp3957';

            $pdo = new PDO($dsn, $user, $password);
            return $pdo;
        }
    }

    class hoge2{
        public function select_user(){
            $hoge = new hoge;
            $pdo= $hoge->dbConnect();
            //$pdo = new PDO('mysql:host=mysql213.phy.lolipop.lan;dbname=LAA1418125-system5;charset=utf8','LAA1418125','dwjp3957');
            $sql= "SELECT * FROM user WHERE user_id = 2100000";
            $ps= $pdo->prepare($sql);
            //$ps->bindValue(1, $code, PDO::PARAM_INT);
            //$ps->execute();
            $ps->execute();
            $selectdata = $ps->fetchAll();
            return $selectdata;
        }
    }

    class newuser{
        public function check_text($email, $gakuseki, $username, $password){
            $hoge = new hoge;
            $pdo= $hoge->dbConnect();
            //$pdo = new PDO('mysql:host=mysql213.phy.lolipop.lan;dbname=LAA1418125-system5;charset=utf8','LAA1418125','dwjp3957');
            $sql = "INSERT INTO user (user_id, user_name, user_password, user_mailaddress, user_introduction, image) VALUES (?, ?, ?, ?, '', '')";
            $ps = $pdo->prepare($sql);
            $ps->bindValue(1, $gakuseki, PDO::PARAM_INT);
            $ps->bindValue(2, $username, PDO::PARAM_STR);
            $ps->bindValue(3, $password, PDO::PARAM_STR);
            $ps->bindValue(4, $email, PDO::PARAM_STR);
            $ps->execute();
            $check = $ps->fetchAll();
            return $check;
        }
    }

    class checkuser{
        public function check_user($gakuseki){
            $hoge = new hoge;
            $pdo= $hoge->dbConnect();
            //$pdo = new PDO('mysql:host=mysql213.phy.lolipop.lan;dbname=LAA1418125-system5;charset=utf8','LAA1418125','dwjp3957');
            $sql = "SELECT COUNT(*) AS 'count' FROM user WHERE user_id = ?";
            $ps = $pdo->prepare($sql);
            $ps->bindValue(1, $gakuseki, PDO::PARAM_INT);
            $ps->execute();
            $check = $ps->fetch();
            return $check;
        }
    }

    class logincheck{
        public function login_check($gakuseki,$password){
            $hoge = new hoge;
            $pdo= $hoge->dbConnect();
            //$pdo = new PDO('mysql:host=mysql213.phy.lolipop.lan;dbname=LAA1418125-system5;charset=utf8','LAA1418125','dwjp3957');
            $sql = "SELECT COUNT(*) AS 'count' FROM user WHERE user_id = ? AND user_password = ?";
            $ps = $pdo->prepare($sql);
            $ps->bindValue(1, $gakuseki, PDO::PARAM_INT);
            $ps->bindValue(2, $password, PDO::PARAM_STR);
            $ps->execute();
            $check = $ps->fetch();
            return $check;
        }
    }

    class msg_sel {
        public function msg_select($me,$you){
            $hoge = new hoge;
            $pdo= $hoge->dbConnect();
            //$pdo = new PDO('mysql:host=mysql213.phy.lolipop.lan;dbname=LAA1418125-system5;charset=utf8','LAA1418125','dwjp3957');
            $sql = "SELECT message_id,sender_id,DATE_FORMAT(time, '%H:%i') as time,receiver_id,message,already_read FROM message WHERE (receiver_id = ? AND sender_id = ?)
            OR (receiver_id = ? AND sender_id = ?)";
            $ps = $pdo->prepare($sql);
            $ps -> bindValue(1,$me,PDO::PARAM_INT);
            $ps -> bindValue(2,$you,PDO::PARAM_INT);
            $ps -> bindValue(3,$you,PDO::PARAM_INT);
            $ps -> bindValue(4,$me,PDO::PARAM_INT);
            $ps -> execute();
            $selectdata = $ps->fetchAll();
            return $selectdata;
        }
    } 


    class user_sel {
        public function user_select($user) {
            $hoge = new hoge;
            $pdo= $hoge->dbConnect();
            //$pdo = new PDO('mysql:host=mysql213.phy.lolipop.lan;dbname=LAA1418125-system5;charset=utf8','LAA1418125','dwjp3957');
            $sql = "SELECT user_name,image FROM user WHERE user_id = ?";
            $ps = $pdo->prepare($sql);
            $ps -> bindValue(1,$user,PDO::PARAM_INT);
            $ps -> execute();
            $selectdata = $ps->fetchAll();
            return $selectdata;
        }
    }


    class msg_send {
        public function send_select($me,$you,$msg) {
            $hoge = new hoge;
            $pdo= $hoge->dbConnect();
            //$pdo = new PDO('mysql:host=mysql213.phy.lolipop.lan;dbname=LAA1418125-system5;charset=utf8','LAA1418125','dwjp3957');
            $sql = "INSERT INTO message(message_id,sender_id,time,receiver_id,message,already_read)VALUES(0,?,CURRENT_TIMESTAMP,?,?,0)";
            $ps = $pdo->prepare($sql);
            $ps -> bindValue(1,$me,PDO::PARAM_INT);
            $ps -> bindValue(2,$you,PDO::PARAM_INT);
            $ps -> bindValue(3,$msg,PDO::PARAM_STR);
            $ps -> execute();
            $selectdata = true;
            return $selectdata;
        }
    }


    class msg_list {
        public function list_select($me) {
            $hoge = new hoge;
            $pdo= $hoge->dbConnect();
            //$pdo = new PDO('mysql:host=mysql213.phy.lolipop.lan;dbname=LAA1418125-system5;charset=utf8','LAA1418125','dwjp3957');
            $sql = "SELECT receiver_id as 'id' FROM message WHERE sender_id = ? UNION SELECT sender_id as 'id' FROM message WHERE receiver_id = ?;" ;
            $ps = $pdo->prepare($sql);
            $ps -> bindValue(1,$me,PDO::PARAM_INT);
            $ps -> bindValue(2,$me,PDO::PARAM_INT);
            $ps -> execute();
            $selectdata = $ps->fetchAll();
            return $selectdata;
        }
    }

    class msg_new {
        public function new_select($me,$you) {
            $hoge = new hoge;
            $pdo= $hoge->dbConnect();
            //$pdo = new PDO('mysql:host=mysql213.phy.lolipop.lan;dbname=LAA1418125-system5;charset=utf8','LAA1418125','dwjp3957');
            $sql = "SELECT message_id,sender_id,DATE_FORMAT(time, '%H:%i') as time,receiver_id,message,already_read FROM message WHERE (receiver_id = ? AND sender_id = ?)
            OR (receiver_id = ? AND sender_id = ?) ORDER BY time DESC LIMIT 1" ;
            $ps = $pdo->prepare($sql);
            $ps -> bindValue(1,$me,PDO::PARAM_INT);
            $ps -> bindValue(2,$you,PDO::PARAM_INT);
            $ps -> bindValue(3,$you,PDO::PARAM_INT);
            $ps -> bindValue(4,$me,PDO::PARAM_INT);
            $ps -> execute();
            $selectdata = $ps->fetchAll();
            return $selectdata;
        }
    }

	class select_searchpost{
        public function sel_search($id){
            $hoge = new hoge;
            $pdo= $hoge->dbConnect();
            //$pdo = new PDO('mysql:host=mysql213.phy.lolipop.lan;dbname=LAA1418125-system5;charset=utf8','LAA1418125','dwjp3957');
            $sql= "SELECT * FROM post WHERE comment LIKE ?";
            $ps= $pdo->prepare($sql);
            $ps->bindValue(1,'%#' . $id .'%',PDO::PARAM_STR);
            $ps->execute();
            $selectdata = $ps->fetchAll();
            return $selectdata;
        }
    }
    class select_post{
        public function sel_post(){
            $hoge = new hoge;
            $pdo= $hoge->dbConnect();
            //$pdo = new PDO('mysql:host=mysql213.phy.lolipop.lan;dbname=LAA1418125-system5;charset=utf8','LAA1418125','dwjp3957');
            $sql= "SELECT * FROM post" ;
            $selectdata = $pdo->query($sql);
            return $selectdata;
        }
    }
    class select_user{
        public function sel_user($id){
            $hoge = new hoge;
            $pdo= $hoge->dbConnect();
            //$pdo = new PDO('mysql:host=mysql213.phy.lolipop.lan;dbname=LAA1418125-system5;charset=utf8','LAA1418125','dwjp3957');
            $sql= "SELECT * FROM user WHERE user_id = ?";
            $ps= $pdo->prepare($sql);
            $ps->bindValue(1, $id, PDO::PARAM_INT);
            $ps->execute();
            $selectdata = $ps->fetchAll();
            return $selectdata;
        }
    }
    class select_image{
        public function sel_image($id){
            $hoge = new hoge;
            $pdo= $hoge->dbConnect();
            //$pdo = new PDO('mysql:host=mysql213.phy.lolipop.lan;dbname=LAA1418125-system5;charset=utf8','LAA1418125','dwjp3957');
            $sql= "SELECT * FROM image WHERE post_id = ?";
            $ps= $pdo->prepare($sql);
            $ps->bindValue(1, $id, PDO::PARAM_INT);
            $ps->execute();
            $selectdata = $ps->fetchAll();
            return $selectdata;
        }
    }
    
?>