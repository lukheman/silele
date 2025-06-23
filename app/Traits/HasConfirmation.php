<?php

namespace App\Traits;

trait HasConfirmation
{

    public function deleteConfirmation(string $message) {

        $this->dispatch('deleteConfirmation', message: $message);

    }

}
