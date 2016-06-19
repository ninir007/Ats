@extends('template')

@section('content')
    <h1>DASHBOARD</h1>

    <div class="row">
        <div class="col-lg-4">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Liste réparations à faire</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="close-link">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <table class="table table-hover no-margins">
                        <thead>
                        <tr>
                            <th>No.</th>
                            <th>Status</th>
                            <th>Date</th>
                            <th>Client</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td class="text-center text-navy">7R2</td>
                            <td><small>Pending...</small></td>
                            <td><i class="fa fa-clock-o"></i> 2016-05-24 08:47:40</td>
                            <td>tarantino quentin</td>
                        </tr>
                        <tr>
                            <td class="text-center text-navy">3R2</td>
                            <td><small>Pending...</small> </td>
                            <td><i class="fa fa-clock-o"></i> 2016-05-31 14:38:30</td>
                            <td>tarantino quentin</td>
                        </tr>
                        <tr>
                            <td class="text-center text-navy">29R5</td>
                            <td><small>Pending...</small> </td>
                            <td><i class="fa fa-clock-o"></i> 2016-05-28 12:56:57</td>
                            <td>Luc lemoine</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Client à aviser</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="close-link">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <ul class="todo-list m-t small-list">
                        <li>
                            <a href="#" class="check-link"><i class="fa fa-check-square"></i> </a>
                            <span class="m-l-xs todo-completed">Buy a milk</span>

                        </li>
                        <li>
                            <a href="#" class="check-link"><i class="fa fa-square-o"></i> </a>
                            <span class="m-l-xs">Go to shop and find some products.</span>

                        </li>
                        <li>
                            <a href="#" class="check-link"><i class="fa fa-square-o"></i> </a>
                            <span class="m-l-xs">Send documents to Mike</span>
                            <small class="label label-primary"><i class="fa fa-clock-o"></i> 1 mins</small>
                        </li>
                        <li>
                            <a href="#" class="check-link"><i class="fa fa-square-o"></i> </a>
                            <span class="m-l-xs">Go to the doctor dr Smith</span>
                        </li>
                        <li>
                            <a href="#" class="check-link"><i class="fa fa-check-square"></i> </a>
                            <span class="m-l-xs todo-completed">Plan vacation</span>
                        </li>
                        <li>
                            <a href="#" class="check-link"><i class="fa fa-square-o"></i> </a>
                            <span class="m-l-xs">Create new stuff</span>
                        </li>
                        <li>
                            <a href="#" class="check-link"><i class="fa fa-square-o"></i> </a>
                            <span class="m-l-xs">Call to Anna for dinner</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Liste de Commandes à faire</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="close-link">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <table class="table table-hover margin bottom">
                        <thead>
                        <tr>
                            <th style="width: 1%" class="text-center">No.</th>
                            <th class="text-center">Date</th>
                            <th class="text-center">Amount</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td class="text-center text-navy">24O3</td>

                            <td class="text-center small">2016-05-30 </td>
                            <td class="text-center"><span class="label label-primary">€483.00</span></td>
                        </tr>
                        <tr>
                            <td class="text-cente text-navy">25O1</td>

                            <td class="text-center small">2016-05-30 </td>
                            <td class="text-center"><span class="label label-primary">€327.00</span></td>

                        </tr>
                        <tr>
                            <td class="text-center text-navy">27O5</td>

                            <td class="text-center small"> 2016-05-31</td>
                            <td class="text-center"><span class="label label-primary">€125.00</span></td>

                        </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@stop
