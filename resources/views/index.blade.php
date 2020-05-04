@extends('base')
@section('content')
    @if($errors)
        @foreach ($errors as $error)
            <div class="alert alert-danger mx-auto" style="max-width: 540px;">{{ $error }}</div>
        @endforeach
    @endif

    
        @isset($results)

            <div class="row justify-content-center mb-3">
                <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">

                    <a href="{{ $id-1 }}">
                        <button type="button" class="btn btn-outline-dark mr-1">
                            <span aria-hidden="true">&laquo;</span>
                        </button>
                    </a>

                    <div class="btn-group mr-3" role="group" aria-label="Third group">
                        <a href="1"><button type="button" class="btn btn-outline-dark {{ $id == 1 ? 'active' : '' }}">1</button></a>
                    </div>
                    <div class="btn-group" role="group" aria-label="Second group">
                        @for ($i=$id-5; $i<=$id+5; $i++)
                            @if ($i >= 1 && $i <=1000000-1 && $i != 1)
                                <a href="{{ $i }}"><button type="button" class="btn btn-outline-dark mr-1 {{ $id == $i ? 'active' : '' }}">{{ $i }}</button></a>
                            @endif
                        @endfor
                    </div>
                    <div class="btn-group ml-3" role="group" aria-label="Third group">
                        <a href="1000000"><button type="button" class="btn btn-outline-dark {{ $id == 1000000 ? 'active' : '' }}">1000000</button></a>
                    </div>

                    <a href="{{ $id+1 }}">
                        <button type="button" class="btn btn-outline-dark ml-1">
                            <span aria-hidden="true">&raquo;</span>
                        </button>
                    </a>
                    
                </div>
            </div>

            <div class="row justify-content-center mb-3">
                <div class="card" style="width: 18rem;">
                    <ul class="list-group list-group-flush">
                        @foreach ($results as $result)
                            <li class="list-group-item">{{ $result }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @else
            <div class="container px-5">
                <div class="row justify-content-center mb-3">
                    <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                        @php
                            $i = 1;
                        @endphp
                        <button type="button" class="btn btn-outline-dark mr-1 mb-2" disabled>
                            <span aria-hidden="true">&laquo;</span>
                        </button>
                        
                        @for ($i=1; $i<=10; $i++)
                            <a href="{{ $i }}"><button type="button" class="btn btn-outline-dark mr-1 mb-2">{{ $i }}</button></a>
                        @endfor
                        <a href="1000000"><button type="button" class="btn btn-outline-dark mb-2">1000000</button></a>
                        
                        <a href="{{ $i }}">
                            <button type="button" class="btn btn-outline-dark ml-1 mb-2">
                                <span aria-hidden="true">&raquo;</span>
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        @endisset

@stop