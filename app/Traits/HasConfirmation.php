<?php

namespace App\Traits;

/**
 * Trait for handling delete confirmations.
 */
trait HasConfirmation
{
    /**
     * Dispatch a delete confirmation dialog.
     */
    public function deleteConfirmation(string $message): void
    {
        $this->dispatch('deleteConfirmation', message: $message);
    }
}
