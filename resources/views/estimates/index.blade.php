@extends('layout.main')

@section('content')
    <h1 class="title">Estimates</h1>
    <a href="/estimates/create" class="button is-primary">
        <i class="fa fa-plus"></i> Create Estimate
    </a>
    <div class="estimate-list">
        @foreach($estimates as $estimate)
        <a href="/estimates/{{ $estimate->id }}">
            <div class="columns is-vcentered">
                <div class="column">
                    <h5>{{ $estimate->client->name }}</h5>
                    <h6>
                        {{ $estimate->ref }}
                    </h6>
                </div>
                <div class="column has-text-right">
                    <h6>
                        Status: {{ $estimate->status }}
                    </h6>
                    <h6>{{ date('F jS, Y', strtotime($estimate->issue_date)) }}</h6>
                </div>
            </div>

        </a>
        @endforeach
    </div>
@endsection
