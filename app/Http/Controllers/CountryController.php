<?php
    
namespace App\Http\Controllers;
    
use App\Models\Country;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use App\Http\Requests\CountryStoreRequest;
use App\Http\Requests\CountryUpdateRequest;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Support\Facades\DB;


class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        
        if ($request->has('name')){
            $continent = $request->name ;
            echo " $continent";

            $countries =DB::table('countries')
                    ->where('continent',"$continent")
                    ->paginate(5);
      
        }
        else {        
            $countries = Country::paginate(10);
        }
        $role = "visiteur";
        if (Auth::check()){
            if(Auth::user()->hasRole('Admin'))
                $role = "Admin";
        }

        
          
        return view('countries.index', compact('countries','role'));
                    
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('countries.create');
    }
    
    /**
     * Store a newly created resource in storage.
     */
    public function store(CountryStoreRequest $request): RedirectResponse
    {   
        Country::create($request->validated());
           
        return redirect()->route('countries.index')
                         ->with('success', 'country created successfully.');
    }
  
    /**
     * Display the specified resource.
     */
    public function show(Country $country): View
    {
    
       return view('countries.show',compact('country'));
    }
  
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Country $country): View
    {
        return view('countries.edit',compact('country'));
    }
  
    /**
     * Update the specified resource in storage.
     */
    public function update(CountryUpdateRequest $request, Country $country): RedirectResponse
    {
        $country->update($request->validated());
          
        return redirect()->route('products.index')
                        ->with('success','country updated successfully');
    }
  
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Country $country): RedirectResponse
    {
        $country->delete();
           
        return redirect()->route('countries.index')
                        ->with('success','country deleted successfully');
    }


}