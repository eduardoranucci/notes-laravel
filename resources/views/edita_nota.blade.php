@extends('layouts.main_layout')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col">

                @include('layouts.header_layout')

                <!-- label and cancel -->
                <div class="row">
                    <div class="col">
                        <p class="display-6 mb-0">EDIT NOTE</p>
                    </div>
                    <div class="col text-end">
                        <a href="{{ route('home') }}" class="btn btn-outline-danger">
                            <i class="fa-solid fa-xmark"></i>
                        </a>            
                    </div>
                </div>

                <!-- form -->
                <form action="{{ route('editaSubmit') }}" method="post">
                    @csrf
                    <div class="row mt-3">
                        <div class="col">
                            <div class="mb-3">
                                <label class="form-label">Note Title</label>
                                <input type="text" class="form-control bg-primary text-white" name="titulo" value='{{ old('titulo', $nota->titulo) }}'>
                            </div>

                            {{-- mostra o erro --}}
                            @error('titulo')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror

                            <div class="mb-3">
                                <label class="form-label">Note Text</label>
                                <textarea class="form-control bg-primary text-white" name="texto" rows="5">{{ old('texto', $nota->texto) }}</textarea>
                            </div>

                            {{-- mostra o erro --}}
                            @error('texto')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror

                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col text-end">
                            <a href="{{ route('home') }}" class="btn btn-primary px-5"><i class="fa-solid fa-ban me-2"></i>Cancel</a>
                            <button type="submit" class="btn btn-secondary px-5"><i class="fa-regular fa-circle-check me-2"></i>Update</button>
                        </div>
                    </div>
                </form>
                
            </div>
        </div>
    </div>
@endsection