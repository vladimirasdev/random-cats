@extends('base')
@section('content')
    <div class="row justify-content-start mx-5">
        <div class="table-responsive">
            <table class="table table-sm table-borderless">
                <tbody>
                    @foreach ($contentArray as $log)
                        <tr>
                            <td>{{ $log }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop