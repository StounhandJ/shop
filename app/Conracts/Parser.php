<?php

namespace App\Conracts;

use Generator;

interface Parser
{
    public function __construct(string $department_url);

    public function count(): int;

    public function parseGenerator(): Generator;
}
