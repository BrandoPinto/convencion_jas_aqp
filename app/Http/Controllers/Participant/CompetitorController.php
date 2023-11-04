<?php

namespace App\Http\Controllers\Participant;

use App\Http\Controllers\Controller;
use App\Models\Competitor;
use App\Models\Stake;
use App\Models\Ward;
use DateTime;
use Exception;
use Illuminate\Http\Request;

class CompetitorController extends Controller
{
    public function index (){
        $stakes = Stake::all();
        $wards = Ward::all();
        return view('form',compact('stakes','wards'));
    }

    public function search_select_value (Request $request){
        $selectedStake = $request->input('selectedStake');

        // Realizar la consulta a la base de datos para obtener los barrios correspondientes al valor seleccionado
        $wards = Ward::where('idStake', $selectedStake)->get(['idWard', 'name']);

        // Devolver los datos en formato JSON
        return response()->json($wards);
    }

    public function register_competitor(Request $request)
    {
        try {
            // Valida los datos del formulario
            $validatedData = $request->validate([
                'name' => 'required',
                'last-name' => 'required',
                'dni' => 'required|numeric',
                'phone' => 'required',
                'date-birthday' => 'required|date',
                'email' => 'required|email',
                'gender' => 'required',
                'member' => 'required', 
                'ward' => 'required',
                'allergies' => 'nullable',
                'disability' => 'nullable',
                'allergies-text'=> 'nullable',
                'disability-text'=> 'nullable',
                'shirt-size' => 'required',
                'comments' => 'nullable',
                'terms' => 'required',
            ]);

                    
                // Verifica si el campo "dni" tiene más de 8 números
            if (strlen($validatedData['dni']) > 8) {
                return response()->json(['success' => false, 'error' => 'El campo DNI debe tener 8 números o menos.']);
            }
            
            // Calcula la edad a partir de la fecha de nacimiento
            $dateOfBirth = new DateTime($validatedData['date-birthday']);
            $today = new DateTime();
            $age = $today->diff($dateOfBirth)->y;

            // Verifica si la edad está fuera del rango requerido (18 a 30 años)
            if ($age < 18 || $age > 30) {
                return response()->json(['success' => false, 'error' => 'Usted no cumple con la edad adecuada.']);
            }

            $existingCompetitor = Competitor::where('dni', $validatedData['dni'])->first();
            if ($existingCompetitor) {
                return response()->json(['success' => false, 'error' => 'Usted ya está registrado.']);
            }
    

            // Guarda los datos del competidor en la base de datos
            $competitor = new Competitor;
            $competitor->name = $validatedData['name'];
            $competitor->last_name = $validatedData['last-name'];
            $competitor->dni = $validatedData['dni'];
            $competitor->date_birth = $validatedData['date-birthday'];
            $competitor->phone = $validatedData['phone'];
            $competitor->email = $validatedData['email'];
            $competitor->gender = $validatedData['gender'];
            $competitor->member = $validatedData['member'];
            $competitor->idWard = $validatedData['ward'];
            $competitor->allergies = $validatedData['allergies-text'];
            $competitor->disabillity = $validatedData['disability-text'];
            $competitor->shirt_size = $validatedData['shirt-size'];
            $competitor->comments = $validatedData['comments'];
            $competitor->terms = $validatedData['terms'];

            $competitor->save();

            // Envía una respuesta de éxito al cliente
            return response()->json(['success' => true, 'message' => '¡Registro éxitoso! pronto tendrá más novedades.']);
        }catch (Exception $e) {
            // Captura el mensaje de error
            $errorMessage = $e->getMessage();
    
            // Envía la respuesta con el error al cliente
            return response()->json(['success' => false, 'error' => $errorMessage]);
        }
    }
}
