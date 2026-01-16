<?php

namespace App\Livewire;

use App\Livewire\Forms\GejalaForm;
use App\Models\Gejala;
use App\Traits\HasConfirmation;
use App\Traits\HasNotify;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\Attributes\Computed;
use Livewire\WithPagination;
use App\Interfaces\ModalFormInterface;

/**
 * CRUD component for managing Gejala (symptoms).
 */
class GejalaCrud extends Component implements ModalFormInterface
{
    use HasNotify;
    use HasConfirmation;
    use WithPagination;

    public GejalaForm $form;

    public string $modalFormState = 'create';

    /**
     * Get paginated gejala list.
     *
     * @return LengthAwarePaginator<Gejala>
     */
    #[Computed]
    public function gejala(): LengthAwarePaginator
    {
        return Gejala::paginate(10);
    }

    /**
     * Reset the form to initial state.
     */
    #[On('resetForm')]
    public function resetForm(): void
    {
        $this->form->reset();
        $this->modalFormState = 'create';
    }

    /**
     * Prepare form for updating an existing gejala.
     *
     * @param array<string, mixed> $gejala
     */
    public function update(array $gejala): void
    {
        $this->form->kode = $gejala['kode'];
        $this->form->nama = $gejala['nama'];
        $this->form->gejala = Gejala::find($gejala['id']);
        $this->modalFormState = 'update';
    }

    /**
     * Prepare for deletion confirmation.
     */
    public function delete(int $id): void
    {
        $this->form->gejala = Gejala::find($id);
        $this->deleteConfirmation('Yakin untuk menghapus data gejala ini ?');
    }

    /**
     * Execute deletion after confirmation.
     */
    #[On('deleteConfirmed')]
    public function deleteConfirmed(): void
    {
        $this->notifySuccess("Berhasil menghapus gejala: {$this->form->gejala->kode} - {$this->form->gejala->nama}");
        $this->form->delete();
    }

    /**
     * Save (create or update) the gejala.
     */
    public function save(): void
    {
        if ($this->modalFormState === 'create') {
            $this->form->store();
            $this->notifySuccess('Berhasil menambahkan gejala baru');
            $this->dispatch('close-modal');
        } elseif ($this->modalFormState === 'update') {
            $this->form->update();
            $this->notifySuccess('Berhasil memperbarui gejala');
            $this->dispatch('close-modal');
        }
    }

    public function render(): View
    {
        return view('livewire.gejala-crud');
    }
}
