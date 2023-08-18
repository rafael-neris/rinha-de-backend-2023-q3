<?php

declare(strict_types=1);

namespace App\Consumer;

use Hyperf\AsyncQueue\Process\ConsumerProcess;
use Hyperf\Process\Annotation\Process;

#[Process(name: "async-queue")]
class PersonConsumer extends ConsumerProcess
{

}