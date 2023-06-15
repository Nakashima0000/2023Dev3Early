<?php
    class hoge{
        private function  dbConnect(){
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
            //$pdo= $hoge->dbConnect();
            $pdo = new PDO('mysql:host=localhost;dbname=laa1418125-system5;charset=utf8','root','root');
            $sql= "SELECT * FROM user WHERE user_id = 2100000";
            $ps= $pdo->prepare($sql);
            //$ps->bindValue(1, $code, PDO::PARAM_INT);
            //$ps->execute();
            $ps->execute();
            $selectdata = $ps->fetchAll();
            return $selectdata;
        }
    }

?>