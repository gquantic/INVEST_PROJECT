@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        Создание депозита
                        <a href="">Описание депозитов и условий</a>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('deposits.store') }}" method="POST" class="form">
                            @csrf
                            @method('post')
                            <div class="form-group">
                                <label for="mb-1">Тип депозита</label>
                                <select name="deposit-type" id="" class="form-control">
                                    <option value="with_withdraw">Депозит с возможностью снятия средств (ознакомьтесь с условиями)</option>
                                    <option value="no_withdraw">Депозит без возможности снятия (прибыль больше)</option>
                                </select>
                            </div>
                            <div class="form-group mt-3">
                                <label for="" class="mb-1">Ваш <a href="https://telegram.org" target="_blank">Telegram</a></label>
                                <input type="text" name="telegram" class="form-control" placeholder="По нему свяжется с Вами наш менеджер для уточнения деталей" required>
                            </div>
                            <div class="form-group mt-3">
                                <label for="" class="mb-1">Сумма депозита в рублях</label>
                                <input type="number" name="amount" class="form-control" placeholder="" required>
                            </div>
                            <div class="form-group mt-3">
                                <label for="" class="mb-1">Срок депозита ≈ возможный заработок</label>
                                <select name="until" id="" class="form-control">
                                    <option value="1">1 месяц ≈ 20%</option>
                                    <option value="3">3 месяца ≈ 50%</option>
                                    <option value="6">6 месяцев ≈ 100%</option>
                                    <option value="12">1 год ≈ 200-300%</option>
                                </select>
                            </div>
                            <input type="submit" value="Создать депозит" class="btn btn-success mt-3">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
