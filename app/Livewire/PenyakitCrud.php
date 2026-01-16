<?php

namespace App\Livewire;

use App\Livewire\Forms\PenyakitForm;
use App\Models\Penyakit;
use App\Traits\HasConfirmation;
use App\Traits\HasNotify;
use Illuminate\Contracts\View\View;
use Illuminate\Pagination\LengthAwarePaginator;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\Attributes\Computed;
use App\Interfaces\ModalFormInterface;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

/**
 * CRUD component for managing Penyakit (diseases).
 */
class PenyakitCrud extends Component implements ModalFormInterface
{
    use HasNotify;
    use HasConfirmation;
    use WithPagination;
    use WithFileUploads;

    public PenyakitForm $form;

    public string $modalFormState = 'create';

    /**
     * Get paginated penyakit list.
     *
     * @return LengthAwarePaginator<Penyakit>
     */
    #[Computed]
    public function penyakit(): LengthAwarePaginator
    {
        return Penyakit::paginate(10);
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
     * Prepare form for updating an existing penyakit.
     *
     * @param array<string, mixed> $penyakit
     */
    public function update(array $penyakit): void
    {
        $this->form->kode = $penyakit['kode'];
        $this->form->nama = $penyakit['nama'];
        $this->form->deskripsi = $penyakit['deskripsi'];
        $this->form->solusi = $penyakit['solusi'];
        $this->form->photo = $penyakit['photo'];

        $this->form->penyakit = Penyakit::find($penyakit['id']);
        $this->modalFormState = 'update';
    }

    /**
     * Prepare for deletion confirmation.
     */
    public function delete(int $id): void
    {
        $this->form->penyakit = Penyakit::find($id);
        $this->deleteConfirmation('Yakin untuk menghapus data penyakit ini ?');
    }

    /**
     * Execute deletion after confirmation.
     */
    #[On('deleteConfirmed')]
    public function deleteConfirmed(): void
    {
        $this->notifySuccess("Berhasil menghapus penyakit: {$this->form->penyakit->kode} - {$this->form->penyakit->nama}");
        $this->form->delete();
    }

    /**
     * Save (create or update) the penyakit.
     */
    public function save(): void
    {
        if ($this->modalFormState === 'create') {
            $this->form->store();
            $this->notifySuccess('Berhasil menambahkan penyakit baru');
            $this->dispatch('close-modal');
        } elseif ($this->modalFormState === 'update') {
            $this->form->update();
            $this->notifySuccess('Berhasil memperbarui penyakit');
            $this->dispatch('close-modal');
        }
    }

    public function render(): View
    {
        return view('livewire.penyakit-crud');
    }
}
