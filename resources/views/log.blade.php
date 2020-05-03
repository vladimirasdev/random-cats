@extends('base')
@section('content')   
    <div class="row justify-content-center">
        <div class="table-responsive">
            <table class="table table-sm table-borderless">
                <tbody>
                    @foreach ($contentArray as $log)
                        <tr class="text-center">
                            <td>{{ $log }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop