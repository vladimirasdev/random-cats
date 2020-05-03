@extends('base')
@section('content')
    <div class="row justify-content-center">
        <div class="card mb-3" style="width: 18rem;">
            <div class="card-body">
              <p class="card-text">Suma visų puslapio atidarymų su visomis N reikšmėmis.</p>
            </div>
            <div class="card-footer text-center">
                <h1><span class="badge badge-secondary">{{ $countAll ?? "Nėra duomenų" }}</span></h1>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="table-responsive">
                <table class="table table-sm table-striped mb-3">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th>N Puslapis</th>
                            <th>Aplankyta</th>
                            <th>Paskutinis apsilankymas</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $n_array = array();
                            $i=1;
                            foreach ($All_N as $n) {
                                array_push($n_array, $n);
                            }
                            usort($n_array, function($a, $b) {
                                return $a->page_id <=> $b->page_id;
                            });
                        @endphp

                        @foreach ($n_array as $n)
                            <tr>
                                <th scope="row">{{ $i++ }}</th>
                                <td>{{ $n->page_id }}</td>
                                <td>{{ $n->count }}</td>
                                <td>{{ $n->updated_at }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop