<?php

namespace App\Repository;

interface PermissionRepository
{
    function permission();
    function create($data);
    function update($data);
    function delete($data);
}
