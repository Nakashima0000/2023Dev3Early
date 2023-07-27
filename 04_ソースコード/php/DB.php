<?php
    class DBcon{
        public function  dbConnect(){
            /*$dsn = 'mysql:host=mysql213.phy.lolipop.lan;dbname=LAA1418125-system5;charset=utf8';
            $user = 'LAA1418125';
            $password = 'dwjp3957';

            $pdo = new PDO($dsn, $user, $password);*/
            $pdo = new PDO('mysql:host=localhost;dbname=system5;charset=utf8','root','');
            return $pdo;
        }
    }

    class sel_user{
        public function select_user($id){
            $DBcon = new DBcon;
            $pdo= $DBcon->dbConnect();
            $sql= "SELECT * FROM user WHERE user_id = ?";
            $ps= $pdo->prepare($sql);
            $ps->bindValue(1, $id, PDO::PARAM_INT);
            $ps->execute();
            $selectdata = $ps->fetchAll();
            return $selectdata;
        }
    }

    class up_user{
        public function update_user($id,$intro,$img){
            $DBcon = new DBcon;
            $pdo= $DBcon->dbConnect();
            $sql= "UPDATE user user_name = ?, user_introduction = ?, image = ?";
            $ps= $pdo->prepare($sql);
            $ps->bindValue(1, $id, PDO::PARAM_INT);
            $ps->bindValue(2, $intro, PDO::PARAM_STR);
            $ps->bindValue(3, $img, PDO::PARAM_STR);
            $ps->execute();
            
        }
    }

    

    

    class up_post{
        public function uplord_post($gakuseki,$intro){
            $DBcon = new DBcon;
            $pdo= $DBcon->dbConnect();
            $sql= "INSERT INTO post(post_id,user_id,comment) VALUES(0,?,?)";
            $ps= $pdo->prepare($sql);
            $ps->bindValue(1, $gakuseki, PDO::PARAM_INT);
            $ps->bindValue(2, $intro, PDO::PARAM_STR);
            $ps->execute();

            $sql2= "SELECT post_id FROM post WHERE user_id = ? AND comment = ?";
            $ps= $pdo->prepare($sql2);
            $ps->bindValue(1, $gakuseki, PDO::PARAM_INT);
            $ps->bindValue(2, $intro, PDO::PARAM_STR);
            $ps->execute();
            $selectdata = $ps->fetchAll();
            $id = '';
            foreach($selectdata as $row){
                return $row['post_id'];
            }
        }
    }

    class uplord_img{
        public function upimg($id,$file){
            $DBcon = new DBcon;
            $pdo= $DBcon->dbConnect();
            $sql= "INSERT INTO image(image_id,post_id,image) VALUES(0,?,?)";
            $ps= $pdo->prepare($sql);
            $ps->bindValue(1, $id, PDO::PARAM_INT);
            $ps->bindValue(2, $file, PDO::PARAM_STR);
            $ps->execute();
        }
    }

    

    class sel_pos{
        public function select_post($id){
            $DBcon = new DBcon;
            $pdo= $DBcon->dbConnect();
            $sql= "SELECT * FROM post LEFT OUTER JOIN image ON post.post_id = image.post_id WHERE user_id = ?";
            $ps= $pdo->prepare($sql);
            $ps->bindValue(1, $id, PDO::PARAM_INT);
            $ps->execute();
            $selectdata = $ps->fetchAll();
            return $selectdata;
        }
    }

    class up_msg{
        public function uplord_msg($sen,$rec,$msg){
            $DBcon = new DBcon;
            $pdo= $DBcon->dbConnect();
            $sql= "INSERT INTO message(message_id,sender_id,time,receiver_id,message,already_read) VALUES(0,?,CURRENT_TIMESTAMP,?,?,0)";
            $ps= $pdo->prepare($sql);
            $ps->bindValue(1, $sen, PDO::PARAM_INT);
            $ps->bindValue(2, $rec, PDO::PARAM_INT);
            $ps->bindValue(3, $msg, PDO::PARAM_STR);
            $ps->execute();
            //return $ps[1];
        }
    }

    class sel_msg{
        public function select_msg($you,$me){
            $DBcon = new DBcon;
            $pdo= $DBcon->dbConnect();
            $sql= "SELECT message_id,sender_id,DATE_FORMAT(time, '%H:%i') as time,receiver_id,message,already_read FROM message WHERE (sender_id = ? AND receiver_id = ?) OR (sender_id = ? AND receiver_id = ?)";
            $ps= $pdo->prepare($sql);
            $ps->bindValue(1, $me, PDO::PARAM_INT);
            $ps->bindValue(2, $you, PDO::PARAM_INT);
            $ps->bindValue(3, $you, PDO::PARAM_INT);
            $ps->bindValue(4, $me, PDO::PARAM_INT);
            $ps->execute();
            $selectdata = $ps->fetchAll();
            return $selectdata;
        }
    }

    class logincheck{
        public function login_check($gakuseki,$password){
            $DBcon = new DBcon;
            $pdo= $DBcon->dbConnect();
            $sql = "SELECT COUNT(*) AS 'count' FROM user WHERE user_id = ? AND user_password = ?";
            $ps = $pdo->prepare($sql);
            $ps->bindValue(1, $gakuseki, PDO::PARAM_INT);
            $ps->bindValue(2, $password, PDO::PARAM_STR);
            $ps->execute();
            $check = $ps->fetch();
            return $check;
        }
    }

    class msg_list {
        public function list_select($me) {
            $DBcon = new DBcon;
            $pdo= $DBcon->dbConnect();
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
            $DBcon = new DBcon;
            $pdo= $DBcon->dbConnect();
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
?>