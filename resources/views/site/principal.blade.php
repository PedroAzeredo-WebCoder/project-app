@extends('layouts.app')

@section('content')
    <main>
        <section>
            <div class="container">
                <div class="row justify-content-end">
                    <div class="col-6">
                        <h1>Principal</h1>
                        @component('site.components.form_contato')
                        @endcomponent
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
