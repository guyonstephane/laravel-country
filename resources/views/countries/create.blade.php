@extends('countries.layout')
    
@section('content')
  
<div class="card mt-5">
  <h2 class="card-header">Add New Pays</h2>
  <div class="card-body">
  
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <a class="btn btn-primary btn-sm" href="{{ route('countries.index') }}"><i class="fa fa-arrow-left"></i> Back</a>
    </div>
  
    <form action="{{ route('countries.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="inputCode" class="form-label"><strong>Code:</strong></label>
            <input 
                type="text" 
                name="code" 
                class="form-control @error('code') is-invalid @enderror" 
                id="inputCode" 
                placeholder="Code">
            @error('code')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
  
        <div class="mb-3">
            <label for="inputNom" class="form-label"><strong>Nom:</strong></label>
            <input 
                type="text" 
                name="nom" 
                class="form-control @error('nom') is-invalid @enderror" 
                id="inputName" 
                placeholder="Nom">
            @error('nom')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
  
        <div class="mb-3">
            <label for="inputPopulation" class="form-label"><strong>Population:</strong></label>
            <input
                type="number" 
                class="form-control @error('population') is-invalid @enderror" 
                name="population" 
                id="input" 
                placeholder="Population"></textarea>
            @error('population')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="inputVie" class="form-label"><strong>Espérance de vie:</strong></label>
            <input 
                type="number" 
                name="esperanceVie" 
                class="form-control @error('esperanceVie') is-invalid @enderror" 
                id="inputVie" 
                placeholder="Espérance de vie">
            @error('esperanceVie')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="inputPNB" class="form-label"><strong>PNB:</strong></label>
            <input 
                type="number" 
                name="PNB" 
                class="form-control @error('PNB') is-invalid @enderror" 
                id="inputPNB" 
                placeholder="PNB">
            @error('PNB')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="inputChef" class="form-label"><strong>Chef de l'État:</strong></label>
            <input 
                type="text" 
                name="chefEtat" 
                class="form-control @error('chefEtat') is-invalid @enderror" 
                id="inputChef" 
                placeholder="Chef de l'État">
            @error('chefEtat')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="inputCapitale" class="form-label"><strong>Capitale:</strong></label>
            <input 
                type="number" 
                name="capitale" 
                class="form-control @error('capitale') is-invalid @enderror" 
                id="inputCapitale" 
                placeholder="Capitale">
            @error('capitale')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="inputCreate" class="form-label"><strong>Population:</strong></label>
            <input
                type="hidden" 
                class="form-control @error('population') is-invalid @enderror" 
                name="create_at"
                value="NULL" 
                id="inputCreate" 
            >
            @error('population')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i> Submit</button>
    </form>
  
  </div>
</div>
@endsection