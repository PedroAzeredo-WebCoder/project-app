@extends('layouts.app')

@section('content')
    <main>
        <section>
            <div class="container">
                <div class="row justify-content-end">
                    <div class="col-6">
                        <h1>Contato</h1>
                        <form class="row g-3" action="{{ route('contato') }}" method="POST">
                            @csrf
                            <div class="col-md-6">
                                <label for="f_nome" class="form-label">Nome</label>
                                <input type="text" class="form-control" name="f_nome" id="f_nome">
                            </div>
                            <div class="col-md-6">
                                <label for="f_telefone" class="form-label">Telefone</label>
                                <input type="tel" class="form-control" name="f_telefone" id="f_telefone">
                            </div>
                            <div class="col-12">
                                <label for="f_email" class="form-label">E-mail</label>
                                <input type="email" class="form-control" name="f_email" id="f_email">
                            </div>
                            <div class="col-12">
                                <label for="f_estado" class="form-label">Estado</label>
                                <select id="f_estado" class="form-select" name="f_estado">
                                    <option selected>Selecione o estado</option>
                                    <option value="AC">Acre</option>
                                    <option value="AL">Alagoas</option>
                                    <option value="AP">Amapá</option>
                                    <option value="AM">Amazonas</option>
                                    <option value="BA">Bahia</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <label for="f_mensagem" class="form-label">Mensagem</label>
                                <textarea class="form-control" name="f_mensagem" id="f_mensagem" rows="3"></textarea>
                            </div>
                            <div class="col-12">
                                <div class="d-grid gap-2">
                                    <button type="submit" class="btn btn-primary">Enviar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
