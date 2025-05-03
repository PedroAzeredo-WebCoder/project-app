@extends('layouts.app')

@section('content')
    <main>
        <section>
            <div class="container">
                <div class="row justify-content-end">
                    <div class="col-6">
                        <h1>Contato</h1>
                        @component('site.components.form_contato')
                        <p>Entre em contato conosco</p>
                        @endcomponent
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
