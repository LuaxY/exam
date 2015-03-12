<?php

class School
{
    private $db;

    public function handle()
    {
        $this->db = new PDO('mysql:host=localhost;dbname=exam', 'root', '');
        $this->db->exec("SET CHARACTER SET utf8");
        $data = null;

        switch(@$_GET['q'])
        {
            case 'classes':
                $data = $this->classes();
                break;
            case 'addClass':
                break;
            case 'addStudent':
                break;
            default:
                $data = json_encode(array("error" => "invalid request"));
                break;
        }

        return $data;
    }

    private function classes()
    {
        $req = $this->db->query("SELECT * FROM classes");
        $classes = $req->fetchAll(PDO::FETCH_ASSOC);
        $ret = array();

        $i = 0;
        foreach ($classes as $class)
        {
            $req = $this->db->query("SELECT * FROM students WHERE classe_id = '".$class['id']."'");
            $students = $req->fetchAll(PDO::FETCH_ASSOC);
            $ret[$class['name']] = $students;
            $classes[$i]['students'] = $students;
            $i++;
        }

        return json_encode($ret);
    }
}

$school = new School();
echo $school->handle();
