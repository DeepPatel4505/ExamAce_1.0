<div class="container-joblisting">
    <div class="header-joblisting">Latest Jobs</div>
    <ul class="job-list">
        @foreach ($jobs as $job)
            <li onclick="window.location.href='{{ url('/jobs/' . $job->id) }}'">
                <div class="job-title">
                    <a href="{{ url('/jobs/' . $job->id) }}">{{ $job->title }}</a>
                </div>
                <div class="job-desc">
                    <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veritatis eaque id dolorum quis voluptas quam natus nam esse magnam quo?</span>
                    <span class="date">(Last: {{ $job->application_end_date->format('d M Y') }})</span>
                    @if ($job->job_status === 'Open')
                        <span class="new">NEW</span>
                    @endif
                </div>
                <div class="status">
                    <span class="status-circle {{ strtolower($job->job_status) }}"></span>
                </div>
            </li>
        @endforeach
    </ul>
</div>
