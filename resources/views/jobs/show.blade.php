@extends('layouts.app')
<style>
    .status-hold {
        background: #ff8e00;
        padding: 3px 10px;
        color: #FFFFFF;
        border-radius: 20px;
    }
    .status-success {
        background: #00ff00;
        padding: 3px 10px;
        color: #FFFFFF;
        border-radius: 20px;
    }
</style>
@section('content')
    <div class="col-md-12">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="card card-stats">
                            <div class="card-header" data-background-color="orange">
                                <i class="material-icons">asdas</i>
                            </div>
                            <div class="card-content">
                                <p class="category">Used Space</p>
                                <h3 class="title">49/50
                                    <small>GB</small>
                                </h3>
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                    <i class="material-icons text-danger">warning</i>
                                    <a href="#pablo">Get More Space...</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="card card-stats">
                            <div class="card-header" data-background-color="green">
                                <i class="material-icons">store</i>
                            </div>
                            <div class="card-content">
                                <p class="category">Revenue</p>
                                <h3 class="title">$34,245</h3>
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                    <i class="material-icons">date_range</i> Last 24 Hours
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="card card-stats">
                            <div class="card-header" data-background-color="red">
                                <i class="material-icons">info_outline</i>
                            </div>
                            <div class="card-content">
                                <p class="category">Fixed Issues</p>
                                <h3 class="title">75</h3>
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                    <i class="material-icons">local_offer</i> Tracked from Github
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="card card-stats">
                            <div class="card-header" data-background-color="blue">
                                <i class="fa fa-twitter"></i>
                            </div>
                            <div class="card-content">
                                <p class="category">Followers</p>
                                <h3 class="title">+245</h3>
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                    <i class="material-icons">update</i> Just Updated
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12 right float-right">
                <div class="col-md-3">
                    <add-candidates></add-candidates>
                </div>
                <div class="col-md-3 col-md-offset-6">
                    <send-emails></send-emails>
                </div>
            </div>

            <div class="col-md-12">
                <div class="card card-nav-tabs">
                    <div class="card-header" data-background-color="blue">
                        <div class="nav-tabs-navigation">
                            <div class="nav-tabs-wrapper">
                                <ul class="nav nav-tabs" data-tabs="tabs">
                                    <li class="active">
                                        <a href="#candidates" data-toggle="tab">
                                            <i class="material-icons"></i> Candidates
                                        </a>
                                    </li>
                                    <li class="">
                                        <a href="#bestCandidates" data-toggle="tab">
                                            <i class="material-icons">how_to_reg</i> Best Candidates
                                        </a>
                                    </li>
                                    <li class="">
                                        <a href="#settings" data-toggle="tab">
                                            <i class="material-icons">cloud</i> Server
                                        </a>
                                    </li>
                                </ul>

                            </div>
                        </div>
                    </div>
                    <div class="card-content">
                        <div class="tab-content">
                            <div class="tab-pane active" id="candidates">
                                <div class="col-md-12">
                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead class="text-info font-weight-bold">
                                            <tr>
                                                <th>First name</th>
                                                <th>Last name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Status</th>
                                                <th>IQ Result</th>
                                                <th>Soft skills</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>Dakota</td>
                                                <td>Rice</td>
                                                <td>dakota.rice@gmail.com</td>
                                                <td>+35987-880-7922</td>
                                                <td><span class="status-success">Complete</span></td>
                                                <td class="text-info border">78%</td>
                                                <td class="text-info border">48%</td>
                                            </tr>
                                            <tr>
                                                <td>Dakota</td>
                                                <td>Rice</td>
                                                <td>dakota.rice@gmail.com</td>
                                                <td>+35987-880-7922</td>
                                                <td><span class="status-hold">Hold</span></td>
                                                <td class="text-info border">78%</td>
                                                <td class="text-info border">48%</td>
                                            </tr>
                                            <tr>
                                                <td>Dakota</td>
                                                <td>Rice</td>
                                                <td>dakota.rice@gmail.com</td>
                                                <td>+35987-880-7922</td>
                                                <td><span class="status-hold">Hold</span></td>
                                                <td class="text-info border">78%</td>
                                                <td class="text-info border">48%</td>
                                            </tr>
                                            <tr>
                                                <td>Dakota</td>
                                                <td>Rice</td>
                                                <td>dakota.rice@gmail.com</td>
                                                <td>+35987-880-7922</td>
                                                <td><span class="status-hold">Hold</span></td>
                                                <td class="text-info border">78%</td>
                                                <td class="text-info border">48%</td>
                                            </tr>

                                            </tbody>
                                        </table>
                                    </div>


                                    <div class="d-flex justify-content-between">
                                        <nav class="my-4">
                                            <ul class="pagination pagination-circle pg-blue mb-0">

                                                <!--First-->
                                                <li class="page-item disabled clearfix d-none d-md-block"><a
                                                            class="page-link waves-effect waves-effect">First</a></li>

                                                <!--Arrow left-->
                                                <li class="page-item disabled">
                                                    <a class="page-link waves-effect waves-effect"
                                                       aria-label="Previous">
                                                        <span aria-hidden="true">«</span>
                                                        <span class="sr-only">Previous</span>
                                                    </a>
                                                </li>

                                                <!--Numbers-->
                                                <li class="page-item active"><a
                                                            class="page-link waves-effect waves-effect">1</a></li>
                                                <li class="page-item"><a
                                                            class="page-link waves-effect waves-effect">2</a></li>
                                                <li class="page-item"><a
                                                            class="page-link waves-effect waves-effect">3</a></li>
                                                <li class="page-item"><a
                                                            class="page-link waves-effect waves-effect">4</a></li>
                                                <li class="page-item"><a
                                                            class="page-link waves-effect waves-effect">5</a></li>

                                                <!--Arrow right-->
                                                <li class="page-item">
                                                    <a class="page-link waves-effect waves-effect" aria-label="Next">
                                                        <span aria-hidden="true">»</span>
                                                        <span class="sr-only">Next</span>
                                                    </a>
                                                </li>

                                                <!--First-->
                                                <li class="page-item clearfix d-none d-md-block"><a
                                                            class="page-link waves-effect waves-effect">Last</a></li>
                                            </ul>
                                        </nav>
                                    </div>
                                </div>

                            </div>
                            <div class="tab-pane" id="bestCandidates">
                                <div class="col-md-12">
                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead class="text-info font-weight-bold">
                                            <tr>
                                                <th>First name</th>
                                                <th>Last name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>IQ Result</th>
                                                <th>Soft skills</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>Dakota</td>
                                                <td>Rice</td>
                                                <td>dakota.rice@gmail.com</td>
                                                <td>+35987-880-7922</td>
                                                <td class="text-info border">78%</td>
                                                <td class="text-info border">48%</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="settings">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
