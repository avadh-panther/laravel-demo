<?php

namespace App\Repository;

interface BusinessRepository
{
    function businesses();
    function create($data);
    function find($id);
    function update($data);
    function delete($data);
}
