<?php
$jobs = [
    [
        'title' => 'GSSSB Job',
        'details' => 'GSSSB Recruitment 2024 for Various Posts (Advt. No. 237/202425 to 252/202425) (OJAS)',
        'last_date' => '15-09-2024',
        'status' => 'green', 
    ],
    [
        'title' => 'GSSSB Job',
        'details' => 'GSSSB Recruitment 2024 for Various Posts (Advt. No. 237/202425 to 252/202425) (OJAS)',
        'last_date' => '15-09-2024',
        'status' => 'green', 
    ],
    [
        'title' => 'GSSSB Job',
        'details' => 'GSSSB Recruitment 2024 for Various Posts (Advt. No. 237/202425 to 252/202425) (OJAS)',
        'last_date' => '15-09-2024',
        'status' => 'blue', 
    ],
    [
        'title' => 'GSSSB Job',
        'details' => 'GSSSB Recruitment 2024 for Various Posts (Advt. No. 237/202425 to 252/202425) (OJAS)',
        'last_date' => '15-09-2024',
        'status' => 'red', 
    ],
    
];

?>



    <div class="container-joblisting">
        <div class="header-joblisting">Latest Jobs</div>
        <ul class="job-list">
            <?php foreach ($jobs as $job): ?>
                <li>
                    <div class="job-title"><a href="{{ url('/jobs') }}"><?php echo $job['title']; ?></a></div>
                    <div class="job-desc">
                        <span><?php echo $job['details']; ?></span>
                        <span class="date">(Last: <?php echo $job['last_date']; ?>)</span>
                        <?php if ($job['status'] === 'green'): ?>
                            <span class="new">NEW</span>
                        <?php endif; ?>
                    </div>
                    <div class="status"><span class="status-circle <?php echo $job['status']; ?>"></span></div>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
