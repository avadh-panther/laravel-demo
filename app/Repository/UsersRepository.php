<?php

namespace App\Repository;

interface UsersRepository
{
    function users();
    function find($id);
    function allRoles();
    function create($data);
    function update($data);
    function delete($data);
}
