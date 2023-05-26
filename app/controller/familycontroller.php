<?php

namespace app\controllers;

require __DIR__ . '\baseController.php';

use app\baseController;


class familycontroller extends basecontroller
{


    public function __construct()
    {
        $this->model = new Member();
    }
    public function all()
    {

        $result = $this->model->all('members', '*');

        while ($row = mysqli_fetch_assoc($result)) {

            $member = new User();
            $member->id = $row['id'];
            $member->firstname = $row['firstname'];
            $member->midname = $row['midname'];
            $member->lastname=$row['lastname'];
            $member->employment_st=$row['employment_st'];
            $member->phone=$row['phone'];
            $members[] = $member;
        }
        $this->load_view('show', $member);
    }
    public function get_one()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $member = new Member();
            $member->set_name($_POST['name']);
            $name = $member->get_name();
            $result = $this->model->get_one('member', '*', 'name', $name);
            if ($result->num_rows > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    // $user = new User();
                    $member->id = $row['id'];
                    $member->name = $row['name'];
                    $member->email = $row['email'];
                    $members[] = $member;
                }
            }
        }
        $this->load_view('get_one', $users);
    }
    public function delete_member()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $member = new User();
            $member->set_name($_POST['name']);
            $member = $user->get_name();
            $result = $this->model->delete_member('members', 'name', $name);
            if ($result) {
                echo "<p>delete Success</p?";
            } else {
                echo "<p>faild</p>";
            }
        }
        $this->load_view('delete_member', '');
    }
    public function update_member()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $member = new Member();
            $member->set_name($_POST['name']);
            $name = $member->get_name();
            $id = $member->get_id();
            $result = $this->model->Update_member('members', 'name', $name, $id);
            if ($result) {
                echo "<p>new name $name</p?";
            } else {
                echo "<p>faild</p>";
            }
        }
        $this->load_view('update_member', '');
    }
}
