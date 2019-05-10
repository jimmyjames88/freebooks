@extends('layout.main')

@section('content')
    <h1 class="title">Create Estimate</h1>
    <form action="/estimates" method="POST">
        @csrf
        <div class="field">
            <label class="label">Ref #</label>
            <div class="control">
                <input class="input" type="text" name="ref" required />
            </div>
        </div>
        <div class="field">
            <label class="label">Issue Date</label>
            <div class="control">
                <input class="input" type="date" name="issue_date" required />
            </div>
        </div>
        <estimate
            :clients="{{ json_encode($clients) }}">
        </estimate>

        <div class="field">
            <label class="label">Payment Terms</label>
            <div class="control">
                <textarea class="textarea" name="payment_terms" rows="2"></textarea>
            </div>
        </div>

        <div class="field">
            <label class="label">Notes</label>
            <div class="control">
                <textarea class="textarea" name="notes" rows="2"></textarea>
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
