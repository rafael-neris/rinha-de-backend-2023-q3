<?php

declare(strict_types=1);

namespace App\Job;

use Hyperf\AsyncQueue\Job;
use Hyperf\DbConnection\Db;

class PersonJob extends Job
{
    public $params;

    public function __construct($params)
    {
        // It's best to use normal data here. Don't pass the objects that carry IO, such as PDO objects.
        $this->params = $params;
    }

    public function handle()
    {
        Db::table('person')->insert($this->params);
    }
}