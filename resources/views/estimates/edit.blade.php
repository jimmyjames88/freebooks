@extends('layout.main')

@section('content')
<h1 class="title">Edit Estimate</h1>
<form action="/estimates/{{ $estimate->id }}" method="POST">
    @csrf
    {{ method_field('PUT') }}
    <div class="field">
        <label class="label">Ref #</label>
        <div class="control">
            <input class="input" type="text" name="ref" required value="{{ $estimate->ref }}" />
        </div>
    </div>
    <div class="field">
        <label class="label">Issue Date</label>
        <div class="control">
            <input class="input" type="date" name="issue_date" required value="{{ $estimate->issue_date }}" />
        </div>
    </div>
    <estimate
        :clients="{{ json_encode($clients) }}"
        :client="{{ $estimate->client->id }}"
        :line-items="{{ json_encode($estimate->line_items) }}">
    </estimate>

    <div class="field">
        <label class="label">Payment Terms</label>
        <div class="control">
            <textarea class="textarea" name="payment_terms" rows="2">{{ $estimate->payment_terms }}</textarea>
        </div>
    </div>

    <div class="field">
        <label class="label">Notes</label>
        <div class="control">
            <textarea class="textarea" name="notes" rows="2">{{ $estimate->notes }}</textarea>
        </div>
    </div>

    <footer-bar>
        <button type="submit" class="button is-primary">
            <i class="fa fa-save"></i>&nbsp;Save
        </button>
        <a href="{{ url()->previous() }}" class="button is-secondary">
            <i class="fa fa-times"></i>&nbsp;Cancel
        </a>
    </footer-bar>
</form>
@endsection
