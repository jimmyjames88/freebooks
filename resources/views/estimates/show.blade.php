@extends('layout.main')

@section('content')
    <div class="document">
        <h1 class="title">Estimate</h1>
        <div class="columns mt-4">
            <div class="column is-8">
                <div class="field">
                    <label class="label">Bill To</label>
                    <div class="control">
                        <p>
                            <span>{{ $estimate->client->name }}</span>
                            <br /><span>{{ $estimate->client->email }}</span>
                        </p>
                        <p>
                            <span>{{ $estimate->client->address->street }}</span>
                            <br /><span>{{ $estimate->client->address->city }}, {{ $estimate->client->address->province }} &nbsp;{{ $estimate->client->address->postal }}</span>
                        </p>
                        <p>
                            <span>{{ $estimate->client->phone }}</span>
                        </p>

                    </div>
                </div>
            </div>
            <div class="column">
                <div class="field">
                    <label class="label">Ref #</label>
                    <div class="control">
                        {{ $estimate->ref }}
                    </div>
                </div>
                <div class="field">
                    <label class="label">Issue Date</label>
                    <div class="control">
                        {{ $estimate->issue_date }}
                    </div>
                </div>
            </div>
        </div>

        <estimate
            :clients="{{ json_encode($clients) }}"
            :display-only="1"
            :line-items="{{ json_encode($estimate->line_items) }}">
        </estimate>



        <div class="card mt-5">
            <div class="card-content">
                <div class="columns">
                    @if(!empty($estimate->payment_terms))
                    <div class="field column is-6">
                        <label class="label">Payment Terms</label>
                        <div class="control">
                            {{ $estimate->payment_terms }}
                        </div>
                    </div>
                    @endif
                    @if(!empty($estimate->notes))
                    <div class="field column is-6">
                        <label class="label">Notes</label>
                        <div class="control">
                            {{ $estimate->notes }}
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <footer-bar>
        <a href="/estimates/{{ $estimate->id }}/edit" class="button is-primary">
            <i class="fa fa-edit"></i>&nbsp;Edit
        </a>
        <a href="#" class="button is-secondary">
            <i class="fa fa-envelope"></i>&nbsp;Send
        </a>
        <a href="#" class="button is-secondary" onclick="window.print()">
            <i class="fa fa-print"></i> Print
        </a>
    </footer-bar>
@endsection
