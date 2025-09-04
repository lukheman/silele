<?php

namespace App\Livewire;

use App\Livewire\Forms\PenyakitForm;
use App\Models\Penyakit;
use App\Traits\HasConfirmation;
use App\Traits\HasNotify;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\Attributes\Computed;
use App\Interfaces\ModalFormInterface;
use Livewire\WithPagination;


class PenyakitCrud extends Component implements ModalFormInterface
{

    use HasNotify;
    use HasConfirmation;
    use WithPagination;

    public PenyakitForm $form;
    public string $modalFormState = 'create';

    #[Computed]
    public function penyakit() {
        return Penyakit::paginate(10);
    }

    #[On('resetForm')]
    public function resetForm(): void {
        $this->form->reset();
        $this->modalFormState = 'create';
    }

    public function update($penyakit): void {

        $this->form->kode = $penyakit['kode'];
        $this->form->nama = $penyakit['nama'];
        $this->form->deskripsi = $penyakit['deskripsi'];
        $this->form->solusi = $penyakit['solusi'];

        $this->form->penyakit = Penyakit::find($penyakit['id']);

        $this->modalFormState = 'update';

    }

    public function delete($id): void {
        $this->form->penyakit = Penyakit::find($id);
        $this->deleteConfirmation('Yakin untuk menghapus data penyakit ini ?');
    }

    #[On('deleteConfirmed')]
    public function deleteConfirmed(): void {
        $this->notifySuccess("Berhasil menghapus penyakit: {$this->form->penyakit->kode} - {$this->form->penyakit->nama}");
        $this->form->delete();
    }

    public function save(): void {


        if($this->modalFormState === 'create') {

            $this->form->store();
            $this->notifySuccess('Berhasil menambahkan penyakit baru');
            $this->dispatch('close-modal');

        } elseif($this->modalFormState === 'update') {
            $this->form->update();
            $this->notifySuccess('Berhasil memperbarui penyakit');
            $this->dispatch('close-modal');
        }


    }

    public function render()
    {
        return view('livewire.penyakit-crud');
    }
}
