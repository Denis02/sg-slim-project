<?php
/**
 * Created by PhpStorm.
 * User: denis
 * Date: 03.04.17
 * Time: 21:47
 */

namespace App\Mappers;

use \PDO;
use App\Models\User;

class UserMapper extends Mapper
{
    public function save(User $item)
    {
        $sql = "INSERT INTO users (
            email,
            password,
            name,
            surname,
            phone,
            address,
            about_me,
            birthday
        ) VALUES (?, ?)";
        if ($item->getId()) {
            $sql = "UPDATE items SET
            email = ?,
            password = ?,
            name = ?,
            surname = ?,
            phone = ?,
            address = ?,
            about_me = ?,
            birthday = ?
            WHERE id = {$item->getId()}";
        }
        $stmt = $this->db->prepare($sql);

        $stmt->execute([
            $item->getEmail(),
            $item->getPassword(),
            $item->getName(),
            $item->getSurname(),
            $item->getPhone(),
            $item->getAddress(),
            $item->getAboutMe(),
            $item->getBirthday(),
        ]);

        return $this->db->lastInsertId();
    }

    public function all()
    {
        $sql = "SELECT * FROM users";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $rows;
    }

    public function get($id)
    {
        $sql = "SELECT * FROM users WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        return $row;
    }

    public function delete($id)
    {
        $sql = "DELETE FROM users WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id]);

        return $stmt->rowCount();
    }

}