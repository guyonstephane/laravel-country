<?php
    
namespace App\Http\Controllers;
    
use App\Models\Country;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use App\Http\Requests\CountryStoreRequest;
use App\Http\Requests\CountryUpdateRequest;
    
class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $countries = Country::latest()->paginate(10);
          
        return view('countries.index', compact('countries'))
                    ->with('i', (request()->input('page', 1) - 1) * 10);
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
           
        return redirect()->route('products.index')
                        ->with('success','country deleted successfully');
    }
}