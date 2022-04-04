@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Финансы</div>

                <div class="card-body">
                    <h4>Ваш баланс</h4>
                    <h3>{{ Auth::user()->balance }}<span class="rouble-icon">₽</span></h3>
                    <a href="">Пополнить баланс</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-3 justify-content-center">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    Мои депозиты
                    <a href="{{ route('deposits.create') }}">Новый депозит</a>
                </div>
                <div class="card-body">
                    <table class="table table-stripped">
                        <tr>
                            <th>Комментарий</th>
                            <th>Тип депозита</th>
                            <th>Срок депозита</th>
                            <th>Сумма депозита</th>
                        </tr>
                        @foreach($deposits as $deposit)
                            <tr>
                                <td>{{ $deposit->comment }}</td>
                                <td>{{ $deposit->comment }}</td>
                                <td>{{ $deposit->deposit_until }}</td>
                                <td>{{ $deposit->amount }}</td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
