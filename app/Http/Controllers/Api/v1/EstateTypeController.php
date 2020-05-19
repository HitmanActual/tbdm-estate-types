<?php

namespace App\Http\Controllers\Api\v1;
use App\Http\Controllers\Controller;
use App\EstateType;
use App\Traits\ApiResponser;
use Illuminate\Http\Response;
use Illuminate\Http\Request;


class EstateTypeController  extends Controller
{
    use ApiResponser;
   /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Return List of Doctor
     *
     * @return Illuminate\Http\Response
     */
    public function index()
    {
        //
        $estateTypes = EstateType::all();
        
        return $this->successResponse($estateTypes);
      
    }

    /**
     * Create one new Doctor
     *
     * @return Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $this->validate($request,[

          
            'estate_type'=>'required|string',
         
           
        ]);
       
        $estateType = EstateType::create($request->all());          
        return $this->successResponse($estateType,Response::HTTP_CREATED);
       
    }

    /**
     * get one Clinic
     *
     * @return Illuminate\Http\Response
     */
    public function show($estateType)
    {
        //
        $estateType = EstateType::findOrFail($estateType);
        return $this->successResponse($estateType);
        
    }

    /**
     * update an existing one Doctor
     *
     * @return Illuminate\Http\Response
     */
    public function update(Request $request,$estateType)
    {

        $this->validate($request,[
           
            
            'estate_type'=>'string',
            
            
        ]);
        $estateType = EstateType::findOrFail($estateType);
        $estateType->fill($request->all());

        
        if($estateType->isClean()){
            return $this->errorResponse("you didn't change any value",Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        $estateType->save();
        return $this->successResponse($estateType);
    }

     /**
     * remove an existing one clinic
     *
     * @return Illuminate\Http\Response
     */
    public function destroy($estateType)
    {
        $estateType = EstateType::findOrFail($estateType);
        $estateType->delete();
        return $this->successResponse($estateType);
      
    }

}
