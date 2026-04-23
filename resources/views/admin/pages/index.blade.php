@extends('admin.master')
@section('content')
     <h1 class="mb-3 h2">Dashboard</h1>
     <div class="row row-cols-1 row-cols-xl-3 row-cols-md-3 mb-6 g-6">
          <div class="col">
            <!-- card -->
            <div class="card card-lg">
              <!-- card body -->
              <div class="card-body d-flex flex-column gap-8">
                <div class="d-flex align-items-center gap-3">
                  <div class="icon-shape icon-lg rounded-circle bg-success-darker text-success-lighter">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                      stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                      class="icon icon-tabler icons-tabler-outline icon-tabler-coin">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                      <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                      <path d="M14.8 9a2 2 0 0 0 -1.8 -1h-2a2 2 0 1 0 0 4h2a2 2 0 1 1 0 4h-2a2 2 0 0 1 -1.8 -1" />
                      <path d="M12 7v10" />
                    </svg>
                  </div>
                  <div>zones</div>
                </div>
                <div class="d-flex justify-content-between align-items-center lh-1">
    <div class="fs-3 fw-bold">{{ $counter['zones'] }}</div>
    <a href="{{ route('admin.zones.index') }}" class="btn btn-sm btn-light">
        View
    </a>
                  <div class="text-warning small">
                    <span></span>
                    <span>
                      <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                        class="icon icon-tabler icons-tabler-outline icon-tabler-trending-up">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M3 17l6 -6l4 4l8 -8" />
                        <path d="M14 7l7 0l0 7" />
                      </svg>
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col">
            <!-- card -->
            <div class="card card-lg">
              <!-- card body -->
              <div class="card-body d-flex flex-column gap-8">
                <div class="d-flex align-items-center gap-3">
                  <div class="icon-shape icon-lg rounded-circle bg-success-darker text-success-lighter">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                      stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                      class="icon icon-tabler icons-tabler-outline icon-tabler-coin">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                      <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                      <path d="M14.8 9a2 2 0 0 0 -1.8 -1h-2a2 2 0 1 0 0 4h2a2 2 0 1 1 0 4h-2a2 2 0 0 1 -1.8 -1" />
                      <path d="M12 7v10" />
                    </svg>
                  </div>
                  <div>Attractions</div>
                </div>
                <div class="d-flex justify-content-between align-items-center lh-1">
    <div class="fs-3 fw-bold">{{ $counter['attractions'] }}</div>
    <a href="{{ route('admin.attractions.index') }}" class="btn btn-sm btn-light">
        View
    </a>
                  <div class="text-warning small">
                    <span>2.19%</span>
                    <span>
                      <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                        class="icon icon-tabler icons-tabler-outline icon-tabler-trending-up">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M3 17l6 -6l4 4l8 -8" />
                        <path d="M14 7l7 0l0 7" />
                      </svg>
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col">
            <!-- card -->
            <div class="card card-lg">
              <!-- card body -->
              <div class="card-body d-flex flex-column gap-8">
                <div class="d-flex align-items-center gap-3">
                  <div class="icon-shape icon-lg rounded-circle bg-success-darker text-success-lighter">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                      stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                      class="icon icon-tabler icons-tabler-outline icon-tabler-coin">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                      <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                      <path d="M14.8 9a2 2 0 0 0 -1.8 -1h-2a2 2 0 1 0 0 4h2a2 2 0 1 1 0 4h-2a2 2 0 0 1 -1.8 -1" />
                      <path d="M12 7v10" />
                    </svg>
                  </div>
                  <div>Reviews</div>
                </div>
                <div class="d-flex justify-content-between align-items-center lh-1">
    <div class="fs-3 fw-bold">{{ $counter['reviews'] }}</div>
    <a href="{{ route('admin.reviews.index') }}" class="btn btn-sm btn-light">
        View
    </a>
                  <div class="text-warning small">
                    <span>2.19%</span>
                    <span>
                      <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                        class="icon icon-tabler icons-tabler-outline icon-tabler-trending-up">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M3 17l6 -6l4 4l8 -8" />
                        <path d="M14 7l7 0l0 7" />
                      </svg>
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </div>
     </div>
     
@endsection     