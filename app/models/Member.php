<?php 
class Member extends Database
{
    function checkRoles($username, $password)
    {
        $sql = parent::$connection->prepare("SELECT members.password, roles.name
        FROM `members`
        INNER JOIN `roles`
        ON roles.id = role_id
        WHERE `username` = ? ");
        $sql->bind_param('s', $username);
        $userPassword = parent::select($sql)[0]['password'];
        $userRole = parent::select($sql)[0]['name'];
        if (password_verify($password, $userPassword)) {
            return $userRole;
        }
    }
}
