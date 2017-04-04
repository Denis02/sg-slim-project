<?php
/**
 * Created by PhpStorm.
 * User: denis
 * Date: 03.04.17
 * Time: 21:49
 */

namespace App\Models;


class User
{
    protected
        $email,
        $password,
        $name,
        $surname,
        $phone,
        $address,
        $about_me,
        $birthday;

    public function __construct(array $data)
    {
        if (isset($data['id'])) {
            $this->id = $data['id'];
        }

        $this->name = $data['email'];
        $this->link = $data['password'];
        $this->link = $data['name'];
        $this->link = $data['surname'];
        $this->link = $data['phone'];
        $this->link = $data['address'];
        $this->link = $data['about_me'];
        $this->link = $data['birthday'];
    }

    public function getId()
    {
        return $this->id;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function getPassword()
    {
        return $this->password;
    }
    public function getName()
    {
        return $this->name;
    }
    public function getSurname()
    {
        return $this->surname;
    }
    public function getPhone()
    {
        return $this->phone;
    }
    public function getAddress()
    {
        return $this->address;
    }
    public function getAboutMe()
    {
        return $this->about_me;
    }
    public function getBirthday()
    {
        return $this->birthday;
    }

}