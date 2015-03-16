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
                $this->db->query("INSERT INTO classes (school_id, name) VALUES (1, '".$_GET['c']."')");
                break;
            case 'editClass' :
                $this->db->query("UPDATE classes SET name = '".$_GET['c']."' WHERE id = '".$_GET['id']."'");
                break;
            case 'removeClass':
                $this->db->query("DELETE FROM classes WHERE name = '".$_GET['c']."'");
                break;
            case 'addStudent': // firstname = chaine avant espace, lastname = chaine après espace1
				$this->db->query("INSERT INTO students (classe_id, firstname, lastname) VALUES ()");
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
            $ret[$class['name']]['student'] = $students;
            $ret[$class['name']]['id'] = $class['id'];
            $classes[$i]['students'] = $students;
            $i++;
        }
        return json_encode($ret);
    }
}

$school = new School();
echo $school->handle();
