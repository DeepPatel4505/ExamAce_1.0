<div class="container-joblisting" id="latest-exams">
    <div class="header-joblisting">Latest Exams</div>
    <ul class="job-list">
        @foreach ($exams as $exam)
            <li onclick="window.location.href='{{ url('/exams/' . $exam->id) }}'">
                <div class="job-title">
                    <a href="{{ url('/exams/' . $exam->id) }}">{{ $exam->name }}</a>
                </div>
                <div class="job-desc">
                    <span>{{ $exam->description ?? 'No description available.' }}</span>
                    <span class="date">(Exam Date: {{ $exam->exam_date->format('d M Y') }})</span>
                    @if ($exam->exam_status === 'Upcoming')
                        <span class="new">NEW</span>
                    @endif
                </div>
                <div class="status">
                    <span class="status-circle {{ strtolower($exam->exam_status) }}"></span>
                </div>
            </li>
        @endforeach
    </ul>
</div>
