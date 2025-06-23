<?php

namespace App\Livewire;

use App\Livewire\Forms\GejalaForm;
use App\Models\Gejala;
use App\Traits\HasConfirmation;
use App\Traits\HasNotify;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\Attributes\Computed;
use Livewire\WithPagination;
use App\Interfaces\ModalFormInterface;

class GejalaCrud extends Component implements ModalFormInterface
{
    use HasNotify;
    use HasConfirmation;
    use WithPagination;

    public GejalaForm $form;
    public $nama = 'akmal';

    public $modalFormState = 'create';

    #[Computed]
    public function gejala() {
        return Gejala::paginate(10);
    }

    #[On('resetForm')]
    public function resetForm(): void {
        $this->form->reset();
        $this->modalFormState = 'create';
    }

    public function update($gejala): void {

        $this->form->kode = $gejala['kode'];
        $this->form->nama = $gejala['nama'];

        $this->form->gejala = Gejala::find($gejala['id']);

        $this->modalFormState = 'update';

    }
    public function delete($id): void {
        $this->form->gejala = Gejala::find($id);
        $this->deleteConfirmation('Yakin untuk menghapus data gejala ini ?');
    }

    #[On('deleteConfirmed')]
    public function deleteConfirmed(): void {
        $this->notifySuccess("Berhasil menghapus gejala: {$this->form->gejala->kode} - {$this->form->gejala->nama}");
        $this->form->delete();
    }

    public function save(): void {

        if($this->modalFormState === 'create') {
            $this->form->store();
            $this->notifySuccess('Berhasil menambahkan gejala baru');
            $this->dispatch('close-modal');
        } elseif($this->modalFormState === 'update') {
            $this->form->update();
            $this->notifySuccess('Berhasil memperbarui gejala');
            $this->dispatch('close-modal');
        }

    }

    public function render()
    {
        return view('livewire.gejala-crud');
    }
}
