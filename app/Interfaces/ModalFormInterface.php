<?php

namespace App\Interfaces;

/**
 * Interface for Livewire components with modal-based CRUD forms.
 */
interface ModalFormInterface
{
    /**
     * Reset the form to its initial state.
     */
    public function resetForm(): void;

    /**
     * Prepare form for updating an existing record.
     *
     * @param array<string, mixed> $data The data of the record to update
     */
    public function update(array $data): void;

    /**
     * Prepare for deletion confirmation.
     *
     * @param int $id The ID of the record to delete
     */
    public function delete(int $id): void;

    /**
     * Execute deletion after confirmation.
     */
    public function deleteConfirmed(): void;

    /**
     * Save (create or update) the record.
     */
    public function save(): void;
}
