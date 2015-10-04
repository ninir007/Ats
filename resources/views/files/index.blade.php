@extends('template')


@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="wrapper wrapper-content animated fadeInUp">

                <div class="ibox">
                    <div class="ibox-title">
                        <h5>All projects assigned to this account</h5>
                        <div class="ibox-tools">
                            <a href="/new-file" class="btn btn-primary btn-xs">Nouvelle fiche</a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="row m-b-sm m-t-sm">
                            <div class="col-md-1">
                                <button type="button" id="loading-example-btn" class="btn btn-white btn-sm"><i class="fa fa-refresh"></i> Refresh</button>
                            </div>
                            <div class="col-md-11">
                                <div class="input-group"><input type="text" placeholder="Search" class="input-sm form-control"> <span class="input-group-btn">
                                        <button type="button" class="btn btn-sm btn-primary"> Go!</button> </span></div>
                            </div>
                        </div>

                        <div class="project-list">

                            <table class="table table-hover">
                                <tbody>
                                <tr>
                                    <td class="project-status">
                                        <span class="label label-primary">Active</span>
                                    </td>
                                    <td class="project-title">
                                        <a href="project_detail.html">Contract with Zender Company</a>
                                        <br>
                                        <small>Created 14.08.2014</small>
                                    </td>
                                    <td class="project-completion">
                                        <small>Completion with: 48%</small>
                                        <div class="progress progress-mini">
                                            <div style="width: 48%;" class="progress-bar"></div>
                                        </div>
                                    </td>
                                    <td class="project-people">
                                        <a href=""><img alt="image" class="img-circle" src="img/a3.jpg"></a>
                                        <a href=""><img alt="image" class="img-circle" src="img/a1.jpg"></a>
                                        <a href=""><img alt="image" class="img-circle" src="img/a2.jpg"></a>
                                        <a href=""><img alt="image" class="img-circle" src="img/a4.jpg"></a>
                                        <a href=""><img alt="image" class="img-circle" src="img/a5.jpg"></a>
                                    </td>
                                    <td class="project-actions">
                                        <a href="#" class="btn btn-white btn-sm"><i class="fa fa-folder"></i> View </a>
                                        <a href="#" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> Edit </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="project-status">
                                        <span class="label label-primary">Active</span>
                                    </td>
                                    <td class="project-title">
                                        <a href="project_detail.html">There are many variations of passages</a>
                                        <br>
                                        <small>Created 11.08.2014</small>
                                    </td>
                                    <td class="project-completion">
                                        <small>Completion with: 28%</small>
                                        <div class="progress progress-mini">
                                            <div style="width: 28%;" class="progress-bar"></div>
                                        </div>
                                    </td>
                                    <td class="project-people">
                                        <a href=""><img alt="image" class="img-circle" src="img/a7.jpg"></a>
                                        <a href=""><img alt="image" class="img-circle" src="img/a6.jpg"></a>
                                        <a href=""><img alt="image" class="img-circle" src="img/a3.jpg"></a>
                                    </td>
                                    <td class="project-actions">
                                        <a href="#" class="btn btn-white btn-sm"><i class="fa fa-folder"></i> View </a>
                                        <a href="#" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> Edit </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="project-status">
                                        <span class="label label-default">Unactive</span>
                                    </td>
                                    <td class="project-title">
                                        <a href="project_detail.html">Many desktop publishing packages and web</a>
                                        <br>
                                        <small>Created 10.08.2014</small>
                                    </td>
                                    <td class="project-completion">
                                        <small>Completion with: 8%</small>
                                        <div class="progress progress-mini">
                                            <div style="width: 8%;" class="progress-bar"></div>
                                        </div>
                                    </td>
                                    <td class="project-people">
                                        <a href=""><img alt="image" class="img-circle" src="img/a5.jpg"></a>
                                        <a href=""><img alt="image" class="img-circle" src="img/a3.jpg"></a>
                                    </td>
                                    <td class="project-actions">
                                        <a href="#" class="btn btn-white btn-sm"><i class="fa fa-folder"></i> View </a>
                                        <a href="#" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> Edit </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="project-status">
                                        <span class="label label-primary">Active</span>
                                    </td>
                                    <td class="project-title">
                                        <a href="project_detail.html">Letraset sheets containing</a>
                                        <br>
                                        <small>Created 22.07.2014</small>
                                    </td>
                                    <td class="project-completion">
                                        <small>Completion with: 83%</small>
                                        <div class="progress progress-mini">
                                            <div style="width: 83%;" class="progress-bar"></div>
                                        </div>
                                    </td>
                                    <td class="project-people">
                                        <a href=""><img alt="image" class="img-circle" src="img/a2.jpg"></a>
                                        <a href=""><img alt="image" class="img-circle" src="img/a3.jpg"></a>
                                        <a href=""><img alt="image" class="img-circle" src="img/a1.jpg"></a>
                                        <a href=""><img alt="image" class="img-circle" src="img/a7.jpg"></a>
                                    </td>
                                    <td class="project-actions">
                                        <a href="#" class="btn btn-white btn-sm"><i class="fa fa-folder"></i> View </a>
                                        <a href="#" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> Edit </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="project-status">
                                        <span class="label label-primary">Active</span>
                                    </td>
                                    <td class="project-title">
                                        <a href="project_detail.html">Contrary to popular belief</a>
                                        <br>
                                        <small>Created 14.07.2014</small>
                                    </td>
                                    <td class="project-completion">
                                        <small>Completion with: 97%</small>
                                        <div class="progress progress-mini">
                                            <div style="width: 97%;" class="progress-bar"></div>
                                        </div>
                                    </td>
                                    <td class="project-people">
                                        <a href=""><img alt="image" class="img-circle" src="img/a4.jpg"></a>
                                    </td>
                                    <td class="project-actions">
                                        <a href="#" class="btn btn-white btn-sm"><i class="fa fa-folder"></i> View </a>
                                        <a href="#" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> Edit </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="project-status">
                                        <span class="label label-primary">Active</span>
                                    </td>
                                    <td class="project-title">
                                        <a href="project_detail.html">Contract with Zender Company</a>
                                        <br>
                                        <small>Created 14.08.2014</small>
                                    </td>
                                    <td class="project-completion">
                                        <small>Completion with: 48%</small>
                                        <div class="progress progress-mini">
                                            <div style="width: 48%;" class="progress-bar"></div>
                                        </div>
                                    </td>
                                    <td class="project-people">
                                        <a href=""><img alt="image" class="img-circle" src="img/a1.jpg"></a>
                                        <a href=""><img alt="image" class="img-circle" src="img/a2.jpg"></a>
                                        <a href=""><img alt="image" class="img-circle" src="img/a4.jpg"></a>
                                        <a href=""><img alt="image" class="img-circle" src="img/a5.jpg"></a>
                                    </td>
                                    <td class="project-actions">
                                        <a href="#" class="btn btn-white btn-sm"><i class="fa fa-folder"></i> View </a>
                                        <a href="#" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> Edit </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="project-status">
                                        <span class="label label-primary">Active</span>
                                    </td>
                                    <td class="project-title">
                                        <a href="project_detail.html">There are many variations of passages</a>
                                        <br>
                                        <small>Created 11.08.2014</small>
                                    </td>
                                    <td class="project-completion">
                                        <small>Completion with: 28%</small>
                                        <div class="progress progress-mini">
                                            <div style="width: 28%;" class="progress-bar"></div>
                                        </div>
                                    </td>
                                    <td class="project-people">
                                        <a href=""><img alt="image" class="img-circle" src="img/a7.jpg"></a>
                                        <a href=""><img alt="image" class="img-circle" src="img/a6.jpg"></a>
                                        <a href=""><img alt="image" class="img-circle" src="img/a3.jpg"></a>
                                    </td>
                                    <td class="project-actions">
                                        <a href="#" class="btn btn-white btn-sm"><i class="fa fa-folder"></i> View </a>
                                        <a href="#" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> Edit </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="project-status">
                                        <span class="label label-default">Unactive</span>
                                    </td>
                                    <td class="project-title">
                                        <a href="project_detail.html">Many desktop publishing packages and web</a>
                                        <br>
                                        <small>Created 10.08.2014</small>
                                    </td>
                                    <td class="project-completion">
                                        <small>Completion with: 8%</small>
                                        <div class="progress progress-mini">
                                            <div style="width: 8%;" class="progress-bar"></div>
                                        </div>
                                    </td>
                                    <td class="project-people">
                                        <a href=""><img alt="image" class="img-circle" src="img/a5.jpg"></a>
                                        <a href=""><img alt="image" class="img-circle" src="img/a3.jpg"></a>
                                    </td>
                                    <td class="project-actions">
                                        <a href="#" class="btn btn-white btn-sm"><i class="fa fa-folder"></i> View </a>
                                        <a href="#" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> Edit </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="project-status">
                                        <span class="label label-primary">Active</span>
                                    </td>
                                    <td class="project-title">
                                        <a href="project_detail.html">Letraset sheets containing</a>
                                        <br>
                                        <small>Created 22.07.2014</small>
                                    </td>
                                    <td class="project-completion">
                                        <small>Completion with: 83%</small>
                                        <div class="progress progress-mini">
                                            <div style="width: 83%;" class="progress-bar"></div>
                                        </div>
                                    </td>
                                    <td class="project-people">
                                        <a href=""><img alt="image" class="img-circle" src="img/a2.jpg"></a>
                                        <a href=""><img alt="image" class="img-circle" src="img/a3.jpg"></a>
                                        <a href=""><img alt="image" class="img-circle" src="img/a1.jpg"></a>
                                    </td>
                                    <td class="project-actions">
                                        <a href="#" class="btn btn-white btn-sm"><i class="fa fa-folder"></i> View </a>
                                        <a href="#" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> Edit </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="project-status">
                                        <span class="label label-primary">Active</span>
                                    </td>
                                    <td class="project-title">
                                        <a href="project_detail.html">Contrary to popular belief</a>
                                        <br>
                                        <small>Created 14.07.2014</small>
                                    </td>
                                    <td class="project-completion">
                                        <small>Completion with: 97%</small>
                                        <div class="progress progress-mini">
                                            <div style="width: 97%;" class="progress-bar"></div>
                                        </div>
                                    </td>
                                    <td class="project-people">
                                        <a href=""><img alt="image" class="img-circle" src="img/a4.jpg"></a>
                                    </td>
                                    <td class="project-actions">
                                        <a href="#" class="btn btn-white btn-sm"><i class="fa fa-folder"></i> View </a>
                                        <a href="#" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> Edit </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="project-status">
                                        <span class="label label-primary">Active</span>
                                    </td>
                                    <td class="project-title">
                                        <a href="project_detail.html">There are many variations of passages</a>
                                        <br>
                                        <small>Created 11.08.2014</small>
                                    </td>
                                    <td class="project-completion">
                                        <small>Completion with: 28%</small>
                                        <div class="progress progress-mini">
                                            <div style="width: 28%;" class="progress-bar"></div>
                                        </div>
                                    </td>
                                    <td class="project-people">
                                        <a href=""><img alt="image" class="img-circle" src="img/a7.jpg"></a>
                                        <a href=""><img alt="image" class="img-circle" src="img/a6.jpg"></a>
                                        <a href=""><img alt="image" class="img-circle" src="img/a3.jpg"></a>
                                    </td>
                                    <td class="project-actions">
                                        <a href="#" class="btn btn-white btn-sm"><i class="fa fa-folder"></i> View </a>
                                        <a href="#" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> Edit </a>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@stop


@section('script.files')
    <script type="text/javascript">
        $(document).ready(function(){

            $('#loading-example-btn').click(function () {
                btn = $(this);
                simpleLoad(btn, true);

                simpleLoad(btn, false);
            });


        });


        function simpleLoad(btn, state) {
            if (state) {
                btn.children().addClass('fa-spin');
                btn.contents().last().replaceWith(" Patienter");
            } else {
                setTimeout(function () {
                    btn.children().removeClass('fa-spin');
                    btn.contents().last().replaceWith(" Rafraichir");
                }, 2000);
            }
        }
    </script>

@stop
