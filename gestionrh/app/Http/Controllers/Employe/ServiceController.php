<?php

namespace App\Http\Controllers\Employe;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ServiceRequest;
use App\Models\Service;
use App\Models\Direction;
use App\Models\Employe;

class ServiceController extends Controller
{
    public function create()
    {
        $direction = Direction::all();
        $employe = Employe::all();
        return view('service.create', [
            'direction'=>$direction,
            'employe'=>$employe,
        ]);
    }
    public function store(ServiceRequest $request, Service $service)
    {
        try {
            $service->id_direction = $request->id_direction;
            $service->service = $request->service;
            $service->id_chef_service = $request->id_chef;

            // dd( $service);
            $service->save();

            return redirect()->back()->with('success','Le service a été enregistré');

        } catch (Exception $th) {
            throw new Exception("Erreur survenue lors de l\'enregistrement", 1);

        }
    }
    public function liste()
    {
        $service = Service::latest()->with('direction')->get();

        return view('service.liste', compact('service'));

    }
    public function editer($service)
    {
        $service = Service::findOrFail($service);
        $direction = Direction::all();
        $employe = Employe::all();

        return view('service.edit',[
            'service'=>$service,
            'direction'=>$direction,
            'employe'=>$employe,
        ]);
    }
    public function update(Request $request, $service)
    {
        try {
            $service = Service::findOrFail($service);

            $service->id_direction = $request->id_direction;
            $service->service = $request->service;
            $service->id_chef_service = $request->id_chef;

            $service->update();

            return redirect()->route('service.liste')->with('success', 'Le service est mise à jour');
        } catch (Exception $th) {
            throw new Exception("Erreur survenue lors de la mise à jour", 1);

        }
    }
    public function delete($service)
    {
        $service = Service::findOrFail($service);

        $service->delete();

        return redirect()->back()->with('success','Le service a été retiré avec succes');
    }
}
