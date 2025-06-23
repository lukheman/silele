<?php

namespace App\Interfaces;

interface ModalFormInterface {

    public function resetForm(): void;
    public function update($gejala): void;
    public function delete($id): void;
    public function deleteConfirmed(): void;
    public function save(): void;

}
