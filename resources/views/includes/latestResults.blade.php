<div class="container-joblisting" id="latest-Results">
    <div class="header-joblisting">Latest Results</div>
    <ul class="job-list">
        @foreach ($results as $result)
            <li onclick="window.location.href='{{ $result->result_link }}'">
                <div class="job-title">
                    <a href="{{ $result->result_link }}">{{ $result->name }}</a>
                </div>
                <div class="job-desc">
                    <span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima, a.</span>
                    <span class="date">(Released: {{ $result->release_date->format('d M Y') }})</span>
                </div>
                <div class="status">
                    <span class="status-circle new"></span>
                </div>
            </li>
        @endforeach
    </ul>
</div>
