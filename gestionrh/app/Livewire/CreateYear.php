<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\YearTable;
use Carbon\Carbon;

class CreateYear extends Component
{
    public $session_ouvert;

    public function render()
    {
        return view('livewire.create-year');
    }
    public function store(YearTable $table_year)
    {
        $this->validate([
            'session_ouvert'=> 'string|required|unique:year_tables,session_ouvert'
        ]);
        try {
            $currentYear = Carbon::now()->format('Y');

            $check = YearTable::where('annee_en_cours',$currentYear )->get();

            $alreadyExist = $check->count();

            if($alreadyExist >= 1){

                toastr()->error('L\'annee en cours existe déjà');

                return redirect()->route('setting.liste');
            }
            else
            {
                $table_year->session_ouvert = $this->session_ouvert;
                $table_year->annee_en_cours = $currentYear;

                $table_save = $table_year->save();

                toastr()->success('Bravo, la saisson est ajoutée avec succes');

                return redirect()->back();

            }

        } catch (Exception $e) {

            throw new Exception("Erreur survenue lors de l'enregistrement", 1);

        }
    }
}
