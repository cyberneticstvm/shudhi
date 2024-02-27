@extends('admin.base')
@section('content')
<div class="page-body">
  <div class="container-fluid general-widget">
    <div class="row">
      <div class="col-xl-6 xl-100 box-col-12">
        <div class="card">
          <div class="cal-date-widget card-body">
            <div class="row">
              <div class="col-xl-6 col-xs-12 col-md-6 col-sm-6">
                <div class="cal-info text-center">
                  <div>
                    <h2>{{ date('d') }}</h2>
                    <div class="d-inline-block"><span class="b-r-dark pe-3">{{ date('M') }}</span><span class="ps-3">{{ date('Y') }}</span></div>
                  </div>
                </div>
              </div>
              <div class="col-xl-6 col-xs-12 col-md-6 col-sm-6">
                <div class="cal-datepicker">
                  <div class="datepicker-here float-sm-end" data-language="en"> </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-6 col-xl-3 xl-25 col-lg-6 box-col-6">
        <div class="card social-widget-card">
          <div class="card-body">
            <div class="redial-social-widget radial-bar-70" data-label="50%"><i class="fa fa-history font-primary"></i></div>
            <h5 class="b-b-light">GEO Tagging</h5>
            <div class="row">
              <div class="col text-center b-r-light"><span>Today</span>
                <h4 class="counter mb-0">0</h4>
              </div>
              <div class="col text-center"><span>This Month</span>
                <h4 class="counter mb-0">0</h4>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-xl-3 xl-25 col-lg-6 box-col-6">
        <div class="card social-widget-card">
          <div class="card-body">
            <div class="redial-social-widget radial-bar-70" data-label="50%"><i class="fa fa-check font-primary"></i></div>
            <h5 class="b-b-light">Feedbacks</h5>
            <div class="row">
              <div class="col text-center b-r-light"><span>Today</span>
                <h4 class="counter mb-0">0</h4>
              </div>
              <div class="col text-center"><span>This Month</span>
                <h4 class="counter mb-0">0</h4>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-xl-3 xl-25 col-lg-6 box-col-6">
        <div class="card social-widget-card">
          <div class="card-body">
            <div class="redial-social-widget radial-bar-70" data-label="50%"><i class="fa fa-stethoscope font-primary"></i></div>
            <h5 class="b-b-light">Complaints</h5>
            <div class="row">
              <div class="col text-center b-r-light"><span>Today</span>
                <h4 class="counter mb-0">0</h4>
              </div>
              <div class="col text-center"><span>This Month</span>
                <h4 class="counter mb-0">0</h4>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-xl-3 xl-25 col-lg-6 box-col-6">
        <div class="card social-widget-card">
          <div class="card-body">
            <div class="redial-social-widget radial-bar-70" data-label="50%"><i class="fa fa-refresh font-primary"></i></div>
            <h5 class="b-b-light">Users</h5>
            <div class="row">
              <div class="col text-center b-r-light"><span>Today</span>
                <h4 class="counter mb-0">0</h4>
              </div>
              <div class="col text-center"><span>This Month</span>
                <h4 class="counter mb-0">0</h4>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection