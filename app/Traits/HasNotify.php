<?php

namespace App\Traits;

/**
 * Trait for dispatching toast notifications.
 */
trait HasNotify
{
    /**
     * Dispatch a success notification.
     */
    public function notifySuccess(string $message): void
    {
        $this->dispatch('toast', variant: 'success', message: $message);
    }

    /**
     * Dispatch an error notification.
     */
    public function notifyError(string $message): void
    {
        $this->dispatch('toast', variant: 'error', message: $message);
    }

    /**
     * Dispatch a warning notification.
     */
    public function notifyWarning(string $message): void
    {
        $this->dispatch('toast', variant: 'warning', message: $message);
    }

    /**
     * Dispatch an info notification.
     */
    public function notifyInfo(string $message): void
    {
        $this->dispatch('toast', variant: 'info', message: $message);
    }
}
