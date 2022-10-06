<?php

namespace App\Repository;

interface RoleRepository
{
    function role();
    function permission();
    function create($data);
    function find($id);
    function update($data);
    function delete($id);
}
