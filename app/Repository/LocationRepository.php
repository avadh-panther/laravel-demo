<?php

namespace App\Repository;

interface LocationRepository
{
    function location();
    function businesses($id);
    function businessdata($data);
    function create($data);
    function find($data);
    function update($data);
    function delete($data);
}
